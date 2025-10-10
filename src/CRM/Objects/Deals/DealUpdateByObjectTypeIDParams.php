<?php

declare(strict_types=1);

namespace HubspotSDK\CRM\Objects\Deals;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * An object containing the method's parameters.
 * Example usage:
 * ```
 * $params = (new DealUpdateByObjectTypeIDParams); // set properties as needed
 * $client->crm.objects.deals->updateByObjectTypeID(...$params->toArray());
 * ```
 * Update.
 *
 * @method toArray()
 *   Returns the parameters as an associative array suitable for passing to the client method.
 *
 *   `$client->crm.objects.deals->updateByObjectTypeID(...$params->toArray());`
 *
 * @see HubspotSDK\CRM\Objects\Deals->updateByObjectTypeID
 *
 * @phpstan-type deal_update_by_object_type_id_params = array{
 *   properties: array<string, string>, idProperty?: string
 * }
 */
final class DealUpdateByObjectTypeIDParams implements BaseModel
{
    /** @use SdkModel<deal_update_by_object_type_id_params> */
    use SdkModel;
    use SdkParams;

    /** @var array<string, string> $properties */
    #[Api(map: 'string')]
    public array $properties;

    #[Api(optional: true)]
    public ?string $idProperty;

    /**
     * `new DealUpdateByObjectTypeIDParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * DealUpdateByObjectTypeIDParams::with(properties: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new DealUpdateByObjectTypeIDParams)->withProperties(...)
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
     * @param array<string, string> $properties
     */
    public static function with(
        array $properties,
        ?string $idProperty = null
    ): self {
        $obj = new self;

        $obj->properties = $properties;

        null !== $idProperty && $obj->idProperty = $idProperty;

        return $obj;
    }

    /**
     * @param array<string, string> $properties
     */
    public function withProperties(array $properties): self
    {
        $obj = clone $this;
        $obj->properties = $properties;

        return $obj;
    }

    public function withIDProperty(string $idProperty): self
    {
        $obj = clone $this;
        $obj->idProperty = $idProperty;

        return $obj;
    }
}
