<?php

declare(strict_types=1);

namespace Webparking\LaravelVisma\Entities;

use Illuminate\Support\Collection;

class CustomerLedgerItem extends BaseEntity
{
    protected string $endpoint = '/customerledgeritems';

    public string $customerId;
    public string $dueDate;
    public string $invoiceDate;
    public string $invoiceNumber;
    public bool $isCreditInvoice = false;

    public string $currencyCode = 'EUR';
    public float  $remainingAmountInvoiceCurrency = 0;
    public float  $roundingsAmountInvoiceCurrency = 0;
    public float  $totalAmountInvoiceCurrency = 0;
    public float  $vatAmountInvoiceCurrency = 0;


    public function index(): Collection
    {
        return $this->baseIndex();
    }

    public function save(): object
    {
        return $this->basePost($this);
    }
}
