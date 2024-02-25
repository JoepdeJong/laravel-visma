<?php

declare(strict_types=1);

namespace Webparking\LaravelVisma\Entities;

use Illuminate\Support\Collection;

class Article extends BaseEntity
{
    protected string $endpoint = '/articles';

    public function index(): Collection
    {
        return $this->baseIndex();
    }

    public function save(): object
    {
        return $this->basePost($this);
    }
}
