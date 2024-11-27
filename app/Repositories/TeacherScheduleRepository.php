<?php

namespace App\Repositories;

use App\Models\TeacherSchedule;
use Webcore\Generator\Common\BaseRepository;

/**
 * Class TeacherScheduleRepository
 * @package App\Repositories
 * @version November 26, 2024, 7:57 am UTC
 *
 * @method TeacherSchedule findWithoutFail($id, $columns = ['*'])
 * @method TeacherSchedule find($id, $columns = ['*'])
 * @method TeacherSchedule first($columns = ['*'])
*/
class TeacherScheduleRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'teacher_id',
        'day_of_week',
        'start_time',
        'end_time',
        'subject_id',
        'class_id'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return TeacherSchedule::class;
    }
}
