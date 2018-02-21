<?php
/**
 * @var \App\View\AppView $this
 * @var \Cake\Datasource\EntityInterface $article
 */
$this->Html->addCrumb(__('Articles'),['action'=>'index']);
$this->Html->addCrumb(__('Article ( ' . $article->title . ' ) '));
?>
<div class="article view">
    <div class="card">
        <div class="page-header border-bottom border-dark mb-2 py-1">
            <h1 class="h5 d-inline"><?= __('Article ( ' . $article->title . ' ) ') ?></h1>
            <div class="float-sm-right mt-2 mt-sm-0" role="group" aria-label="article nav">
                <?=$this->Html->link(
                    '<i class="fa fa-arrow-circle-left"></i>',
                    ['action' => 'index'],
                    ['class' => 'btn btn-sm btn-outline-dark','title' => __('Back to Article'),'escape' => false]
                );?>
                <?= $this->Form->postLink(
                    '<i class="far fa-trash-alt"></i>',
                    ['action' => 'delete', $article->id],
                    ['confirm' => __('Are you sure you want to delete this Article?', $article->id),'class' => 'btn btn-sm btn-outline-danger','title' => __('Delete'),'escape' => false]
                )?>
            </div>
        </div>
        <div class="card-body p-0">
            <dl class="row">
                <dt class="col-sm-3 col-lg-2 mb-1"><?= __('Slug') ?></dt>
                <dd class="col-sm-9 col-lg-10 mb-1"><?= h($article->slug) ?></dd>
                <dt class="col-sm-3 col-lg-2 mb-1"><?= __('Url') ?></dt>
                <dd class="col-sm-9 col-lg-10 mb-1"><?= h($article->url) ?></dd>
                <dt class="col-sm-3 col-lg-2 mb-1"><?= __('Id') ?></dt>
                <dd class="col-sm-9 col-lg-10 mb-1"><?= $this->Number->format($article->id) ?></dd>
                <dt class="col-sm-3 col-lg-2 mb-1"><?= __('Sort Order') ?></dt>
                <dd class="col-sm-9 col-lg-10 mb-1"><?= $this->Number->format($article->sort_order) ?></dd>
                <dt class="col-sm-3 col-lg-2 mb-1"><?= __('Created At') ?></dt>
                <dd class="col-sm-9 col-lg-10 mb-1"><?= h($article->created_at) ?></dd>
                <dt class="col-sm-3 col-lg-2 mb-1"><?= __('Modified At') ?></dt>
                <dd class="col-sm-9 col-lg-10 mb-1"><?= h($article->modified_at) ?></dd>
                <dt class="col-sm-3 col-lg-2 mb-1"><?= __('Status') ?></dt>
                <dd class="col-sm-9 col-lg-10 mb-1"><?= $article->status ? __('Yes') : __('No'); ?></dd>
                <dt class="col-sm-3 col-lg-2 mb-1"><?= __('Title') ?></dt>
                <dd class="col-sm-9 col-lg-10 mb-1"><?= $this->Text->autoParagraph(h($article->title)); ?></dd>
                <dt class="col-sm-3 col-lg-2 mb-1"><?= __('Excerpt') ?></dt>
                <dd class="col-sm-9 col-lg-10 mb-1"><?= $this->Text->autoParagraph(h($article->excerpt)); ?></dd>
                <dt class="col-sm-3 col-lg-2 mb-1"><?= __('Content') ?></dt>
                <dd class="col-sm-9 col-lg-10 mb-1"><?= $this->Text->autoParagraph(h($article->content)); ?></dd>
            </dl>
        </div>
    </div>
</div>
