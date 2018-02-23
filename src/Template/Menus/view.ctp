<?php
/**
 * @var \App\View\AppView $this
 * @var \Cake\Datasource\EntityInterface $menu
 */
use Cake\Routing\Router;

$this->assign('title',__('Menu ( ' . $menu->menu_title . ' ) '));
$this->Html->addCrumb(__('Menus'),['action'=>'index']);
$this->Html->addCrumb(__('Menu ( ' . $menu->menu_title . ' ) '));
?>
<div class="menu view">
    <div class="card">
        <div class="page-header border-bottom border-dark mb-2 py-1">
            <h1 class="h5 d-inline"><?= __('Menu ( ' . $menu->menu_title . ' ) ') ?></h1>
            <div class="float-sm-right mt-2 mt-sm-0" role="group" aria-label="menu nav">
                <?=$this->Html->link(
                    '<i class="fa fa-arrow-circle-left"></i>',
                    ['action' => 'index', $menu->menu_region_id],
                    ['class' => 'btn btn-sm btn-outline-dark','title' => __('Back to Menu'),'escape' => false]
                );?>
                <?= $this->Form->postLink(
                    '<i class="far fa-trash-alt"></i>',
                    ['action' => 'delete', $menu->id],
                    ['confirm' => __('Are you sure you want to delete this Menu?', $menu->id),'class' => 'btn btn-sm btn-outline-danger','title' => __('Delete'),'escape' => false]
                )?>
            </div>
        </div>
        <div class="card-body p-0">
            <dl class="row">
                <dt class="col-sm-3 col-lg-2 mb-1"><?= __('#ID') ?></dt>
                <dd class="col-sm-9 col-lg-10 mb-1"><?= $this->Number->format($menu->id) ?></dd>
                <dt class="col-sm-3 col-lg-2 mb-1"><?= __('Menu Location') ?></dt>
                <dd class="col-sm-9 col-lg-10 mb-1"><?= $menu->has('menu_region') ? $this->Html->link($menu->menu_region->region, ['controller' => 'MenuRegions', 'action' => 'view', $menu->menu_region->id]) : '' ?></dd>
                <dt class="col-sm-3 col-lg-2 mb-1"><?= __('Menu Title') ?></dt>
                <dd class="col-sm-9 col-lg-10 mb-1"><?= h($menu->menu_title) ?></dd>
                <dt class="col-sm-3 col-lg-2 mb-1"><?= __('Menu Type') ?></dt>
                <dd class="col-sm-9 col-lg-10 mb-1"><?= h($menuType[$menu->menu_type]) ?></dd>
                <dt class="col-sm-3 col-lg-2 mb-1 <?= ($menu->menu_type != 'custom')? 'd-none' : ''; ?>"><?= __('Custom Link') ?></dt>
                <dd class="col-sm-9 col-lg-10 mb-1 <?= ($menu->menu_type != 'custom')? 'd-none' : ''; ?>"><?= (!empty($menu->custom_link)) ? $this->Html->link($menu->custom_link,$menu->custom_link, ['target' => '_blank']) : ''; ?></dd>
                <?php /*<dt class="col-sm-3 col-lg-2 mb-1"><?= __('Object Type') ?></dt>
                <dd class="col-sm-9 col-lg-10 mb-1"><?= h($menu->object_type) ?></dd>*/ ?>
                <dt class="col-sm-3 col-lg-2 mb-1 <?= ($menu->menu_type != 'object')? 'd-none' : ''; ?>"><?= __('Article') ?></dt>
                <?php
                $link = '';
                if($menu->object_type == 'article' && $menu->has('article')):
                    $link = '';
                    if (!empty($menu->article->url)):
                        $link = Router::url([
                            'plugin'     => 'CakeSilverCms',
                            'controller' => 'Articles',
                            'action'     => 'page',
                            'id' => $menu->article->id ], ['pass' => ['id'], '_full' => true]);
                    else:
                        $link = Router::url('/page/' . $menu->article->id, ['_full' => true]);
                    endif;
                endif;
                ?>
                <dd class="col-sm-9 col-lg-10 mb-1 <?= ($menu->menu_type != 'object')? 'd-none' : ''; ?>"><?= (!empty($link)) ? $this->Html->link($link, $link, ['target' => '_blank']) : '';?></dd>
                <dt class="col-sm-3 col-lg-2 mb-1"><?= __('Redirection') ?></dt>
                <dd class="col-sm-9 col-lg-10 mb-1"><?= h($menuRedirection[$menu->redirection]) ?></dd>
                <?php /*<dt class="col-sm-3 col-lg-2 mb-1"><?= __('Module Id') ?></dt>
                <dd class="col-sm-9 col-lg-10 mb-1"><?= $this->Number->format($menu->module_id) ?></dd> */ ?>
                <?php /*<dt class="col-sm-3 col-lg-2 mb-1"><?= __('Sort Order') ?></dt>
                <dd class="col-sm-9 col-lg-10 mb-1"><?= $this->Number->format($menu->sort_order) ?></dd>*/?>
                <dt class="col-sm-3 col-lg-2 mb-1"><?= __('Status') ?></dt>
                <dd class="col-sm-9 col-lg-10 mb-1"><?= ($menu->status == 1) ? __('Active') : __('Inactive'); ?></dd>
            </dl>
        </div>
    </div>
</div>
