<?php

declare(strict_types=1);

namespace HubspotSDK\Marketing\MarketingEvents;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type crm_property_wrapper = array{name: string, value: string}
 */
final class CRMPropertyWrapper implements BaseModel
{
    /** @use SdkModel<crm_property_wrapper> */
    use SdkModel;

    #[Api]
    public string $name;

    #[Api]
    public string $value;

    /**
     * `new CRMPropertyWrapper()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * CRMPropertyWrapper::with(name: ..., value: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new CRMPropertyWrapper)->withName(...)->withValue(...)
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
    public static function with(string $name, string $value): self
    {
        $obj = new self;

        $obj->name = $name;
        $obj->value = $value;

        return $obj;
    }

    public function withName(string $name): self
    {
        $obj = clone $this;
        $obj->name = $name;

        return $obj;
    }

    public function withValue(string $value): self
    {
        $obj = clone $this;
        $obj->value = $value;

        return $obj;
    }
}
