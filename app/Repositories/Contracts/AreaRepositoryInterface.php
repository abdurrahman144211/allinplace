<?php

namespace App\Repositories\Contracts;

interface AreaRepositoryInterface
{
    /**
     * @return mixed
     */
    public function first();

    /**
     * @param $slug
     * @return mixed
     */
    public function bySlug($slug);
}
