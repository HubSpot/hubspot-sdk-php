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
 * @see HubspotSDK\Crm\Lists\Memberships->getLists
 *
 * @phpstan-type MembershipGetListsParamsShape = array{objectTypeID: string}
 */
final class MembershipGetListsParams implements BaseModel
{
    /** @use SdkModel<MembershipGetListsParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Api]
    public string $objectTypeID;

    /**
     * `new MembershipGetListsParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * MembershipGetListsParams::with(objectTypeID: ...)
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
    public static function with(string $objectTypeID): self
    {
        $obj = new self;

        $obj->objectTypeID = $objectTypeID;

        return $obj;
    }

    public function withObjectTypeID(string $objectTypeID): self
    {
        $obj = clone $this;
        $obj->objectTypeID = $objectTypeID;

        return $obj;
    }
}
