<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\PaymentTypeRequest;
use App\Managers\PaymentTypeManager;
use App\Models\PaymentType;

class PaymentTypeController extends Controller
{
    public function __construct(protected PaymentTypeManager $manager)
    {
    }
    public function index()
    {
        $paymentTypes=$this->manager->getPaymentTypes();
        return view('paymentType.index', compact('paymentTypes'));
    }

    public function create()
    {
        return view('paymentType.create');
    }

    public function store(PaymentTypeRequest $request)
    {
        $paymentType=$this->manager->createPaymentType($request);
        return redirect()->route('paymentTypes.show', $paymentType);
    }

    public function show(PaymentType $paymentType)
    {
        return view('paymentType.show', ['paymentType' => $paymentType]);
    }

    public function edit(PaymentType $paymentType)
    {
        return view('paymentType.edit', compact('paymentType'));
    }

    public function update(PaymentTypeRequest $request, PaymentType $paymentType)
    {
        $paymentType=$this->manager->updatePaymentType($request,$paymentType);
        return redirect()->route('paymentTypes.show', $paymentType);
    }

    public function destroy(PaymentType $paymentType)
    {
        $this->manager->deletePaymentType($paymentType);
        return redirect()->route('paymentTypes.index');
    }
}
