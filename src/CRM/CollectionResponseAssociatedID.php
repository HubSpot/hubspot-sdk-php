<?php

declare(strict_types=1);

namespace HubspotSDK\CRM;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\Marketing\Emails\Paging;

/**
 * @phpstan-type CollectionResponseAssociatedIDShape = array{
 *   results: list<AssociatedID>, paging?: Paging
 * }
 */
final class CollectionResponseAssociatedID implements BaseModel
{
    /** @use SdkModel<CollectionResponseAssociatedIDShape> */
    use SdkModel;

    /** @var list<AssociatedID> $results */
    #[Api(list: AssociatedID::class)]
    public array $results;

    /**
     * Contains information pagination of results.
     */
    #[Api(optional: true)]
    public ?Paging $paging;

    /**
     * `new CollectionResponseAssociatedID()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * CollectionResponseAssociatedID::with(results: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new CollectionResponseAssociatedID)->withResults(...)
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
     * @param list<AssociatedID> $results
     */
    public static function with(array $results, ?Paging $paging = null): self
    {
        $obj = new self;

        $obj->results = $results;

        null !== $paging && $obj->paging = $paging;

        return $obj;
    }

    /**
     * @param list<AssociatedID> $results
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
