<?php

declare(strict_types=1);

namespace HubspotSDK\Cms\Hubdb\Rows;

use HubspotSDK\Cms\Hubdb\HubDBTableRowBatchCloneRequest;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * Clones rows in the draft version of the specified table, given a set of row ids. Maximum of 100 row ids per call.
 *
 * @see HubspotSDK\Services\Cms\Hubdb\RowsService::cloneBatch()
 *
 * @phpstan-import-type HubDBTableRowBatchCloneRequestShape from \HubspotSDK\Cms\Hubdb\HubDBTableRowBatchCloneRequest
 *
 * @phpstan-type RowCloneBatchParamsShape = array{
 *   inputs: list<HubDBTableRowBatchCloneRequest|HubDBTableRowBatchCloneRequestShape>,
 * }
 */
final class RowCloneBatchParams implements BaseModel
{
    /** @use SdkModel<RowCloneBatchParamsShape> */
    use SdkModel;
    use SdkParams;

    /** @var list<HubDBTableRowBatchCloneRequest> $inputs */
    #[Required(list: HubDBTableRowBatchCloneRequest::class)]
    public array $inputs;

    /**
     * `new RowCloneBatchParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * RowCloneBatchParams::with(inputs: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new RowCloneBatchParams)->withInputs(...)
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
     * @param list<HubDBTableRowBatchCloneRequest|HubDBTableRowBatchCloneRequestShape> $inputs
     */
    public static function with(array $inputs): self
    {
        $self = new self;

        $self['inputs'] = $inputs;

        return $self;
    }

    /**
     * @param list<HubDBTableRowBatchCloneRequest|HubDBTableRowBatchCloneRequestShape> $inputs
     */
    public function withInputs(array $inputs): self
    {
        $self = clone $this;
        $self['inputs'] = $inputs;

        return $self;
    }
}
