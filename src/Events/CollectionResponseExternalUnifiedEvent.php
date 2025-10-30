<?php

declare(strict_types=1);

namespace HubspotSDK\Events;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\Marketing\Emails\Paging;

/**
 * @phpstan-type CollectionResponseExternalUnifiedEventShape = array{
 *   results: list<ExternalUnifiedEvent>, paging?: Paging
 * }
 */
final class CollectionResponseExternalUnifiedEvent implements BaseModel
{
    /** @use SdkModel<CollectionResponseExternalUnifiedEventShape> */
    use SdkModel;

    /** @var list<ExternalUnifiedEvent> $results */
    #[Api(list: ExternalUnifiedEvent::class)]
    public array $results;

    /**
     * Contains information pagination of results.
     */
    #[Api(optional: true)]
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
     * @param list<ExternalUnifiedEvent> $results
     */
    public static function with(array $results, ?Paging $paging = null): self
    {
        $obj = new self;

        $obj->results = $results;

        null !== $paging && $obj->paging = $paging;

        return $obj;
    }

    /**
     * @param list<ExternalUnifiedEvent> $results
     */
    public function withResults(array $results): self
    {
        $obj = clone $this;
        $obj->results = $results;

        return $obj;
    }

    /**
     * Contains information pagination of results.
     */
    public function withPaging(Paging $paging): self
    {
        $obj = clone $this;
        $obj->paging = $paging;

        return $obj;
    }
}
