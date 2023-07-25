<?php

declare(strict_types=1);

namespace App\Repositories;

interface BaseRepositoryInterface
{

    public function save(array $inputs, array $conditons = []);

    public function get();

    public function findById($id);

    public function findByIdWithRelation($id, array $withRelation);

    public function deleteById($id);
}
