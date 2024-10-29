<?php

namespace App\Repositories;

use App\Models\Major;
use Webcore\Generator\Common\BaseRepository;

/**
 * Class MajorRepository
 * @package App\Repositories
 * @version October 16, 2024, 9:19 am UTC
 *
 * @method Major findWithoutFail($id, $columns = ['*'])
 * @method Major find($id, $columns = ['*'])
 * @method Major first($columns = ['*'])
*/
class MajorRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'kode_jurusan',
        'nama_jurusan',
        'deskripsi'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Major::class;
    }
}
