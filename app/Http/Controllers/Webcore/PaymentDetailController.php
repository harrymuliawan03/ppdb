<?php

namespace App\Http\Controllers\Webcore;

use App\DataTables\PaymentDetailDataTable;
use App\Http\Requests;
use App\Http\Requests\CreatePaymentDetailRequest;
use App\Http\Requests\UpdatePaymentDetailRequest;
use App\Repositories\PaymentDetailRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;
use Illuminate\Http\Request; 
use Illuminate\Support\Facades\Auth; 
use Illuminate\Support\Facades\Storage; 
use Maatwebsite\Excel\Facades\Excel; 

class PaymentDetailController extends AppBaseController
{
    /** @var  PaymentDetailRepository */
    private $paymentDetailRepository;

    public function __construct(PaymentDetailRepository $paymentDetailRepo)
    {
        // $this->middleware('auth');
        $this->middleware('can:paymentDetail-edit', ['only' => ['edit']]);
        $this->middleware('can:paymentDetail-store', ['only' => ['store']]);
        $this->middleware('can:paymentDetail-show', ['only' => ['show']]);
        $this->middleware('can:paymentDetail-update', ['only' => ['update']]);
        $this->middleware('can:paymentDetail-delete', ['only' => ['delete']]);
        $this->middleware('can:paymentDetail-create', ['only' => ['create']]);
        $this->paymentDetailRepository = $paymentDetailRepo;
    }

    /**
     * Display a listing of the PaymentDetail.
     *
     * @param PaymentDetailDataTable $paymentDetailDataTable
     * @return Response
     */
    public function index(PaymentDetailDataTable $paymentDetailDataTable)
    {
        return $paymentDetailDataTable->render('payment_details.index');
    }

    /**
     * Show the form for creating a new PaymentDetail.
     *
     * @return Response
     */
    public function create()
    {
        $spppayment = \App\Models\SppPayment::all();
        $paymentDetail = \App\Models\PaymentDetail::all();
        

        return view('payment_details.create')
            ->with('spppayment', $spppayment)
            ->with('', $paymentDetail);
    }

    /**
     * Store a newly created PaymentDetail in storage.
     *
     * @param CreatePaymentDetailRequest $request
     *
     * @return Response
     */
    public function store(CreatePaymentDetailRequest $request)
    {
        $input = $request->all();

        $paymentDetail = $this->paymentDetailRepository->create($input);

        Flash::success('Payment Detail saved successfully.');
        return redirect(route('paymentDetails.index'));
    }

    /**
     * Display the specified PaymentDetail.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $paymentDetail = $this->paymentDetailRepository->findWithoutFail($id);

        if (empty($paymentDetail)) {
            Flash::error('Payment Detail not found');
            return redirect(route('paymentDetails.index'));
        }

        return view('payment_details.show')->with('paymentDetail', $paymentDetail);
    }

    /**
     * Show the form for editing the specified PaymentDetail.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        
        $spppayment = \App\Models\SppPayment::all();
        $paymentDetails = \App\Models\PaymentDetail::all();
        

        $paymentDetail = $this->paymentDetailRepository->findWithoutFail($id);

        if (empty($paymentDetail)) {
            Flash::error('Payment Detail not found');
            return redirect(route('paymentDetails.index'));
        }

        return view('payment_details.edit')
            ->with('paymentDetail', $paymentDetail)
            ->with('spppayment', $spppayment)
            ->with('', $paymentDetails);
    }

    /**
     * Update the specified PaymentDetail in storage.
     *
     * @param  int              $id
     * @param UpdatePaymentDetailRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatePaymentDetailRequest $request)
    {
        $paymentDetail = $this->paymentDetailRepository->findWithoutFail($id);

        if (empty($paymentDetail)) {
            Flash::error('Payment Detail not found');
            return redirect(route('paymentDetails.index'));
        }

        $input = $request->all();
        $paymentDetail = $this->paymentDetailRepository->update($input, $id);

        Flash::success('Payment Detail updated successfully.');
        return redirect(route('paymentDetails.index'));
    }

    /**
     * Remove the specified PaymentDetail from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $paymentDetail = $this->paymentDetailRepository->findWithoutFail($id);

        if (empty($paymentDetail)) {
            Flash::error('Payment Detail not found');
            return redirect(route('paymentDetails.index'));
        }

        $this->paymentDetailRepository->delete($id);

        Flash::success('Payment Detail deleted successfully.');
        return redirect(route('paymentDetails.index'));
    }

    /**
     * Store data PaymentDetail from an excel file in storage.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function import(Request $request)
    {
        Excel::load($request->file('file'), function($reader) {
            $reader->each(function ($item) {
                $paymentDetail = $this->paymentDetailRepository->create($item->toArray());
            });
        });

        Flash::success('Payment Detail saved successfully.');
        return redirect(route('paymentDetails.index'));
    }
}
