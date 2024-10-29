<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;


/**
 * @SWG\Definition(
 *      definition="StudentGrade",
 *      required={""},
 *      @SWG\Property(
 *          property="nilai",
 *          description="nilai",
 *          type="number",
 *          format="float"
 *      )
 * )
 */
class StudentGrade extends Authenticatable
{
    use SoftDeletes;

    public $table = 'student_grades';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'student_id',
        'subject_id',
        'teacher_id',
        'nilai',
        'semester',
        'school_year'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        
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
    public function student()
    {
        return $this->belongsTo(\App\Models\Student::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function subject()
    {
        return $this->belongsTo(\App\Models\Subject::class, );
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function teacher()
    {
        return $this->belongsTo(\App\User::class, 'teacher_id');
    }
}
