<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\Lists;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type PublicBatchMigrationMappingShape = array{
 *   legacyListIdsToIdsMapping: list<PublicMigrationMapping>,
 *   missingLegacyListIds: list<string>,
 * }
 */
final class PublicBatchMigrationMapping implements BaseModel
{
    /** @use SdkModel<PublicBatchMigrationMappingShape> */
    use SdkModel;

    /** @var list<PublicMigrationMapping> $legacyListIdsToIdsMapping */
    #[Api(list: PublicMigrationMapping::class)]
    public array $legacyListIdsToIdsMapping;

    /**
     * A list of legacy list ids that were passed in but not found. It will be empty if no id's are missing.
     *
     * @var list<string> $missingLegacyListIds
     */
    #[Api(list: 'string')]
    public array $missingLegacyListIds;

    /**
     * `new PublicBatchMigrationMapping()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * PublicBatchMigrationMapping::with(
     *   legacyListIdsToIdsMapping: ..., missingLegacyListIds: ...
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new PublicBatchMigrationMapping)
     *   ->withLegacyListIDsToIDsMapping(...)
     *   ->withMissingLegacyListIDs(...)
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
     * @param list<PublicMigrationMapping|array{
     *   legacyListId: string, listId: string
     * }> $legacyListIdsToIdsMapping
     * @param list<string> $missingLegacyListIds
     */
    public static function with(
        array $legacyListIdsToIdsMapping,
        array $missingLegacyListIds
    ): self {
        $obj = new self;

        $obj['legacyListIdsToIdsMapping'] = $legacyListIdsToIdsMapping;
        $obj['missingLegacyListIds'] = $missingLegacyListIds;

        return $obj;
    }

    /**
     * @param list<PublicMigrationMapping|array{
     *   legacyListId: string, listId: string
     * }> $legacyListIDsToIDsMapping
     */
    public function withLegacyListIDsToIDsMapping(
        array $legacyListIDsToIDsMapping
    ): self {
        $obj = clone $this;
        $obj['legacyListIdsToIdsMapping'] = $legacyListIDsToIDsMapping;

        return $obj;
    }

    /**
     * A list of legacy list ids that were passed in but not found. It will be empty if no id's are missing.
     *
     * @param list<string> $missingLegacyListIDs
     */
    public function withMissingLegacyListIDs(array $missingLegacyListIDs): self
    {
        $obj = clone $this;
        $obj['missingLegacyListIds'] = $missingLegacyListIDs;

        return $obj;
    }
}
