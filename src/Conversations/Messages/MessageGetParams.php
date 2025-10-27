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
 * @see HubspotSDK\Conversations\Messages->get
 *
 * @phpstan-type message_get_params = array{threadID: string}
 */
final class MessageGetParams implements BaseModel
{
    /** @use SdkModel<message_get_params> */
    use SdkModel;
    use SdkParams;

    #[Api]
    public string $threadID;

    /**
     * `new MessageGetParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * MessageGetParams::with(threadID: ...)
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
    public static function with(string $threadID): self
    {
        $obj = new self;

        $obj->threadID = $threadID;

        return $obj;
    }

    public function withThreadID(string $threadID): self
    {
        $obj = clone $this;
        $obj->threadID = $threadID;

        return $obj;
    }
}
