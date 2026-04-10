<?php

declare(strict_types=1);

namespace HubSpotSDK\Conversations\CustomChannels;

use HubSpotSDK\Core\Attributes\Optional;
use HubSpotSDK\Core\Concerns\SdkModel;
use HubSpotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type PublicDeliveryIdentifierShape from \HubSpotSDK\Conversations\CustomChannels\PublicDeliveryIdentifier
 *
 * @phpstan-type PublicSenderShape = array{
 *   actorID?: string|null,
 *   deliveryIdentifier?: null|PublicDeliveryIdentifier|PublicDeliveryIdentifierShape,
 *   name?: string|null,
 *   senderField?: string|null,
 * }
 */
final class PublicSender implements BaseModel
{
    /** @use SdkModel<PublicSenderShape> */
    use SdkModel;

    #[Optional('actorId')]
    public ?string $actorID;

    #[Optional]
    public ?PublicDeliveryIdentifier $deliveryIdentifier;

    #[Optional]
    public ?string $name;

    #[Optional]
    public ?string $senderField;

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
        ?string $actorID = null,
        PublicDeliveryIdentifier|array|null $deliveryIdentifier = null,
        ?string $name = null,
        ?string $senderField = null,
    ): self {
        $self = new self;

        null !== $actorID && $self['actorID'] = $actorID;
        null !== $deliveryIdentifier && $self['deliveryIdentifier'] = $deliveryIdentifier;
        null !== $name && $self['name'] = $name;
        null !== $senderField && $self['senderField'] = $senderField;

        return $self;
    }

    public function withActorID(string $actorID): self
    {
        $self = clone $this;
        $self['actorID'] = $actorID;

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

    public function withSenderField(string $senderField): self
    {
        $self = clone $this;
        $self['senderField'] = $senderField;

        return $self;
    }
}
