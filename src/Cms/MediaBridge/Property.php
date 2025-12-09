<?php

declare(strict_types=1);

namespace HubspotSDK\Cms\MediaBridge;

use HubspotSDK\Cms\MediaBridge\Property\DataSensitivity;
use HubspotSDK\Cms\MediaBridge\Property\DateDisplayHint;
use HubspotSDK\Cms\MediaBridge\Property\DisplayMode;
use HubspotSDK\Cms\MediaBridge\Property\NumberDisplayHint;
use HubspotSDK\Cms\MediaBridge\Property\OptionSortStrategy;
use HubspotSDK\Cms\MediaBridge\Property\ReferencedObjectType;
use HubspotSDK\Cms\MediaBridge\Property\SearchTextAnalysisMode;
use HubspotSDK\Cms\MediaBridge\Property\TextDisplayHint;
use HubspotSDK\Cms\MediaBridge\Property\Type;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\Option;

/**
 * A HubSpot property.
 *
 * @phpstan-type PropertyShape = array{
 *   allowedObjectTypes: list<ObjectTypeIDProto>,
 *   calculated: bool,
 *   canArchive: bool,
 *   canRestore: bool,
 *   createdAt: int,
 *   createdUserID: int,
 *   currencyPropertyName: string,
 *   dataSensitivity: value-of<DataSensitivity>,
 *   dateDisplayHint: value-of<DateDisplayHint>,
 *   deleted: bool,
 *   description: string,
 *   displayMode: value-of<DisplayMode>,
 *   displayOrder: int,
 *   enforceMultivalueUniqueness: bool,
 *   externalOptions: bool,
 *   externalOptionsReferenceType: string,
 *   favorited: bool,
 *   favoritedOrder: int,
 *   fieldType: string,
 *   formField: bool,
 *   fromUserID: int,
 *   groupName: string,
 *   hasUniqueValue: bool,
 *   hidden: bool,
 *   hubspotDefined: bool,
 *   isCustomizedDefault: bool,
 *   isMultiValued: bool,
 *   isPartial: bool,
 *   label: string,
 *   mutableDefinitionNotDeletable: bool,
 *   name: string,
 *   numberDisplayHint: value-of<NumberDisplayHint>,
 *   options: list<Option>,
 *   optionsAreMutable: bool,
 *   optionSortStrategy: value-of<OptionSortStrategy>,
 *   owningAppID: int,
 *   portalID: int,
 *   readOnlyDefinition: bool,
 *   readOnlyValue: bool,
 *   referencedObjectType: value-of<ReferencedObjectType>,
 *   searchableInGlobalSearch: bool,
 *   searchTextAnalysisMode: value-of<SearchTextAnalysisMode>,
 *   sensitiveDataCategories: list<string>,
 *   showCurrencySymbol: bool,
 *   textDisplayHint: value-of<TextDisplayHint>,
 *   type: value-of<Type>,
 *   updatedAt: int,
 * }
 */
final class Property implements BaseModel
{
    /** @use SdkModel<PropertyShape> */
    use SdkModel;

    /**
     * Object types permitted to use this property.
     *
     * @var list<ObjectTypeIDProto> $allowedObjectTypes
     */
    #[Required(list: ObjectTypeIDProto::class)]
    public array $allowedObjectTypes;

    /**
     * Whether the property is a calculated field.
     */
    #[Required]
    public bool $calculated;

    #[Required]
    public bool $canArchive;

    #[Required]
    public bool $canRestore;

    /**
     * The timestamp when the property was created, in ISO 8601 format.
     */
    #[Required]
    public int $createdAt;

    /**
     * The ID of the user who created the property.
     */
    #[Required('createdUserId')]
    public int $createdUserID;

    /**
     * The name of the related currency property.
     */
    #[Required]
    public string $currencyPropertyName;

