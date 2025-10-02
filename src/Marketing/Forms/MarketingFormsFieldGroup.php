<?php

declare(strict_types=1);

namespace HubspotSDK\Marketing\Forms;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\Marketing\Forms\MarketingFormsFieldGroup\Field;
use HubspotSDK\Marketing\Forms\MarketingFormsFieldGroup\GroupType;
use HubspotSDK\Marketing\Forms\MarketingFormsFieldGroup\RichTextType;

/**
 * @phpstan-type marketing_forms_field_group = array{
 *   fields: list<MarketingFormsEmailField|MarketingFormsPhoneField|MarketingFormsMobilePhoneField|MarketingFormsSingleLineTextField|MarketingFormsMultiLineTextField|MarketingFormsNumberField|MarketingFormsSingleCheckboxField|MarketingFormsMultipleCheckboxesField|MarketingFormsDropdownField|MarketingFormsRadioField|MarketingFormsDatepickerField|MarketingFormsFileField|MarketingFormsPaymentLinkRadioField>,
 *   groupType: value-of<GroupType>,
 *   richTextType: value-of<RichTextType>,
 *   richText?: string,
 * }
 */
final class MarketingFormsFieldGroup implements BaseModel
{
    /** @use SdkModel<marketing_forms_field_group> */
    use SdkModel;

    /**
     * @var list<MarketingFormsEmailField|MarketingFormsPhoneField|MarketingFormsMobilePhoneField|MarketingFormsSingleLineTextField|MarketingFormsMultiLineTextField|MarketingFormsNumberField|MarketingFormsSingleCheckboxField|MarketingFormsMultipleCheckboxesField|MarketingFormsDropdownField|MarketingFormsRadioField|MarketingFormsDatepickerField|MarketingFormsFileField|MarketingFormsPaymentLinkRadioField> $fields
     */
    #[Api(list: Field::class)]
    public array $fields;

    /** @var value-of<GroupType> $groupType */
    #[Api(enum: GroupType::class)]
    public string $groupType;

    /** @var value-of<RichTextType> $richTextType */
    #[Api(enum: RichTextType::class)]
    public string $richTextType;

    #[Api(optional: true)]
    public ?string $richText;

    /**
     * `new MarketingFormsFieldGroup()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * MarketingFormsFieldGroup::with(fields: ..., groupType: ..., richTextType: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new MarketingFormsFieldGroup)
     *   ->withFields(...)
     *   ->withGroupType(...)
     *   ->withRichTextType(...)
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
     * @param list<MarketingFormsEmailField|MarketingFormsPhoneField|MarketingFormsMobilePhoneField|MarketingFormsSingleLineTextField|MarketingFormsMultiLineTextField|MarketingFormsNumberField|MarketingFormsSingleCheckboxField|MarketingFormsMultipleCheckboxesField|MarketingFormsDropdownField|MarketingFormsRadioField|MarketingFormsDatepickerField|MarketingFormsFileField|MarketingFormsPaymentLinkRadioField> $fields
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
        $obj->groupType = $groupType instanceof GroupType ? $groupType->value : $groupType;
        $obj->richTextType = $richTextType instanceof RichTextType ? $richTextType->value : $richTextType;

        null !== $richText && $obj->richText = $richText;

        return $obj;
    }

    /**
     * @param list<MarketingFormsEmailField|MarketingFormsPhoneField|MarketingFormsMobilePhoneField|MarketingFormsSingleLineTextField|MarketingFormsMultiLineTextField|MarketingFormsNumberField|MarketingFormsSingleCheckboxField|MarketingFormsMultipleCheckboxesField|MarketingFormsDropdownField|MarketingFormsRadioField|MarketingFormsDatepickerField|MarketingFormsFileField|MarketingFormsPaymentLinkRadioField> $fields
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
        $obj->groupType = $groupType instanceof GroupType ? $groupType->value : $groupType;

        return $obj;
    }

    /**
     * @param RichTextType|value-of<RichTextType> $richTextType
     */
    public function withRichTextType(RichTextType|string $richTextType): self
    {
        $obj = clone $this;
        $obj->richTextType = $richTextType instanceof RichTextType ? $richTextType->value : $richTextType;

        return $obj;
    }

    public function withRichText(string $richText): self
    {
        $obj = clone $this;
        $obj->richText = $richText;

        return $obj;
    }
}
