<?php

declare(strict_types=1);

namespace HubspotSDK\CRM\Imports;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @see HubspotSDK\CRM\Imports->listErrors
 *
 * @phpstan-type import_list_errors_params = array{
 *   after?: string, includeErrorMessage?: bool, includeRowData?: bool, limit?: int
 * }
 */
final class ImportListErrorsParams implements BaseModel
{
    /** @use SdkModel<import_list_errors_params> */
    use SdkModel;
    use SdkParams;

    /**
     * The paging cursor token of the last successfully read resource will be returned as the `paging.next.after` JSON property of a paged response containing more results.
     */
    #[Api(optional: true)]
    public ?string $after;

    /**
     * Set to True to receive a message explaining the error.
     */
    #[Api(optional: true)]
    public ?bool $includeErrorMessage;

    /**
     * Set to True to receive the data values for the errored row.
     */
    #[Api(optional: true)]
    public ?bool $includeRowData;

    /**
     * The maximum number of results to display per page.
     */
    #[Api(optional: true)]
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
        $obj = new self;

        null !== $after && $obj->after = $after;
        null !== $includeErrorMessage && $obj->includeErrorMessage = $includeErrorMessage;
        null !== $includeRowData && $obj->includeRowData = $includeRowData;
        null !== $limit && $obj->limit = $limit;

        return $obj;
    }

    /**
     * The paging cursor token of the last successfully read resource will be returned as the `paging.next.after` JSON property of a paged response containing more results.
     */
    public function withAfter(string $after): self
    {
        $obj = clone $this;
        $obj->after = $after;

        return $obj;
    }

    /**
     * Set to True to receive a message explaining the error.
     */
    public function withIncludeErrorMessage(bool $includeErrorMessage): self
    {
        $obj = clone $this;
        $obj->includeErrorMessage = $includeErrorMessage;

        return $obj;
    }

    /**
     * Set to True to receive the data values for the errored row.
     */
    public function withIncludeRowData(bool $includeRowData): self
    {
        $obj = clone $this;
        $obj->includeRowData = $includeRowData;

        return $obj;
    }

    /**
     * The maximum number of results to display per page.
     */
    public function withLimit(int $limit): self
    {
        $obj = clone $this;
        $obj->limit = $limit;

        return $obj;
    }
}
