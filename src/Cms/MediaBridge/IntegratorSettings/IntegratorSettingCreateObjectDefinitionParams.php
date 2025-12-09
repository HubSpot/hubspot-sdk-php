<?php

declare(strict_types=1);

namespace HubspotSDK\Cms\MediaBridge\IntegratorSettings;

use HubspotSDK\Cms\MediaBridge\IntegratorSettings\IntegratorSettingCreateObjectDefinitionParams\MediaType;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * Create a new media object type.
 *
 * @see HubspotSDK\Services\Cms\MediaBridge\IntegratorSettingsService::createObjectDefinition()
 *
 * @phpstan-type IntegratorSettingCreateObjectDefinitionParamsShape = array{
 *   mediaTypes: list<MediaType|value-of<MediaType>>
 * }
 */
final class IntegratorSettingCreateObjectDefinitionParams implements BaseModel
{
    /** @use SdkModel<IntegratorSettingCreateObjectDefinitionParamsShape> */
    use SdkModel;
    use SdkParams;

    /** @var list<value-of<MediaType>> $mediaTypes */
    #[Required(list: MediaType::class)]
    public array $mediaTypes;

    /**
     * `new IntegratorSettingCreateObjectDefinitionParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * IntegratorSettingCreateObjectDefinitionParams::with(mediaTypes: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new IntegratorSettingCreateObjectDefinitionParams)->withMediaTypes(...)
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
     *
     * @param list<MediaType|value-of<MediaType>> $mediaTypes
     */
    public static function with(array $mediaTypes): self
    {
        $obj = new self;

        $obj['mediaTypes'] = $mediaTypes;

        return $obj;
    }

    /**
     * @param list<MediaType|value-of<MediaType>> $mediaTypes
     */
    public function withMediaTypes(array $mediaTypes): self
    {
        $obj = clone $this;
        $obj['mediaTypes'] = $mediaTypes;

        return $obj;
    }
}