    /**
     * Indicates the sensitivity level of the property, such as "non_sensitive", "sensitive", or "highly_sensitive".
     *
     * @var value-of<DataSensitivity> $dataSensitivity
     */
    #[Required(enum: DataSensitivity::class)]
    public string $dataSensitivity;

    /** @var value-of<DateDisplayHint> $dateDisplayHint */
    #[Required(enum: DateDisplayHint::class)]
    public string $dateDisplayHint;

    /**
     * Whether the property has been deleted.
     */
    #[Required]
    public bool $deleted;

    /**
     * A summary of the property's purpose.
     */
    #[Required]
    public string $description;

    /**
     * The mode in which the property is displayed. Can be: "current_value" or "all_unique_versions".
     *
     * @var value-of<DisplayMode> $displayMode
     */
    #[Required(enum: DisplayMode::class)]
    public string $displayMode;

    /**
     * The position of the item relative to others in the list.
     */
    #[Required]
    public int $displayOrder;

    #[Required]
    public bool $enforceMultivalueUniqueness;

    /**
     * Applicable only for enumeration type properties. Should be set to true with a 'referencedObjectType' of 'OWNER'. Otherwise false.
     */
    #[Required]
    public bool $externalOptions;

    /**
     * When externalOptions is true, indicates the property's option values will be populated from other systems (e.g., "OWNER" for the hubspot_owner_id property).
     */
    #[Required]
    public string $externalOptionsReferenceType;

    /**
     * Deprecated. Whether the property is marked as a favorite.
     */
    #[Required]
    public bool $favorited;

    /**
     * Deprecated. The order position when marked as favorited.
     */
    #[Required]
    public int $favoritedOrder;

    /**
     * Determines how the property will appear in HubSpot's UI or on a form. Learn more in the properties API guide.
     */
    #[Required]
    public string $fieldType;

    /**
     * Whether the property can appear on forms.
     */
    #[Required]
    public bool $formField;

    /**
     * The ID of the user who last updated the property.
     */
    #[Required('fromUserId')]
    public int $fromUserID;

    /**
     * The name of the group to which the property is assigned.
     */
    #[Required]
    public string $groupName;

    /**
     * Whether the property is a unique identifier property.
     */
    #[Required]
    public bool $hasUniqueValue;

    /**
     * Whether or not the property will be hidden from the HubSpot UI. It's recommended that this be set to false for custom properties.
     */
    #[Required]
    public bool $hidden;

    /**
     * A boolean value set to true for HubSpot default properties.
     */
    #[Required]
    public bool $hubspotDefined;

    /**
     * For default properties, whether the property has been customized. Equivalent to the 'isCustomizedDefault' field.
     */
    #[Required]
    public bool $isCustomizedDefault;

    /**
     * Whether the property can contain multiple values.
     */
    #[Required]
    public bool $isMultiValued;

    /**
     * For default properties, whether the property has been customized. Equivalent to the 'isCustomizedDefault' field.
     */
    #[Required]
    public bool $isPartial;

    /**
     * The display label for the property.
     */
    #[Required]
    public string $label;

    /**
     * Whether the property definition can be customized but not deleted.
     */
    #[Required]
    public bool $mutableDefinitionNotDeletable;

    /**
     * The internal name for the property.
     */
    #[Required]
    public string $name;

    /**
     * Hint for how a number property is displayed and validated in HubSpot's UI. Can be: "unformatted", "formatted", "currency", "percentage", "duration", or "probability".
     *
     * @var value-of<NumberDisplayHint> $numberDisplayHint
     */
    #[Required(enum: NumberDisplayHint::class)]
    public string $numberDisplayHint;

    /**
     * A list of valid options for the property. This field is required for enumerated properties.
     *
     * @var list<Option> $options
     */
    #[Required(list: Option::class)]
    public array $options;

    /**
     * Whether options can be modified after creation.
     */
    #[Required]
    public bool $optionsAreMutable;

