<?php

declare(strict_types=1);

namespace HubspotSDK\Cms\MediaBridge\IntegratorSettings;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * Update the name that your app will display when a user is selecting media bridge items.
 *
 * @see HubspotSDK\Cms\MediaBridge\IntegratorSettings->updateAppName
 *
 * @phpstan-type integrator_setting_update_app_name_params = array{
 *   updatedAt: int, name?: string
 * }
 */
final class IntegratorSettingUpdateAppNameParams implements BaseModel
{
    /** @use SdkModel<integrator_setting_update_app_name_params> */
    use SdkModel;
    use SdkParams;

    #[Api]
    public int $updatedAt;

    #[Api(optional: true)]
    public ?string $name;

    /**
     * `new IntegratorSettingUpdateAppNameParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * IntegratorSettingUpdateAppNameParams::with(updatedAt: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new IntegratorSettingUpdateAppNameParams)->withUpdatedAt(...)
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
        $obj = new self;

        $obj->updatedAt = $updatedAt;

        null !== $name && $obj->name = $name;

        return $obj;
    }

    public function withUpdatedAt(int $updatedAt): self
    {
        $obj = clone $this;
        $obj->updatedAt = $updatedAt;

        return $obj;
    }

    public function withName(string $name): self
    {
        $obj = clone $this;
        $obj->name = $name;

        return $obj;
    }
}
