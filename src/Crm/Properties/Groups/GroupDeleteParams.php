<?php

declare(strict_types=1);

namespace HubSpotSDK\Crm\Properties\Groups;

use HubSpotSDK\Core\Attributes\Required;
use HubSpotSDK\Core\Concerns\SdkModel;
use HubSpotSDK\Core\Concerns\SdkParams;
use HubSpotSDK\Core\Contracts\BaseModel;

/**
 * Move a property group identified by {groupName} to the recycling bin.
 *
 * @see HubSpotSDK\Services\Crm\Properties\GroupsService::delete()
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
