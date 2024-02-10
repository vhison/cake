<?phpnamespace App\Model\Table;
use Cake\ORM\Table;
use Cake\Validation\Validator;
use Cake\ORM\Rule\IsUnique;
use Cake\ORM\RulesChecker;
class UsersTable extends Table
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
    }
    public function buildRules(RulesChecker $rules): RulesChecker {
        $rules->add($rules->isUnique(['email'], 'Email is already exists'));
        $rules->add($rules->isUnique(['username'], 'Usrename is already exists'));
        return $rules;
    }
    public function validationDefault(Validator $validator): Validator {    $validator
        ->notEmptyString('name')
        ->notEmptyString('email')
        ->requirePresence('email')
        ->add('email', 'validFormat', [
            'rule' => 'email',
            'message' => 'Email must be valid'
        ])
        ->notEmptyString('username')
        ->requirePresence('password')
        ->notEmptyString('password')
        ->add('password', [
            'minLength' => [
                'rule' => ['minLength', 6],
                'last' => true,
                'message' => 'Password minmum 6 digits'
            ],
            'maxLength' => [
                'rule' => ['maxLength', 10],
                'message' => 'Password minmum 10 digits'
            ]
        ]);
        return $validator;
	}}