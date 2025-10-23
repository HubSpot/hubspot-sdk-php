<?php

declare(strict_types=1);

namespace HubspotSDK\CRM\Lists;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type public_membership_settings = array{
 *   includeUnassigned?: bool, membershipTeamID?: int
 * }
 */
final class PublicMembershipSettings implements BaseModel
{
    /** @use SdkModel<public_membership_settings> */
    use SdkModel;

    #[Api(optional: true)]
    public ?bool $includeUnassigned;

    #[Api('membershipTeamId', optional: true)]
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

        null !== $includeUnassigned && $obj->includeUnassigned = $includeUnassigned;
        null !== $membershipTeamID && $obj->membershipTeamID = $membershipTeamID;

        return $obj;
    }

    public function withIncludeUnassigned(bool $includeUnassigned): self
    {
        $obj = clone $this;
        $obj->includeUnassigned = $includeUnassigned;

        return $obj;
    }

    public function withMembershipTeamID(int $membershipTeamID): self
    {
        $obj = clone $this;
        $obj->membershipTeamID = $membershipTeamID;

        return $obj;
    }
}
