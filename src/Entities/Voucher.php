<?php

declare(strict_types=1);

namespace Webparking\LaravelVisma\Entities;

use Illuminate\Support\Collection;

/**
 * @property string       $VoucherDate
 * @property string       $VoucherText
 * @property VoucherRow[] $Rows
 * @property string       $ModifiedUtc
 * @property int          $VoucherType
 * @property string       $NumberSeries
 */
class Voucher extends BaseEntity
{
    protected string $endpoint = '/vouchers';

    public string $voucherDate;
    public string $voucherText;
    public array $rows;
    public int $voucherType;

    public function index(string $fiscalYearId): Collection
    {
        $this->endpoint .= '/' . $fiscalYearId;

        return $this->baseIndex();
    }

    public function save(): object
    {
        $queryParams = [];

        if (isset($this->NumberSeries)) {
            $queryParams['useDefaultVoucherSeries'] = 'false';
        }

        return $this->basePost($this, $queryParams);
    }
}
