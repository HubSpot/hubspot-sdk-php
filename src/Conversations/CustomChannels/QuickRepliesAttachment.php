<?php

declare(strict_types=1);

namespace HubspotSDK\Conversations\CustomChannels;

use HubspotSDK\Conversations\CustomChannels\QuickRepliesAttachment\Type;
use HubspotSDK\Conversations\QuickReply;
use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type quick_replies_attachment = array{
 *   quickReplies: list<QuickReply>, type: value-of<Type>
 * }
 */
final class QuickRepliesAttachment implements BaseModel
{
    /** @use SdkModel<quick_replies_attachment> */
    use SdkModel;

    /** @var list<QuickReply> $quickReplies */
    #[Api(list: QuickReply::class)]
    public array $quickReplies;

    /** @var value-of<Type> $type */
    #[Api(enum: Type::class)]
    public string $type;

    /**
     * `new QuickRepliesAttachment()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * QuickRepliesAttachment::with(quickReplies: ..., type: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new QuickRepliesAttachment)->withQuickReplies(...)->withType(...)
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
     * @param list<QuickReply> $quickReplies
     * @param Type|value-of<Type> $type
     */
    public static function with(
        array $quickReplies,
        Type|string $type = 'QUICK_REPLIES'
    ): self {
        $obj = new self;

        $obj->quickReplies = $quickReplies;
        $obj['type'] = $type;

        return $obj;
    }

    /**
     * @param list<QuickReply> $quickReplies
     */
    public function withQuickReplies(array $quickReplies): self
    {
        $obj = clone $this;
        $obj->quickReplies = $quickReplies;

        return $obj;
    }

    /**
     * @param Type|value-of<Type> $type
     */
    public function withType(Type|string $type): self
    {
        $obj = clone $this;
        $obj['type'] = $type;

        return $obj;
    }
}
