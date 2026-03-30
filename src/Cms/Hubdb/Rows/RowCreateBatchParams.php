<?php

declare(strict_types=1);

namespace HubspotSDK\Cms\Hubdb\Rows;

use HubspotSDK\Cms\Hubdb\HubDBTableRowV3Request;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * Creates rows in the draft version of the specified table, given an array of row objects. Maximum of 100 row object per call. See the overview section for more details with an example.
 *
 * @see HubspotSDK\Services\Cms\Hubdb\RowsService::createBatch()
 *
 * @phpstan-import-type HubDBTableRowV3RequestShape from \HubspotSDK\Cms\Hubdb\HubDBTableRowV3Request
 *
 * @phpstan-type RowCreateBatchParamsShape = array{
 *   inputs: list<HubDBTableRowV3Request|HubDBTableRowV3RequestShape>
 * }
 */
final class RowCreateBatchParams implements BaseModel
{
    /** @use SdkModel<RowCreateBatchParamsShape> */
    use SdkModel;
    use SdkParams;

    /** @var list<HubDBTableRowV3Request> $inputs */
    #[Required(list: HubDBTableRowV3Request::class)]
    public array $inputs;

    /**
     * `new RowCreateBatchParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * RowCreateBatchParams::with(inputs: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new RowCreateBatchParams)->withInputs(...)
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
     * @param list<HubDBTableRowV3Request|HubDBTableRowV3RequestShape> $inputs
     */
    public static function with(array $inputs): self
    {
        $self = new self;

        $self['inputs'] = $inputs;

        return $self;
    }

    /**
     * @param list<HubDBTableRowV3Request|HubDBTableRowV3RequestShape> $inputs
     */
    public function withInputs(array $inputs): self
    {
        $self = clone $this;
        $self['inputs'] = $inputs;

        return $self;
    }
}
