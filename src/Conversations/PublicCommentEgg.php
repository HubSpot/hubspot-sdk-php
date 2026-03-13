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
 * @phpstan-import-type AttachmentVariants from \HubspotSDK\Conversations\PublicCommentEgg\Attachment
 * @phpstan-import-type AttachmentShape from \HubspotSDK\Conversations\PublicCommentEgg\Attachment
 *
 * @phpstan-type PublicCommentEggShape = array{
 *   attachments: list<AttachmentShape>,
 *   text: string,
 *   type: Type|value-of<Type>,
 *   richText?: string|null,
 * }
 */
final class PublicCommentEgg implements BaseModel
{
    /** @use SdkModel<PublicCommentEggShape> */
    use SdkModel;

    /** @var list<AttachmentVariants> $attachments */
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
     * @param list<AttachmentShape> $attachments
     * @param Type|value-of<Type> $type
     */
    public static function with(
        array $attachments,
        string $text,
        Type|string $type = 'COMMENT',
        ?string $richText = null,
    ): self {
        $self = new self;

        $self['attachments'] = $attachments;
        $self['text'] = $text;
        $self['type'] = $type;

        null !== $richText && $self['richText'] = $richText;

        return $self;
    }

    /**
     * @param list<AttachmentShape> $attachments
     */
    public function withAttachments(array $attachments): self
    {
        $self = clone $this;
        $self['attachments'] = $attachments;

        return $self;
    }

    public function withText(string $text): self
    {
        $self = clone $this;
        $self['text'] = $text;

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

    public function withRichText(string $richText): self
    {
        $self = clone $this;
        $self['richText'] = $richText;

        return $self;
    }
}
