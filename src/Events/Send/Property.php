<?php

declare(strict_types=1);

namespace HubspotSDK\Events\Send;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\Events\Send\Property\DataSensitivity;
use HubspotSDK\Events\Send\Property\DateDisplayHint;

/**
 * A HubSpot property.
 *
 * @phpstan-import-type OptionShape from \HubspotSDK\Events\Send\Option
 * @phpstan-import-type PropertyModificationMetadataShape from \HubspotSDK\Events\Send\PropertyModificationMetadata
 *
 * @phpstan-type PropertyShape = array{
 *   description: string,
 *   fieldType: string,
 *   groupName: string,
 *   label: string,
 *   name: string,
 *   options: list<Option|OptionShape>,
 *   type: string,
 *   archived?: bool|null,
 *   archivedAt?: \DateTimeInterface|null,
 *   calculated?: bool|null,
 *   calculationFormula?: string|null,
 *   createdAt?: \DateTimeInterface|null,
 *   createdUserID?: string|null,
 *   dataSensitivity?: null|DataSensitivity|value-of<DataSensitivity>,
 *   dateDisplayHint?: null|DateDisplayHint|value-of<DateDisplayHint>,
 *   displayOrder?: int|null,
 *   externalOptions?: bool|null,
 *   formField?: bool|null,
 *   hasUniqueValue?: bool|null,
 *   hidden?: bool|null,
 *   hubspotDefined?: bool|null,
 *   modificationMetadata?: null|PropertyModificationMetadata|PropertyModificationMetadataShape,
 *   referencedObjectType?: string|null,
 *   sensitiveDataCategories?: list<string>|null,
 *   showCurrencySymbol?: bool|null,
 *   updatedAt?: \DateTimeInterface|null,
 *   updatedUserID?: string|null,
 * }
 */
final class Property implements BaseModel
{
    /** @use SdkModel<PropertyShape> */
    use SdkModel;

    /**
     * A summary of the property's purpose.
     */
    #[Required]
    public string $description;

    /**
     * Determines how the property will appear in HubSpot's UI or on a form. Learn more in the properties API guide.
     */
    #[Required]
    public string $fieldType;

    /**
     * The name of the group to which the property is assigned.
     */
    #[Required]
    public string $groupName;

    /**
     * The display label for the property.
     */
    #[Required]
    public string $label;

    /**
     * The internal name for the property.
     */
    #[Required]
    public string $name;

    /**
     * A list of valid options for the property. This field is required for enumerated properties.
     *
     * @var list<Option> $options
     */
    #[Required(list: Option::class)]
    public array $options;

    /**
     * The data type of the property, such as string or number.
     */
    #[Required]
    public string $type;

    /**
     * Whether the property is archived.
     */
    #[Optional]
    public ?bool $archived;

    /**
     * The timestamp when the property was archived, in ISO 8601 format.
     */
    #[Optional]
    public ?\DateTimeInterface $archivedAt;

    /**
     * Whether the property is a calculated field.
     */
    #[Optional]
    public ?bool $calculated;

    /**
     * The formula used for calculated properties.
     */
    #[Optional]
    public ?string $calculationFormula;

    /**
     * The timestamp when the property was created, in ISO 8601 format.
     */
    #[Optional]
    public ?\DateTimeInterface $createdAt;

    /**
     * The ID of the user who created the property.
     */
    #[Optional('createdUserId')]
    public ?string $createdUserID;

    /**
     * Indicates the sensitivity level of the property, such as "non_sensitive", "sensitive", or "highly_sensitive".
     *
     * @var value-of<DataSensitivity>|null $dataSensitivity
     */
    #[Optional(enum: DataSensitivity::class)]
    public ?string $dataSensitivity;

    /** @var value-of<DateDisplayHint>|null $dateDisplayHint */
    #[Optional(enum: DateDisplayHint::class)]
    public ?string $dateDisplayHint;

    /**
     * The position of the item relative to others in the list.
     */
    #[Optional]
    public ?int $displayOrder;

