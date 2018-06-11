<?php
/**
 * @var \App\View\AppView $this
 * @var \Cake\Datasource\EntityInterface $language
 */
$this->assign('title',__('Add New Language'));
$this->Html->addCrumb(__('Languages'),['action'=>'index']);
$this->Html->addCrumb(__('Add New Language'));
?>
<div class="language add form">
    <div class="card">
        <div class="page-header border-bottom border-dark mb-2 py-1">
            <h1 class="h5 d-inline"><?= __('Add New Language') ?></h1>
            <div class="float-sm-right mt-2 mt-sm-0" role="group" aria-label="language nav">
                <?=$this->Html->link(
                    '<i class="fa fa-arrow-circle-left"></i>',
                    ['action' => 'index'],
                    ['class' => 'btn btn-sm btn-outline-dark','title' => __('Back to Languages'),'escape' => false]
                );?>
            </div>
        </div>
        <div class="card-body p-0">
        <?php
            echo $this->Form->create($language,['id' => 'language-add-frm']);
            echo $this->Form->control('name');
            echo $this->Form->control('culture');
            echo $this->Form->control('is_default',['label' => __('Default')]);
            echo $this->Form->control('direction',['label' => __('HTML Direction'),'options'=>['ltr'=>'Left To Right','rtl' => 'Right To Left']]);
            //echo $this->Form->control('is_system',['label' => __('System')]);
            echo $this->Form->control('status');
            echo $this->Form->button(__('Submit'),['class' => 'btn btn-sm btn-outline-primary']);
            echo $this->Html->link(__('Cancel'),['action' => 'index'],['class' => 'btn btn-sm btn-outline-dark ml-1']);
            echo $this->Form->end();
        ?>
        </div>
    </div>
</div>
<?php $this->append('bottom-script');?>
<script>
(function($){
    $(document).ready(function(){
        if(typeof $.validator !== "undefined"){
            $("#language-add-frm").validate();
        }
    });
})($);
</script>
<?php $this->end(); ?>
