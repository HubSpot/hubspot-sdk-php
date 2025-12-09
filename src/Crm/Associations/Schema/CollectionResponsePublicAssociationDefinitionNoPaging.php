<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\Associations\Schema;

use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type CollectionResponsePublicAssociationDefinitionNoPagingShape = array{
 *   results: list<PublicAssociationDefinition>
 * }
 */
final class CollectionResponsePublicAssociationDefinitionNoPaging implements BaseModel
{
    /** @use SdkModel<CollectionResponsePublicAssociationDefinitionNoPagingShape> */
    use SdkModel;

    /** @var list<PublicAssociationDefinition> $results */
    #[Required(list: PublicAssociationDefinition::class)]
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
     * @param list<PublicAssociationDefinition|array{
     *   id: string, name: string
     * }> $results
     */
    public static function with(array $results): self
    {
        $self = new self;

        $self['results'] = $results;

        return $self;
    }

    /**
     * @param list<PublicAssociationDefinition|array{
     *   id: string, name: string
     * }> $results
     */
    public function withResults(array $results): self
    {
        $self = clone $this;
        $self['results'] = $results;

        return $self;
    }
}
