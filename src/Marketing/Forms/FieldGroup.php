<?php

declare(strict_types=1);

namespace HubspotSDK\Marketing\Forms;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\Marketing\Forms\FieldGroup\Field;
use HubspotSDK\Marketing\Forms\FieldGroup\GroupType;
use HubspotSDK\Marketing\Forms\FieldGroup\RichTextType;

/**
 * A collection of up to three form fields usually displayed in a row.
 *
 * @phpstan-type FieldGroupShape = array{
 *   fields: list<mixed>,
 *   groupType: value-of<GroupType>,
 *   richTextType: value-of<RichTextType>,
 *   richText?: string|null,
 * }
 */
final class FieldGroup implements BaseModel
{
    /** @use SdkModel<FieldGroupShape> */
    use SdkModel;

    /**
     * The form fields included in the group.
     *
     * @var list<mixed> $fields
     */
    #[Required(list: Field::class)]
    public array $fields;

    /** @var value-of<GroupType> $groupType */
    #[Required(enum: GroupType::class)]
    public string $groupType;

    /**
     * The type of rich text included. The default value is text.
     *
     * @var value-of<RichTextType> $richTextType
     */
    #[Required(enum: RichTextType::class)]
    public string $richTextType;

    /**
     * A block of rich text or an image. Those can be used to add extra information for the customers filling in the form. If the field group includes fields, the rich text will be displayed before the fields.
     */
    #[Optional]
    public ?string $richText;

    /**
     * `new FieldGroup()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * FieldGroup::with(fields: ..., groupType: ..., richTextType: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new FieldGroup)->withFields(...)->withGroupType(...)->withRichTextType(...)
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
     * @param list<mixed> $fields
     * @param GroupType|value-of<GroupType> $groupType
     * @param RichTextType|value-of<RichTextType> $richTextType
     */
    public static function with(
        array $fields,
        GroupType|string $groupType,
        RichTextType|string $richTextType,
        ?string $richText = null,
    ): self {
        $self = new self;

        $self['fields'] = $fields;
        $self['groupType'] = $groupType;
        $self['richTextType'] = $richTextType;

        null !== $richText && $self['richText'] = $richText;

        return $self;
    }

    /**
     * The form fields included in the group.
     *
     * @param list<mixed> $fields
     */
    public function withFields(array $fields): self
    {
        $self = clone $this;
        $self['fields'] = $fields;

        return $self;
    }

    /**
     * @param GroupType|value-of<GroupType> $groupType
     */
    public function withGroupType(GroupType|string $groupType): self
    {
        $self = clone $this;
        $self['groupType'] = $groupType;

        return $self;
    }

    /**
     * The type of rich text included. The default value is text.
     *
     * @param RichTextType|value-of<RichTextType> $richTextType
     */
    public function withRichTextType(RichTextType|string $richTextType): self
    {
        $self = clone $this;
        $self['richTextType'] = $richTextType;

        return $self;
    }

    /**
     * A block of rich text or an image. Those can be used to add extra information for the customers filling in the form. If the field group includes fields, the rich text will be displayed before the fields.
     */
    public function withRichText(string $richText): self
    {
        $self = clone $this;
        $self['richText'] = $richText;

        return $self;
    }
}
