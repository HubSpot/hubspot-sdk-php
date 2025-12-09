<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\Associations\Schema\V4;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\Crm\AssociationSpecWithLabel;
use HubspotSDK\Crm\AssociationSpecWithLabel\Category;
use HubspotSDK\NextPage;
use HubspotSDK\Paging;
use HubspotSDK\PreviousPage;

/**
 * @phpstan-type CollectionResponseAssociationSpecWithLabelShape = array{
 *   results: list<AssociationSpecWithLabel>, paging?: Paging|null
 * }
 */
final class CollectionResponseAssociationSpecWithLabel implements BaseModel
{
    /** @use SdkModel<CollectionResponseAssociationSpecWithLabelShape> */
    use SdkModel;

    /** @var list<AssociationSpecWithLabel> $results */
    #[Required(list: AssociationSpecWithLabel::class)]
    public array $results;

    #[Optional]
    public ?Paging $paging;

    /**
     * `new CollectionResponseAssociationSpecWithLabel()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * CollectionResponseAssociationSpecWithLabel::with(results: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new CollectionResponseAssociationSpecWithLabel)->withResults(...)
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
     * @param list<AssociationSpecWithLabel|array{
     *   category: value-of<Category>, typeId: int, label?: string|null
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
     * @param list<AssociationSpecWithLabel|array{
     *   category: value-of<Category>, typeId: int, label?: string|null
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
