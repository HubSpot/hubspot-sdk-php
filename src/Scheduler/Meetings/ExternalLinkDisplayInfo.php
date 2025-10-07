<?php

declare(strict_types=1);

namespace HubspotSDK\Scheduler\Meetings;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type external_link_display_info = array{
 *   avatar?: string,
 *   companyAvatar?: string,
 *   headline?: string,
 *   publicDisplayAvatarOption?: string,
 * }
 */
final class ExternalLinkDisplayInfo implements BaseModel
{
    /** @use SdkModel<external_link_display_info> */
    use SdkModel;

    #[Api(optional: true)]
    public ?string $avatar;

    #[Api(optional: true)]
    public ?string $companyAvatar;

    #[Api(optional: true)]
    public ?string $headline;

    #[Api(optional: true)]
    public ?string $publicDisplayAvatarOption;

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
        ?string $avatar = null,
        ?string $companyAvatar = null,
        ?string $headline = null,
        ?string $publicDisplayAvatarOption = null,
    ): self {
        $obj = new self;

        null !== $avatar && $obj->avatar = $avatar;
        null !== $companyAvatar && $obj->companyAvatar = $companyAvatar;
        null !== $headline && $obj->headline = $headline;
        null !== $publicDisplayAvatarOption && $obj->publicDisplayAvatarOption = $publicDisplayAvatarOption;

        return $obj;
    }

    public function withAvatar(string $avatar): self
    {
        $obj = clone $this;
        $obj->avatar = $avatar;

        return $obj;
    }

    public function withCompanyAvatar(string $companyAvatar): self
    {
        $obj = clone $this;
        $obj->companyAvatar = $companyAvatar;

        return $obj;
    }

    public function withHeadline(string $headline): self
    {
        $obj = clone $this;
        $obj->headline = $headline;

        return $obj;
    }

    public function withPublicDisplayAvatarOption(
        string $publicDisplayAvatarOption
    ): self {
        $obj = clone $this;
        $obj->publicDisplayAvatarOption = $publicDisplayAvatarOption;

        return $obj;
    }
}
