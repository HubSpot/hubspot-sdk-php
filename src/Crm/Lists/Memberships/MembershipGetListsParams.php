<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\Lists\Memberships;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * For given record provide lists this record is member of.
 *
 * @see HubspotSDK\Services\Crm\Lists\MembershipsService::getLists()
 *
 * @phpstan-type MembershipGetListsParamsShape = array{objectTypeId: string}
 */
final class MembershipGetListsParams implements BaseModel
{
    /** @use SdkModel<MembershipGetListsParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Api]
    public string $objectTypeId;

    /**
     * `new MembershipGetListsParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * MembershipGetListsParams::with(objectTypeId: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new MembershipGetListsParams)->withObjectTypeID(...)
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
    public static function with(string $objectTypeId): self
    {
        $obj = new self;

        $obj->objectTypeId = $objectTypeId;

        return $obj;
    }

    public function withObjectTypeID(string $objectTypeID): self
    {
        $obj = clone $this;
        $obj->objectTypeId = $objectTypeID;

        return $obj;
    }
}
