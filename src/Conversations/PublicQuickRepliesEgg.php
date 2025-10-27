<?php

declare(strict_types=1);

namespace HubspotSDK\Conversations;

use HubspotSDK\Conversations\PublicQuickRepliesEgg\Type;
use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type public_quick_replies_egg = array{
 *   quickReplies: list<QuickReply>, type: value-of<Type>
 * }
 */
final class PublicQuickRepliesEgg implements BaseModel
{
    /** @use SdkModel<public_quick_replies_egg> */
    use SdkModel;

    /** @var list<QuickReply> $quickReplies */
    #[Api(list: QuickReply::class)]
    public array $quickReplies;

    /** @var value-of<Type> $type */
    #[Api(enum: Type::class)]
    public string $type;

    /**
     * `new PublicQuickRepliesEgg()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * PublicQuickRepliesEgg::with(quickReplies: ..., type: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new PublicQuickRepliesEgg)->withQuickReplies(...)->withType(...)
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
