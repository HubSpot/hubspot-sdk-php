<?php

declare(strict_types=1);

namespace HubspotSDK\CRM\Properties;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type crm_properties_batch_input_property_name = array{
 *   inputs: list<CRMPropertiesPropertyName>
 * }
 */
final class CRMPropertiesBatchInputPropertyName implements BaseModel
{
    /** @use SdkModel<crm_properties_batch_input_property_name> */
    use SdkModel;

    /** @var list<CRMPropertiesPropertyName> $inputs */
    #[Api(list: CRMPropertiesPropertyName::class)]
    public array $inputs;

    /**
     * `new CRMPropertiesBatchInputPropertyName()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * CRMPropertiesBatchInputPropertyName::with(inputs: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new CRMPropertiesBatchInputPropertyName)->withInputs(...)
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
     * @param list<CRMPropertiesPropertyName> $inputs
     */
    public static function with(array $inputs): self
    {
        $obj = new self;

        $obj->inputs = $inputs;

        return $obj;
    }

    /**
     * @param list<CRMPropertiesPropertyName> $inputs
     */
    public function withInputs(array $inputs): self
    {
        $obj = clone $this;
        $obj->inputs = $inputs;

        return $obj;
    }
}
