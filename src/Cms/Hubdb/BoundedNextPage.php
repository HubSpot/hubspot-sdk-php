<?php

declare(strict_types=1);

namespace HubspotSDK\Cms\Hubdb;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type BoundedNextPageShape = array{offset: int, link?: string|null}
 */
final class BoundedNextPage implements BaseModel
{
    /** @use SdkModel<BoundedNextPageShape> */
    use SdkModel;

    /**
     * The offset value indicating the starting point for the next set of results.
     */
    #[Required]
    public int $offset;

    /**
     * A URL that can be used to retrieve the next set of results.
     */
    #[Optional]
    public ?string $link;

    /**
     * `new BoundedNextPage()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * BoundedNextPage::with(offset: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new BoundedNextPage)->withOffset(...)
     * ```
     */
    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(int $offset, ?string $link = null): self
    {
        $self = new self;

        $self['offset'] = $offset;

        null !== $link && $self['link'] = $link;

        return $self;
    }

    /**
     * The offset value indicating the starting point for the next set of results.
     */
    public function withOffset(int $offset): self
    {
        $self = clone $this;
        $self['offset'] = $offset;

        return $self;
    }

    /**
     * A URL that can be used to retrieve the next set of results.
     */
    public function withLink(string $link): self
    {
        $self = clone $this;
        $self['link'] = $link;

        return $self;
    }
}
