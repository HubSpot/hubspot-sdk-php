<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\Imports;

use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type PublicObjectListRecordShape = array{
 *   listId: string, objectType: string
 * }
 */
final class PublicObjectListRecord implements BaseModel
{
    /** @use SdkModel<PublicObjectListRecordShape> */
    use SdkModel;

    /**
     * The ID of the list containing the imported objects.
     */
    #[Required]
    public string $listId;

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
     * PublicObjectListRecord::with(listId: ..., objectType: ...)
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
    public static function with(string $listId, string $objectType): self
    {
        $obj = new self;

        $obj['listId'] = $listId;
        $obj['objectType'] = $objectType;

        return $obj;
    }

    /**
     * The ID of the list containing the imported objects.
     */
    public function withListID(string $listID): self
    {
        $obj = clone $this;
        $obj['listId'] = $listID;

        return $obj;
    }

    /**
     * The type of object contained in the list.
     */
    public function withObjectType(string $objectType): self
    {
        $obj = clone $this;
        $obj['objectType'] = $objectType;

        return $obj;
    }
}
