<?php

declare(strict_types=1);

namespace HubspotSDK\Marketing\Forms;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type marketing_forms_legal_consent_checkbox = array{
 *   label: string, required: bool, subscriptionTypeID: int
 * }
 */
final class MarketingFormsLegalConsentCheckbox implements BaseModel
{
    /** @use SdkModel<marketing_forms_legal_consent_checkbox> */
    use SdkModel;

    #[Api]
    public string $label;

    #[Api]
    public bool $required;

    #[Api('subscriptionTypeId')]
    public int $subscriptionTypeID;

    /**
     * `new MarketingFormsLegalConsentCheckbox()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * MarketingFormsLegalConsentCheckbox::with(
     *   label: ..., required: ..., subscriptionTypeID: ...
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new MarketingFormsLegalConsentCheckbox)
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
        $obj = new self;

        $obj->label = $label;
        $obj->required = $required;
        $obj->subscriptionTypeID = $subscriptionTypeID;

        return $obj;
    }

    public function withLabel(string $label): self
    {
        $obj = clone $this;
        $obj->label = $label;

        return $obj;
    }

    public function withRequired(bool $required): self
    {
        $obj = clone $this;
        $obj->required = $required;

        return $obj;
    }

    public function withSubscriptionTypeID(int $subscriptionTypeID): self
    {
        $obj = clone $this;
        $obj->subscriptionTypeID = $subscriptionTypeID;

        return $obj;
    }
}
