<?php

declare(strict_types=1);

namespace HubSpotSDK\Conversations\CustomChannels\ChannelAccounts;

use HubSpotSDK\Conversations\CustomChannels\PublicDeliveryIdentifier;
use HubSpotSDK\Core\Attributes\Optional;
use HubSpotSDK\Core\Attributes\Required;
use HubSpotSDK\Core\Concerns\SdkModel;
use HubSpotSDK\Core\Concerns\SdkParams;
use HubSpotSDK\Core\Contracts\BaseModel;

/**
 * Create a new account for a channel. Multiple accounts can communicate over a single channel using different delivery identifiers.
 *
 * @see HubSpotSDK\Services\Conversations\CustomChannels\ChannelAccountsService::create()
 *
 * @phpstan-import-type PublicDeliveryIdentifierShape from \HubSpotSDK\Conversations\CustomChannels\PublicDeliveryIdentifier
 *
 * @phpstan-type ChannelAccountCreateParamsShape = array{
 *   authorized: bool,
 *   inboxID: string,
 *   name: string,
 *   deliveryIdentifier?: null|PublicDeliveryIdentifier|PublicDeliveryIdentifierShape,
 * }
 */
final class ChannelAccountCreateParams implements BaseModel
{
    /** @use SdkModel<ChannelAccountCreateParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Required]
    public bool $authorized;

    #[Required('inboxId')]
    public string $inboxID;

    #[Required]
    public string $name;

    #[Optional]
    public ?PublicDeliveryIdentifier $deliveryIdentifier;

    /**
     * `new ChannelAccountCreateParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * ChannelAccountCreateParams::with(authorized: ..., inboxID: ..., name: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new ChannelAccountCreateParams)
     *   ->withAuthorized(...)
     *   ->withInboxID(...)
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
     * @param PublicDeliveryIdentifier|PublicDeliveryIdentifierShape|null $deliveryIdentifier
     */
    public static function with(
        bool $authorized,
        string $inboxID,
        string $name,
        PublicDeliveryIdentifier|array|null $deliveryIdentifier = null,
    ): self {
        $self = new self;

        $self['authorized'] = $authorized;
        $self['inboxID'] = $inboxID;
        $self['name'] = $name;

        null !== $deliveryIdentifier && $self['deliveryIdentifier'] = $deliveryIdentifier;

        return $self;
    }

    public function withAuthorized(bool $authorized): self
    {
        $self = clone $this;
        $self['authorized'] = $authorized;

        return $self;
    }

    public function withInboxID(string $inboxID): self
    {
        $self = clone $this;
        $self['inboxID'] = $inboxID;

        return $self;
    }

    public function withName(string $name): self
    {
        $self = clone $this;
        $self['name'] = $name;

        return $self;
    }

    /**
     * @param PublicDeliveryIdentifier|PublicDeliveryIdentifierShape $deliveryIdentifier
     */
    public function withDeliveryIdentifier(
        PublicDeliveryIdentifier|array $deliveryIdentifier
    ): self {
        $self = clone $this;
        $self['deliveryIdentifier'] = $deliveryIdentifier;

        return $self;
    }
}
