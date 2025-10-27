<?php

declare(strict_types=1);

namespace HubspotSDK\Conversations\Threads;

use HubspotSDK\Conversations\Threads\ThreadUpdateParams\Status;
use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * Updates a single thread. Either a thread's status can be updated, or the thread can be restored.
 *
 * @see HubspotSDK\Conversations\Threads->update
 *
 * @phpstan-type thread_update_params = array{
 *   archived?: bool, status?: Status|value-of<Status>
 * }
 */
final class ThreadUpdateParams implements BaseModel
{
    /** @use SdkModel<thread_update_params> */
    use SdkModel;
    use SdkParams;

    /**
     * Whether this thread is archived. Set to false to restore the thread.
     */
    #[Api(optional: true)]
    public ?bool $archived;

    /**
     * The thread's status: `OPEN` or `CLOSED`.
     *
     * @var value-of<Status>|null $status
     */
    #[Api(enum: Status::class, optional: true)]
    public ?string $status;

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
     */
    public static function with(
        ?bool $archived = null,
        Status|string|null $status = null
    ): self {
        $obj = new self;

        null !== $archived && $obj->archived = $archived;
        null !== $status && $obj['status'] = $status;

        return $obj;
    }

    /**
     * Whether this thread is archived. Set to false to restore the thread.
     */
    public function withArchived(bool $archived): self
    {
        $obj = clone $this;
        $obj->archived = $archived;

        return $obj;
    }

    /**
     * The thread's status: `OPEN` or `CLOSED`.
     *
     * @param Status|value-of<Status> $status
     */
    public function withStatus(Status|string $status): self
    {
        $obj = clone $this;
        $obj['status'] = $status;

        return $obj;
    }
}
