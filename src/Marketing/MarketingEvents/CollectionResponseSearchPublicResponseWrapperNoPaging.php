<?php

declare(strict_types=1);

namespace HubSpotSDK\Marketing\MarketingEvents;

use HubSpotSDK\Core\Attributes\Required;
use HubSpotSDK\Core\Concerns\SdkModel;
use HubSpotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type SearchPublicResponseWrapperShape from \HubSpotSDK\Marketing\MarketingEvents\SearchPublicResponseWrapper
 *
 * @phpstan-type CollectionResponseSearchPublicResponseWrapperNoPagingShape = array{
 *   results: list<SearchPublicResponseWrapper|SearchPublicResponseWrapperShape>
 * }
 */
final class CollectionResponseSearchPublicResponseWrapperNoPaging implements BaseModel
{
    /** @use SdkModel<CollectionResponseSearchPublicResponseWrapperNoPagingShape> */
    use SdkModel;

    /** @var list<SearchPublicResponseWrapper> $results */
    #[Required(list: SearchPublicResponseWrapper::class)]
    public array $results;

    /**
     * `new CollectionResponseSearchPublicResponseWrapperNoPaging()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * CollectionResponseSearchPublicResponseWrapperNoPaging::with(results: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new CollectionResponseSearchPublicResponseWrapperNoPaging)->withResults(...)
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
     *
     * @param list<SearchPublicResponseWrapper|SearchPublicResponseWrapperShape> $results
     */
    public static function with(array $results): self
    {
        $self = new self;

        $self['results'] = $results;

        return $self;
    }

    /**
     * @param list<SearchPublicResponseWrapper|SearchPublicResponseWrapperShape> $results
     */
    public function withResults(array $results): self
    {
        $self = clone $this;
        $self['results'] = $results;

        return $self;
    }
}
