<?php
/**
 * @var \App\View\AppView $this
 * @var \Cake\Datasource\EntityInterface $article
 */
$this->assign('title',__('Add New Article'));
$this->Html->addCrumb(__('Articles'),['action'=>'index']);
$this->Html->addCrumb(__('Add New Article'));
?>
<div class="article add form">
    <div class="card">
        <div class="page-header border-bottom border-dark mb-2 py-1">
            <h1 class="h5 d-inline"><?= __('Add New Article') ?></h1>
            <div class="float-sm-right mt-2 mt-sm-0" role="group" aria-label="article nav">
                <?=$this->Html->link(
                    '<i class="fa fa-arrow-circle-left"></i>',
                    ['action' => 'index'],
                    ['class' => 'btn btn-sm btn-outline-dark','title' => __('Back to Articles'),'escape' => false]
                );?>
            </div>
        </div>
        <div class="card-body p-0">
            <?= $this->Form->create($article,['id' => 'article-add-frm']); ?>
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
            $("#article-add-frm").validate({
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
