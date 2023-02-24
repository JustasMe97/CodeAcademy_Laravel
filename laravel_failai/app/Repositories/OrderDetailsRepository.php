<?php

namespace App\Repositories;

use App\Models\OrderDetails;
use JasonGuru\LaravelMakeRepository\Repository\BaseRepository;
//use Your Model

/**
 * Class OrderDetailsRepository.
 */
class OrderDetailsRepository extends BaseRepository
{
    /**
     * @return string
     *  Return the model
     */
    public function model()
    {
        return OrderDetails::class;
    }
}
