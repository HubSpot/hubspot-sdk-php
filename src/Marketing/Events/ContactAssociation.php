<?php

declare(strict_types=1);

namespace HubspotSDK\Marketing\Events;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

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

    #[Required('contactId')]
    public string $contactID;

    #[Required]
    public string $email;

    #[Optional]
    public ?string $firstname;

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

    public function withContactID(string $contactID): self
    {
        $self = clone $this;
        $self['contactID'] = $contactID;

        return $self;
    }

    public function withEmail(string $email): self
    {
        $self = clone $this;
        $self['email'] = $email;

        return $self;
    }

    public function withFirstname(string $firstname): self
    {
        $self = clone $this;
        $self['firstname'] = $firstname;

        return $self;
    }

    public function withLastname(string $lastname): self
    {
        $self = clone $this;
        $self['lastname'] = $lastname;

        return $self;
    }
}
