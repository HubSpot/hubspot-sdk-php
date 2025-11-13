<?php

declare(strict_types=1);

namespace HubspotSDK\Conversations\Messages;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * Retrieve a single message from a thread using the message ID.
 *
 * @see HubspotSDK\Services\Conversations\MessagesService::get()
 *
 * @phpstan-type MessageGetParamsShape = array{threadId: string}
 */
final class MessageGetParams implements BaseModel
{
    /** @use SdkModel<MessageGetParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Api]
    public string $threadId;

    /**
     * `new MessageGetParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * MessageGetParams::with(threadId: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new MessageGetParams)->withThreadID(...)
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
    public static function with(string $threadId): self
    {
        $obj = new self;

        $obj->threadId = $threadId;

        return $obj;
    }

    public function withThreadID(string $threadID): self
    {
        $obj = clone $this;
        $obj->threadId = $threadID;

        return $obj;
    }
}
