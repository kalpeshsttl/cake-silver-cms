<?php
/*
 * Bootstrap CakeSilverCms.
 */
use Cake\Cache\Cache;
use Cake\Core\Configure;

//Articles Cache Config
Cache::config('articles', [
    'className' => 'File',
    'duration' => ((Configure::read('debug') === true) ? '+5' : '+999') . ' days',
    'serialize' => true,
    'path' => CACHE . 'articles' . DS,
    'prefix' => 'article-',
    'groups' => ['rewrite-rules']
]);