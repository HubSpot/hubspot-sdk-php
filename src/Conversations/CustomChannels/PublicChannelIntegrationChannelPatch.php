<?php

declare(strict_types=1);

namespace HubspotSDK\Conversations\CustomChannels;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type PublicChannelIntegrationChannelPatchShape = array{
 *   capabilities: array<string,mixed>,
 *   channelDescription: mixed,
 *   channelLogoUrl: mixed,
 *   channelAccountConnectionRedirectUrl?: mixed,
 *   name?: mixed,
 *   webhookUrl?: mixed,
 * }
 */
final class PublicChannelIntegrationChannelPatch implements BaseModel
{
    /** @use SdkModel<PublicChannelIntegrationChannelPatchShape> */
    use SdkModel;

    /** @var array<string,mixed> $capabilities */
    #[Api(map: 'mixed')]
    public array $capabilities;

    #[Api]
    public mixed $channelDescription;

    #[Api]
    public mixed $channelLogoUrl;

    #[Api(optional: true)]
    public mixed $channelAccountConnectionRedirectUrl;

    #[Api(optional: true)]
    public mixed $name;

    #[Api(optional: true)]
    public mixed $webhookUrl;

    /**
     * `new PublicChannelIntegrationChannelPatch()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * PublicChannelIntegrationChannelPatch::with(
     *   capabilities: ..., channelDescription: ..., channelLogoUrl: ...
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new PublicChannelIntegrationChannelPatch)
     *   ->withCapabilities(...)
     *   ->withChannelDescription(...)
     *   ->withChannelLogoURL(...)
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
     * @param array<string,mixed> $capabilities
     */
    public static function with(
        array $capabilities,
        mixed $channelDescription,
        mixed $channelLogoUrl,
        mixed $channelAccountConnectionRedirectUrl = null,
        mixed $name = null,
        mixed $webhookUrl = null,
    ): self {
        $obj = new self;

        $obj->capabilities = $capabilities;
        $obj->channelDescription = $channelDescription;
        $obj->channelLogoUrl = $channelLogoUrl;

        null !== $channelAccountConnectionRedirectUrl && $obj->channelAccountConnectionRedirectUrl = $channelAccountConnectionRedirectUrl;
        null !== $name && $obj->name = $name;
        null !== $webhookUrl && $obj->webhookUrl = $webhookUrl;

        return $obj;
    }

    /**
     * @param array<string,mixed> $capabilities
     */
    public function withCapabilities(array $capabilities): self
    {
        $obj = clone $this;
        $obj->capabilities = $capabilities;

        return $obj;
    }

    public function withChannelDescription(mixed $channelDescription): self
    {
        $obj = clone $this;
        $obj->channelDescription = $channelDescription;

        return $obj;
    }

    public function withChannelLogoURL(mixed $channelLogoURL): self
    {
        $obj = clone $this;
        $obj->channelLogoUrl = $channelLogoURL;

        return $obj;
    }

    public function withChannelAccountConnectionRedirectURL(
        mixed $channelAccountConnectionRedirectURL
    ): self {
        $obj = clone $this;
        $obj->channelAccountConnectionRedirectUrl = $channelAccountConnectionRedirectURL;

        return $obj;
    }

    public function withName(mixed $name): self
    {
        $obj = clone $this;
        $obj->name = $name;

        return $obj;
    }

    public function withWebhookURL(mixed $webhookURL): self
    {
        $obj = clone $this;
        $obj->webhookUrl = $webhookURL;

        return $obj;
    }
}
