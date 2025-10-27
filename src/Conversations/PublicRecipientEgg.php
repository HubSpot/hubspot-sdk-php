<?php

declare(strict_types=1);

namespace HubspotSDK\Conversations;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type public_recipient_egg = array{
 *   deliveryIdentifiers: list<PublicDeliveryIdentifier>,
 *   actorID?: string,
 *   deliveryIdentifier?: PublicDeliveryIdentifier,
 *   name?: string,
 *   recipientField?: string,
 * }
 */
final class PublicRecipientEgg implements BaseModel
{
    /** @use SdkModel<public_recipient_egg> */
    use SdkModel;

    /** @var list<PublicDeliveryIdentifier> $deliveryIdentifiers */
    #[Api(list: PublicDeliveryIdentifier::class)]
    public array $deliveryIdentifiers;

    #[Api('actorId', optional: true)]
    public ?string $actorID;

    #[Api(optional: true)]
    public ?PublicDeliveryIdentifier $deliveryIdentifier;

    #[Api(optional: true)]
    public ?string $name;

    #[Api(optional: true)]
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
     * @param list<PublicDeliveryIdentifier> $deliveryIdentifiers
     */
    public static function with(
        array $deliveryIdentifiers,
        ?string $actorID = null,
        ?PublicDeliveryIdentifier $deliveryIdentifier = null,
        ?string $name = null,
        ?string $recipientField = null,
    ): self {
        $obj = new self;

        $obj->deliveryIdentifiers = $deliveryIdentifiers;

        null !== $actorID && $obj->actorID = $actorID;
        null !== $deliveryIdentifier && $obj->deliveryIdentifier = $deliveryIdentifier;
        null !== $name && $obj->name = $name;
        null !== $recipientField && $obj->recipientField = $recipientField;

        return $obj;
    }

    /**
     * @param list<PublicDeliveryIdentifier> $deliveryIdentifiers
     */
    public function withDeliveryIdentifiers(array $deliveryIdentifiers): self
    {
        $obj = clone $this;
        $obj->deliveryIdentifiers = $deliveryIdentifiers;

        return $obj;
    }

    public function withActorID(string $actorID): self
    {
        $obj = clone $this;
        $obj->actorID = $actorID;

        return $obj;
    }

    public function withDeliveryIdentifier(
        PublicDeliveryIdentifier $deliveryIdentifier
    ): self {
        $obj = clone $this;
        $obj->deliveryIdentifier = $deliveryIdentifier;

        return $obj;
    }

    public function withName(string $name): self
    {
        $obj = clone $this;
        $obj->name = $name;

        return $obj;
    }

    public function withRecipientField(string $recipientField): self
    {
        $obj = clone $this;
        $obj->recipientField = $recipientField;

        return $obj;
    }
}
