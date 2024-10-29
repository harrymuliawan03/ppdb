<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;


/**
 * @SWG\Definition(
 *      definition="Major",
 *      required={""},
 *      @SWG\Property(
 *          property="kode_jurusan",
 *          description="kode_jurusan",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="nama_jurusan",
 *          description="nama_jurusan",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="deskripsi",
 *          description="deskripsi",
 *          type="string"
 *      )
 * )
 */
class Major extends Authenticatable
{
    use SoftDeletes;

    public $table = 'majors';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'kode_jurusan',
        'nama_jurusan',
        'deskripsi'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'kode_jurusan' => 'string',
        'nama_jurusan' => 'string',
        'deskripsi' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    public function getTableColumns() {
        return $this->getConnection()->getSchemaBuilder()->getColumnListing($this->getTable());
    }

    
}