    /**
     * Specifies how to sort property options. Can be either "DISPLAY_ORDER" to defer to the displayOrder field, or "ALPHABETICAL".
     *
     * @var value-of<OptionSortStrategy> $optionSortStrategy
     */
    #[Required(enum: OptionSortStrategy::class)]
    public string $optionSortStrategy;

    #[Required('owningAppId')]
    public int $owningAppID;

    /**
     * The ID of the HubSpot account where the property is defined.
     */
    #[Required('portalId')]
    public int $portalID;

    /**
     * Whether the property's description is read-only.
     */
    #[Required]
    public bool $readOnlyDefinition;

    /**
     * Indicates if the property's value is read-only.
     */
    #[Required]
    public bool $readOnlyValue;

    /**
     * Deprecated. Use externalOptionsReferenceType instead.
     *
     * @var value-of<ReferencedObjectType> $referencedObjectType
     */
    #[Required(enum: ReferencedObjectType::class)]
    public string $referencedObjectType;

    /**
     * Whether the property is searchable globaly.
     */
    #[Required]
    public bool $searchableInGlobalSearch;

    /** @var value-of<SearchTextAnalysisMode> $searchTextAnalysisMode */
    #[Required(enum: SearchTextAnalysisMode::class)]
    public string $searchTextAnalysisMode;

    /**
     * When sensitiveData is true, lists the type of sensitive data contained in the property (e.g., "HIPAA").
     *
     * @var list<string> $sensitiveDataCategories
     */
    #[Required(list: 'string')]
    public array $sensitiveDataCategories;

    /**
     * Whether to show the currency symbol in HubSpot's UI.
     */
    #[Required]
    public bool $showCurrencySymbol;

    /**
     * Hint for how the text is displayed and validated in HubSpot's UI. Can be: "unformatted_single_line", "multi_line", "email", "phone_number", "domain_name", "ip_address", "physical_address", or "postal_code".
     *
     * @var value-of<TextDisplayHint> $textDisplayHint
     */
    #[Required(enum: TextDisplayHint::class)]
    public string $textDisplayHint;

    /**
     * The data type of the property, such as string or number.
     *
     * @var value-of<Type> $type
     */
    #[Required(enum: Type::class)]
    public string $type;

    /**
     * The timestamp when the property was last updated, in ISO 8601 format.
     */
    #[Required]
    public int $updatedAt;

