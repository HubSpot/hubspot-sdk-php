<?php

declare(strict_types=1);

namespace HubSpotSDK\Crm\Properties\Groups;

use HubSpotSDK\Core\Attributes\Optional;
use HubSpotSDK\Core\Concerns\SdkModel;
use HubSpotSDK\Core\Concerns\SdkParams;
use HubSpotSDK\Core\Contracts\BaseModel;

/**
 * Read all existing property groups for the specified object type and HubSpot account.
 *
 * @see HubSpotSDK\Services\Crm\Properties\GroupsService::list()
 *
 * @phpstan-type GroupListParamsShape = array{locale?: string|null}
 */
final class GroupListParams implements BaseModel
{
    /** @use SdkModel<GroupListParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Optional]
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
        $self = new self;

        null !== $locale && $self['locale'] = $locale;

        return $self;
    }

    public function withLocale(string $locale): self
    {
        $self = clone $this;
        $self['locale'] = $locale;

        return $self;
    }
}
