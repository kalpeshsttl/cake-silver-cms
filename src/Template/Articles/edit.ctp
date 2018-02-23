<?php
/**
 * @var \App\View\AppView $this
 * @var \Cake\Datasource\EntityInterface $article
 */
$this->assign('title',__('Edit Article ( ' . $article->title .' ) '));
$this->Html->addCrumb(__('Articles'),['action'=>'index']);
$this->Html->addCrumb(__('Edit Article ( ' . $article->title .' ) '));
?>
<div class="article edit form">
    <div class="card">
        <div class="page-header border-bottom border-dark mb-2 py-1">
            <h1 class="h5 d-inline"><?= __('Edit Article  ( ' . $article->title .' ) ') ?></h1>
            <div class="float-sm-right mt-2 mt-sm-0" role="group" aria-label="article nav">
                <?=$this->Html->link(
                    '<i class="fa fa-arrow-circle-left"></i>',
                    ['action' => 'index'],
                    ['class' => 'btn btn-sm btn-outline-dark','title' => __('Back to Articles'),'escape' => false]
                );?>
                <?= $this->Form->postLink(
                    '<i class="far fa-trash-alt"></i>',
                    ['action' => 'delete', $article->id],
                    ['confirm' => __('Are you sure you want to delete this Article?', $article->id),'class' => 'btn btn-sm btn-outline-danger','title' => __('Delete'),'escape' => false]
                )?>
            </div>
        </div>
        <div class="card-body p-0">
            <?= $this->Form->create($article,['id' => 'article-edit-frm']); ?>
            <?= $this->Form->control('title',['type'=>'text']); ?>
            <?= '';//$this->Form->control('slug'); ?>
            <?= '';//$this->Form->control('excerpt'); ?>
            <?= $this->Form->control('content'); ?>
            <?= $this->Form->control('url'); ?>
            <?= '';//$this->Form->control('sort_order'); ?>
            <?= $this->Form->control('status'); ?>
            <?= '';//$this->Form->control('created_at'); ?>
            <?= '';//$this->Form->control('modified_at'); ?>
            <?= $this->Form->button(__('Submit'),['class' => 'btn btn-sm btn-outline-primary']); ?>
            <?= $this->Html->link(__('Cancel'),['action' => 'index'],['class' => 'btn btn-sm btn-outline-dark ml-1']); ?>
            <?= $this->Form->end(); ?>
        </div>
    </div>
</div>
<?php $this->Html->css(['CakeSilverCms.editor/editor.css'],['block'=>'head-style']);?>
<?php $this->Html->script(['CakeSilverCms.editor/editor.js'],['block'=>'bottom-script']);?>
<?php $this->append('bottom-script');?>
<script>
(function($){
    $(document).ready(function(){
        $('#content').Editor();
        $('#content').Editor("setText",$("#content").val());
        if(typeof $.validator !== "undefined"){
            $("#article-edit-frm").validate({
                rules:{
                    'content':{
                        required: function(element) {
                            $(element).val($(element).Editor("getText"));
                            return ($(element).val() == '') ? true : false;
                        }
                    }
                },
                submitHandler: function(form) {
                    $('#content').val($('#content').Editor("getText"));
                    return true;
                }
            });
        }
    });
})($);
</script>
<?php $this->end(); ?>
