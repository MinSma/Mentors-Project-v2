<?php
declare(strict_types = 1);

namespace App\Repositories;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

/**
 * Class Repository
 * @package App\Repositories
 */
abstract class Repository
{
    /**
     * @return string
     */
    abstract public function model(): string;

    /**
     * @return Model
     */
    final protected function makeModel(): Model
    {
        $model = app($this->model());

        return $model;
    }

    /**
     * @return Builder
     */
    final protected function makeQuery(): Builder
    {
        return $this->makeModel()->newQuery();
    }

    /**
     * @param array $columns
     * @return Collection
     */
    final public function all(array $columns = ['*']): Collection
    {
        return $this->makeQuery()->get($columns);
    }

    /**
     * @param array $data
     * @return Model
     */
    final public function create(array $data): Model
    {
        return $this->makeQuery()->create($data);
    }

    /**
     * @param array $data
     * @return int
     */
    final public function update(array $data)
    {
        return $this->makeQuery()->update($data);
    }

}