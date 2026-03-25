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
 *   channelAccountConnectionRedirectURL?: string|null,
 *   channelDescription?: string|null,
 *   channelLogoURL?: string|null,
 *   webhookURL?: string|null,
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

    #[Optional('channelAccountConnectionRedirectUrl')]
    public ?string $channelAccountConnectionRedirectURL;

    #[Optional]
    public ?string $channelDescription;

    #[Optional('channelLogoUrl')]
    public ?string $channelLogoURL;

    #[Optional('webhookUrl')]
    public ?string $webhookURL;

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
        ?string $channelAccountConnectionRedirectURL = null,
        ?string $channelDescription = null,
        ?string $channelLogoURL = null,
        ?string $webhookURL = null,
    ): self {
        $self = new self;

        $self['id'] = $id;
        $self['capabilities'] = $capabilities;
        $self['createdAt'] = $createdAt;
        $self['name'] = $name;

        null !== $channelAccountConnectionRedirectURL && $self['channelAccountConnectionRedirectURL'] = $channelAccountConnectionRedirectURL;
        null !== $channelDescription && $self['channelDescription'] = $channelDescription;
        null !== $channelLogoURL && $self['channelLogoURL'] = $channelLogoURL;
        null !== $webhookURL && $self['webhookURL'] = $webhookURL;

        return $self;
    }

    public function withID(string $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

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

    public function withCreatedAt(\DateTimeInterface $createdAt): self
    {
        $self = clone $this;
        $self['createdAt'] = $createdAt;

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
