<?php
namespace CakeSilverCms\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Menus Model
 *
 * @property \CakeSilverCms\Model\Table\MenuRegionsTable|\Cake\ORM\Association\BelongsTo $MenuRegions
 *
 * @method \CakeSilverCms\Model\Entity\Menu get($primaryKey, $options = [])
 * @method \CakeSilverCms\Model\Entity\Menu newEntity($data = null, array $options = [])
 * @method \CakeSilverCms\Model\Entity\Menu[] newEntities(array $data, array $options = [])
 * @method \CakeSilverCms\Model\Entity\Menu|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \CakeSilverCms\Model\Entity\Menu patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \CakeSilverCms\Model\Entity\Menu[] patchEntities($entities, array $data, array $options = [])
 * @method \CakeSilverCms\Model\Entity\Menu findOrCreate($search, callable $callback = null, $options = [])
 */
class MenusTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->setTable('menus');
        $this->setDisplayField('menu_title');
        $this->setPrimaryKey('id');

        $this->belongsTo('MenuRegions', [
            'foreignKey' => 'menu_region_id',
            'joinType' => 'INNER',
            'className' => 'CakeSilverCms.MenuRegions'
        ]);
        
        $this->belongsTo('Articles', [
            'foreignKey' => 'object_id',
            'joinType' => 'LEFT',
            'className' => 'CakeSilverCms.Articles'
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->integer('id')
            ->allowEmpty('id', 'create');

        $validator
            ->scalar('menu_title')
            ->maxLength('menu_title', 255)
            ->requirePresence('menu_title', 'create')
            ->notEmpty('menu_title');

        $validator
            ->scalar('menu_type')
            ->requirePresence('menu_type', 'create')
            ->notEmpty('menu_type');

        $validator
            ->scalar('custom_link')
            ->allowEmpty('custom_link');

        $validator
            ->scalar('object_type')
            ->maxLength('object_type', 30)
            ->allowEmpty('object_type');

        $validator
            ->scalar('redirection')
            ->requirePresence('redirection', 'create')
            ->notEmpty('redirection');

        $validator
            ->integer('sort_order')
            ->requirePresence('sort_order', 'create')
            ->notEmpty('sort_order');

        $validator
            ->boolean('status')
            ->requirePresence('status', 'create')
            ->notEmpty('status');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->existsIn(['menu_region_id'], 'MenuRegions'));

        return $rules;
    }
}
