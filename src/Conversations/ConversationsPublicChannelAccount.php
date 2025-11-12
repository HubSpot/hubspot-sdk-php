<?php

declare(strict_types=1);

namespace HubspotSDK\Conversations;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type ConversationsPublicChannelAccountShape = array{
 *   archived: bool,
 *   id?: string|null,
 *   active?: bool|null,
 *   archivedAt?: \DateTimeInterface|null,
 *   authorized?: bool|null,
 *   channelId?: string|null,
 *   createdAt?: \DateTimeInterface|null,
 *   deliveryIdentifier?: PublicDeliveryIdentifier|null,
 *   inboxId?: string|null,
 *   name?: string|null,
 * }
 */
final class ConversationsPublicChannelAccount implements BaseModel
{
    /** @use SdkModel<ConversationsPublicChannelAccountShape> */
    use SdkModel;

    #[Api]
    public bool $archived;

    /**
     * The ID of the channel account.
     */
    #[Api(optional: true)]
    public ?string $id;

    /**
     * Whether the channel account is turned on.
     */
    #[Api(optional: true)]
    public ?bool $active;

    #[Api(optional: true)]
    public ?\DateTimeInterface $archivedAt;

    #[Api(optional: true)]
    public ?bool $authorized;

    /**
     * The ID of the channel that the channel account is an instance of.
     */
    #[Api(optional: true)]
    public ?string $channelId;

    #[Api(optional: true)]
    public ?\DateTimeInterface $createdAt;

    #[Api(optional: true)]
    public ?PublicDeliveryIdentifier $deliveryIdentifier;

    /**
     * The ID of the conversations inbox that contains the channel account.
     */
    #[Api(optional: true)]
    public ?string $inboxId;

    /**
     * The name of the channel account.
     */
    #[Api(optional: true)]
    public ?string $name;

    /**
     * `new ConversationsPublicChannelAccount()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * ConversationsPublicChannelAccount::with(archived: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new ConversationsPublicChannelAccount)->withArchived(...)
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
        bool $archived,
        ?string $id = null,
        ?bool $active = null,
        ?\DateTimeInterface $archivedAt = null,
        ?bool $authorized = null,
        ?string $channelId = null,
        ?\DateTimeInterface $createdAt = null,
        ?PublicDeliveryIdentifier $deliveryIdentifier = null,
        ?string $inboxId = null,
        ?string $name = null,
    ): self {
        $obj = new self;

        $obj->archived = $archived;

        null !== $id && $obj->id = $id;
        null !== $active && $obj->active = $active;
        null !== $archivedAt && $obj->archivedAt = $archivedAt;
        null !== $authorized && $obj->authorized = $authorized;
        null !== $channelId && $obj->channelId = $channelId;
        null !== $createdAt && $obj->createdAt = $createdAt;
        null !== $deliveryIdentifier && $obj->deliveryIdentifier = $deliveryIdentifier;
        null !== $inboxId && $obj->inboxId = $inboxId;
        null !== $name && $obj->name = $name;

        return $obj;
    }

    public function withArchived(bool $archived): self
    {
        $obj = clone $this;
        $obj->archived = $archived;

        return $obj;
    }

    /**
     * The ID of the channel account.
     */
    public function withID(string $id): self
    {
        $obj = clone $this;
        $obj->id = $id;

        return $obj;
    }

    /**
     * Whether the channel account is turned on.
     */
    public function withActive(bool $active): self
    {
        $obj = clone $this;
        $obj->active = $active;

        return $obj;
    }

    public function withArchivedAt(\DateTimeInterface $archivedAt): self
    {
        $obj = clone $this;
        $obj->archivedAt = $archivedAt;

        return $obj;
    }

    public function withAuthorized(bool $authorized): self
    {
        $obj = clone $this;
        $obj->authorized = $authorized;

        return $obj;
    }

    /**
     * The ID of the channel that the channel account is an instance of.
     */
    public function withChannelID(string $channelID): self
    {
        $obj = clone $this;
        $obj->channelId = $channelID;

        return $obj;
    }

    public function withCreatedAt(\DateTimeInterface $createdAt): self
    {
        $obj = clone $this;
        $obj->createdAt = $createdAt;

        return $obj;
    }

    public function withDeliveryIdentifier(
        PublicDeliveryIdentifier $deliveryIdentifier
    ): self {
        $obj = clone $this;
        $obj->deliveryIdentifier = $deliveryIdentifier;

        return $obj;
    }

    /**
     * The ID of the conversations inbox that contains the channel account.
     */
    public function withInboxID(string $inboxID): self
    {
        $obj = clone $this;
        $obj->inboxId = $inboxID;

        return $obj;
    }

    /**
     * The name of the channel account.
     */
    public function withName(string $name): self
    {
        $obj = clone $this;
        $obj->name = $name;

        return $obj;
    }
}
