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
 *   objectIdToMerge: string, primaryObjectId: string
 * }
 */
final class DealMergeParams implements BaseModel
{
    /** @use SdkModel<DealMergeParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * The unique identifier of the CRM object that will be merged into the primary object.
     */
    #[Required]
    public string $objectIdToMerge;

    /**
     * The unique identifier of the CRM object that will remain after the merge.
     */
    #[Required]
    public string $primaryObjectId;

    /**
     * `new DealMergeParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * DealMergeParams::with(objectIdToMerge: ..., primaryObjectId: ...)
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
        string $objectIdToMerge,
        string $primaryObjectId
    ): self {
        $obj = new self;

        $obj['objectIdToMerge'] = $objectIdToMerge;
        $obj['primaryObjectId'] = $primaryObjectId;

        return $obj;
    }

    /**
     * The unique identifier of the CRM object that will be merged into the primary object.
     */
    public function withObjectIDToMerge(string $objectIDToMerge): self
    {
        $obj = clone $this;
        $obj['objectIdToMerge'] = $objectIDToMerge;

        return $obj;
    }

    /**
     * The unique identifier of the CRM object that will remain after the merge.
     */
    public function withPrimaryObjectID(string $primaryObjectID): self
    {
        $obj = clone $this;
        $obj['primaryObjectId'] = $primaryObjectID;

        return $obj;
    }
}
