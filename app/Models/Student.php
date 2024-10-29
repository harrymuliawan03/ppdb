<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Student extends Authenticatable
{
    use SoftDeletes;

    public $table = 'students';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'name',
        'school_class_id',
        'birth_date',
        'gender',
        'address',
        'phone_number',
        'email',
        'nisn',
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'name' => 'string',
        'birth_date' => 'date',
        'gender' => 'string',
        'address' => 'string',
        'phone_number' => 'string',
        'email' => 'string',
        'nisn' => 'string',
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

    public function school_class() {
        return $this->belongsTo(SchoolClass::class, 'school_class_id');
    }

    
}
