<?php

declare(strict_types=1);

namespace HubspotSDK\CRM\Objects\Companies;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * Merge two company records. Learn more about [merging records](https://knowledge.hubspot.com/records/merge-records).
 *
 * @see HubspotSDK\CRM\Objects\Companies->merge
 *
 * @phpstan-type company_merge_params = array{
 *   objectIDToMerge: string, primaryObjectID: string
 * }
 */
final class CompanyMergeParams implements BaseModel
{
    /** @use SdkModel<company_merge_params> */
    use SdkModel;
    use SdkParams;

    #[Api('objectIdToMerge')]
    public string $objectIDToMerge;

    #[Api('primaryObjectId')]
    public string $primaryObjectID;

    /**
     * `new CompanyMergeParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * CompanyMergeParams::with(objectIDToMerge: ..., primaryObjectID: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new CompanyMergeParams)->withObjectIDToMerge(...)->withPrimaryObjectID(...)
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
