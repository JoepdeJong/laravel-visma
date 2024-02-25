<?php

declare(strict_types=1);

namespace Webparking\LaravelVisma\Entities;

use Illuminate\Support\Collection;

class Supplier extends BaseEntity
{
    protected string $endpoint = '/suppliers';

    public string $id;
    public int $customer_number;
    public string $name;

    public function index(): Collection
    {
        return $this->baseIndex();
    }

    public function save(): object
    {
        return $this->basePost($this);
    }
}
