<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\Objects\Contacts;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\Crm\PublicAssociationsForObject;

/**
 * Create a single contact. Include a `properties` object to define [property values](https://developers.hubspot.com/docs/guides/api/crm/properties) for the contact, along with an `associations` array to define [associations](https://developers.hubspot.com/docs/guides/api/crm/associations/associations-v4) with other CRM records.
 *
 * @see HubspotSDK\Services\Crm\Objects\ContactsService::create()
 *
 * @phpstan-type ContactCreateParamsShape = array{
 *   associations: list<PublicAssociationsForObject>,
 *   properties: array<string,string>,
 * }
 */
final class ContactCreateParams implements BaseModel
{
    /** @use SdkModel<ContactCreateParamsShape> */
    use SdkModel;
    use SdkParams;

    /** @var list<PublicAssociationsForObject> $associations */
    #[Api(list: PublicAssociationsForObject::class)]
    public array $associations;

    /**
     * Key-value pairs for setting properties for the new object.
     *
     * @var array<string,string> $properties
     */
    #[Api(map: 'string')]
    public array $properties;

    /**
     * `new ContactCreateParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * ContactCreateParams::with(associations: ..., properties: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new ContactCreateParams)->withAssociations(...)->withProperties(...)
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
     * @param list<PublicAssociationsForObject> $associations
     * @param array<string,string> $properties
     */
    public static function with(array $associations, array $properties): self
    {
        $obj = new self;

        $obj->associations = $associations;
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

    /**
     * Key-value pairs for setting properties for the new object.
     *
     * @param array<string,string> $properties
     */
    public function withProperties(array $properties): self
    {
        $obj = clone $this;
        $obj->properties = $properties;

        return $obj;
    }
}
