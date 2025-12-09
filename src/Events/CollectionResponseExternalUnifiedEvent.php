<?php

declare(strict_types=1);

namespace HubspotSDK\Events;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\NextPage;
use HubspotSDK\Paging;
use HubspotSDK\PreviousPage;

/**
 * @phpstan-type CollectionResponseExternalUnifiedEventShape = array{
 *   results: list<ExternalUnifiedEvent>, paging?: Paging|null
 * }
 */
final class CollectionResponseExternalUnifiedEvent implements BaseModel
{
    /** @use SdkModel<CollectionResponseExternalUnifiedEventShape> */
    use SdkModel;

    /** @var list<ExternalUnifiedEvent> $results */
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
     * @param list<ExternalUnifiedEvent|array{
     *   id: string,
     *   eventType: string,
     *   objectID: string,
     *   objectType: string,
     *   occurredAt: \DateTimeInterface,
     *   properties: array<string,string>,
     * }> $results
     * @param Paging|array{next?: NextPage|null, prev?: PreviousPage|null} $paging
     */
    public static function with(
        array $results,
        Paging|array|null $paging = null
    ): self {
        $obj = new self;

        $obj['results'] = $results;

        null !== $paging && $obj['paging'] = $paging;

        return $obj;
    }

    /**
     * @param list<ExternalUnifiedEvent|array{
     *   id: string,
     *   eventType: string,
     *   objectID: string,
     *   objectType: string,
     *   occurredAt: \DateTimeInterface,
     *   properties: array<string,string>,
     * }> $results
     */
    public function withResults(array $results): self
    {
        $obj = clone $this;
        $obj['results'] = $results;

        return $obj;
    }

    /**
     * @param Paging|array{next?: NextPage|null, prev?: PreviousPage|null} $paging
     */
    public function withPaging(Paging|array $paging): self
    {
        $obj = clone $this;
        $obj['paging'] = $paging;

        return $obj;
    }
}
