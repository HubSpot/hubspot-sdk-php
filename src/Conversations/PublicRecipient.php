<?php

declare(strict_types=1);

namespace HubspotSDK\Conversations;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type public_recipient = array{
 *   deliveryIdentifier: PublicDeliveryIdentifier,
 *   actorID?: string,
 *   name?: string,
 *   recipientField?: string,
 * }
 */
final class PublicRecipient implements BaseModel
{
    /** @use SdkModel<public_recipient> */
    use SdkModel;

    #[Api]
    public PublicDeliveryIdentifier $deliveryIdentifier;

    #[Api('actorId', optional: true)]
    public ?string $actorID;

    #[Api(optional: true)]
    public ?string $name;

    #[Api(optional: true)]
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
     */
    public static function with(
        PublicDeliveryIdentifier $deliveryIdentifier,
        ?string $actorID = null,
        ?string $name = null,
        ?string $recipientField = null,
    ): self {
        $obj = new self;

        $obj->deliveryIdentifier = $deliveryIdentifier;

        null !== $actorID && $obj->actorID = $actorID;
        null !== $name && $obj->name = $name;
        null !== $recipientField && $obj->recipientField = $recipientField;

        return $obj;
    }

    public function withDeliveryIdentifier(
        PublicDeliveryIdentifier $deliveryIdentifier
    ): self {
        $obj = clone $this;
        $obj->deliveryIdentifier = $deliveryIdentifier;

        return $obj;
    }

    public function withActorID(string $actorID): self
    {
        $obj = clone $this;
        $obj->actorID = $actorID;

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
