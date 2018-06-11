<?php
namespace CakeSilverCms\Model\Entity;

use Cake\ORM\Entity;

/**
 * MenuTranslation Entity
 *
 * @property int $menu_id
 * @property int $language_id
 * @property string $culture
 * @property string $menu_title
 *
 * @property \CakeSilverCms\Model\Entity\Menu $menu
 * @property \CakeSilverCms\Model\Entity\Language $language
 */
class MenuTranslation extends Entity
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
        'menu_title' => true,
        'menu' => true,
        'language' => true
    ];
}
