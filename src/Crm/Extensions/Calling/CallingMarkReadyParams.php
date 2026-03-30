<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\Extensions\Calling;

use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * This endpoint is used to mark a call recording as ready. It requires the engagementId to identify the specific recording.
 *
 * @see HubspotSDK\Services\Crm\Extensions\CallingService::markReady()
 *
 * @phpstan-type CallingMarkReadyParamsShape = array{engagementID: int}
 */
final class CallingMarkReadyParams implements BaseModel
{
    /** @use SdkModel<CallingMarkReadyParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * The unique identifier for the engagement associated with the call recording.
     */
    #[Required('engagementId')]
    public int $engagementID;

    /**
     * `new CallingMarkReadyParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * CallingMarkReadyParams::with(engagementID: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new CallingMarkReadyParams)->withEngagementID(...)
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
    public static function with(int $engagementID): self
    {
        $self = new self;

        $self['engagementID'] = $engagementID;

        return $self;
    }

    /**
     * The unique identifier for the engagement associated with the call recording.
     */
    public function withEngagementID(int $engagementID): self
    {
        $self = clone $this;
        $self['engagementID'] = $engagementID;

        return $self;
    }
}
