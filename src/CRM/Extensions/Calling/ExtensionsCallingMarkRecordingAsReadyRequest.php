<?php

declare(strict_types=1);

namespace HubspotSDK\CRM\Extensions\Calling;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type extensions_calling_mark_recording_as_ready_request = array{
 *   engagementID: int
 * }
 */
final class ExtensionsCallingMarkRecordingAsReadyRequest implements BaseModel
{
    /** @use SdkModel<extensions_calling_mark_recording_as_ready_request> */
    use SdkModel;

    #[Api('engagementId')]
    public int $engagementID;

    /**
     * `new ExtensionsCallingMarkRecordingAsReadyRequest()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * ExtensionsCallingMarkRecordingAsReadyRequest::with(engagementID: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new ExtensionsCallingMarkRecordingAsReadyRequest)->withEngagementID(...)
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
        $obj = new self;

        $obj->engagementID = $engagementID;

        return $obj;
    }

    public function withEngagementID(int $engagementID): self
    {
        $obj = clone $this;
        $obj->engagementID = $engagementID;

        return $obj;
    }
}
