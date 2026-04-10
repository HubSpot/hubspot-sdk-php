<?php

declare(strict_types=1);

namespace HubSpotSDK\Crm\Imports;

use HubSpotSDK\Core\Attributes\Required;
use HubSpotSDK\Core\Concerns\SdkModel;
use HubSpotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type PublicObjectListRecordShape from \HubSpotSDK\Crm\Imports\PublicObjectListRecord
 *
 * @phpstan-type PublicImportMetadataShape = array{
 *   counters: array<string,int>,
 *   fileIDs: list<string>,
 *   objectLists: list<PublicObjectListRecord|PublicObjectListRecordShape>,
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
     * @var list<string> $fileIDs
     */
    #[Required('fileIds', list: 'string')]
    public array $fileIDs;

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
     * @param array<string,int> $counters
     * @param list<string> $fileIDs
     * @param list<PublicObjectListRecord|PublicObjectListRecordShape> $objectLists
     */
    public static function with(
        array $counters,
        array $fileIDs,
        array $objectLists
    ): self {
        $self = new self;

        $self['counters'] = $counters;
        $self['fileIDs'] = $fileIDs;
        $self['objectLists'] = $objectLists;

        return $self;
    }

    /**
     * Summarized outcomes of each row a developer attempted to import into HubSpot.
     *
     * @param array<string,int> $counters
     */
    public function withCounters(array $counters): self
    {
        $self = clone $this;
        $self['counters'] = $counters;

        return $self;
    }

    /**
     * The IDs of files uploaded in the File Manager API.
     *
     * @param list<string> $fileIDs
     */
    public function withFileIDs(array $fileIDs): self
    {
        $self = clone $this;
        $self['fileIDs'] = $fileIDs;

        return $self;
    }

    /**
     * The lists containing the imported objects.
     *
     * @param list<PublicObjectListRecord|PublicObjectListRecordShape> $objectLists
     */
    public function withObjectLists(array $objectLists): self
    {
        $self = clone $this;
        $self['objectLists'] = $objectLists;

        return $self;
    }
}
