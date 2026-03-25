<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\Properties\Groups;

use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * Move a property group identified by {groupName} to the recycling bin.
 *
 * @see HubspotSDK\Services\Crm\Properties\GroupsService::delete()
 *
 * @phpstan-type GroupDeleteParamsShape = array{objectType: string}
 */
final class GroupDeleteParams implements BaseModel
{
    /** @use SdkModel<GroupDeleteParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Required]
    public string $objectType;

    /**
     * `new GroupDeleteParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * GroupDeleteParams::with(objectType: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new GroupDeleteParams)->withObjectType(...)
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
    public static function with(string $objectType): self
    {
        $self = new self;

        $self['objectType'] = $objectType;

        return $self;
    }

    public function withObjectType(string $objectType): self
    {
        $self = clone $this;
        $self['objectType'] = $objectType;

        return $self;
    }
}
