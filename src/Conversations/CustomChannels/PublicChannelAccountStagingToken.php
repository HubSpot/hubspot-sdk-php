<?php

declare(strict_types=1);

namespace HubspotSDK\Conversations\CustomChannels;

use HubspotSDK\Conversations\PublicDeliveryIdentifier;
use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type public_channel_account_staging_token = array{
 *   accountToken: string,
 *   createdAt: \DateTimeInterface,
 *   genericChannelID: int,
 *   inboxID: int,
 *   userID: int,
 *   accountName?: string,
 *   deliveryIdentifier?: PublicDeliveryIdentifier,
 * }
 */
final class PublicChannelAccountStagingToken implements BaseModel
{
    /** @use SdkModel<public_channel_account_staging_token> */
    use SdkModel;

    #[Api]
    public string $accountToken;

    #[Api]
    public \DateTimeInterface $createdAt;

    #[Api('genericChannelId')]
    public int $genericChannelID;

    #[Api('inboxId')]
    public int $inboxID;

    #[Api('userId')]
    public int $userID;

    #[Api(optional: true)]
    public ?string $accountName;

    #[Api(optional: true)]
    public ?PublicDeliveryIdentifier $deliveryIdentifier;

    /**
     * `new PublicChannelAccountStagingToken()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * PublicChannelAccountStagingToken::with(
     *   accountToken: ...,
     *   createdAt: ...,
     *   genericChannelID: ...,
     *   inboxID: ...,
     *   userID: ...,
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new PublicChannelAccountStagingToken)
     *   ->withAccountToken(...)
     *   ->withCreatedAt(...)
     *   ->withGenericChannelID(...)
     *   ->withInboxID(...)
     *   ->withUserID(...)
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
        string $accountToken,
        \DateTimeInterface $createdAt,
        int $genericChannelID,
        int $inboxID,
        int $userID,
        ?string $accountName = null,
        ?PublicDeliveryIdentifier $deliveryIdentifier = null,
    ): self {
        $obj = new self;

        $obj->accountToken = $accountToken;
        $obj->createdAt = $createdAt;
        $obj->genericChannelID = $genericChannelID;
        $obj->inboxID = $inboxID;
        $obj->userID = $userID;

        null !== $accountName && $obj->accountName = $accountName;
        null !== $deliveryIdentifier && $obj->deliveryIdentifier = $deliveryIdentifier;

        return $obj;
    }

    public function withAccountToken(string $accountToken): self
    {
        $obj = clone $this;
        $obj->accountToken = $accountToken;

        return $obj;
    }

    public function withCreatedAt(\DateTimeInterface $createdAt): self
    {
        $obj = clone $this;
        $obj->createdAt = $createdAt;

        return $obj;
    }

    public function withGenericChannelID(int $genericChannelID): self
    {
        $obj = clone $this;
        $obj->genericChannelID = $genericChannelID;

        return $obj;
    }

    public function withInboxID(int $inboxID): self
    {
        $obj = clone $this;
        $obj->inboxID = $inboxID;

        return $obj;
    }

    public function withUserID(int $userID): self
    {
        $obj = clone $this;
        $obj->userID = $userID;

        return $obj;
    }

    public function withAccountName(string $accountName): self
    {
        $obj = clone $this;
        $obj->accountName = $accountName;

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
