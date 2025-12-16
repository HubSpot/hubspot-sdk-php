<?php

declare(strict_types=1);

namespace HubspotSDK\Marketing\Events;

use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type SearchPublicResponseWrapperShape from \HubspotSDK\Marketing\Events\SearchPublicResponseWrapper
 *
 * @phpstan-type CollectionResponseSearchPublicResponseWrapperNoPagingShape = array{
 *   results: list<SearchPublicResponseWrapperShape>
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
     * @param list<SearchPublicResponseWrapperShape> $results
     */
    public static function with(array $results): self
    {
        $self = new self;

        $self['results'] = $results;

        return $self;
    }

    /**
     * @param list<SearchPublicResponseWrapperShape> $results
     */
    public function withResults(array $results): self
    {
        $self = clone $this;
        $self['results'] = $results;

        return $self;
    }
}
