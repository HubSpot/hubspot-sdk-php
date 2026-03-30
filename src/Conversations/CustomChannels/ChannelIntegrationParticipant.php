<?php

declare(strict_types=1);

namespace HubspotSDK\Conversations\CustomChannels;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type PublicDeliveryIdentifierShape from \HubspotSDK\Conversations\CustomChannels\PublicDeliveryIdentifier
 *
 * @phpstan-type ChannelIntegrationParticipantShape = array{
 *   deliveryIdentifier: PublicDeliveryIdentifier|PublicDeliveryIdentifierShape,
 *   name?: string|null,
 *   senderActorID?: string|null,
 * }
 */
final class ChannelIntegrationParticipant implements BaseModel
{
    /** @use SdkModel<ChannelIntegrationParticipantShape> */
    use SdkModel;

    #[Required]
    public PublicDeliveryIdentifier $deliveryIdentifier;

    #[Optional]
    public ?string $name;

    #[Optional('senderActorId')]
    public ?string $senderActorID;

    /**
     * `new ChannelIntegrationParticipant()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * ChannelIntegrationParticipant::with(deliveryIdentifier: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new ChannelIntegrationParticipant)->withDeliveryIdentifier(...)
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
     * @param PublicDeliveryIdentifier|PublicDeliveryIdentifierShape $deliveryIdentifier
     */
    public static function with(
        PublicDeliveryIdentifier|array $deliveryIdentifier,
        ?string $name = null,
        ?string $senderActorID = null,
    ): self {
        $self = new self;

        $self['deliveryIdentifier'] = $deliveryIdentifier;

        null !== $name && $self['name'] = $name;
        null !== $senderActorID && $self['senderActorID'] = $senderActorID;

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

    public function withName(string $name): self
    {
        $self = clone $this;
        $self['name'] = $name;

        return $self;
    }

    public function withSenderActorID(string $senderActorID): self
    {
        $self = clone $this;
        $self['senderActorID'] = $senderActorID;

        return $self;
    }
}
