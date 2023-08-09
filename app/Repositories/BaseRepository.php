<?php

declare(strict_types=1);

namespace App\Repositories;

use Illuminate\Support\Facades\Schema;

class BaseRepository implements BaseRepositoryInterface
{
    protected $model;

    /**
     * @return mixed
     */
    public function save(array $inputs, array $conditons = ['id' => null])
    {
        return $this->model->updateOrCreate($conditons, $inputs);
    }

    /**
     * @return mixed
     */
    public function get()
    {
        return $this->model->where(function($query) {
            $tableName = $this->model->getTable();
        })->get();
    }

    /**
     * @return mixed
     */
    public function findById($id)
    {
        return $this->model->where(function($query) {
            $tableName = $this->model->getTable();
        })->find($id);
    }

    /**
     * @return mixed
     */
    public function findByIdWithRelation($id, array $withRelation)
    {
        return $this->model->where(function($query) {
            $tableName = $this->model->getTable();
        })->with($withRelation)->find($id);
    }

    /**
     * @return mixed
     */
    public function deleteById($id)
    {
        return $this->model->destroy($id);
    }

}
