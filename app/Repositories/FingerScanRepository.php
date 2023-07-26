<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Models\FingerScan;

class FingerScanRepository  extends BaseRepository
{
    public function __construct(FingerScan $model)
    {
        $this->model = $model;
    }

    public function findByUserId($id)
    {
        return $this->model->where('user_id', $id)->get();
    }
}
