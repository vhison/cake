<?phpnamespace App\Model\Table;
use Cake\ORM\Table;
use Cake\Validation\Validator;
class PostsTable extends Table
{
    public function initialize(array $config): void
    {
      $this->addBehavior('Timestamp', [
         'events' => [
            'Model.beforeSave' => [
              'created' => 'new',
              'updated' => 'always'
            ]
         ]
      ]);
    }    public function validationDefault(Validator $validator): Validator {      $validator
         ->notEmptyString('title')
         ->notEmptyString('description')
         ->requirePresence('post_image', 'create')
         ->notEmptyString('post_image')
         ->add('post_image', [
            [ 'rule' => ['extension',['jpeg', 'png', 'jpg']], // default  ['gif', ]
               'message' => __('Only jpg jpeg and png files are allowed.')],
            ['rule' => ['fileSize', '<=', '1024'], 
               'message' => __('Image must be less than 1MB')]
            ]
         );
         return $validator;
	}}