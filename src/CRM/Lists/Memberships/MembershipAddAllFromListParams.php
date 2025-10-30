<?php

declare(strict_types=1);

namespace HubspotSDK\CRM\Lists\Memberships;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * Add all of the records from a *source list* (specified by the `sourceListId`) to a *destination list* (specified by the `listId`). Records that are already members of the *destination list* will be ignored. The *destination* and *source list* IDs must be different. The *destination* and *source lists* must contain records of the same type (e.g. contacts, companies, etc.).
 *
 * This endpoint only works for *destination lists* that have a `processingType` of `MANUAL` or `SNAPSHOT`. The *source list* can have any `processingType`.
 *
 * This endpoint only supports a `sourceListId` for lists with less than 100,000 memberships.
 *
 * @see HubspotSDK\CRM\Lists\Memberships->addAllFromList
 *
 * @phpstan-type MembershipAddAllFromListParamsShape = array{listID: string}
 */
final class MembershipAddAllFromListParams implements BaseModel
{
    /** @use SdkModel<MembershipAddAllFromListParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Api]
    public string $listID;

    /**
     * `new MembershipAddAllFromListParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * MembershipAddAllFromListParams::with(listID: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new MembershipAddAllFromListParams)->withListID(...)
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
    public static function with(string $listID): self
    {
        $obj = new self;

        $obj->listID = $listID;

        return $obj;
    }

    public function withListID(string $listID): self
    {
        $obj = clone $this;
        $obj->listID = $listID;

        return $obj;
    }
}
