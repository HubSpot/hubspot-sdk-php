<?php

declare(strict_types=1);

namespace HubspotSDK\Scheduler\Meetings;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type ExternalLinkDisplayInfoShape = array{
 *   avatar?: string|null,
 *   companyAvatar?: string|null,
 *   headline?: string|null,
 *   publicDisplayAvatarOption?: string|null,
 * }
 */
final class ExternalLinkDisplayInfo implements BaseModel
{
    /** @use SdkModel<ExternalLinkDisplayInfoShape> */
    use SdkModel;

    #[Optional]
    public ?string $avatar;

    #[Optional]
    public ?string $companyAvatar;

    #[Optional]
    public ?string $headline;

    #[Optional]
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
        $self = new self;

        null !== $avatar && $self['avatar'] = $avatar;
        null !== $companyAvatar && $self['companyAvatar'] = $companyAvatar;
        null !== $headline && $self['headline'] = $headline;
        null !== $publicDisplayAvatarOption && $self['publicDisplayAvatarOption'] = $publicDisplayAvatarOption;

        return $self;
    }

    public function withAvatar(string $avatar): self
    {
        $self = clone $this;
        $self['avatar'] = $avatar;

        return $self;
    }

    public function withCompanyAvatar(string $companyAvatar): self
    {
        $self = clone $this;
        $self['companyAvatar'] = $companyAvatar;

        return $self;
    }

    public function withHeadline(string $headline): self
    {
        $self = clone $this;
        $self['headline'] = $headline;

        return $self;
    }

    public function withPublicDisplayAvatarOption(
        string $publicDisplayAvatarOption
    ): self {
        $self = clone $this;
        $self['publicDisplayAvatarOption'] = $publicDisplayAvatarOption;

        return $self;
    }
}
