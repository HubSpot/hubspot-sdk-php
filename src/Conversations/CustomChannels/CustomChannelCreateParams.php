<?php

declare(strict_types=1);

namespace HubspotSDK\Conversations\CustomChannels;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * Register a new channel along with its capabilities and the webhook url that will be used to receive messages published over the channel.
 *
 * @see HubspotSDK\Services\Conversations\CustomChannelsService::create()
 *
 * @phpstan-type CustomChannelCreateParamsShape = array{
 *   capabilities: array<string,mixed>,
 *   name: string,
 *   channelAccountConnectionRedirectURL?: string,
 *   channelDescription?: string,
 *   channelLogoURL?: string,
 *   webhookURL?: string,
 * }
 */
final class CustomChannelCreateParams implements BaseModel
{
    /** @use SdkModel<CustomChannelCreateParamsShape> */
    use SdkModel;
    use SdkParams;

    /** @var array<string,mixed> $capabilities */
    #[Required(map: 'mixed')]
    public array $capabilities;

    #[Required]
    public string $name;

    #[Optional('channelAccountConnectionRedirectUrl')]
    public ?string $channelAccountConnectionRedirectURL;

    #[Optional]
    public ?string $channelDescription;

    #[Optional('channelLogoUrl')]
    public ?string $channelLogoURL;

    #[Optional('webhookUrl')]
    public ?string $webhookURL;

    /**
     * `new CustomChannelCreateParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * CustomChannelCreateParams::with(capabilities: ..., name: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new CustomChannelCreateParams)->withCapabilities(...)->withName(...)
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
        ?string $channelAccountConnectionRedirectURL = null,
        ?string $channelDescription = null,
        ?string $channelLogoURL = null,
        ?string $webhookURL = null,
    ): self {
        $obj = new self;

        $obj['capabilities'] = $capabilities;
        $obj['name'] = $name;

        null !== $channelAccountConnectionRedirectURL && $obj['channelAccountConnectionRedirectURL'] = $channelAccountConnectionRedirectURL;
        null !== $channelDescription && $obj['channelDescription'] = $channelDescription;
        null !== $channelLogoURL && $obj['channelLogoURL'] = $channelLogoURL;
        null !== $webhookURL && $obj['webhookURL'] = $webhookURL;

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
        $obj['channelAccountConnectionRedirectURL'] = $channelAccountConnectionRedirectURL;

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
        $obj['channelLogoURL'] = $channelLogoURL;

        return $obj;
    }

    public function withWebhookURL(string $webhookURL): self
    {
        $obj = clone $this;
        $obj['webhookURL'] = $webhookURL;

        return $obj;
    }
}
