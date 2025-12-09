<?php

declare(strict_types=1);

namespace HubspotSDK;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * Specifies the paging information needed to retrieve the next set of results in a paginated API response.
 *
 * @phpstan-type NextPageShape = array{after: string, link?: string|null}
 */
final class NextPage implements BaseModel
{
    /** @use SdkModel<NextPageShape> */
    use SdkModel;

    /**
     * A paging cursor token for retrieving subsequent pages.
     */
    #[Required]
    public string $after;

    /**
     * A URL that can be used to retrieve the next page results.
     */
    #[Optional]
    public ?string $link;

    /**
     * `new NextPage()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * NextPage::with(after: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new NextPage)->withAfter(...)
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
    public static function with(string $after, ?string $link = null): self
    {
        $self = new self;

        $self['after'] = $after;

        null !== $link && $self['link'] = $link;

        return $self;
    }

    /**
     * A paging cursor token for retrieving subsequent pages.
     */
    public function withAfter(string $after): self
    {
        $self = clone $this;
        $self['after'] = $after;

        return $self;
    }

    /**
     * A URL that can be used to retrieve the next page results.
     */
    public function withLink(string $link): self
    {
        $self = clone $this;
        $self['link'] = $link;

        return $self;
    }
}
