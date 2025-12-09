<?php

declare(strict_types=1);

namespace HubspotSDK\Conversations;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type PublicRecipientShape = array{
 *   deliveryIdentifier: PublicDeliveryIdentifier,
 *   actorId?: string|null,
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

    #[Optional]
    public ?string $actorId;

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
     * @param PublicDeliveryIdentifier|array{
     *   type: string, value: string
     * } $deliveryIdentifier
     */
    public static function with(
        PublicDeliveryIdentifier|array $deliveryIdentifier,
        ?string $actorId = null,
        ?string $name = null,
        ?string $recipientField = null,
    ): self {
        $obj = new self;

        $obj['deliveryIdentifier'] = $deliveryIdentifier;

        null !== $actorId && $obj['actorId'] = $actorId;
        null !== $name && $obj['name'] = $name;
        null !== $recipientField && $obj['recipientField'] = $recipientField;

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

    public function withActorID(string $actorID): self
    {
        $obj = clone $this;
        $obj['actorId'] = $actorID;

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
