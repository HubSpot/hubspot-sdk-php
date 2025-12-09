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
        $obj = new self;

        $obj['contactID'] = $contactID;
        $obj['email'] = $email;

        null !== $firstname && $obj['firstname'] = $firstname;
        null !== $lastname && $obj['lastname'] = $lastname;

        return $obj;
    }

    public function withContactID(string $contactID): self
    {
        $obj = clone $this;
        $obj['contactID'] = $contactID;

        return $obj;
    }

    public function withEmail(string $email): self
    {
        $obj = clone $this;
        $obj['email'] = $email;

        return $obj;
    }

    public function withFirstname(string $firstname): self
    {
        $obj = clone $this;
        $obj['firstname'] = $firstname;

        return $obj;
    }

    public function withLastname(string $lastname): self
    {
        $obj = clone $this;
        $obj['lastname'] = $lastname;

        return $obj;
    }
}
