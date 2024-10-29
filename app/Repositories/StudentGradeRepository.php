<?php

namespace App\Repositories;

use App\Models\StudentGrade;
use Webcore\Generator\Common\BaseRepository;

/**
 * Class StudentGradeRepository
 * @package App\Repositories
 * @version October 19, 2024, 4:35 pm UTC
 *
 * @method StudentGrade findWithoutFail($id, $columns = ['*'])
 * @method StudentGrade find($id, $columns = ['*'])
 * @method StudentGrade first($columns = ['*'])
*/
class StudentGradeRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'student_id',
        'subject_id',
        'teacher_id',
        'nilai'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return StudentGrade::class;
    }
}
