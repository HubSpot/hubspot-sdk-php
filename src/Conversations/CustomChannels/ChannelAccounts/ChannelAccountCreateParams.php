<?php

declare(strict_types=1);

namespace HubspotSDK\Conversations\CustomChannels\ChannelAccounts;

use HubspotSDK\Conversations\PublicDeliveryIdentifier;
use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * Create a new account for a channel. Multiple accounts can communicate over a single channel using different delivery identifiers.
 *
 * @see HubspotSDK\Conversations\CustomChannels\ChannelAccounts->create
 *
 * @phpstan-type channel_account_create_params = array{
 *   authorized: bool,
 *   inboxID: string,
 *   name: string,
 *   deliveryIdentifier?: PublicDeliveryIdentifier,
 * }
 */
final class ChannelAccountCreateParams implements BaseModel
{
    /** @use SdkModel<channel_account_create_params> */
    use SdkModel;
    use SdkParams;

    #[Api]
    public bool $authorized;

    #[Api('inboxId')]
    public string $inboxID;

    #[Api]
    public string $name;

    #[Api(optional: true)]
    public ?PublicDeliveryIdentifier $deliveryIdentifier;

    /**
     * `new ChannelAccountCreateParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * ChannelAccountCreateParams::with(authorized: ..., inboxID: ..., name: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new ChannelAccountCreateParams)
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
     */
    public static function with(
        bool $authorized,
        string $inboxID,
        string $name,
        ?PublicDeliveryIdentifier $deliveryIdentifier = null,
    ): self {
        $obj = new self;

        $obj->authorized = $authorized;
        $obj->inboxID = $inboxID;
        $obj->name = $name;

        null !== $deliveryIdentifier && $obj->deliveryIdentifier = $deliveryIdentifier;

        return $obj;
    }

    public function withAuthorized(bool $authorized): self
    {
        $obj = clone $this;
        $obj->authorized = $authorized;

        return $obj;
    }

    public function withInboxID(string $inboxID): self
    {
        $obj = clone $this;
        $obj->inboxID = $inboxID;

        return $obj;
    }

    public function withName(string $name): self
    {
        $obj = clone $this;
        $obj->name = $name;

        return $obj;
    }

    public function withDeliveryIdentifier(
        PublicDeliveryIdentifier $deliveryIdentifier
    ): self {
        $obj = clone $this;
        $obj->deliveryIdentifier = $deliveryIdentifier;

        return $obj;
    }
}
