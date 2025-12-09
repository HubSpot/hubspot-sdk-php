<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\Lists;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type PublicMembershipSettingsShape = array{
 *   includeUnassigned?: bool|null, membershipTeamID?: int|null
 * }
 */
final class PublicMembershipSettings implements BaseModel
{
    /** @use SdkModel<PublicMembershipSettingsShape> */
    use SdkModel;

    #[Optional]
    public ?bool $includeUnassigned;

    #[Optional('membershipTeamId')]
    public ?int $membershipTeamID;

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
        ?bool $includeUnassigned = null,
        ?int $membershipTeamID = null
    ): self {
        $self = new self;

        null !== $includeUnassigned && $self['includeUnassigned'] = $includeUnassigned;
        null !== $membershipTeamID && $self['membershipTeamID'] = $membershipTeamID;

        return $self;
    }

    public function withIncludeUnassigned(bool $includeUnassigned): self
    {
        $self = clone $this;
        $self['includeUnassigned'] = $includeUnassigned;

        return $self;
    }

    public function withMembershipTeamID(int $membershipTeamID): self
    {
        $self = clone $this;
        $self['membershipTeamID'] = $membershipTeamID;

        return $self;
    }
}
