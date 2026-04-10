<?php

declare(strict_types=1);

namespace HubSpotSDK\Crm\AssociationsSchema;

use HubSpotSDK\Core\Attributes\Required;
use HubSpotSDK\Core\Concerns\SdkModel;
use HubSpotSDK\Core\Contracts\BaseModel;
use HubSpotSDK\Crm\AssociationSpecWithLabel;

/**
 * @phpstan-import-type AssociationSpecWithLabelShape from \HubSpotSDK\Crm\AssociationSpecWithLabel
 *
 * @phpstan-type CollectionResponseAssociationSpecWithLabelNoPagingShape = array{
 *   results: list<AssociationSpecWithLabel|AssociationSpecWithLabelShape>
 * }
 */
final class CollectionResponseAssociationSpecWithLabelNoPaging implements BaseModel
{
    /** @use SdkModel<CollectionResponseAssociationSpecWithLabelNoPagingShape> */
    use SdkModel;

    /** @var list<AssociationSpecWithLabel> $results */
    #[Required(list: AssociationSpecWithLabel::class)]
    public array $results;

    /**
     * `new CollectionResponseAssociationSpecWithLabelNoPaging()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * CollectionResponseAssociationSpecWithLabelNoPaging::with(results: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new CollectionResponseAssociationSpecWithLabelNoPaging)->withResults(...)
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
     * @param list<AssociationSpecWithLabel|AssociationSpecWithLabelShape> $results
     */
    public static function with(array $results): self
    {
        $self = new self;

        $self['results'] = $results;

        return $self;
    }

    /**
     * @param list<AssociationSpecWithLabel|AssociationSpecWithLabelShape> $results
     */
    public function withResults(array $results): self
    {
        $self = clone $this;
        $self['results'] = $results;

        return $self;
    }
}
