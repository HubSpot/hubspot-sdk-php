<?php

declare(strict_types=1);

namespace HubspotSDK\Crm;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type PublicMergeInputShape = array{
 *   objectIdToMerge: string, primaryObjectId: string
 * }
 */
final class PublicMergeInput implements BaseModel
{
    /** @use SdkModel<PublicMergeInputShape> */
    use SdkModel;

    #[Api]
    public string $objectIdToMerge;

    #[Api]
    public string $primaryObjectId;

    /**
     * `new PublicMergeInput()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * PublicMergeInput::with(objectIdToMerge: ..., primaryObjectId: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new PublicMergeInput)->withObjectIDToMerge(...)->withPrimaryObjectID(...)
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
    public static function with(
        string $objectIdToMerge,
        string $primaryObjectId
    ): self {
        $obj = new self;

        $obj->objectIdToMerge = $objectIdToMerge;
        $obj->primaryObjectId = $primaryObjectId;

        return $obj;
    }

    public function withObjectIDToMerge(string $objectIDToMerge): self
    {
        $obj = clone $this;
        $obj->objectIdToMerge = $objectIDToMerge;

        return $obj;
    }

    public function withPrimaryObjectID(string $primaryObjectID): self
    {
        $obj = clone $this;
        $obj->primaryObjectId = $primaryObjectID;

        return $obj;
    }
}
