<?php
$controller = $this->request->params['controller'];
$action     = $this->request->params['action'];
$menus      = [
    [
        'title'   => '<i class="fa fa-tachometer-alt"></i><span class="nav-text">' . __('Dashboard') . '</span>',
        'url'     => ['controller' => 'Dashboard', 'action' => 'index'],
        'options' => ['class' => 'nav-link ' . ((preg_match('/Dashboard/', $controller)) ? 'active' : ''), 'escape' => false],
    ],
    [
        'title'   => '<i class="far fa-newspaper"></i><span class="nav-text">' . __('Articles') . '</span>',
        'url'     => ['controller' => 'Articles', 'action' => 'index'],
        'options' => ['class' => 'nav-link ' . ((preg_match('/Articles/', $controller)) ? 'active' : ''), 'escape' => false],
        'submenu' => [
            [
                'title'   => '<i class="far fa-edit"></i><span class="nav-text">' . __('Add New Article') . '</span>',
                'url'     => ['controller' => 'Articles', 'action' => 'add'],
                'options' => ['class' => 'nav-link ' . ((preg_match('/Articles/', $controller) && preg_match('/add/', $action)) ? 'active' : ''), 'escape' => false],
            ],
        ],
    ],
    [
        'title'   => '<i class="fas fa-bars"></i><span class="nav-text">' . __('Menu') . '</span>',
        'url'     => ['controller' => 'MenuRegions', 'action' => 'index'],
        'options' => ['class' => 'nav-link ' . ((preg_match('/MenuRegions|Menus/', $controller)) ? 'active' : ''), 'escape' => false],
        'submenu' => [
            [
                'title'   => '<i class="fas fa-plus"></i><span class="nav-text">' . __('Add New Menu Region') . '</span>',
                'url'     => ['controller' => 'MenuRegions', 'action' => 'add'],
                'options' => ['class' => 'nav-link ' . ((preg_match('/MenuRegions/', $controller) && preg_match('/add/', $action)) ? 'active' : ''), 'escape' => false],
            ],
            [
                'title'   => '<i class="fas fa-plus"></i><span class="nav-text">' . __('Add New Menu') . '</span>',
                'url'     => ['controller' => 'Menus', 'action' => 'add'],
                'options' => ['class' => 'nav-link ' . ((preg_match('/Menus/', $controller) && preg_match('/add/', $action)) ? 'active' : ''), 'escape' => false],
            ],
        ],
    ],
    [
        'title'   => '<i class="fas fa-language"></i><span class="nav-text">' . __('Languages') . '</span>',
        'url'     => ['controller' => 'Languages', 'action' => 'index'],
        'options' => ['class' => 'nav-link ' . ((preg_match('/Languages/', $controller)) ? 'active' : ''), 'escape' => false],
        'submenu' => [
            [
                'title'   => '<i class="fas fa-plus"></i><span class="nav-text">' . __('Add New Language') . '</span>',
                'url'     => ['controller' => 'Languages', 'action' => 'add'],
                'options' => ['class' => 'nav-link ' . ((preg_match('/Languages/', $controller) && preg_match('/add/', $action)) ? 'active' : ''), 'escape' => false],
            ],
        ],
    ],

];
?>
<ul class="nav flex-column">
	<?=$this->Menu->printMenu($menus);?>
</ul>