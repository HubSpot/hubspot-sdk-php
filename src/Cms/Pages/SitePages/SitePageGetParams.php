<?php

declare(strict_types=1);

namespace HubspotSDK\Cms\Pages\SitePages;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * Retrieve the Site Page object identified by the id in the path.
 *
 * @see HubspotSDK\Services\Cms\Pages\SitePagesService::get()
 *
 * @phpstan-type SitePageGetParamsShape = array{
 *   archived?: bool|null, property?: string|null
 * }
 */
final class SitePageGetParams implements BaseModel
{
    /** @use SdkModel<SitePageGetParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * Specifies whether to return deleted Site Pages. Defaults to `false`.
     */
    #[Optional]
    public ?bool $archived;

    #[Optional]
    public ?string $property;

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
        ?bool $archived = null,
        ?string $property = null
    ): self {
        $self = new self;

        null !== $archived && $self['archived'] = $archived;
        null !== $property && $self['property'] = $property;

        return $self;
    }

    /**
     * Specifies whether to return deleted Site Pages. Defaults to `false`.
     */
    public function withArchived(bool $archived): self
    {
        $self = clone $this;
        $self['archived'] = $archived;

        return $self;
    }

    public function withProperty(string $property): self
    {
        $self = clone $this;
        $self['property'] = $property;

        return $self;
    }
}
