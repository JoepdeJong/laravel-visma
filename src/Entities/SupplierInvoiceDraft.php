<?php

declare(strict_types=1);

namespace Webparking\LaravelVisma\Entities;

class SupplierInvoiceDraft extends SupplierInvoice
{
    protected string $endpoint = '/supplierinvoicedrafts';
}
