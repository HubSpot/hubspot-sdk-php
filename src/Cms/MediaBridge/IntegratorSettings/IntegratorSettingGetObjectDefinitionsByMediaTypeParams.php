<?php

declare(strict_types=1);

namespace HubspotSDK\Cms\MediaBridge\IntegratorSettings;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * Get the existing objects types that belong to the specified media type.
 *
 * @see HubspotSDK\Services\Cms\MediaBridge\IntegratorSettingsService::getObjectDefinitionsByMediaType()
 *
 * @phpstan-type IntegratorSettingGetObjectDefinitionsByMediaTypeParamsShape = array{
 *   appID: int, includeFullDefinition?: bool
 * }
 */
final class IntegratorSettingGetObjectDefinitionsByMediaTypeParams implements BaseModel
{
    /** @use SdkModel<IntegratorSettingGetObjectDefinitionsByMediaTypeParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Required]
    public int $appID;

    /**
     * Include the full definition in the response.
     */
    #[Optional]
    public ?bool $includeFullDefinition;

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
    public static function with(
        int $appID,
        ?bool $includeFullDefinition = null
    ): self {
        $self = new self;

        $self['appID'] = $appID;

        null !== $includeFullDefinition && $self['includeFullDefinition'] = $includeFullDefinition;

        return $self;
    }

    public function withAppID(int $appID): self
    {
        $self = clone $this;
        $self['appID'] = $appID;

        return $self;
    }

    /**
     * Include the full definition in the response.
     */
    public function withIncludeFullDefinition(bool $includeFullDefinition): self
    {
        $self = clone $this;
        $self['includeFullDefinition'] = $includeFullDefinition;

        return $self;
    }
}
