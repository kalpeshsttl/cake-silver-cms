<?php
namespace CakeSilverCms\Controller;

use App\Controller\AppController as BaseController;
use Cake\Cache\Cache;
use Cake\Core\Configure;
use Cake\Event\Event;
use Cake\Utility\Hash;

class AppController extends BaseController
{
    /**
     * Initialization hook method.
     *
     * Use this method to add common initialization code like loading components.
     *
     * e.g. `$this->loadComponent('Security');`
     *
     * @return void
     */
    public function initialize()
    {
        parent::initialize();
    }

    public function beforeFilter(Event $event)
    {
        //Get and Set Language
        $defaultLanguage = '';
        $languages = Cache::read('silver-language', 'languages');
        if ($languages !== false) {
            $dLang = Hash::extract($languages,'{n}[is_default=1].culture');
            if(!empty($dLang)) {
                $defaultLanguage = $dLang[0];   
            }
        }
        $language = (isset($this->request->params['language'])) ? $this->request->params['language'] : $defaultLanguage;
        $this->request->params['language'] = $language;

        parent::beforeFilter($event);
        //Get Language
        $languages = Cache::read('silver-language', 'languages');
        if ($languages !== false) {
            $languages = Hash::combine($languages, '{n}.culture', '{n}');
            if (isset($languages[$language])) {
                Configure::write('language', $languages[$language]);
            }
        }
    }

    public function beforeRender(Event $event)
    {
        $this->viewBuilder()->setClassName('CakeSilverCms.' . DEFAULT_VIEW);
        $this->set('Configure', new Configure);
    }
}
