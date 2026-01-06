<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\Objects\Projects;

use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * Merge two project records. Learn more about [merging records](https://knowledge.hubspot.com/records/merge-records).
 *
 * @see HubspotSDK\Services\Crm\Objects\ProjectsService::merge()
 *
 * @phpstan-type ProjectMergeParamsShape = array{
 *   objectIDToMerge: string, primaryObjectID: string
 * }
 */
final class ProjectMergeParams implements BaseModel
{
    /** @use SdkModel<ProjectMergeParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * The unique identifier of the CRM object that will be merged into the primary object.
     */
    #[Required('objectIdToMerge')]
    public string $objectIDToMerge;

    /**
     * The unique identifier of the CRM object that will remain after the merge.
     */
    #[Required('primaryObjectId')]
    public string $primaryObjectID;

    /**
     * `new ProjectMergeParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * ProjectMergeParams::with(objectIDToMerge: ..., primaryObjectID: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new ProjectMergeParams)->withObjectIDToMerge(...)->withPrimaryObjectID(...)
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

        $obj['objectIDToMerge'] = $objectIDToMerge;
        $obj['primaryObjectID'] = $primaryObjectID;

        return $obj;
    }

    /**
     * The unique identifier of the CRM object that will be merged into the primary object.
     */
    public function withObjectIDToMerge(string $objectIDToMerge): self
    {
        $obj = clone $this;
        $obj['objectIDToMerge'] = $objectIDToMerge;

        return $obj;
    }

    /**
     * The unique identifier of the CRM object that will remain after the merge.
     */
    public function withPrimaryObjectID(string $primaryObjectID): self
    {
        $obj = clone $this;
        $obj['primaryObjectID'] = $primaryObjectID;

        return $obj;
    }
}
