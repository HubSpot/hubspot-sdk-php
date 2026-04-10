<?php

declare(strict_types=1);

namespace HubSpotSDK\Scheduler\Meetings;

use HubSpotSDK\Core\Attributes\Required;
use HubSpotSDK\Core\Concerns\SdkModel;
use HubSpotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type ExternalCommunicationConsentCheckboxShape = array{
 *   communicationTypeID: string, label: string, required: bool
 * }
 */
final class ExternalCommunicationConsentCheckbox implements BaseModel
{
    /** @use SdkModel<ExternalCommunicationConsentCheckboxShape> */
    use SdkModel;

    /**
     * The ID of the communication consent form being recorded.
     */
    #[Required('communicationTypeId')]
    public string $communicationTypeID;

    /**
     * The text label describing the consent being given.
     */
    #[Required]
    public string $label;

    /**
     * Whether the consent checkbox is required.
     */
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
        $self = new self;

        $self['communicationTypeID'] = $communicationTypeID;
        $self['label'] = $label;
        $self['required'] = $required;

        return $self;
    }

    /**
     * The ID of the communication consent form being recorded.
     */
    public function withCommunicationTypeID(string $communicationTypeID): self
    {
        $self = clone $this;
        $self['communicationTypeID'] = $communicationTypeID;

        return $self;
    }

    /**
     * The text label describing the consent being given.
     */
    public function withLabel(string $label): self
    {
        $self = clone $this;
        $self['label'] = $label;

        return $self;
    }

    /**
     * Whether the consent checkbox is required.
     */
    public function withRequired(bool $required): self
    {
        $self = clone $this;
        $self['required'] = $required;

        return $self;
    }
}
