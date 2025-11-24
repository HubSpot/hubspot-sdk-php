<?php

declare(strict_types=1);

namespace HubspotSDK\Conversations\CustomChannels;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type ChannelIntegrationParticipantShape = array{
 *   deliveryIdentifier: PublicDeliveryIdentifier, name?: string|null
 * }
 */
final class ChannelIntegrationParticipant implements BaseModel
{
    /** @use SdkModel<ChannelIntegrationParticipantShape> */
    use SdkModel;

    #[Api]
    public PublicDeliveryIdentifier $deliveryIdentifier;

    #[Api(optional: true)]
    public ?string $name;

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
     */
    public static function with(
        PublicDeliveryIdentifier $deliveryIdentifier,
        ?string $name = null
    ): self {
        $obj = new self;

        $obj->deliveryIdentifier = $deliveryIdentifier;

        null !== $name && $obj->name = $name;

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
}
