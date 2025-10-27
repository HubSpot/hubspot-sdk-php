<?php

declare(strict_types=1);

namespace HubspotSDK\Conversations;

use HubspotSDK\Conversations\PublicQuickReplies\Type;
use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type public_quick_replies = array{
 *   allowMultiSelect: bool,
 *   allowUserInput: bool,
 *   quickReplies: list<QuickReply>,
 *   type: value-of<Type>,
 * }
 */
final class PublicQuickReplies implements BaseModel
{
    /** @use SdkModel<public_quick_replies> */
    use SdkModel;

    #[Api]
    public bool $allowMultiSelect;

    #[Api]
    public bool $allowUserInput;

    /** @var list<QuickReply> $quickReplies */
    #[Api(list: QuickReply::class)]
    public array $quickReplies;

    /** @var value-of<Type> $type */
    #[Api(enum: Type::class)]
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
     * @param list<QuickReply> $quickReplies
     * @param Type|value-of<Type> $type
     */
    public static function with(
        bool $allowMultiSelect,
        bool $allowUserInput,
        array $quickReplies,
        Type|string $type = 'QUICK_REPLIES',
    ): self {
        $obj = new self;

        $obj->allowMultiSelect = $allowMultiSelect;
        $obj->allowUserInput = $allowUserInput;
        $obj->quickReplies = $quickReplies;
        $obj['type'] = $type;

        return $obj;
    }

    public function withAllowMultiSelect(bool $allowMultiSelect): self
    {
        $obj = clone $this;
        $obj->allowMultiSelect = $allowMultiSelect;

        return $obj;
    }

    public function withAllowUserInput(bool $allowUserInput): self
    {
        $obj = clone $this;
        $obj->allowUserInput = $allowUserInput;

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
