<?php

namespace App\Repositories;

use App\Models\Registration;
use Webcore\Generator\Common\BaseRepository;

/**
 * Class RegistrationRepository
 * @package App\Repositories
 * @version October 16, 2024, 12:00 pm UTC
 *
 * @method Registration findWithoutFail($id, $columns = ['*'])
 * @method Registration find($id, $columns = ['*'])
 * @method Registration first($columns = ['*'])
*/
class RegistrationRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'student_id',
        'ijazah',
        'raport',
        'birth_certificate',
        'student_photo',
        'registration_date',
        'status'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Registration::class;
    }
}
