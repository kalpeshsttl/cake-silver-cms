<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 */

$lang = 'en';
$dir = 'ltr';
if($Configure::check('language')){
    $lang = $Configure::read('language.culture');
    $dir = $Configure::read('language.direction');
}

?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?=$lang;?>" lang="<?=$lang;?>" dir="<?=$dir;?>">
    <head>
        <?=$this->Html->charset()?>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title><?= $this->fetch('title'); ?></title>
        <?= $this->Html->meta('icon'); ?>
        <?= $this->fetch('meta');?>
        <!-- head style -->
        <?= $this->Html->css([
            'CakeSilverCms.fontawesome/fontawesome-all.min.css',
            'CakeSilverCms.bootstrap/bootstrap.min.css',
            'CakeSilverCms.style.css',
        ]);?>
        <?= $this->fetch('head-style'); ?>
        <!-- /head style -->
        <!-- head script -->
        <?=$this->Html->script([]);?>
        <?=$this->fetch('head-script')?>
        <!-- /head script -->
    </head>
    <body>
        <!-- header -->
        <header class="sticky-top bg-dark">
            <nav class="navbar navbar-expand-sm navbar-dark p-0">
                <button class="navbar-toggler m-1 px-1 py-0 bg-dark" type="button" data-toggle="collapse" data-target="#top-nav" aria-controls="top-nav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse mr-auto" id="top-nav">
                    <ul class="navbar-nav px-3 pb-1">
                        <?php $topNav = $this->Menu->getMenu('top-menu'); ?>
                        <?php if(!empty($topNav)): ?>
                            <?php foreach ($topNav as $nav): ?>
                                <li class="nav-item">
                                    <?= $this->Html->link($nav['title'], $nav['url'], $nav['options']['link'] + ['class' => 'nav-link px-2 mr-1']); ?>
                                </li>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </ul>
                </div>
            </nav>
        </header>
        <!-- /header -->
        <div class="container-fluid">
            <div class="row">
                <main role="main" class="col-md-9 col-lg-10 ml-sm-auto p-0">
                    <div class="pt-3 px-4">
                        <div class="justify-content-between pb-2 mb-3">
                            <?=$this->fetch('content')?>
                        </div>
                    </div>
                </main>
                <div class="col-md-3 col-lg-2 bg-light mr-auto">
                    <nav>
                        <div>
                            <ul class="nav flex-column">
                                <?php $sidebarNav = $this->Menu->getMenu('sidebar-menu'); ?>
                                <?php if(!empty($sidebarNav)): ?>
                                    <?php foreach ($sidebarNav as $nav): ?>
                                        <li class="nav-item">
                                            <?= $this->Html->link($nav['title'], $nav['url'], $nav['options']['link'] + ['class' => 'nav-link px-2 mr-1']); ?>
                                        </li>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </ul>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
        <footer class="container-fluid bg-light fixed-bottom">
            <div class="row py-1">
                <div class="col-md-8 mr-auto">
                    <ul class="d-flex flex-row navbar-nav">
                        <?php $bottomNav = $this->Menu->getMenu('footer-menu'); ?>
                        <?php if(!empty($bottomNav)): ?>
                            <?php foreach ($bottomNav as $nav): ?>
                                <li class="nav-item">
                                    <?= $this->Html->link($nav['title'], $nav['url'], $nav['options']['link'] + ['class' => 'nav-link px-2 mr-1']); ?>
                                </li>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </ul>
                </div>
                <div class="col-md-4 ml-sm-auto py-2">
                    © <?= date('Y'); ?> <a href="https://www.silvertouch.com/" target="_blank">Silver Touch Technologies Ltd</a>
                </div>
            </div>
        </footer>
        <!-- bottom style -->
        <?=$this->fetch('bottom-style')?>
        <!-- /bottom style -->
        <!-- bottom script -->
        <?=$this->Html->script([
            'CakeSilverCms.jquery-2.1.4.min.js',
            'CakeSilverCms.bootstrap/popper.min.js',
            'CakeSilverCms.bootstrap/bootstrap.min.js',
            'CakeSilverCms.bootstrap/bootstrap.bundle.min.js',
            'CakeSilverCms.main.js'
        ]);?>
        <?=$this->fetch('bottom-script')?>
        <!-- /bottom script -->
    </body>
</html>