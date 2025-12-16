<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\Lists\Mapping;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * This API allows translation of legacy list id to list id. This is a temporary API allowed for mapping old id's to new id's and will expire on May 30th, 2025.
 *
 * @see HubspotSDK\Services\Crm\Lists\MappingService::getIDMapping()
 *
 * @phpstan-type MappingGetIDMappingParamsShape = array{legacyListID?: string|null}
 */
final class MappingGetIDMappingParams implements BaseModel
{
    /** @use SdkModel<MappingGetIDMappingParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * The legacy list id from lists v1 API.
     */
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

    /**
     * The legacy list id from lists v1 API.
     */
    public function withLegacyListID(string $legacyListID): self
    {
        $self = clone $this;
        $self['legacyListID'] = $legacyListID;

        return $self;
    }
}
