<?php
namespace CakeSilverCms\View\Helper;

use Cake\Core\Configure;
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
                    $q->select([
                        'Menus.id',
                        'Menus.menu_region_id',
                        'menu_title' => 'IFNULL(MenuTranslation.menu_title, Menus.menu_title)',
                        'Menus.menu_type',
                        'Menus.custom_link',
                        'Menus.object_type',
                        'Menus.object_id',
                        'Menus.module_id',
                        'Menus.redirection',
                        'Menus.sort_order',
                        'Menus.status',
                    ])->contain([
                        'Articles'        => function ($q) {
                            $q->select(['id', 'url']);
                            $q->where(['Articles.status' => 1]);
                            return $q;
                        },
                        'MenuTranslation' => function ($q) {
                            if (Configure::check('language')) {
                                $q->where(['MenuTranslation.culture' => Configure::read('language.culture')]);
                            } else {
                                $q->where(['MenuTranslation.language_id' => 0]);
                            }
                            return $q;
                        },
                    ])->where([
                        'Menus.status' => 1,
                    ])->order([
                        'Menus.sort_order' => 'ASC',
                    ]);
                    return $q;
                },
            ])->first();
        $menus = [];
        if (!empty($menuRegions) && $menuRegions->has('menus')) {
            $i = 0;
            foreach ($menuRegions->menus as $menu) {
                $isShow  = false;
                $link    = '';
                $options = [
                    'link' => [
                        'target' => '_self',
                    ],
                ];
                if ($menu->redirection == 'new-window') {
                    $options['link']['target'] = '_blank';
                }
                if ($menu->object_type == 'article' && $menu->has('article')) {
                    $isShow  = true;
                    $lOption = [
                        'plugin'     => 'CakeSilverCms',
                        'controller' => 'Articles',
                        'action'     => 'page',
                        'id'         => $menu->article->id,
                    ];
                    $link = Router::url($lOption, ['pass' => ['id'], '_full' => true]);
                } else if (!empty($menu->custom_link)) {
                    $isShow = true;
                    $link   = Router::url($menu->custom_link, ['_full' => true]);
                }
                if ($isShow) {
                    $menus[$i] = [
                        'id'      => $menu->id,
                        'title'   => $menu->menu_title,
                        'type'    => $this->menuType[$menu->menu_type],
                        'url'     => $link,
                        'link'    => $this->Html->link($menu->menu_title, $link, $options['link']),
                        'options' => $options,
                    ];
                    $i++;
                }
            }
        }
        return $menus;
    }

    public function printMenu($menus, $is_sub = false)
    {
        $menuStr = '';
        if (!empty($menus)) {
            foreach ($menus as $menu) {
                $menuStr .= '<li class="nav-item">';
                $menuStr .= $this->Html->link($menu['title'], $menu['url'], $menu['options']);
                if (!empty($menu['submenu'])) {
                    $menuStr .= '<ul class="nav flex-column pl-3 nav-submenu">';
                    $menuStr .= $this->printMenu($menu['submenu'], true);
                    $menuStr .= '</ul>';
                }
                $menuStr .= '</li>';
            }
        }
        return $menuStr;
    }
}
