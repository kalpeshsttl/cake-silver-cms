<?php
/*
 * Bootstrap CakeSilverCms.
 */
use Cake\Cache\Cache;
use Cake\Core\Configure;
use Cake\Core\Plugin;

//Default View
define('DEFAULT_VIEW','Twig');

//Load WyriHaximus/TwigView Plugin
if(DEFAULT_VIEW == 'Twig'){
    Plugin::load('WyriHaximus/TwigView', ['bootstrap' => true]);
}

//Articles Cache Config
Cache::config('articles', [
    'className' => 'File',
    'duration'  => ((Configure::read('debug') === true) ? '+5' : '+999') . ' days',
    'serialize' => true,
    'path'      => CACHE . 'silvercms' . DS,
    'prefix'    => 'article-',
    'groups'    => ['rewrite-rules'],
]);
//Languages Config
define('SYSTEM_LANGUAGE_ID','1');

//Cache Config
Cache::config('languages', [
    'className' => 'File',
    'duration'  => ((Configure::read('debug') === true) ? '+5' : '+999') . ' days',
    'serialize' => true,
    'path'      => CACHE . 'silvercms' . DS,
    'prefix'    => 'language-',
    'groups'    => ['silver-language'],
]);
