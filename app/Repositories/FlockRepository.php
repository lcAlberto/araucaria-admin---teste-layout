<?php

namespace App\Repositories;

use App\Animal;
use App\Base\Repository;
use App\Http\Requests;

class FlockRepository extends Repository
{
    protected function getClass()
    {
        return Animal::class;
    }

    public function createAnimal($data)
    {
        return $this->model->create($data);
    }

    public function updateAnimal($data, $id)
    {
        $model = $this->model->find($id);

        return $model->update($data);

    }
}
