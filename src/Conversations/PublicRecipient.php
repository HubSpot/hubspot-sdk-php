<?php

declare(strict_types=1);

namespace HubspotSDK\Conversations;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type PublicDeliveryIdentifierShape from \HubspotSDK\Conversations\PublicDeliveryIdentifier
 *
 * @phpstan-type PublicRecipientShape = array{
 *   deliveryIdentifier: PublicDeliveryIdentifier|PublicDeliveryIdentifierShape,
 *   actorID?: string|null,
 *   name?: string|null,
 *   recipientField?: string|null,
 * }
 */
final class PublicRecipient implements BaseModel
{
    /** @use SdkModel<PublicRecipientShape> */
    use SdkModel;

    #[Required]
    public PublicDeliveryIdentifier $deliveryIdentifier;

    #[Optional('actorId')]
    public ?string $actorID;

    #[Optional]
    public ?string $name;

    #[Optional]
    public ?string $recipientField;

    /**
     * `new PublicRecipient()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * PublicRecipient::with(deliveryIdentifier: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new PublicRecipient)->withDeliveryIdentifier(...)
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
        ?string $actorID = null,
        ?string $name = null,
        ?string $recipientField = null,
    ): self {
        $self = new self;

        $self['deliveryIdentifier'] = $deliveryIdentifier;

        null !== $actorID && $self['actorID'] = $actorID;
        null !== $name && $self['name'] = $name;
        null !== $recipientField && $self['recipientField'] = $recipientField;

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

    public function withActorID(string $actorID): self
    {
        $self = clone $this;
        $self['actorID'] = $actorID;

        return $self;
    }

    public function withName(string $name): self
    {
        $self = clone $this;
        $self['name'] = $name;

        return $self;
    }

    public function withRecipientField(string $recipientField): self
    {
        $self = clone $this;
        $self['recipientField'] = $recipientField;

        return $self;
    }
}
