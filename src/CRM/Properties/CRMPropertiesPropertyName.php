<?php

declare(strict_types=1);

namespace HubspotSDK\CRM\Properties;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type crm_properties_property_name = array{name: string}
 */
final class CRMPropertiesPropertyName implements BaseModel
{
    /** @use SdkModel<crm_properties_property_name> */
    use SdkModel;

    #[Api]
    public string $name;

    /**
     * `new CRMPropertiesPropertyName()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * CRMPropertiesPropertyName::with(name: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new CRMPropertiesPropertyName)->withName(...)
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
     */
    public static function with(string $name): self
    {
        $obj = new self;

        $obj->name = $name;

        return $obj;
    }

    public function withName(string $name): self
    {
        $obj = clone $this;
        $obj->name = $name;

        return $obj;
    }
}
