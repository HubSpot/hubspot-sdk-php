<?php

declare(strict_types=1);

namespace HubspotSDK\Conversations\CustomChannels;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @see HubspotSDK\Services\Conversations\CustomChannelsService::create()
 *
 * @phpstan-type CustomChannelCreateParamsShape = array{
 *   capabilities: array<string,mixed>,
 *   name: string,
 *   channelAccountConnectionRedirectURL?: string|null,
 *   channelDescription?: string|null,
 *   channelLogoURL?: string|null,
 *   webhookURL?: string|null,
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
        $self = new self;

        $self['capabilities'] = $capabilities;
        $self['name'] = $name;

        null !== $channelAccountConnectionRedirectURL && $self['channelAccountConnectionRedirectURL'] = $channelAccountConnectionRedirectURL;
        null !== $channelDescription && $self['channelDescription'] = $channelDescription;
        null !== $channelLogoURL && $self['channelLogoURL'] = $channelLogoURL;
        null !== $webhookURL && $self['webhookURL'] = $webhookURL;

        return $self;
    }

    /**
     * @param array<string,mixed> $capabilities
     */
    public function withCapabilities(array $capabilities): self
    {
        $self = clone $this;
        $self['capabilities'] = $capabilities;

        return $self;
    }

    public function withName(string $name): self
    {
        $self = clone $this;
        $self['name'] = $name;

        return $self;
    }

    public function withChannelAccountConnectionRedirectURL(
        string $channelAccountConnectionRedirectURL
    ): self {
        $self = clone $this;
        $self['channelAccountConnectionRedirectURL'] = $channelAccountConnectionRedirectURL;

        return $self;
    }

    public function withChannelDescription(string $channelDescription): self
    {
        $self = clone $this;
        $self['channelDescription'] = $channelDescription;

        return $self;
    }

    public function withChannelLogoURL(string $channelLogoURL): self
    {
        $self = clone $this;
        $self['channelLogoURL'] = $channelLogoURL;

        return $self;
    }

    public function withWebhookURL(string $webhookURL): self
    {
        $self = clone $this;
        $self['webhookURL'] = $webhookURL;

        return $self;
    }
}
