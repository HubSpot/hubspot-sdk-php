<?php

declare(strict_types=1);

namespace HubspotSDK\Conversations\CustomChannels;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type PublicChannelIntegrationChannelShape = array{
 *   id: string,
 *   capabilities: array<string,mixed>,
 *   createdAt: \DateTimeInterface,
 *   name: string,
 *   channelAccountConnectionRedirectUrl?: string|null,
 *   channelDescription?: string|null,
 *   channelLogoUrl?: string|null,
 *   webhookUrl?: string|null,
 * }
 */
final class PublicChannelIntegrationChannel implements BaseModel
{
    /** @use SdkModel<PublicChannelIntegrationChannelShape> */
    use SdkModel;

    #[Required]
    public string $id;

    /** @var array<string,mixed> $capabilities */
    #[Required(map: 'mixed')]
    public array $capabilities;

    #[Required]
    public \DateTimeInterface $createdAt;

    #[Required]
    public string $name;

    #[Optional]
    public ?string $channelAccountConnectionRedirectUrl;

    #[Optional]
    public ?string $channelDescription;

    #[Optional]
    public ?string $channelLogoUrl;

    #[Optional]
    public ?string $webhookUrl;

    /**
     * `new PublicChannelIntegrationChannel()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * PublicChannelIntegrationChannel::with(
     *   id: ..., capabilities: ..., createdAt: ..., name: ...
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new PublicChannelIntegrationChannel)
     *   ->withID(...)
     *   ->withCapabilities(...)
     *   ->withCreatedAt(...)
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
        string $id,
        array $capabilities,
        \DateTimeInterface $createdAt,
        string $name,
        ?string $channelAccountConnectionRedirectUrl = null,
        ?string $channelDescription = null,
        ?string $channelLogoUrl = null,
        ?string $webhookUrl = null,
    ): self {
        $obj = new self;

        $obj['id'] = $id;
        $obj['capabilities'] = $capabilities;
        $obj['createdAt'] = $createdAt;
        $obj['name'] = $name;

        null !== $channelAccountConnectionRedirectUrl && $obj['channelAccountConnectionRedirectUrl'] = $channelAccountConnectionRedirectUrl;
        null !== $channelDescription && $obj['channelDescription'] = $channelDescription;
        null !== $channelLogoUrl && $obj['channelLogoUrl'] = $channelLogoUrl;
        null !== $webhookUrl && $obj['webhookUrl'] = $webhookUrl;

        return $obj;
    }

    public function withID(string $id): self
    {
        $obj = clone $this;
        $obj['id'] = $id;

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

    public function withCreatedAt(\DateTimeInterface $createdAt): self
    {
        $obj = clone $this;
        $obj['createdAt'] = $createdAt;

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
