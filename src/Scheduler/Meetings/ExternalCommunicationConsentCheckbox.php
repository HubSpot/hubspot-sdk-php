<?php

declare(strict_types=1);

namespace HubspotSDK\Scheduler\Meetings;

use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type ExternalCommunicationConsentCheckboxShape = array{
 *   communicationTypeID: string, label: string, required: bool
 * }
 */
final class ExternalCommunicationConsentCheckbox implements BaseModel
{
    /** @use SdkModel<ExternalCommunicationConsentCheckboxShape> */
    use SdkModel;

    #[Required('communicationTypeId')]
    public string $communicationTypeID;

    #[Required]
    public string $label;

    #[Required]
    public bool $required;

    /**
     * `new ExternalCommunicationConsentCheckbox()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * ExternalCommunicationConsentCheckbox::with(
     *   communicationTypeID: ..., label: ..., required: ...
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new ExternalCommunicationConsentCheckbox)
     *   ->withCommunicationTypeID(...)
     *   ->withLabel(...)
     *   ->withRequired(...)
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
        string $communicationTypeID,
        string $label,
        bool $required
    ): self {
        $obj = new self;

        $obj['communicationTypeID'] = $communicationTypeID;
        $obj['label'] = $label;
        $obj['required'] = $required;

        return $obj;
    }

    public function withCommunicationTypeID(string $communicationTypeID): self
    {
        $obj = clone $this;
        $obj['communicationTypeID'] = $communicationTypeID;

        return $obj;
    }

    public function withLabel(string $label): self
    {
        $obj = clone $this;
        $obj['label'] = $label;

        return $obj;
    }

    public function withRequired(bool $required): self
    {
        $obj = clone $this;
        $obj['required'] = $required;

        return $obj;
    }
}