    /**
     * Applicable only for enumeration type properties. Should be set to true with a 'referencedObjectType' of 'OWNER'. Otherwise false.
     */
    #[Optional]
    public ?bool $externalOptions;

    /**
     * Whether the property can appear on forms.
     */
    #[Optional]
    public ?bool $formField;

    /**
     * Whether the property is a unique identifier property.
     */
    #[Optional]
    public ?bool $hasUniqueValue;

    /**
     * Whether or not the property will be hidden from the HubSpot UI. It's recommended that this be set to false for custom properties.
     */
    #[Optional]
    public ?bool $hidden;

    /**
     * A boolean value set to true for HubSpot default properties.
     */
    #[Optional]
    public ?bool $hubspotDefined;

    #[Optional]
    public ?PropertyModificationMetadata $modificationMetadata;

    /**
     * Deprecated. Use externalOptionsReferenceType instead.
     */
    #[Optional]
    public ?string $referencedObjectType;

    /**
     * When sensitiveData is true, lists the type of sensitive data contained in the property (e.g., "HIPAA").
     *
     * @var list<string>|null $sensitiveDataCategories
     */
    #[Optional(list: 'string')]
    public ?array $sensitiveDataCategories;

    /**
     * Whether to show the currency symbol in HubSpot's UI.
     */
    #[Optional]
    public ?bool $showCurrencySymbol;

    /**
     * The timestamp when the property was last updated, in ISO 8601 format.
     */
    #[Optional]
    public ?\DateTimeInterface $updatedAt;

    #[Optional('updatedUserId')]
    public ?string $updatedUserID;

    /**
     * `new Property()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * Property::with(
     *   description: ...,
     *   fieldType: ...,
     *   groupName: ...,
     *   label: ...,
     *   name: ...,
     *   options: ...,
     *   type: ...,
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new Property)
     *   ->withDescription(...)
     *   ->withFieldType(...)
     *   ->withGroupName(...)
     *   ->withLabel(...)
     *   ->withName(...)
     *   ->withOptions(...)
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
     * @param list<Option|OptionShape> $options
     * @param DataSensitivity|value-of<DataSensitivity>|null $dataSensitivity
     * @param DateDisplayHint|value-of<DateDisplayHint>|null $dateDisplayHint
     * @param PropertyModificationMetadata|PropertyModificationMetadataShape|null $modificationMetadata
     * @param list<string>|null $sensitiveDataCategories
     */
    public static function with(
        string $description,
        string $fieldType,
        string $groupName,
        string $label,
        string $name,
        array $options,
        string $type,
        ?bool $archived = null,
        ?\DateTimeInterface $archivedAt = null,
        ?bool $calculated = null,
        ?string $calculationFormula = null,
        ?\DateTimeInterface $createdAt = null,
        ?string $createdUserID = null,
        DataSensitivity|string|null $dataSensitivity = null,
        DateDisplayHint|string|null $dateDisplayHint = null,
        ?int $displayOrder = null,
        ?bool $externalOptions = null,
        ?bool $formField = null,
        ?bool $hasUniqueValue = null,
        ?bool $hidden = null,
        ?bool $hubspotDefined = null,
        PropertyModificationMetadata|array|null $modificationMetadata = null,
        ?string $referencedObjectType = null,
        ?array $sensitiveDataCategories = null,
        ?bool $showCurrencySymbol = null,
        ?\DateTimeInterface $updatedAt = null,
        ?string $updatedUserID = null,
    ): self {
        $self = new self;

        $self['description'] = $description;
        $self['fieldType'] = $fieldType;
        $self['groupName'] = $groupName;
        $self['label'] = $label;
        $self['name'] = $name;
        $self['options'] = $options;
        $self['type'] = $type;

        null !== $archived && $self['archived'] = $archived;
        null !== $archivedAt && $self['archivedAt'] = $archivedAt;
        null !== $calculated && $self['calculated'] = $calculated;
        null !== $calculationFormula && $self['calculationFormula'] = $calculationFormula;
        null !== $createdAt && $self['createdAt'] = $createdAt;
        null !== $createdUserID && $self['createdUserID'] = $createdUserID;
        null !== $dataSensitivity && $self['dataSensitivity'] = $dataSensitivity;
        null !== $dateDisplayHint && $self['dateDisplayHint'] = $dateDisplayHint;
        null !== $displayOrder && $self['displayOrder'] = $displayOrder;
        null !== $externalOptions && $self['externalOptions'] = $externalOptions;
        null !== $formField && $self['formField'] = $formField;
        null !== $hasUniqueValue && $self['hasUniqueValue'] = $hasUniqueValue;
        null !== $hidden && $self['hidden'] = $hidden;
        null !== $hubspotDefined && $self['hubspotDefined'] = $hubspotDefined;
        null !== $modificationMetadata && $self['modificationMetadata'] = $modificationMetadata;
        null !== $referencedObjectType && $self['referencedObjectType'] = $referencedObjectType;
        null !== $sensitiveDataCategories && $self['sensitiveDataCategories'] = $sensitiveDataCategories;
        null !== $showCurrencySymbol && $self['showCurrencySymbol'] = $showCurrencySymbol;
        null !== $updatedAt && $self['updatedAt'] = $updatedAt;
        null !== $updatedUserID && $self['updatedUserID'] = $updatedUserID;

        return $self;
    }

