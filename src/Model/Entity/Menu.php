<?php
namespace CakeSilverCms\Model\Entity;

use Cake\ORM\Entity;

/**
 * Menu Entity
 *
 * @property int $id
 * @property int $menu_region_id
 * @property string $menu_title
 * @property string $menu_type
 * @property string $custom_link
 * @property string $object_type
 * @property int $object_id
 * @property int $module_id
 * @property string $redirection
 * @property int $sort_order
 * @property bool $status
 *
 * @property \CakeSilverCms\Model\Entity\MenuRegion $menu_region
 */
class Menu extends Entity
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
        'menu_region_id' => true,
        'menu_title' => true,
        'menu_type' => true,
        'custom_link' => true,
        'object_type' => true,
        'object_id' => true,
        'module_id' => true,
        'redirection' => true,
        'sort_order' => true,
        'status' => true,
        'menu_region' => true
    ];
}
