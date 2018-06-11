<?php
/**
 * @var \App\View\AppView $this
 * @var \Cake\Datasource\EntityInterface $menu
 */
$this->assign('title', __('Edit Menu ( ' . $menu->menu_title . ' ) '));
$this->Html->addCrumb(__('Menu'), ['action' => 'index']);
$this->Html->addCrumb(__('Edit Menu ( ' . $menu->menu_title . ' ) '));
?>
<div class="menu edit form">
    <div class="card">
        <div class="page-header border-bottom border-dark mb-2 py-1">
            <h1 class="h5 d-inline"><?=__('Edit Menu  ( ' . $menu->menu_title . ' ) ')?></h1>
            <div class="float-sm-right mt-2 mt-sm-0" role="group" aria-label="menu nav">
                <?=$this->Html->link(
                    '<i class="fa fa-arrow-circle-left"></i>',
                    ['action' => 'index', $menu->menu_region_id],
                    ['class' => 'btn btn-sm btn-outline-dark', 'title' => __('Back to Menu'), 'escape' => false]
                );?>
                <?=$this->Form->postLink(
                    '<i class="far fa-trash-alt"></i>',
                    ['action' => 'delete', $menu->menu_region_id, $menu->id],
                    ['confirm' => __('Are you sure you want to delete this Menu?', $menu->id), 'class' => 'btn btn-sm btn-outline-danger', 'title' => __('Delete'), 'escape' => false]
                )?>
            </div>
        </div>
        <div class="card-body p-0">
            <?=$this->Form->create($menu, ['id' => 'menu-edit-frm']);?>
            <?=$this->Form->control('menu_region_id', ['options' => $menuRegions, 'label' => __('Menu Region')]);?>
            <?=$this->Form->control('menu_title');?>
            <?php if ($menuLanguages !== false) {?>
                <?php foreach ($menuLanguages as $menuLanguage) {?>
                    <?php if ($menuLanguage['id'] != SYSTEM_LANGUAGE_ID && $menuLanguage['status'] == 1) {?>
                        <?=$this->Form->control('menu_translations.' . $menuLanguage['id'] . '.language_id', ['type' => 'hidden', 'value' => $menuLanguage['id']]);?>
                        <?=$this->Form->control('menu_translations.' . $menuLanguage['id'] . '.culture', ['type' => 'hidden', 'value' => $menuLanguage['culture']]);?>
                        <?=$this->Form->control('menu_translations.' . $menuLanguage['id'] . '.menu_title', ['label' => __('Menu Title (' . $menuLanguage['name'] . ')'), 'dir' => $menuLanguage['direction']]);?>
                    <?php }?>
                <?php }?>
            <?php }?>
            <?=$this->Form->control('menu_type', ['options' => $menuType]);?>
            <div class="mt-call mt-custom">
                <?=$this->Form->control('custom_link', ['type' => 'url', 'required' => true]);?>
            </div>
            <?='' //$this->Form->control('object_type'); ?>
            <div class="mt-call mt-object">
                <?=$this->Form->control('object_id', ['options' => $articles, 'label' => __('Article')], ['required' => true]);?>
            </div>
            <?='' //$this->Form->control('module_id'); ?>
            <?=$this->Form->control('redirection', ['options' => $menuRedirection]);?>
            <?=$this->Form->control('sort_order', ['type' => 'hidden']);?>
            <?=$this->Form->control('status');?>
            <?=$this->Form->button(__('Submit'), ['class' => 'btn btn-sm btn-outline-primary']);?>
            <?=$this->Html->link(__('Cancel'), ['action' => 'index', $menu->menu_region_id], ['class' => 'btn btn-sm btn-outline-dark ml-1']);?>
            <?=$this->Form->end();?>
        </div>
    </div>
</div>
<?php $this->append('bottom-script');?>
<script>
(function($){
    $(document).ready(function(){
        $('#menu-type').on('change',function(){
            var $menu_type = $(this).val();
            $('.mt-call').hide();
            $('.mt-call input, .mt-call select').attr('disabled','disabled');
            $('.mt-' + $menu_type).show();
            $('.mt-' + $menu_type + ' input, .mt-' + $menu_type + ' select').removeAttr('disabled','disabled');
        }).change();
        if(typeof $.validator !== "undefined"){
            $("#menu-edit-frm").validate();
        }
    });
})($);
</script>
<?php $this->end();?>
