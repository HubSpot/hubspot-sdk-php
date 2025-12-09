<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\Objects\Companies;

use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * Merge two company records. Learn more about [merging records](https://knowledge.hubspot.com/records/merge-records).
 *
 * @see HubspotSDK\Services\Crm\Objects\CompaniesService::merge()
 *
 * @phpstan-type CompanyMergeParamsShape = array{
 *   objectIDToMerge: string, primaryObjectID: string
 * }
 */
final class CompanyMergeParams implements BaseModel
{
    /** @use SdkModel<CompanyMergeParamsShape> */
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
        $self = new self;

        $self['objectIDToMerge'] = $objectIDToMerge;
        $self['primaryObjectID'] = $primaryObjectID;

        return $self;
    }

    /**
     * The unique identifier of the CRM object that will be merged into the primary object.
     */
    public function withObjectIDToMerge(string $objectIDToMerge): self
    {
        $self = clone $this;
        $self['objectIDToMerge'] = $objectIDToMerge;

        return $self;
    }

    /**
     * The unique identifier of the CRM object that will remain after the merge.
     */
    public function withPrimaryObjectID(string $primaryObjectID): self
    {
        $self = clone $this;
        $self['primaryObjectID'] = $primaryObjectID;

        return $self;
    }
}
