<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\Imports;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @see HubspotSDK\Services\Crm\ImportsService::listErrors()
 *
 * @phpstan-type ImportListErrorsParamsShape = array{
 *   after?: string|null,
 *   includeErrorMessage?: bool|null,
 *   includeRowData?: bool|null,
 *   limit?: int|null,
 * }
 */
final class ImportListErrorsParams implements BaseModel
{
    /** @use SdkModel<ImportListErrorsParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * The paging cursor token of the last successfully read resource will be returned as the `paging.next.after` JSON property of a paged response containing more results.
     */
    #[Optional]
    public ?string $after;

    /**
     * Set to True to receive a message explaining the error.
     */
    #[Optional]
    public ?bool $includeErrorMessage;

    /**
     * Set to True to receive the data values for the errored row.
     */
    #[Optional]
    public ?bool $includeRowData;

    /**
     * The maximum number of results to display per page.
     */
    #[Optional]
    public ?int $limit;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(
        ?string $after = null,
        ?bool $includeErrorMessage = null,
        ?bool $includeRowData = null,
        ?int $limit = null,
    ): self {
        $self = new self;

        null !== $after && $self['after'] = $after;
        null !== $includeErrorMessage && $self['includeErrorMessage'] = $includeErrorMessage;
        null !== $includeRowData && $self['includeRowData'] = $includeRowData;
        null !== $limit && $self['limit'] = $limit;

        return $self;
    }

    /**
     * The paging cursor token of the last successfully read resource will be returned as the `paging.next.after` JSON property of a paged response containing more results.
     */
    public function withAfter(string $after): self
    {
        $self = clone $this;
        $self['after'] = $after;

        return $self;
    }

    /**
     * Set to True to receive a message explaining the error.
     */
    public function withIncludeErrorMessage(bool $includeErrorMessage): self
    {
        $self = clone $this;
        $self['includeErrorMessage'] = $includeErrorMessage;

        return $self;
    }

    /**
     * Set to True to receive the data values for the errored row.
     */
    public function withIncludeRowData(bool $includeRowData): self
    {
        $self = clone $this;
        $self['includeRowData'] = $includeRowData;

        return $self;
    }

    /**
     * The maximum number of results to display per page.
     */
    public function withLimit(int $limit): self
    {
        $self = clone $this;
        $self['limit'] = $limit;

        return $self;
    }
}
