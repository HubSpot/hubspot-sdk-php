<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\Lists;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type PublicMigrationMappingShape = array{
 *   legacyListId: string, listId: string
 * }
 */
final class PublicMigrationMapping implements BaseModel
{
    /** @use SdkModel<PublicMigrationMappingShape> */
    use SdkModel;

    /**
     * The legacy list id for the list.
     */
    #[Api]
    public string $legacyListId;

    /**
     * The V3 list id for the list.
     */
    #[Api]
    public string $listId;

    /**
     * `new PublicMigrationMapping()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * PublicMigrationMapping::with(legacyListId: ..., listId: ...)
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
    public static function with(string $legacyListId, string $listId): self
    {
        $obj = new self;

        $obj->legacyListId = $legacyListId;
        $obj->listId = $listId;

        return $obj;
    }

    /**
     * The legacy list id for the list.
     */
    public function withLegacyListID(string $legacyListID): self
    {
        $obj = clone $this;
        $obj->legacyListId = $legacyListID;

        return $obj;
    }

    /**
     * The V3 list id for the list.
     */
    public function withListID(string $listID): self
    {
        $obj = clone $this;
        $obj->listId = $listID;

        return $obj;
    }
}
