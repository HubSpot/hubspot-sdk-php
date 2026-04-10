<?php

declare(strict_types=1);

namespace HubSpotSDK\Conversations\CustomChannels;

use HubSpotSDK\Core\Attributes\Required;
use HubSpotSDK\Core\Concerns\SdkModel;
use HubSpotSDK\Core\Concerns\SdkParams;
use HubSpotSDK\Core\Contracts\BaseModel;

/**
 * Update the capabilities for an existing. You can also use it to update the channel's webhookUri and its channelAccountConnectionRedirectUrl.
 *
 * @see HubSpotSDK\Services\Conversations\CustomChannelsService::update()
 *
 * @phpstan-type CustomChannelUpdateParamsShape = array{
 *   capabilities: array<string,mixed>,
 *   channelAccountConnectionRedirectURL: mixed,
 *   channelDescription: mixed,
 *   channelLogoURL: mixed,
 *   name: mixed,
 *   webhookURL: mixed,
 * }
 */
final class CustomChannelUpdateParams implements BaseModel
{
    /** @use SdkModel<CustomChannelUpdateParamsShape> */
    use SdkModel;
    use SdkParams;

    /** @var array<string,mixed> $capabilities */
    #[Required(map: 'mixed')]
    public array $capabilities;

    #[Required('channelAccountConnectionRedirectUrl')]
    public mixed $channelAccountConnectionRedirectURL;

    #[Required]
    public mixed $channelDescription;

    #[Required('channelLogoUrl')]
    public mixed $channelLogoURL;

    #[Required]
    public mixed $name;

    #[Required('webhookUrl')]
    public mixed $webhookURL;

    /**
     * `new CustomChannelUpdateParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * CustomChannelUpdateParams::with(
     *   capabilities: ...,
     *   channelAccountConnectionRedirectURL: ...,
     *   channelDescription: ...,
     *   channelLogoURL: ...,
     *   name: ...,
     *   webhookURL: ...,
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new CustomChannelUpdateParams)
     *   ->withCapabilities(...)
     *   ->withChannelAccountConnectionRedirectURL(...)
     *   ->withChannelDescription(...)
     *   ->withChannelLogoURL(...)
     *   ->withName(...)
     *   ->withWebhookURL(...)
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
        mixed $channelAccountConnectionRedirectURL,
        mixed $channelDescription,
        mixed $channelLogoURL,
        mixed $name,
        mixed $webhookURL,
    ): self {
        $self = new self;

        $self['capabilities'] = $capabilities;
        $self['channelAccountConnectionRedirectURL'] = $channelAccountConnectionRedirectURL;
        $self['channelDescription'] = $channelDescription;
        $self['channelLogoURL'] = $channelLogoURL;
        $self['name'] = $name;
        $self['webhookURL'] = $webhookURL;

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

    public function withChannelAccountConnectionRedirectURL(
        mixed $channelAccountConnectionRedirectURL
    ): self {
        $self = clone $this;
        $self['channelAccountConnectionRedirectURL'] = $channelAccountConnectionRedirectURL;

        return $self;
    }

    public function withChannelDescription(mixed $channelDescription): self
    {
        $self = clone $this;
        $self['channelDescription'] = $channelDescription;

        return $self;
    }

    public function withChannelLogoURL(mixed $channelLogoURL): self
    {
        $self = clone $this;
        $self['channelLogoURL'] = $channelLogoURL;

        return $self;
    }

    public function withName(mixed $name): self
    {
        $self = clone $this;
        $self['name'] = $name;

        return $self;
    }

    public function withWebhookURL(mixed $webhookURL): self
    {
        $self = clone $this;
        $self['webhookURL'] = $webhookURL;

        return $self;
    }
}
