<?php

declare(strict_types=1);

namespace HubspotSDK\Conversations\Messages;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @see HubspotSDK\Services\Conversations\MessagesService::getOriginalContent()
 *
 * @phpstan-type MessageGetOriginalContentParamsShape = array{
 *   threadID: int, property?: string
 * }
 */
final class MessageGetOriginalContentParams implements BaseModel
{
    /** @use SdkModel<MessageGetOriginalContentParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Required]
    public int $threadID;

    #[Optional]
    public ?string $property;

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
    public static function with(int $threadID, ?string $property = null): self
    {
        $obj = new self;

        $obj['threadID'] = $threadID;

        null !== $property && $obj['property'] = $property;

        return $obj;
    }

    public function withThreadID(int $threadID): self
    {
        $obj = clone $this;
        $obj['threadID'] = $threadID;

        return $obj;
    }

    public function withProperty(string $property): self
    {
        $obj = clone $this;
        $obj['property'] = $property;

        return $obj;
    }
}
