<?php

declare(strict_types=1);

namespace HubspotSDK\CRM\Objects\Custom;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * Merge two objects with same type.
 *
 * @see HubspotSDK\CRM\Objects\Custom->merge
 *
 * @phpstan-type custom_merge_params = array{
 *   objectIDToMerge: string, primaryObjectID: string
 * }
 */
final class CustomMergeParams implements BaseModel
{
    /** @use SdkModel<custom_merge_params> */
    use SdkModel;
    use SdkParams;

    /**
     * The ID of the company to merge into the primary.
     */
    #[Api('objectIdToMerge')]
    public string $objectIDToMerge;

    /**
     * The ID of the primary company, which the other will merge into.
     */
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

    /**
     * The ID of the company to merge into the primary.
     */
    public function withObjectIDToMerge(string $objectIDToMerge): self
    {
        $obj = clone $this;
        $obj->objectIDToMerge = $objectIDToMerge;

        return $obj;
    }

    /**
     * The ID of the primary company, which the other will merge into.
     */
    public function withPrimaryObjectID(string $primaryObjectID): self
    {
        $obj = clone $this;
        $obj->primaryObjectID = $primaryObjectID;

        return $obj;
    }
}
