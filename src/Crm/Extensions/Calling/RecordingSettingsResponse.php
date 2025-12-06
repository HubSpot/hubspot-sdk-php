<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\Extensions\Calling;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type RecordingSettingsResponseShape = array{
 *   urlToRetrieveAuthedRecording: string
 * }
 */
final class RecordingSettingsResponse implements BaseModel
{
    /** @use SdkModel<RecordingSettingsResponseShape> */
    use SdkModel;

    /**
     * The URL used to retrieve authenticated call recordings.
     */
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

        $obj['urlToRetrieveAuthedRecording'] = $urlToRetrieveAuthedRecording;

        return $obj;
    }

    /**
     * The URL used to retrieve authenticated call recordings.
     */
    public function withURLToRetrieveAuthedRecording(
        string $urlToRetrieveAuthedRecording
    ): self {
        $obj = clone $this;
        $obj['urlToRetrieveAuthedRecording'] = $urlToRetrieveAuthedRecording;

        return $obj;
    }
}
