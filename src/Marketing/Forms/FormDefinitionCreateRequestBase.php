<?php

declare(strict_types=1);

namespace HubspotSDK\Marketing\Forms;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\Marketing\Forms\FormDefinitionCreateRequestBase\FormType;
use HubspotSDK\Marketing\Forms\FormDisplayOptions\Theme;
use HubspotSDK\Marketing\Forms\HubSpotFormConfiguration\Language;
use HubspotSDK\Marketing\Forms\LegalConsentOptionsLegitimateInterest\LawfulBasis;
use HubspotSDK\Marketing\Forms\LegalConsentOptionsNone\Type;

/**
 * @phpstan-type FormDefinitionCreateRequestBaseShape = array{
 *   archived: bool,
 *   configuration: HubSpotFormConfiguration,
 *   createdAt: \DateTimeInterface,
 *   displayOptions: FormDisplayOptions,
 *   fieldGroups: list<mixed>,
 *   formType: value-of<FormType>,
 *   legalConsentOptions: LegalConsentOptionsNone|LegalConsentOptionsLegitimateInterest|LegalConsentOptionsExplicitConsentToProcess|LegalConsentOptionsImplicitConsentToProcess,
 *   name: string,
 *   updatedAt: \DateTimeInterface,
 *   archivedAt?: \DateTimeInterface|null,
 * }
 */
final class FormDefinitionCreateRequestBase implements BaseModel
{
    /** @use SdkModel<FormDefinitionCreateRequestBaseShape> */
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

    /** @var list<mixed> $fieldGroups */
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
     * @param HubSpotFormConfiguration|array{
     *   allowLinkToResetKnownValues: bool,
     *   archivable: bool,
     *   cloneable: bool,
     *   createNewContactForNewEmail: bool,
     *   editable: bool,
     *   language: value-of<Language>,
     *   notifyContactOwner: bool,
     *   notifyRecipients: list<string>,
     *   postSubmitAction: FormPostSubmitAction,
     *   prePopulateKnownValues: bool,
     *   recaptchaEnabled: bool,
     *   lifecycleStages?: list<LifecycleStage>|null,
     * } $configuration
     * @param FormDisplayOptions|array{
     *   renderRawHtml: bool,
     *   style: FormStyle,
     *   submitButtonText: string,
     *   theme: value-of<Theme>,
     *   cssClass?: string|null,
     * } $displayOptions
     * @param list<mixed> $fieldGroups
     * @param LegalConsentOptionsNone|array{
     *   type: value-of<Type>
     * }|LegalConsentOptionsLegitimateInterest|array{
     *   lawfulBasis: value-of<LawfulBasis>,
     *   privacyText: string,
     *   subscriptionTypeIds: list<int>,
     *   type: value-of<LegalConsentOptionsLegitimateInterest\Type>,
     * }|LegalConsentOptionsExplicitConsentToProcess|array{
     *   communicationsCheckboxes: list<LegalConsentCheckbox>,
     *   privacyText: string,
     *   type: value-of<LegalConsentOptionsExplicitConsentToProcess\Type>,
     *   communicationConsentText?: string|null,
     *   consentToProcessCheckboxLabel?: string|null,
     *   consentToProcessFooterText?: string|null,
     *   consentToProcessText?: string|null,
     * }|LegalConsentOptionsImplicitConsentToProcess|array{
     *   communicationsCheckboxes: list<LegalConsentCheckbox>,
     *   privacyText: string,
     *   type: value-of<LegalConsentOptionsImplicitConsentToProcess\Type>,
     *   communicationConsentText?: string|null,
     *   consentToProcessText?: string|null,
     * } $legalConsentOptions
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
        $obj = new self;

        $obj['archived'] = $archived;
        $obj['configuration'] = $configuration;
        $obj['createdAt'] = $createdAt;
        $obj['displayOptions'] = $displayOptions;
        $obj['fieldGroups'] = $fieldGroups;
        $obj['formType'] = $formType;
        $obj['legalConsentOptions'] = $legalConsentOptions;
        $obj['name'] = $name;
        $obj['updatedAt'] = $updatedAt;

