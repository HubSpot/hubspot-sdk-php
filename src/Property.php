<?php

declare(strict_types=1);

namespace HubspotSDK;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\Property\DataSensitivity;

/**
 * Defines a property.
 *
 * @phpstan-type PropertyShape = array{
 *   description: string,
 *   fieldType: string,
 *   groupName: string,
 *   label: string,
 *   name: string,
 *   options: list<Option>,
 *   type: string,
 *   archived?: bool|null,
 *   archivedAt?: \DateTimeInterface|null,
 *   calculated?: bool|null,
 *   calculationFormula?: string|null,
 *   createdAt?: \DateTimeInterface|null,
 *   createdUserID?: string|null,
 *   dataSensitivity?: value-of<DataSensitivity>|null,
 *   displayOrder?: int|null,
 *   externalOptions?: bool|null,
 *   formField?: bool|null,
 *   hasUniqueValue?: bool|null,
 *   hidden?: bool|null,
 *   hubspotDefined?: bool|null,
 *   modificationMetadata?: PropertyModificationMetadata|null,
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
     * Indicates the sensitivity level of the property, such as "non_sensitive", "sensitive", or "highly_sensitive".
     *
     * @var value-of<DataSensitivity>|null $dataSensitivity
     */
    #[Optional(enum: DataSensitivity::class)]
    public ?string $dataSensitivity;

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
     * Whether or not the property will be hidden from the HubSpot UI. It's recommended that this be set to false for custom properties.
     */
    #[Optional]
    public ?bool $hidden;

    /**
     * This will be true for default object properties built into HubSpot.
     */
    #[Optional]
    public ?bool $hubspotDefined;

    #[Optional]
    public ?PropertyModificationMetadata $modificationMetadata;

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
     * The timestamp when the property was last updated, in ISO 8601 format.
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
     * @param list<Option|array{
     *   hidden: bool,
     *   label: string,
     *   value: string,
     *   description?: string|null,
     *   displayOrder?: int|null,
     * }> $options
     * @param DataSensitivity|value-of<DataSensitivity> $dataSensitivity
     * @param PropertyModificationMetadata|array{
     *   archivable: bool,
     *   readOnlyDefinition: bool,
     *   readOnlyValue: bool,
     *   readOnlyOptions?: bool|null,
     * } $modificationMetadata
     * @param list<string> $sensitiveDataCategories
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
        $obj = new self;

        $obj['description'] = $description;
        $obj['fieldType'] = $fieldType;
        $obj['groupName'] = $groupName;
        $obj['label'] = $label;
        $obj['name'] = $name;
        $obj['options'] = $options;
        $obj['type'] = $type;

        null !== $archived && $obj['archived'] = $archived;
        null !== $archivedAt && $obj['archivedAt'] = $archivedAt;
        null !== $calculated && $obj['calculated'] = $calculated;
        null !== $calculationFormula && $obj['calculationFormula'] = $calculationFormula;
        null !== $createdAt && $obj['createdAt'] = $createdAt;
        null !== $createdUserID && $obj['createdUserID'] = $createdUserID;
        null !== $dataSensitivity && $obj['dataSensitivity'] = $dataSensitivity;
        null !== $displayOrder && $obj['displayOrder'] = $displayOrder;
        null !== $externalOptions && $obj['externalOptions'] = $externalOptions;
        null !== $formField && $obj['formField'] = $formField;
        null !== $hasUniqueValue && $obj['hasUniqueValue'] = $hasUniqueValue;
        null !== $hidden && $obj['hidden'] = $hidden;
        null !== $hubspotDefined && $obj['hubspotDefined'] = $hubspotDefined;
        null !== $modificationMetadata && $obj['modificationMetadata'] = $modificationMetadata;
        null !== $referencedObjectType && $obj['referencedObjectType'] = $referencedObjectType;
        null !== $sensitiveDataCategories && $obj['sensitiveDataCategories'] = $sensitiveDataCategories;
        null !== $showCurrencySymbol && $obj['showCurrencySymbol'] = $showCurrencySymbol;
        null !== $updatedAt && $obj['updatedAt'] = $updatedAt;
        null !== $updatedUserID && $obj['updatedUserID'] = $updatedUserID;

        return $obj;
    }

    /**
     * A description of the property that will be shown as help text in HubSpot.
     */
    public function withDescription(string $description): self
    {
        $obj = clone $this;
        $obj['description'] = $description;

        return $obj;
    }

    /**
     * Controls how the property appears in HubSpot.
     */
    public function withFieldType(string $fieldType): self
    {
        $obj = clone $this;
        $obj['fieldType'] = $fieldType;

        return $obj;
    }

    /**
     * The name of the property group the property belongs to.
     */
    public function withGroupName(string $groupName): self
    {
        $obj = clone $this;
        $obj['groupName'] = $groupName;

        return $obj;
    }

    /**
     * A human-readable property label that will be shown in HubSpot.
     */
    public function withLabel(string $label): self
    {
        $obj = clone $this;
        $obj['label'] = $label;

        return $obj;
    }

    /**
     * The internal property name, which must be used when referencing the property via the API.
     */
    public function withName(string $name): self
    {
        $obj = clone $this;
        $obj['name'] = $name;

        return $obj;
    }

    /**
     * A list of valid options for the property. This field is required for enumerated properties, but will be empty for other property types.
     *
     * @param list<Option|array{
     *   hidden: bool,
     *   label: string,
     *   value: string,
     *   description?: string|null,
     *   displayOrder?: int|null,
     * }> $options
     */
    public function withOptions(array $options): self
    {
        $obj = clone $this;
        $obj['options'] = $options;

        return $obj;
    }

    /**
     * The property data type.
     */
    public function withType(string $type): self
    {
        $obj = clone $this;
        $obj['type'] = $type;

        return $obj;
    }

    /**
     * Whether or not the property is archived.
     */
    public function withArchived(bool $archived): self
    {
        $obj = clone $this;
        $obj['archived'] = $archived;

        return $obj;
    }

    /**
     * When the property was archived.
     */
    public function withArchivedAt(\DateTimeInterface $archivedAt): self
    {
        $obj = clone $this;
        $obj['archivedAt'] = $archivedAt;

        return $obj;
    }

    /**
     * For default properties, true indicates that the property is calculated by a HubSpot process. It has no effect for custom properties.
     */
    public function withCalculated(bool $calculated): self
    {
        $obj = clone $this;
        $obj['calculated'] = $calculated;

        return $obj;
    }

    /**
     * The formula used for calculated properties.
     */
    public function withCalculationFormula(string $calculationFormula): self
    {
        $obj = clone $this;
        $obj['calculationFormula'] = $calculationFormula;

        return $obj;
    }

    /**
     * When the property was created.
     */
    public function withCreatedAt(\DateTimeInterface $createdAt): self
    {
        $obj = clone $this;
        $obj['createdAt'] = $createdAt;

        return $obj;
    }

    /**
     * The internal ID of the user who created the property in HubSpot. This field may not exist if the property was created outside of HubSpot.
     */
    public function withCreatedUserID(string $createdUserID): self
    {
        $obj = clone $this;
        $obj['createdUserID'] = $createdUserID;

        return $obj;
    }

    /**
     * Indicates the sensitivity level of the property, such as "non_sensitive", "sensitive", or "highly_sensitive".
     *
     * @param DataSensitivity|value-of<DataSensitivity> $dataSensitivity
     */
    public function withDataSensitivity(
        DataSensitivity|string $dataSensitivity
    ): self {
        $obj = clone $this;
        $obj['dataSensitivity'] = $dataSensitivity;

        return $obj;
    }

    /**
     * The order that this property should be displayed in the HubSpot UI relative to other properties for this object type. Properties are displayed in order starting with the lowest positive integer value. A value of -1 will cause the property to be displayed **after** any positive values.
     */
    public function withDisplayOrder(int $displayOrder): self
    {
        $obj = clone $this;
        $obj['displayOrder'] = $displayOrder;

        return $obj;
    }

    /**
     * For default properties, true indicates that the options are stored externally to the property settings.
     */
    public function withExternalOptions(bool $externalOptions): self
    {
        $obj = clone $this;
        $obj['externalOptions'] = $externalOptions;

        return $obj;
    }

    /**
     * Whether or not the property can be used in a HubSpot form.
     */
    public function withFormField(bool $formField): self
    {
        $obj = clone $this;
        $obj['formField'] = $formField;

        return $obj;
    }

    /**
     * Whether or not the property's value must be unique. Once set, this can't be changed.
     */
    public function withHasUniqueValue(bool $hasUniqueValue): self
    {
        $obj = clone $this;
        $obj['hasUniqueValue'] = $hasUniqueValue;

        return $obj;
    }

    /**
     * Whether or not the property will be hidden from the HubSpot UI. It's recommended that this be set to false for custom properties.
     */
    public function withHidden(bool $hidden): self
    {
        $obj = clone $this;
        $obj['hidden'] = $hidden;

        return $obj;
    }

    /**
     * This will be true for default object properties built into HubSpot.
     */
    public function withHubspotDefined(bool $hubspotDefined): self
    {
        $obj = clone $this;
        $obj['hubspotDefined'] = $hubspotDefined;

        return $obj;
    }

    /**
     * @param PropertyModificationMetadata|array{
     *   archivable: bool,
     *   readOnlyDefinition: bool,
     *   readOnlyValue: bool,
     *   readOnlyOptions?: bool|null,
     * } $modificationMetadata
     */
    public function withModificationMetadata(
        PropertyModificationMetadata|array $modificationMetadata
    ): self {
        $obj = clone $this;
        $obj['modificationMetadata'] = $modificationMetadata;

        return $obj;
    }

    /**
     * If this property is related to other object(s), they'll be listed here.
     */
    public function withReferencedObjectType(string $referencedObjectType): self
    {
        $obj = clone $this;
        $obj['referencedObjectType'] = $referencedObjectType;

        return $obj;
    }

    /**
     * When sensitiveData is true, lists the type of sensitive data contained in the property (e.g., "HIPAA").
     *
     * @param list<string> $sensitiveDataCategories
     */
    public function withSensitiveDataCategories(
        array $sensitiveDataCategories
    ): self {
        $obj = clone $this;
        $obj['sensitiveDataCategories'] = $sensitiveDataCategories;

        return $obj;
    }

    /**
     * Whether the property will display the currency symbol set in the account settings.
     */
    public function withShowCurrencySymbol(bool $showCurrencySymbol): self
    {
        $obj = clone $this;
        $obj['showCurrencySymbol'] = $showCurrencySymbol;

        return $obj;
    }

    /**
     * The timestamp when the property was last updated, in ISO 8601 format.
     */
    public function withUpdatedAt(\DateTimeInterface $updatedAt): self
    {
        $obj = clone $this;
        $obj['updatedAt'] = $updatedAt;

        return $obj;
    }

    /**
     * The internal user ID of the user who updated the property in HubSpot. This field may not exist if the property was updated outside of HubSpot.
     */
    public function withUpdatedUserID(string $updatedUserID): self
    {
        $obj = clone $this;
        $obj['updatedUserID'] = $updatedUserID;

        return $obj;
    }
}
