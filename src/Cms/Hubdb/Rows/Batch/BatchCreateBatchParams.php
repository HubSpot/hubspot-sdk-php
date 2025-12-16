<?php

declare(strict_types=1);

namespace HubspotSDK\Cms\Hubdb\Rows\Batch;

use HubspotSDK\Cms\Hubdb\HubDBTableRowV3Request;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * Creates rows in the draft version of the specified table, given an array of row objects. Maximum of 100 row object per call. See the overview section for more details with an example.
 *
 * @see HubspotSDK\Services\Cms\Hubdb\Rows\BatchService::createBatch()
 *
 * @phpstan-import-type HubDBTableRowV3RequestShape from \HubspotSDK\Cms\Hubdb\HubDBTableRowV3Request
 *
 * @phpstan-type BatchCreateBatchParamsShape = array{
 *   inputs: list<HubDBTableRowV3RequestShape>
 * }
 */
final class BatchCreateBatchParams implements BaseModel
{
    /** @use SdkModel<BatchCreateBatchParamsShape> */
    use SdkModel;
    use SdkParams;

    /** @var list<HubDBTableRowV3Request> $inputs */
    #[Required(list: HubDBTableRowV3Request::class)]
    public array $inputs;

    /**
     * `new BatchCreateBatchParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * BatchCreateBatchParams::with(inputs: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new BatchCreateBatchParams)->withInputs(...)
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
     * @param list<HubDBTableRowV3RequestShape> $inputs
     */
    public static function with(array $inputs): self
    {
        $self = new self;

        $self['inputs'] = $inputs;

        return $self;
    }

    /**
     * @param list<HubDBTableRowV3RequestShape> $inputs
     */
    public function withInputs(array $inputs): self
    {
        $self = clone $this;
        $self['inputs'] = $inputs;

        return $self;
    }
}
