<?php

declare(strict_types=1);

namespace HubSpotSDK\Crm\AssociationsSchema;

use HubSpotSDK\Core\Attributes\Required;
use HubSpotSDK\Core\Concerns\SdkModel;
use HubSpotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type PublicAssociationDefinitionUserConfigurationShape from \HubSpotSDK\Crm\AssociationsSchema\PublicAssociationDefinitionUserConfiguration
 *
 * @phpstan-type CollectionResponsePublicAssociationDefinitionUserConfigurationNoPagingShape = array{
 *   results: list<PublicAssociationDefinitionUserConfiguration|PublicAssociationDefinitionUserConfigurationShape>,
 * }
 */
final class CollectionResponsePublicAssociationDefinitionUserConfigurationNoPaging implements BaseModel
{
    /**
     * @use SdkModel<CollectionResponsePublicAssociationDefinitionUserConfigurationNoPagingShape>
     */
    use SdkModel;

    /** @var list<PublicAssociationDefinitionUserConfiguration> $results */
    #[Required(list: PublicAssociationDefinitionUserConfiguration::class)]
    public array $results;

    /**
     * `new CollectionResponsePublicAssociationDefinitionUserConfigurationNoPaging()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * CollectionResponsePublicAssociationDefinitionUserConfigurationNoPaging::with(
     *   results: ...
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new CollectionResponsePublicAssociationDefinitionUserConfigurationNoPaging)
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
     * @param list<PublicAssociationDefinitionUserConfiguration|PublicAssociationDefinitionUserConfigurationShape> $results
     */
    public static function with(array $results): self
    {
        $self = new self;

        $self['results'] = $results;

        return $self;
    }

    /**
     * @param list<PublicAssociationDefinitionUserConfiguration|PublicAssociationDefinitionUserConfigurationShape> $results
     */
    public function withResults(array $results): self
    {
        $self = clone $this;
        $self['results'] = $results;

        return $self;
    }
}
