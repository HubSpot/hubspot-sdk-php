<?php

declare(strict_types=1);

namespace HubspotSDK\Cms\Hubdb\Rows\Batch;

use HubspotSDK\Cms\Hubdb\HubDBTableRowV3BatchUpdateRequest;
use HubspotSDK\Cms\Hubdb\Variant;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * Replaces multiple rows as a batch in the draft version of the table, with a maximum of 100 rows per call. See the endpoint `PUT /tables/{tableIdOrName}/rows/{rowId}/draft` for details on updating a single row.
 *
 * @see HubspotSDK\Services\Cms\Hubdb\Rows\BatchService::replaceBatch()
 *
 * @phpstan-type BatchReplaceBatchParamsShape = array{
 *   inputs: list<HubDBTableRowV3BatchUpdateRequest|array{
 *     childTableID: int,
 *     displayIndex: int,
 *     values: array<string,Variant>,
 *     id?: string|null,
 *     name?: string|null,
 *     path?: string|null,
 *   }>,
 * }
 */
final class BatchReplaceBatchParams implements BaseModel
{
    /** @use SdkModel<BatchReplaceBatchParamsShape> */
    use SdkModel;
    use SdkParams;

    /** @var list<HubDBTableRowV3BatchUpdateRequest> $inputs */
    #[Required(list: HubDBTableRowV3BatchUpdateRequest::class)]
    public array $inputs;

    /**
     * `new BatchReplaceBatchParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * BatchReplaceBatchParams::with(inputs: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new BatchReplaceBatchParams)->withInputs(...)
     * ```
     */
    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param list<HubDBTableRowV3BatchUpdateRequest|array{
     *   childTableID: int,
     *   displayIndex: int,
     *   values: array<string,Variant>,
     *   id?: string|null,
     *   name?: string|null,
     *   path?: string|null,
     * }> $inputs
     */
    public static function with(array $inputs): self
    {
        $self = new self;

        $self['inputs'] = $inputs;

        return $self;
    }

    /**
     * @param list<HubDBTableRowV3BatchUpdateRequest|array{
     *   childTableID: int,
     *   displayIndex: int,
     *   values: array<string,Variant>,
     *   id?: string|null,
     *   name?: string|null,
     *   path?: string|null,
     * }> $inputs
     */
    public function withInputs(array $inputs): self
    {
        $self = clone $this;
        $self['inputs'] = $inputs;

        return $self;
    }
}
