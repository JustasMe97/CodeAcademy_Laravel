<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\StatusRequest;
use App\Managers\StatusManager;
use App\Models\Status;

class StatusController
{
    public function __construct(protected StatusManager $manager)
    {
    }

    public function index()
    {
        $statuses = $this->manager->getStatuses();
        return view('status.index', compact('statuses'));
    }

    public function create()
    {
        return view('status.create');
    }

    public function store(StatusRequest $request)
    {
        $status=$this->manager->createStatus($request);
        return redirect()->route('statuses.show', $status);
    }

    public function show(Status $status)
    {
        return view('status.show', ['status' => $status]);
    }

    public function edit(Status $status)
    {
        return view('status.edit', compact('status'));
    }

    public function update(StatusRequest $request, Status $status)
    {
        $status=$this->manager->updateStatus($request,$status);
        return redirect()->route('statuses.show', $status);
    }

    public function destroy(Status $status)
    {
        $this->manager->deleteStatus($status);
        return redirect()->route('statuses.index');
    }

}
