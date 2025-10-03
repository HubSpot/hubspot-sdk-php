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
 * $params = (new RecordingSettingRegisterURLFormatParams); // set properties as needed
 * $client->crm.extensions.calling.recordingSettings->registerURLFormat(...$params->toArray());
 * ```
 * Enable the app for call recording.
 *
 * @method toArray()
 *   Returns the parameters as an associative array suitable for passing to the client method.
 *
 *   `$client->crm.extensions.calling.recordingSettings->registerURLFormat(...$params->toArray());`
 *
 * @see HubspotSDK\CRM\Extensions\Calling\RecordingSettings->registerURLFormat
 *
 * @phpstan-type recording_setting_register_url_format_params = array{
 *   urlToRetrieveAuthedRecording: string
 * }
 */
final class RecordingSettingRegisterURLFormatParams implements BaseModel
{
    /** @use SdkModel<recording_setting_register_url_format_params> */
    use SdkModel;
    use SdkParams;

    #[Api]
    public string $urlToRetrieveAuthedRecording;

    /**
     * `new RecordingSettingRegisterURLFormatParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * RecordingSettingRegisterURLFormatParams::with(urlToRetrieveAuthedRecording: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new RecordingSettingRegisterURLFormatParams)
     *   ->withURLToRetrieveAuthedRecording(...)
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
    public static function with(string $urlToRetrieveAuthedRecording): self
    {
        $obj = new self;

        $obj->urlToRetrieveAuthedRecording = $urlToRetrieveAuthedRecording;

        return $obj;
    }

    public function withURLToRetrieveAuthedRecording(
        string $urlToRetrieveAuthedRecording
    ): self {
        $obj = clone $this;
        $obj->urlToRetrieveAuthedRecording = $urlToRetrieveAuthedRecording;

        return $obj;
    }
}
