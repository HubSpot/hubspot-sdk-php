<?php

declare(strict_types=1);

namespace HubspotSDK\CRM\Objects\Deals;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\CRM\Objects\PublicAssociationsForObject;

/**
 * An object containing the method's parameters.
 * Example usage:
 * ```
 * $params = (new DealCreateByObjectTypeIDParams); // set properties as needed
 * $client->crm.objects.deals->createByObjectTypeID(...$params->toArray());
 * ```
 * Create.
 *
 * @method toArray()
 *   Returns the parameters as an associative array suitable for passing to the client method.
 *
 *   `$client->crm.objects.deals->createByObjectTypeID(...$params->toArray());`
 *
 * @see HubspotSDK\CRM\Objects\Deals->createByObjectTypeID
 *
 * @phpstan-type deal_create_by_object_type_id_params = array{
 *   properties: array<string, string>,
 *   associations?: list<PublicAssociationsForObject>,
 * }
 */
final class DealCreateByObjectTypeIDParams implements BaseModel
{
    /** @use SdkModel<deal_create_by_object_type_id_params> */
    use SdkModel;
    use SdkParams;

    /** @var array<string, string> $properties */
    #[Api(map: 'string')]
    public array $properties;

    /** @var list<PublicAssociationsForObject>|null $associations */
    #[Api(list: PublicAssociationsForObject::class, optional: true)]
    public ?array $associations;

    /**
     * `new DealCreateByObjectTypeIDParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * DealCreateByObjectTypeIDParams::with(properties: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new DealCreateByObjectTypeIDParams)->withProperties(...)
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
     * @param list<PublicAssociationsForObject> $associations
     */
    public static function with(
        array $properties,
        ?array $associations = null
    ): self {
        $obj = new self;

        $obj->properties = $properties;

        null !== $associations && $obj->associations = $associations;

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

    /**
     * @param list<PublicAssociationsForObject> $associations
     */
    public function withAssociations(array $associations): self
    {
        $obj = clone $this;
        $obj->associations = $associations;

        return $obj;
    }
}
