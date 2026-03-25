<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\Objects\Contacts;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * Permanently delete a contact and all associated content to follow GDPR. Use optional property `idProperty` set to `email` to identify contact by email address. If email address is not found, the email address will be added to a blocklist and prevent it from being used in the future. Learn more about [permanently deleting contacts](https://knowledge.hubspot.com/privacy-and-consent/how-do-i-perform-a-gdpr-delete-in-hubspot).
 *
 * @see HubspotSDK\Services\Crm\Objects\ContactsService::gdprDelete()
 *
 * @phpstan-type ContactGdprDeleteParamsShape = array{
 *   objectID: string, idProperty?: string|null
 * }
 */
final class ContactGdprDeleteParams implements BaseModel
{
    /** @use SdkModel<ContactGdprDeleteParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * The ID of the contact to permanently delete.
     */
    #[Required('objectId')]
    public string $objectID;

    /**
     * The name of a property whose values are unique for this object. An alternative to identifying a contact by ID.
     */
    #[Optional]
    public ?string $idProperty;

    /**
     * `new ContactGdprDeleteParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * ContactGdprDeleteParams::with(objectID: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new ContactGdprDeleteParams)->withObjectID(...)
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
    public static function with(
        string $objectID,
        ?string $idProperty = null
    ): self {
        $self = new self;

        $self['objectID'] = $objectID;

        null !== $idProperty && $self['idProperty'] = $idProperty;

        return $self;
    }

    /**
     * The ID of the contact to permanently delete.
     */
    public function withObjectID(string $objectID): self
    {
        $self = clone $this;
        $self['objectID'] = $objectID;

        return $self;
    }

    /**
     * The name of a property whose values are unique for this object. An alternative to identifying a contact by ID.
     */
    public function withIDProperty(string $idProperty): self
    {
        $self = clone $this;
        $self['idProperty'] = $idProperty;

        return $self;
    }
}
