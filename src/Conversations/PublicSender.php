<?php

declare(strict_types=1);

namespace HubspotSDK\Conversations;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type PublicSenderShape = array{
 *   actorID?: string|null,
 *   deliveryIdentifier?: PublicDeliveryIdentifier|null,
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
     * @param PublicDeliveryIdentifier|array{
     *   type: string, value: string
     * } $deliveryIdentifier
     */
    public static function with(
        ?string $actorID = null,
        PublicDeliveryIdentifier|array|null $deliveryIdentifier = null,
        ?string $name = null,
        ?string $senderField = null,
    ): self {
        $obj = new self;

        null !== $actorID && $obj['actorID'] = $actorID;
        null !== $deliveryIdentifier && $obj['deliveryIdentifier'] = $deliveryIdentifier;
        null !== $name && $obj['name'] = $name;
        null !== $senderField && $obj['senderField'] = $senderField;

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

    public function withSenderField(string $senderField): self
    {
        $obj = clone $this;
        $obj['senderField'] = $senderField;

        return $obj;
    }
}
