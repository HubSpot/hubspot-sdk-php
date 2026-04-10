<?php

declare(strict_types=1);

namespace HubSpotSDK\Crm\Lists;

use HubSpotSDK\Core\Attributes\Optional;
use HubSpotSDK\Core\Concerns\SdkModel;
use HubSpotSDK\Core\Concerns\SdkParams;
use HubSpotSDK\Core\Contracts\BaseModel;

/**
 * @see HubSpotSDK\Services\Crm\ListsService::getIDMapping()
 *
 * @phpstan-type ListGetIDMappingParamsShape = array{legacyListID?: string|null}
 */
final class ListGetIDMappingParams implements BaseModel
{
    /** @use SdkModel<ListGetIDMappingParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Optional]
    public ?string $legacyListID;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(?string $legacyListID = null): self
    {
        $self = new self;

        null !== $legacyListID && $self['legacyListID'] = $legacyListID;

        return $self;
    }

    public function withLegacyListID(string $legacyListID): self
    {
        $self = clone $this;
        $self['legacyListID'] = $legacyListID;

        return $self;
    }
}
