<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\Lists;

use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type PublicMigrationMappingShape = array{
 *   legacyListID: string, listID: string
 * }
 */
final class PublicMigrationMapping implements BaseModel
{
    /** @use SdkModel<PublicMigrationMappingShape> */
    use SdkModel;

    /**
     * The legacy list id for the list.
     */
    #[Required('legacyListId')]
    public string $legacyListID;

    /**
     * The V3 list id for the list.
     */
    #[Required('listId')]
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
        $self = new self;

        $self['legacyListID'] = $legacyListID;
        $self['listID'] = $listID;

        return $self;
    }

    /**
     * The legacy list id for the list.
     */
    public function withLegacyListID(string $legacyListID): self
    {
        $self = clone $this;
        $self['legacyListID'] = $legacyListID;

        return $self;
    }

    /**
     * The V3 list id for the list.
     */
    public function withListID(string $listID): self
    {
        $self = clone $this;
        $self['listID'] = $listID;

        return $self;
    }
}
