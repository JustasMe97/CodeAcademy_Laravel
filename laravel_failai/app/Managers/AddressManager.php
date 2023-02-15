<?php

namespace App\Managers;

use App\Http\Requests\AddressRequest;
use App\Models\Address;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\DB;

class AddressManager
{
    public function createAddress(AddressRequest $request): Address
    {
        $address = Address::create($request->all());

        return $address;
    }
    public function getAddresses(): Collection
    {
        $addresses = Address::query()->get();

        return $addresses;
    }
    public function updateAddress(AddressRequest $request, Address $address): Address
    {
        $address->update($request->all());

        return $address;
    }
    public function deleteAddress(Address $address): void
    {
        $address->delete();
    }

}
