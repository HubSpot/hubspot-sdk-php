<?php

declare(strict_types=1);

namespace HubspotSDK\CRM\Lists;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type public_migration_mapping = array{
 *   legacyListID: string, listID: string
 * }
 */
final class PublicMigrationMapping implements BaseModel
{
    /** @use SdkModel<public_migration_mapping> */
    use SdkModel;

    /**
     * The legacy list id for the list.
     */
    #[Api('legacyListId')]
    public string $legacyListID;

    /**
     * The V3 list id for the list.
     */
    #[Api('listId')]
    public string $listID;

    /**
     * `new PublicMigrationMapping()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * PublicMigrationMapping::with(legacyListID: ..., listID: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new PublicMigrationMapping)->withLegacyListID(...)->withListID(...)
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
     */
    public static function with(string $legacyListID, string $listID): self
    {
        $obj = new self;

        $obj->legacyListID = $legacyListID;
        $obj->listID = $listID;

        return $obj;
    }

    /**
     * The legacy list id for the list.
     */
    public function withLegacyListID(string $legacyListID): self
    {
        $obj = clone $this;
        $obj->legacyListID = $legacyListID;

        return $obj;
    }

    /**
     * The V3 list id for the list.
     */
    public function withListID(string $listID): self
    {
        $obj = clone $this;
        $obj->listID = $listID;

        return $obj;
    }
}
