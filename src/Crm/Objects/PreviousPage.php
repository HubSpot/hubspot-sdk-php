<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\Objects;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * specifies the paging information needed to retrieve the previous set of results in a paginated API response.
 *
 * @phpstan-type PreviousPageShape = array{before: string, link?: string|null}
 */
final class PreviousPage implements BaseModel
{
    /** @use SdkModel<PreviousPageShape> */
    use SdkModel;

    /**
     * A paging cursor token for retrieving previous pages.
     */
    #[Required]
    public string $before;

    /**
     * A URL that can be used to retrieve the previous pages' results.
     */
    #[Optional]
    public ?string $link;

    /**
     * `new PreviousPage()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * PreviousPage::with(before: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new PreviousPage)->withBefore(...)
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
    public static function with(string $before, ?string $link = null): self
    {
        $self = new self;

        $self['before'] = $before;

        null !== $link && $self['link'] = $link;

        return $self;
    }

    /**
     * A paging cursor token for retrieving previous pages.
     */
    public function withBefore(string $before): self
    {
        $self = clone $this;
        $self['before'] = $before;

        return $self;
    }

    /**
     * A URL that can be used to retrieve the previous pages' results.
     */
    public function withLink(string $link): self
    {
        $self = clone $this;
        $self['link'] = $link;

        return $self;
    }
}
