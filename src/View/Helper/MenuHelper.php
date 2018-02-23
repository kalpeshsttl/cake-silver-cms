<?php
namespace CakeSilverCms\View\Helper;

use Cake\ORM\TableRegistry;
use Cake\Routing\Router;
use Cake\View\Helper;
use Cake\View\View;

class MenuHelper extends Helper
{
    public $helpers = ['Html'];

    private $MenuRegions;

    private $menuType = [
        'custom' => 'Custom',
        'object' => 'Article',
        //'module' => 'Module',
    ];

    public function initialize(array $config)
    {
        // Plugin table
        $this->MenuRegions = TableRegistry::get('CakeSilverCms.MenuRegions');
    }

    public function getMenu($menu_region_slug)
    {
        $menuRegions = $this->MenuRegions->findBySlug($menu_region_slug)
            ->contain([
                'Menus' => function ($q) {
                    $q->contain(['Articles'])->where(['Menus.status' => 1]);
                    return $q;
                },
            ])->first();
        $menus = [];
        if (!empty($menuRegions) && $menuRegions->has('menus')) {
            $i = 0;
            foreach ($menuRegions->menus as $menu) {
            	$isShow  = true;
                $link    = '';
                $options = [
                	'link' => [
                    	'target' => '_self',
                	]
                ];
                if($menu->redirection == 'new-window'){
                	$options['link']['target'] = '_blank';
                }
                if ($menu->object_type == 'article' && $menu->has('article')) {
                	$isShow = false;
                	if($menu->article->status == 1){
                		$isShow = true;
	                    if (!empty($menu->article->url)) {
	                        $link = Router::url([
	                            'plugin'     => 'CakeSilverCms',
	                            'controller' => 'Articles',
	                            'action'     => 'page',
	                            'id'         => $menu->article->id], ['pass' => ['id'], '_full' => true]);
	                    } else {
	                        $link = Router::url('/page/' . $menu->article->id, ['_full' => true]);
	                    }
                	}
                } else if (!empty($menu->custom_link)) {
                    $link = Router::url($menu->custom_link, ['_full' => true]);
                }
                if($isShow){
	                $menus[$i] = [
	                    'id'    => $menu->id,
	                    'title' => $menu->menu_title,
	                    'type'  => $this->menuType[$menu->menu_type],
	                    'url'   => $link,
	                    'link'  => $this->Html->link($menu->menu_title, $link, $options['link']),
	                    'options' => $options,
	                ];
	                $i++;
            	}
            }
        }
        return $menus;
    }
}
