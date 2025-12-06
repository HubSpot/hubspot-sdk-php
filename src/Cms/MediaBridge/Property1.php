<?php

declare(strict_types=1);

namespace HubspotSDK\Cms\MediaBridge;

use HubspotSDK\Cms\MediaBridge\Property1\DataSensitivity;
use HubspotSDK\Cms\MediaBridge\Property1\DateDisplayHint;
use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\PropertyModificationMetadata;

/**
 * @phpstan-type Property1Shape = array{
 *   description: string,
 *   fieldType: string,
 *   groupName: string,
 *   label: string,
 *   name: string,
 *   options: list<Option1>,
 *   type: string,
 *   archived?: bool|null,
 *   archivedAt?: \DateTimeInterface|null,
 *   calculated?: bool|null,
 *   calculationFormula?: string|null,
 *   createdAt?: \DateTimeInterface|null,
 *   createdUserId?: string|null,
 *   dataSensitivity?: value-of<DataSensitivity>|null,
 *   dateDisplayHint?: value-of<DateDisplayHint>|null,
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
 *   updatedUserId?: string|null,
 * }
 */
final class Property1 implements BaseModel
{
    /** @use SdkModel<Property1Shape> */
    use SdkModel;

    #[Api]
    public string $description;

    #[Api]
    public string $fieldType;

    #[Api]
    public string $groupName;

    #[Api]
    public string $label;

    #[Api]
    public string $name;

    /** @var list<Option1> $options */
    #[Api(list: Option1::class)]
    public array $options;

    #[Api]
    public string $type;

    #[Api(optional: true)]
    public ?bool $archived;

    #[Api(optional: true)]
    public ?\DateTimeInterface $archivedAt;

    #[Api(optional: true)]
    public ?bool $calculated;

    #[Api(optional: true)]
    public ?string $calculationFormula;

    #[Api(optional: true)]
    public ?\DateTimeInterface $createdAt;

    #[Api(optional: true)]
    public ?string $createdUserId;

    /** @var value-of<DataSensitivity>|null $dataSensitivity */
    #[Api(enum: DataSensitivity::class, optional: true)]
    public ?string $dataSensitivity;

    /** @var value-of<DateDisplayHint>|null $dateDisplayHint */
    #[Api(enum: DateDisplayHint::class, optional: true)]
    public ?string $dateDisplayHint;

    #[Api(optional: true)]
    public ?int $displayOrder;

    #[Api(optional: true)]
    public ?bool $externalOptions;

    #[Api(optional: true)]
    public ?bool $formField;

    #[Api(optional: true)]
    public ?bool $hasUniqueValue;

    #[Api(optional: true)]
    public ?bool $hidden;

    #[Api(optional: true)]
    public ?bool $hubspotDefined;

    #[Api(optional: true)]
    public ?PropertyModificationMetadata $modificationMetadata;

    #[Api(optional: true)]
    public ?string $referencedObjectType;

    /** @var list<string>|null $sensitiveDataCategories */
    #[Api(list: 'string', optional: true)]
    public ?array $sensitiveDataCategories;

    #[Api(optional: true)]
    public ?bool $showCurrencySymbol;

    #[Api(optional: true)]
    public ?\DateTimeInterface $updatedAt;

    #[Api(optional: true)]
    public ?string $updatedUserId;

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
     * @param list<Option1|array{
     *   hidden: bool,
     *   label: string,
     *   value: string,
     *   description?: string|null,
     *   displayOrder?: int|null,
     * }> $options
     * @param DataSensitivity|value-of<DataSensitivity> $dataSensitivity
     * @param DateDisplayHint|value-of<DateDisplayHint> $dateDisplayHint
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
        ?string $createdUserId = null,
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
        ?string $updatedUserId = null,
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
        null !== $createdUserId && $obj['createdUserId'] = $createdUserId;
        null !== $dataSensitivity && $obj['dataSensitivity'] = $dataSensitivity;
        null !== $dateDisplayHint && $obj['dateDisplayHint'] = $dateDisplayHint;
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
        null !== $updatedUserId && $obj['updatedUserId'] = $updatedUserId;

