<?php

declare(strict_types=1);

namespace HubspotSDK\CRM;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\CRM\CRMProperty\DataSensitivity;

/**
 * @phpstan-type crm_property = array{
 *   fieldType: string,
 *   groupName: string,
 *   label: string,
 *   name: string,
 *   options: list<CRMOption>,
 *   type: string,
 *   archived?: bool,
 *   archivedAt?: \DateTimeInterface,
 *   calculated?: bool,
 *   calculationFormula?: string,
 *   createdAt?: \DateTimeInterface,
 *   createdUserID?: string,
 *   dataSensitivity?: value-of<DataSensitivity>,
 *   displayOrder?: int,
 *   externalOptions?: bool,
 *   formField?: bool,
 *   hasUniqueValue?: bool,
 *   hidden?: bool,
 *   hubspotDefined?: bool,
 *   modificationMetadata?: CRMPropertyModificationMetadata,
 *   referencedObjectType?: string,
 *   sensitiveDataCategories?: list<string>,
 *   showCurrencySymbol?: bool,
 *   updatedAt?: \DateTimeInterface,
 *   updatedUserID?: string,
 * }
 */
final class CRMProperty implements BaseModel
{
    /** @use SdkModel<crm_property> */
    use SdkModel;

    #[Api]
    public string $fieldType;

    #[Api]
    public string $groupName;

    #[Api]
    public string $label;

    #[Api]
    public string $name;

    /** @var list<CRMOption> $options */
    #[Api(list: CRMOption::class)]
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

    #[Api('createdUserId', optional: true)]
    public ?string $createdUserID;

    /** @var value-of<DataSensitivity>|null $dataSensitivity */
    #[Api(enum: DataSensitivity::class, optional: true)]
    public ?string $dataSensitivity;

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
    public ?CRMPropertyModificationMetadata $modificationMetadata;

    #[Api(optional: true)]
    public ?string $referencedObjectType;

    /** @var list<string>|null $sensitiveDataCategories */
    #[Api(list: 'string', optional: true)]
    public ?array $sensitiveDataCategories;

    #[Api(optional: true)]
    public ?bool $showCurrencySymbol;

    #[Api(optional: true)]
    public ?\DateTimeInterface $updatedAt;

    #[Api('updatedUserId', optional: true)]
    public ?string $updatedUserID;

    /**
     * `new CRMProperty()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * CRMProperty::with(
     *   fieldType: ..., groupName: ..., label: ..., name: ..., options: ..., type: ...
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new CRMProperty)
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
     * @param list<CRMOption> $options
     * @param DataSensitivity|value-of<DataSensitivity> $dataSensitivity
     * @param list<string> $sensitiveDataCategories
     */
    public static function with(
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
        ?CRMPropertyModificationMetadata $modificationMetadata = null,
        ?string $referencedObjectType = null,
        ?array $sensitiveDataCategories = null,
        ?bool $showCurrencySymbol = null,
        ?\DateTimeInterface $updatedAt = null,
        ?string $updatedUserID = null,
    ): self {
        $obj = new self;

        $obj->fieldType = $fieldType;
        $obj->groupName = $groupName;
        $obj->label = $label;
        $obj->name = $name;
        $obj->options = $options;
        $obj->type = $type;

        null !== $archived && $obj->archived = $archived;
        null !== $archivedAt && $obj->archivedAt = $archivedAt;
        null !== $calculated && $obj->calculated = $calculated;
        null !== $calculationFormula && $obj->calculationFormula = $calculationFormula;
        null !== $createdAt && $obj->createdAt = $createdAt;
        null !== $createdUserID && $obj->createdUserID = $createdUserID;
        null !== $dataSensitivity && $obj['dataSensitivity'] = $dataSensitivity;
        null !== $displayOrder && $obj->displayOrder = $displayOrder;
        null !== $externalOptions && $obj->externalOptions = $externalOptions;
        null !== $formField && $obj->formField = $formField;
        null !== $hasUniqueValue && $obj->hasUniqueValue = $hasUniqueValue;
        null !== $hidden && $obj->hidden = $hidden;
        null !== $hubspotDefined && $obj->hubspotDefined = $hubspotDefined;
        null !== $modificationMetadata && $obj->modificationMetadata = $modificationMetadata;
        null !== $referencedObjectType && $obj->referencedObjectType = $referencedObjectType;
        null !== $sensitiveDataCategories && $obj->sensitiveDataCategories = $sensitiveDataCategories;
        null !== $showCurrencySymbol && $obj->showCurrencySymbol = $showCurrencySymbol;
        null !== $updatedAt && $obj->updatedAt = $updatedAt;
        null !== $updatedUserID && $obj->updatedUserID = $updatedUserID;

        return $obj;
    }

