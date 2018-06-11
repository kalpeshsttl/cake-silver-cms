<?php
/**
 * @var \App\View\AppView $this
 * @var \Cake\Datasource\EntityInterface[]|\Cake\Collection\CollectionInterface $menuRegions
 */
$this->assign('title',__('Menu Regions'));
$this->Html->addCrumb(__('Menu'),'javascript:void(0);');
$this->Html->addCrumb(__('Menu Regions'));
?>
<div class="menuRegion index">
    <div class="card">
        <div class="page-header border-bottom border-dark mb-2 py-1">
            <h1 class="h5 d-inline"><?= __('Menu Regions') ?></h1>
            <div class="float-sm-right mt-2 mt-sm-0" role="group" aria-label="menuRegion nav">
                <?=$this->Html->link(
                    __('Add New Menu Region'),
                    ['action' => 'add'],
                    ['class' => 'btn btn-sm btn-outline-dark', 'title' => __('Add New Menu Region')]
                );?>
            </div>
        </div>
        <div class="table-responsive mb-2">
            <table class="table table-hover table-bordered mb-0">
                <thead class="thead-light">
                    <tr>
                        <th scope="col" width="8%"><?= $this->Paginator->sort('id',__('#ID')) ?></th>
                        <th scope="col" width="30%"><?= $this->Paginator->sort('region',__('Region')) ?></th>
                        <th scope="col" width="30%"><?= $this->Paginator->sort('slug') ?></th>
                        <th scope="col" width="14%"><?= $this->Paginator->sort('status') ?></th>
                        <th scope="col" class="actions" width="18%"><?= __('Actions') ?></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($menuRegions as $menuRegion): ?>
                    <tr>
                        <td><?= $this->Number->format($menuRegion->id) ?></td>
                        <td><?= h($menuRegion->region) ?></td>
                        <td><?= h($menuRegion->slug) ?></td>
                        <td><?= ($menuRegion->status == 1) ? __('Active') : __('Inactive'); ?></td>
                        <td class="actions">
                            <?= $this->Html->link('<i class="fas fa-bars"></i>', ['controller' => 'Menus', 'action' => 'index', $menuRegion->id],['class' => 'btn btn-sm btn-outline-dark', 'title' => __('Menu'), 'escape' => false]) ?>
                            <?= $this->Html->link('<i class="far fa-edit"></i>', ['action' => 'edit', $menuRegion->id],['class' => 'btn btn-sm btn-outline-dark', 'title' => __('Edit'), 'escape' => false]) ?>
                            <?= $this->Form->postLink('<i class="far fa-trash-alt"></i>', ['action' => 'delete', $menuRegion->id], ['confirm' => __('Are you sure you want to delete this Menu Region?', $menuRegion->id),'class' => 'btn btn-sm btn-outline-danger', 'title' => __('Delete'), 'escape' => false]) ?>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                    <?php if(count($menuRegions) == 0):?>
                    <tr>
                        <td colspan="5"><?= __('Record not found!'); ?></td>
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