<?php

declare(strict_types=1);

namespace HubspotSDK\Marketing\Forms;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\Marketing\Forms\FormDefinitionCreateRequestBase\FormType;

/**
 * @phpstan-type form_definition_create_request_base = array{
 *   archived: bool,
 *   configuration: HubSpotFormConfiguration,
 *   createdAt: \DateTimeInterface,
 *   displayOptions: FormDisplayOptions,
 *   fieldGroups: list<FieldGroup>,
 *   formType: value-of<FormType>,
 *   legalConsentOptions: LegalConsentOptionsNone|LegalConsentOptionsLegitimateInterest|LegalConsentOptionsExplicitConsentToProcess|LegalConsentOptionsImplicitConsentToProcess,
 *   name: string,
 *   updatedAt: \DateTimeInterface,
 *   archivedAt?: \DateTimeInterface,
 * }
 */
final class FormDefinitionCreateRequestBase implements BaseModel
{
    /** @use SdkModel<form_definition_create_request_base> */
    use SdkModel;

    #[Api]
    public bool $archived;

    #[Api]
    public HubSpotFormConfiguration $configuration;

    #[Api]
    public \DateTimeInterface $createdAt;

    /**
     * Options for styling the form.
     */
    #[Api]
    public FormDisplayOptions $displayOptions;

    /** @var list<FieldGroup> $fieldGroups */
    #[Api(list: FieldGroup::class)]
    public array $fieldGroups;

    /** @var value-of<FormType> $formType */
    #[Api(enum: FormType::class)]
    public string $formType;

    #[Api]
    public LegalConsentOptionsNone|LegalConsentOptionsLegitimateInterest|LegalConsentOptionsExplicitConsentToProcess|LegalConsentOptionsImplicitConsentToProcess $legalConsentOptions;

    #[Api]
    public string $name;

    #[Api]
    public \DateTimeInterface $updatedAt;

    #[Api(optional: true)]
    public ?\DateTimeInterface $archivedAt;

    /**
     * `new FormDefinitionCreateRequestBase()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * FormDefinitionCreateRequestBase::with(
     *   archived: ...,
     *   configuration: ...,
     *   createdAt: ...,
     *   displayOptions: ...,
     *   fieldGroups: ...,
     *   formType: ...,
     *   legalConsentOptions: ...,
     *   name: ...,
     *   updatedAt: ...,
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new FormDefinitionCreateRequestBase)
     *   ->withArchived(...)
     *   ->withConfiguration(...)
     *   ->withCreatedAt(...)
     *   ->withDisplayOptions(...)
     *   ->withFieldGroups(...)
     *   ->withFormType(...)
     *   ->withLegalConsentOptions(...)
     *   ->withName(...)
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
     * @param list<FieldGroup> $fieldGroups
     * @param FormType|value-of<FormType> $formType
     */
    public static function with(
        bool $archived,
        HubSpotFormConfiguration $configuration,
        \DateTimeInterface $createdAt,
        FormDisplayOptions $displayOptions,
        array $fieldGroups,
        LegalConsentOptionsNone|LegalConsentOptionsLegitimateInterest|LegalConsentOptionsExplicitConsentToProcess|LegalConsentOptionsImplicitConsentToProcess $legalConsentOptions,
        string $name,
        \DateTimeInterface $updatedAt,
        FormType|string $formType = 'hubspot',
        ?\DateTimeInterface $archivedAt = null,
    ): self {
        $obj = new self;

        $obj->archived = $archived;
        $obj->configuration = $configuration;
        $obj->createdAt = $createdAt;
        $obj->displayOptions = $displayOptions;
        $obj->fieldGroups = $fieldGroups;
        $obj['formType'] = $formType;
        $obj->legalConsentOptions = $legalConsentOptions;
        $obj->name = $name;
        $obj->updatedAt = $updatedAt;

        null !== $archivedAt && $obj->archivedAt = $archivedAt;

        return $obj;
    }

    public function withArchived(bool $archived): self
    {
        $obj = clone $this;
        $obj->archived = $archived;

        return $obj;
    }

    public function withConfiguration(
        HubSpotFormConfiguration $configuration
    ): self {
        $obj = clone $this;
        $obj->configuration = $configuration;

        return $obj;
    }

    public function withCreatedAt(\DateTimeInterface $createdAt): self
    {
        $obj = clone $this;
        $obj->createdAt = $createdAt;

        return $obj;
    }

    /**
     * Options for styling the form.
     */
    public function withDisplayOptions(FormDisplayOptions $displayOptions): self
    {
        $obj = clone $this;
        $obj->displayOptions = $displayOptions;

        return $obj;
    }

    /**
     * @param list<FieldGroup> $fieldGroups
     */
    public function withFieldGroups(array $fieldGroups): self
    {
        $obj = clone $this;
        $obj->fieldGroups = $fieldGroups;

        return $obj;
    }

    /**
     * @param FormType|value-of<FormType> $formType
     */
    public function withFormType(FormType|string $formType): self
    {
        $obj = clone $this;
        $obj['formType'] = $formType;

        return $obj;
    }

    public function withLegalConsentOptions(
        LegalConsentOptionsNone|LegalConsentOptionsLegitimateInterest|LegalConsentOptionsExplicitConsentToProcess|LegalConsentOptionsImplicitConsentToProcess $legalConsentOptions,
    ): self {
        $obj = clone $this;
        $obj->legalConsentOptions = $legalConsentOptions;

        return $obj;
    }

    public function withName(string $name): self
    {
        $obj = clone $this;
        $obj->name = $name;

        return $obj;
    }

    public function withUpdatedAt(\DateTimeInterface $updatedAt): self
    {
        $obj = clone $this;
        $obj->updatedAt = $updatedAt;

        return $obj;
    }

    public function withArchivedAt(\DateTimeInterface $archivedAt): self
    {
        $obj = clone $this;
        $obj->archivedAt = $archivedAt;

        return $obj;
    }
}
