<?php

declare(strict_types=1);

namespace HubspotSDK\Conversations;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type PublicChannelAccountShape = array{
 *   id: string,
 *   active: bool,
 *   archived: bool,
 *   authorized: bool,
 *   channelId: string,
 *   createdAt: \DateTimeInterface,
 *   inboxId: string,
 *   name: string,
 *   archivedAt?: \DateTimeInterface|null,
 *   deliveryIdentifier?: PublicDeliveryIdentifier|null,
 * }
 */
final class PublicChannelAccount implements BaseModel
{
    /** @use SdkModel<PublicChannelAccountShape> */
    use SdkModel;

    #[Required]
    public string $id;

    #[Required]
    public bool $active;

    #[Required]
    public bool $archived;

    #[Required]
    public bool $authorized;

    #[Required]
    public string $channelId;

    #[Required]
    public \DateTimeInterface $createdAt;

    #[Required]
    public string $inboxId;

    #[Required]
    public string $name;

    #[Optional]
    public ?\DateTimeInterface $archivedAt;

    #[Optional]
    public ?PublicDeliveryIdentifier $deliveryIdentifier;

    /**
     * `new PublicChannelAccount()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * PublicChannelAccount::with(
     *   id: ...,
     *   active: ...,
     *   archived: ...,
     *   authorized: ...,
     *   channelId: ...,
     *   createdAt: ...,
     *   inboxId: ...,
     *   name: ...,
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new PublicChannelAccount)
     *   ->withID(...)
     *   ->withActive(...)
     *   ->withArchived(...)
     *   ->withAuthorized(...)
     *   ->withChannelID(...)
     *   ->withCreatedAt(...)
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
        string $id,
        bool $active,
        bool $archived,
        bool $authorized,
        string $channelId,
        \DateTimeInterface $createdAt,
        string $inboxId,
        string $name,
        ?\DateTimeInterface $archivedAt = null,
        PublicDeliveryIdentifier|array|null $deliveryIdentifier = null,
    ): self {
        $obj = new self;

        $obj['id'] = $id;
        $obj['active'] = $active;
        $obj['archived'] = $archived;
        $obj['authorized'] = $authorized;
        $obj['channelId'] = $channelId;
        $obj['createdAt'] = $createdAt;
        $obj['inboxId'] = $inboxId;
        $obj['name'] = $name;

        null !== $archivedAt && $obj['archivedAt'] = $archivedAt;
        null !== $deliveryIdentifier && $obj['deliveryIdentifier'] = $deliveryIdentifier;

        return $obj;
    }

    public function withID(string $id): self
    {
        $obj = clone $this;
        $obj['id'] = $id;

        return $obj;
    }

    public function withActive(bool $active): self
    {
        $obj = clone $this;
        $obj['active'] = $active;

        return $obj;
    }

    public function withArchived(bool $archived): self
    {
        $obj = clone $this;
        $obj['archived'] = $archived;

        return $obj;
    }

    public function withAuthorized(bool $authorized): self
    {
        $obj = clone $this;
        $obj['authorized'] = $authorized;

        return $obj;
    }

    public function withChannelID(string $channelID): self
    {
        $obj = clone $this;
        $obj['channelId'] = $channelID;

        return $obj;
    }

    public function withCreatedAt(\DateTimeInterface $createdAt): self
    {
        $obj = clone $this;
        $obj['createdAt'] = $createdAt;

        return $obj;
    }

    public function withInboxID(string $inboxID): self
    {
        $obj = clone $this;
        $obj['inboxId'] = $inboxID;

        return $obj;
    }

    public function withName(string $name): self
    {
        $obj = clone $this;
        $obj['name'] = $name;

        return $obj;
    }

    public function withArchivedAt(\DateTimeInterface $archivedAt): self
    {
        $obj = clone $this;
        $obj['archivedAt'] = $archivedAt;

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
