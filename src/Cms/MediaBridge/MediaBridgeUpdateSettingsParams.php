<?php

declare(strict_types=1);

namespace HubspotSDK\Cms\MediaBridge;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * Update the name that your app will display when a user is selecting media bridge items.
 *
 * @see HubspotSDK\Services\Cms\MediaBridgeService::updateSettings()
 *
 * @phpstan-type MediaBridgeUpdateSettingsParamsShape = array{
 *   updatedAt: int,
 *   allowImportOnDisconnect?: bool|null,
 *   moduleName?: string|null,
 *   name?: string|null,
 * }
 */
final class MediaBridgeUpdateSettingsParams implements BaseModel
{
    /** @use SdkModel<MediaBridgeUpdateSettingsParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Required]
    public int $updatedAt;

    #[Optional]
    public ?bool $allowImportOnDisconnect;

    #[Optional]
    public ?string $moduleName;

    #[Optional]
    public ?string $name;

    /**
     * `new MediaBridgeUpdateSettingsParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * MediaBridgeUpdateSettingsParams::with(updatedAt: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new MediaBridgeUpdateSettingsParams)->withUpdatedAt(...)
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
        int $updatedAt,
        ?bool $allowImportOnDisconnect = null,
        ?string $moduleName = null,
        ?string $name = null,
    ): self {
        $self = new self;

        $self['updatedAt'] = $updatedAt;

        null !== $allowImportOnDisconnect && $self['allowImportOnDisconnect'] = $allowImportOnDisconnect;
        null !== $moduleName && $self['moduleName'] = $moduleName;
        null !== $name && $self['name'] = $name;

        return $self;
    }

    public function withUpdatedAt(int $updatedAt): self
    {
        $self = clone $this;
        $self['updatedAt'] = $updatedAt;

        return $self;
    }

    public function withAllowImportOnDisconnect(
        bool $allowImportOnDisconnect
    ): self {
        $self = clone $this;
        $self['allowImportOnDisconnect'] = $allowImportOnDisconnect;

        return $self;
    }

    public function withModuleName(string $moduleName): self
    {
        $self = clone $this;
        $self['moduleName'] = $moduleName;

        return $self;
    }

    public function withName(string $name): self
    {
        $self = clone $this;
        $self['name'] = $name;

        return $self;
    }
}
