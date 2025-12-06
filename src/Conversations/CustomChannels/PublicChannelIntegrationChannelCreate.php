<?php

declare(strict_types=1);

namespace HubspotSDK\Conversations\CustomChannels;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type PublicChannelIntegrationChannelCreateShape = array{
 *   capabilities: array<string,mixed>,
 *   name: string,
 *   channelAccountConnectionRedirectUrl?: string|null,
 *   channelDescription?: string|null,
 *   channelLogoUrl?: string|null,
 *   webhookUrl?: string|null,
 * }
 */
final class PublicChannelIntegrationChannelCreate implements BaseModel
{
    /** @use SdkModel<PublicChannelIntegrationChannelCreateShape> */
    use SdkModel;

    /** @var array<string,mixed> $capabilities */
    #[Api(map: 'mixed')]
    public array $capabilities;

    #[Api]
    public string $name;

    #[Api(optional: true)]
    public ?string $channelAccountConnectionRedirectUrl;

    #[Api(optional: true)]
    public ?string $channelDescription;

    #[Api(optional: true)]
    public ?string $channelLogoUrl;

    #[Api(optional: true)]
    public ?string $webhookUrl;

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
     * @param array<string,mixed> $capabilities
     */
    public static function with(
        array $capabilities,
        string $name,
        ?string $channelAccountConnectionRedirectUrl = null,
        ?string $channelDescription = null,
        ?string $channelLogoUrl = null,
        ?string $webhookUrl = null,
    ): self {
        $obj = new self;

        $obj['capabilities'] = $capabilities;
        $obj['name'] = $name;

        null !== $channelAccountConnectionRedirectUrl && $obj['channelAccountConnectionRedirectUrl'] = $channelAccountConnectionRedirectUrl;
        null !== $channelDescription && $obj['channelDescription'] = $channelDescription;
        null !== $channelLogoUrl && $obj['channelLogoUrl'] = $channelLogoUrl;
        null !== $webhookUrl && $obj['webhookUrl'] = $webhookUrl;

        return $obj;
    }

    /**
     * @param array<string,mixed> $capabilities
     */
    public function withCapabilities(array $capabilities): self
    {
        $obj = clone $this;
        $obj['capabilities'] = $capabilities;

        return $obj;
    }

    public function withName(string $name): self
    {
        $obj = clone $this;
        $obj['name'] = $name;

        return $obj;
    }

    public function withChannelAccountConnectionRedirectURL(
        string $channelAccountConnectionRedirectURL
    ): self {
        $obj = clone $this;
        $obj['channelAccountConnectionRedirectUrl'] = $channelAccountConnectionRedirectURL;

        return $obj;
    }

    public function withChannelDescription(string $channelDescription): self
    {
        $obj = clone $this;
        $obj['channelDescription'] = $channelDescription;

        return $obj;
    }

    public function withChannelLogoURL(string $channelLogoURL): self
    {
        $obj = clone $this;
        $obj['channelLogoUrl'] = $channelLogoURL;

        return $obj;
    }

    public function withWebhookURL(string $webhookURL): self
    {
        $obj = clone $this;
        $obj['webhookUrl'] = $webhookURL;

        return $obj;
    }
}
