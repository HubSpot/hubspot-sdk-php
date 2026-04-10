<?php

declare(strict_types=1);

namespace HubSpotSDK\Cms\MediaBridge;

use HubSpotSDK\Cms\MediaBridge\Property1\DataSensitivity;
use HubSpotSDK\Cms\MediaBridge\Property1\DateDisplayHint;
use HubSpotSDK\Core\Attributes\Optional;
use HubSpotSDK\Core\Attributes\Required;
use HubSpotSDK\Core\Concerns\SdkModel;
use HubSpotSDK\Core\Contracts\BaseModel;
use HubSpotSDK\PropertyModificationMetadata;

/**
 * @phpstan-import-type Option1Shape from \HubSpotSDK\Cms\MediaBridge\Option1
 * @phpstan-import-type PropertyModificationMetadataShape from \HubSpotSDK\PropertyModificationMetadata
 *
 * @phpstan-type Property1Shape = array{
 *   description: string,
 *   fieldType: string,
 *   groupName: string,
 *   label: string,
 *   name: string,
 *   options: list<Option1|Option1Shape>,
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
 *   hubSpotDefined?: bool|null,
 *   modificationMetadata?: null|PropertyModificationMetadata|PropertyModificationMetadataShape,
 *   referencedObjectType?: string|null,
 *   sensitiveDataCategories?: list<string>|null,
 *   showCurrencySymbol?: bool|null,
 *   updatedAt?: \DateTimeInterface|null,
 *   updatedUserID?: string|null,
 * }
 */
final class Property1 implements BaseModel
{
    /** @use SdkModel<Property1Shape> */
    use SdkModel;

    #[Required]
    public string $description;

    #[Required]
    public string $fieldType;

    #[Required]
    public string $groupName;

    #[Required]
    public string $label;

    #[Required]
    public string $name;

    /** @var list<Option1> $options */
    #[Required(list: Option1::class)]
    public array $options;

    #[Required]
    public string $type;

    #[Optional]
    public ?bool $archived;

    #[Optional]
    public ?\DateTimeInterface $archivedAt;

    #[Optional]
    public ?bool $calculated;

    #[Optional]
    public ?string $calculationFormula;

    #[Optional]
    public ?\DateTimeInterface $createdAt;

    #[Optional('createdUserId')]
    public ?string $createdUserID;

    /** @var value-of<DataSensitivity>|null $dataSensitivity */
    #[Optional(enum: DataSensitivity::class)]
    public ?string $dataSensitivity;

    /** @var value-of<DateDisplayHint>|null $dateDisplayHint */
    #[Optional(enum: DateDisplayHint::class)]
    public ?string $dateDisplayHint;

    #[Optional]
    public ?int $displayOrder;

    #[Optional]
    public ?bool $externalOptions;

    #[Optional]
    public ?bool $formField;

    #[Optional]
    public ?bool $hasUniqueValue;

    #[Optional]
    public ?bool $hidden;

    #[Optional('hubspotDefined')]
    public ?bool $hubSpotDefined;

    #[Optional]
    public ?PropertyModificationMetadata $modificationMetadata;

    #[Optional]
    public ?string $referencedObjectType;

    /** @var list<string>|null $sensitiveDataCategories */
    #[Optional(list: 'string')]
    public ?array $sensitiveDataCategories;

    #[Optional]
    public ?bool $showCurrencySymbol;

    #[Optional]
    public ?\DateTimeInterface $updatedAt;

    #[Optional('updatedUserId')]
    public ?string $updatedUserID;

