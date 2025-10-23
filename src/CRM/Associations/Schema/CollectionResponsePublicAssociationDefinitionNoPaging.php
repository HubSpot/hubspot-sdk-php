<?php

declare(strict_types=1);

namespace HubspotSDK\CRM\Associations\Schema;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkResponse;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\Core\Conversion\Contracts\ResponseConverter;

/**
 * @phpstan-type collection_response_public_association_definition_no_paging = array{
 *   results: list<PublicAssociationDefinition>
 * }
 */
final class CollectionResponsePublicAssociationDefinitionNoPaging implements BaseModel, ResponseConverter
{
    /**
     * @use SdkModel<collection_response_public_association_definition_no_paging>
     */
    use SdkModel;

    use SdkResponse;

    /** @var list<PublicAssociationDefinition> $results */
    #[Api(list: PublicAssociationDefinition::class)]
    public array $results;

    /**
     * `new CollectionResponsePublicAssociationDefinitionNoPaging()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * CollectionResponsePublicAssociationDefinitionNoPaging::with(results: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new CollectionResponsePublicAssociationDefinitionNoPaging)->withResults(...)
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
     * @param list<PublicAssociationDefinition> $results
     */
    public static function with(array $results): self
    {
        $obj = new self;

        $obj->results = $results;

        return $obj;
    }

    /**
     * @param list<PublicAssociationDefinition> $results
     */
    public function withResults(array $results): self
    {
        $obj = clone $this;
        $obj->results = $results;

        return $obj;
    }
}
