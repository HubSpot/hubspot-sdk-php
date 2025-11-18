<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\Properties\Groups;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * Read a property group identified by {groupName}.
 *
 * @see HubspotSDK\Services\Crm\Properties\GroupsService::get()
 *
 * @phpstan-type GroupGetParamsShape = array{objectType: string, locale?: string}
 */
final class GroupGetParams implements BaseModel
{
    /** @use SdkModel<GroupGetParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Api]
    public string $objectType;

    #[Api(optional: true)]
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
        $obj = new self;

        $obj->objectType = $objectType;

        null !== $locale && $obj->locale = $locale;

        return $obj;
    }

    public function withObjectType(string $objectType): self
    {
        $obj = clone $this;
        $obj->objectType = $objectType;

        return $obj;
    }

    public function withLocale(string $locale): self
    {
        $obj = clone $this;
        $obj->locale = $locale;

        return $obj;
    }
}
