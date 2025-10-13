<?php

declare(strict_types=1);

namespace HubspotSDK\CRM\Properties;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * An object containing the method's parameters.
 * Example usage:
 * ```
 * $params = (new PropertyDeleteParams); // set properties as needed
 * $client->crm.properties->delete(...$params->toArray());
 * ```
 * Move a property identified by {propertyName} to the recycling bin.
 *
 * @method toArray()
 *   Returns the parameters as an associative array suitable for passing to the client method.
 *
 *   `$client->crm.properties->delete(...$params->toArray());`
 *
 * @see HubspotSDK\CRM\Properties->delete
 *
 * @phpstan-type property_delete_params = array{objectType: string}
 */
final class PropertyDeleteParams implements BaseModel
{
    /** @use SdkModel<property_delete_params> */
    use SdkModel;
    use SdkParams;

    #[Api]
    public string $objectType;

    /**
     * `new PropertyDeleteParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * PropertyDeleteParams::with(objectType: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new PropertyDeleteParams)->withObjectType(...)
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
    public static function with(string $objectType): self
    {
        $obj = new self;

        $obj->objectType = $objectType;

        return $obj;
    }

    public function withObjectType(string $objectType): self
    {
        $obj = clone $this;
        $obj->objectType = $objectType;

        return $obj;
    }
}
