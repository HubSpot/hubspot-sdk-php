<?php

declare(strict_types=1);

namespace HubspotSDK\Marketing\Forms;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\Marketing\Forms\MarketingFormsHubSpotFormConfiguration\Language;

/**
 * @phpstan-type marketing_forms_hub_spot_form_configuration = array{
 *   allowLinkToResetKnownValues: bool,
 *   archivable: bool,
 *   cloneable: bool,
 *   createNewContactForNewEmail: bool,
 *   editable: bool,
 *   language: value-of<Language>,
 *   notifyContactOwner: bool,
 *   notifyRecipients: list<string>,
 *   postSubmitAction: MarketingFormsFormPostSubmitAction,
 *   prePopulateKnownValues: bool,
 *   recaptchaEnabled: bool,
 *   lifecycleStages?: list<MarketingFormsLifecycleStage>,
 * }
 */
final class MarketingFormsHubSpotFormConfiguration implements BaseModel
{
    /** @use SdkModel<marketing_forms_hub_spot_form_configuration> */
    use SdkModel;

    #[Api]
    public bool $allowLinkToResetKnownValues;

    #[Api]
    public bool $archivable;

    #[Api]
    public bool $cloneable;

    #[Api]
    public bool $createNewContactForNewEmail;

    #[Api]
    public bool $editable;

    /** @var value-of<Language> $language */
    #[Api(enum: Language::class)]
    public string $language;

    #[Api]
    public bool $notifyContactOwner;

    /** @var list<string> $notifyRecipients */
    #[Api(list: 'string')]
    public array $notifyRecipients;

    #[Api]
    public MarketingFormsFormPostSubmitAction $postSubmitAction;

    #[Api]
    public bool $prePopulateKnownValues;

    #[Api]
    public bool $recaptchaEnabled;

    /** @var list<MarketingFormsLifecycleStage>|null $lifecycleStages */
    #[Api(list: MarketingFormsLifecycleStage::class, optional: true)]
    public ?array $lifecycleStages;

    /**
     * `new MarketingFormsHubSpotFormConfiguration()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * MarketingFormsHubSpotFormConfiguration::with(
     *   allowLinkToResetKnownValues: ...,
     *   archivable: ...,
     *   cloneable: ...,
     *   createNewContactForNewEmail: ...,
     *   editable: ...,
     *   language: ...,
     *   notifyContactOwner: ...,
     *   notifyRecipients: ...,
     *   postSubmitAction: ...,
     *   prePopulateKnownValues: ...,
     *   recaptchaEnabled: ...,
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new MarketingFormsHubSpotFormConfiguration)
     *   ->withAllowLinkToResetKnownValues(...)
     *   ->withArchivable(...)
     *   ->withCloneable(...)
     *   ->withCreateNewContactForNewEmail(...)
     *   ->withEditable(...)
     *   ->withLanguage(...)
     *   ->withNotifyContactOwner(...)
     *   ->withNotifyRecipients(...)
     *   ->withPostSubmitAction(...)
     *   ->withPrePopulateKnownValues(...)
     *   ->withRecaptchaEnabled(...)
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
     * @param Language|value-of<Language> $language
     * @param list<string> $notifyRecipients
     * @param list<MarketingFormsLifecycleStage> $lifecycleStages
     */
    public static function with(
        bool $allowLinkToResetKnownValues,
        bool $archivable,
        bool $cloneable,
        bool $createNewContactForNewEmail,
        bool $editable,
        Language|string $language,
        bool $notifyContactOwner,
        array $notifyRecipients,
        MarketingFormsFormPostSubmitAction $postSubmitAction,
        bool $prePopulateKnownValues,
        bool $recaptchaEnabled,
        ?array $lifecycleStages = null,
    ): self {
        $obj = new self;

        $obj->allowLinkToResetKnownValues = $allowLinkToResetKnownValues;
        $obj->archivable = $archivable;
        $obj->cloneable = $cloneable;
        $obj->createNewContactForNewEmail = $createNewContactForNewEmail;
        $obj->editable = $editable;
        $obj['language'] = $language;
        $obj->notifyContactOwner = $notifyContactOwner;
        $obj->notifyRecipients = $notifyRecipients;
        $obj->postSubmitAction = $postSubmitAction;
        $obj->prePopulateKnownValues = $prePopulateKnownValues;
        $obj->recaptchaEnabled = $recaptchaEnabled;

        null !== $lifecycleStages && $obj->lifecycleStages = $lifecycleStages;

        return $obj;
    }

    public function withAllowLinkToResetKnownValues(
        bool $allowLinkToResetKnownValues
    ): self {
        $obj = clone $this;
        $obj->allowLinkToResetKnownValues = $allowLinkToResetKnownValues;

        return $obj;
    }

    public function withArchivable(bool $archivable): self
    {
        $obj = clone $this;
        $obj->archivable = $archivable;

        return $obj;
    }

    public function withCloneable(bool $cloneable): self
    {
        $obj = clone $this;
        $obj->cloneable = $cloneable;

        return $obj;
    }

    public function withCreateNewContactForNewEmail(
        bool $createNewContactForNewEmail
    ): self {
        $obj = clone $this;
        $obj->createNewContactForNewEmail = $createNewContactForNewEmail;

        return $obj;
    }

    public function withEditable(bool $editable): self
    {
        $obj = clone $this;
        $obj->editable = $editable;

        return $obj;
    }

    /**
     * @param Language|value-of<Language> $language
     */
    public function withLanguage(Language|string $language): self
    {
        $obj = clone $this;
        $obj['language'] = $language;

        return $obj;
    }

    public function withNotifyContactOwner(bool $notifyContactOwner): self
    {
        $obj = clone $this;
        $obj->notifyContactOwner = $notifyContactOwner;

        return $obj;
    }

    /**
     * @param list<string> $notifyRecipients
     */
    public function withNotifyRecipients(array $notifyRecipients): self
    {
        $obj = clone $this;
        $obj->notifyRecipients = $notifyRecipients;

        return $obj;
    }

    public function withPostSubmitAction(
        MarketingFormsFormPostSubmitAction $postSubmitAction
    ): self {
        $obj = clone $this;
        $obj->postSubmitAction = $postSubmitAction;

        return $obj;
    }

    public function withPrePopulateKnownValues(
        bool $prePopulateKnownValues
    ): self {
        $obj = clone $this;
        $obj->prePopulateKnownValues = $prePopulateKnownValues;

        return $obj;
    }

    public function withRecaptchaEnabled(bool $recaptchaEnabled): self
    {
        $obj = clone $this;
        $obj->recaptchaEnabled = $recaptchaEnabled;

        return $obj;
    }

    /**
     * @param list<MarketingFormsLifecycleStage> $lifecycleStages
     */
    public function withLifecycleStages(array $lifecycleStages): self
    {
        $obj = clone $this;
        $obj->lifecycleStages = $lifecycleStages;

        return $obj;
    }
}
