<?php
/**
 * @var \App\View\AppView $this
 * @var \Cake\Datasource\EntityInterface $article
 */
$this->layout = 'CakeSilverCms.single';
$this->assign('title',$article->title);
?>
<div class="article article-<?= $article->id;?>">
    <div class="card">
        <div class="page-header border-bottom border-dark mb-2 py-1">
            <h1 class="h5 d-inline"><?= __('Article ( ' . $article->title . ' ) ') ?></h1>
        </div>
        <div class="card-body p-0">
        	<?= $article->content; ?>
        </div>
    </div>
</div>
