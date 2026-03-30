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
     * The ID of the company to merge into the primary.
     */
    #[Required('objectIdToMerge')]
    public string $objectIDToMerge;

    /**
     * The ID of the primary company, which the other will merge into.
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
        $self = new self;

        $self['objectIDToMerge'] = $objectIDToMerge;
        $self['primaryObjectID'] = $primaryObjectID;

        return $self;
    }

    /**
     * The ID of the company to merge into the primary.
     */
    public function withObjectIDToMerge(string $objectIDToMerge): self
    {
        $self = clone $this;
        $self['objectIDToMerge'] = $objectIDToMerge;

        return $self;
    }

    /**
     * The ID of the primary company, which the other will merge into.
     */
    public function withPrimaryObjectID(string $primaryObjectID): self
    {
        $self = clone $this;
        $self['primaryObjectID'] = $primaryObjectID;

        return $self;
    }
}
