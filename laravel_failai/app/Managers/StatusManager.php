<?php

namespace App\Managers;

use App\Http\Requests\StatusRequest;
use App\Models\Status;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\DB;

class StatusManager
{
    public function createStatus(StatusRequest $request): Status
    {
        $status = Status::create($request->all());

        return $status;
    }
    public function getStatuses(): Collection
    {
        $statuses = Status::query()->get();

        return $statuses;
    }
    public function updateStatus(StatusRequest $request, Status $status): Status
    {
        $status->update($request->all());

        return $status;
    }
    public function deleteStatus(Status $status): void
    {
        $status->delete();
    }
}
