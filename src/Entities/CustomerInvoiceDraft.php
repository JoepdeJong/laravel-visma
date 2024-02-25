<?php

declare(strict_types=1);

namespace Webparking\LaravelVisma\Entities;

class CustomerInvoiceDraft extends CustomerInvoice
{
    protected string $endpoint = '/customerinvoicedrafts';
}
