<?php

declare(strict_types=1);

namespace HubspotSDK\Automation\Actions;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type ContactIDShape = array{
 *   portalID: int, email?: string|null, vid?: int|null
 * }
 */
final class ContactID implements BaseModel
{
    /** @use SdkModel<ContactIDShape> */
    use SdkModel;

    #[Required('portalId')]
    public int $portalID;

    #[Optional]
    public ?string $email;

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

    public function withPortalID(int $portalID): self
    {
        $self = clone $this;
        $self['portalID'] = $portalID;

        return $self;
    }

    public function withEmail(string $email): self
    {
        $self = clone $this;
        $self['email'] = $email;

        return $self;
    }

    public function withVid(int $vid): self
    {
        $self = clone $this;
        $self['vid'] = $vid;

        return $self;
    }
}
