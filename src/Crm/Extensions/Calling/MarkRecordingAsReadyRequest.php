<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\Extensions\Calling;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type MarkRecordingAsReadyRequestShape = array{engagementId: int}
 */
final class MarkRecordingAsReadyRequest implements BaseModel
{
    /** @use SdkModel<MarkRecordingAsReadyRequestShape> */
    use SdkModel;

    #[Api]
    public int $engagementId;

    /**
     * `new MarkRecordingAsReadyRequest()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * MarkRecordingAsReadyRequest::with(engagementId: ...)
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
    public static function with(int $engagementId): self
    {
        $obj = new self;

        $obj['engagementId'] = $engagementId;

        return $obj;
    }

    public function withEngagementID(int $engagementID): self
    {
        $obj = clone $this;
        $obj['engagementId'] = $engagementID;

        return $obj;
    }
}
