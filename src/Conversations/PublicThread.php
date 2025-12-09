<?php

declare(strict_types=1);

namespace HubspotSDK\Conversations;

use HubspotSDK\Conversations\PublicThread\Status;
use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type PublicThreadShape = array{
 *   id: string,
 *   archived: bool,
 *   associatedContactId: string,
 *   createdAt: \DateTimeInterface,
 *   inboxId: string,
 *   originalChannelAccountId: string,
 *   originalChannelId: string,
 *   spam: bool,
 *   status: value-of<Status>,
 *   assignedTo?: string|null,
 *   closedAt?: \DateTimeInterface|null,
 *   latestMessageReceivedTimestamp?: \DateTimeInterface|null,
 *   latestMessageSentTimestamp?: \DateTimeInterface|null,
 *   latestMessageTimestamp?: \DateTimeInterface|null,
 *   threadAssociations?: PublicThreadAssociations|null,
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

    #[Required]
    public string $associatedContactId;

    #[Required]
    public \DateTimeInterface $createdAt;

    #[Required]
    public string $inboxId;

    #[Required]
    public string $originalChannelAccountId;

    #[Required]
    public string $originalChannelId;

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
     *   associatedContactId: ...,
     *   createdAt: ...,
     *   inboxId: ...,
     *   originalChannelAccountId: ...,
     *   originalChannelId: ...,
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
     * @param PublicThreadAssociations|array{
     *   associatedTicketId?: string|null
     * } $threadAssociations
     */
    public static function with(
        string $id,
        bool $archived,
        string $associatedContactId,
        \DateTimeInterface $createdAt,
        string $inboxId,
        string $originalChannelAccountId,
        string $originalChannelId,
        bool $spam,
        Status|string $status,
        ?string $assignedTo = null,
        ?\DateTimeInterface $closedAt = null,
        ?\DateTimeInterface $latestMessageReceivedTimestamp = null,
        ?\DateTimeInterface $latestMessageSentTimestamp = null,
        ?\DateTimeInterface $latestMessageTimestamp = null,
        PublicThreadAssociations|array|null $threadAssociations = null,
    ): self {
        $obj = new self;

        $obj['id'] = $id;
        $obj['archived'] = $archived;
        $obj['associatedContactId'] = $associatedContactId;
        $obj['createdAt'] = $createdAt;
        $obj['inboxId'] = $inboxId;
        $obj['originalChannelAccountId'] = $originalChannelAccountId;
        $obj['originalChannelId'] = $originalChannelId;
        $obj['spam'] = $spam;
        $obj['status'] = $status;

        null !== $assignedTo && $obj['assignedTo'] = $assignedTo;
        null !== $closedAt && $obj['closedAt'] = $closedAt;
        null !== $latestMessageReceivedTimestamp && $obj['latestMessageReceivedTimestamp'] = $latestMessageReceivedTimestamp;
        null !== $latestMessageSentTimestamp && $obj['latestMessageSentTimestamp'] = $latestMessageSentTimestamp;
        null !== $latestMessageTimestamp && $obj['latestMessageTimestamp'] = $latestMessageTimestamp;
        null !== $threadAssociations && $obj['threadAssociations'] = $threadAssociations;

        return $obj;
    }

    public function withID(string $id): self
    {
        $obj = clone $this;
        $obj['id'] = $id;

        return $obj;
    }

    public function withArchived(bool $archived): self
    {
        $obj = clone $this;
        $obj['archived'] = $archived;

        return $obj;
    }

    public function withAssociatedContactID(string $associatedContactID): self
    {
        $obj = clone $this;
        $obj['associatedContactId'] = $associatedContactID;

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

    public function withOriginalChannelAccountID(
        string $originalChannelAccountID
    ): self {
        $obj = clone $this;
        $obj['originalChannelAccountId'] = $originalChannelAccountID;

        return $obj;
    }

    public function withOriginalChannelID(string $originalChannelID): self
    {
        $obj = clone $this;
        $obj['originalChannelId'] = $originalChannelID;

        return $obj;
    }

    public function withSpam(bool $spam): self
    {
        $obj = clone $this;
        $obj['spam'] = $spam;

        return $obj;
    }

    /**
     * @param Status|value-of<Status> $status
     */
    public function withStatus(Status|string $status): self
    {
        $obj = clone $this;
        $obj['status'] = $status;

        return $obj;
    }

    public function withAssignedTo(string $assignedTo): self
    {
        $obj = clone $this;
        $obj['assignedTo'] = $assignedTo;

        return $obj;
    }

    public function withClosedAt(\DateTimeInterface $closedAt): self
    {
        $obj = clone $this;
        $obj['closedAt'] = $closedAt;

        return $obj;
    }

    public function withLatestMessageReceivedTimestamp(
        \DateTimeInterface $latestMessageReceivedTimestamp
    ): self {
        $obj = clone $this;
        $obj['latestMessageReceivedTimestamp'] = $latestMessageReceivedTimestamp;

        return $obj;
    }

    public function withLatestMessageSentTimestamp(
        \DateTimeInterface $latestMessageSentTimestamp
    ): self {
        $obj = clone $this;
        $obj['latestMessageSentTimestamp'] = $latestMessageSentTimestamp;

        return $obj;
    }

    public function withLatestMessageTimestamp(
        \DateTimeInterface $latestMessageTimestamp
    ): self {
        $obj = clone $this;
        $obj['latestMessageTimestamp'] = $latestMessageTimestamp;

        return $obj;
    }

    /**
     * @param PublicThreadAssociations|array{
     *   associatedTicketId?: string|null
     * } $threadAssociations
     */
    public function withThreadAssociations(
        PublicThreadAssociations|array $threadAssociations
    ): self {
        $obj = clone $this;
        $obj['threadAssociations'] = $threadAssociations;

        return $obj;
    }
}
