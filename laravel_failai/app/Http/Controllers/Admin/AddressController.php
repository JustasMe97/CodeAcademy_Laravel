<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\AddressRequest;
use App\Managers\AddressManager;
use App\Models\Address;

class AddressController
{
    public function __construct(protected AddressManager $manager)
    {
    }

    public function index()
    {
        $addresses = $this->manager->getAddresses();
        return view('address.index', compact('addresses'));
    }

    public function create()
    {
        return view('address.create');
    }

    public function store(AddressRequest $request)
    {
        $address=$this->manager->createAddress($request);
        return redirect()->route('addresses.show', $address);
    }

    public function show(Address $address)
    {
        return view('address.show', ['address' => $address]);
    }

    public function edit(Address $address)
    {
        return view('address.edit', compact('address'));
    }

    public function update(AddressRequest $request, Address $address)
    {
        $address=$this->manager->updateAddress($request,$address);
        return redirect()->route('addresses.show', $address);
    }

    public function destroy(Address $address)
    {
        $this->manager->deleteAddress($address);
        return redirect()->route('addresses.index');
    }

}
