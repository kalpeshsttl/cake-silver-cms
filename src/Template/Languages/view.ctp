<?php
/**
 * @var \App\View\AppView $this
 * @var \Cake\Datasource\EntityInterface $language
 */
$this->assign('title',__('Language ( ' . $language->name . ' ) '));
$this->Html->addCrumb(__('Languages'),['action'=>'index']);
$this->Html->addCrumb(__('Language ( ' . $language->name . ' ) '));
?>
<div class="language view">
    <div class="card">
        <div class="page-header border-bottom border-dark mb-2 py-1">
            <h1 class="h5 d-inline"><?= __('Language ( ' . $language->name . ' ) ') ?></h1>
            <div class="float-sm-right mt-2 mt-sm-0" role="group" aria-label="language nav">
                <?=$this->Html->link(
                    '<i class="fa fa-arrow-circle-left"></i>',
                    ['action' => 'index'],
                    ['class' => 'btn btn-sm btn-outline-dark','title' => __('Back to Language'),'escape' => false]
                );?>
                <?php if($language->is_default == 0 && $language->is_system == 0){?>
                    <?= $this->Form->postLink(
                        '<i class="far fa-trash-alt"></i>',
                        ['action' => 'delete', $language->id],
                        ['confirm' => __('Are you sure you want to delete this Language?', $language->id),'class' => 'btn btn-sm btn-outline-danger','title' => __('Delete'),'escape' => false]
                    )?>
                <?php } ?>
            </div>
        </div>
        <div class="card-body p-0">
            <dl class="row">
                <dt class="col-sm-3 col-lg-2 mb-1"><?= __('#Id') ?></dt>
                <dd class="col-sm-9 col-lg-10 mb-1"><?= $this->Number->format($language->id) ?></dd>
                <dt class="col-sm-3 col-lg-2 mb-1"><?= __('Name') ?></dt>
                <dd class="col-sm-9 col-lg-10 mb-1"><?= h($language->name) ?></dd>
                <dt class="col-sm-3 col-lg-2 mb-1"><?= __('Culture') ?></dt>
                <dd class="col-sm-9 col-lg-10 mb-1"><?= h($language->culture) ?></dd>
                <dt class="col-sm-3 col-lg-2 mb-1"><?= __('Default') ?></dt>
                <dd class="col-sm-9 col-lg-10 mb-1"><?= ($language->is_default == 1) ? __('Yes') : __('No'); ?></dd>
                <dt class="col-sm-3 col-lg-2 mb-1"><?= __('HTML Direction') ?></dt>
                <?php $htmlDirection = ['ltr'=>'Left To Right','rtl' => 'Right To Left'];?>
                <dd class="col-sm-9 col-lg-10 mb-1"><?= h($htmlDirection[$language->direction]); ?></dd>
                <?php /*<dt class="col-sm-3 col-lg-2 mb-1"><?= __('Is System') ?></dt>
                <dd class="col-sm-9 col-lg-10 mb-1"><?= ($language->is_system == 1) ? __('Yes') : __('No'); ?></dd>*/ ?>
                <dt class="col-sm-3 col-lg-2 mb-1"><?= __('Status') ?></dt>
                <dd class="col-sm-9 col-lg-10 mb-1"><?= ($language->status == 1) ? __('Active') : __('Inactive'); ?></dd>
            </dl>
        </div>
    </div>
</div>
