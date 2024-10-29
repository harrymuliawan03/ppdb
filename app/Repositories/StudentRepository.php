<?php

namespace App\Repositories;

use App\Models\Student;
use Webcore\Generator\Common\BaseRepository;

/**
 * Class StudentRepository
 * @package App\Repositories
 * @version October 14, 2024, 8:08 am UTC
 *
 * @method Student findWithoutFail($id, $columns = ['*'])
 * @method Student find($id, $columns = ['*'])
 * @method Student first($columns = ['*'])
*/
class StudentRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'birth_date',
        'gender',
        'address',
        'phone_number',
        'email',
        'nisn'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Student::class;
    }
}
