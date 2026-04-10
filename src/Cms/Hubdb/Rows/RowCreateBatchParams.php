<?php

declare(strict_types=1);

namespace HubSpotSDK\Cms\Hubdb\Rows;

use HubSpotSDK\Cms\Hubdb\HubDBTableRowV3Request;
use HubSpotSDK\Core\Attributes\Required;
use HubSpotSDK\Core\Concerns\SdkModel;
use HubSpotSDK\Core\Concerns\SdkParams;
use HubSpotSDK\Core\Contracts\BaseModel;

/**
 * Creates rows in the draft version of the specified table, given an array of row objects. Maximum of 100 row object per call. See the overview section for more details with an example.
 *
 * @see HubSpotSDK\Services\Cms\Hubdb\RowsService::createBatch()
 *
 * @phpstan-import-type HubDBTableRowV3RequestShape from \HubSpotSDK\Cms\Hubdb\HubDBTableRowV3Request
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
