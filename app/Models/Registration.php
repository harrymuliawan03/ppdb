<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;


/**
 * @SWG\Definition(
 *      definition="Registration",
 *      required={""},
 *      @SWG\Property(
 *          property="ijazah",
 *          description="ijazah",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="raport",
 *          description="raport",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="birth_certificate",
 *          description="birth_certificate",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="student_photo",
 *          description="student_photo",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="registration_date",
 *          description="registration_date",
 *          type="string",
 *          format="date"
 *      ),
 *      @SWG\Property(
 *          property="status",
 *          description="status",
 *          type="string"
 *      )
 * )
 */
class Registration extends Authenticatable
{
    use SoftDeletes;

    public $table = 'registrations';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'prospective_student_id',
        'no_registration',
        'major_id',
        'average_ijazah',
        'average_raport',
        'old_school',
        'ijazah',
        'raport',
        'birth_certificate',
        'student_photo',
        'registration_date',
        'status'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'ijazah' => 'string',
        'raport' => 'string',
        'birth_certificate' => 'string',
        'student_photo' => 'string',
        'registration_date' => 'date',
        'status' => 'string'
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

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function prospective_student()
    {
        return $this->belongsTo(\App\Models\ProspectiveStudent::class);
    }

    public function major()
    {
        return $this->belongsTo(\App\Models\Major::class);
    }
}
