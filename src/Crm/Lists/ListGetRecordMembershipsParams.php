<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\Lists;

use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @see HubspotSDK\Services\Crm\ListsService::getRecordMemberships()
 *
 * @phpstan-type ListGetRecordMembershipsParamsShape = array{objectTypeID: string}
 */
final class ListGetRecordMembershipsParams implements BaseModel
{
    /** @use SdkModel<ListGetRecordMembershipsParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Required]
    public string $objectTypeID;

    /**
     * `new ListGetRecordMembershipsParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * ListGetRecordMembershipsParams::with(objectTypeID: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new ListGetRecordMembershipsParams)->withObjectTypeID(...)
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
        $self = new self;

        $self['objectTypeID'] = $objectTypeID;

        return $self;
    }

    public function withObjectTypeID(string $objectTypeID): self
    {
        $self = clone $this;
        $self['objectTypeID'] = $objectTypeID;

        return $self;
    }
}
