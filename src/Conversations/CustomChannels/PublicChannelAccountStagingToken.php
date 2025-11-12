<?php

declare(strict_types=1);

namespace HubspotSDK\Conversations\CustomChannels;

use HubspotSDK\Conversations\PublicDeliveryIdentifier;
use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type PublicChannelAccountStagingTokenShape = array{
 *   accountToken: string,
 *   createdAt: \DateTimeInterface,
 *   genericChannelId: int,
 *   inboxId: int,
 *   userId: int,
 *   accountName?: string|null,
 *   deliveryIdentifier?: PublicDeliveryIdentifier|null,
 * }
 */
final class PublicChannelAccountStagingToken implements BaseModel
{
    /** @use SdkModel<PublicChannelAccountStagingTokenShape> */
    use SdkModel;

    #[Api]
    public string $accountToken;

    #[Api]
    public \DateTimeInterface $createdAt;

    #[Api]
    public int $genericChannelId;

    #[Api]
    public int $inboxId;

    #[Api]
    public int $userId;

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
     *   genericChannelId: ...,
     *   inboxId: ...,
     *   userId: ...,
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
        int $genericChannelId,
        int $inboxId,
        int $userId,
        ?string $accountName = null,
        ?PublicDeliveryIdentifier $deliveryIdentifier = null,
    ): self {
        $obj = new self;

        $obj->accountToken = $accountToken;
        $obj->createdAt = $createdAt;
        $obj->genericChannelId = $genericChannelId;
        $obj->inboxId = $inboxId;
        $obj->userId = $userId;

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
        $obj->genericChannelId = $genericChannelID;

        return $obj;
    }

    public function withInboxID(int $inboxID): self
    {
        $obj = clone $this;
        $obj->inboxId = $inboxID;

        return $obj;
    }

    public function withUserID(int $userID): self
    {
        $obj = clone $this;
        $obj->userId = $userID;

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
