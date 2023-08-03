<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Models\FingerPrint;

class FingerPrintRepository  extends BaseRepository
{
    public function __construct(FingerPrint $model)
    {
        $this->model = $model;
    }

    public function findByUserId($id)
    {
        return $this->model->where('user_id', $id)->get();
    }
}
