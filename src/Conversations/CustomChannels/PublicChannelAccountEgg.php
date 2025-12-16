<?php

declare(strict_types=1);

namespace HubspotSDK\Conversations\CustomChannels;

use HubspotSDK\Conversations\PublicDeliveryIdentifier;
use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type PublicDeliveryIdentifierShape from \HubspotSDK\Conversations\PublicDeliveryIdentifier
 *
 * @phpstan-type PublicChannelAccountEggShape = array{
 *   authorized: bool,
 *   inboxID: string,
 *   name: string,
 *   deliveryIdentifier?: null|PublicDeliveryIdentifier|PublicDeliveryIdentifierShape,
 * }
 */
final class PublicChannelAccountEgg implements BaseModel
{
    /** @use SdkModel<PublicChannelAccountEggShape> */
    use SdkModel;

    #[Required]
    public bool $authorized;

    #[Required('inboxId')]
    public string $inboxID;

    #[Required]
    public string $name;

    #[Optional]
    public ?PublicDeliveryIdentifier $deliveryIdentifier;

    /**
     * `new PublicChannelAccountEgg()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * PublicChannelAccountEgg::with(authorized: ..., inboxID: ..., name: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new PublicChannelAccountEgg)
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
     * @param PublicDeliveryIdentifierShape $deliveryIdentifier
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
     * @param PublicDeliveryIdentifierShape $deliveryIdentifier
     */
    public function withDeliveryIdentifier(
        PublicDeliveryIdentifier|array $deliveryIdentifier
    ): self {
        $self = clone $this;
        $self['deliveryIdentifier'] = $deliveryIdentifier;

        return $self;
    }
}
