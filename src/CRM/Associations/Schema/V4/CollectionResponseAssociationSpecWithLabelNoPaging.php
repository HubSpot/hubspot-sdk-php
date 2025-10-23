<?php

declare(strict_types=1);

namespace HubspotSDK\CRM\Associations\Schema\V4;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\CRM\AssociationSpecWithLabel;

/**
 * @phpstan-type collection_response_association_spec_with_label_no_paging = array{
 *   results: list<AssociationSpecWithLabel>
 * }
 */
final class CollectionResponseAssociationSpecWithLabelNoPaging implements BaseModel
{
    /** @use SdkModel<collection_response_association_spec_with_label_no_paging> */
    use SdkModel;

    /** @var list<AssociationSpecWithLabel> $results */
    #[Api(list: AssociationSpecWithLabel::class)]
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
     * @param list<AssociationSpecWithLabel> $results
     */
    public static function with(array $results): self
    {
        $obj = new self;

        $obj->results = $results;

        return $obj;
    }

    /**
     * @param list<AssociationSpecWithLabel> $results
     */
    public function withResults(array $results): self
    {
        $obj = clone $this;
        $obj->results = $results;

        return $obj;
    }
}
