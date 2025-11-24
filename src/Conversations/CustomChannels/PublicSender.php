<?php

declare(strict_types=1);

namespace HubspotSDK\Conversations\CustomChannels;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type PublicSenderShape = array{
 *   actorId?: string|null,
 *   deliveryIdentifier?: PublicDeliveryIdentifier|null,
 *   name?: string|null,
 *   senderField?: string|null,
 * }
 */
final class PublicSender implements BaseModel
{
    /** @use SdkModel<PublicSenderShape> */
    use SdkModel;

    #[Api(optional: true)]
    public ?string $actorId;

    #[Api(optional: true)]
    public ?PublicDeliveryIdentifier $deliveryIdentifier;

    #[Api(optional: true)]
    public ?string $name;

    #[Api(optional: true)]
    public ?string $senderField;

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
        ?string $actorId = null,
        ?PublicDeliveryIdentifier $deliveryIdentifier = null,
        ?string $name = null,
        ?string $senderField = null,
    ): self {
        $obj = new self;

        null !== $actorId && $obj->actorId = $actorId;
        null !== $deliveryIdentifier && $obj->deliveryIdentifier = $deliveryIdentifier;
        null !== $name && $obj->name = $name;
        null !== $senderField && $obj->senderField = $senderField;

        return $obj;
    }

    public function withActorID(string $actorID): self
    {
        $obj = clone $this;
        $obj->actorId = $actorID;

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

    public function withSenderField(string $senderField): self
    {
        $obj = clone $this;
        $obj->senderField = $senderField;

        return $obj;
    }
}
