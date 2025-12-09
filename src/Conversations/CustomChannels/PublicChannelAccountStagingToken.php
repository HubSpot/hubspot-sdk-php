<?php

declare(strict_types=1);

namespace HubspotSDK\Conversations\CustomChannels;

use HubspotSDK\Conversations\PublicDeliveryIdentifier;
use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Attributes\Required;
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

    #[Required]
    public string $accountToken;

    #[Required]
    public \DateTimeInterface $createdAt;

    #[Required]
    public int $genericChannelId;

    #[Required]
    public int $inboxId;

    #[Required]
    public int $userId;

    #[Optional]
    public ?string $accountName;

    #[Optional]
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
     *
     * @param PublicDeliveryIdentifier|array{
     *   type: string, value: string
     * } $deliveryIdentifier
     */
    public static function with(
        string $accountToken,
        \DateTimeInterface $createdAt,
        int $genericChannelId,
        int $inboxId,
        int $userId,
        ?string $accountName = null,
        PublicDeliveryIdentifier|array|null $deliveryIdentifier = null,
    ): self {
        $obj = new self;

        $obj['accountToken'] = $accountToken;
        $obj['createdAt'] = $createdAt;
        $obj['genericChannelId'] = $genericChannelId;
        $obj['inboxId'] = $inboxId;
        $obj['userId'] = $userId;

        null !== $accountName && $obj['accountName'] = $accountName;
        null !== $deliveryIdentifier && $obj['deliveryIdentifier'] = $deliveryIdentifier;

        return $obj;
    }

    public function withAccountToken(string $accountToken): self
    {
        $obj = clone $this;
        $obj['accountToken'] = $accountToken;

        return $obj;
    }

    public function withCreatedAt(\DateTimeInterface $createdAt): self
    {
        $obj = clone $this;
        $obj['createdAt'] = $createdAt;

        return $obj;
    }

    public function withGenericChannelID(int $genericChannelID): self
    {
        $obj = clone $this;
        $obj['genericChannelId'] = $genericChannelID;

        return $obj;
    }

    public function withInboxID(int $inboxID): self
    {
        $obj = clone $this;
        $obj['inboxId'] = $inboxID;

        return $obj;
    }

    public function withUserID(int $userID): self
    {
        $obj = clone $this;
        $obj['userId'] = $userID;

        return $obj;
    }

    public function withAccountName(string $accountName): self
    {
        $obj = clone $this;
        $obj['accountName'] = $accountName;

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
