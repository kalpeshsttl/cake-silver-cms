<?php
/**
 * @var \App\View\AppView $this
 * @var \Cake\Datasource\EntityInterface $menuRegion
 */
use Cake\Routing\Router;

$this->assign('title',__('Menu Location ( ' . $menuRegion->region . ' ) '));
$this->Html->addCrumb(__('Menu Locations'),['action'=>'index']);
$this->Html->addCrumb(__('Menu Location ( ' . $menuRegion->region . ' ) '));
?>
<div class="menuRegion view">
    <div class="card">
        <div class="page-header border-bottom border-dark mb-2 py-1">
            <h1 class="h5 d-inline"><?= __('Menu Location ( ' . $menuRegion->region . ' ) ') ?></h1>
            <div class="float-sm-right mt-2 mt-sm-0" role="group" aria-label="menuRegion nav">
                <?=$this->Html->link(
                    '<i class="fa fa-arrow-circle-left"></i>',
                    ['action' => 'index'],
                    ['class' => 'btn btn-sm btn-outline-dark','title' => __('Back to Menu Location'),'escape' => false]
                );?>
                <?= $this->Form->postLink(
                    '<i class="far fa-trash-alt"></i>',
                    ['action' => 'delete', $menuRegion->id],
                    ['confirm' => __('Are you sure you want to delete this Menu Location?', $menuRegion->id),'class' => 'btn btn-sm btn-outline-danger','title' => __('Delete'),'escape' => false]
                )?>
            </div>
        </div>
        <div class="card-body p-0">
            <dl class="row">
                <dt class="col-sm-3 col-lg-2 mb-1"><?= __('#ID') ?></dt>
                <dd class="col-sm-9 col-lg-10 mb-1"><?= $this->Number->format($menuRegion->id) ?></dd>
                <dt class="col-sm-3 col-lg-2 mb-1"><?= __('Location') ?></dt>
                <dd class="col-sm-9 col-lg-10 mb-1"><?= h($menuRegion->region) ?></dd>
                <dt class="col-sm-3 col-lg-2 mb-1"><?= __('Slug') ?></dt>
                <dd class="col-sm-9 col-lg-10 mb-1"><?= h($menuRegion->slug) ?></dd>
                <dt class="col-sm-3 col-lg-2 mb-1"><?= __('Status') ?></dt>
                <dd class="col-sm-9 col-lg-10 mb-1"><?= ($menuRegion->status == 1) ? __('Active') : __('Inactive'); ?></dd>
            </dl>
        </div>
    </div>
</div>
<div class="related-menus view">
    <div class="card">
        <div class="page-header border-bottom border-dark mb-2 py-1">
            <h1 class="h5 d-inline"><?= __('Related Menus') ?></h1>
        </div>
        <div class="card-body p-0">
            <div class="table-responsive mb-2">
                <table class="table table-hover table-bordered mb-0">
                    <thead class="thead-light">
                        <tr>
                            <th scope="col" width="8%"><?= __('#ID') ?></th>
                            <?php /*<th scope="col"><?= __('Menu Location Id') ?></th>*/ ?>
                            <th scope="col" width="20%"><?= __('Menu Title') ?></th>
                            <th scope="col" width="12%"><?= __('Menu Type') ?></th>
                            <th scope="col" width="18%"><?= __('Custom Link') ?></th>
                            <?php /*<th scope="col"><?= __('Object Type') ?></th>*/ ?>
                            <th scope="col" width="18%"><?= __('Article') ?></th>
                            <?php /*<th scope="col"><?= __('Module Id') ?></th>*/ ?>
                            <?php /*<th scope="col"><?= __('Redirection') ?></th>*/ ?>
                            <?php /*<th scope="col"><?= __('Sort Order') ?></th>*/ ?>
                            <th scope="col" width="8%"><?= __('Status') ?></th>
                            <th scope="col" class="actions" width="17%"><?= __('Actions') ?></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($menuRegion->menus)): ?>
                            <?php foreach ($menuRegion->menus as $menus): ?>
                            <tr>
                                <td><?= h($menus->id) ?></td>
                                <?php /*<td><?= h($menus->menu_region_id) ?></td>*/ ?>
                                <td><?= h($menus->menu_title) ?></td>
                                <td><?= h($menus->menu_type) ?></td>
                                <td><?= (!empty($menus->custom_link)) ? $this->Html->link($menus->custom_link,$menus->custom_link, ['target' => '_blank']) : ''; ?></td>
                                <?php /*<td><?= h($menus->object_type) ?></td>*/ ?>
                                <?php
                                $link = '';
                                if($menus->object_type == 'article' && $menus->has('article')):
                                    $link = '';
                                    if (!empty($menus->article->url)):
                                        $link = Router::url([
                                            'plugin'     => 'CakeSilverCms',
                                            'controller' => 'Articles',
                                            'action'     => 'page',
                                            'id' => $menus->article->id ], ['pass' => ['id'], '_full' => true]);
                                    else:
                                        $link = Router::url('/page/' . $menus->article->id, ['_full' => true]);
                                    endif;
                                endif;
                                ?>
                                <td><?= (!empty($link)) ? $this->Html->link($link, $link, ['target' => '_blank']) : '';?></td>
                                <?php /*<td><?= h($menus->module_id) ?></td>*/ ?>
                                <?php /*<td><?= h($menus->redirection) ?></td>*/ ?>
                                <?php /*<td><?= h($menus->sort_order) ?></td>*/ ?>
                                <td><?= ($menus->status == 1) ? __('Active') : __('Inactive');?></td>
                                <td class="actions">
                                    <?= $this->Html->link('<i class="fas fa-eye"></i>', ['controller' => 'Menus', 'action' => 'view', $menuRegion->id, $menus->id],['class' => 'btn btn-sm btn-outline-dark', 'title' => __('View'), 'escape' => false]) ?>
                                    <?= $this->Html->link('<i class="far fa-edit"></i>', ['controller' => 'Menus', 'action' => 'edit', $menuRegion->id, $menus->id],['class' => 'btn btn-sm btn-outline-dark', 'title' => __('Edit'), 'escape' => false]) ?>
                                    <?= $this->Form->postLink('<i class="far fa-trash-alt"></i>', ['controller' => 'Menus', 'action' => 'delete', $menuRegion->id, $menus->id], ['confirm' => __('Are you sure you want to delete this Menus?', $menus->id),'class' => 'btn btn-sm btn-outline-danger', 'title' => __('Delete'), 'escape' => false]) ?>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="7"><?= __('Record not found!'); ?></td>
                            </tr>
                        <?php endif;?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