    /**
     * `new Property()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * Property::with(
     *   allowedObjectTypes: ...,
     *   calculated: ...,
     *   canArchive: ...,
     *   canRestore: ...,
     *   createdAt: ...,
     *   createdUserID: ...,
     *   currencyPropertyName: ...,
     *   dataSensitivity: ...,
     *   dateDisplayHint: ...,
     *   deleted: ...,
     *   description: ...,
     *   displayMode: ...,
     *   displayOrder: ...,
     *   enforceMultivalueUniqueness: ...,
     *   externalOptions: ...,
     *   externalOptionsReferenceType: ...,
     *   favorited: ...,
     *   favoritedOrder: ...,
     *   fieldType: ...,
     *   formField: ...,
     *   fromUserID: ...,
     *   groupName: ...,
     *   hasUniqueValue: ...,
     *   hidden: ...,
     *   hubspotDefined: ...,
     *   isCustomizedDefault: ...,
     *   isMultiValued: ...,
     *   isPartial: ...,
     *   label: ...,
     *   mutableDefinitionNotDeletable: ...,
     *   name: ...,
     *   numberDisplayHint: ...,
     *   options: ...,
     *   optionsAreMutable: ...,
     *   optionSortStrategy: ...,
     *   owningAppID: ...,
     *   portalID: ...,
     *   readOnlyDefinition: ...,
     *   readOnlyValue: ...,
     *   referencedObjectType: ...,
     *   searchableInGlobalSearch: ...,
     *   searchTextAnalysisMode: ...,
     *   sensitiveDataCategories: ...,
     *   showCurrencySymbol: ...,
     *   textDisplayHint: ...,
     *   type: ...,
     *   updatedAt: ...,
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new Property)
     *   ->withAllowedObjectTypes(...)
     *   ->withCalculated(...)
     *   ->withCanArchive(...)
     *   ->withCanRestore(...)
     *   ->withCreatedAt(...)
     *   ->withCreatedUserID(...)
     *   ->withCurrencyPropertyName(...)
     *   ->withDataSensitivity(...)
     *   ->withDateDisplayHint(...)
     *   ->withDeleted(...)
     *   ->withDescription(...)
     *   ->withDisplayMode(...)
     *   ->withDisplayOrder(...)
     *   ->withEnforceMultivalueUniqueness(...)
     *   ->withExternalOptions(...)
     *   ->withExternalOptionsReferenceType(...)
     *   ->withFavorited(...)
     *   ->withFavoritedOrder(...)
     *   ->withFieldType(...)
     *   ->withFormField(...)
     *   ->withFromUserID(...)
     *   ->withGroupName(...)
     *   ->withHasUniqueValue(...)
     *   ->withHidden(...)
     *   ->withHubspotDefined(...)
     *   ->withIsCustomizedDefault(...)
     *   ->withIsMultiValued(...)
     *   ->withIsPartial(...)
     *   ->withLabel(...)
     *   ->withMutableDefinitionNotDeletable(...)
     *   ->withName(...)
     *   ->withNumberDisplayHint(...)
     *   ->withOptions(...)
     *   ->withOptionsAreMutable(...)
     *   ->withOptionSortStrategy(...)
     *   ->withOwningAppID(...)
     *   ->withPortalID(...)
     *   ->withReadOnlyDefinition(...)
     *   ->withReadOnlyValue(...)
     *   ->withReferencedObjectType(...)
     *   ->withSearchableInGlobalSearch(...)
     *   ->withSearchTextAnalysisMode(...)
     *   ->withSensitiveDataCategories(...)
     *   ->withShowCurrencySymbol(...)
     *   ->withTextDisplayHint(...)
     *   ->withType(...)
     *   ->withUpdatedAt(...)
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
     * @param list<ObjectTypeIDProto|array{
     *   innerID: int, metaTypeID: int
     * }> $allowedObjectTypes
     * @param DataSensitivity|value-of<DataSensitivity> $dataSensitivity
     * @param DateDisplayHint|value-of<DateDisplayHint> $dateDisplayHint
     * @param DisplayMode|value-of<DisplayMode> $displayMode
     * @param NumberDisplayHint|value-of<NumberDisplayHint> $numberDisplayHint
     * @param list<Option|array{
     *   hidden: bool,
     *   label: string,
     *   value: string,
     *   description?: string|null,
     *   displayOrder?: int|null,
     * }> $options
     * @param OptionSortStrategy|value-of<OptionSortStrategy> $optionSortStrategy
     * @param ReferencedObjectType|value-of<ReferencedObjectType> $referencedObjectType
     * @param SearchTextAnalysisMode|value-of<SearchTextAnalysisMode> $searchTextAnalysisMode
     * @param list<string> $sensitiveDataCategories
     * @param TextDisplayHint|value-of<TextDisplayHint> $textDisplayHint
     * @param Type|value-of<Type> $type
     */
    public static function with(
        array $allowedObjectTypes,
        bool $calculated,
        bool $canArchive,
        bool $canRestore,
        int $createdAt,
        int $createdUserID,
        string $currencyPropertyName,
        DataSensitivity|string $dataSensitivity,
        DateDisplayHint|string $dateDisplayHint,
        bool $deleted,
        string $description,
        DisplayMode|string $displayMode,
        int $displayOrder,
        bool $enforceMultivalueUniqueness,
        bool $externalOptions,
        string $externalOptionsReferenceType,
        bool $favorited,
        int $favoritedOrder,
        string $fieldType,
        bool $formField,
        int $fromUserID,
        string $groupName,
        bool $hasUniqueValue,
        bool $hidden,
        bool $hubspotDefined,
        bool $isCustomizedDefault,
        bool $isMultiValued,
        bool $isPartial,
        string $label,
        bool $mutableDefinitionNotDeletable,
        string $name,
        NumberDisplayHint|string $numberDisplayHint,
        array $options,
        bool $optionsAreMutable,
        OptionSortStrategy|string $optionSortStrategy,
        int $owningAppID,
        int $portalID,
        bool $readOnlyDefinition,
        bool $readOnlyValue,
        ReferencedObjectType|string $referencedObjectType,
        bool $searchableInGlobalSearch,
        SearchTextAnalysisMode|string $searchTextAnalysisMode,
        array $sensitiveDataCategories,
        bool $showCurrencySymbol,
        TextDisplayHint|string $textDisplayHint,
        Type|string $type,
        int $updatedAt,
    ): self {
        $obj = new self;

        $obj['allowedObjectTypes'] = $allowedObjectTypes;
        $obj['calculated'] = $calculated;
        $obj['canArchive'] = $canArchive;
        $obj['canRestore'] = $canRestore;
        $obj['createdAt'] = $createdAt;
        $obj['createdUserID'] = $createdUserID;
        $obj['currencyPropertyName'] = $currencyPropertyName;
        $obj['dataSensitivity'] = $dataSensitivity;
        $obj['dateDisplayHint'] = $dateDisplayHint;
        $obj['deleted'] = $deleted;
        $obj['description'] = $description;
        $obj['displayMode'] = $displayMode;
        $obj['displayOrder'] = $displayOrder;
        $obj['enforceMultivalueUniqueness'] = $enforceMultivalueUniqueness;
        $obj['externalOptions'] = $externalOptions;
        $obj['externalOptionsReferenceType'] = $externalOptionsReferenceType;
        $obj['favorited'] = $favorited;
        $obj['favoritedOrder'] = $favoritedOrder;
        $obj['fieldType'] = $fieldType;
        $obj['formField'] = $formField;
        $obj['fromUserID'] = $fromUserID;
        $obj['groupName'] = $groupName;
        $obj['hasUniqueValue'] = $hasUniqueValue;
        $obj['hidden'] = $hidden;
        $obj['hubspotDefined'] = $hubspotDefined;
        $obj['isCustomizedDefault'] = $isCustomizedDefault;
        $obj['isMultiValued'] = $isMultiValued;
        $obj['isPartial'] = $isPartial;
        $obj['label'] = $label;
        $obj['mutableDefinitionNotDeletable'] = $mutableDefinitionNotDeletable;
        $obj['name'] = $name;
        $obj['numberDisplayHint'] = $numberDisplayHint;
        $obj['options'] = $options;
        $obj['optionsAreMutable'] = $optionsAreMutable;
        $obj['optionSortStrategy'] = $optionSortStrategy;
        $obj['owningAppID'] = $owningAppID;
        $obj['portalID'] = $portalID;
        $obj['readOnlyDefinition'] = $readOnlyDefinition;
        $obj['readOnlyValue'] = $readOnlyValue;
        $obj['referencedObjectType'] = $referencedObjectType;
        $obj['searchableInGlobalSearch'] = $searchableInGlobalSearch;
        $obj['searchTextAnalysisMode'] = $searchTextAnalysisMode;
        $obj['sensitiveDataCategories'] = $sensitiveDataCategories;
        $obj['showCurrencySymbol'] = $showCurrencySymbol;
        $obj['textDisplayHint'] = $textDisplayHint;
        $obj['type'] = $type;
        $obj['updatedAt'] = $updatedAt;

        return $obj;
    }