    /**
     * A summary of the property's purpose.
     */
    public function withDescription(string $description): self
    {
        $self = clone $this;
        $self['description'] = $description;

        return $self;
    }

    /**
     * Determines how the property will appear in HubSpot's UI or on a form. Learn more in the properties API guide.
     */
    public function withFieldType(string $fieldType): self
    {
        $self = clone $this;
        $self['fieldType'] = $fieldType;

        return $self;
    }

    /**
     * The name of the group to which the property is assigned.
     */
    public function withGroupName(string $groupName): self
    {
        $self = clone $this;
        $self['groupName'] = $groupName;

        return $self;
    }

    /**
     * The display label for the property.
     */
    public function withLabel(string $label): self
    {
        $self = clone $this;
        $self['label'] = $label;

        return $self;
    }

    /**
     * The internal name for the property.
     */
    public function withName(string $name): self
    {
        $self = clone $this;
        $self['name'] = $name;

        return $self;
    }

    /**
     * A list of valid options for the property. This field is required for enumerated properties.
     *
     * @param list<Option|OptionShape> $options
     */
    public function withOptions(array $options): self
    {
        $self = clone $this;
        $self['options'] = $options;

        return $self;
    }

    /**
     * The data type of the property, such as string or number.
     */
    public function withType(string $type): self
    {
        $self = clone $this;
        $self['type'] = $type;

        return $self;
    }

    /**
     * Whether the property is archived.
     */
    public function withArchived(bool $archived): self
    {
        $self = clone $this;
        $self['archived'] = $archived;

        return $self;
    }

    /**
     * The timestamp when the property was archived, in ISO 8601 format.
     */
    public function withArchivedAt(\DateTimeInterface $archivedAt): self
    {
        $self = clone $this;
        $self['archivedAt'] = $archivedAt;

        return $self;
    }

    /**
     * Whether the property is a calculated field.
     */
    public function withCalculated(bool $calculated): self
    {
        $self = clone $this;
        $self['calculated'] = $calculated;

        return $self;
    }

    /**
     * The formula used for calculated properties.
     */
    public function withCalculationFormula(string $calculationFormula): self
    {
        $self = clone $this;
        $self['calculationFormula'] = $calculationFormula;

        return $self;
    }

    /**
     * The timestamp when the property was created, in ISO 8601 format.
     */
    public function withCreatedAt(\DateTimeInterface $createdAt): self
    {
        $self = clone $this;
        $self['createdAt'] = $createdAt;

        return $self;
    }

    /**
     * The ID of the user who created the property.
     */
    public function withCreatedUserID(string $createdUserID): self
    {
        $self = clone $this;
        $self['createdUserID'] = $createdUserID;

        return $self;
    }

