<?php

declare(strict_types=1);

namespace HubSpotSDK\Cms\Pages\WebsitePages;

use HubSpotSDK\Core\Attributes\Optional;
use HubSpotSDK\Core\Concerns\SdkModel;
use HubSpotSDK\Core\Concerns\SdkParams;
use HubSpotSDK\Core\Contracts\BaseModel;

/**
 * Retrieve a website page by its ID.
 *
 * @see HubSpotSDK\Services\Cms\Pages\WebsitePagesService::get()
 *
 * @phpstan-type WebsitePageGetParamsShape = array{
 *   archived?: bool|null, property?: string|null
 * }
 */
final class WebsitePageGetParams implements BaseModel
{
    /** @use SdkModel<WebsitePageGetParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * Whether to return only results that have been archived.
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
     * Whether to return only results that have been archived.
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
