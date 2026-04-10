<?php

declare(strict_types=1);

namespace HubSpotSDK\Scheduler\Meetings;

use HubSpotSDK\Core\Attributes\Required;
use HubSpotSDK\Core\Concerns\SdkModel;
use HubSpotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type ExternalLegalConsentResponseShape = array{
 *   communicationTypeID: string, consented: bool
 * }
 */
final class ExternalLegalConsentResponse implements BaseModel
{
    /** @use SdkModel<ExternalLegalConsentResponseShape> */
    use SdkModel;

    /**
     * The ID of communication consent form being recorded.
     */
    #[Required('communicationTypeId')]
    public string $communicationTypeID;

    /**
     * Whether the user has given consent for the specified communication type.
     */
    #[Required]
    public bool $consented;

    /**
     * `new ExternalLegalConsentResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * ExternalLegalConsentResponse::with(communicationTypeID: ..., consented: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new ExternalLegalConsentResponse)
     *   ->withCommunicationTypeID(...)
     *   ->withConsented(...)
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
        bool $consented
    ): self {
        $self = new self;

        $self['communicationTypeID'] = $communicationTypeID;
        $self['consented'] = $consented;

        return $self;
    }

    /**
     * The ID of communication consent form being recorded.
     */
    public function withCommunicationTypeID(string $communicationTypeID): self
    {
        $self = clone $this;
        $self['communicationTypeID'] = $communicationTypeID;

        return $self;
    }

    /**
     * Whether the user has given consent for the specified communication type.
     */
    public function withConsented(bool $consented): self
    {
        $self = clone $this;
        $self['consented'] = $consented;

        return $self;
    }
}
