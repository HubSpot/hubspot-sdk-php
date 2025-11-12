<?php

declare(strict_types=1);

namespace HubspotSDK\Marketing\Forms;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\Marketing\Forms\FieldGroup\Field;
use HubspotSDK\Marketing\Forms\FieldGroup\GroupType;
use HubspotSDK\Marketing\Forms\FieldGroup\RichTextType;

/**
 * A collection of up to three form fields usually displayed in a row.
 *
 * @phpstan-type FieldGroupShape = array{
 *   fields: list<EmailField|PhoneField|MobilePhoneField|SingleLineTextField|MultiLineTextField|NumberField|SingleCheckboxField|MultipleCheckboxesField|DropdownField|RadioField|DatepickerField|FileField|PaymentLinkRadioField>,
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
     * @var list<EmailField|PhoneField|MobilePhoneField|SingleLineTextField|MultiLineTextField|NumberField|SingleCheckboxField|MultipleCheckboxesField|DropdownField|RadioField|DatepickerField|FileField|PaymentLinkRadioField> $fields
     */
    #[Api(list: Field::class)]
    public array $fields;

    /** @var value-of<GroupType> $groupType */
    #[Api(enum: GroupType::class)]
    public string $groupType;

    /**
     * The type of rich text included. The default value is text.
     *
     * @var value-of<RichTextType> $richTextType
     */
    #[Api(enum: RichTextType::class)]
    public string $richTextType;

    /**
     * A block of rich text or an image. Those can be used to add extra information for the customers filling in the form. If the field group includes fields, the rich text will be displayed before the fields.
     */
    #[Api(optional: true)]
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
     * @param list<EmailField|PhoneField|MobilePhoneField|SingleLineTextField|MultiLineTextField|NumberField|SingleCheckboxField|MultipleCheckboxesField|DropdownField|RadioField|DatepickerField|FileField|PaymentLinkRadioField> $fields
     * @param GroupType|value-of<GroupType> $groupType
     * @param RichTextType|value-of<RichTextType> $richTextType
     */
    public static function with(
        array $fields,
        GroupType|string $groupType,
        RichTextType|string $richTextType,
        ?string $richText = null,
    ): self {
        $obj = new self;

        $obj->fields = $fields;
        $obj['groupType'] = $groupType;
        $obj['richTextType'] = $richTextType;

        null !== $richText && $obj->richText = $richText;

        return $obj;
    }

    /**
     * The form fields included in the group.
     *
     * @param list<EmailField|PhoneField|MobilePhoneField|SingleLineTextField|MultiLineTextField|NumberField|SingleCheckboxField|MultipleCheckboxesField|DropdownField|RadioField|DatepickerField|FileField|PaymentLinkRadioField> $fields
     */
    public function withFields(array $fields): self
    {
        $obj = clone $this;
        $obj->fields = $fields;

        return $obj;
    }

    /**
     * @param GroupType|value-of<GroupType> $groupType
     */
    public function withGroupType(GroupType|string $groupType): self
    {
        $obj = clone $this;
        $obj['groupType'] = $groupType;

        return $obj;
    }

    /**
     * The type of rich text included. The default value is text.
     *
     * @param RichTextType|value-of<RichTextType> $richTextType
     */
    public function withRichTextType(RichTextType|string $richTextType): self
    {
        $obj = clone $this;
        $obj['richTextType'] = $richTextType;

        return $obj;
    }

    /**
     * A block of rich text or an image. Those can be used to add extra information for the customers filling in the form. If the field group includes fields, the rich text will be displayed before the fields.
     */
    public function withRichText(string $richText): self
    {
        $obj = clone $this;
        $obj->richText = $richText;

        return $obj;
    }
}
