<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Models\User;

class UserRepository extends BaseRepository
{
    public function __construct(User $model)
    {
        $this->model = $model;
    }

    public function getAddsubByName()
    {
    }
    public function findByEmail($email)
    {
        return $this->model->where('email', $email)->first();
    }
    public function getAllUser($sortBy = null, $sortOrder = null, $search = null)
    {
        $query = $this->model->where('is_admin', 0);

        if ($sortBy && $sortOrder) {
            $query->orderBy($sortBy, $sortOrder);
        }

        if ($search) {
            $query->where(function ($query) use ($search) {
                $query->where('maNV', 'LIKE', "%{$search}%")
                     ->orWhere('name', 'REGEXP', "[[:<:]]{$search}$");
            });
        }

        return $query->get();
    }

    public function deleteByUserId($userId)
    {
        return $this->model->where('id', $userId)->delete();
    }
}
