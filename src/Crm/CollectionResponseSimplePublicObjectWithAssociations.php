<?php

declare(strict_types=1);

namespace HubspotSDK\Crm;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\Paging;

/**
 * @phpstan-import-type SimplePublicObjectWithAssociationsShape from \HubspotSDK\Crm\SimplePublicObjectWithAssociations
 * @phpstan-import-type PagingShape from \HubspotSDK\Paging
 *
 * @phpstan-type CollectionResponseSimplePublicObjectWithAssociationsShape = array{
 *   results: list<SimplePublicObjectWithAssociationsShape>,
 *   paging?: null|Paging|PagingShape,
 * }
 */
final class CollectionResponseSimplePublicObjectWithAssociations implements BaseModel
{
    /** @use SdkModel<CollectionResponseSimplePublicObjectWithAssociationsShape> */
    use SdkModel;

    /** @var list<SimplePublicObjectWithAssociations> $results */
    #[Required(list: SimplePublicObjectWithAssociations::class)]
    public array $results;

    #[Optional]
    public ?Paging $paging;

    /**
     * `new CollectionResponseSimplePublicObjectWithAssociations()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * CollectionResponseSimplePublicObjectWithAssociations::with(results: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new CollectionResponseSimplePublicObjectWithAssociations)->withResults(...)
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
     * @param list<SimplePublicObjectWithAssociationsShape> $results
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
     * @param list<SimplePublicObjectWithAssociationsShape> $results
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
