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
 * @see HubspotSDK\Services\Cms\MediaBridge\IntegratorSettingsService::getObjectDefinitionsByMediaType()
 *
 * @phpstan-type IntegratorSettingGetObjectDefinitionsByMediaTypeParamsShape = array{
 *   appId: int, includeFullDefinition?: bool
 * }
 */
final class IntegratorSettingGetObjectDefinitionsByMediaTypeParams implements BaseModel
{
    /** @use SdkModel<IntegratorSettingGetObjectDefinitionsByMediaTypeParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Api]
    public int $appId;

    /**
     * Include the full definition in the response.
     */
    #[Api(optional: true)]
    public ?bool $includeFullDefinition;

    /**
     * `new IntegratorSettingGetObjectDefinitionsByMediaTypeParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * IntegratorSettingGetObjectDefinitionsByMediaTypeParams::with(appId: ...)
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
    public static function with(
        int $appId,
        ?bool $includeFullDefinition = null
    ): self {
        $obj = new self;

        $obj['appId'] = $appId;

        null !== $includeFullDefinition && $obj['includeFullDefinition'] = $includeFullDefinition;

        return $obj;
    }

    public function withAppID(int $appID): self
    {
        $obj = clone $this;
        $obj['appId'] = $appID;

        return $obj;
    }

    /**
     * Include the full definition in the response.
     */
    public function withIncludeFullDefinition(bool $includeFullDefinition): self
    {
        $obj = clone $this;
        $obj['includeFullDefinition'] = $includeFullDefinition;

        return $obj;
    }
}
