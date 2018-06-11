<?php
/**
 * @var \App\View\AppView $this
 * @var \Cake\Datasource\EntityInterface $article
 */
$this->assign('title', __('Add New Article'));
$this->Html->addCrumb(__('Articles'), ['action' => 'index']);
$this->Html->addCrumb(__('Add New Article'));
?>
<div class="article add form">
    <div class="card">
        <div class="page-header border-bottom border-dark mb-2 py-1">
            <h1 class="h5 d-inline"><?=__('Add New Article')?></h1>
            <div class="float-sm-right mt-2 mt-sm-0" role="group" aria-label="article nav">
                <?=$this->Html->link(
                    '<i class="fa fa-arrow-circle-left"></i>',
                    ['action' => 'index'],
                    ['class' => 'btn btn-sm btn-outline-dark', 'title' => __('Back to Articles'), 'escape' => false]
                );?>
            </div>
        </div>
        <div class="card-body p-0">
            <?=$this->Form->create($article, ['id' => 'article-add-frm']);?>
                <ul class="nav nav-tabs" id="articleTab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" data-toggle="tab" href="#default-tab" role="tab" aria-controls="nav-default" aria-selected="true"><?=__("Default");?></a>
                    </li>
                    <?php if ($articleLanguages !== false) {?>
                        <?php foreach ($articleLanguages as $articleLanguage) {?>
                            <?php if ($articleLanguage['id'] != SYSTEM_LANGUAGE_ID && $articleLanguage['status'] == 1) {?>
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#<?=$articleLanguage['culture'];?>-tab" role="tab" aria-controls="nav-<?=$articleLanguage['culture'];?>" aria-selected="true"><?=__($articleLanguage['name']);?></a>
                                    <?=$this->Form->control('article_translations.' . $articleLanguage['id'] . '.language_id', ['type' => 'hidden', 'value' => $articleLanguage['id']]);?>
                                    <?=$this->Form->control('article_translations.' . $articleLanguage['id'] . '.culture', ['type' => 'hidden', 'value' => $articleLanguage['culture']]);?>
                                </li>
                            <?php }?>
                        <?php }?>
                    <?php }?>
                </ul>
                <div class="tab-content" id="articleTabContent">
                    <div class="tab-pane fade show active" id="default-tab" role="tabpanel" aria-labelledby="nav-default-tab">
                        <?=$this->Form->control('title', ['type' => 'text']);?>
                        <?=''; //$this->Form->control('slug', ['type' => 'text']); ?>
                        <?=''; //$this->Form->control('excerpt'); ?>
                        <?=$this->Form->control('content', ['type' => 'text', 'class' => 'content-editor']);?>
                        <?=$this->Form->control('url', ['type' => 'text']);?>
                    </div>
                    <?php if ($articleLanguages !== false) {?>
                        <?php foreach ($articleLanguages as $articleLanguage) {?>
                            <?php if ($articleLanguage['id'] != SYSTEM_LANGUAGE_ID && $articleLanguage['status'] == 1) {?>
                                <div class="tab-pane fade" id="<?=$articleLanguage['culture'];?>-tab" role="tabpanel" aria-labelledby="nav-<?=$articleLanguage['culture'];?>-tab">
                                    <?=$this->Form->control('article_translations.' . $articleLanguage['id'] . '.title', ['type' => 'text', 'dir' => $articleLanguage['direction']]);?>
                                    <?=''; //$this->Form->control('article_translations.' . $articleLanguage['id'] . '.slug',['type' => 'text','dir' => $articleLanguage['direction']]); ?>
                                    <?=''; //$this->Form->control('article_translations.' . $articleLanguage['id'] . '.excerpt',['dir' => $articleLanguage['direction']]); ?>
                                    <?=$this->Form->control('article_translations.' . $articleLanguage['id'] . '.content', ['class' => 'content-editor', 'dir' => $articleLanguage['direction']]);?>
                                    <?=$this->Form->control('article_translations.' . $articleLanguage['id'] . '.url', ['type' => 'text', 'dir' => $articleLanguage['direction']]);?>
                                </div>
                            <?php }?>
                        <?php }?>
                    <?php }?>
                </div>
                <?=$this->Form->control('is_home', ['label' => __('Home Page')]);?>
                <?=''; //$this->Form->control('sort_order'); ?>
                <?=$this->Form->control('status');?>
                <?=''; //$this->Form->control('created_at'); ?>
                <?=''; //$this->Form->control('modified_at'); ?>
                <?=$this->Form->button(__('Submit'), ['class' => 'btn btn-sm btn-outline-primary']);?>
                <?=$this->Html->link(__('Cancel'), ['action' => 'index'], ['class' => 'btn btn-sm btn-outline-dark ml-1']);?>
            <?=$this->Form->end();?>
        </div>
    </div>
</div>
<?php $this->Html->css(['CakeSilverCms.editor/editor.css'], ['block' => 'head-style']);?>
<?php $this->Html->script(['CakeSilverCms.editor/editor.js'], ['block' => 'bottom-script']);?>
<?php $this->append('bottom-script');?>
<script>
(function($){
    $(document).ready(function(){
        $('.content-editor').each(function($_index,$_content){
            $($_content).Editor();
            $($_content).Editor("setText",$($_content).val());
        });
        if(typeof $.validator !== "undefined"){
            $("#article-add-frm").validate({
                ignore:':hidden,:disabled,.jv-igniore',
                rules:{
                    'content':{
                        required: function(element) {
                            $(element).val($(element).Editor("getText"));
                            return ($(element).val() == '') ? true : false;
                        }
                    }
                },
                submitHandler: function(form) {
                    $('.content-editor').each(function($_index,$_content){
                        $($_content).val($($_content).Editor("getText"));
                    });
                    return true;
                }
            });
        }
    });
})($);
</script>
<?php $this->end();?>
