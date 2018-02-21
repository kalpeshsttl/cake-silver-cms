<?php
namespace CakeSilverCms\Model\Entity;

use Cake\ORM\Entity;
use Cake\Utility\Text;

/**
 * Article Entity
 *
 * @property int $id
 * @property string $title
 * @property string $slug
 * @property string $excerpt
 * @property string $content
 * @property string $url
 * @property int $sort_order
 * @property bool $status
 * @property \Cake\I18n\FrozenTime $created_at
 * @property \Cake\I18n\FrozenTime $modified_at
 */
class Article extends Entity
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
        'title' => true,
        'slug' => true,
        'excerpt' => true,
        'content' => true,
        'url' => true,
        'sort_order' => true,
        'status' => true,
        'created_at' => true,
        'modified_at' => true
    ];

    /*protected function _getSlug($slug)
    {
        if(!empty($slug)){
            return strtolower(Text::slug($slug));
        }
        return $slug;
    }

    protected function _setSlug($slug)
    {
        if(!empty($slug)){
            return strtolower(Text::slug($slug));
        }
        return $slug;
    }*/

    protected function _getUrl($url)
    {
        if(!empty($url)){
            return strtolower(Text::slug($url));
        }
        return $url;
    }

    protected function _setUrl($url)
    {
        if(!empty($url)){
            return strtolower(Text::slug($url));
        }
        return $url;
    }
}