    /**
     * `new Property1()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * Property1::with(
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
     * (new Property1)
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
     * @param list<Option1|Option1Shape> $options
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
        ?bool $hubSpotDefined = null,
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
        null !== $hubSpotDefined && $self['hubSpotDefined'] = $hubSpotDefined;
        null !== $modificationMetadata && $self['modificationMetadata'] = $modificationMetadata;
        null !== $referencedObjectType && $self['referencedObjectType'] = $referencedObjectType;
        null !== $sensitiveDataCategories && $self['sensitiveDataCategories'] = $sensitiveDataCategories;
        null !== $showCurrencySymbol && $self['showCurrencySymbol'] = $showCurrencySymbol;
        null !== $updatedAt && $self['updatedAt'] = $updatedAt;
        null !== $updatedUserID && $self['updatedUserID'] = $updatedUserID;

        return $self;
    }

    public function withDescription(string $description): self
    {
        $self = clone $this;
        $self['description'] = $description;

        return $self;
    }

    public function withFieldType(string $fieldType): self
    {
        $self = clone $this;
        $self['fieldType'] = $fieldType;

        return $self;
    }

    public function withGroupName(string $groupName): self
    {
        $self = clone $this;
        $self['groupName'] = $groupName;

        return $self;
    }

    public function withLabel(string $label): self
    {
        $self = clone $this;
        $self['label'] = $label;

        return $self;
    }

    public function withName(string $name): self
    {
        $self = clone $this;
        $self['name'] = $name;

        return $self;
    }

    /**
     * @param list<Option1|Option1Shape> $options
     */
    public function withOptions(array $options): self
    {
        $self = clone $this;
        $self['options'] = $options;

        return $self;
    }

    public function withType(string $type): self
    {
        $self = clone $this;
        $self['type'] = $type;

        return $self;
    }

    public function withArchived(bool $archived): self
    {
        $self = clone $this;
        $self['archived'] = $archived;

        return $self;
    }

    public function withArchivedAt(\DateTimeInterface $archivedAt): self
    {
        $self = clone $this;
        $self['archivedAt'] = $archivedAt;

        return $self;
    }

    public function withCalculated(bool $calculated): self
    {
        $self = clone $this;
        $self['calculated'] = $calculated;

        return $self;
    }

    public function withCalculationFormula(string $calculationFormula): self
    {
        $self = clone $this;
        $self['calculationFormula'] = $calculationFormula;

        return $self;
    }

    public function withCreatedAt(\DateTimeInterface $createdAt): self
    {
        $self = clone $this;
        $self['createdAt'] = $createdAt;

        return $self;
    }

    public function withCreatedUserID(string $createdUserID): self
    {
        $self = clone $this;
        $self['createdUserID'] = $createdUserID;

        return $self;
    }

    /**
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

    public function withDisplayOrder(int $displayOrder): self
    {
        $self = clone $this;
        $self['displayOrder'] = $displayOrder;

        return $self;
    }

    public function withExternalOptions(bool $externalOptions): self
    {
        $self = clone $this;
        $self['externalOptions'] = $externalOptions;

        return $self;
    }

    public function withFormField(bool $formField): self
    {
        $self = clone $this;
        $self['formField'] = $formField;

        return $self;
    }

    public function withHasUniqueValue(bool $hasUniqueValue): self
    {
        $self = clone $this;
        $self['hasUniqueValue'] = $hasUniqueValue;

        return $self;
    }

    public function withHidden(bool $hidden): self
    {
        $self = clone $this;
        $self['hidden'] = $hidden;

        return $self;
    }

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

    public function withReferencedObjectType(string $referencedObjectType): self
    {
        $self = clone $this;
        $self['referencedObjectType'] = $referencedObjectType;

        return $self;
    }

    /**
     * @param list<string> $sensitiveDataCategories
     */
    public function withSensitiveDataCategories(
        array $sensitiveDataCategories
    ): self {
        $self = clone $this;
        $self['sensitiveDataCategories'] = $sensitiveDataCategories;

        return $self;
    }

    public function withShowCurrencySymbol(bool $showCurrencySymbol): self
    {
        $self = clone $this;
        $self['showCurrencySymbol'] = $showCurrencySymbol;

        return $self;
    }

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
