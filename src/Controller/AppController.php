<?php
namespace CakeSilverCms\Controller;

use App\Controller\AppController as BaseController;
use Cake\Event\Event;

class AppController extends BaseController
{
    public function beforeRender(Event $event)
    {
        $this->viewBuilder()->setClassName('CakeSilverCms.App');
    }
}
