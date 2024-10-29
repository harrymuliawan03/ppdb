<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;


/**
 * @SWG\Definition(
 *      definition="ProspectiveStudent",
 *      required={""},
 *      @SWG\Property(
 *          property="name",
 *          description="name",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="birth_date",
 *          description="birth_date",
 *          type="string",
 *          format="date"
 *      ),
 *      @SWG\Property(
 *          property="gender",
 *          description="gender",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="address",
 *          description="address",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="phone_number",
 *          description="phone_number",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="email",
 *          description="email",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="nisn",
 *          description="nisn",
 *          type="string"
 *      )
 * )
 */
class ProspectiveStudent extends Authenticatable
{
    use SoftDeletes;

    public $table = 'prospective_students';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'name',
        'birth_date',
        'gender',
        'address',
        'phone_number',
        'email',
        'nisn',
        'password'
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
        'password' => 'string'
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
