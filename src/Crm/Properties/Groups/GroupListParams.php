<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\Properties\Groups;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * Read all existing property groups for the specified object type and HubSpot account.
 *
 * @see HubspotSDK\Services\Crm\Properties\GroupsService::list()
 *
 * @phpstan-type GroupListParamsShape = array{locale?: string}
 */
final class GroupListParams implements BaseModel
{
    /** @use SdkModel<GroupListParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Api(optional: true)]
    public ?string $locale;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(?string $locale = null): self
    {
        $obj = new self;

        null !== $locale && $obj->locale = $locale;

        return $obj;
    }

    public function withLocale(string $locale): self
    {
        $obj = clone $this;
        $obj->locale = $locale;

        return $obj;
    }
}
