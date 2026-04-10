<?php

declare(strict_types=1);

namespace HubSpotSDK\Crm\Properties\Groups;

use HubSpotSDK\Core\Attributes\Optional;
use HubSpotSDK\Core\Attributes\Required;
use HubSpotSDK\Core\Concerns\SdkModel;
use HubSpotSDK\Core\Concerns\SdkParams;
use HubSpotSDK\Core\Contracts\BaseModel;

/**
 * Read a property group identified by {groupName}.
 *
 * @see HubSpotSDK\Services\Crm\Properties\GroupsService::get()
 *
 * @phpstan-type GroupGetParamsShape = array{
 *   objectType: string, locale?: string|null
 * }
 */
final class GroupGetParams implements BaseModel
{
    /** @use SdkModel<GroupGetParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Required]
    public string $objectType;

    #[Optional]
    public ?string $locale;

    /**
     * `new GroupGetParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * GroupGetParams::with(objectType: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new GroupGetParams)->withObjectType(...)
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
    public static function with(string $objectType, ?string $locale = null): self
    {
        $self = new self;

        $self['objectType'] = $objectType;

        null !== $locale && $self['locale'] = $locale;

        return $self;
    }

    public function withObjectType(string $objectType): self
    {
        $self = clone $this;
        $self['objectType'] = $objectType;

        return $self;
    }

    public function withLocale(string $locale): self
    {
        $self = clone $this;
        $self['locale'] = $locale;

        return $self;
    }
}