    /**
     * Object types permitted to use this property.
     *
     * @param list<ObjectTypeIDProto|array{
     *   innerID: int, metaTypeID: int
     * }> $allowedObjectTypes
     */
    public function withAllowedObjectTypes(array $allowedObjectTypes): self
    {
        $obj = clone $this;
        $obj['allowedObjectTypes'] = $allowedObjectTypes;

        return $obj;
    }

    /**
     * Whether the property is a calculated field.
     */
    public function withCalculated(bool $calculated): self
    {
        $obj = clone $this;
        $obj['calculated'] = $calculated;

        return $obj;
    }

    public function withCanArchive(bool $canArchive): self
    {
        $obj = clone $this;
        $obj['canArchive'] = $canArchive;

        return $obj;
    }

    public function withCanRestore(bool $canRestore): self
    {
        $obj = clone $this;
        $obj['canRestore'] = $canRestore;

        return $obj;
    }

    /**
     * The timestamp when the property was created, in ISO 8601 format.
     */
    public function withCreatedAt(int $createdAt): self
    {
        $obj = clone $this;
        $obj['createdAt'] = $createdAt;

        return $obj;
    }

    /**
     * The ID of the user who created the property.
     */
    public function withCreatedUserID(int $createdUserID): self
    {
        $obj = clone $this;
        $obj['createdUserID'] = $createdUserID;

        return $obj;
    }

