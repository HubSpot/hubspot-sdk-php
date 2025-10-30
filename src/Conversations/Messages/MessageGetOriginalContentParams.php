<?php

declare(strict_types=1);

namespace HubspotSDK\Conversations\Messages;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * Returns the complete original text and rich text bodies of a message. This will be different from the text and rich text in the message itself if the message's `truncationStatus` is anything other than `NOT_TRUNCATED`.
 *
 * @see HubspotSDK\Conversations\Messages->getOriginalContent
 *
 * @phpstan-type MessageGetOriginalContentParamsShape = array{threadID: string}
 */
final class MessageGetOriginalContentParams implements BaseModel
{
    /** @use SdkModel<MessageGetOriginalContentParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Api]
    public string $threadID;

    /**
     * `new MessageGetOriginalContentParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * MessageGetOriginalContentParams::with(threadID: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new MessageGetOriginalContentParams)->withThreadID(...)
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
