<?php

declare(strict_types=1);

namespace HubspotSDK\Marketing\Forms;

use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type LegalConsentCheckboxShape = array{
 *   label: string, required: bool, subscriptionTypeId: int
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

    #[Required]
    public int $subscriptionTypeId;

    /**
     * `new LegalConsentCheckbox()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * LegalConsentCheckbox::with(label: ..., required: ..., subscriptionTypeId: ...)
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
        int $subscriptionTypeId
    ): self {
        $obj = new self;

        $obj['label'] = $label;
        $obj['required'] = $required;
        $obj['subscriptionTypeId'] = $subscriptionTypeId;

        return $obj;
    }

    /**
     * The main label for the form field.
     */
    public function withLabel(string $label): self
    {
        $obj = clone $this;
        $obj['label'] = $label;

        return $obj;
    }

    /**
     * Whether this checkbox is required when submitting the form.
     */
    public function withRequired(bool $required): self
    {
        $obj = clone $this;
        $obj['required'] = $required;

        return $obj;
    }

    public function withSubscriptionTypeID(int $subscriptionTypeID): self
    {
        $obj = clone $this;
        $obj['subscriptionTypeId'] = $subscriptionTypeID;

        return $obj;
    }
}
