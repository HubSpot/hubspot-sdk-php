<?php

declare(strict_types=1);

namespace HubspotSDK\Conversations;

use HubspotSDK\Conversations\PublicQuickReplies\Type;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type QuickReplyShape from \HubspotSDK\Conversations\QuickReply
 *
 * @phpstan-type PublicQuickRepliesShape = array{
 *   allowMultiSelect: bool,
 *   allowUserInput: bool,
 *   quickReplies: list<QuickReply|QuickReplyShape>,
 *   type: Type|value-of<Type>,
 * }
 */
final class PublicQuickReplies implements BaseModel
{
    /** @use SdkModel<PublicQuickRepliesShape> */
    use SdkModel;

    #[Required]
    public bool $allowMultiSelect;

    #[Required]
    public bool $allowUserInput;

    /** @var list<QuickReply> $quickReplies */
    #[Required(list: QuickReply::class)]
    public array $quickReplies;

    /** @var value-of<Type> $type */
    #[Required(enum: Type::class)]
    public string $type;

    /**
     * `new PublicQuickReplies()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * PublicQuickReplies::with(
     *   allowMultiSelect: ..., allowUserInput: ..., quickReplies: ..., type: ...
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new PublicQuickReplies)
     *   ->withAllowMultiSelect(...)
     *   ->withAllowUserInput(...)
     *   ->withQuickReplies(...)
     *   ->withType(...)
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
        bool $allowMultiSelect,
        bool $allowUserInput,
        array $quickReplies,
        Type|string $type = 'QUICK_REPLIES',
    ): self {
        $self = new self;

        $self['allowMultiSelect'] = $allowMultiSelect;
        $self['allowUserInput'] = $allowUserInput;
        $self['quickReplies'] = $quickReplies;
        $self['type'] = $type;

        return $self;
    }

    public function withAllowMultiSelect(bool $allowMultiSelect): self
    {
        $self = clone $this;
        $self['allowMultiSelect'] = $allowMultiSelect;

        return $self;
    }

    public function withAllowUserInput(bool $allowUserInput): self
    {
        $self = clone $this;
        $self['allowUserInput'] = $allowUserInput;

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
