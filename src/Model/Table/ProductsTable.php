<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Products Model
 *
 * @method \App\Model\Entity\Product get($primaryKey, $options = [])
 * @method \App\Model\Entity\Product newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Product[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Product|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Product patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Product[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Product findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class ProductsTable extends Table
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

        $this->setTable('products');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->addBehavior('Proffer.Proffer', [
            'photo' => [	// The name of your upload field
                'root' => WWW_ROOT . 'files', // Customise the root upload folder here, or omit to use the default
                'dir' => 'photo_dir',	// The name of the field to store the folder
                'thumbnailSizes' => [ // Declare your thumbnails
                    'square' => [	// Define the prefix of your thumbnail
                        'w' => 200,	// Width
                        'h' => 200,	// Height
                        'crop' => true,
                        'jpeg_quality'	=> 100
                    ],
                ],
                'thumbnailMethod' => 'gd'	// Options are Imagick or Gd
            ]
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
            ->requirePresence('name', 'create')
            ->notEmpty('name');

        $validator
            ->requirePresence('description', 'create')
            ->notEmpty('description');

        $validator
            ->integer('quantity')
            ->requirePresence('quantity', 'create')
            ->notEmpty('quantity');

        $validator
            ->decimal('price')
            ->requirePresence('price', 'create')
            ->notEmpty('price');

        $validator
        ->provider('proffer', 'Proffer\Model\Validation\ProfferRules')
        
        ->add('photo', 'proffer', [
            'rule' => ['dimensions', [
                'min' => ['w' => 300, 'h' => 300],
                'max' => ['w' => 3000, 'h' => 3000],
            ]],
            'message' => 'La imagen no tiene dimensiones correctas.',
            'provider' => 'proffer'
        ])
        ->add('photo', 'extension', [
            'rule' => ['extension', ['jpeg', 'png', 'jpg']],
            'message' => 'La imagen no tiene extension correcta, solo (.jpg , .jpeg , o .png).'
        ])
        ->add('photo', 'fileSize', [
            'rule' => ['fileSize', '<=', '3MB'],
            'message' => 'La imagen no debe exceder los 3MB.'
        ])
        ->add('photo', 'mimeType', [
            'rule' => ['mimeType', ['image/jpeg', 'image/png']],
            'message' => 'La imagen no tiene un formato correcto.'
        ])
        ->requirePresence('photo', 'create')
        ->notEmpty('photo');

        return $validator;
    }
}
