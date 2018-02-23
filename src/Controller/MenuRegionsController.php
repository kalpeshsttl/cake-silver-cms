<?php
namespace CakeSilverCms\Controller;

use CakeSilverCms\Controller\AppController;

/**
 * MenuRegions Controller
 *
 * @property \CakeSilverCms\Model\Table\MenuRegionsTable $MenuRegions
 *
 * @method \CakeSilverCms\Model\Entity\MenuRegion[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class MenuRegionsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $menuRegions = $this->paginate($this->MenuRegions);

        $this->set(compact('menuRegions'));
    }

    /**
     * View method
     *
     * @param string|null $id Menu Region id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $menuRegion = $this->MenuRegions->get($id, [
            'contain' => ['Menus'=>['Articles']]
        ]);

        $this->set('menuRegion', $menuRegion);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $menuRegion = $this->MenuRegions->newEntity();
        if ($this->request->is('post')) {
            $menuRegion = $this->MenuRegions->patchEntity($menuRegion, $this->request->getData());
            if ($this->MenuRegions->save($menuRegion)) {
                $this->Flash->success(__('The menu location has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The menu location could not be saved. Please, try again.'));
        }
        $this->set(compact('menuRegion'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Menu Region id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $menuRegion = $this->MenuRegions->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $menuRegion = $this->MenuRegions->patchEntity($menuRegion, $this->request->getData());
            if ($this->MenuRegions->save($menuRegion)) {
                $this->Flash->success(__('The menu location has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The menu location could not be saved. Please, try again.'));
        }
        $this->set(compact('menuRegion'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Menu Region id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $menuRegion = $this->MenuRegions->get($id);
        if ($this->MenuRegions->delete($menuRegion)) {
            $this->Flash->success(__('The menu location has been deleted.'));
        } else {
            $this->Flash->error(__('The menu location could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
