<?php
namespace CakeSilverCms\Controller;

use CakeSilverCms\Controller\AppController;
use Cake\Cache\Cache;
use Cake\Core\Configure;
use Cake\Event\Event;
use Cake\Network\Exception\NotFoundException;
use Cake\Utility\Hash;

/**
 * Articles Controller
 *
 * @property \CakeSilverCms\Model\Table\ArticlesTable $Articles
 *
 * @method \CakeSilverCms\Model\Entity\Article[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ArticlesController extends AppController
{

    public $languages;

    public function beforeFilter(Event $event)
    {
        parent::beforeFilter($event);
        $this->languages = Cache::read('silver-language', 'languages');
    }

    /**
     * Page method
     *
     * @return \Cake\Http\Response|void
     */
    public function home()
    {
        $article = $this->Articles->find('all')
            ->select([
                'id',
                'title'   => 'IFNULL(ArticleTranslation.title, Articles.title)',
                'slug'    => 'IFNULL(ArticleTranslation.slug, Articles.slug)',
                'excerpt' => 'IFNULL(ArticleTranslation.excerpt, Articles.excerpt)',
                'content' => 'IFNULL(ArticleTranslation.content, Articles.content)',
                'url'     => 'IFNULL(ArticleTranslation.url, Articles.url)',
                'sort_order',
                'created_at',
                'modified_at',
            ])
            ->contain([
                'ArticleTranslation' => function ($q) {
                    if (Configure::check('language')) {
                        $q->where(['ArticleTranslation.culture' => Configure::read('language.culture')]);
                    } else {
                        $q->where(['ArticleTranslation.language_id' => 0]);
                    }
                    return $q;
                },
            ])
            ->where(['status' => 1, 'is_home' => 1])->first();
        if (empty($article)) {
            throw new NotFoundException(__('Home Page not found'));
        }
        $this->set('article', $article);
    }

    /**
     * Page method
     *
     * @return \Cake\Http\Response|void
     */
    public function page($article_id)
    {
        $article = $this->Articles->findById($article_id)
            ->select([
                'id',
                'title'   => 'IFNULL(ArticleTranslation.title, Articles.title)',
                'slug'    => 'IFNULL(ArticleTranslation.slug, Articles.slug)',
                'excerpt' => 'IFNULL(ArticleTranslation.excerpt, Articles.excerpt)',
                'content' => 'IFNULL(ArticleTranslation.content, Articles.content)',
                'url'     => 'IFNULL(ArticleTranslation.url, Articles.url)',
                'sort_order',
                'created_at',
                'modified_at',
            ])
            ->contain([
                'ArticleTranslation' => function ($q) {
                    if (Configure::check('language')) {
                        $q->where(['ArticleTranslation.culture' => Configure::read('language.culture')]);
                    } else {
                        $q->where(['ArticleTranslation.language_id' => 0]);
                    }
                    return $q;
                },
            ])
            ->where(['status' => 1])->first();
        if (empty($article)) {
            throw new NotFoundException(__('Article not found'));
        }
        $this->set('article', $article);
    }

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $articles = $this->paginate($this->Articles);

        $this->set(compact('articles'));
    }

    /**
     * View method
     *
     * @param string|null $id Article id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $article = $this->Articles->get($id, [
            'contain' => [],
        ]);

        $this->set('article', $article);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $article = $this->Articles->newEntity();
        if ($this->request->is('post')) {
            $article_translations = [];
            if (isset($this->request->data['article_translations'])) {
                $article_translations = $this->request->getData('article_translations');
                unset($this->request->data['article_translations']);
            }
            $is_home = $this->request->getData('is_home');
            if ($is_home) {
                $this->Articles->updateAll(['is_home' => 0], ['is_home' => 1]);
            }
            $article->created_at = date('Y-m-d H:i:s');
            $article             = $this->Articles->patchEntity($article, $this->request->getData());
            if ($this->Articles->save($article)) {
                $article_id = $article->id;
                if (!empty($article_translations)) {
                    $this->loadModel('ArticleTranslations');
                    foreach ($article_translations as $key => $_translation) {
                        $article_translations[$key]['article_id'] = $article_id;
                    }
                    $articleTranslation  = $this->ArticleTranslations->newEntity();
                    $articleTranslation  = $this->ArticleTranslations->patchEntities($articleTranslation, $article_translations);
                    $articleTranslations = $this->ArticleTranslations->saveMany($articleTranslation);
                    $this->Articles->articleCache();
                }
                $this->Flash->success(__('The article has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The article could not be saved. Please, try again.'));
        }
        $articleLanguages = $this->languages;
        $system_languge_id = SYSTEM_LANGUAGE_ID;
        $this->set(compact('article', 'articleLanguages', 'system_languge_id'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Article id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $article = $this->Articles->get($id, [
            'contain' => ['ArticleTranslations'],
        ]);
        $article['article_translations'] = Hash::combine($article['article_translations'], '{n}.language_id', '{n}');
        if ($this->request->is(['patch', 'post', 'put'])) {
            $article_translations = [];
            if (isset($this->request->data['article_translations'])) {
                $article_translations = $this->request->getData('article_translations');
                unset($this->request->data['article_translations']);
            }
            $is_home = $this->request->getData('is_home');
            if ($is_home) {
                $this->Articles->updateAll(['is_home' => 0], ['is_home' => 1]);
            }
            $article->modified_at = date('Y-m-d H:i:s');
            $article              = $this->Articles->patchEntity($article, $this->request->getData());
            if ($this->Articles->save($article)) {
                $article_id = $article->id;
                if (!empty($article_translations)) {
                    $this->loadModel('ArticleTranslations');
                    foreach ($article_translations as $key => $_translation) {
                        $article_translations[$key]['article_id'] = $article_id;
                    }
                    $articleTranslation  = $this->ArticleTranslations->newEntity();
                    $articleTranslation  = $this->ArticleTranslations->patchEntities($articleTranslation, $article_translations);
                    $articleTranslations = $this->ArticleTranslations->saveMany($articleTranslation);
                    $this->Articles->articleCache();
                }
                $this->Flash->success(__('The article has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The article could not be saved. Please, try again.'));
        }
        $articleLanguages = $this->languages;
        $system_languge_id = SYSTEM_LANGUAGE_ID;
        $this->set(compact('article', 'articleLanguages', 'system_languge_id'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Article id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $article = $this->Articles->get($id);
        if ($this->Articles->delete($article)) {
            $this->loadModel('ArticleTranslations');
            $this->ArticleTranslations->deleteAll(['article_id' => $id]);
            $this->Flash->success(__('The article has been deleted.'));
        } else {
            $this->Flash->error(__('The article could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
