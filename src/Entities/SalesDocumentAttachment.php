<?php

declare(strict_types=1);

namespace Webparking\LaravelVisma\Entities;

use Illuminate\Support\Collection;

class SalesDocumentAttachment extends BaseEntity
{
    protected string $endpoint = '/salesdocumentattachments';

    public string $contentType = 'application/pdf';
    public string $fileName;
    public string $dockumentId;
    public string $data;
    public string $url;

    public function index(): Collection
    {
        return $this->baseIndex();
    }

    public function save(): object
    {
        return $this->basePost($this);
    }
}
