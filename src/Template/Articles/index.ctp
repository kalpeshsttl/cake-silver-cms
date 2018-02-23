<?php
/**
 * @var \App\View\AppView $this
 * @var \Cake\Datasource\EntityInterface[]|\Cake\Collection\CollectionInterface $articles
 */
use Cake\Routing\Router;

$this->assign('title',__('Articles'));
$this->Html->addCrumb(__('Articles'));
?>
<div class="article index">
    <div class="card">
        <div class="page-header border-bottom border-dark mb-2 py-1">
            <h1 class="h5 d-inline"><?=__('Articles')?></h1>
            <div class="float-sm-right mt-2 mt-sm-0" role="group" aria-label="article nav">
                <?=$this->Html->link(
                    __('Add New Article'),
                    ['action' => 'add'],
                    ['class' => 'btn btn-sm btn-outline-dark', 'title' => __('Add New Article')]
                );?>
            </div>
        </div>
        <div class="table-responsive mb-2">
            <table class="table table-hover table-bordered mb-0">
                <thead class="thead-light">
                    <tr>
                        <th scope="col" width="8%"><?=$this->Paginator->sort('id', __('#ID'))?></th>
                        <th scope="col" width="40%"><?=$this->Paginator->sort('title', __('Title'))?></th>
                        <?php /*<th scope="col"><?=$this->Paginator->sort('slug')?></th>*/?>
                        <?php /*<th scope="col"><?=$this->Paginator->sort('excerpt')?></th>*/?>
                        <?php /*<th scope="col"><?=$this->Paginator->sort('content')?></th>*/?>
                        <th scope="col" width="25%"><?=$this->Paginator->sort('url', __('Url'))?></th>
                        <?php /*<th scope="col"><?=$this->Paginator->sort('sort_order')?></th>*/?>
                        <th scope="col" width="10%"><?=$this->Paginator->sort('status', __('Status'))?></th>
                        <?php /*<th scope="col"><?=$this->Paginator->sort('created_at')?></th>*/?>
                        <?php /*<th scope="col"><?=$this->Paginator->sort('modified_at')?></th>*/?>
                        <th scope="col" class="actions" width="17%"><?=__('Actions')?></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($articles as $article): ?>
                    <tr>
                        <td><?=$this->Number->format($article->id)?></td>
                        <td><?=h($article->title)?></td>
                        <?php /*<td><?=h($article->slug)?></td>*/?>
                        <?php /*<td><?=h($article->excerpt)?></td> */?>
                        <?php /*<td><?=h($article->content)?></td>*/?>
                        <?php
                        $link = '';
                        if (!empty($article->url)):
                            $link = Router::url(['action' => 'page', 'id' => $article->id], ['pass' => ['id'], '_full' => true]);
                        else:
                            $link = Router::url('/page/' . $article->id, ['_full' => true]);
                        endif;
                        ?>
                        <td><?=$this->Html->link($link, $link, ['target' => '_blank']);?></td>
                        <?php /*<td><?=$this->Number->format($article->sort_order)?></td>*/?>
                        <td><?=($article->status == 1) ? __('Active') : __('Inactive');?></td>
                        <?php /*<td><?=h($article->created_at)?></td>*/?>
                        <?php /*<td><?=h($article->modified_at)?></td>*/?>
                        <td class="actions">
                            <?= '';//$this->Html->link('<i class="fas fa-eye"></i>', ['action' => 'view', $article->id], ['class' => 'btn btn-sm btn-outline-dark', 'title' => __('View'), 'escape' => false])?>
                            <?=$this->Html->link('<i class="far fa-edit"></i>', ['action' => 'edit', $article->id], ['class' => 'btn btn-sm btn-outline-dark', 'title' => __('Edit'), 'escape' => false])?>
                            <?=$this->Form->postLink('<i class="far fa-trash-alt"></i>', ['action' => 'delete', $article->id], ['confirm' => __('Are you sure you want to delete this Article?', $article->id), 'class' => 'btn btn-sm btn-outline-danger', 'title' => __('Delete'), 'escape' => false])?>
                        </td>
                    </tr>
                    <?php endforeach;?>
                    <?php if (count($articles) == 0): ?>
                    <tr>
                        <td colspan="5"><?=__('Record not found!');?></td>
                    </tr>
                    <?php endif;?>
                </tbody>
            </table>
        </div>
        <div class="paginator">
            <!-- <p><?=$this->Paginator->counter(['format' => __('Page  of , showing  record(s) out of  total')])?></p> -->
            <ul class="pagination my-2">
                <?=$this->Paginator->first('<<')?>
                <?=$this->Paginator->prev('<')?>
                <?=$this->Paginator->numbers()?>
                <?=$this->Paginator->next('>')?>
                <?=$this->Paginator->last('>>')?>
            </ul>
        </div>
    </div>
</div>