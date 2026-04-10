<?php

declare(strict_types=1);

namespace HubSpotSDK\Scheduler\Meetings;

use HubSpotSDK\Core\Attributes\Optional;
use HubSpotSDK\Core\Concerns\SdkModel;
use HubSpotSDK\Core\Contracts\BaseModel;
use HubSpotSDK\Scheduler\Meetings\ExternalLinkDisplayInfo\PublicDisplayAvatarOption;

/**
 * @phpstan-type ExternalLinkDisplayInfoShape = array{
 *   avatar?: string|null,
 *   companyAvatar?: string|null,
 *   headline?: string|null,
 *   publicDisplayAvatarOption?: null|PublicDisplayAvatarOption|value-of<PublicDisplayAvatarOption>,
 * }
 */
final class ExternalLinkDisplayInfo implements BaseModel
{
    /** @use SdkModel<ExternalLinkDisplayInfoShape> */
    use SdkModel;

    /**
     * The URL of the user's custom uploaded avatar image.
     */
    #[Optional]
    public ?string $avatar;

    /**
     * The URL of the company's avatar image.
     */
    #[Optional]
    public ?string $companyAvatar;

    /**
     * Deprecated field with no impact of link display info.
     */
    #[Optional]
    public ?string $headline;

    /**
     * Option for determining which avatar to display on scheduling page. Accepted values are: PROFILE_IMAGE, COMPANY_LOGO, CUSTOM_AVATAR,.
     *
     * @var value-of<PublicDisplayAvatarOption>|null $publicDisplayAvatarOption
     */
    #[Optional(enum: PublicDisplayAvatarOption::class)]
    public ?string $publicDisplayAvatarOption;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param PublicDisplayAvatarOption|value-of<PublicDisplayAvatarOption>|null $publicDisplayAvatarOption
     */
    public static function with(
        ?string $avatar = null,
        ?string $companyAvatar = null,
        ?string $headline = null,
        PublicDisplayAvatarOption|string|null $publicDisplayAvatarOption = null,
    ): self {
        $self = new self;

        null !== $avatar && $self['avatar'] = $avatar;
        null !== $companyAvatar && $self['companyAvatar'] = $companyAvatar;
        null !== $headline && $self['headline'] = $headline;
        null !== $publicDisplayAvatarOption && $self['publicDisplayAvatarOption'] = $publicDisplayAvatarOption;

        return $self;
    }

    /**
     * The URL of the user's custom uploaded avatar image.
     */
    public function withAvatar(string $avatar): self
    {
        $self = clone $this;
        $self['avatar'] = $avatar;

        return $self;
    }

    /**
     * The URL of the company's avatar image.
     */
    public function withCompanyAvatar(string $companyAvatar): self
    {
        $self = clone $this;
        $self['companyAvatar'] = $companyAvatar;

        return $self;
    }

    /**
     * Deprecated field with no impact of link display info.
     */
    public function withHeadline(string $headline): self
    {
        $self = clone $this;
        $self['headline'] = $headline;

        return $self;
    }

    /**
     * Option for determining which avatar to display on scheduling page. Accepted values are: PROFILE_IMAGE, COMPANY_LOGO, CUSTOM_AVATAR,.
     *
     * @param PublicDisplayAvatarOption|value-of<PublicDisplayAvatarOption> $publicDisplayAvatarOption
     */
    public function withPublicDisplayAvatarOption(
        PublicDisplayAvatarOption|string $publicDisplayAvatarOption
    ): self {
        $self = clone $this;
        $self['publicDisplayAvatarOption'] = $publicDisplayAvatarOption;

        return $self;
    }
}
