<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\Lists;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type PublicMembershipSettingsShape = array{
 *   includeUnassigned?: bool|null, membershipTeamId?: int|null
 * }
 */
final class PublicMembershipSettings implements BaseModel
{
    /** @use SdkModel<PublicMembershipSettingsShape> */
    use SdkModel;

    #[Api(optional: true)]
    public ?bool $includeUnassigned;

    #[Api(optional: true)]
    public ?int $membershipTeamId;

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
        ?int $membershipTeamId = null
    ): self {
        $obj = new self;

        null !== $includeUnassigned && $obj['includeUnassigned'] = $includeUnassigned;
        null !== $membershipTeamId && $obj['membershipTeamId'] = $membershipTeamId;

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
        $obj['membershipTeamId'] = $membershipTeamID;

        return $obj;
    }
}
