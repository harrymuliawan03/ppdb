<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;


/**
 * @SWG\Definition(
 *      definition="SppPayment",
 *      required={""},
 *      @SWG\Property(
 *          property="amount",
 *          description="amount",
 *          type="number",
 *          format="float"
 *      ),
 *      @SWG\Property(
 *          property="status",
 *          description="status",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="payment_month",
 *          description="payment_month",
 *          type="string",
 *          format="date"
 *      ),
 *      @SWG\Property(
 *          property="payment_date",
 *          description="payment_date",
 *          type="string",
 *          format="date"
 *      )
 * )
 */
class SppPayment extends Authenticatable
{
    use SoftDeletes;

    public $table = 'spp_payments';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'student_id',
        'amount',
        'status',
        'payment_month',
        'payment_date'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'status' => 'string',
        'payment_month' => 'date',
        'payment_date' => 'date'
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
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function paymentDetails()
    {
        return $this->hasMany(\App\Models\PaymentDetail::class);
    }
}
