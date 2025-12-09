<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\Objects\Contacts;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * Update an existing contact, identified by ID or email/unique property value. To identify a contact by ID, include the ID in the request URL path. To identify a contact by their email or other unique property, include the email/property value in the request URL path, and add the `idProperty` query parameter (`/crm/v3/objects/contacts/jon@website.com?idProperty=email`). Provided property values will be overwritten. Read-only and non-existent properties will result in an error. Properties values can be cleared by passing an empty string.
 *
 * @see HubspotSDK\Services\Crm\Objects\ContactsService::update()
 *
 * @phpstan-type ContactUpdateParamsShape = array{
 *   properties: array<string,string>, idProperty?: string
 * }
 */
final class ContactUpdateParams implements BaseModel
{
    /** @use SdkModel<ContactUpdateParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * Key value pairs representing the properties of the object.
     *
     * @var array<string,string> $properties
     */
    #[Required(map: 'string')]
    public array $properties;

    /**
     * The name of a property whose values are unique for this object.
     */
    #[Optional]
    public ?string $idProperty;

    /**
     * `new ContactUpdateParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * ContactUpdateParams::with(properties: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new ContactUpdateParams)->withProperties(...)
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
     * @param array<string,string> $properties
     */
    public static function with(
        array $properties,
        ?string $idProperty = null
    ): self {
        $obj = new self;

        $obj['properties'] = $properties;

        null !== $idProperty && $obj['idProperty'] = $idProperty;

        return $obj;
    }

    /**
     * Key value pairs representing the properties of the object.
     *
     * @param array<string,string> $properties
     */
    public function withProperties(array $properties): self
    {
        $obj = clone $this;
        $obj['properties'] = $properties;

        return $obj;
    }

    /**
     * The name of a property whose values are unique for this object.
     */
    public function withIDProperty(string $idProperty): self
    {
        $obj = clone $this;
        $obj['idProperty'] = $idProperty;

        return $obj;
    }
}
