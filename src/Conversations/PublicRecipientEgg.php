<?php

declare(strict_types=1);

namespace HubspotSDK\Conversations;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type PublicRecipientEggShape = array{
 *   deliveryIdentifiers: list<PublicDeliveryIdentifier>,
 *   actorID?: string|null,
 *   deliveryIdentifier?: PublicDeliveryIdentifier|null,
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
     * @param list<PublicDeliveryIdentifier|array{
     *   type: string, value: string
     * }> $deliveryIdentifiers
     * @param PublicDeliveryIdentifier|array{
     *   type: string, value: string
     * } $deliveryIdentifier
     */
    public static function with(
        array $deliveryIdentifiers,
        ?string $actorID = null,
        PublicDeliveryIdentifier|array|null $deliveryIdentifier = null,
        ?string $name = null,
        ?string $recipientField = null,
    ): self {
        $obj = new self;

        $obj['deliveryIdentifiers'] = $deliveryIdentifiers;

        null !== $actorID && $obj['actorID'] = $actorID;
        null !== $deliveryIdentifier && $obj['deliveryIdentifier'] = $deliveryIdentifier;
        null !== $name && $obj['name'] = $name;
        null !== $recipientField && $obj['recipientField'] = $recipientField;

        return $obj;
    }

    /**
     * @param list<PublicDeliveryIdentifier|array{
     *   type: string, value: string
     * }> $deliveryIdentifiers
     */
    public function withDeliveryIdentifiers(array $deliveryIdentifiers): self
    {
        $obj = clone $this;
        $obj['deliveryIdentifiers'] = $deliveryIdentifiers;

        return $obj;
    }

    public function withActorID(string $actorID): self
    {
        $obj = clone $this;
        $obj['actorID'] = $actorID;

        return $obj;
    }

    /**
     * @param PublicDeliveryIdentifier|array{
     *   type: string, value: string
     * } $deliveryIdentifier
     */
    public function withDeliveryIdentifier(
        PublicDeliveryIdentifier|array $deliveryIdentifier
    ): self {
        $obj = clone $this;
        $obj['deliveryIdentifier'] = $deliveryIdentifier;

        return $obj;
    }

    public function withName(string $name): self
    {
        $obj = clone $this;
        $obj['name'] = $name;

        return $obj;
    }

    public function withRecipientField(string $recipientField): self
    {
        $obj = clone $this;
        $obj['recipientField'] = $recipientField;

        return $obj;
    }
}
