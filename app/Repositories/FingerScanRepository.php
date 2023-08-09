<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Models\FingerScan;
use Carbon\Carbon;

class FingerScanRepository  extends BaseRepository
{
    public function __construct(FingerScan $model)
    {
        $this->model = $model;
    }

    public function findByUserId($id)
    {
        return $this->model->where('user_id', $id)->where('isCorrect', 1)->get();
    }
    
    public function findToDayScan()
    {
        $today = Carbon::today();

        return $this->model
            ->whereDate('created_at', $today)
            ->where('isCorrect', 1)
            ->get();
    }
}
