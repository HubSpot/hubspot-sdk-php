<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\Objects\PartnerServices;

use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\Crm\Objects\SimplePublicObjectBatchInput;

/**
 * Update multiple partner services using their internal IDs or unique property values. This operation allows for batch processing of updates, ensuring efficient synchronization of service data between HubSpot and other systems.
 *
 * @see HubspotSDK\Services\Crm\Objects\PartnerServicesService::update()
 *
 * @phpstan-import-type SimplePublicObjectBatchInputShape from \HubspotSDK\Crm\Objects\SimplePublicObjectBatchInput
 *
 * @phpstan-type PartnerServiceUpdateParamsShape = array{
 *   inputs: list<SimplePublicObjectBatchInput|SimplePublicObjectBatchInputShape>
 * }
 */
final class PartnerServiceUpdateParams implements BaseModel
{
    /** @use SdkModel<PartnerServiceUpdateParamsShape> */
    use SdkModel;
    use SdkParams;

    /** @var list<SimplePublicObjectBatchInput> $inputs */
    #[Required(list: SimplePublicObjectBatchInput::class)]
    public array $inputs;

    /**
     * `new PartnerServiceUpdateParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * PartnerServiceUpdateParams::with(inputs: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new PartnerServiceUpdateParams)->withInputs(...)
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
