<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\Objects\Services;

use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\Crm\Objects\SimplePublicObjectBatchInput;

/**
 * Update a batch of objects.
 *
 * @see HubspotSDK\Services\Crm\Objects\ServicesService::update()
 *
 * @phpstan-import-type SimplePublicObjectBatchInputShape from \HubspotSDK\Crm\Objects\SimplePublicObjectBatchInput
 *
 * @phpstan-type ServiceUpdateParamsShape = array{
 *   inputs: list<SimplePublicObjectBatchInput|SimplePublicObjectBatchInputShape>
 * }
 */
final class ServiceUpdateParams implements BaseModel
{
    /** @use SdkModel<ServiceUpdateParamsShape> */
    use SdkModel;
    use SdkParams;

    /** @var list<SimplePublicObjectBatchInput> $inputs */
    #[Required(list: SimplePublicObjectBatchInput::class)]
    public array $inputs;

    /**
     * `new ServiceUpdateParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * ServiceUpdateParams::with(inputs: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new ServiceUpdateParams)->withInputs(...)
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
