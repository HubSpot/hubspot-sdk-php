<?php

declare(strict_types=1);

namespace HubspotSDK\Marketing\Forms;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\Marketing\Forms\FormDisplayOptions\Theme;
use HubspotSDK\Marketing\Forms\HubSpotFormConfiguration\Language;
use HubspotSDK\Marketing\Forms\LegalConsentOptionsLegitimateInterest\LawfulBasis;
use HubspotSDK\Marketing\Forms\LegalConsentOptionsNone\Type;

/**
 * Update some of the form definition components.
 *
 * @see HubspotSDK\Services\Marketing\FormsService::update()
 *
 * @phpstan-type FormUpdateParamsShape = array{
 *   archived?: bool,
 *   configuration?: HubSpotFormConfiguration|array{
 *     allowLinkToResetKnownValues: bool,
 *     archivable: bool,
 *     cloneable: bool,
 *     createNewContactForNewEmail: bool,
 *     editable: bool,
 *     language: value-of<Language>,
 *     notifyContactOwner: bool,
 *     notifyRecipients: list<string>,
 *     postSubmitAction: FormPostSubmitAction,
 *     prePopulateKnownValues: bool,
 *     recaptchaEnabled: bool,
 *     lifecycleStages?: list<LifecycleStage>|null,
 *   },
 *   displayOptions?: FormDisplayOptions|array{
 *     renderRawHtml: bool,
 *     style: FormStyle,
 *     submitButtonText: string,
 *     theme: value-of<Theme>,
 *     cssClass?: string|null,
 *   },
 *   fieldGroups?: list<mixed>,
 *   legalConsentOptions?: LegalConsentOptionsNone|array{
 *     type: value-of<Type>
 *   }|LegalConsentOptionsLegitimateInterest|array{
 *     lawfulBasis: value-of<LawfulBasis>,
 *     privacyText: string,
 *     subscriptionTypeIds: list<int>,
 *     type: value-of<\HubspotSDK\Marketing\Forms\LegalConsentOptionsLegitimateInterest\Type>,
 *   }|LegalConsentOptionsExplicitConsentToProcess|array{
 *     communicationsCheckboxes: list<LegalConsentCheckbox>,
 *     privacyText: string,
 *     type: value-of<\HubspotSDK\Marketing\Forms\LegalConsentOptionsExplicitConsentToProcess\Type>,
 *     communicationConsentText?: string|null,
 *     consentToProcessCheckboxLabel?: string|null,
 *     consentToProcessFooterText?: string|null,
 *     consentToProcessText?: string|null,
 *   }|LegalConsentOptionsImplicitConsentToProcess|array{
 *     communicationsCheckboxes: list<LegalConsentCheckbox>,
 *     privacyText: string,
 *     type: value-of<\HubspotSDK\Marketing\Forms\LegalConsentOptionsImplicitConsentToProcess\Type>,
 *     communicationConsentText?: string|null,
 *     consentToProcessText?: string|null,
 *   },
 *   name?: string,
 * }
 */
final class FormUpdateParams implements BaseModel
{
    /** @use SdkModel<FormUpdateParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * Whether this form is archived.
     */
    #[Api(optional: true)]
    public ?bool $archived;

    #[Api(optional: true)]
    public ?HubSpotFormConfiguration $configuration;

    /**
     * Options for styling the form.
     */
    #[Api(optional: true)]
    public ?FormDisplayOptions $displayOptions;

    /**
     * The fields in the form, grouped in rows.
     *
     * @var list<mixed>|null $fieldGroups
     */
    #[Api(list: FieldGroup::class, optional: true)]
    public ?array $fieldGroups;

    #[Api(optional: true)]
    public LegalConsentOptionsNone|LegalConsentOptionsLegitimateInterest|LegalConsentOptionsExplicitConsentToProcess|LegalConsentOptionsImplicitConsentToProcess|null $legalConsentOptions;

    /**
     * The name of the form. Expected to be unique for a hub.
     */
    #[Api(optional: true)]
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
     */
    public static function with(
        ?bool $archived = null,
        HubSpotFormConfiguration|array|null $configuration = null,
        FormDisplayOptions|array|null $displayOptions = null,
        ?array $fieldGroups = null,
        LegalConsentOptionsNone|array|LegalConsentOptionsLegitimateInterest|LegalConsentOptionsExplicitConsentToProcess|LegalConsentOptionsImplicitConsentToProcess|null $legalConsentOptions = null,
        ?string $name = null,
    ): self {
        $obj = new self;

        null !== $archived && $obj['archived'] = $archived;
        null !== $configuration && $obj['configuration'] = $configuration;
        null !== $displayOptions && $obj['displayOptions'] = $displayOptions;
        null !== $fieldGroups && $obj['fieldGroups'] = $fieldGroups;
        null !== $legalConsentOptions && $obj['legalConsentOptions'] = $legalConsentOptions;
        null !== $name && $obj['name'] = $name;

        return $obj;
    }

    /**
     * Whether this form is archived.
     */
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
     * The fields in the form, grouped in rows.
     *
     * @param list<mixed> $fieldGroups
     */
    public function withFieldGroups(array $fieldGroups): self
    {
        $obj = clone $this;
        $obj['fieldGroups'] = $fieldGroups;

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

    /**
     * The name of the form. Expected to be unique for a hub.
     */
    public function withName(string $name): self
    {
        $obj = clone $this;
        $obj['name'] = $name;

        return $obj;
    }
}