    /**
     * Indicates the sensitivity level of the property, such as "non_sensitive", "sensitive", or "highly_sensitive".
     *
     * @param DataSensitivity|value-of<DataSensitivity> $dataSensitivity
     */
    public function withDataSensitivity(
        DataSensitivity|string $dataSensitivity
    ): self {
        $self = clone $this;
        $self['dataSensitivity'] = $dataSensitivity;

        return $self;
    }

    /**
     * @param DateDisplayHint|value-of<DateDisplayHint> $dateDisplayHint
     */
    public function withDateDisplayHint(
        DateDisplayHint|string $dateDisplayHint
    ): self {
        $self = clone $this;
        $self['dateDisplayHint'] = $dateDisplayHint;

        return $self;
    }

    /**
     * The position of the item relative to others in the list.
     */
    public function withDisplayOrder(int $displayOrder): self
    {
        $self = clone $this;
        $self['displayOrder'] = $displayOrder;

        return $self;
    }

    /**
     * Applicable only for enumeration type properties. Should be set to true with a 'referencedObjectType' of 'OWNER'. Otherwise false.
     */
    public function withExternalOptions(bool $externalOptions): self
    {
        $self = clone $this;
        $self['externalOptions'] = $externalOptions;

        return $self;
    }

    /**
     * Whether the property can appear on forms.
     */
    public function withFormField(bool $formField): self
    {
        $self = clone $this;
        $self['formField'] = $formField;

        return $self;
    }

    /**
     * Whether the property is a unique identifier property.
     */
    public function withHasUniqueValue(bool $hasUniqueValue): self
    {
        $self = clone $this;
        $self['hasUniqueValue'] = $hasUniqueValue;

        return $self;
    }

    /**
     * Whether or not the property will be hidden from the HubSpot UI. It's recommended that this be set to false for custom properties.
     */
    public function withHidden(bool $hidden): self
    {
        $self = clone $this;
        $self['hidden'] = $hidden;

        return $self;
    }

    /**
     * A boolean value set to true for HubSpot default properties.
     */
    public function withHubspotDefined(bool $hubspotDefined): self
    {
        $self = clone $this;
        $self['hubspotDefined'] = $hubspotDefined;

        return $self;
    }

    /**
     * @param PropertyModificationMetadata|PropertyModificationMetadataShape $modificationMetadata
     */
    public function withModificationMetadata(
        PropertyModificationMetadata|array $modificationMetadata
    ): self {
        $self = clone $this;
        $self['modificationMetadata'] = $modificationMetadata;

        return $self;
    }

    /**
     * Deprecated. Use externalOptionsReferenceType instead.
     */
    public function withReferencedObjectType(string $referencedObjectType): self
    {
        $self = clone $this;
        $self['referencedObjectType'] = $referencedObjectType;

        return $self;
    }

    /**
     * When sensitiveData is true, lists the type of sensitive data contained in the property (e.g., "HIPAA").
     *
     * @param list<string> $sensitiveDataCategories
     */
    public function withSensitiveDataCategories(
        array $sensitiveDataCategories
    ): self {
        $self = clone $this;
        $self['sensitiveDataCategories'] = $sensitiveDataCategories;

        return $self;
    }

    /**
     * Whether to show the currency symbol in HubSpot's UI.
     */
    public function withShowCurrencySymbol(bool $showCurrencySymbol): self
    {
        $self = clone $this;
        $self['showCurrencySymbol'] = $showCurrencySymbol;

        return $self;
    }

    /**
     * The timestamp when the property was last updated, in ISO 8601 format.
     */
    public function withUpdatedAt(\DateTimeInterface $updatedAt): self
    {
        $self = clone $this;
        $self['updatedAt'] = $updatedAt;

        return $self;
    }

    public function withUpdatedUserID(string $updatedUserID): self
    {
        $self = clone $this;
        $self['updatedUserID'] = $updatedUserID;

        return $self;
    }
}
