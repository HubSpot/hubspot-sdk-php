<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\Associations\Schema\V4;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\Crm\Associations\Schema\V4\PublicAssociationDefinitionUserConfiguration\Category;
use HubspotSDK\NextPage;
use HubspotSDK\Paging;
use HubspotSDK\PreviousPage;

/**
 * @phpstan-type CollectionResponsePublicAssociationDefinitionUserConfigurationShape = array{
 *   results: list<PublicAssociationDefinitionUserConfiguration>,
 *   paging?: Paging|null,
 * }
 */
final class CollectionResponsePublicAssociationDefinitionUserConfiguration implements BaseModel
{
    /**
     * @use SdkModel<CollectionResponsePublicAssociationDefinitionUserConfigurationShape>
     */
    use SdkModel;

    /** @var list<PublicAssociationDefinitionUserConfiguration> $results */
    #[Required(list: PublicAssociationDefinitionUserConfiguration::class)]
    public array $results;

    #[Optional]
    public ?Paging $paging;

    /**
     * `new CollectionResponsePublicAssociationDefinitionUserConfiguration()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * CollectionResponsePublicAssociationDefinitionUserConfiguration::with(
     *   results: ...
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new CollectionResponsePublicAssociationDefinitionUserConfiguration)
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
     * @param list<PublicAssociationDefinitionUserConfiguration|array{
     *   category: value-of<Category>,
     *   typeID: int,
     *   label?: string|null,
     *   userEnforcedMaxToObjectIDs?: int|null,
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
     * @param list<PublicAssociationDefinitionUserConfiguration|array{
     *   category: value-of<Category>,
     *   typeID: int,
     *   label?: string|null,
     *   userEnforcedMaxToObjectIDs?: int|null,
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
