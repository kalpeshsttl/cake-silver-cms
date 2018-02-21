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
?>
<!DOCTYPE html>
<html lang="en">
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
        <?=$this->Flash->render();?>
        <?=$this->element('CakeSilverCms.header')?>
        <div class="container-fluid">
            <div class="row navbar-expand-md">
                <div class="col-md-3 col-lg-2 bg-light sidebar collapse navbar-collapse mr-auto" id="sidebar">
                    <!-- sidebar -->
                    <?=$this->element('CakeSilverCms.sidebar')?>
                    <!-- /sidebar -->
                </div>
                <main role="main" class="col-md-9 col-lg-10 ml-sm-auto p-0">
                    <!-- breadcrumb -->
                    <?=$this->element('CakeSilverCms.breadcrumb')?>
                    <!-- /breadcrumb -->
                    <div class="pt-3 px-4">
                        <div class="justify-content-between pb-2 mb-3">
                            <!-- content top -->
                            <?=$this->fetch('content-top')?>
                            <!-- /content top -->
                            <!-- content -->
                            <?=$this->fetch('content')?>
                            <!-- /content -->
                            <!-- content bottom -->
                            <?=$this->fetch('content-bottom')?>
                            <!-- /content bottom -->
                        </div>
                    </div>
                </main>
            </div>
        </div>
        <?=$this->element('CakeSilverCms.footer')?>
        <!-- bottom style -->
        <?=$this->fetch('bottom-style')?>
        <!-- /bottom style -->
        <!-- bottom script -->
        <?=$this->Html->script([
            'CakeSilverCms.jquery-2.1.4.min.js',
            'CakeSilverCms.bootstrap/popper.min.js',
            'CakeSilverCms.bootstrap/bootstrap.min.js',
            'CakeSilverCms.bootstrap/bootstrap.bundle.min.js',
            'CakeSilverCms.underscore-min.js',
            'CakeSilverCms.jqueryvalidate/jquery.validate.min.js',
            'CakeSilverCms.jqueryvalidate/additional-methods.min.js',
            'CakeSilverCms.main.js'
        ]);?>
        <?=$this->fetch('bottom-script')?>
        <!-- /bottom script -->
    </body>
</html>