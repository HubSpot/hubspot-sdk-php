<?php

declare(strict_types=1);

namespace HubspotSDK\Conversations\CustomChannels;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type public_channel_integration_channel_create = array{
 *   capabilities: array<string, mixed>,
 *   name: string,
 *   channelAccountConnectionRedirectURL?: string,
 *   channelDescription?: string,
 *   channelLogoURL?: string,
 *   webhookURL?: string,
 * }
 */
final class PublicChannelIntegrationChannelCreate implements BaseModel
{
    /** @use SdkModel<public_channel_integration_channel_create> */
    use SdkModel;

    /** @var array<string, mixed> $capabilities */
    #[Api(map: 'mixed')]
    public array $capabilities;

    #[Api]
    public string $name;

    #[Api('channelAccountConnectionRedirectUrl', optional: true)]
    public ?string $channelAccountConnectionRedirectURL;

    #[Api(optional: true)]
    public ?string $channelDescription;

    #[Api('channelLogoUrl', optional: true)]
    public ?string $channelLogoURL;

    #[Api('webhookUrl', optional: true)]
    public ?string $webhookURL;

    /**
     * `new PublicChannelIntegrationChannelCreate()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * PublicChannelIntegrationChannelCreate::with(capabilities: ..., name: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new PublicChannelIntegrationChannelCreate)
     *   ->withCapabilities(...)
     *   ->withName(...)
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
     * @param array<string, mixed> $capabilities
     */
    public static function with(
        array $capabilities,
        string $name,
        ?string $channelAccountConnectionRedirectURL = null,
        ?string $channelDescription = null,
        ?string $channelLogoURL = null,
        ?string $webhookURL = null,
    ): self {
        $obj = new self;

        $obj->capabilities = $capabilities;
        $obj->name = $name;

        null !== $channelAccountConnectionRedirectURL && $obj->channelAccountConnectionRedirectURL = $channelAccountConnectionRedirectURL;
        null !== $channelDescription && $obj->channelDescription = $channelDescription;
        null !== $channelLogoURL && $obj->channelLogoURL = $channelLogoURL;
        null !== $webhookURL && $obj->webhookURL = $webhookURL;

        return $obj;
    }

    /**
     * @param array<string, mixed> $capabilities
     */
    public function withCapabilities(array $capabilities): self
    {
        $obj = clone $this;
        $obj->capabilities = $capabilities;

        return $obj;
    }

    public function withName(string $name): self
    {
        $obj = clone $this;
        $obj->name = $name;

        return $obj;
    }

    public function withChannelAccountConnectionRedirectURL(
        string $channelAccountConnectionRedirectURL
    ): self {
        $obj = clone $this;
        $obj->channelAccountConnectionRedirectURL = $channelAccountConnectionRedirectURL;

        return $obj;
    }

    public function withChannelDescription(string $channelDescription): self
    {
        $obj = clone $this;
        $obj->channelDescription = $channelDescription;

        return $obj;
    }

    public function withChannelLogoURL(string $channelLogoURL): self
    {
        $obj = clone $this;
        $obj->channelLogoURL = $channelLogoURL;

        return $obj;
    }

    public function withWebhookURL(string $webhookURL): self
    {
        $obj = clone $this;
        $obj->webhookURL = $webhookURL;

        return $obj;
    }
}
