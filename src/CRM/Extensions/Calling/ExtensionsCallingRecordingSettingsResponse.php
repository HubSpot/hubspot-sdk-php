<?php

declare(strict_types=1);

namespace HubspotSDK\CRM\Extensions\Calling;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type extensions_calling_recording_settings_response = array{
 *   urlToRetrieveAuthedRecording: string
 * }
 */
final class ExtensionsCallingRecordingSettingsResponse implements BaseModel
{
    /** @use SdkModel<extensions_calling_recording_settings_response> */
    use SdkModel;

    #[Api]
    public string $urlToRetrieveAuthedRecording;

    /**
     * `new ExtensionsCallingRecordingSettingsResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * ExtensionsCallingRecordingSettingsResponse::with(
     *   urlToRetrieveAuthedRecording: ...
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new ExtensionsCallingRecordingSettingsResponse)
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
