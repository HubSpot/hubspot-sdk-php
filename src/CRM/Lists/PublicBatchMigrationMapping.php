<?php

declare(strict_types=1);

namespace HubspotSDK\CRM\Lists;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type PublicBatchMigrationMappingShape = array{
 *   legacyListIDsToIDsMapping: list<PublicMigrationMapping>,
 *   missingLegacyListIDs: list<string>,
 * }
 */
final class PublicBatchMigrationMapping implements BaseModel
{
    /** @use SdkModel<PublicBatchMigrationMappingShape> */
    use SdkModel;

    /** @var list<PublicMigrationMapping> $legacyListIDsToIDsMapping */
    #[Api('legacyListIdsToIdsMapping', list: PublicMigrationMapping::class)]
    public array $legacyListIDsToIDsMapping;

    /**
     * A list of legacy list ids that were passed in but not found. It will be empty if no id's are missing.
     *
     * @var list<string> $missingLegacyListIDs
     */
    #[Api('missingLegacyListIds', list: 'string')]
    public array $missingLegacyListIDs;

    /**
     * `new PublicBatchMigrationMapping()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * PublicBatchMigrationMapping::with(
     *   legacyListIDsToIDsMapping: ..., missingLegacyListIDs: ...
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
     * @param list<PublicMigrationMapping> $legacyListIDsToIDsMapping
     * @param list<string> $missingLegacyListIDs
     */
    public static function with(
        array $legacyListIDsToIDsMapping,
        array $missingLegacyListIDs
    ): self {
        $obj = new self;

        $obj->legacyListIDsToIDsMapping = $legacyListIDsToIDsMapping;
        $obj->missingLegacyListIDs = $missingLegacyListIDs;

        return $obj;
    }

    /**
     * @param list<PublicMigrationMapping> $legacyListIDsToIDsMapping
     */
    public function withLegacyListIDsToIDsMapping(
        array $legacyListIDsToIDsMapping
    ): self {
        $obj = clone $this;
        $obj->legacyListIDsToIDsMapping = $legacyListIDsToIDsMapping;

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
        $obj->missingLegacyListIDs = $missingLegacyListIDs;

        return $obj;
    }
}
