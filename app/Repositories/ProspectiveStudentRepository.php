<?php

namespace App\Repositories;

use App\Models\ProspectiveStudent;
use Webcore\Generator\Common\BaseRepository;

/**
 * Class ProspectiveStudentRepository
 * @package App\Repositories
 * @version October 16, 2024, 9:24 am UTC
 *
 * @method ProspectiveStudent findWithoutFail($id, $columns = ['*'])
 * @method ProspectiveStudent find($id, $columns = ['*'])
 * @method ProspectiveStudent first($columns = ['*'])
*/
class ProspectiveStudentRepository extends BaseRepository
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
        return ProspectiveStudent::class;
    }
}
