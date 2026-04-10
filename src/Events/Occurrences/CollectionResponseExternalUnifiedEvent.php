<?php

declare(strict_types=1);

namespace HubSpotSDK\Events\Occurrences;

use HubSpotSDK\Core\Attributes\Optional;
use HubSpotSDK\Core\Attributes\Required;
use HubSpotSDK\Core\Concerns\SdkModel;
use HubSpotSDK\Core\Contracts\BaseModel;
use HubSpotSDK\Paging;

/**
 * @phpstan-import-type ExternalUnifiedEventShape from \HubSpotSDK\Events\Occurrences\ExternalUnifiedEvent
 * @phpstan-import-type PagingShape from \HubSpotSDK\Paging
 *
 * @phpstan-type CollectionResponseExternalUnifiedEventShape = array{
 *   results: list<ExternalUnifiedEvent|ExternalUnifiedEventShape>,
 *   paging?: null|Paging|PagingShape,
 * }
 */
final class CollectionResponseExternalUnifiedEvent implements BaseModel
{
    /** @use SdkModel<CollectionResponseExternalUnifiedEventShape> */
    use SdkModel;

    /**
     * An array of ExternalUnifiedEvent objects, each representing an individual event with its associated details.
     *
     * @var list<ExternalUnifiedEvent> $results
     */
    #[Required(list: ExternalUnifiedEvent::class)]
    public array $results;

    #[Optional]
    public ?Paging $paging;

    /**
     * `new CollectionResponseExternalUnifiedEvent()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * CollectionResponseExternalUnifiedEvent::with(results: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new CollectionResponseExternalUnifiedEvent)->withResults(...)
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
     * @param list<ExternalUnifiedEvent|ExternalUnifiedEventShape> $results
     * @param Paging|PagingShape|null $paging
     */
    public static function with(
        array $results,
        Paging|array|null $paging = null
    ): self {
        $self = new self;

        $self['results'] = $results;

        null !== $paging && $self['paging'] = $paging;

        return $self;
    }

    /**
     * An array of ExternalUnifiedEvent objects, each representing an individual event with its associated details.
     *
     * @param list<ExternalUnifiedEvent|ExternalUnifiedEventShape> $results
     */
    public function withResults(array $results): self
    {
        $self = clone $this;
        $self['results'] = $results;

        return $self;
    }

    /**
     * @param Paging|PagingShape $paging
     */
    public function withPaging(Paging|array $paging): self
    {
        $self = clone $this;
        $self['paging'] = $paging;

        return $self;
    }
}
