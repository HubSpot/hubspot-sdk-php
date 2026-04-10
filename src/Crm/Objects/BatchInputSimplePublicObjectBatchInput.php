<?php

declare(strict_types=1);

namespace HubSpotSDK\Crm\Objects;

use HubSpotSDK\Core\Attributes\Required;
use HubSpotSDK\Core\Concerns\SdkModel;
use HubSpotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type SimplePublicObjectBatchInputShape from \HubSpotSDK\Crm\Objects\SimplePublicObjectBatchInput
 *
 * @phpstan-type BatchInputSimplePublicObjectBatchInputShape = array{
 *   inputs: list<SimplePublicObjectBatchInput|SimplePublicObjectBatchInputShape>
 * }
 */
final class BatchInputSimplePublicObjectBatchInput implements BaseModel
{
    /** @use SdkModel<BatchInputSimplePublicObjectBatchInputShape> */
    use SdkModel;

    /** @var list<SimplePublicObjectBatchInput> $inputs */
    #[Required(list: SimplePublicObjectBatchInput::class)]
    public array $inputs;

    /**
     * `new BatchInputSimplePublicObjectBatchInput()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * BatchInputSimplePublicObjectBatchInput::with(inputs: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new BatchInputSimplePublicObjectBatchInput)->withInputs(...)
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
