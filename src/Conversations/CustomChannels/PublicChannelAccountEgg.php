<?php

declare(strict_types=1);

namespace HubspotSDK\Conversations\CustomChannels;

use HubspotSDK\Conversations\PublicDeliveryIdentifier;
use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type PublicChannelAccountEggShape = array{
 *   authorized: bool,
 *   inboxID: string,
 *   name: string,
 *   deliveryIdentifier?: PublicDeliveryIdentifier|null,
 * }
 */
final class PublicChannelAccountEgg implements BaseModel
{
    /** @use SdkModel<PublicChannelAccountEggShape> */
    use SdkModel;

    #[Required]
    public bool $authorized;

    #[Required('inboxId')]
    public string $inboxID;

    #[Required]
    public string $name;

    #[Optional]
    public ?PublicDeliveryIdentifier $deliveryIdentifier;

    /**
     * `new PublicChannelAccountEgg()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * PublicChannelAccountEgg::with(authorized: ..., inboxID: ..., name: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new PublicChannelAccountEgg)
     *   ->withAuthorized(...)
     *   ->withInboxID(...)
     *   ->withName(...)
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
        bool $authorized,
        string $inboxID,
        string $name,
        PublicDeliveryIdentifier|array|null $deliveryIdentifier = null,
    ): self {
        $obj = new self;

        $obj['authorized'] = $authorized;
        $obj['inboxID'] = $inboxID;
        $obj['name'] = $name;

        null !== $deliveryIdentifier && $obj['deliveryIdentifier'] = $deliveryIdentifier;

        return $obj;
    }

    public function withAuthorized(bool $authorized): self
    {
        $obj = clone $this;
        $obj['authorized'] = $authorized;

        return $obj;
    }

    public function withInboxID(string $inboxID): self
    {
        $obj = clone $this;
        $obj['inboxID'] = $inboxID;

        return $obj;
    }

    public function withName(string $name): self
    {
        $obj = clone $this;
        $obj['name'] = $name;

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
}
