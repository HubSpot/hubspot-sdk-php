<?php

declare(strict_types=1);

namespace HubspotSDK\CRM\Extensions\Calling\RecordingSettings;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * An object containing the method's parameters.
 * Example usage:
 * ```
 * $params = (new RecordingSettingMarkAsReadyParams); // set properties as needed
 * $client->crm.extensions.calling.recordingSettings->markAsReady(...$params->toArray());
 * ```
 * Mark recording as ready for transcription.
 *
 * @method toArray()
 *   Returns the parameters as an associative array suitable for passing to the client method.
 *
 *   `$client->crm.extensions.calling.recordingSettings->markAsReady(...$params->toArray());`
 *
 * @see HubspotSDK\CRM\Extensions\Calling\RecordingSettings->markAsReady
 *
 * @phpstan-type recording_setting_mark_as_ready_params = array{engagementID: int}
 */
final class RecordingSettingMarkAsReadyParams implements BaseModel
{
    /** @use SdkModel<recording_setting_mark_as_ready_params> */
    use SdkModel;
    use SdkParams;

    #[Api('engagementId')]
    public int $engagementID;

    /**
     * `new RecordingSettingMarkAsReadyParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * RecordingSettingMarkAsReadyParams::with(engagementID: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new RecordingSettingMarkAsReadyParams)->withEngagementID(...)
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
