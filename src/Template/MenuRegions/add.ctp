<?php
/**
 * @var \App\View\AppView $this
 * @var \Cake\Datasource\EntityInterface $menuRegion
 */
$this->assign('title',__('Create New Menu Location'));
$this->Html->addCrumb(__('Menu Locations'),['action'=>'index']);
$this->Html->addCrumb(__('Create New Menu Location'));
?>
<div class="menuRegion add form">
    <div class="card">
        <div class="page-header border-bottom border-dark mb-2 py-1">
            <h1 class="h5 d-inline"><?= __('Create New Menu Location') ?></h1>
            <div class="float-sm-right mt-2 mt-sm-0" role="group" aria-label="menuRegion nav">
                <?=$this->Html->link(
                    '<i class="fa fa-arrow-circle-left"></i>',
                    ['action' => 'index'],
                    ['class' => 'btn btn-sm btn-outline-dark','title' => __('Back to Menu Locations'),'escape' => false]
                );?>
            </div>
        </div>
        <div class="card-body p-0">
        <?php
            echo $this->Form->create($menuRegion,['id' => 'menuRegion-add-frm']);
            echo $this->Form->control('region',['label' => __('Location')]);
            echo $this->Form->control('slug');
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
            $("#menuRegion-add-frm").validate();
        }
    });
})($);
</script>
<?php $this->end(); ?>
