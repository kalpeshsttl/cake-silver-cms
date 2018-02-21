<?php
namespace CakeSilverCms\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;
use Cake\Cache\Cache;

/**
 * Articles Model
 *
 * @method \CakeSilverCms\Model\Entity\Article get($primaryKey, $options = [])
 * @method \CakeSilverCms\Model\Entity\Article newEntity($data = null, array $options = [])
 * @method \CakeSilverCms\Model\Entity\Article[] newEntities(array $data, array $options = [])
 * @method \CakeSilverCms\Model\Entity\Article|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \CakeSilverCms\Model\Entity\Article patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \CakeSilverCms\Model\Entity\Article[] patchEntities($entities, array $data, array $options = [])
 * @method \CakeSilverCms\Model\Entity\Article findOrCreate($search, callable $callback = null, $options = [])
 */
class ArticlesTable extends Table
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

        $this->setTable('articles');
        $this->setDisplayField('title');
        $this->setPrimaryKey('id');
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
            ->allowEmpty('id', 'create');

        $validator
            ->scalar('title')
            ->requirePresence('title', 'create')
            ->notEmpty('title','Title is required.');

        $validator
            ->scalar('slug')
            ->maxLength('slug', 255)
            ->allowEmpty('slug');

        $validator
            ->scalar('excerpt')
            ->allowEmpty('excerpt');

        $validator
            ->scalar('content')
            ->maxLength('content', 4294967295)
            ->requirePresence('content', 'create')
            ->notEmpty('content','Content is required.');

        $validator
            ->scalar('url')
            ->maxLength('url', 255)
            ->allowEmpty('url')
            ->add('url', 'unique', [
                'rule' => 'validateUnique',
                'provider' => 'table',
                'message' => 'This url already exist. please use another url'
            ]);

        $validator
            ->integer('sort_order')
            ->allowEmpty('sort_order');

        $validator
            ->boolean('status')
            ->requirePresence('status', 'create')
            ->notEmpty('status');

        $validator
            ->dateTime('created_at')
            ->allowEmpty('created_at');

        $validator
            ->dateTime('modified_at')
            ->allowEmpty('modified_at');

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
        $rules->add($rules->isUnique(['url']));

        return $rules;
    }

    public function afterSave($event, $entity, $options = [])
    {
        Cache::clearGroup('rewrite-rules','articles');
        $rewriteRules = $this->find('all')
                            ->select(["id","title","slug","url"])
                            ->where(['status'=>1,'url IS NOT NULL'])
                            ->hydrate(false)
                            ->toArray();
        Cache::write('rewrite_rules',$rewriteRules,'articles');
    }
}
