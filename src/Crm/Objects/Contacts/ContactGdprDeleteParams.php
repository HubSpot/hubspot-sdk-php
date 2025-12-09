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
 *   objectID: string, idProperty?: string
 * }
 */
final class ContactGdprDeleteParams implements BaseModel
{
    /** @use SdkModel<ContactGdprDeleteParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * ID of the object.
     */
    #[Required('objectId')]
    public string $objectID;

    /**
     * ID property.
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
        $obj = new self;

        $obj['objectID'] = $objectID;

        null !== $idProperty && $obj['idProperty'] = $idProperty;

        return $obj;
    }

    /**
     * ID of the object.
     */
    public function withObjectID(string $objectID): self
    {
        $obj = clone $this;
        $obj['objectID'] = $objectID;

        return $obj;
    }

    /**
     * ID property.
     */
    public function withIDProperty(string $idProperty): self
    {
        $obj = clone $this;
        $obj['idProperty'] = $idProperty;

        return $obj;
    }
}
