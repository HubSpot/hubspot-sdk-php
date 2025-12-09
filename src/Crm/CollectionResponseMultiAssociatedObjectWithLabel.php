<?php

declare(strict_types=1);

namespace HubspotSDK\Crm;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\NextPage;
use HubspotSDK\Paging;
use HubspotSDK\PreviousPage;

/**
 * @phpstan-type CollectionResponseMultiAssociatedObjectWithLabelShape = array{
 *   results: list<MultiAssociatedObjectWithLabel>, paging?: Paging|null
 * }
 */
final class CollectionResponseMultiAssociatedObjectWithLabel implements BaseModel
{
    /** @use SdkModel<CollectionResponseMultiAssociatedObjectWithLabelShape> */
    use SdkModel;

    /** @var list<MultiAssociatedObjectWithLabel> $results */
    #[Required(list: MultiAssociatedObjectWithLabel::class)]
    public array $results;

    #[Optional]
    public ?Paging $paging;

    /**
     * `new CollectionResponseMultiAssociatedObjectWithLabel()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * CollectionResponseMultiAssociatedObjectWithLabel::with(results: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new CollectionResponseMultiAssociatedObjectWithLabel)->withResults(...)
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
     * @param list<MultiAssociatedObjectWithLabel|array{
     *   associationTypes: list<AssociationSpecWithLabel>, toObjectID: string
     * }> $results
     * @param Paging|array{next?: NextPage|null, prev?: PreviousPage|null} $paging
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
     * @param list<MultiAssociatedObjectWithLabel|array{
     *   associationTypes: list<AssociationSpecWithLabel>, toObjectID: string
     * }> $results
     */
    public function withResults(array $results): self
    {
        $self = clone $this;
        $self['results'] = $results;

        return $self;
    }

    /**
     * @param Paging|array{next?: NextPage|null, prev?: PreviousPage|null} $paging
     */
    public function withPaging(Paging|array $paging): self
    {
        $self = clone $this;
        $self['paging'] = $paging;

        return $self;
    }
}
