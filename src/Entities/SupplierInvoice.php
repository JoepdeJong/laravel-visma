<?php

declare(strict_types=1);

namespace Webparking\LaravelVisma\Entities;

use Illuminate\Support\Collection;

class SupplierInvoice extends BaseEntity
{
    protected string $endpoint = '/supplierinvoices';

    public string $supplierId;
    public string $accountNumber;
    public $rows;
    public string $invoiceDate;
    public string $invoiceNumber;
    public bool $isCreditInvoice = false;


    public function index(): Collection
    {
        return $this->baseIndex();
    }

    public function save(): object
    {
        return $this->basePost($this);
    }
}
