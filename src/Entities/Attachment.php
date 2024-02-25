<?php

declare(strict_types=1);

namespace Webparking\LaravelVisma\Entities;

use Illuminate\Support\Collection;

/**
 * @property string $Id
 * @property string $ContentType           - either image/jpeg, image/png, image/tif or application/pdf
 * @property string $FileName
 * @property string $Data                  - Optional. Base64 encoded data.
 * @property string $Url                   - Optional (can be used as alternative to $Data). Public URL to the asset.
 * @property string $DocumentId
 * @property int    $AttachedDocumentType  - 0 = None, 1 = SupplierInvoice, 2 = Receipt, 3 = Voucher, 4 = SupplierInvoiceDraft, 5 = AllocationPeriod, 6 = Transfer
 * @property string $TemporaryUrl
 * @property string $Comment
 * @property string $SupplierName
 * @property float  $AmountInvoiceCurrency
 * @property int    $Type                  0 = Invoice, 1 = Receipt, 2 = Document
 * @property int    $AttachmentStatus      0 = Matched, 1 = Unmatched
 * @property string $UploadedBy
 * @property string $ImageDate
 */
class Attachment extends BaseEntity
{
    protected string $endpoint = '/attachments';

    public string $id;
    public string $contentType;
    public string $fileName;
    public string $data;
    public string $url;
    public string $imageDate;

    public int $attachedDocumentType = 0;


    public function index(bool $includeMatched, bool $includeTemporaryUrl): Collection
    {
        $queryParams = [
            'includeMatched' => $includeMatched,
            'includeTemporaryUrl' => $includeTemporaryUrl,
        ];

        return $this->baseIndex($queryParams);
    }

    public function save(): object
    {
        return $this->basePost($this);
    }

    public function get(string $attachmentId): self
    {
        $originatingEndpoint = $this->endpoint;
        $this->endpoint .= '/' . $attachmentId;
        $attachmentData = $this->baseGet();
        $this->endpoint = $originatingEndpoint;

        foreach ($attachmentData as $key => $value) {
            $this->$key = $value;
        }

        return $this;
    }
}
