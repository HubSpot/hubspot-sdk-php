<?php

declare(strict_types=1);

namespace HubspotSDK\Conversations\CustomChannels;

use HubspotSDK\Conversations\PublicDeliveryIdentifier;
use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type PublicChannelAccountShape = array{
 *   id: string,
 *   active: bool,
 *   archived: bool,
 *   authorized: bool,
 *   channelID: string,
 *   createdAt: \DateTimeInterface,
 *   inboxID: string,
 *   name: string,
 *   archivedAt?: \DateTimeInterface,
 *   deliveryIdentifier?: PublicDeliveryIdentifier,
 * }
 */
final class PublicChannelAccount implements BaseModel
{
    /** @use SdkModel<PublicChannelAccountShape> */
    use SdkModel;

    #[Api]
    public string $id;

    #[Api]
    public bool $active;

    #[Api]
    public bool $archived;

    #[Api]
    public bool $authorized;

    #[Api('channelId')]
    public string $channelID;

    #[Api]
    public \DateTimeInterface $createdAt;

    #[Api('inboxId')]
    public string $inboxID;

    #[Api]
    public string $name;

    #[Api(optional: true)]
    public ?\DateTimeInterface $archivedAt;

    #[Api(optional: true)]
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
     *   channelID: ...,
     *   createdAt: ...,
     *   inboxID: ...,
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
     */
    public static function with(
        string $id,
        bool $active,
        bool $archived,
        bool $authorized,
        string $channelID,
        \DateTimeInterface $createdAt,
        string $inboxID,
        string $name,
        ?\DateTimeInterface $archivedAt = null,
        ?PublicDeliveryIdentifier $deliveryIdentifier = null,
    ): self {
        $obj = new self;

        $obj->id = $id;
        $obj->active = $active;
        $obj->archived = $archived;
        $obj->authorized = $authorized;
        $obj->channelID = $channelID;
        $obj->createdAt = $createdAt;
        $obj->inboxID = $inboxID;
        $obj->name = $name;

        null !== $archivedAt && $obj->archivedAt = $archivedAt;
        null !== $deliveryIdentifier && $obj->deliveryIdentifier = $deliveryIdentifier;

        return $obj;
    }

    public function withID(string $id): self
    {
        $obj = clone $this;
        $obj->id = $id;

        return $obj;
    }

    public function withActive(bool $active): self
    {
        $obj = clone $this;
        $obj->active = $active;

        return $obj;
    }

    public function withArchived(bool $archived): self
    {
        $obj = clone $this;
        $obj->archived = $archived;

        return $obj;
    }

    public function withAuthorized(bool $authorized): self
    {
        $obj = clone $this;
        $obj->authorized = $authorized;

        return $obj;
    }

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

    public function withArchivedAt(\DateTimeInterface $archivedAt): self
    {
        $obj = clone $this;
        $obj->archivedAt = $archivedAt;

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
