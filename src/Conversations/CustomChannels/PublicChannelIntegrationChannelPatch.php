<?php

declare(strict_types=1);

namespace HubspotSDK\Conversations\CustomChannels;

use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type PublicChannelIntegrationChannelPatchShape = array{
 *   capabilities: array<string,mixed>,
 *   channelAccountConnectionRedirectURL: mixed,
 *   channelDescription: mixed,
 *   channelLogoURL: mixed,
 *   name: mixed,
 *   webhookURL: mixed,
 * }
 */
final class PublicChannelIntegrationChannelPatch implements BaseModel
{
    /** @use SdkModel<PublicChannelIntegrationChannelPatchShape> */
    use SdkModel;

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
     * `new PublicChannelIntegrationChannelPatch()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * PublicChannelIntegrationChannelPatch::with(
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
     * (new PublicChannelIntegrationChannelPatch)
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
        $obj = new self;

        $obj['capabilities'] = $capabilities;
        $obj['channelAccountConnectionRedirectURL'] = $channelAccountConnectionRedirectURL;
        $obj['channelDescription'] = $channelDescription;
        $obj['channelLogoURL'] = $channelLogoURL;
        $obj['name'] = $name;
        $obj['webhookURL'] = $webhookURL;

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

    public function withChannelAccountConnectionRedirectURL(
        mixed $channelAccountConnectionRedirectURL
    ): self {
        $obj = clone $this;
        $obj['channelAccountConnectionRedirectURL'] = $channelAccountConnectionRedirectURL;

        return $obj;
    }

    public function withChannelDescription(mixed $channelDescription): self
    {
        $obj = clone $this;
        $obj['channelDescription'] = $channelDescription;

        return $obj;
    }

    public function withChannelLogoURL(mixed $channelLogoURL): self
    {
        $obj = clone $this;
        $obj['channelLogoURL'] = $channelLogoURL;

        return $obj;
    }

    public function withName(mixed $name): self
    {
        $obj = clone $this;
        $obj['name'] = $name;

        return $obj;
    }

    public function withWebhookURL(mixed $webhookURL): self
    {
        $obj = clone $this;
        $obj['webhookURL'] = $webhookURL;

        return $obj;
    }
}
