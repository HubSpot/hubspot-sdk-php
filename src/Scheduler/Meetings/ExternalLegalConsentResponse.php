<?php

declare(strict_types=1);

namespace HubspotSDK\Scheduler\Meetings;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type external_legal_consent_response = array{
 *   communicationTypeID: string, consented: bool
 * }
 */
final class ExternalLegalConsentResponse implements BaseModel
{
    /** @use SdkModel<external_legal_consent_response> */
    use SdkModel;

    #[Api('communicationTypeId')]
    public string $communicationTypeID;

    #[Api]
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
        $obj = new self;

        $obj->communicationTypeID = $communicationTypeID;
        $obj->consented = $consented;

        return $obj;
    }

    public function withCommunicationTypeID(string $communicationTypeID): self
    {
        $obj = clone $this;
        $obj->communicationTypeID = $communicationTypeID;

        return $obj;
    }

    public function withConsented(bool $consented): self
    {
        $obj = clone $this;
        $obj->consented = $consented;

        return $obj;
    }
}