        return $obj;
    }

    public function withDescription(string $description): self
    {
        $obj = clone $this;
        $obj['description'] = $description;

        return $obj;
    }

    public function withFieldType(string $fieldType): self
    {
        $obj = clone $this;
        $obj['fieldType'] = $fieldType;

        return $obj;
    }

    public function withGroupName(string $groupName): self
    {
        $obj = clone $this;
        $obj['groupName'] = $groupName;

        return $obj;
    }

    public function withLabel(string $label): self
    {
        $obj = clone $this;
        $obj['label'] = $label;

        return $obj;
    }

    public function withName(string $name): self
    {
        $obj = clone $this;
        $obj['name'] = $name;

        return $obj;
    }

    /**
     * @param list<Option1|array{
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

    public function withType(string $type): self
    {
        $obj = clone $this;
        $obj['type'] = $type;

        return $obj;
    }

    public function withArchived(bool $archived): self
    {
        $obj = clone $this;
        $obj['archived'] = $archived;

        return $obj;
    }

    public function withArchivedAt(\DateTimeInterface $archivedAt): self
    {
        $obj = clone $this;
        $obj['archivedAt'] = $archivedAt;

        return $obj;
    }

    public function withCalculated(bool $calculated): self
    {
        $obj = clone $this;
        $obj['calculated'] = $calculated;

        return $obj;
    }

    public function withCalculationFormula(string $calculationFormula): self
    {
        $obj = clone $this;
        $obj['calculationFormula'] = $calculationFormula;

        return $obj;
    }

    public function withCreatedAt(\DateTimeInterface $createdAt): self
    {
        $obj = clone $this;
        $obj['createdAt'] = $createdAt;

        return $obj;
    }

    public function withCreatedUserID(string $createdUserID): self
    {
        $obj = clone $this;
        $obj['createdUserId'] = $createdUserID;

        return $obj;
    }

    /**
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

    public function withDisplayOrder(int $displayOrder): self
    {
        $obj = clone $this;
        $obj['displayOrder'] = $displayOrder;

        return $obj;
    }

    public function withExternalOptions(bool $externalOptions): self
    {
        $obj = clone $this;
        $obj['externalOptions'] = $externalOptions;

        return $obj;
    }

    public function withFormField(bool $formField): self
    {
        $obj = clone $this;
        $obj['formField'] = $formField;

        return $obj;
    }

    public function withHasUniqueValue(bool $hasUniqueValue): self
    {
        $obj = clone $this;
        $obj['hasUniqueValue'] = $hasUniqueValue;

        return $obj;
    }

    public function withHidden(bool $hidden): self
    {
        $obj = clone $this;
        $obj['hidden'] = $hidden;

        return $obj;
    }

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

    public function withReferencedObjectType(string $referencedObjectType): self
    {
        $obj = clone $this;
        $obj['referencedObjectType'] = $referencedObjectType;

        return $obj;
    }

    /**
     * @param list<string> $sensitiveDataCategories
     */
    public function withSensitiveDataCategories(
        array $sensitiveDataCategories
    ): self {
        $obj = clone $this;
        $obj['sensitiveDataCategories'] = $sensitiveDataCategories;

        return $obj;
    }

    public function withShowCurrencySymbol(bool $showCurrencySymbol): self
    {
        $obj = clone $this;
        $obj['showCurrencySymbol'] = $showCurrencySymbol;

        return $obj;
    }

    public function withUpdatedAt(\DateTimeInterface $updatedAt): self
    {
        $obj = clone $this;
        $obj['updatedAt'] = $updatedAt;

        return $obj;
    }

    public function withUpdatedUserID(string $updatedUserID): self
    {
        $obj = clone $this;
        $obj['updatedUserId'] = $updatedUserID;

        return $obj;
    }
}
