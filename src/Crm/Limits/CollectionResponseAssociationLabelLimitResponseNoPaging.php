<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\Limits;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\Crm\Objects\Schemas\ObjectsSchemasObjectTypeDefinition;

/**
 * @phpstan-type CollectionResponseAssociationLabelLimitResponseNoPagingShape = array{
 *   results: list<AssociationLabelLimitResponse>
 * }
 */
final class CollectionResponseAssociationLabelLimitResponseNoPaging implements BaseModel
{
    /** @use SdkModel<CollectionResponseAssociationLabelLimitResponseNoPagingShape> */
    use SdkModel;

    /** @var list<AssociationLabelLimitResponse> $results */
    #[Api(list: AssociationLabelLimitResponse::class)]
    public array $results;

    /**
     * `new CollectionResponseAssociationLabelLimitResponseNoPaging()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * CollectionResponseAssociationLabelLimitResponseNoPaging::with(results: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new CollectionResponseAssociationLabelLimitResponseNoPaging)->withResults(...)
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
     * @param list<AssociationLabelLimitResponse|array{
     *   allLabels: list<string>,
     *   fromObjectType: ObjectsSchemasObjectTypeDefinition,
     *   limit: int,
     *   percentage: float,
     *   toObjectType: ObjectsSchemasObjectTypeDefinition,
     *   usage: int,
     * }> $results
     */
    public static function with(array $results): self
    {
        $obj = new self;

        $obj['results'] = $results;

        return $obj;
    }

    /**
     * @param list<AssociationLabelLimitResponse|array{
     *   allLabels: list<string>,
     *   fromObjectType: ObjectsSchemasObjectTypeDefinition,
     *   limit: int,
     *   percentage: float,
     *   toObjectType: ObjectsSchemasObjectTypeDefinition,
     *   usage: int,
     * }> $results
     */
    public function withResults(array $results): self
    {
        $obj = clone $this;
        $obj['results'] = $results;

        return $obj;
    }
}
