<?php
namespace CakeSilverCms\Controller;

use CakeSilverCms\Controller\AppController;
use Cake\Cache\Cache;
use Cake\Event\Event;
use Cake\Utility\Hash;

/**
 * Menus Controller
 *
 * @property \CakeSilverCms\Model\Table\MenusTable $Menus
 *
 * @method \CakeSilverCms\Model\Entity\Menu[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class MenusController extends AppController
{

    private $menuRedirection = [
        'self'       => 'Self',
        'new-window' => 'New Window',
    ];

    private $menuType = [
        'custom' => 'Custom',
        'object' => 'Article',
        //'module' => 'Module',
    ];

    public $languages;

    public function beforeFilter(Event $event)
    {
        parent::beforeFilter($event);
        $this->languages = Cache::read('silver-language', 'languages');
    }

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index($menu_region_id = null)
    {
        if (empty($menu_region_id)) {
            return $this->redirect(['controller' => 'MenuRegions', 'action' => 'index']);
        }
        $this->paginate = [
            'contain'    => ['Articles'],
            'conditions' => ['menu_region_id' => $menu_region_id],
        ];
        $menus           = $this->paginate($this->Menus);
        $menuType        = $this->menuType;
        $menuRedirection = $this->menuRedirection;
        $this->set(compact('menus', 'menu_region_id', 'menuType', 'menuRedirection'));
    }

    /**
     * View method
     *
     * @param string|null $id Menu id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($menu_region_id = null, $id = null)
    {
        if (empty($menu_region_id)) {
            return $this->redirect(['controller' => 'MenuRegions', 'action' => 'index']);
        }
        $menu = $this->Menus->get($id, [
            'contain' => ['MenuRegions', 'Articles'],
        ]);
        $menuType        = $this->menuType;
        $menuRedirection = $this->menuRedirection;
        $this->set(compact('menu', 'menu_region_id', 'menuType', 'menuRedirection'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add($menu_region_id = null)
    {
        /*if(empty($menu_region_id)){
        return $this->redirect(['controller' => 'MenuRegions', 'action' => 'index']);
        }*/
        $menu                 = $this->Menus->newEntity();
        $menu->menu_region_id = $menu_region_id;
        if ($this->request->is('post')) {
            $menu_translations = [];
            if (isset($this->request->data['menu_translations'])) {
                $menu_translations = $this->request->getData('menu_translations');
                unset($this->request->data['menu_translations']);
            }
            $menu              = $this->Menus->patchEntity($menu, $this->request->getData());
            $menu->object_type = ($menu->menu_type == 'object') ? 'article' : '';
            if ($this->Menus->save($menu)) {
                $menu_id = $menu->id;
                if (!empty($menu_translations)) {
                    $this->loadModel('MenuTranslations');
                    foreach ($menu_translations as $key => $_translation) {
                        $menu_translations[$key]['menu_id'] = $menu_id;
                    }
                    $menuTranslation  = $this->MenuTranslations->newEntity();
                    $menuTranslation  = $this->MenuTranslations->patchEntities($menuTranslation, $menu_translations);
                    $menuTranslations = $this->MenuTranslations->saveMany($menuTranslation);
                }
                $this->Flash->success(__('The menu has been saved.'));

                return $this->redirect(['action' => 'index', $menu->menu_region_id]);
            }
            $this->Flash->error(__('The menu could not be saved. Please, try again.'));
        }
        $menuRegions     = $this->Menus->MenuRegions->find('list');
        $menuType        = $this->menuType;
        $menuRedirection = $this->menuRedirection;
        $menuLanguages   = $this->languages;
        //Get Articales
        $this->loadModel('CakeSilverCms.Articles');
        $articles = $this->Articles->find('list');
        $this->set(compact('menu', 'menuRegions', 'menuType', 'menuRedirection', 'menuLanguages', 'articles'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Menu id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($menu_region_id = null, $id = null)
    {
        if (empty($menu_region_id)) {
            return $this->redirect(['controller' => 'MenuRegions', 'action' => 'index']);
        }
        $menu = $this->Menus->get($id, [
            'contain' => ['MenuTranslations'],
        ]);
        $menu['menu_translations'] = Hash::combine($menu['menu_translations'], '{n}.language_id', '{n}');
        $menu->menu_region_id = $menu_region_id;
        if ($this->request->is(['patch', 'post', 'put'])) {
            $menu_translations = [];
            if (isset($this->request->data['menu_translations'])) {
                $menu_translations = $this->request->getData('menu_translations');
                unset($this->request->data['menu_translations']);
            }
            $menu              = $this->Menus->patchEntity($menu, $this->request->getData());
            $menu->object_type = ($menu->menu_type == 'object') ? 'article' : '';
            if ($this->Menus->save($menu)) {
                $menu_id = $menu->id;
                if (!empty($menu_translations)) {
                    $this->loadModel('MenuTranslations');
                    foreach ($menu_translations as $key => $_translation) {
                        $menu_translations[$key]['menu_id'] = $menu_id;
                    }
                    $menuTranslation  = $this->MenuTranslations->newEntity();
                    $menuTranslation  = $this->MenuTranslations->patchEntities($menuTranslation, $menu_translations);
                    $menuTranslations = $this->MenuTranslations->saveMany($menuTranslation);
                }
                $this->Flash->success(__('The menu has been saved.'));

                return $this->redirect(['action' => 'index', $menu->menu_region_id]);
            }
            $this->Flash->error(__('The menu could not be saved. Please, try again.'));
        }
        $menuRegions     = $this->Menus->MenuRegions->find('list');
        $menuType        = $this->menuType;
        $menuRedirection = $this->menuRedirection;
        $menuLanguages   = $this->languages;
        //Get Articales
        $this->loadModel('CakeSilverCms.Articles');
        $articles = $this->Articles->find('list');
        $this->set(compact('menu', 'menuRegions', 'menuType', 'menuRedirection', 'menuLanguages', 'articles'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Menu id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($menu_region_id = null, $id = null)
    {
        if (empty($menu_region_id)) {
            return $this->redirect(['controller' => 'MenuRegions', 'action' => 'index']);
        }
        $this->request->allowMethod(['post', 'delete']);
        $menu = $this->Menus->get($id);
        if ($this->Menus->delete($menu)) {
            $this->loadModel('MenuTranslations');
            $this->MenuTranslations->deleteAll(['menu_id' => $id]);
            $this->Flash->success(__('The menu has been deleted.'));
        } else {
            $this->Flash->error(__('The menu could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index', $menu_region_id]);
    }
}
