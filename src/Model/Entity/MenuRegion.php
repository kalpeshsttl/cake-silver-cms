<?php
namespace CakeSilverCms\Model\Entity;

use Cake\ORM\Entity;
use Cake\Utility\Text;

/**
 * MenuRegion Entity
 *
 * @property int $id
 * @property string $region
 * @property string $slug
 * @property bool $status
 *
 * @property \CakeSilverCms\Model\Entity\Menu[] $menus
 */
class MenuRegion extends Entity
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
        'region' => true,
        'slug' => true,
        'status' => true,
        'menus' => true
    ];

    protected function _getSlug($slug)
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
    }
}
