<?php

namespace App\Http\Controllers\Webcore;

use App\DataTables\SppPaymentDataTable;
use App\Http\Requests\CreateSppPaymentRequest;
use App\Http\Requests\UpdateSppPaymentRequest;
use App\Repositories\SppPaymentRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use App\Models\PaymentDetail;
use App\Models\SppPayment;
use App\Models\Student;
use Carbon\Carbon;
use Response;
use Illuminate\Http\Request; 
use Maatwebsite\Excel\Facades\Excel; 

class SppPaymentController extends AppBaseController
{
    /** @var  SppPaymentRepository */
    private $sppPaymentRepository;

    public function __construct(SppPaymentRepository $sppPaymentRepo)
    {
        // $this->middleware('auth');
        $this->middleware('can:sppPayment-edit', ['only' => ['edit']]);
        $this->middleware('can:sppPayment-store', ['only' => ['store']]);
        $this->middleware('can:sppPayment-show', ['only' => ['show']]);
        $this->middleware('can:sppPayment-update', ['only' => ['update']]);
        $this->middleware('can:sppPayment-delete', ['only' => ['delete']]);
        $this->middleware('can:sppPayment-create', ['only' => ['create']]);
        $this->sppPaymentRepository = $sppPaymentRepo;
    }

    /**
     * Display a listing of the SppPayment.
     *
     * @param SppPaymentDataTable $sppPaymentDataTable
     * @return Response
     */
    public function index(SppPaymentDataTable $sppPaymentDataTable)
    {
        return $sppPaymentDataTable->render('spp_payments.index');
    }

    /**
     * Show the form for creating a new SppPayment.
     *
     * @return Response
     */
    public function create()
    {
        $student = \App\Models\Student::all();
        $paymentdetail = \App\Models\PaymentDetail::all();
        $sppPayments = \App\Models\SppPayment::all();
        

        return view('spp_payments.create')
            ->with('student', $student)
            ->with('paymentdetail', $paymentdetail)
            ->with('', $sppPayments);
    }

    /**
     * Store a newly created SppPayment in storage.
     *
     * @param CreateSppPaymentRequest $request
     *
     * @return Response
     */
    public function store(CreateSppPaymentRequest $request)
    {
        $input = $request->all();

        $sppPayment = $this->sppPaymentRepository->create($input);

        Flash::success('Spp Payment saved successfully.');
        return redirect(route('sppPayments.index'));
    }

    /**
     * Display the specified SppPayment.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $sppPayment = $this->sppPaymentRepository->findWithoutFail($id);

        if (empty($sppPayment)) {
            Flash::error('Spp Payment not found');
            return redirect(route('sppPayments.index'));
        }

        return view('spp_payments.show')->with('sppPayment', $sppPayment);
    }

    /**
     * Show the form for editing the specified SppPayment.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        
        $student = \App\Models\Student::all();
        $paymentdetail = \App\Models\PaymentDetail::all();
        $sppPayments = \App\Models\SppPayment::all();

        $sppPayment = $this->sppPaymentRepository->findWithoutFail($id);

        if (empty($sppPayment)) {
            Flash::error('Spp Payment not found');
            return redirect(route('sppPayments.index'));
        }

        return view('spp_payments.edit')
            ->with('sppPayment', $sppPayment)
            ->with('student', $student)
            ->with('paymentdetail', $paymentdetail)
            ->with('', $sppPayments);
    }

    /**
     * Update the specified SppPayment in storage.
     *
     * @param  int              $id
     * @param UpdateSppPaymentRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateSppPaymentRequest $request)
    {
        $sppPayment = $this->sppPaymentRepository->findWithoutFail($id);

        if (empty($sppPayment)) {
            Flash::error('Spp Payment not found');
            return redirect(route('sppPayments.index'));
        }

        $input = $request->all();
        if($input['status'] == 'paid') {
            if('paid' && $input['payment_date'] != null) {
                $paymentDetail = new PaymentDetail();
                $paymentDetail->spp_payment_id = $id;
                $paymentDetail->description = $input['description'];
                $paymentDetail->payment_method = $input['payment_method'];
                $paymentDetail->amount = $input['amount'];
                $paymentDetail->save();
            }else {
            Flash::error('If Status is Paid, Payment Date is required');
            return redirect(route('sppPayments.edit', $id));
            }
        }

        $sppPayment = $this->sppPaymentRepository->update($input, $id);

        Flash::success('Spp Payment updated successfully.');
        return redirect(route('sppPayments.index'));
    }

    /**
     * Remove the specified SppPayment from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $sppPayment = $this->sppPaymentRepository->findWithoutFail($id);

        if (empty($sppPayment)) {
            Flash::error('Spp Payment not found');
            return redirect(route('sppPayments.index'));
        }

        $this->sppPaymentRepository->delete($id);

        Flash::success('Spp Payment deleted successfully.');
        return redirect(route('sppPayments.index'));
    }

    /**
     * Store data SppPayment from an excel file in storage.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function import(Request $request)
    {
        Excel::load($request->file('file'), function($reader) {
            $reader->each(function ($item) {
                $sppPayment = $this->sppPaymentRepository->create($item->toArray());
            });
        });

        Flash::success('Spp Payment saved successfully.');
        return redirect(route('sppPayments.index'));
    }

    public function generate()
    {
        $currentMonth = Carbon::now()->startOfMonth();

        $students = Student::all();
        
        foreach ($students as $student) {
            $existingSpp = SppPayment::where('student_id', $student->id)
                              ->where('payment_month', $currentMonth)
                              ->first();
            
            if (!$existingSpp) {
                SppPayment::create([
                    'student_id' => $student->id,
                    'amount' => 100000,
                    'status' => 'pending',
                    'payment_month' => $currentMonth,
                    'payment_date' => null,
                ]);
            }
        }

        return redirect()->back()->with('success', 'SPP generated for all students for this month.');
    }
}
