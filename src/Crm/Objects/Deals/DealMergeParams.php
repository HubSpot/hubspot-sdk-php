<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\Objects\Deals;

use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * Combine two deals of the same type into a single deal.
 *
 * @see HubspotSDK\Services\Crm\Objects\DealsService::merge()
 *
 * @phpstan-type DealMergeParamsShape = array{
 *   objectIDToMerge: string, primaryObjectID: string
 * }
 */
final class DealMergeParams implements BaseModel
{
    /** @use SdkModel<DealMergeParamsShape> */
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
     * `new DealMergeParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * DealMergeParams::with(objectIDToMerge: ..., primaryObjectID: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new DealMergeParams)->withObjectIDToMerge(...)->withPrimaryObjectID(...)
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
