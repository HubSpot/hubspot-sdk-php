<?php

declare(strict_types=1);

namespace HubSpotSDK\Cms\Pages\SitePages;

use HubSpotSDK\Core\Attributes\Optional;
use HubSpotSDK\Core\Concerns\SdkModel;
use HubSpotSDK\Core\Concerns\SdkParams;
use HubSpotSDK\Core\Contracts\BaseModel;

/**
 * Delete a website page, specified by its ID.
 *
 * @see HubSpotSDK\Services\Cms\Pages\SitePagesService::delete()
 *
 * @phpstan-type SitePageDeleteParamsShape = array{archived?: bool|null}
 */
final class SitePageDeleteParams implements BaseModel
{
    /** @use SdkModel<SitePageDeleteParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * Whether to return only results that have been archived.
     */
    #[Optional]
    public ?bool $archived;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(?bool $archived = null): self
    {
        $self = new self;

        null !== $archived && $self['archived'] = $archived;

        return $self;
    }

    /**
     * Whether to return only results that have been archived.
     */
    public function withArchived(bool $archived): self
    {
        $self = clone $this;
        $self['archived'] = $archived;

        return $self;
    }
}
