<?php

declare(strict_types=1);

namespace HubspotSDK\Automation\Sequences;

use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * Retrieve details of a specific sequence in your HubSpot account using the sequence ID. This endpoint requires the user ID to be specified and provides comprehensive information about the sequence, including its steps and dependencies.
 *
 * @see HubspotSDK\Services\Automation\SequencesService::get()
 *
 * @phpstan-type SequenceGetParamsShape = array{userID: string}
 */
final class SequenceGetParams implements BaseModel
{
    /** @use SdkModel<SequenceGetParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * The unique identifier of the user requesting the sequence details. This parameter is required.
     */
    #[Required]
    public string $userID;

    /**
     * `new SequenceGetParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * SequenceGetParams::with(userID: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new SequenceGetParams)->withUserID(...)
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
    public static function with(string $userID): self
    {
        $self = new self;

        $self['userID'] = $userID;

        return $self;
    }

    /**
     * The unique identifier of the user requesting the sequence details. This parameter is required.
     */
    public function withUserID(string $userID): self
    {
        $self = clone $this;
        $self['userID'] = $userID;

        return $self;
    }
}
