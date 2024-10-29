<?php

namespace App\Repositories;

use App\Models\PaymentDetail;
use Webcore\Generator\Common\BaseRepository;

/**
 * Class PaymentDetailRepository
 * @package App\Repositories
 * @version October 18, 2024, 2:00 am UTC
 *
 * @method PaymentDetail findWithoutFail($id, $columns = ['*'])
 * @method PaymentDetail find($id, $columns = ['*'])
 * @method PaymentDetail first($columns = ['*'])
*/
class PaymentDetailRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'spp_payment_id',
        'description',
        'amount'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return PaymentDetail::class;
    }
}
