<?php

declare(strict_types=1);

namespace Webparking\LaravelVisma\Entities;

use Illuminate\Support\Collection;

class CustomerInvoice extends BaseEntity
{
    protected string $endpoint = '/customerinvoices';

    public bool $EUThirdParty = false;
    public string $customerId;
    public int $rotReducedInvoicingType = 0;
    public $rows;
    public string $yourReference;


    public function index(): Collection
    {
        return $this->baseIndex();
    }

    public function save(): object
    {
        return $this->basePost($this);
    }
}
