<?php
/**
 * @var \App\View\AppView $this
 * @var \Cake\Datasource\EntityInterface[]|\Cake\Collection\CollectionInterface $menus
 */
use Cake\Routing\Router;

$this->assign('title',__('Menus'));
$this->Html->addCrumb(__('Menu Locations'),['controller' => 'MenuRegions', 'action' => 'index']);
$this->Html->addCrumb(__('Menus'));
?>
<div class="menu index">
    <div class="card">
        <div class="page-header border-bottom border-dark mb-2 py-1">
            <h1 class="h5 d-inline"><?= __('Menus') ?></h1>
            <div class="float-sm-right mt-2 mt-sm-0" role="group" aria-label="menu nav">
                <?=$this->Html->link(
                    '<i class="fa fa-arrow-circle-left"></i>',
                    ['controller' => 'MenuRegions', 'action' => 'index'],
                    ['class' => 'btn btn-sm btn-outline-dark','title' => __('Back to Menu Locations'),'escape' => false]
                );?>
                <?=$this->Html->link(
                    __('Add New Menu'),
                    ['action' => 'add', $menu_region_id],
                    ['class' => 'btn btn-sm btn-outline-dark', 'title' => __('Add New Menu')]
                );?>
            </div>
        </div>
        <div class="table-responsive mb-2">
            <table class="table table-hover table-bordered mb-0">
                <thead class="thead-light">
                    <tr>
                        <th scope="col" width="8%"><?= $this->Paginator->sort('id',__('#ID')) ?></th>
                        <?php /*<th scope="col"><?= $this->Paginator->sort('menu_region_id') ?></th>*/ ?>
                        <th scope="col" width="20%"><?= $this->Paginator->sort('menu_title') ?></th>
                        <th scope="col" width="12%"><?= $this->Paginator->sort('menu_type') ?></th>
                        <th scope="col" width="18%"><?= $this->Paginator->sort('custom_link') ?></th>
                        <?php /*<th scope="col"><?= $this->Paginator->sort('object_type') ?></th>*/ ?> 
                        <th scope="col" width="18%"><?= $this->Paginator->sort('object_id',__('Article')) ?></th>
                        <?php /*<th scope="col"><?= $this->Paginator->sort('module_id') ?></th>*/ ?>
                        <?php /*<th scope="col"><?= $this->Paginator->sort('redirection') ?></th>*/ ?>
                        <?php /*<th scope="col"><?= $this->Paginator->sort('sort_order') ?></th>*/ ?>
                        <th scope="col" width="8%"><?= $this->Paginator->sort('status') ?></th>
                        <th scope="col" class="actions" width="16%"><?= __('Actions') ?></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($menus as $menu): ?>
                    <tr>
                        <td><?= $this->Number->format($menu->id) ?></td>
                        <?php /*<td><?= $menu->has('menu_region') ? $this->Html->link($menu->menu_region->region, ['controller' => 'MenuRegions', 'action' => 'view', $menu->menu_region->id]) : '' ?></td>*/ ?>
                        <td><?= h($menu->menu_title) ?></td>
                        <td><?= h($menuType[$menu->menu_type]) ?></td>
                        <td><?= (!empty($menu->custom_link)) ? $this->Html->link($menu->custom_link,$menu->custom_link, ['target' => '_blank']) : ''; ?></td>
                        <?php /*<td><?= h($menu->object_type) ?></td>*/ ?>
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
                        <td><?= (!empty($link)) ? $this->Html->link($link, $link, ['target' => '_blank']) : '';?></td>
                        <?php /*<td><?= $this->Number->format($menu->module_id) ?></td>*/ ?>
                        <?php /*<td><?= h($menuRedirection[$menu->redirection]) ?></td>*/ ?>
                        <?php /*<td><?= $this->Number->format($menu->sort_order) ?></td>*/ ?>
                        <td><?= ($menu->status == 1) ? __('Active') : __('Inactive');?></td>
                        <td class="actions">
                            <?= $this->Html->link('<i class="fas fa-eye"></i>', ['action' => 'view', $menu_region_id, $menu->id],['class' => 'btn btn-sm btn-outline-dark', 'title' => __('View'), 'escape' => false]) ?>
                            <?= $this->Html->link('<i class="far fa-edit"></i>', ['action' => 'edit', $menu_region_id, $menu->id],['class' => 'btn btn-sm btn-outline-dark', 'title' => __('Edit'), 'escape' => false]) ?>
                            <?= $this->Form->postLink('<i class="far fa-trash-alt"></i>', ['action' => 'delete', $menu_region_id, $menu->id], ['confirm' => __('Are you sure you want to delete this Menu?', $menu->id),'class' => 'btn btn-sm btn-outline-danger', 'title' => __('Delete'), 'escape' => false]) ?>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                    <?php if(count($menus) == 0):?>
                    <tr>
                        <td colspan="7"><?= __('Record not found!'); ?></td>
                    </tr>
                    <?php endif;?>
                </tbody>
            </table>
        </div>
        <div class="paginator">
            <!-- <p><?= $this->Paginator->counter(['format' => __('Page  of , showing  record(s) out of  total')]) ?></p> -->
            <ul class="pagination my-2">
                <?= $this->Paginator->first('<<') ?>
                <?= $this->Paginator->prev('<') ?>
                <?= $this->Paginator->numbers() ?>
                <?= $this->Paginator->next('>') ?>
                <?= $this->Paginator->last('>>') ?>
            </ul>
        </div>
    </div>
</div>