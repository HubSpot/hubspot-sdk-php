<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\Objects;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type AssociatedIDShape from \HubspotSDK\Crm\Objects\AssociatedID
 * @phpstan-import-type PagingShape from \HubspotSDK\Crm\Objects\Paging
 *
 * @phpstan-type CollectionResponseAssociatedIDShape = array{
 *   results: list<AssociatedID|AssociatedIDShape>,
 *   paging?: null|Paging|PagingShape,
 * }
 */
final class CollectionResponseAssociatedID implements BaseModel
{
    /** @use SdkModel<CollectionResponseAssociatedIDShape> */
    use SdkModel;

    /** @var list<AssociatedID> $results */
    #[Required(list: AssociatedID::class)]
    public array $results;

    #[Optional]
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
     * @param list<AssociatedID|AssociatedIDShape> $results
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
     * @param list<AssociatedID|AssociatedIDShape> $results
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
