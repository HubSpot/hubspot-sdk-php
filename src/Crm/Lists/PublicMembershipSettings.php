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
        $obj = new self;

        null !== $includeUnassigned && $obj['includeUnassigned'] = $includeUnassigned;
        null !== $membershipTeamID && $obj['membershipTeamID'] = $membershipTeamID;

        return $obj;
    }

    public function withIncludeUnassigned(bool $includeUnassigned): self
    {
        $obj = clone $this;
        $obj['includeUnassigned'] = $includeUnassigned;

        return $obj;
    }

    public function withMembershipTeamID(int $membershipTeamID): self
    {
        $obj = clone $this;
        $obj['membershipTeamID'] = $membershipTeamID;

        return $obj;
    }
}
