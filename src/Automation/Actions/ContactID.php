<?php

declare(strict_types=1);

namespace HubSpotSDK\Automation\Actions;

use HubSpotSDK\Core\Attributes\Optional;
use HubSpotSDK\Core\Attributes\Required;
use HubSpotSDK\Core\Concerns\SdkModel;
use HubSpotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type ContactIDShape = array{
 *   portalID: int, email?: string|null, vid?: int|null
 * }
 */
final class ContactID implements BaseModel
{
    /** @use SdkModel<ContactIDShape> */
    use SdkModel;

    /**
     * The ID of the portal associated with the contact.
     */
    #[Required('portalId')]
    public int $portalID;

    /**
     * The email address of the contact.
     */
    #[Optional]
    public ?string $email;

    /**
     * The unique identifier for the contact.
     */
    #[Optional]
    public ?int $vid;

    /**
     * `new ContactID()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * ContactID::with(portalID: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new ContactID)->withPortalID(...)
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
        int $portalID,
        ?string $email = null,
        ?int $vid = null
    ): self {
        $self = new self;

        $self['portalID'] = $portalID;

        null !== $email && $self['email'] = $email;
        null !== $vid && $self['vid'] = $vid;

        return $self;
    }

    /**
     * The ID of the portal associated with the contact.
     */
    public function withPortalID(int $portalID): self
    {
        $self = clone $this;
        $self['portalID'] = $portalID;

        return $self;
    }

    /**
     * The email address of the contact.
     */
    public function withEmail(string $email): self
    {
        $self = clone $this;
        $self['email'] = $email;

        return $self;
    }

    /**
     * The unique identifier for the contact.
     */
    public function withVid(int $vid): self
    {
        $self = clone $this;
        $self['vid'] = $vid;

        return $self;
    }
}
