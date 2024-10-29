<?php

namespace App\Repositories;

use App\Models\SppPayment;
use Webcore\Generator\Common\BaseRepository;

/**
 * Class SppPaymentRepository
 * @package App\Repositories
 * @version October 18, 2024, 1:59 am UTC
 *
 * @method SppPayment findWithoutFail($id, $columns = ['*'])
 * @method SppPayment find($id, $columns = ['*'])
 * @method SppPayment first($columns = ['*'])
*/
class SppPaymentRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'student_id',
        'amount',
        'status',
        'payment_month',
        'payment_date'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return SppPayment::class;
    }
}
