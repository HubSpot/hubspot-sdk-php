<?php

declare(strict_types=1);

namespace HubSpotSDK\Crm\Objects\Contacts;

use HubSpotSDK\Core\Attributes\Optional;
use HubSpotSDK\Core\Attributes\Required;
use HubSpotSDK\Core\Concerns\SdkModel;
use HubSpotSDK\Core\Concerns\SdkParams;
use HubSpotSDK\Core\Contracts\BaseModel;

/**
 * @see HubSpotSDK\Services\Crm\Objects\ContactsService::gdprDelete()
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
