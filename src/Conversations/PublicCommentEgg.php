<?php

declare(strict_types=1);

namespace HubspotSDK\Conversations;

use HubspotSDK\Conversations\PublicCommentEgg\Attachment;
use HubspotSDK\Conversations\PublicCommentEgg\Type;
use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type PublicCommentEggShape = array{
 *   attachments: list<PublicFileEgg|PublicQuickRepliesEgg|PublicSocialMediaEgg>,
 *   text: string,
 *   type: value-of<Type>,
 *   richText?: string|null,
 * }
 */
final class PublicCommentEgg implements BaseModel
{
    /** @use SdkModel<PublicCommentEggShape> */
    use SdkModel;

    /**
     * @var list<PublicFileEgg|PublicQuickRepliesEgg|PublicSocialMediaEgg> $attachments
     */
    #[Required(list: Attachment::class)]
    public array $attachments;

    #[Required]
    public string $text;

    /** @var value-of<Type> $type */
    #[Required(enum: Type::class)]
    public string $type;

    #[Optional]
    public ?string $richText;

    /**
     * `new PublicCommentEgg()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * PublicCommentEgg::with(attachments: ..., text: ..., type: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new PublicCommentEgg)->withAttachments(...)->withText(...)->withType(...)
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
     * @param list<PublicFileEgg|array{
     *   fileId: string, type: value-of<PublicFileEgg\Type>
     * }|PublicQuickRepliesEgg|array{
     *   quickReplies: list<QuickReply>,
     *   type: value-of<PublicQuickRepliesEgg\Type>,
     * }|PublicSocialMediaEgg|array{
     *   socialMetadata: SocialMetadata,
     *   type: value-of<PublicSocialMediaEgg\Type>,
     * }> $attachments
     * @param Type|value-of<Type> $type
     */
    public static function with(
        array $attachments,
        string $text,
        Type|string $type = 'COMMENT',
        ?string $richText = null,
    ): self {
        $obj = new self;

        $obj['attachments'] = $attachments;
        $obj['text'] = $text;
        $obj['type'] = $type;

        null !== $richText && $obj['richText'] = $richText;

        return $obj;
    }

    /**
     * @param list<PublicFileEgg|array{
     *   fileId: string, type: value-of<PublicFileEgg\Type>
     * }|PublicQuickRepliesEgg|array{
     *   quickReplies: list<QuickReply>,
     *   type: value-of<PublicQuickRepliesEgg\Type>,
     * }|PublicSocialMediaEgg|array{
     *   socialMetadata: SocialMetadata,
     *   type: value-of<PublicSocialMediaEgg\Type>,
     * }> $attachments
     */
    public function withAttachments(array $attachments): self
    {
        $obj = clone $this;
        $obj['attachments'] = $attachments;

        return $obj;
    }

    public function withText(string $text): self
    {
        $obj = clone $this;
        $obj['text'] = $text;

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

    public function withRichText(string $richText): self
    {
        $obj = clone $this;
        $obj['richText'] = $richText;

        return $obj;
    }
}
