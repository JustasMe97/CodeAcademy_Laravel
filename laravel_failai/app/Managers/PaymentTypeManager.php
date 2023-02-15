<?php

namespace App\Managers;

use App\Http\Requests\PaymentTypeRequest;
use App\Models\PaymentType;
use Illuminate\Database\Eloquent\Collection;

class PaymentTypeManager
{
    public function createPaymentType(PaymentTypeRequest $request): PaymentType
    {
        $paymentType = PaymentType::create($request->all());

        return $paymentType;
    }
    public function getPaymentTypes(): Collection
    {
        $paymentTypes = PaymentType::query()->get();

        return $paymentTypes;
    }
    public function updatePaymentType(PaymentTypeRequest $request, PaymentType $paymentType): PaymentType
    {
        $paymentType->update($request->all());

        return $paymentType;
    }
    public function deletePaymentType(PaymentType $paymentType): void
    {
        $paymentType->delete();
    }

}
