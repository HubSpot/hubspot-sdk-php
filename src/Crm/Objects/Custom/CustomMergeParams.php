<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\Objects\Custom;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * Merge two objects with same type.
 *
 * @see HubspotSDK\Crm\Objects\Custom->merge
 *
 * @phpstan-type CustomMergeParamsShape = array{
 *   objectIDToMerge: string, primaryObjectID: string
 * }
 */
final class CustomMergeParams implements BaseModel
{
    /** @use SdkModel<CustomMergeParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Api('objectIdToMerge')]
    public string $objectIDToMerge;

    #[Api('primaryObjectId')]
    public string $primaryObjectID;

    /**
     * `new CustomMergeParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * CustomMergeParams::with(objectIDToMerge: ..., primaryObjectID: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new CustomMergeParams)->withObjectIDToMerge(...)->withPrimaryObjectID(...)
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
        string $objectIDToMerge,
        string $primaryObjectID
    ): self {
        $obj = new self;

        $obj->objectIDToMerge = $objectIDToMerge;
        $obj->primaryObjectID = $primaryObjectID;

        return $obj;
    }

    public function withObjectIDToMerge(string $objectIDToMerge): self
    {
        $obj = clone $this;
        $obj->objectIDToMerge = $objectIDToMerge;

        return $obj;
    }

    public function withPrimaryObjectID(string $primaryObjectID): self
    {
        $obj = clone $this;
        $obj->primaryObjectID = $primaryObjectID;

        return $obj;
    }
}
