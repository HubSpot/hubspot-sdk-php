<?php

declare(strict_types=1);

namespace HubSpotSDK\Crm\Imports;

use HubSpotSDK\Core\Attributes\Required;
use HubSpotSDK\Core\Concerns\SdkModel;
use HubSpotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type PublicObjectListRecordShape = array{
 *   listID: string, objectType: string
 * }
 */
final class PublicObjectListRecord implements BaseModel
{
    /** @use SdkModel<PublicObjectListRecordShape> */
    use SdkModel;

    /**
     * The ID of the list containing the imported objects.
     */
    #[Required('listId')]
    public string $listID;

    /**
     * The type of object contained in the list.
     */
    #[Required]
    public string $objectType;

    /**
     * `new PublicObjectListRecord()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * PublicObjectListRecord::with(listID: ..., objectType: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new PublicObjectListRecord)->withListID(...)->withObjectType(...)
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
    public static function with(string $listID, string $objectType): self
    {
        $self = new self;

        $self['listID'] = $listID;
        $self['objectType'] = $objectType;

        return $self;
    }

    /**
     * The ID of the list containing the imported objects.
     */
    public function withListID(string $listID): self
    {
        $self = clone $this;
        $self['listID'] = $listID;

        return $self;
    }

    /**
     * The type of object contained in the list.
     */
    public function withObjectType(string $objectType): self
    {
        $self = clone $this;
        $self['objectType'] = $objectType;

        return $self;
    }
}
