<?php
namespace CakeSilverCms\Model\Entity;

use Cake\ORM\Entity;
use Cake\Utility\Text;

/**
 * ArticleTranslation Entity
 *
 * @property int $article_id
 * @property int $language_id
 * @property string $culture
 * @property string $title
 * @property string $slug
 * @property string $excerpt
 * @property string $content
 * @property string $url
 *
 * @property \CakeSilverCms\Model\Entity\Article $article
 * @property \CakeSilverCms\Model\Entity\Language $language
 */
class ArticleTranslation extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        'culture' => true,
        'title' => true,
        'slug' => true,
        'excerpt' => true,
        'content' => true,
        'url' => true,
        'article' => true,
        'language' => true
    ];

    /*
    protected function _getSlug($slug)
    {
        $slug = trim($slug);
        if(!empty($slug)){
            return strtolower(Text::slug($slug));
        } else {
            return null;
        }
    }

    protected function _setSlug($slug)
    {
        $slug = trim($slug);
        if(!empty($slug)){
            return strtolower(Text::slug($slug));
        } else {
            return null;
        }
    }
    */

    /*protected function _getUrl($url)
    {
        $url = trim($url);
        if (!empty($url)) {
            return strtolower(Text::slug($url));
        } else {
            return null;
        }
    }
    
    protected function _setUrl($url)
    {
        $url = trim($url);
        if (!empty($url)) {
            return strtolower(Text::slug($url));
        } else {
            return null;
        }
    }*/
}
