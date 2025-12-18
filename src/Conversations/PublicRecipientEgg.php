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
 * @phpstan-type PublicRecipientEggShape = array{
 *   deliveryIdentifiers: list<PublicDeliveryIdentifierShape>,
 *   actorID?: string|null,
 *   deliveryIdentifier?: null|PublicDeliveryIdentifier|PublicDeliveryIdentifierShape,
 *   name?: string|null,
 *   recipientField?: string|null,
 * }
 */
final class PublicRecipientEgg implements BaseModel
{
    /** @use SdkModel<PublicRecipientEggShape> */
    use SdkModel;

    /** @var list<PublicDeliveryIdentifier> $deliveryIdentifiers */
    #[Required(list: PublicDeliveryIdentifier::class)]
    public array $deliveryIdentifiers;

    #[Optional('actorId')]
    public ?string $actorID;

    #[Optional]
    public ?PublicDeliveryIdentifier $deliveryIdentifier;

    #[Optional]
    public ?string $name;

    #[Optional]
    public ?string $recipientField;

    /**
     * `new PublicRecipientEgg()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * PublicRecipientEgg::with(deliveryIdentifiers: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new PublicRecipientEgg)->withDeliveryIdentifiers(...)
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
     * @param list<PublicDeliveryIdentifierShape> $deliveryIdentifiers
     * @param PublicDeliveryIdentifier|PublicDeliveryIdentifierShape|null $deliveryIdentifier
     */
    public static function with(
        array $deliveryIdentifiers,
        ?string $actorID = null,
        PublicDeliveryIdentifier|array|null $deliveryIdentifier = null,
        ?string $name = null,
        ?string $recipientField = null,
    ): self {
        $self = new self;

        $self['deliveryIdentifiers'] = $deliveryIdentifiers;

        null !== $actorID && $self['actorID'] = $actorID;
        null !== $deliveryIdentifier && $self['deliveryIdentifier'] = $deliveryIdentifier;
        null !== $name && $self['name'] = $name;
        null !== $recipientField && $self['recipientField'] = $recipientField;

        return $self;
    }

    /**
     * @param list<PublicDeliveryIdentifierShape> $deliveryIdentifiers
     */
    public function withDeliveryIdentifiers(array $deliveryIdentifiers): self
    {
        $self = clone $this;
        $self['deliveryIdentifiers'] = $deliveryIdentifiers;

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

    public function withRecipientField(string $recipientField): self
    {
        $self = clone $this;
        $self['recipientField'] = $recipientField;

        return $self;
    }
}
