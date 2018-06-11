<?php
use Cake\Cache\Cache;
use Cake\ORM\TableRegistry;
use Cake\Routing\RouteBuilder;
use Cake\Routing\Router;
use Cake\Routing\Route\DashedRoute;
use Cake\Utility\Hash;
use Cake\Utility\Text;

Router::scope('/', function (RouteBuilder $routes) {

    //Get Language
    $languages = Cache::read('silver-language', 'languages');
    if ($languages === false) {
        $languageModel = TableRegistry::get('CakeSilverCms.Languages');
        $getLanguages  = $languageModel->languageCache();
        $languages     = Cache::read('silver-language', 'languages');
    }
    if ($languages !== false) {
        $languages = Hash::extract($languages, '{n}.culture');
        $languages = implode('|', $languages);
    }
    /**
     * Home Page
     */
    $hOption = [
        'controller' => 'Articles',
        'action'     => 'home',
        'plugin'     => 'CakeSilverCms',
    ];
    //URL:- /:language/
    $routes->connect('/:language/', $hOption)
        ->setPatterns(['language' => $languages])
        ->setPersist(['language']);
    //URL:- /
    $routes->connect('/', $hOption);

    //Get Articles
    $articleLinks = Cache::read('rewrite_rules', 'articles');
    if ($articleLinks === false) {
        $articleModel = TableRegistry::get('CakeSilverCms.Articles');
        $getArticles  = $articleModel->articleCache();
        $articleLinks = Cache::read('rewrite_rules', 'articles');
    }
    if ($articleLinks !== false) {
        foreach ($articleLinks as $articleLink) {
            //Language Translations Url
            if (!empty($articleLink['article_translations'])) {
                $_translations = $articleLink['article_translations'];
                foreach ($_translations as $_translation) {
                    if (!empty($_translation['url'])) {
                        //$_tArticleUrl = strtolower(Text::slug($_translation['url']));
                        $_tArticleUrl = $_translation['url'];
                        $_tLinkOption = [
                            'controller' => 'Articles',
                            'action'     => 'page',
                            'plugin'     => 'CakeSilverCms',
                            'id'         => $_translation['article_id'],
                            'language'   => $_translation['culture'],
                        ];
                        $routes->connect('/' . $_translation['culture'] . '/' . $_tArticleUrl, $_tLinkOption)
                            ->setPass(['id'])
                            ->setPersist(['language']);
                    }
                }
            }
            if (!empty($articleLink['url'])) {
                //URL:- /:language/<custom>
                $articleUrl = strtolower(Text::slug($articleLink['url']));
                $linkOption = [
                    'controller' => 'Articles',
                    'action'     => 'page',
                    'plugin'     => 'CakeSilverCms',
                    'id'         => $articleLink['id'],
                ];
                if (!empty($languages)) {
                    $routes->connect('/:language/' . $articleUrl, $linkOption)
                        ->setPass(['id'])
                        ->setPatterns(['language' => $languages])
                        ->setPersist(['language']);
                }
                //URL:- /<custom>
                $linkOption = [
                    'controller' => 'Articles',
                    'action'     => 'page',
                    'plugin'     => 'CakeSilverCms',
                    'id'         => $articleLink['id'],
                ];
                $routes->connect('/' . $articleUrl, $linkOption, ['pass' => ['id']]);
            }
        }
    }

    //Default Artical /page/:id and /:language/page/:id Route
    //URL:- /:language/page/:id
    if (!empty($languages)) {
        $routes->connect(
            '/:language/page/:id',
            ['controller' => 'Articles', 'action' => 'page', 'plugin' => 'CakeSilverCms']
        )
            ->setPass(['id'])
            ->setPatterns(['id' => '\d+', 'language' => $languages])
            ->setPersist(['language']);
    }
    //URL:- /page/:id
    $routes->connect(
        '/page/:id',
        ['controller' => 'Articles', 'action' => 'page', 'plugin' => 'CakeSilverCms'],
        ['id' => '\d+', 'pass' => ['id']]
    );
    $routes->fallbacks(DashedRoute::class);
});
//Silver CMS Plugin Route
Router::plugin(
    'CakeSilverCms',
    ['path' => '/cake-silver-cms'],
    function (RouteBuilder $routes) {
        $routes->connect('/', ['controller' => 'Dashboard', 'action' => 'index']);
        $routes->fallbacks(DashedRoute::class);
    }
);
