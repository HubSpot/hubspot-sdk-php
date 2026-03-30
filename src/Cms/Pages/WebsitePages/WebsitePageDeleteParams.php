<?php

declare(strict_types=1);

namespace HubspotSDK\Cms\Pages\WebsitePages;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * Delete a website page, specified by its ID.
 *
 * @see HubspotSDK\Services\Cms\Pages\WebsitePagesService::delete()
 *
 * @phpstan-type WebsitePageDeleteParamsShape = array{archived?: bool|null}
 */
final class WebsitePageDeleteParams implements BaseModel
{
    /** @use SdkModel<WebsitePageDeleteParamsShape> */
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