        null !== $archivedAt && $obj['archivedAt'] = $archivedAt;

        return $obj;
    }

    public function withArchived(bool $archived): self
    {
        $obj = clone $this;
        $obj['archived'] = $archived;

        return $obj;
    }

    /**
     * @param HubSpotFormConfiguration|array{
     *   allowLinkToResetKnownValues: bool,
     *   archivable: bool,
     *   cloneable: bool,
     *   createNewContactForNewEmail: bool,
     *   editable: bool,
     *   language: value-of<Language>,
     *   notifyContactOwner: bool,
     *   notifyRecipients: list<string>,
     *   postSubmitAction: FormPostSubmitAction,
     *   prePopulateKnownValues: bool,
     *   recaptchaEnabled: bool,
     *   lifecycleStages?: list<LifecycleStage>|null,
     * } $configuration
     */
    public function withConfiguration(
        HubSpotFormConfiguration|array $configuration
    ): self {
        $obj = clone $this;
        $obj['configuration'] = $configuration;

        return $obj;
    }

    public function withCreatedAt(\DateTimeInterface $createdAt): self
    {
        $obj = clone $this;
        $obj['createdAt'] = $createdAt;

        return $obj;
    }

    /**
     * Options for styling the form.
     *
     * @param FormDisplayOptions|array{
     *   renderRawHtml: bool,
     *   style: FormStyle,
     *   submitButtonText: string,
     *   theme: value-of<Theme>,
     *   cssClass?: string|null,
     * } $displayOptions
     */
    public function withDisplayOptions(
        FormDisplayOptions|array $displayOptions
    ): self {
        $obj = clone $this;
        $obj['displayOptions'] = $displayOptions;

        return $obj;
    }

    /**
     * @param list<mixed> $fieldGroups
     */
    public function withFieldGroups(array $fieldGroups): self
    {
        $obj = clone $this;
        $obj['fieldGroups'] = $fieldGroups;

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

    /**
     * @param LegalConsentOptionsNone|array{
     *   type: value-of<Type>
     * }|LegalConsentOptionsLegitimateInterest|array{
     *   lawfulBasis: value-of<LawfulBasis>,
     *   privacyText: string,
     *   subscriptionTypeIds: list<int>,
     *   type: value-of<LegalConsentOptionsLegitimateInterest\Type>,
     * }|LegalConsentOptionsExplicitConsentToProcess|array{
     *   communicationsCheckboxes: list<LegalConsentCheckbox>,
     *   privacyText: string,
     *   type: value-of<LegalConsentOptionsExplicitConsentToProcess\Type>,
     *   communicationConsentText?: string|null,
     *   consentToProcessCheckboxLabel?: string|null,
     *   consentToProcessFooterText?: string|null,
     *   consentToProcessText?: string|null,
     * }|LegalConsentOptionsImplicitConsentToProcess|array{
     *   communicationsCheckboxes: list<LegalConsentCheckbox>,
     *   privacyText: string,
     *   type: value-of<LegalConsentOptionsImplicitConsentToProcess\Type>,
     *   communicationConsentText?: string|null,
     *   consentToProcessText?: string|null,
     * } $legalConsentOptions
     */
    public function withLegalConsentOptions(
        LegalConsentOptionsNone|array|LegalConsentOptionsLegitimateInterest|LegalConsentOptionsExplicitConsentToProcess|LegalConsentOptionsImplicitConsentToProcess $legalConsentOptions,
    ): self {
        $obj = clone $this;
        $obj['legalConsentOptions'] = $legalConsentOptions;

        return $obj;
    }

    public function withName(string $name): self
    {
        $obj = clone $this;
        $obj['name'] = $name;

        return $obj;
    }

    public function withUpdatedAt(\DateTimeInterface $updatedAt): self
    {
        $obj = clone $this;
        $obj['updatedAt'] = $updatedAt;

        return $obj;
    }

    public function withArchivedAt(\DateTimeInterface $archivedAt): self
    {
        $obj = clone $this;
        $obj['archivedAt'] = $archivedAt;

        return $obj;
    }
}
