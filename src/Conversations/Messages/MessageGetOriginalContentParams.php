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
 * @see HubspotSDK\Services\Conversations\MessagesService::getOriginalContent()
 *
 * @phpstan-type MessageGetOriginalContentParamsShape = array{
 *   threadId: int, property?: string
 * }
 */
final class MessageGetOriginalContentParams implements BaseModel
{
    /** @use SdkModel<MessageGetOriginalContentParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Api]
    public int $threadId;

    /**
     * A specific property to include in the original content response.
     */
    #[Api(optional: true)]
    public ?string $property;

    /**
     * `new MessageGetOriginalContentParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * MessageGetOriginalContentParams::with(threadId: ...)
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
    public static function with(int $threadId, ?string $property = null): self
    {
        $obj = new self;

        $obj->threadId = $threadId;

        null !== $property && $obj->property = $property;

        return $obj;
    }

    public function withThreadID(int $threadID): self
    {
        $obj = clone $this;
        $obj->threadId = $threadID;

        return $obj;
    }

    /**
     * A specific property to include in the original content response.
     */
    public function withProperty(string $property): self
    {
        $obj = clone $this;
        $obj->property = $property;

        return $obj;
    }
}
