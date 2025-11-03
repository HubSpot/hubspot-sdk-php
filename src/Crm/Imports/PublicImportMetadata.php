<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\Imports;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type PublicImportMetadataShape = array{
 *   counters: array<string, int>,
 *   fileIDs: list<string>,
 *   objectLists: list<PublicObjectListRecord>,
 * }
 */
final class PublicImportMetadata implements BaseModel
{
    /** @use SdkModel<PublicImportMetadataShape> */
    use SdkModel;

    /**
     * Summarized outcomes of each row a developer attempted to import into HubSpot.
     *
     * @var array<string, int> $counters
     */
    #[Api(map: 'int')]
    public array $counters;

    /**
     * The IDs of files uploaded in the File Manager API.
     *
     * @var list<string> $fileIDs
     */
    #[Api('fileIds', list: 'string')]
    public array $fileIDs;

    /**
     * The lists containing the imported objects.
     *
     * @var list<PublicObjectListRecord> $objectLists
     */
    #[Api(list: PublicObjectListRecord::class)]
    public array $objectLists;

    /**
     * `new PublicImportMetadata()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * PublicImportMetadata::with(counters: ..., fileIDs: ..., objectLists: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new PublicImportMetadata)
     *   ->withCounters(...)
     *   ->withFileIDs(...)
     *   ->withObjectLists(...)
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
     * @param array<string, int> $counters
     * @param list<string> $fileIDs
     * @param list<PublicObjectListRecord> $objectLists
     */
    public static function with(
        array $counters,
        array $fileIDs,
        array $objectLists
    ): self {
        $obj = new self;

        $obj->counters = $counters;
        $obj->fileIDs = $fileIDs;
        $obj->objectLists = $objectLists;

        return $obj;
    }

    /**
     * Summarized outcomes of each row a developer attempted to import into HubSpot.
     *
     * @param array<string, int> $counters
     */
    public function withCounters(array $counters): self
    {
        $obj = clone $this;
        $obj->counters = $counters;

        return $obj;
    }

    /**
     * The IDs of files uploaded in the File Manager API.
     *
     * @param list<string> $fileIDs
     */
    public function withFileIDs(array $fileIDs): self
    {
        $obj = clone $this;
        $obj->fileIDs = $fileIDs;

        return $obj;
    }

    /**
     * The lists containing the imported objects.
     *
     * @param list<PublicObjectListRecord> $objectLists
     */
    public function withObjectLists(array $objectLists): self
    {
        $obj = clone $this;
        $obj->objectLists = $objectLists;

        return $obj;
    }
}
