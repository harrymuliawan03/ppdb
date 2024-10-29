<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;


/**
 * @SWG\Definition(
 *      definition="SchoolClass",
 *      required={""},
 *      @SWG\Property(
 *          property="nama_kelas",
 *          description="nama_kelas",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="jurusan_id",
 *          description="jurusan_id",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="wali_kelas_id",
 *          description="wali_kelas_id",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="tahun_ajaran",
 *          description="tahun_ajaran",
 *          type="string"
 *      )
 * )
 */
class SchoolClass extends Authenticatable
{
    use SoftDeletes;

    public $table = 'school_classes';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'nama_kelas',
        'jurusan_id',
        'wali_kelas_id',
        'tahun_ajaran'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'nama_kelas' => 'string',
        'jurusan_id' => 'string',
        'wali_kelas_id' => 'string',
        'tahun_ajaran' => 'string'
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

    public function teacher()
    {
        return $this->belongsTo(\App\User::class, 'wali_kelas_id');
    }

    public function jurusan()
    {
        return $this->belongsTo(\App\Models\Major::class, 'jurusan_id');
    }

    
}
