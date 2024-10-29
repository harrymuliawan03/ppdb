<?php

namespace App\Repositories;

use App\Models\Subject;
use Webcore\Generator\Common\BaseRepository;

/**
 * Class SubjectRepository
 * @package App\Repositories
 * @version October 19, 2024, 4:32 pm UTC
 *
 * @method Subject findWithoutFail($id, $columns = ['*'])
 * @method Subject find($id, $columns = ['*'])
 * @method Subject first($columns = ['*'])
*/
class SubjectRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'code',
        'description'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Subject::class;
    }
}
