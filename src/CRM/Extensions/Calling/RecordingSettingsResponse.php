<?php

declare(strict_types=1);

namespace HubspotSDK\CRM\Extensions\Calling;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkResponse;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\Core\Conversion\Contracts\ResponseConverter;

/**
 * @phpstan-type recording_settings_response = array{
 *   urlToRetrieveAuthedRecording: string
 * }
 */
final class RecordingSettingsResponse implements BaseModel, ResponseConverter
{
    /** @use SdkModel<recording_settings_response> */
    use SdkModel;

    use SdkResponse;

    #[Api]
    public string $urlToRetrieveAuthedRecording;

    /**
     * `new RecordingSettingsResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * RecordingSettingsResponse::with(urlToRetrieveAuthedRecording: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new RecordingSettingsResponse)->withURLToRetrieveAuthedRecording(...)
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
