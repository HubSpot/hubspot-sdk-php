<?php

declare(strict_types=1);

namespace HubspotSDK\Marketing;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\Marketing\EmailSendStatusView\SendResult;
use HubspotSDK\Marketing\EmailSendStatusView\Status;

/**
 * @phpstan-import-type EventIDViewShape from \HubspotSDK\Marketing\EventIDView
 *
 * @phpstan-type EmailSendStatusViewShape = array{
 *   status: Status|value-of<Status>,
 *   statusID: string,
 *   completedAt?: \DateTimeInterface|null,
 *   eventID?: null|EventIDView|EventIDViewShape,
 *   message?: string|null,
 *   requestedAt?: \DateTimeInterface|null,
 *   sendResult?: null|SendResult|value-of<SendResult>,
 *   startedAt?: \DateTimeInterface|null,
 * }
 */
final class EmailSendStatusView implements BaseModel
{
    /** @use SdkModel<EmailSendStatusViewShape> */
    use SdkModel;

    /**
     * Status of the send request.
     *
     * @var value-of<Status> $status
     */
    #[Required(enum: Status::class)]
    public string $status;

    /**
     * Identifier used to query the status of the send.
     */
    #[Required('statusId')]
    public string $statusID;

    /**
     * Time when the send was completed.
     */
    #[Optional]
    public ?\DateTimeInterface $completedAt;

    #[Optional('eventId')]
    public ?EventIDView $eventID;

    /**
     * A human readable message describing the error along with remediation steps where appropriate.
     */
    #[Optional]
    public ?string $message;

    /**
     * Time when the send was requested.
     */
    #[Optional]
    public ?\DateTimeInterface $requestedAt;

    /**
     * Result of the send.
     *
     * @var value-of<SendResult>|null $sendResult
     */
    #[Optional(enum: SendResult::class)]
    public ?string $sendResult;

    /**
     * Time when the send began processing.
     */
    #[Optional]
    public ?\DateTimeInterface $startedAt;

    /**
     * `new EmailSendStatusView()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * EmailSendStatusView::with(status: ..., statusID: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new EmailSendStatusView)->withStatus(...)->withStatusID(...)
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
     * @param EventIDView|EventIDViewShape|null $eventID
     * @param SendResult|value-of<SendResult>|null $sendResult
     */
    public static function with(
        Status|string $status,
        string $statusID,
        ?\DateTimeInterface $completedAt = null,
        EventIDView|array|null $eventID = null,
        ?string $message = null,
        ?\DateTimeInterface $requestedAt = null,
        SendResult|string|null $sendResult = null,
        ?\DateTimeInterface $startedAt = null,
    ): self {
        $self = new self;

        $self['status'] = $status;
        $self['statusID'] = $statusID;

        null !== $completedAt && $self['completedAt'] = $completedAt;
        null !== $eventID && $self['eventID'] = $eventID;
        null !== $message && $self['message'] = $message;
        null !== $requestedAt && $self['requestedAt'] = $requestedAt;
        null !== $sendResult && $self['sendResult'] = $sendResult;
        null !== $startedAt && $self['startedAt'] = $startedAt;

        return $self;
    }

    /**
     * Status of the send request.
     *
     * @param Status|value-of<Status> $status
     */
    public function withStatus(Status|string $status): self
    {
        $self = clone $this;
        $self['status'] = $status;

        return $self;
    }

    /**
     * Identifier used to query the status of the send.
     */
    public function withStatusID(string $statusID): self
    {
        $self = clone $this;
        $self['statusID'] = $statusID;

        return $self;
    }

    /**
     * Time when the send was completed.
     */
    public function withCompletedAt(\DateTimeInterface $completedAt): self
    {
        $self = clone $this;
        $self['completedAt'] = $completedAt;

        return $self;
    }

    /**
     * @param EventIDView|EventIDViewShape $eventID
     */
    public function withEventID(EventIDView|array $eventID): self
    {
        $self = clone $this;
        $self['eventID'] = $eventID;

        return $self;
    }

    /**
     * A human readable message describing the error along with remediation steps where appropriate.
     */
    public function withMessage(string $message): self
    {
        $self = clone $this;
        $self['message'] = $message;

        return $self;
    }

    /**
     * Time when the send was requested.
     */
    public function withRequestedAt(\DateTimeInterface $requestedAt): self
    {
        $self = clone $this;
        $self['requestedAt'] = $requestedAt;

        return $self;
    }

    /**
     * Result of the send.
     *
     * @param SendResult|value-of<SendResult> $sendResult
     */
    public function withSendResult(SendResult|string $sendResult): self
    {
        $self = clone $this;
        $self['sendResult'] = $sendResult;

        return $self;
    }

    /**
     * Time when the send began processing.
     */
    public function withStartedAt(\DateTimeInterface $startedAt): self
    {
        $self = clone $this;
        $self['startedAt'] = $startedAt;

        return $self;
    }
}
