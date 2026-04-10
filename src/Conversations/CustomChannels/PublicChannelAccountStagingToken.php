<?php

declare(strict_types=1);

namespace HubSpotSDK\Conversations\CustomChannels;

use HubSpotSDK\Core\Attributes\Optional;
use HubSpotSDK\Core\Attributes\Required;
use HubSpotSDK\Core\Concerns\SdkModel;
use HubSpotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type PublicDeliveryIdentifierShape from \HubSpotSDK\Conversations\CustomChannels\PublicDeliveryIdentifier
 *
 * @phpstan-type PublicChannelAccountStagingTokenShape = array{
 *   accountToken: string,
 *   createdAt: \DateTimeInterface,
 *   genericChannelID: int,
 *   inboxID: int,
 *   userID: int,
 *   accountName?: string|null,
 *   deliveryIdentifier?: null|PublicDeliveryIdentifier|PublicDeliveryIdentifierShape,
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

    #[Required('genericChannelId')]
    public int $genericChannelID;

    #[Required('inboxId')]
    public int $inboxID;

    #[Required('userId')]
    public int $userID;

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
     *
     * @param PublicDeliveryIdentifier|PublicDeliveryIdentifierShape|null $deliveryIdentifier
     */
    public static function with(
        string $accountToken,
        \DateTimeInterface $createdAt,
        int $genericChannelID,
        int $inboxID,
        int $userID,
        ?string $accountName = null,
        PublicDeliveryIdentifier|array|null $deliveryIdentifier = null,
    ): self {
        $self = new self;

        $self['accountToken'] = $accountToken;
        $self['createdAt'] = $createdAt;
        $self['genericChannelID'] = $genericChannelID;
        $self['inboxID'] = $inboxID;
        $self['userID'] = $userID;

        null !== $accountName && $self['accountName'] = $accountName;
        null !== $deliveryIdentifier && $self['deliveryIdentifier'] = $deliveryIdentifier;

        return $self;
    }

    public function withAccountToken(string $accountToken): self
    {
        $self = clone $this;
        $self['accountToken'] = $accountToken;

        return $self;
    }

    public function withCreatedAt(\DateTimeInterface $createdAt): self
    {
        $self = clone $this;
        $self['createdAt'] = $createdAt;

        return $self;
    }

    public function withGenericChannelID(int $genericChannelID): self
    {
        $self = clone $this;
        $self['genericChannelID'] = $genericChannelID;

        return $self;
    }

    public function withInboxID(int $inboxID): self
    {
        $self = clone $this;
        $self['inboxID'] = $inboxID;

        return $self;
    }

    public function withUserID(int $userID): self
    {
        $self = clone $this;
        $self['userID'] = $userID;

        return $self;
    }

    public function withAccountName(string $accountName): self
    {
        $self = clone $this;
        $self['accountName'] = $accountName;

        return $self;
    }

    /**
     * @param PublicDeliveryIdentifier|PublicDeliveryIdentifierShape $deliveryIdentifier
     */
    public function withDeliveryIdentifier(
        PublicDeliveryIdentifier|array $deliveryIdentifier
    ): self {
        $self = clone $this;
        $self['deliveryIdentifier'] = $deliveryIdentifier;

        return $self;
    }
}
