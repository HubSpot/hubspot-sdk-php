<?php

declare(strict_types=1);

namespace HubspotSDK\Marketing\Forms;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\Marketing\Forms\FormDefinitionCreateRequestBase\FormType;

/**
 * @phpstan-import-type HubSpotFormConfigurationShape from \HubspotSDK\Marketing\Forms\HubSpotFormConfiguration
 * @phpstan-import-type FormDisplayOptionsShape from \HubspotSDK\Marketing\Forms\FormDisplayOptions
 * @phpstan-import-type LegalConsentOptionsShape from \HubspotSDK\Marketing\Forms\FormDefinitionCreateRequestBase\LegalConsentOptions
 *
 * @phpstan-type FormDefinitionCreateRequestBaseShape = array{
 *   archived: bool,
 *   configuration: HubSpotFormConfiguration|HubSpotFormConfigurationShape,
 *   createdAt: \DateTimeInterface,
 *   displayOptions: FormDisplayOptions|FormDisplayOptionsShape,
 *   fieldGroups: list<mixed>,
 *   formType: FormType|value-of<FormType>,
 *   legalConsentOptions: LegalConsentOptionsNone|LegalConsentOptionsLegitimateInterest|LegalConsentOptionsExplicitConsentToProcess|LegalConsentOptionsImplicitConsentToProcess|LegalConsentOptionsShape,
 *   name: string,
 *   updatedAt: \DateTimeInterface,
 *   archivedAt?: \DateTimeInterface|null,
 * }
 */
final class FormDefinitionCreateRequestBase implements BaseModel
{
    /** @use SdkModel<FormDefinitionCreateRequestBaseShape> */
    use SdkModel;

    #[Required]
    public bool $archived;

    #[Required]
    public HubSpotFormConfiguration $configuration;

    #[Required]
    public \DateTimeInterface $createdAt;

    /**
     * Options for styling the form.
     */
    #[Required]
    public FormDisplayOptions $displayOptions;

    /** @var list<mixed> $fieldGroups */
    #[Required(list: FieldGroup::class)]
    public array $fieldGroups;

    /** @var value-of<FormType> $formType */
    #[Required(enum: FormType::class)]
    public string $formType;

    #[Required]
    public LegalConsentOptionsNone|LegalConsentOptionsLegitimateInterest|LegalConsentOptionsExplicitConsentToProcess|LegalConsentOptionsImplicitConsentToProcess $legalConsentOptions;

    #[Required]
    public string $name;

    #[Required]
    public \DateTimeInterface $updatedAt;

    #[Optional]
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
     * @param HubSpotFormConfigurationShape $configuration
     * @param FormDisplayOptionsShape $displayOptions
     * @param list<mixed> $fieldGroups
     * @param LegalConsentOptionsShape $legalConsentOptions
     * @param FormType|value-of<FormType> $formType
     */
    public static function with(
        bool $archived,
        HubSpotFormConfiguration|array $configuration,
        \DateTimeInterface $createdAt,
        FormDisplayOptions|array $displayOptions,
        array $fieldGroups,
        LegalConsentOptionsNone|array|LegalConsentOptionsLegitimateInterest|LegalConsentOptionsExplicitConsentToProcess|LegalConsentOptionsImplicitConsentToProcess $legalConsentOptions,
        string $name,
        \DateTimeInterface $updatedAt,
        FormType|string $formType = 'hubspot',
        ?\DateTimeInterface $archivedAt = null,
    ): self {
        $self = new self;

        $self['archived'] = $archived;
        $self['configuration'] = $configuration;
        $self['createdAt'] = $createdAt;
        $self['displayOptions'] = $displayOptions;
        $self['fieldGroups'] = $fieldGroups;
        $self['formType'] = $formType;
        $self['legalConsentOptions'] = $legalConsentOptions;
        $self['name'] = $name;
        $self['updatedAt'] = $updatedAt;

        null !== $archivedAt && $self['archivedAt'] = $archivedAt;

        return $self;
    }

    public function withArchived(bool $archived): self
    {
        $self = clone $this;
        $self['archived'] = $archived;

        return $self;
    }

    /**
     * @param HubSpotFormConfigurationShape $configuration
     */
    public function withConfiguration(
        HubSpotFormConfiguration|array $configuration
    ): self {
        $self = clone $this;
        $self['configuration'] = $configuration;

        return $self;
    }

    public function withCreatedAt(\DateTimeInterface $createdAt): self
    {
        $self = clone $this;
        $self['createdAt'] = $createdAt;

        return $self;
    }

    /**
     * Options for styling the form.
     *
     * @param FormDisplayOptionsShape $displayOptions
     */
    public function withDisplayOptions(
        FormDisplayOptions|array $displayOptions
    ): self {
        $self = clone $this;
        $self['displayOptions'] = $displayOptions;

        return $self;
    }

    /**
     * @param list<mixed> $fieldGroups
     */
    public function withFieldGroups(array $fieldGroups): self
    {
        $self = clone $this;
        $self['fieldGroups'] = $fieldGroups;

        return $self;
    }

    /**
     * @param FormType|value-of<FormType> $formType
     */
    public function withFormType(FormType|string $formType): self
    {
        $self = clone $this;
        $self['formType'] = $formType;

        return $self;
    }

    /**
     * @param LegalConsentOptionsShape $legalConsentOptions
     */
    public function withLegalConsentOptions(
        LegalConsentOptionsNone|array|LegalConsentOptionsLegitimateInterest|LegalConsentOptionsExplicitConsentToProcess|LegalConsentOptionsImplicitConsentToProcess $legalConsentOptions,
    ): self {
        $self = clone $this;
        $self['legalConsentOptions'] = $legalConsentOptions;

        return $self;
    }

    public function withName(string $name): self
    {
        $self = clone $this;
        $self['name'] = $name;

        return $self;
    }

    public function withUpdatedAt(\DateTimeInterface $updatedAt): self
    {
        $self = clone $this;
        $self['updatedAt'] = $updatedAt;

        return $self;
    }

    public function withArchivedAt(\DateTimeInterface $archivedAt): self
    {
        $self = clone $this;
        $self['archivedAt'] = $archivedAt;

        return $self;
    }
}
