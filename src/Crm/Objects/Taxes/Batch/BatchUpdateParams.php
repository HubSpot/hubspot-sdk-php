<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\Objects\Taxes\Batch;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\Crm\SimplePublicObjectBatchInput;

/**
 * Update a batch of taxes by internal ID, or unique property values.
 *
 * @see HubspotSDK\Services\Crm\Objects\Taxes\BatchService::update()
 *
 * @phpstan-type BatchUpdateParamsShape = array{
 *   inputs: list<SimplePublicObjectBatchInput>
 * }
 */
final class BatchUpdateParams implements BaseModel
{
    /** @use SdkModel<BatchUpdateParamsShape> */
    use SdkModel;
    use SdkParams;

    /** @var list<SimplePublicObjectBatchInput> $inputs */
    #[Api(list: SimplePublicObjectBatchInput::class)]
    public array $inputs;

    /**
     * `new BatchUpdateParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * BatchUpdateParams::with(inputs: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new BatchUpdateParams)->withInputs(...)
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
     * @param list<SimplePublicObjectBatchInput> $inputs
     */
    public static function with(array $inputs): self
    {
        $obj = new self;

        $obj->inputs = $inputs;

        return $obj;
    }

    /**
     * @param list<SimplePublicObjectBatchInput> $inputs
     */
    public function withInputs(array $inputs): self
    {
        $obj = clone $this;
        $obj->inputs = $inputs;

        return $obj;
    }
}
