<?php

declare(strict_types=1);

namespace HubSpotSDK\Cms\MediaBridge;

use HubSpotSDK\Core\Attributes\Optional;
use HubSpotSDK\Core\Attributes\Required;
use HubSpotSDK\Core\Concerns\SdkModel;
use HubSpotSDK\Core\Concerns\SdkParams;
use HubSpotSDK\Core\Contracts\BaseModel;

/**
 * Register the name that your app will display when a user is selecting media bridge items.
 *
 * @deprecated
 * @see HubSpotSDK\Services\Cms\MediaBridgeService::registerAppName()
 *
 * @phpstan-type MediaBridgeRegisterAppNameParamsShape = array{
 *   updatedAt: int,
 *   allowImportOnDisconnect?: bool|null,
 *   moduleName?: string|null,
 *   name?: string|null,
 * }
 */
final class MediaBridgeRegisterAppNameParams implements BaseModel
{
    /** @use SdkModel<MediaBridgeRegisterAppNameParamsShape> */
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
     * `new MediaBridgeRegisterAppNameParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * MediaBridgeRegisterAppNameParams::with(updatedAt: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new MediaBridgeRegisterAppNameParams)->withUpdatedAt(...)
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
