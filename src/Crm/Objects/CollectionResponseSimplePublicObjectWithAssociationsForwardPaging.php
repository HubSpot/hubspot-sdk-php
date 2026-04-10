<?php

declare(strict_types=1);

namespace HubSpotSDK\Crm\Objects;

use HubSpotSDK\Core\Attributes\Optional;
use HubSpotSDK\Core\Attributes\Required;
use HubSpotSDK\Core\Concerns\SdkModel;
use HubSpotSDK\Core\Contracts\BaseModel;
use HubSpotSDK\ForwardPaging;

/**
 * @phpstan-import-type SimplePublicObjectWithAssociationsShape from \HubSpotSDK\Crm\Objects\SimplePublicObjectWithAssociations
 * @phpstan-import-type ForwardPagingShape from \HubSpotSDK\ForwardPaging
 *
 * @phpstan-type CollectionResponseSimplePublicObjectWithAssociationsForwardPagingShape = array{
 *   results: list<SimplePublicObjectWithAssociations|SimplePublicObjectWithAssociationsShape>,
 *   paging?: null|ForwardPaging|ForwardPagingShape,
 * }
 */
final class CollectionResponseSimplePublicObjectWithAssociationsForwardPaging implements BaseModel
{
    /**
     * @use SdkModel<CollectionResponseSimplePublicObjectWithAssociationsForwardPagingShape>
     */
    use SdkModel;

    /** @var list<SimplePublicObjectWithAssociations> $results */
    #[Required(list: SimplePublicObjectWithAssociations::class)]
    public array $results;

    #[Optional]
    public ?ForwardPaging $paging;

    /**
     * `new CollectionResponseSimplePublicObjectWithAssociationsForwardPaging()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * CollectionResponseSimplePublicObjectWithAssociationsForwardPaging::with(
     *   results: ...
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new CollectionResponseSimplePublicObjectWithAssociationsForwardPaging)
     *   ->withResults(...)
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
     * @param list<SimplePublicObjectWithAssociations|SimplePublicObjectWithAssociationsShape> $results
     * @param ForwardPaging|ForwardPagingShape|null $paging
     */
    public static function with(
        array $results,
        ForwardPaging|array|null $paging = null
    ): self {
        $self = new self;

        $self['results'] = $results;

        null !== $paging && $self['paging'] = $paging;

        return $self;
    }

    /**
     * @param list<SimplePublicObjectWithAssociations|SimplePublicObjectWithAssociationsShape> $results
     */
    public function withResults(array $results): self
    {
        $self = clone $this;
        $self['results'] = $results;

        return $self;
    }

    /**
     * @param ForwardPaging|ForwardPagingShape $paging
     */
    public function withPaging(ForwardPaging|array $paging): self
    {
        $self = clone $this;
        $self['paging'] = $paging;

        return $self;
    }
}
