<?php

declare(strict_types=1);

namespace HubspotSDK\Conversations;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type public_channel_account = array{
 *   archived: bool,
 *   id?: string,
 *   active?: bool,
 *   archivedAt?: \DateTimeInterface,
 *   authorized?: bool,
 *   channelID?: string,
 *   createdAt?: \DateTimeInterface,
 *   deliveryIdentifier?: PublicDeliveryIdentifier,
 *   inboxID?: string,
 *   name?: string,
 * }
 */
final class PublicChannelAccount implements BaseModel
{
    /** @use SdkModel<public_channel_account> */
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
    #[Api('channelId', optional: true)]
    public ?string $channelID;

    #[Api(optional: true)]
    public ?\DateTimeInterface $createdAt;

    #[Api(optional: true)]
    public ?PublicDeliveryIdentifier $deliveryIdentifier;

    /**
     * The ID of the conversations inbox that contains the channel account.
     */
    #[Api('inboxId', optional: true)]
    public ?string $inboxID;

    /**
     * The name of the channel account.
     */
    #[Api(optional: true)]
    public ?string $name;

    /**
     * `new PublicChannelAccount()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * PublicChannelAccount::with(archived: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new PublicChannelAccount)->withArchived(...)
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
        ?string $channelID = null,
        ?\DateTimeInterface $createdAt = null,
        ?PublicDeliveryIdentifier $deliveryIdentifier = null,
        ?string $inboxID = null,
        ?string $name = null,
    ): self {
        $obj = new self;

        $obj->archived = $archived;

        null !== $id && $obj->id = $id;
        null !== $active && $obj->active = $active;
        null !== $archivedAt && $obj->archivedAt = $archivedAt;
        null !== $authorized && $obj->authorized = $authorized;
        null !== $channelID && $obj->channelID = $channelID;
        null !== $createdAt && $obj->createdAt = $createdAt;
        null !== $deliveryIdentifier && $obj->deliveryIdentifier = $deliveryIdentifier;
        null !== $inboxID && $obj->inboxID = $inboxID;
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
        $obj->channelID = $channelID;

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
        $obj->inboxID = $inboxID;

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