    public function withFieldType(string $fieldType): self
    {
        $obj = clone $this;
        $obj->fieldType = $fieldType;

        return $obj;
    }

    public function withGroupName(string $groupName): self
    {
        $obj = clone $this;
        $obj->groupName = $groupName;

        return $obj;
    }

    public function withLabel(string $label): self
    {
        $obj = clone $this;
        $obj->label = $label;

        return $obj;
    }

    public function withName(string $name): self
    {
        $obj = clone $this;
        $obj->name = $name;

        return $obj;
    }

    /**
     * @param list<CRMOption> $options
     */
    public function withOptions(array $options): self
    {
        $obj = clone $this;
        $obj->options = $options;

        return $obj;
    }

    public function withType(string $type): self
    {
        $obj = clone $this;
        $obj->type = $type;

        return $obj;
    }

    public function withArchived(bool $archived): self
    {
        $obj = clone $this;
        $obj->archived = $archived;

        return $obj;
    }

    public function withArchivedAt(\DateTimeInterface $archivedAt): self
    {
        $obj = clone $this;
        $obj->archivedAt = $archivedAt;

        return $obj;
    }

    public function withCalculated(bool $calculated): self
    {
        $obj = clone $this;
        $obj->calculated = $calculated;

        return $obj;
    }

    public function withCalculationFormula(string $calculationFormula): self
    {
        $obj = clone $this;
        $obj->calculationFormula = $calculationFormula;

        return $obj;
    }

    public function withCreatedAt(\DateTimeInterface $createdAt): self
    {
        $obj = clone $this;
        $obj->createdAt = $createdAt;

        return $obj;
    }

    public function withCreatedUserID(string $createdUserID): self
    {
        $obj = clone $this;
        $obj->createdUserID = $createdUserID;

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

    public function withDisplayOrder(int $displayOrder): self
    {
        $obj = clone $this;
        $obj->displayOrder = $displayOrder;

        return $obj;
    }

    public function withExternalOptions(bool $externalOptions): self
    {
        $obj = clone $this;
        $obj->externalOptions = $externalOptions;

        return $obj;
    }

    public function withFormField(bool $formField): self
    {
        $obj = clone $this;
        $obj->formField = $formField;

        return $obj;
    }

    public function withHasUniqueValue(bool $hasUniqueValue): self
    {
        $obj = clone $this;
        $obj->hasUniqueValue = $hasUniqueValue;

        return $obj;
    }

    public function withHidden(bool $hidden): self
    {
        $obj = clone $this;
        $obj->hidden = $hidden;

        return $obj;
    }

    public function withHubspotDefined(bool $hubspotDefined): self
    {
        $obj = clone $this;
        $obj->hubspotDefined = $hubspotDefined;

        return $obj;
    }

    public function withModificationMetadata(
        CRMPropertyModificationMetadata $modificationMetadata
    ): self {
        $obj = clone $this;
        $obj->modificationMetadata = $modificationMetadata;

        return $obj;
    }

    public function withReferencedObjectType(string $referencedObjectType): self
    {
        $obj = clone $this;
        $obj->referencedObjectType = $referencedObjectType;

        return $obj;
    }

    /**
     * @param list<string> $sensitiveDataCategories
     */
    public function withSensitiveDataCategories(
        array $sensitiveDataCategories
    ): self {
        $obj = clone $this;
        $obj->sensitiveDataCategories = $sensitiveDataCategories;

        return $obj;
    }

    public function withShowCurrencySymbol(bool $showCurrencySymbol): self
    {
        $obj = clone $this;
        $obj->showCurrencySymbol = $showCurrencySymbol;

        return $obj;
    }

    public function withUpdatedAt(\DateTimeInterface $updatedAt): self
    {
        $obj = clone $this;
        $obj->updatedAt = $updatedAt;

        return $obj;
    }

    public function withUpdatedUserID(string $updatedUserID): self
    {
        $obj = clone $this;
        $obj->updatedUserID = $updatedUserID;

        return $obj;
    }
}
