<?php

declare(strict_types=1);

namespace HubspotSDK\Cms\MediaBridge\IntegratorSettings;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * Get the existing objects types that belong to the specified media type.
 *
 * @see HubspotSDK\Cms\MediaBridge\IntegratorSettings->getObjectDefinitionsByMediaType
 *
 * @phpstan-type IntegratorSettingGetObjectDefinitionsByMediaTypeParamsShape = array{
 *   appID: string
 * }
 */
final class IntegratorSettingGetObjectDefinitionsByMediaTypeParams implements BaseModel
{
    /**
     * @use SdkModel<IntegratorSettingGetObjectDefinitionsByMediaTypeParamsShape>
     */
    use SdkModel;
    use SdkParams;

    #[Api]
    public string $appID;

    /**
     * `new IntegratorSettingGetObjectDefinitionsByMediaTypeParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * IntegratorSettingGetObjectDefinitionsByMediaTypeParams::with(appID: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new IntegratorSettingGetObjectDefinitionsByMediaTypeParams)->withAppID(...)
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
    public static function with(string $appID): self
    {
        $obj = new self;

        $obj->appID = $appID;

        return $obj;
    }

    public function withAppID(string $appID): self
    {
        $obj = clone $this;
        $obj->appID = $appID;

        return $obj;
    }
}
