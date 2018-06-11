<?php
namespace CakeSilverCms\Model\Table;

use Cake\Cache\Cache;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Articles Model
 *
 * @property \CakeSilverCms\Model\Table\ArticleTranslationsTable|\Cake\ORM\Association\HasMany $ArticleTranslations
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

        $this->belongsTo('ArticleTranslation', [
            'foreignKey' => 'id',
            'bindingKey' => 'article_id',
            'joinType'   => 'LEFT',
            'className'  => 'CakeSilverCms.ArticleTranslations',
        ]);

        $this->hasMany('ArticleTranslations', [
            'foreignKey' => 'article_id',
            'className'  => 'CakeSilverCms.ArticleTranslations',
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
            ->allowEmpty('id', 'create');

        $validator
            ->scalar('title')
            ->requirePresence('title', 'create')
            ->notEmpty('title');

        $validator
            ->scalar('slug')
            ->allowEmpty('slug');

        $validator
            ->scalar('excerpt')
            ->allowEmpty('excerpt');

        $validator
            ->scalar('content')
            ->maxLength('content', 4294967295)
            ->requirePresence('content', 'create')
            ->notEmpty('content');

        $validator
            ->scalar('url')
            ->allowEmpty('url');

        $validator
            ->boolean('is_home')
            ->requirePresence('is_home', 'create')
            ->notEmpty('is_home');

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
        //$this->articleCache();
    }

    public function articleCache()
    {
        Cache::clearGroup('rewrite-rules', 'articles');
        $rewriteRules = $this->find('all')
            ->select(["id", "title", "slug", "url"])
            ->contain(['ArticleTranslations' => function ($q) {
                $q->select(['article_id', 'language_id', 'culture', 'url']);
                $q->where(['url IS NOT NULL', 'url !=' => '']);
                return $q;
            }])
            ->where(['status' => 1])
            ->hydrate(false)
            ->toArray();
        Cache::write('rewrite_rules', $rewriteRules, 'articles');
        return $rewriteRules;
    }
}
