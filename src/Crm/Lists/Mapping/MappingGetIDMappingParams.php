<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\Lists\Mapping;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * This API allows translation of legacy list id to list id. This is a temporary API allowed for mapping old id's to new id's and will expire on May 30th, 2025.
 *
 * @see HubspotSDK\Crm\Lists\Mapping->getIDMapping
 *
 * @phpstan-type MappingGetIDMappingParamsShape = array{legacyListID?: string}
 */
final class MappingGetIDMappingParams implements BaseModel
{
    /** @use SdkModel<MappingGetIDMappingParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * The legacy list id from lists v1 API.
     */
    #[Api(optional: true)]
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
        $obj = new self;

        null !== $legacyListID && $obj->legacyListID = $legacyListID;

        return $obj;
    }

    /**
     * The legacy list id from lists v1 API.
     */
    public function withLegacyListID(string $legacyListID): self
    {
        $obj = clone $this;
        $obj->legacyListID = $legacyListID;

        return $obj;
    }
}
