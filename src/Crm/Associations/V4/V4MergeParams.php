<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\Associations\V4;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * Merge two CRM objects of the specified type into one.
 *
 * @see HubspotSDK\Services\Crm\Associations\V4Service::merge()
 *
 * @phpstan-type V4MergeParamsShape = array{
 *   objectIdToMerge: string, primaryObjectId: string
 * }
 */
final class V4MergeParams implements BaseModel
{
    /** @use SdkModel<V4MergeParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * The unique identifier of the CRM object that will be merged into the primary object.
     */
    #[Api]
    public string $objectIdToMerge;

    /**
     * The unique identifier of the CRM object that will remain after the merge.
     */
    #[Api]
    public string $primaryObjectId;

    /**
     * `new V4MergeParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * V4MergeParams::with(objectIdToMerge: ..., primaryObjectId: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new V4MergeParams)->withObjectIDToMerge(...)->withPrimaryObjectID(...)
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

    /**
     * The unique identifier of the CRM object that will be merged into the primary object.
     */
    public function withObjectIDToMerge(string $objectIDToMerge): self
    {
        $obj = clone $this;
        $obj->objectIdToMerge = $objectIDToMerge;

        return $obj;
    }

    /**
     * The unique identifier of the CRM object that will remain after the merge.
     */
    public function withPrimaryObjectID(string $primaryObjectID): self
    {
        $obj = clone $this;
        $obj->primaryObjectId = $primaryObjectID;

        return $obj;
    }
}
