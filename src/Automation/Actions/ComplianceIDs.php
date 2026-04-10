<?php

declare(strict_types=1);

namespace HubSpotSDK\Automation\Actions;

use HubSpotSDK\Core\Attributes\Optional;
use HubSpotSDK\Core\Attributes\Required;
use HubSpotSDK\Core\Concerns\SdkModel;
use HubSpotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type ContactIDShape from \HubSpotSDK\Automation\Actions\ContactID
 *
 * @phpstan-type ComplianceIDsShape = array{
 *   contactIDs: list<ContactID|ContactIDShape>,
 *   portalIDs: list<int>,
 *   userIDs: list<int>,
 *   noContactIDReason?: string|null,
 *   noPortalIDReason?: string|null,
 *   noUserIDReason?: string|null,
 * }
 */
final class ComplianceIDs implements BaseModel
{
    /** @use SdkModel<ComplianceIDsShape> */
    use SdkModel;

    /** @var list<ContactID> $contactIDs */
    #[Required('contactIds', list: ContactID::class)]
    public array $contactIDs;

    /** @var list<int> $portalIDs */
    #[Required('portalIds', list: 'int')]
    public array $portalIDs;

    /** @var list<int> $userIDs */
    #[Required('userIds', list: 'int')]
    public array $userIDs;

    /**
     * The reason why no contact ID is available.
     */
    #[Optional('noContactIdReason')]
    public ?string $noContactIDReason;

    /**
     * The reason why no portal ID is available.
     */
    #[Optional('noPortalIdReason')]
    public ?string $noPortalIDReason;

    /**
     * The reason why no user ID is available.
     */
    #[Optional('noUserIdReason')]
    public ?string $noUserIDReason;

    /**
     * `new ComplianceIDs()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * ComplianceIDs::with(contactIDs: ..., portalIDs: ..., userIDs: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new ComplianceIDs)->withContactIDs(...)->withPortalIDs(...)->withUserIDs(...)
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
     *
     * @param list<ContactID|ContactIDShape> $contactIDs
     * @param list<int> $portalIDs
     * @param list<int> $userIDs
     */
    public static function with(
        array $contactIDs,
        array $portalIDs,
        array $userIDs,
        ?string $noContactIDReason = null,
        ?string $noPortalIDReason = null,
        ?string $noUserIDReason = null,
    ): self {
        $self = new self;

        $self['contactIDs'] = $contactIDs;
        $self['portalIDs'] = $portalIDs;
        $self['userIDs'] = $userIDs;

        null !== $noContactIDReason && $self['noContactIDReason'] = $noContactIDReason;
        null !== $noPortalIDReason && $self['noPortalIDReason'] = $noPortalIDReason;
        null !== $noUserIDReason && $self['noUserIDReason'] = $noUserIDReason;

        return $self;
    }

    /**
     * @param list<ContactID|ContactIDShape> $contactIDs
     */
    public function withContactIDs(array $contactIDs): self
    {
        $self = clone $this;
        $self['contactIDs'] = $contactIDs;

        return $self;
    }

    /**
     * @param list<int> $portalIDs
     */
    public function withPortalIDs(array $portalIDs): self
    {
        $self = clone $this;
        $self['portalIDs'] = $portalIDs;

        return $self;
    }

    /**
     * @param list<int> $userIDs
     */
    public function withUserIDs(array $userIDs): self
    {
        $self = clone $this;
        $self['userIDs'] = $userIDs;

        return $self;
    }

    /**
     * The reason why no contact ID is available.
     */
    public function withNoContactIDReason(string $noContactIDReason): self
    {
        $self = clone $this;
        $self['noContactIDReason'] = $noContactIDReason;

        return $self;
    }

    /**
     * The reason why no portal ID is available.
     */
    public function withNoPortalIDReason(string $noPortalIDReason): self
    {
        $self = clone $this;
        $self['noPortalIDReason'] = $noPortalIDReason;

        return $self;
    }

    /**
     * The reason why no user ID is available.
     */
    public function withNoUserIDReason(string $noUserIDReason): self
    {
        $self = clone $this;
        $self['noUserIDReason'] = $noUserIDReason;

        return $self;
    }
}
