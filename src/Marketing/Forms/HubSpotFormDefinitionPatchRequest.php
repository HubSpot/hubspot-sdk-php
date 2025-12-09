<?php

declare(strict_types=1);

namespace HubspotSDK\Marketing\Forms;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\Marketing\Forms\FormDisplayOptions\Theme;
use HubspotSDK\Marketing\Forms\HubSpotFormConfiguration\Language;
use HubspotSDK\Marketing\Forms\LegalConsentOptionsLegitimateInterest\LawfulBasis;
use HubspotSDK\Marketing\Forms\LegalConsentOptionsNone\Type;

/**
 * @phpstan-type HubSpotFormDefinitionPatchRequestShape = array{
 *   archived?: bool|null,
 *   configuration?: HubSpotFormConfiguration|null,
 *   displayOptions?: FormDisplayOptions|null,
 *   fieldGroups?: list<mixed>|null,
 *   legalConsentOptions?: null|LegalConsentOptionsNone|LegalConsentOptionsLegitimateInterest|LegalConsentOptionsExplicitConsentToProcess|LegalConsentOptionsImplicitConsentToProcess,
 *   name?: string|null,
 * }
 */
final class HubSpotFormDefinitionPatchRequest implements BaseModel
{
    /** @use SdkModel<HubSpotFormDefinitionPatchRequestShape> */
    use SdkModel;

    /**
     * Whether this form is archived.
     */
    #[Optional]
    public ?bool $archived;

    #[Optional]
    public ?HubSpotFormConfiguration $configuration;

    /**
     * Options for styling the form.
     */
    #[Optional]
    public ?FormDisplayOptions $displayOptions;

    /**
     * The fields in the form, grouped in rows.
     *
     * @var list<mixed>|null $fieldGroups
     */
    #[Optional(list: FieldGroup::class)]
    public ?array $fieldGroups;

    #[Optional]
    public LegalConsentOptionsNone|LegalConsentOptionsLegitimateInterest|LegalConsentOptionsExplicitConsentToProcess|LegalConsentOptionsImplicitConsentToProcess|null $legalConsentOptions;

    /**
     * The name of the form. Expected to be unique for a hub.
     */
    #[Optional]
    public ?string $name;

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
     *   renderRawHTML: bool,
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
     *   subscriptionTypeIDs: list<int>,
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
    public static function with(
        ?bool $archived = null,
        HubSpotFormConfiguration|array|null $configuration = null,
        FormDisplayOptions|array|null $displayOptions = null,
        ?array $fieldGroups = null,
        LegalConsentOptionsNone|array|LegalConsentOptionsLegitimateInterest|LegalConsentOptionsExplicitConsentToProcess|LegalConsentOptionsImplicitConsentToProcess|null $legalConsentOptions = null,
        ?string $name = null,
    ): self {
        $self = new self;

        null !== $archived && $self['archived'] = $archived;
        null !== $configuration && $self['configuration'] = $configuration;
        null !== $displayOptions && $self['displayOptions'] = $displayOptions;
        null !== $fieldGroups && $self['fieldGroups'] = $fieldGroups;
        null !== $legalConsentOptions && $self['legalConsentOptions'] = $legalConsentOptions;
        null !== $name && $self['name'] = $name;

        return $self;
    }

    /**
     * Whether this form is archived.
     */
    public function withArchived(bool $archived): self
    {
        $self = clone $this;
        $self['archived'] = $archived;

        return $self;
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
        $self = clone $this;
        $self['configuration'] = $configuration;

        return $self;
    }

    /**
     * Options for styling the form.
     *
     * @param FormDisplayOptions|array{
     *   renderRawHTML: bool,
     *   style: FormStyle,
     *   submitButtonText: string,
     *   theme: value-of<Theme>,
     *   cssClass?: string|null,
     * } $displayOptions
     */
    public function withDisplayOptions(
        FormDisplayOptions|array $displayOptions
    ): self {
        $self = clone $this;
        $self['displayOptions'] = $displayOptions;

        return $self;
    }

    /**
     * The fields in the form, grouped in rows.
     *
     * @param list<mixed> $fieldGroups
     */
    public function withFieldGroups(array $fieldGroups): self
    {
        $self = clone $this;
        $self['fieldGroups'] = $fieldGroups;

        return $self;
    }

    /**
     * @param LegalConsentOptionsNone|array{
     *   type: value-of<Type>
     * }|LegalConsentOptionsLegitimateInterest|array{
     *   lawfulBasis: value-of<LawfulBasis>,
     *   privacyText: string,
     *   subscriptionTypeIDs: list<int>,
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
        $self = clone $this;
        $self['legalConsentOptions'] = $legalConsentOptions;

        return $self;
    }

    /**
     * The name of the form. Expected to be unique for a hub.
     */
    public function withName(string $name): self
    {
        $self = clone $this;
        $self['name'] = $name;

        return $self;
    }
}
