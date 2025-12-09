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
        $self = new self;

        $self['allowedObjectTypes'] = $allowedObjectTypes;
        $self['calculated'] = $calculated;
        $self['canArchive'] = $canArchive;
        $self['canRestore'] = $canRestore;
        $self['createdAt'] = $createdAt;
        $self['createdUserID'] = $createdUserID;
        $self['currencyPropertyName'] = $currencyPropertyName;
        $self['dataSensitivity'] = $dataSensitivity;
        $self['dateDisplayHint'] = $dateDisplayHint;
        $self['deleted'] = $deleted;
        $self['description'] = $description;
        $self['displayMode'] = $displayMode;
        $self['displayOrder'] = $displayOrder;
        $self['enforceMultivalueUniqueness'] = $enforceMultivalueUniqueness;
        $self['externalOptions'] = $externalOptions;
        $self['externalOptionsReferenceType'] = $externalOptionsReferenceType;
        $self['favorited'] = $favorited;
        $self['favoritedOrder'] = $favoritedOrder;
        $self['fieldType'] = $fieldType;
        $self['formField'] = $formField;
        $self['fromUserID'] = $fromUserID;
        $self['groupName'] = $groupName;
        $self['hasUniqueValue'] = $hasUniqueValue;
        $self['hidden'] = $hidden;
        $self['hubspotDefined'] = $hubspotDefined;
        $self['isCustomizedDefault'] = $isCustomizedDefault;
        $self['isMultiValued'] = $isMultiValued;
        $self['isPartial'] = $isPartial;
        $self['label'] = $label;
        $self['mutableDefinitionNotDeletable'] = $mutableDefinitionNotDeletable;
        $self['name'] = $name;
        $self['numberDisplayHint'] = $numberDisplayHint;
        $self['options'] = $options;
        $self['optionsAreMutable'] = $optionsAreMutable;
        $self['optionSortStrategy'] = $optionSortStrategy;
        $self['owningAppID'] = $owningAppID;
        $self['portalID'] = $portalID;
        $self['readOnlyDefinition'] = $readOnlyDefinition;
        $self['readOnlyValue'] = $readOnlyValue;
        $self['referencedObjectType'] = $referencedObjectType;
        $self['searchableInGlobalSearch'] = $searchableInGlobalSearch;
        $self['searchTextAnalysisMode'] = $searchTextAnalysisMode;
        $self['sensitiveDataCategories'] = $sensitiveDataCategories;
        $self['showCurrencySymbol'] = $showCurrencySymbol;
        $self['textDisplayHint'] = $textDisplayHint;
        $self['type'] = $type;
        $self['updatedAt'] = $updatedAt;

        return $self;
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
        $self = clone $this;
        $self['allowedObjectTypes'] = $allowedObjectTypes;

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

    public function withCanArchive(bool $canArchive): self
    {
        $self = clone $this;
        $self['canArchive'] = $canArchive;

        return $self;
    }

    public function withCanRestore(bool $canRestore): self
    {
        $self = clone $this;
        $self['canRestore'] = $canRestore;

        return $self;
    }

    /**
     * The timestamp when the property was created, in ISO 8601 format.
     */
    public function withCreatedAt(int $createdAt): self
    {
        $self = clone $this;
        $self['createdAt'] = $createdAt;

        return $self;
    }

    /**
     * The ID of the user who created the property.
     */
    public function withCreatedUserID(int $createdUserID): self
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
     * Whether the property has been deleted.
     */
    public function withDeleted(bool $deleted): self
    {
        $self = clone $this;
        $self['deleted'] = $deleted;

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
     * The mode in which the property is displayed. Can be: "current_value" or "all_unique_versions".
     *
     * @param DisplayMode|value-of<DisplayMode> $displayMode
     */
    public function withDisplayMode(DisplayMode|string $displayMode): self
    {
        $self = clone $this;
        $self['displayMode'] = $displayMode;

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

    public function withEnforceMultivalueUniqueness(
        bool $enforceMultivalueUniqueness
    ): self {
        $self = clone $this;
        $self['enforceMultivalueUniqueness'] = $enforceMultivalueUniqueness;

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
     * When externalOptions is true, indicates the property's option values will be populated from other systems (e.g., "OWNER" for the hubspot_owner_id property).
     */
    public function withExternalOptionsReferenceType(
        string $externalOptionsReferenceType
    ): self {
        $self = clone $this;
        $self['externalOptionsReferenceType'] = $externalOptionsReferenceType;

        return $self;
    }

    /**
     * Deprecated. Whether the property is marked as a favorite.
     */
    public function withFavorited(bool $favorited): self
    {
        $self = clone $this;
        $self['favorited'] = $favorited;

        return $self;
    }

    /**
     * Deprecated. The order position when marked as favorited.
     */
    public function withFavoritedOrder(int $favoritedOrder): self
    {
        $self = clone $this;
        $self['favoritedOrder'] = $favoritedOrder;

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
     * Whether the property can appear on forms.
     */
    public function withFormField(bool $formField): self
    {
        $self = clone $this;
        $self['formField'] = $formField;

        return $self;
    }

    /**
     * The ID of the user who last updated the property.
     */
    public function withFromUserID(int $fromUserID): self
    {
        $self = clone $this;
        $self['fromUserID'] = $fromUserID;

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
     * For default properties, whether the property has been customized. Equivalent to the 'isCustomizedDefault' field.
     */
    public function withIsCustomizedDefault(bool $isCustomizedDefault): self
    {
        $self = clone $this;
        $self['isCustomizedDefault'] = $isCustomizedDefault;

        return $self;
    }

    /**
     * Whether the property can contain multiple values.
     */
    public function withIsMultiValued(bool $isMultiValued): self
    {
        $self = clone $this;
        $self['isMultiValued'] = $isMultiValued;

        return $self;
    }

    /**
     * For default properties, whether the property has been customized. Equivalent to the 'isCustomizedDefault' field.
     */
    public function withIsPartial(bool $isPartial): self
    {
        $self = clone $this;
        $self['isPartial'] = $isPartial;

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
     * Whether the property definition can be customized but not deleted.
     */
    public function withMutableDefinitionNotDeletable(
        bool $mutableDefinitionNotDeletable
    ): self {
        $self = clone $this;
        $self['mutableDefinitionNotDeletable'] = $mutableDefinitionNotDeletable;

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
        $self = clone $this;
        $self['options'] = $options;

        return $self;
    }

    /**
     * Whether options can be modified after creation.
     */
    public function withOptionsAreMutable(bool $optionsAreMutable): self
    {
        $self = clone $this;
        $self['optionsAreMutable'] = $optionsAreMutable;

        return $self;
    }

    /**
     * Specifies how to sort property options. Can be either "DISPLAY_ORDER" to defer to the displayOrder field, or "ALPHABETICAL".
     *
     * @param OptionSortStrategy|value-of<OptionSortStrategy> $optionSortStrategy
     */
    public function withOptionSortStrategy(
        OptionSortStrategy|string $optionSortStrategy
    ): self {
        $self = clone $this;
        $self['optionSortStrategy'] = $optionSortStrategy;

        return $self;
    }

    public function withOwningAppID(int $owningAppID): self
    {
        $self = clone $this;
        $self['owningAppID'] = $owningAppID;

        return $self;
    }

    /**
     * The ID of the HubSpot account where the property is defined.
     */
    public function withPortalID(int $portalID): self
    {
        $self = clone $this;
        $self['portalID'] = $portalID;

        return $self;
    }

    /**
     * Whether the property's description is read-only.
     */
    public function withReadOnlyDefinition(bool $readOnlyDefinition): self
    {
        $self = clone $this;
        $self['readOnlyDefinition'] = $readOnlyDefinition;

        return $self;
    }

    /**
     * Indicates if the property's value is read-only.
     */
    public function withReadOnlyValue(bool $readOnlyValue): self
    {
        $self = clone $this;
        $self['readOnlyValue'] = $readOnlyValue;

        return $self;
    }

    /**
     * Deprecated. Use externalOptionsReferenceType instead.
     *
     * @param ReferencedObjectType|value-of<ReferencedObjectType> $referencedObjectType
     */
    public function withReferencedObjectType(
        ReferencedObjectType|string $referencedObjectType
    ): self {
        $self = clone $this;
        $self['referencedObjectType'] = $referencedObjectType;

        return $self;
    }

    /**
     * Whether the property is searchable globaly.
     */
    public function withSearchableInGlobalSearch(
        bool $searchableInGlobalSearch
    ): self {
        $self = clone $this;
        $self['searchableInGlobalSearch'] = $searchableInGlobalSearch;

        return $self;
    }

    /**
     * @param SearchTextAnalysisMode|value-of<SearchTextAnalysisMode> $searchTextAnalysisMode
     */
    public function withSearchTextAnalysisMode(
        SearchTextAnalysisMode|string $searchTextAnalysisMode
    ): self {
        $self = clone $this;
        $self['searchTextAnalysisMode'] = $searchTextAnalysisMode;

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
     * Hint for how the text is displayed and validated in HubSpot's UI. Can be: "unformatted_single_line", "multi_line", "email", "phone_number", "domain_name", "ip_address", "physical_address", or "postal_code".
     *
     * @param TextDisplayHint|value-of<TextDisplayHint> $textDisplayHint
     */
    public function withTextDisplayHint(
        TextDisplayHint|string $textDisplayHint
    ): self {
        $self = clone $this;
        $self['textDisplayHint'] = $textDisplayHint;

        return $self;
    }

    /**
     * The data type of the property, such as string or number.
     *
     * @param Type|value-of<Type> $type
     */
    public function withType(Type|string $type): self
    {
        $self = clone $this;
        $self['type'] = $type;

        return $self;
    }

    /**
     * The timestamp when the property was last updated, in ISO 8601 format.
     */
    public function withUpdatedAt(int $updatedAt): self
    {
        $self = clone $this;
        $self['updatedAt'] = $updatedAt;

        return $self;
    }
}
