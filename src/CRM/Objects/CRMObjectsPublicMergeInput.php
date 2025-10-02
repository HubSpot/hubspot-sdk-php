<?php

declare(strict_types=1);

namespace HubspotSDK\CRM\Objects;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type crm_objects_public_merge_input = array{
 *   objectIDToMerge: string, primaryObjectID: string
 * }
 */
final class CRMObjectsPublicMergeInput implements BaseModel
{
    /** @use SdkModel<crm_objects_public_merge_input> */
    use SdkModel;

    #[Api('objectIdToMerge')]
    public string $objectIDToMerge;

    #[Api('primaryObjectId')]
    public string $primaryObjectID;

    /**
     * `new CRMObjectsPublicMergeInput()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * CRMObjectsPublicMergeInput::with(objectIDToMerge: ..., primaryObjectID: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new CRMObjectsPublicMergeInput)
     *   ->withObjectIDToMerge(...)
     *   ->withPrimaryObjectID(...)
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
