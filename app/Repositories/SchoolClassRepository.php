<?php

namespace App\Repositories;

use App\Models\SchoolClass;
use Webcore\Generator\Common\BaseRepository;

/**
 * Class SchoolClassRepository
 * @package App\Repositories
 * @version October 18, 2024, 9:59 am UTC
 *
 * @method SchoolClass findWithoutFail($id, $columns = ['*'])
 * @method SchoolClass find($id, $columns = ['*'])
 * @method SchoolClass first($columns = ['*'])
*/
class SchoolClassRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nama_kelas',
        'jurusan',
        'wali_kelas',
        'tahun_ajaran'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return SchoolClass::class;
    }
}
