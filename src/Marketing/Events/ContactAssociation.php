<?php

declare(strict_types=1);

namespace HubspotSDK\Marketing\Events;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type ContactAssociationShape = array{
 *   contactId: string,
 *   email: string,
 *   firstname?: string|null,
 *   lastname?: string|null,
 * }
 */
final class ContactAssociation implements BaseModel
{
    /** @use SdkModel<ContactAssociationShape> */
    use SdkModel;

    #[Api]
    public string $contactId;

    #[Api]
    public string $email;

    #[Api(optional: true)]
    public ?string $firstname;

    #[Api(optional: true)]
    public ?string $lastname;

    /**
     * `new ContactAssociation()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * ContactAssociation::with(contactId: ..., email: ...)
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
        string $contactId,
        string $email,
        ?string $firstname = null,
        ?string $lastname = null,
    ): self {
        $obj = new self;

        $obj['contactId'] = $contactId;
        $obj['email'] = $email;

        null !== $firstname && $obj['firstname'] = $firstname;
        null !== $lastname && $obj['lastname'] = $lastname;

        return $obj;
    }

    public function withContactID(string $contactID): self
    {
        $obj = clone $this;
        $obj['contactId'] = $contactID;

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
