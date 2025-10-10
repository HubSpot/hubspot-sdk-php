<?php

declare(strict_types=1);

namespace HubspotSDK\CRM\Objects\Deals;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * An object containing the method's parameters.
 * Example usage:
 * ```
 * $params = (new DealMergeByObjectTypeIDParams); // set properties as needed
 * $client->crm.objects.deals->mergeByObjectTypeID(...$params->toArray());
 * ```
 * Merge two deals with same type.
 *
 * @method toArray()
 *   Returns the parameters as an associative array suitable for passing to the client method.
 *
 *   `$client->crm.objects.deals->mergeByObjectTypeID(...$params->toArray());`
 *
 * @see HubspotSDK\CRM\Objects\Deals->mergeByObjectTypeID
 *
 * @phpstan-type deal_merge_by_object_type_id_params = array{
 *   objectIDToMerge: string, primaryObjectID: string
 * }
 */
final class DealMergeByObjectTypeIDParams implements BaseModel
{
    /** @use SdkModel<deal_merge_by_object_type_id_params> */
    use SdkModel;
    use SdkParams;

    #[Api('objectIdToMerge')]
    public string $objectIDToMerge;

    #[Api('primaryObjectId')]
    public string $primaryObjectID;

    /**
     * `new DealMergeByObjectTypeIDParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * DealMergeByObjectTypeIDParams::with(objectIDToMerge: ..., primaryObjectID: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new DealMergeByObjectTypeIDParams)
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
