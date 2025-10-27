<?php

declare(strict_types=1);

namespace HubspotSDK\Marketing;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\Marketing\EmailSendStatusView\SendResult;
use HubspotSDK\Marketing\EmailSendStatusView\Status;

/**
 * Describes the status of an email send request.
 *
 * @phpstan-type email_send_status_view = array{
 *   status: value-of<Status>,
 *   statusID: string,
 *   completedAt?: \DateTimeInterface,
 *   eventID?: EventIDView,
 *   message?: string,
 *   requestedAt?: \DateTimeInterface,
 *   sendResult?: value-of<SendResult>,
 *   startedAt?: \DateTimeInterface,
 * }
 */
final class EmailSendStatusView implements BaseModel
{
    /** @use SdkModel<email_send_status_view> */
    use SdkModel;

    /**
     * Status of the send request.
     *
     * @var value-of<Status> $status
     */
    #[Api(enum: Status::class)]
    public string $status;

    /**
     * Identifier used to query the status of the send.
     */
    #[Api('statusId')]
    public string $statusID;

    /**
     * Time when the send was completed.
     */
    #[Api(optional: true)]
    public ?\DateTimeInterface $completedAt;

    /**
     * The ID of a send event.
     */
    #[Api('eventId', optional: true)]
    public ?EventIDView $eventID;

    #[Api(optional: true)]
    public ?string $message;

    /**
     * Time when the send was requested.
     */
    #[Api(optional: true)]
    public ?\DateTimeInterface $requestedAt;

    /**
     * Result of the send.
     *
     * @var value-of<SendResult>|null $sendResult
     */
    #[Api(enum: SendResult::class, optional: true)]
    public ?string $sendResult;

    /**
     * Time when the send began processing.
     */
    #[Api(optional: true)]
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
     * @param SendResult|value-of<SendResult> $sendResult
     */
    public static function with(
        Status|string $status,
        string $statusID,
        ?\DateTimeInterface $completedAt = null,
        ?EventIDView $eventID = null,
        ?string $message = null,
        ?\DateTimeInterface $requestedAt = null,
        SendResult|string|null $sendResult = null,
        ?\DateTimeInterface $startedAt = null,
    ): self {
        $obj = new self;

        $obj['status'] = $status;
        $obj->statusID = $statusID;

        null !== $completedAt && $obj->completedAt = $completedAt;
        null !== $eventID && $obj->eventID = $eventID;
        null !== $message && $obj->message = $message;
        null !== $requestedAt && $obj->requestedAt = $requestedAt;
        null !== $sendResult && $obj['sendResult'] = $sendResult;
        null !== $startedAt && $obj->startedAt = $startedAt;

        return $obj;
    }

    /**
     * Status of the send request.
     *
     * @param Status|value-of<Status> $status
     */
    public function withStatus(Status|string $status): self
    {
        $obj = clone $this;
        $obj['status'] = $status;

        return $obj;
    }

    /**
     * Identifier used to query the status of the send.
     */
    public function withStatusID(string $statusID): self
    {
        $obj = clone $this;
        $obj->statusID = $statusID;

        return $obj;
    }

    /**
     * Time when the send was completed.
     */
    public function withCompletedAt(\DateTimeInterface $completedAt): self
    {
        $obj = clone $this;
        $obj->completedAt = $completedAt;

        return $obj;
    }

    /**
     * The ID of a send event.
     */
    public function withEventID(EventIDView $eventID): self
    {
        $obj = clone $this;
        $obj->eventID = $eventID;

        return $obj;
    }

    public function withMessage(string $message): self
    {
        $obj = clone $this;
        $obj->message = $message;

        return $obj;
    }

    /**
     * Time when the send was requested.
     */
    public function withRequestedAt(\DateTimeInterface $requestedAt): self
    {
        $obj = clone $this;
        $obj->requestedAt = $requestedAt;

        return $obj;
    }

    /**
     * Result of the send.
     *
     * @param SendResult|value-of<SendResult> $sendResult
     */
    public function withSendResult(SendResult|string $sendResult): self
    {
        $obj = clone $this;
        $obj['sendResult'] = $sendResult;

        return $obj;
    }

    /**
     * Time when the send began processing.
     */
    public function withStartedAt(\DateTimeInterface $startedAt): self
    {
        $obj = clone $this;
        $obj->startedAt = $startedAt;

        return $obj;
    }
}
