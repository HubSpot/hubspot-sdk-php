<?php

declare(strict_types=1);

namespace HubspotSDK\CRM\Extensions\Calling\RecordingSettings;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * Mark a call recording as ready for transcription, specifying the call by its ID (`engagementid`).
 *
 * @see HubspotSDK\CRM\Extensions\Calling\RecordingSettings->markReady
 *
 * @phpstan-type recording_setting_mark_ready_params = array{engagementID: int}
 */
final class RecordingSettingMarkReadyParams implements BaseModel
{
    /** @use SdkModel<recording_setting_mark_ready_params> */
    use SdkModel;
    use SdkParams;

    #[Api('engagementId')]
    public int $engagementID;

    /**
     * `new RecordingSettingMarkReadyParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * RecordingSettingMarkReadyParams::with(engagementID: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new RecordingSettingMarkReadyParams)->withEngagementID(...)
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
