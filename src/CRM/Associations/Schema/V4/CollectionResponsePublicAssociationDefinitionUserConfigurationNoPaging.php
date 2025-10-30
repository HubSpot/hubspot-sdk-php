<?php

declare(strict_types=1);

namespace HubspotSDK\CRM\Associations\Schema\V4;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type CollectionResponsePublicAssociationDefinitionUserConfigurationNoPagingShape = array{
 *   results: list<PublicAssociationDefinitionUserConfiguration>
 * }
 */
final class CollectionResponsePublicAssociationDefinitionUserConfigurationNoPaging implements BaseModel
{
    /**
     * @use SdkModel<CollectionResponsePublicAssociationDefinitionUserConfigurationNoPagingShape>
     */
    use SdkModel;

    /** @var list<PublicAssociationDefinitionUserConfiguration> $results */
    #[Api(list: PublicAssociationDefinitionUserConfiguration::class)]
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
     * @param list<PublicAssociationDefinitionUserConfiguration> $results
     */
    public static function with(array $results): self
    {
        $obj = new self;

        $obj->results = $results;

        return $obj;
    }

    /**
     * @param list<PublicAssociationDefinitionUserConfiguration> $results
     */
    public function withResults(array $results): self
    {
        $obj = clone $this;
        $obj->results = $results;

        return $obj;
    }
}
