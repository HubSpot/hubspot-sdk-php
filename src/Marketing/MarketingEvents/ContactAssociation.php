<?php

declare(strict_types=1);

namespace HubSpotSDK\Marketing\MarketingEvents;

use HubSpotSDK\Core\Attributes\Optional;
use HubSpotSDK\Core\Attributes\Required;
use HubSpotSDK\Core\Concerns\SdkModel;
use HubSpotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type ContactAssociationShape = array{
 *   contactID: string,
 *   email: string,
 *   firstname?: string|null,
 *   lastname?: string|null,
 * }
 */
final class ContactAssociation implements BaseModel
{
    /** @use SdkModel<ContactAssociationShape> */
    use SdkModel;

    /**
     * The internal ID of the contact in HubSpot.
     */
    #[Required('contactId')]
    public string $contactID;

    /**
     * The email of the contact in HubSpot.
     */
    #[Required]
    public string $email;

    /**
     * The first name of the contact in HubSpot.
     */
    #[Optional]
    public ?string $firstname;

    /**
     * The last name of the contact in HubSpot.
     */
    #[Optional]
    public ?string $lastname;

    /**
     * `new ContactAssociation()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * ContactAssociation::with(contactID: ..., email: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new ContactAssociation)->withContactID(...)->withEmail(...)
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
        string $contactID,
        string $email,
        ?string $firstname = null,
        ?string $lastname = null,
    ): self {
        $self = new self;

        $self['contactID'] = $contactID;
        $self['email'] = $email;

        null !== $firstname && $self['firstname'] = $firstname;
        null !== $lastname && $self['lastname'] = $lastname;

        return $self;
    }

    /**
     * The internal ID of the contact in HubSpot.
     */
    public function withContactID(string $contactID): self
    {
        $self = clone $this;
        $self['contactID'] = $contactID;

        return $self;
    }

    /**
     * The email of the contact in HubSpot.
     */
    public function withEmail(string $email): self
    {
        $self = clone $this;
        $self['email'] = $email;

        return $self;
    }

    /**
     * The first name of the contact in HubSpot.
     */
    public function withFirstname(string $firstname): self
    {
        $self = clone $this;
        $self['firstname'] = $firstname;

        return $self;
    }

    /**
     * The last name of the contact in HubSpot.
     */
    public function withLastname(string $lastname): self
    {
        $self = clone $this;
        $self['lastname'] = $lastname;

        return $self;
    }
}
