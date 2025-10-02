<?php

declare(strict_types=1);

namespace HubspotSDK\CRM\Properties;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type crm_properties_batch_input_property_create = array{
 *   inputs: list<CRMPropertiesPropertyCreate>
 * }
 */
final class CRMPropertiesBatchInputPropertyCreate implements BaseModel
{
    /** @use SdkModel<crm_properties_batch_input_property_create> */
    use SdkModel;

    /** @var list<CRMPropertiesPropertyCreate> $inputs */
    #[Api(list: CRMPropertiesPropertyCreate::class)]
    public array $inputs;

    /**
     * `new CRMPropertiesBatchInputPropertyCreate()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * CRMPropertiesBatchInputPropertyCreate::with(inputs: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new CRMPropertiesBatchInputPropertyCreate)->withInputs(...)
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
     * @param list<CRMPropertiesPropertyCreate> $inputs
     */
    public static function with(array $inputs): self
    {
        $obj = new self;

        $obj->inputs = $inputs;

        return $obj;
    }

    /**
     * @param list<CRMPropertiesPropertyCreate> $inputs
     */
    public function withInputs(array $inputs): self
    {
        $obj = clone $this;
        $obj->inputs = $inputs;

        return $obj;
    }
}
