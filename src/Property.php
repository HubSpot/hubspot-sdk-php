<?php

declare(strict_types=1);

namespace HubSpotSDK;

use HubSpotSDK\Core\Attributes\Optional;
use HubSpotSDK\Core\Attributes\Required;
use HubSpotSDK\Core\Concerns\SdkModel;
use HubSpotSDK\Core\Contracts\BaseModel;
use HubSpotSDK\Property\DataSensitivity;
use HubSpotSDK\Property\DateDisplayHint;
use HubSpotSDK\Property\NumberDisplayHint;

/**
 * A HubSpot property.
 *
 * @phpstan-import-type OptionShape from \HubSpotSDK\Option
 * @phpstan-import-type PropertyModificationMetadataShape from \HubSpotSDK\PropertyModificationMetadata
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
 *   currencyPropertyName?: string|null,
 *   dataSensitivity?: null|DataSensitivity|value-of<DataSensitivity>,
 *   dateDisplayHint?: null|DateDisplayHint|value-of<DateDisplayHint>,
 *   displayOrder?: int|null,
 *   externalOptions?: bool|null,
 *   formField?: bool|null,
 *   hasUniqueValue?: bool|null,
 *   hidden?: bool|null,
 *   hubSpotDefined?: bool|null,
 *   modificationMetadata?: null|PropertyModificationMetadata|PropertyModificationMetadataShape,
 *   numberDisplayHint?: null|NumberDisplayHint|value-of<NumberDisplayHint>,
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
     * A description of the property that will be shown as help text in HubSpot.
     */
    #[Required]
    public string $description;

    /**
     * Controls how the property appears in HubSpot.
     */
    #[Required]
    public string $fieldType;

    /**
     * The name of the property group the property belongs to.
     */
    #[Required]
    public string $groupName;

    /**
     * A human-readable property label that will be shown in HubSpot.
     */
    #[Required]
    public string $label;

    /**
     * The internal property name, which must be used when referencing the property via the API.
     */
    #[Required]
    public string $name;

    /**
     * A list of valid options for the property. This field is required for enumerated properties, but will be empty for other property types.
     *
     * @var list<Option> $options
     */
    #[Required(list: Option::class)]
    public array $options;

    /**
     * The property data type.
     */
    #[Required]
    public string $type;

    /**
     * Whether or not the property is archived.
     */
    #[Optional]
    public ?bool $archived;

    /**
     * When the property was archived.
     */
    #[Optional]
    public ?\DateTimeInterface $archivedAt;

    /**
     * For default properties, true indicates that the property is calculated by a HubSpot process. It has no effect for custom properties.
     */
    #[Optional]
    public ?bool $calculated;

    /**
     * The formula used for calculated properties.
     */
    #[Optional]
    public ?string $calculationFormula;

    /**
     * When the property was created.
     */
    #[Optional]
    public ?\DateTimeInterface $createdAt;

    /**
     * The internal ID of the user who created the property in HubSpot. This field may not exist if the property was created outside of HubSpot.
     */
    #[Optional('createdUserId')]
    public ?string $createdUserID;

    /**
     * The name of the related currency property.
     */
    #[Optional]
    public ?string $currencyPropertyName;

    /**
     * Indicates the sensitivity level of the property, such as "non_sensitive", "sensitive", or "highly_sensitive".
     *
     * @var value-of<DataSensitivity>|null $dataSensitivity
     */
    #[Optional(enum: DataSensitivity::class)]
    public ?string $dataSensitivity;

    /**
     * Controls how date properties are displayed in the HubSpot UI, with options such as 'absolute', 'absolute_with_relative', 'time_since', and 'time_until'.
     *
     * @var value-of<DateDisplayHint>|null $dateDisplayHint
     */
    #[Optional(enum: DateDisplayHint::class)]
    public ?string $dateDisplayHint;

    /**
     * The order that this property should be displayed in the HubSpot UI relative to other properties for this object type. Properties are displayed in order starting with the lowest positive integer value. A value of -1 will cause the property to be displayed **after** any positive values.
     */
    #[Optional]
    public ?int $displayOrder;

    /**
     * For default properties, true indicates that the options are stored externally to the property settings.
     */
    #[Optional]
    public ?bool $externalOptions;

    /**
     * Whether or not the property can be used in a HubSpot form.
     */
    #[Optional]
    public ?bool $formField;

    /**
     * Whether or not the property's value must be unique. Once set, this can't be changed.
     */
    #[Optional]
    public ?bool $hasUniqueValue;

    /**
     * Hidden options won't be shown in HubSpot.
     */
    #[Optional]
    public ?bool $hidden;

    /**
     * This will be true for default object properties built into HubSpot.
     */
    #[Optional('hubspotDefined')]
    public ?bool $hubSpotDefined;

    #[Optional]
    public ?PropertyModificationMetadata $modificationMetadata;

    /**
     * Hint for how a number property is displayed and validated in HubSpot's UI. Can be: "unformatted", "formatted", "currency", "percentage", "duration", or "probability".
     *
     * @var value-of<NumberDisplayHint>|null $numberDisplayHint
     */
    #[Optional(enum: NumberDisplayHint::class)]
    public ?string $numberDisplayHint;

    /**
     * If this property is related to other object(s), they'll be listed here.
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
     * Whether the property will display the currency symbol set in the account settings.
     */
    #[Optional]
    public ?bool $showCurrencySymbol;

    /**
     * When the object type was last updated.
     */
    #[Optional]
    public ?\DateTimeInterface $updatedAt;

    /**
     * The internal user ID of the user who updated the property in HubSpot. This field may not exist if the property was updated outside of HubSpot.
     */
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
     * @param NumberDisplayHint|value-of<NumberDisplayHint>|null $numberDisplayHint
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
        ?string $currencyPropertyName = null,
        DataSensitivity|string|null $dataSensitivity = null,
        DateDisplayHint|string|null $dateDisplayHint = null,
        ?int $displayOrder = null,
        ?bool $externalOptions = null,
        ?bool $formField = null,
        ?bool $hasUniqueValue = null,
        ?bool $hidden = null,
        ?bool $hubSpotDefined = null,
        PropertyModificationMetadata|array|null $modificationMetadata = null,
        NumberDisplayHint|string|null $numberDisplayHint = null,
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
        null !== $currencyPropertyName && $self['currencyPropertyName'] = $currencyPropertyName;
        null !== $dataSensitivity && $self['dataSensitivity'] = $dataSensitivity;
        null !== $dateDisplayHint && $self['dateDisplayHint'] = $dateDisplayHint;
        null !== $displayOrder && $self['displayOrder'] = $displayOrder;
        null !== $externalOptions && $self['externalOptions'] = $externalOptions;
        null !== $formField && $self['formField'] = $formField;
        null !== $hasUniqueValue && $self['hasUniqueValue'] = $hasUniqueValue;
        null !== $hidden && $self['hidden'] = $hidden;
        null !== $hubSpotDefined && $self['hubSpotDefined'] = $hubSpotDefined;
        null !== $modificationMetadata && $self['modificationMetadata'] = $modificationMetadata;
        null !== $numberDisplayHint && $self['numberDisplayHint'] = $numberDisplayHint;
        null !== $referencedObjectType && $self['referencedObjectType'] = $referencedObjectType;
        null !== $sensitiveDataCategories && $self['sensitiveDataCategories'] = $sensitiveDataCategories;
        null !== $showCurrencySymbol && $self['showCurrencySymbol'] = $showCurrencySymbol;
        null !== $updatedAt && $self['updatedAt'] = $updatedAt;
        null !== $updatedUserID && $self['updatedUserID'] = $updatedUserID;

        return $self;
    }

    /**
     * A description of the property that will be shown as help text in HubSpot.
     */
    public function withDescription(string $description): self
    {
        $self = clone $this;
        $self['description'] = $description;

        return $self;
    }

    /**
     * Controls how the property appears in HubSpot.
     */
    public function withFieldType(string $fieldType): self
    {
        $self = clone $this;
        $self['fieldType'] = $fieldType;

        return $self;
    }

    /**
     * The name of the property group the property belongs to.
     */
    public function withGroupName(string $groupName): self
    {
        $self = clone $this;
        $self['groupName'] = $groupName;

        return $self;
    }

    /**
     * A human-readable property label that will be shown in HubSpot.
     */
    public function withLabel(string $label): self
    {
        $self = clone $this;
        $self['label'] = $label;

        return $self;
    }

    /**
     * The internal property name, which must be used when referencing the property via the API.
     */
    public function withName(string $name): self
    {
        $self = clone $this;
        $self['name'] = $name;

        return $self;
    }

    /**
     * A list of valid options for the property. This field is required for enumerated properties, but will be empty for other property types.
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
     * The property data type.
     */
    public function withType(string $type): self
    {
        $self = clone $this;
        $self['type'] = $type;

        return $self;
    }

    /**
     * Whether or not the property is archived.
     */
    public function withArchived(bool $archived): self
    {
        $self = clone $this;
        $self['archived'] = $archived;

        return $self;
    }

    /**
     * When the property was archived.
     */
    public function withArchivedAt(\DateTimeInterface $archivedAt): self
    {
        $self = clone $this;
        $self['archivedAt'] = $archivedAt;

        return $self;
    }

    /**
     * For default properties, true indicates that the property is calculated by a HubSpot process. It has no effect for custom properties.
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
     * When the property was created.
     */
    public function withCreatedAt(\DateTimeInterface $createdAt): self
    {
        $self = clone $this;
        $self['createdAt'] = $createdAt;

        return $self;
    }

    /**
     * The internal ID of the user who created the property in HubSpot. This field may not exist if the property was created outside of HubSpot.
     */
    public function withCreatedUserID(string $createdUserID): self
    {
        $self = clone $this;
        $self['createdUserID'] = $createdUserID;

        return $self;
    }

    /**
     * The name of the related currency property.
     */
    public function withCurrencyPropertyName(string $currencyPropertyName): self
    {
        $self = clone $this;
        $self['currencyPropertyName'] = $currencyPropertyName;

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
     * Controls how date properties are displayed in the HubSpot UI, with options such as 'absolute', 'absolute_with_relative', 'time_since', and 'time_until'.
     *
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
     * The order that this property should be displayed in the HubSpot UI relative to other properties for this object type. Properties are displayed in order starting with the lowest positive integer value. A value of -1 will cause the property to be displayed **after** any positive values.
     */
    public function withDisplayOrder(int $displayOrder): self
    {
        $self = clone $this;
        $self['displayOrder'] = $displayOrder;

        return $self;
    }

    /**
     * For default properties, true indicates that the options are stored externally to the property settings.
     */
    public function withExternalOptions(bool $externalOptions): self
    {
        $self = clone $this;
        $self['externalOptions'] = $externalOptions;

        return $self;
    }

    /**
     * Whether or not the property can be used in a HubSpot form.
     */
    public function withFormField(bool $formField): self
    {
        $self = clone $this;
        $self['formField'] = $formField;

        return $self;
    }

    /**
     * Whether or not the property's value must be unique. Once set, this can't be changed.
     */
    public function withHasUniqueValue(bool $hasUniqueValue): self
    {
        $self = clone $this;
        $self['hasUniqueValue'] = $hasUniqueValue;

        return $self;
    }

    /**
     * Hidden options won't be shown in HubSpot.
     */
    public function withHidden(bool $hidden): self
    {
        $self = clone $this;
        $self['hidden'] = $hidden;

        return $self;
    }

    /**
     * This will be true for default object properties built into HubSpot.
     */
    public function withHubSpotDefined(bool $hubSpotDefined): self
    {
        $self = clone $this;
        $self['hubSpotDefined'] = $hubSpotDefined;

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
     * Hint for how a number property is displayed and validated in HubSpot's UI. Can be: "unformatted", "formatted", "currency", "percentage", "duration", or "probability".
     *
     * @param NumberDisplayHint|value-of<NumberDisplayHint> $numberDisplayHint
     */
    public function withNumberDisplayHint(
        NumberDisplayHint|string $numberDisplayHint
    ): self {
        $self = clone $this;
        $self['numberDisplayHint'] = $numberDisplayHint;

        return $self;
    }

    /**
     * If this property is related to other object(s), they'll be listed here.
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
     * Whether the property will display the currency symbol set in the account settings.
     */
    public function withShowCurrencySymbol(bool $showCurrencySymbol): self
    {
        $self = clone $this;
        $self['showCurrencySymbol'] = $showCurrencySymbol;

        return $self;
    }

    /**
     * When the object type was last updated.
     */
    public function withUpdatedAt(\DateTimeInterface $updatedAt): self
    {
        $self = clone $this;
        $self['updatedAt'] = $updatedAt;

        return $self;
    }

    /**
     * The internal user ID of the user who updated the property in HubSpot. This field may not exist if the property was updated outside of HubSpot.
     */
    public function withUpdatedUserID(string $updatedUserID): self
    {
        $self = clone $this;
        $self['updatedUserID'] = $updatedUserID;

        return $self;
    }
}
