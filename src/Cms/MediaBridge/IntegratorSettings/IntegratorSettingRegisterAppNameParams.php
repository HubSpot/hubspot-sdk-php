<?php

declare(strict_types=1);

namespace HubspotSDK\Cms\MediaBridge\IntegratorSettings;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * Register the name that your app will display when a user is selecting media bridge items.
 *
 * @deprecated
 * @see HubspotSDK\Services\Cms\MediaBridge\IntegratorSettingsService::registerAppName()
 *
 * @phpstan-type IntegratorSettingRegisterAppNameParamsShape = array{
 *   updatedAt: int, name?: string
 * }
 */
final class IntegratorSettingRegisterAppNameParams implements BaseModel
{
    /** @use SdkModel<IntegratorSettingRegisterAppNameParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Required]
    public int $updatedAt;

    #[Optional]
    public ?string $name;

    /**
     * `new IntegratorSettingRegisterAppNameParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * IntegratorSettingRegisterAppNameParams::with(updatedAt: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new IntegratorSettingRegisterAppNameParams)->withUpdatedAt(...)
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
    public static function with(int $updatedAt, ?string $name = null): self
    {
        $self = new self;

        $self['updatedAt'] = $updatedAt;

        null !== $name && $self['name'] = $name;

        return $self;
    }

    public function withUpdatedAt(int $updatedAt): self
    {
        $self = clone $this;
        $self['updatedAt'] = $updatedAt;

        return $self;
    }

    public function withName(string $name): self
    {
        $self = clone $this;
        $self['name'] = $name;

        return $self;
    }
}
