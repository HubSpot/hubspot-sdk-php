<?php

declare(strict_types=1);

namespace HubspotSDK\Conversations;

use HubspotSDK\Conversations\PublicThread\Status;
use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type PublicThreadAssociationsShape from \HubspotSDK\Conversations\PublicThreadAssociations
 *
 * @phpstan-type PublicThreadShape = array{
 *   id: string,
 *   archived: bool,
 *   associatedContactID: string,
 *   createdAt: \DateTimeInterface,
 *   inboxID: string,
 *   originalChannelAccountID: string,
 *   originalChannelID: string,
 *   spam: bool,
 *   status: Status|value-of<Status>,
 *   assignedTo?: string|null,
 *   closedAt?: \DateTimeInterface|null,
 *   latestMessageReceivedTimestamp?: \DateTimeInterface|null,
 *   latestMessageSentTimestamp?: \DateTimeInterface|null,
 *   latestMessageTimestamp?: \DateTimeInterface|null,
 *   threadAssociations?: null|PublicThreadAssociations|PublicThreadAssociationsShape,
 * }
 */
final class PublicThread implements BaseModel
{
    /** @use SdkModel<PublicThreadShape> */
    use SdkModel;

    #[Required]
    public string $id;

    #[Required]
    public bool $archived;

    #[Required('associatedContactId')]
    public string $associatedContactID;

    #[Required]
    public \DateTimeInterface $createdAt;

    #[Required('inboxId')]
    public string $inboxID;

    #[Required('originalChannelAccountId')]
    public string $originalChannelAccountID;

    #[Required('originalChannelId')]
    public string $originalChannelID;

    #[Required]
    public bool $spam;

    /** @var value-of<Status> $status */
    #[Required(enum: Status::class)]
    public string $status;

    #[Optional]
    public ?string $assignedTo;

    #[Optional]
    public ?\DateTimeInterface $closedAt;

    #[Optional]
    public ?\DateTimeInterface $latestMessageReceivedTimestamp;

    #[Optional]
    public ?\DateTimeInterface $latestMessageSentTimestamp;

    #[Optional]
    public ?\DateTimeInterface $latestMessageTimestamp;

    #[Optional]
    public ?PublicThreadAssociations $threadAssociations;

    /**
     * `new PublicThread()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * PublicThread::with(
     *   id: ...,
     *   archived: ...,
     *   associatedContactID: ...,
     *   createdAt: ...,
     *   inboxID: ...,
     *   originalChannelAccountID: ...,
     *   originalChannelID: ...,
     *   spam: ...,
     *   status: ...,
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new PublicThread)
     *   ->withID(...)
     *   ->withArchived(...)
     *   ->withAssociatedContactID(...)
     *   ->withCreatedAt(...)
     *   ->withInboxID(...)
     *   ->withOriginalChannelAccountID(...)
     *   ->withOriginalChannelID(...)
     *   ->withSpam(...)
     *   ->withStatus(...)
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
     * @param Status|value-of<Status> $status
     * @param PublicThreadAssociationsShape $threadAssociations
     */
    public static function with(
        string $id,
        bool $archived,
        string $associatedContactID,
        \DateTimeInterface $createdAt,
        string $inboxID,
        string $originalChannelAccountID,
        string $originalChannelID,
        bool $spam,
        Status|string $status,
        ?string $assignedTo = null,
        ?\DateTimeInterface $closedAt = null,
        ?\DateTimeInterface $latestMessageReceivedTimestamp = null,
        ?\DateTimeInterface $latestMessageSentTimestamp = null,
        ?\DateTimeInterface $latestMessageTimestamp = null,
        PublicThreadAssociations|array|null $threadAssociations = null,
    ): self {
        $self = new self;

        $self['id'] = $id;
        $self['archived'] = $archived;
        $self['associatedContactID'] = $associatedContactID;
        $self['createdAt'] = $createdAt;
        $self['inboxID'] = $inboxID;
        $self['originalChannelAccountID'] = $originalChannelAccountID;
        $self['originalChannelID'] = $originalChannelID;
        $self['spam'] = $spam;
        $self['status'] = $status;

        null !== $assignedTo && $self['assignedTo'] = $assignedTo;
        null !== $closedAt && $self['closedAt'] = $closedAt;
        null !== $latestMessageReceivedTimestamp && $self['latestMessageReceivedTimestamp'] = $latestMessageReceivedTimestamp;
        null !== $latestMessageSentTimestamp && $self['latestMessageSentTimestamp'] = $latestMessageSentTimestamp;
        null !== $latestMessageTimestamp && $self['latestMessageTimestamp'] = $latestMessageTimestamp;
        null !== $threadAssociations && $self['threadAssociations'] = $threadAssociations;

        return $self;
    }

    public function withID(string $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }

    public function withArchived(bool $archived): self
    {
        $self = clone $this;
        $self['archived'] = $archived;

        return $self;
    }

    public function withAssociatedContactID(string $associatedContactID): self
    {
        $self = clone $this;
        $self['associatedContactID'] = $associatedContactID;

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

    public function withOriginalChannelAccountID(
        string $originalChannelAccountID
    ): self {
        $self = clone $this;
        $self['originalChannelAccountID'] = $originalChannelAccountID;

        return $self;
    }

    public function withOriginalChannelID(string $originalChannelID): self
    {
        $self = clone $this;
        $self['originalChannelID'] = $originalChannelID;

        return $self;
    }

    public function withSpam(bool $spam): self
    {
        $self = clone $this;
        $self['spam'] = $spam;

        return $self;
    }

    /**
     * @param Status|value-of<Status> $status
     */
    public function withStatus(Status|string $status): self
    {
        $self = clone $this;
        $self['status'] = $status;

        return $self;
    }

    public function withAssignedTo(string $assignedTo): self
    {
        $self = clone $this;
        $self['assignedTo'] = $assignedTo;

        return $self;
    }

    public function withClosedAt(\DateTimeInterface $closedAt): self
    {
        $self = clone $this;
        $self['closedAt'] = $closedAt;

        return $self;
    }

    public function withLatestMessageReceivedTimestamp(
        \DateTimeInterface $latestMessageReceivedTimestamp
    ): self {
        $self = clone $this;
        $self['latestMessageReceivedTimestamp'] = $latestMessageReceivedTimestamp;

        return $self;
    }

    public function withLatestMessageSentTimestamp(
        \DateTimeInterface $latestMessageSentTimestamp
    ): self {
        $self = clone $this;
        $self['latestMessageSentTimestamp'] = $latestMessageSentTimestamp;

        return $self;
    }

    public function withLatestMessageTimestamp(
        \DateTimeInterface $latestMessageTimestamp
    ): self {
        $self = clone $this;
        $self['latestMessageTimestamp'] = $latestMessageTimestamp;

        return $self;
    }

    /**
     * @param PublicThreadAssociationsShape $threadAssociations
     */
    public function withThreadAssociations(
        PublicThreadAssociations|array $threadAssociations
    ): self {
        $self = clone $this;
        $self['threadAssociations'] = $threadAssociations;

        return $self;
    }
}