    /**
     * The name of the related currency property.
     */
    public function withCurrencyPropertyName(string $currencyPropertyName): self
    {
        $obj = clone $this;
        $obj['currencyPropertyName'] = $currencyPropertyName;

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
     * @param DateDisplayHint|value-of<DateDisplayHint> $dateDisplayHint
     */
    public function withDateDisplayHint(
        DateDisplayHint|string $dateDisplayHint
    ): self {
        $obj = clone $this;
        $obj['dateDisplayHint'] = $dateDisplayHint;

        return $obj;
    }

    /**
     * Whether the property has been deleted.
     */
    public function withDeleted(bool $deleted): self
    {
        $obj = clone $this;
        $obj['deleted'] = $deleted;

        return $obj;
    }

    /**
     * A summary of the property's purpose.
     */
    public function withDescription(string $description): self
    {
        $obj = clone $this;
        $obj['description'] = $description;

        return $obj;
    }

    /**
     * The mode in which the property is displayed. Can be: "current_value" or "all_unique_versions".
     *
     * @param DisplayMode|value-of<DisplayMode> $displayMode
     */
    public function withDisplayMode(DisplayMode|string $displayMode): self
    {
        $obj = clone $this;
        $obj['displayMode'] = $displayMode;

        return $obj;
    }

    /**
     * The position of the item relative to others in the list.
     */
    public function withDisplayOrder(int $displayOrder): self
    {
        $obj = clone $this;
        $obj['displayOrder'] = $displayOrder;

        return $obj;
    }

    public function withEnforceMultivalueUniqueness(
        bool $enforceMultivalueUniqueness
    ): self {
        $obj = clone $this;
        $obj['enforceMultivalueUniqueness'] = $enforceMultivalueUniqueness;

        return $obj;
    }

    /**
     * Applicable only for enumeration type properties. Should be set to true with a 'referencedObjectType' of 'OWNER'. Otherwise false.
     */
    public function withExternalOptions(bool $externalOptions): self
    {
        $obj = clone $this;
        $obj['externalOptions'] = $externalOptions;

        return $obj;
    }

    /**
     * When externalOptions is true, indicates the property's option values will be populated from other systems (e.g., "OWNER" for the hubspot_owner_id property).
     */
    public function withExternalOptionsReferenceType(
        string $externalOptionsReferenceType
    ): self {
        $obj = clone $this;
        $obj['externalOptionsReferenceType'] = $externalOptionsReferenceType;

        return $obj;
    }

    /**
     * Deprecated. Whether the property is marked as a favorite.
     */
    public function withFavorited(bool $favorited): self
    {
        $obj = clone $this;
        $obj['favorited'] = $favorited;

        return $obj;
    }

    /**
     * Deprecated. The order position when marked as favorited.
     */
    public function withFavoritedOrder(int $favoritedOrder): self
    {
        $obj = clone $this;
        $obj['favoritedOrder'] = $favoritedOrder;

        return $obj;
    }

    /**
     * Determines how the property will appear in HubSpot's UI or on a form. Learn more in the properties API guide.
     */
    public function withFieldType(string $fieldType): self
    {
        $obj = clone $this;
        $obj['fieldType'] = $fieldType;

        return $obj;
    }

    /**
     * Whether the property can appear on forms.
     */
    public function withFormField(bool $formField): self
    {
        $obj = clone $this;
        $obj['formField'] = $formField;

        return $obj;
    }

    /**
     * The ID of the user who last updated the property.
     */
    public function withFromUserID(int $fromUserID): self
    {
        $obj = clone $this;
        $obj['fromUserID'] = $fromUserID;

        return $obj;
    }

    /**
     * The name of the group to which the property is assigned.
     */
    public function withGroupName(string $groupName): self
    {
        $obj = clone $this;
        $obj['groupName'] = $groupName;

        return $obj;
    }

    /**
     * Whether the property is a unique identifier property.
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
     * A boolean value set to true for HubSpot default properties.
     */
    public function withHubspotDefined(bool $hubspotDefined): self
    {
        $obj = clone $this;
        $obj['hubspotDefined'] = $hubspotDefined;

        return $obj;
    }

    /**
     * For default properties, whether the property has been customized. Equivalent to the 'isCustomizedDefault' field.
     */
    public function withIsCustomizedDefault(bool $isCustomizedDefault): self
    {
        $obj = clone $this;
        $obj['isCustomizedDefault'] = $isCustomizedDefault;

        return $obj;
    }

    /**
     * Whether the property can contain multiple values.
     */
    public function withIsMultiValued(bool $isMultiValued): self
    {
        $obj = clone $this;
        $obj['isMultiValued'] = $isMultiValued;

        return $obj;
    }

    /**
     * For default properties, whether the property has been customized. Equivalent to the 'isCustomizedDefault' field.
     */
    public function withIsPartial(bool $isPartial): self
    {
        $obj = clone $this;
        $obj['isPartial'] = $isPartial;

        return $obj;
    }

    /**
     * The display label for the property.
     */
    public function withLabel(string $label): self
    {
        $obj = clone $this;
        $obj['label'] = $label;

        return $obj;
    }

    /**
     * Whether the property definition can be customized but not deleted.
     */
    public function withMutableDefinitionNotDeletable(
        bool $mutableDefinitionNotDeletable
    ): self {
        $obj = clone $this;
        $obj['mutableDefinitionNotDeletable'] = $mutableDefinitionNotDeletable;

        return $obj;
    }

    /**
     * The internal name for the property.
     */
    public function withName(string $name): self
    {
        $obj = clone $this;
        $obj['name'] = $name;

        return $obj;
    }

    /**
     * Hint for how a number property is displayed and validated in HubSpot's UI. Can be: "unformatted", "formatted", "currency", "percentage", "duration", or "probability".
     *
     * @param NumberDisplayHint|value-of<NumberDisplayHint> $numberDisplayHint
     */
    public function withNumberDisplayHint(
        NumberDisplayHint|string $numberDisplayHint
    ): self {
        $obj = clone $this;
        $obj['numberDisplayHint'] = $numberDisplayHint;

        return $obj;
    }

    /**
     * A list of valid options for the property. This field is required for enumerated properties.
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
     * Whether options can be modified after creation.
     */
    public function withOptionsAreMutable(bool $optionsAreMutable): self
    {
        $obj = clone $this;
        $obj['optionsAreMutable'] = $optionsAreMutable;

        return $obj;
    }

    /**
     * Specifies how to sort property options. Can be either "DISPLAY_ORDER" to defer to the displayOrder field, or "ALPHABETICAL".
     *
     * @param OptionSortStrategy|value-of<OptionSortStrategy> $optionSortStrategy
     */
    public function withOptionSortStrategy(
        OptionSortStrategy|string $optionSortStrategy
    ): self {
        $obj = clone $this;
        $obj['optionSortStrategy'] = $optionSortStrategy;

        return $obj;
    }

    public function withOwningAppID(int $owningAppID): self
    {
        $obj = clone $this;
        $obj['owningAppID'] = $owningAppID;

        return $obj;
    }

    /**
     * The ID of the HubSpot account where the property is defined.
     */
    public function withPortalID(int $portalID): self
    {
        $obj = clone $this;
        $obj['portalID'] = $portalID;

        return $obj;
    }

    /**
     * Whether the property's description is read-only.
     */
    public function withReadOnlyDefinition(bool $readOnlyDefinition): self
    {
        $obj = clone $this;
        $obj['readOnlyDefinition'] = $readOnlyDefinition;

        return $obj;
    }

    /**
     * Indicates if the property's value is read-only.
     */
    public function withReadOnlyValue(bool $readOnlyValue): self
    {
        $obj = clone $this;
        $obj['readOnlyValue'] = $readOnlyValue;

        return $obj;
    }

    /**
     * Deprecated. Use externalOptionsReferenceType instead.
     *
     * @param ReferencedObjectType|value-of<ReferencedObjectType> $referencedObjectType
     */
    public function withReferencedObjectType(
        ReferencedObjectType|string $referencedObjectType
    ): self {
        $obj = clone $this;
        $obj['referencedObjectType'] = $referencedObjectType;

        return $obj;
    }

    /**
     * Whether the property is searchable globaly.
     */
    public function withSearchableInGlobalSearch(
        bool $searchableInGlobalSearch
    ): self {
        $obj = clone $this;
        $obj['searchableInGlobalSearch'] = $searchableInGlobalSearch;

        return $obj;
    }

    /**
     * @param SearchTextAnalysisMode|value-of<SearchTextAnalysisMode> $searchTextAnalysisMode
     */
    public function withSearchTextAnalysisMode(
        SearchTextAnalysisMode|string $searchTextAnalysisMode
    ): self {
        $obj = clone $this;
        $obj['searchTextAnalysisMode'] = $searchTextAnalysisMode;

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
     * Whether to show the currency symbol in HubSpot's UI.
     */
    public function withShowCurrencySymbol(bool $showCurrencySymbol): self
    {
        $obj = clone $this;
        $obj['showCurrencySymbol'] = $showCurrencySymbol;

        return $obj;
    }

    /**
     * Hint for how the text is displayed and validated in HubSpot's UI. Can be: "unformatted_single_line", "multi_line", "email", "phone_number", "domain_name", "ip_address", "physical_address", or "postal_code".
     *
     * @param TextDisplayHint|value-of<TextDisplayHint> $textDisplayHint
     */
    public function withTextDisplayHint(
        TextDisplayHint|string $textDisplayHint
    ): self {
        $obj = clone $this;
        $obj['textDisplayHint'] = $textDisplayHint;

        return $obj;
    }

    /**
     * The data type of the property, such as string or number.
     *
     * @param Type|value-of<Type> $type
     */
    public function withType(Type|string $type): self
    {
        $obj = clone $this;
        $obj['type'] = $type;

        return $obj;
    }

    /**
     * The timestamp when the property was last updated, in ISO 8601 format.
     */
    public function withUpdatedAt(int $updatedAt): self
    {
        $obj = clone $this;
        $obj['updatedAt'] = $updatedAt;

        return $obj;
    }
}
