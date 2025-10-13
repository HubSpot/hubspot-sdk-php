<?php

declare(strict_types=1);

namespace HubspotSDK\CRM\Properties;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type property_name = array{name: string}
 */
final class PropertyName implements BaseModel
{
    /** @use SdkModel<property_name> */
    use SdkModel;

    /**
     * The name of the property to read or modify.
     */
    #[Api]
    public string $name;

    /**
     * `new PropertyName()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * PropertyName::with(name: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new PropertyName)->withName(...)
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

    /**
     * The name of the property to read or modify.
     */
    public function withName(string $name): self
    {
        $obj = clone $this;
        $obj->name = $name;

        return $obj;
    }
}
