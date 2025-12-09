<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\Extensions\Calling;

use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type MarkRecordingAsReadyRequestShape = array{engagementID: int}
 */
final class MarkRecordingAsReadyRequest implements BaseModel
{
    /** @use SdkModel<MarkRecordingAsReadyRequestShape> */
    use SdkModel;

    #[Required('engagementId')]
    public int $engagementID;

    /**
     * `new MarkRecordingAsReadyRequest()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * MarkRecordingAsReadyRequest::with(engagementID: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new MarkRecordingAsReadyRequest)->withEngagementID(...)
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

    public function withEngagementID(int $engagementID): self
    {
        $self = clone $this;
        $self['engagementID'] = $engagementID;

        return $self;
    }
}
