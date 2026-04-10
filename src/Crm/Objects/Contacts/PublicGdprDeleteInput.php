<?php

declare(strict_types=1);

namespace HubSpotSDK\Crm\Objects\Contacts;

use HubSpotSDK\Core\Attributes\Optional;
use HubSpotSDK\Core\Attributes\Required;
use HubSpotSDK\Core\Concerns\SdkModel;
use HubSpotSDK\Core\Contracts\BaseModel;

/**
 * An input that contains the information required to process a public GDPR data deletion request.
 *
 * @phpstan-type PublicGdprDeleteInputShape = array{
 *   objectID: string, idProperty?: string|null
 * }
 */
final class PublicGdprDeleteInput implements BaseModel
{
    /** @use SdkModel<PublicGdprDeleteInputShape> */
    use SdkModel;

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
     * `new PublicGdprDeleteInput()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * PublicGdprDeleteInput::with(objectID: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new PublicGdprDeleteInput)->withObjectID(...)
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
