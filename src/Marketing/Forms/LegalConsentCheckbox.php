<?php

declare(strict_types=1);

namespace HubspotSDK\Marketing\Forms;

use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type LegalConsentCheckboxShape = array{
 *   label: string, required: bool, subscriptionTypeID: int
 * }
 */
final class LegalConsentCheckbox implements BaseModel
{
    /** @use SdkModel<LegalConsentCheckboxShape> */
    use SdkModel;

    /**
     * The main label for the form field.
     */
    #[Required]
    public string $label;

    /**
     * Whether this checkbox is required when submitting the form.
     */
    #[Required]
    public bool $required;

    #[Required('subscriptionTypeId')]
    public int $subscriptionTypeID;

    /**
     * `new LegalConsentCheckbox()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * LegalConsentCheckbox::with(label: ..., required: ..., subscriptionTypeID: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new LegalConsentCheckbox)
     *   ->withLabel(...)
     *   ->withRequired(...)
     *   ->withSubscriptionTypeID(...)
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
     */
    public static function with(
        string $label,
        bool $required,
        int $subscriptionTypeID
    ): self {
        $self = new self;

        $self['label'] = $label;
        $self['required'] = $required;
        $self['subscriptionTypeID'] = $subscriptionTypeID;

        return $self;
    }

    /**
     * The main label for the form field.
     */
    public function withLabel(string $label): self
    {
        $self = clone $this;
        $self['label'] = $label;

        return $self;
    }

    /**
     * Whether this checkbox is required when submitting the form.
     */
    public function withRequired(bool $required): self
    {
        $self = clone $this;
        $self['required'] = $required;

        return $self;
    }

    public function withSubscriptionTypeID(int $subscriptionTypeID): self
    {
        $self = clone $this;
        $self['subscriptionTypeID'] = $subscriptionTypeID;

        return $self;
    }
}
