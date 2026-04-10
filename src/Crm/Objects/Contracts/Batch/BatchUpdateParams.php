<?php

declare(strict_types=1);

namespace HubSpotSDK\Crm\Objects\Contracts\Batch;

use HubSpotSDK\Core\Attributes\Required;
use HubSpotSDK\Core\Concerns\SdkModel;
use HubSpotSDK\Core\Concerns\SdkParams;
use HubSpotSDK\Core\Contracts\BaseModel;
use HubSpotSDK\Crm\Objects\SimplePublicObjectBatchInput;

/**
 * Update multiple contracts by their internal IDs or unique property values. This endpoint allows you to modify the properties of several contracts in a single request, streamlining the update process for batch operations.
 *
 * @see HubSpotSDK\Services\Crm\Objects\Contracts\BatchService::update()
 *
 * @phpstan-import-type SimplePublicObjectBatchInputShape from \HubSpotSDK\Crm\Objects\SimplePublicObjectBatchInput
 *
 * @phpstan-type BatchUpdateParamsShape = array{
 *   inputs: list<SimplePublicObjectBatchInput|SimplePublicObjectBatchInputShape>
 * }
 */
final class BatchUpdateParams implements BaseModel
{
    /** @use SdkModel<BatchUpdateParamsShape> */
    use SdkModel;
    use SdkParams;

    /** @var list<SimplePublicObjectBatchInput> $inputs */
    #[Required(list: SimplePublicObjectBatchInput::class)]
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
     * @param list<SimplePublicObjectBatchInput|SimplePublicObjectBatchInputShape> $inputs
     */
    public static function with(array $inputs): self
    {
        $self = new self;

        $self['inputs'] = $inputs;

        return $self;
    }

    /**
     * @param list<SimplePublicObjectBatchInput|SimplePublicObjectBatchInputShape> $inputs
     */
    public function withInputs(array $inputs): self
    {
        $self = clone $this;
        $self['inputs'] = $inputs;

        return $self;
    }
}
