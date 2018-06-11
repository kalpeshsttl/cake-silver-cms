<?php
/**
 * @var \App\View\AppView $this
 * @var \Cake\Datasource\EntityInterface[]|\Cake\Collection\CollectionInterface $languages
 */
$this->assign('title',__('Languages'));
$this->Html->addCrumb(__('Languages'));
?>
<div class="language index">
    <div class="card">
        <div class="page-header border-bottom border-dark mb-2 py-1">
            <h1 class="h5 d-inline"><?= __('Languages') ?></h1>
            <div class="float-sm-right mt-2 mt-sm-0" role="group" aria-label="language nav">
                <?=$this->Html->link(
                    __('Add New Language'),
                    ['action' => 'add'],
                    ['class' => 'btn btn-sm btn-outline-dark', 'title' => __('Add New Language')]
                );?>
            </div>
        </div>
        <div class="table-responsive mb-2">
            <table class="table table-hover table-bordered mb-0">
                <thead class="thead-light">
                    <tr>
                        <th scope="col"><?= $this->Paginator->sort('id',__('#ID')) ?></th>
                        <th scope="col"><?= $this->Paginator->sort('name') ?></th>
                        <th scope="col"><?= $this->Paginator->sort('culture') ?></th>
                        <th scope="col"><?= $this->Paginator->sort('is_default',__('Default')) ?></th>
                        <th scope="col"><?= $this->Paginator->sort('direction',__('HTML Direction')) ?></th>
                        <?php /*<th scope="col"><?= $this->Paginator->sort('is_system') ?></th>*/ ?>
                        <th scope="col"><?= $this->Paginator->sort('status') ?></th>
                        <th scope="col" class="actions"><?= __('Actions') ?></th>
                    </tr>
                </thead>
                <tbody>
                    <?php $htmlDirection = ['ltr'=>'Left To Right','rtl' => 'Right To Left'];?>
                    <?php foreach ($languages as $language): ?>
                    <tr>
                        <td><?= $this->Number->format($language->id) ?></td>
                        <td><?= h($language->name) ?></td>
                        <td><?= h($language->culture) ?></td>
                        <td><?= ($language->is_default == 1) ? __('Yes') : __('No') ?></td>
                        <td><?= h($htmlDirection[$language->direction]); ?>
                        <?php /*<td><?= ($language->is_system == 1) ? __('Yes') : __('No') ?></td> */ ?>
                        <td><?= ($language->status == 1) ? __('Active') : __('Inactive') ?></td>
                        <td class="actions">
                            <?= '';//$this->Html->link('<i class="fas fa-eye"></i>', ['action' => 'view', $language->id],['class' => 'btn btn-sm btn-outline-dark', 'title' => __('View'), 'escape' => false]) ?>
                            <?= $this->Html->link('<i class="far fa-edit"></i>', ['action' => 'edit', $language->id],['class' => 'btn btn-sm btn-outline-dark', 'title' => __('Edit'), 'escape' => false]) ?>
                            <?php if($language->is_default == 0 && $language->is_system == 0){?>
                                <?= $this->Form->postLink('<i class="far fa-trash-alt"></i>', ['action' => 'delete', $language->id], ['confirm' => __('Are you sure you want to delete this Language?', $language->id),'class' => 'btn btn-sm btn-outline-danger', 'title' => __('Delete'), 'escape' => false]) ?>
                            <?php } ?>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                    <?php if(count($languages) == 0):?>
                    <tr>
                        <td colspan="7"><?= __('Language not found!'); ?></td>
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