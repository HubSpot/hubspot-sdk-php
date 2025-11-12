<?php

declare(strict_types=1);

namespace HubspotSDK\Marketing\Forms;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\Marketing\Forms\HubSpotFormConfiguration\Language;

/**
 * @phpstan-type HubSpotFormConfigurationShape = array{
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
 * }
 */
final class HubSpotFormConfiguration implements BaseModel
{
    /** @use SdkModel<HubSpotFormConfigurationShape> */
    use SdkModel;

    /**
     * Whether to add a reset link to the form. This removes any pre-populated content on the form and creates a new contact on submission.
     */
    #[Api]
    public bool $allowLinkToResetKnownValues;

    /**
     * Whether the form can be archived.
     */
    #[Api]
    public bool $archivable;

    /**
     * Whether the form can be cloned.
     */
    #[Api]
    public bool $cloneable;

    /**
     * Whether to create a new contact when a form is submitted with an email address that doesn’t match any in your existing contacts records.
     */
    #[Api]
    public bool $createNewContactForNewEmail;

    /**
     * Whether the form can be edited.
     */
    #[Api]
    public bool $editable;

    /**
     * The language of the form.
     *
     * @var value-of<Language> $language
     */
    #[Api(enum: Language::class)]
    public string $language;

    /**
     * Whether to send a notification email to the contact owner when a submission is received.
     */
    #[Api]
    public bool $notifyContactOwner;

    /**
     * The list of user IDs to receive a notification email when a submission is received.
     *
     * @var list<string> $notifyRecipients
     */
    #[Api(list: 'string')]
    public array $notifyRecipients;

    /**
     * What should happen after the customer submits the form.
     */
    #[Api]
    public FormPostSubmitAction $postSubmitAction;

    /**
     * Whether contact fields should pre-populate with known information when a contact returns to your site.
     */
    #[Api]
    public bool $prePopulateKnownValues;

    /**
     * Whether CAPTCHA (spam prevention) is enabled.
     */
    #[Api]
    public bool $recaptchaEnabled;

    /** @var list<LifecycleStage>|null $lifecycleStages */
    #[Api(list: LifecycleStage::class, optional: true)]
    public ?array $lifecycleStages;

    /**
     * `new HubSpotFormConfiguration()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * HubSpotFormConfiguration::with(
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
     * (new HubSpotFormConfiguration)
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
     * @param list<LifecycleStage> $lifecycleStages
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
        FormPostSubmitAction $postSubmitAction,
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

    /**
     * Whether to add a reset link to the form. This removes any pre-populated content on the form and creates a new contact on submission.
     */
    public function withAllowLinkToResetKnownValues(
        bool $allowLinkToResetKnownValues
    ): self {
        $obj = clone $this;
        $obj->allowLinkToResetKnownValues = $allowLinkToResetKnownValues;

        return $obj;
    }

    /**
     * Whether the form can be archived.
     */
    public function withArchivable(bool $archivable): self
    {
        $obj = clone $this;
        $obj->archivable = $archivable;

        return $obj;
    }

    /**
     * Whether the form can be cloned.
     */
    public function withCloneable(bool $cloneable): self
    {
        $obj = clone $this;
        $obj->cloneable = $cloneable;

        return $obj;
    }

    /**
     * Whether to create a new contact when a form is submitted with an email address that doesn’t match any in your existing contacts records.
     */
    public function withCreateNewContactForNewEmail(
        bool $createNewContactForNewEmail
    ): self {
        $obj = clone $this;
        $obj->createNewContactForNewEmail = $createNewContactForNewEmail;

        return $obj;
    }

    /**
     * Whether the form can be edited.
     */
    public function withEditable(bool $editable): self
    {
        $obj = clone $this;
        $obj->editable = $editable;

        return $obj;
    }

    /**
     * The language of the form.
     *
     * @param Language|value-of<Language> $language
     */
    public function withLanguage(Language|string $language): self
    {
        $obj = clone $this;
        $obj['language'] = $language;

        return $obj;
    }

    /**
     * Whether to send a notification email to the contact owner when a submission is received.
     */
    public function withNotifyContactOwner(bool $notifyContactOwner): self
    {
        $obj = clone $this;
        $obj->notifyContactOwner = $notifyContactOwner;

        return $obj;
    }

    /**
     * The list of user IDs to receive a notification email when a submission is received.
     *
     * @param list<string> $notifyRecipients
     */
    public function withNotifyRecipients(array $notifyRecipients): self
    {
        $obj = clone $this;
        $obj->notifyRecipients = $notifyRecipients;

        return $obj;
    }

    /**
     * What should happen after the customer submits the form.
     */
    public function withPostSubmitAction(
        FormPostSubmitAction $postSubmitAction
    ): self {
        $obj = clone $this;
        $obj->postSubmitAction = $postSubmitAction;

        return $obj;
    }

    /**
     * Whether contact fields should pre-populate with known information when a contact returns to your site.
     */
    public function withPrePopulateKnownValues(
        bool $prePopulateKnownValues
    ): self {
        $obj = clone $this;
        $obj->prePopulateKnownValues = $prePopulateKnownValues;

        return $obj;
    }

    /**
     * Whether CAPTCHA (spam prevention) is enabled.
     */
    public function withRecaptchaEnabled(bool $recaptchaEnabled): self
    {
        $obj = clone $this;
        $obj->recaptchaEnabled = $recaptchaEnabled;

        return $obj;
    }

    /**
     * @param list<LifecycleStage> $lifecycleStages
     */
    public function withLifecycleStages(array $lifecycleStages): self
    {
        $obj = clone $this;
        $obj->lifecycleStages = $lifecycleStages;

        return $obj;
    }
}
