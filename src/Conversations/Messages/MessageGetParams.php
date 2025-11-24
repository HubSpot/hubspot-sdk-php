<?php

declare(strict_types=1);

namespace HubspotSDK\Conversations\Messages;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @see HubspotSDK\Services\Conversations\MessagesService::get()
 *
 * @phpstan-type MessageGetParamsShape = array{threadId: int, property?: string}
 */
final class MessageGetParams implements BaseModel
{
    /** @use SdkModel<MessageGetParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Api]
    public int $threadId;

    #[Api(optional: true)]
    public ?string $property;

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

    public function withProperty(string $property): self
    {
        $obj = clone $this;
        $obj->property = $property;

        return $obj;
    }
}
