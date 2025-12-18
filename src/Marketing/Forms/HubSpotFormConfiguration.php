<?php

declare(strict_types=1);

namespace HubspotSDK\Marketing\Forms;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\Marketing\Forms\HubSpotFormConfiguration\Language;

/**
 * @phpstan-import-type FormPostSubmitActionShape from \HubspotSDK\Marketing\Forms\FormPostSubmitAction
 * @phpstan-import-type LifecycleStageShape from \HubspotSDK\Marketing\Forms\LifecycleStage
 *
 * @phpstan-type HubSpotFormConfigurationShape = array{
 *   allowLinkToResetKnownValues: bool,
 *   archivable: bool,
 *   cloneable: bool,
 *   createNewContactForNewEmail: bool,
 *   editable: bool,
 *   language: Language|value-of<Language>,
 *   notifyContactOwner: bool,
 *   notifyRecipients: list<string>,
 *   postSubmitAction: FormPostSubmitAction|FormPostSubmitActionShape,
 *   prePopulateKnownValues: bool,
 *   recaptchaEnabled: bool,
 *   lifecycleStages?: list<LifecycleStageShape>|null,
 * }
 */
final class HubSpotFormConfiguration implements BaseModel
{
    /** @use SdkModel<HubSpotFormConfigurationShape> */
    use SdkModel;

    /**
     * Whether to add a reset link to the form. This removes any pre-populated content on the form and creates a new contact on submission.
     */
    #[Required]
    public bool $allowLinkToResetKnownValues;

    /**
     * Whether the form can be archived.
     */
    #[Required]
    public bool $archivable;

    /**
     * Whether the form can be cloned.
     */
    #[Required]
    public bool $cloneable;

    /**
     * Whether to create a new contact when a form is submitted with an email address that doesn’t match any in your existing contacts records.
     */
    #[Required]
    public bool $createNewContactForNewEmail;

    /**
     * Whether the form can be edited.
     */
    #[Required]
    public bool $editable;

    /**
     * The language of the form.
     *
     * @var value-of<Language> $language
     */
    #[Required(enum: Language::class)]
    public string $language;

    /**
     * Whether to send a notification email to the contact owner when a submission is received.
     */
    #[Required]
    public bool $notifyContactOwner;

    /**
     * The list of user IDs to receive a notification email when a submission is received.
     *
     * @var list<string> $notifyRecipients
     */
    #[Required(list: 'string')]
    public array $notifyRecipients;

    /**
     * What should happen after the customer submits the form.
     */
    #[Required]
    public FormPostSubmitAction $postSubmitAction;

    /**
     * Whether contact fields should pre-populate with known information when a contact returns to your site.
     */
    #[Required]
    public bool $prePopulateKnownValues;

    /**
     * Whether CAPTCHA (spam prevention) is enabled.
     */
    #[Required]
    public bool $recaptchaEnabled;

    /** @var list<LifecycleStage>|null $lifecycleStages */
    #[Optional(list: LifecycleStage::class)]
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
     * @param FormPostSubmitAction|FormPostSubmitActionShape $postSubmitAction
     * @param list<LifecycleStageShape>|null $lifecycleStages
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
        FormPostSubmitAction|array $postSubmitAction,
        bool $prePopulateKnownValues,
        bool $recaptchaEnabled,
        ?array $lifecycleStages = null,
    ): self {
        $self = new self;

        $self['allowLinkToResetKnownValues'] = $allowLinkToResetKnownValues;
        $self['archivable'] = $archivable;
        $self['cloneable'] = $cloneable;
        $self['createNewContactForNewEmail'] = $createNewContactForNewEmail;
        $self['editable'] = $editable;
        $self['language'] = $language;
        $self['notifyContactOwner'] = $notifyContactOwner;
        $self['notifyRecipients'] = $notifyRecipients;
        $self['postSubmitAction'] = $postSubmitAction;
        $self['prePopulateKnownValues'] = $prePopulateKnownValues;
        $self['recaptchaEnabled'] = $recaptchaEnabled;

        null !== $lifecycleStages && $self['lifecycleStages'] = $lifecycleStages;

        return $self;
    }

    /**
     * Whether to add a reset link to the form. This removes any pre-populated content on the form and creates a new contact on submission.
     */
    public function withAllowLinkToResetKnownValues(
        bool $allowLinkToResetKnownValues
    ): self {
        $self = clone $this;
        $self['allowLinkToResetKnownValues'] = $allowLinkToResetKnownValues;

        return $self;
    }

    /**
     * Whether the form can be archived.
     */
    public function withArchivable(bool $archivable): self
    {
        $self = clone $this;
        $self['archivable'] = $archivable;

        return $self;
    }

    /**
     * Whether the form can be cloned.
     */
    public function withCloneable(bool $cloneable): self
    {
        $self = clone $this;
        $self['cloneable'] = $cloneable;

        return $self;
    }

    /**
     * Whether to create a new contact when a form is submitted with an email address that doesn’t match any in your existing contacts records.
     */
    public function withCreateNewContactForNewEmail(
        bool $createNewContactForNewEmail
    ): self {
        $self = clone $this;
        $self['createNewContactForNewEmail'] = $createNewContactForNewEmail;

        return $self;
    }

    /**
     * Whether the form can be edited.
     */
    public function withEditable(bool $editable): self
    {
        $self = clone $this;
        $self['editable'] = $editable;

        return $self;
    }

    /**
     * The language of the form.
     *
     * @param Language|value-of<Language> $language
     */
    public function withLanguage(Language|string $language): self
    {
        $self = clone $this;
        $self['language'] = $language;

        return $self;
    }

    /**
     * Whether to send a notification email to the contact owner when a submission is received.
     */
    public function withNotifyContactOwner(bool $notifyContactOwner): self
    {
        $self = clone $this;
        $self['notifyContactOwner'] = $notifyContactOwner;

        return $self;
    }

    /**
     * The list of user IDs to receive a notification email when a submission is received.
     *
     * @param list<string> $notifyRecipients
     */
    public function withNotifyRecipients(array $notifyRecipients): self
    {
        $self = clone $this;
        $self['notifyRecipients'] = $notifyRecipients;

        return $self;
    }

    /**
     * What should happen after the customer submits the form.
     *
     * @param FormPostSubmitAction|FormPostSubmitActionShape $postSubmitAction
     */
    public function withPostSubmitAction(
        FormPostSubmitAction|array $postSubmitAction
    ): self {
        $self = clone $this;
        $self['postSubmitAction'] = $postSubmitAction;

        return $self;
    }

    /**
     * Whether contact fields should pre-populate with known information when a contact returns to your site.
     */
    public function withPrePopulateKnownValues(
        bool $prePopulateKnownValues
    ): self {
        $self = clone $this;
        $self['prePopulateKnownValues'] = $prePopulateKnownValues;

        return $self;
    }

    /**
     * Whether CAPTCHA (spam prevention) is enabled.
     */
    public function withRecaptchaEnabled(bool $recaptchaEnabled): self
    {
        $self = clone $this;
        $self['recaptchaEnabled'] = $recaptchaEnabled;

        return $self;
    }

    /**
     * @param list<LifecycleStageShape> $lifecycleStages
     */
    public function withLifecycleStages(array $lifecycleStages): self
    {
        $self = clone $this;
        $self['lifecycleStages'] = $lifecycleStages;

        return $self;
    }
}
