<?php

declare(strict_types=1);

namespace HubSpotSDK\Crm\Objects;

use HubSpotSDK\Core\Attributes\Required;
use HubSpotSDK\Core\Concerns\SdkModel;
use HubSpotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type SimplePublicObjectBatchInputForCreateShape from \HubSpotSDK\Crm\Objects\SimplePublicObjectBatchInputForCreate
 *
 * @phpstan-type BatchInputSimplePublicObjectBatchInputForCreateShape = array{
 *   inputs: list<SimplePublicObjectBatchInputForCreate|SimplePublicObjectBatchInputForCreateShape>,
 * }
 */
final class BatchInputSimplePublicObjectBatchInputForCreate implements BaseModel
{
    /** @use SdkModel<BatchInputSimplePublicObjectBatchInputForCreateShape> */
    use SdkModel;

    /** @var list<SimplePublicObjectBatchInputForCreate> $inputs */
    #[Required(list: SimplePublicObjectBatchInputForCreate::class)]
    public array $inputs;

    /**
     * `new BatchInputSimplePublicObjectBatchInputForCreate()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * BatchInputSimplePublicObjectBatchInputForCreate::with(inputs: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new BatchInputSimplePublicObjectBatchInputForCreate)->withInputs(...)
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
     * @param list<SimplePublicObjectBatchInputForCreate|SimplePublicObjectBatchInputForCreateShape> $inputs
     */
    public static function with(array $inputs): self
    {
        $self = new self;

        $self['inputs'] = $inputs;

        return $self;
    }

    /**
     * @param list<SimplePublicObjectBatchInputForCreate|SimplePublicObjectBatchInputForCreateShape> $inputs
     */
    public function withInputs(array $inputs): self
    {
        $self = clone $this;
        $self['inputs'] = $inputs;

        return $self;
    }
}
