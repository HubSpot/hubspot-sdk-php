<?php

declare(strict_types=1);

namespace HubspotSDK\Conversations;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type PublicDeliveryIdentifierShape from \HubspotSDK\Conversations\PublicDeliveryIdentifier
 *
 * @phpstan-type PublicChannelAccountShape = array{
 *   id: string,
 *   active: bool,
 *   archived: bool,
 *   authorized: bool,
 *   channelID: string,
 *   createdAt: \DateTimeInterface,
 *   inboxID: string,
 *   name: string,
 *   archivedAt?: \DateTimeInterface|null,
 *   deliveryIdentifier?: null|PublicDeliveryIdentifier|PublicDeliveryIdentifierShape,
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

    #[Required('channelId')]
    public string $channelID;

    #[Required]
    public \DateTimeInterface $createdAt;

    #[Required('inboxId')]
    public string $inboxID;

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
     *
     * @param PublicDeliveryIdentifierShape $deliveryIdentifier
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
        PublicDeliveryIdentifier|array|null $deliveryIdentifier = null,
    ): self {
        $self = new self;

        $self['id'] = $id;
        $self['active'] = $active;
        $self['archived'] = $archived;
        $self['authorized'] = $authorized;
        $self['channelID'] = $channelID;
        $self['createdAt'] = $createdAt;
        $self['inboxID'] = $inboxID;
        $self['name'] = $name;

        null !== $archivedAt && $self['archivedAt'] = $archivedAt;
        null !== $deliveryIdentifier && $self['deliveryIdentifier'] = $deliveryIdentifier;

        return $self;
    }

    public function withID(string $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }

    public function withActive(bool $active): self
    {
        $self = clone $this;
        $self['active'] = $active;

        return $self;
    }

    public function withArchived(bool $archived): self
    {
        $self = clone $this;
        $self['archived'] = $archived;

        return $self;
    }

    public function withAuthorized(bool $authorized): self
    {
        $self = clone $this;
        $self['authorized'] = $authorized;

        return $self;
    }

    public function withChannelID(string $channelID): self
    {
        $self = clone $this;
        $self['channelID'] = $channelID;

        return $self;
    }

    public function withCreatedAt(\DateTimeInterface $createdAt): self
    {
        $self = clone $this;
        $self['createdAt'] = $createdAt;

        return $self;
    }

    public function withInboxID(string $inboxID): self
    {
        $self = clone $this;
        $self['inboxID'] = $inboxID;

        return $self;
    }

    public function withName(string $name): self
    {
        $self = clone $this;
        $self['name'] = $name;

        return $self;
    }

    public function withArchivedAt(\DateTimeInterface $archivedAt): self
    {
        $self = clone $this;
        $self['archivedAt'] = $archivedAt;

        return $self;
    }

    /**
     * @param PublicDeliveryIdentifierShape $deliveryIdentifier
     */
    public function withDeliveryIdentifier(
        PublicDeliveryIdentifier|array $deliveryIdentifier
    ): self {
        $self = clone $this;
        $self['deliveryIdentifier'] = $deliveryIdentifier;

        return $self;
    }
}
