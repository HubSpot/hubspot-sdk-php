<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\Imports;

use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type PublicImportMetadataShape = array{
 *   counters: array<string,int>,
 *   fileIds: list<string>,
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
     * @var array<string,int> $counters
     */
    #[Required(map: 'int')]
    public array $counters;

    /**
     * The IDs of files uploaded in the File Manager API.
     *
     * @var list<string> $fileIds
     */
    #[Required(list: 'string')]
    public array $fileIds;

    /**
     * The lists containing the imported objects.
     *
     * @var list<PublicObjectListRecord> $objectLists
     */
    #[Required(list: PublicObjectListRecord::class)]
    public array $objectLists;

    /**
     * `new PublicImportMetadata()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * PublicImportMetadata::with(counters: ..., fileIds: ..., objectLists: ...)
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
     * @param array<string,int> $counters
     * @param list<string> $fileIds
     * @param list<PublicObjectListRecord|array{
     *   listId: string, objectType: string
     * }> $objectLists
     */
    public static function with(
        array $counters,
        array $fileIds,
        array $objectLists
    ): self {
        $obj = new self;

        $obj['counters'] = $counters;
        $obj['fileIds'] = $fileIds;
        $obj['objectLists'] = $objectLists;

        return $obj;
    }

    /**
     * Summarized outcomes of each row a developer attempted to import into HubSpot.
     *
     * @param array<string,int> $counters
     */
    public function withCounters(array $counters): self
    {
        $obj = clone $this;
        $obj['counters'] = $counters;

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
        $obj['fileIds'] = $fileIDs;

        return $obj;
    }

    /**
     * The lists containing the imported objects.
     *
     * @param list<PublicObjectListRecord|array{
     *   listId: string, objectType: string
     * }> $objectLists
     */
    public function withObjectLists(array $objectLists): self
    {
        $obj = clone $this;
        $obj['objectLists'] = $objectLists;

        return $obj;
    }
}
