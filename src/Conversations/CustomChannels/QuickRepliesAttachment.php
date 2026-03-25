<?php

declare(strict_types=1);

namespace HubspotSDK\Conversations\CustomChannels;

use HubspotSDK\Conversations\CustomChannels\QuickRepliesAttachment\Type;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type QuickReplyShape from \HubspotSDK\Conversations\CustomChannels\QuickReply
 *
 * @phpstan-type QuickRepliesAttachmentShape = array{
 *   quickReplies: list<QuickReply|QuickReplyShape>, type: Type|value-of<Type>
 * }
 */
final class QuickRepliesAttachment implements BaseModel
{
    /** @use SdkModel<QuickRepliesAttachmentShape> */
    use SdkModel;

    /** @var list<QuickReply> $quickReplies */
    #[Required(list: QuickReply::class)]
    public array $quickReplies;

    /** @var value-of<Type> $type */
    #[Required(enum: Type::class)]
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
     * @param list<QuickReply|QuickReplyShape> $quickReplies
     * @param Type|value-of<Type> $type
     */
    public static function with(
        array $quickReplies,
        Type|string $type = 'QUICK_REPLIES'
    ): self {
        $self = new self;

        $self['quickReplies'] = $quickReplies;
        $self['type'] = $type;

        return $self;
    }

    /**
     * @param list<QuickReply|QuickReplyShape> $quickReplies
     */
    public function withQuickReplies(array $quickReplies): self
    {
        $self = clone $this;
        $self['quickReplies'] = $quickReplies;

        return $self;
    }

    /**
     * @param Type|value-of<Type> $type
     */
    public function withType(Type|string $type): self
    {
        $self = clone $this;
        $self['type'] = $type;

        return $self;
    }
}
