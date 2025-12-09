<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\Extensions\Calling;

use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type RecordingSettingsRequestShape = array{
 *   urlToRetrieveAuthedRecording: string
 * }
 */
final class RecordingSettingsRequest implements BaseModel
{
    /** @use SdkModel<RecordingSettingsRequestShape> */
    use SdkModel;

    #[Required]
    public string $urlToRetrieveAuthedRecording;

    /**
     * `new RecordingSettingsRequest()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * RecordingSettingsRequest::with(urlToRetrieveAuthedRecording: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new RecordingSettingsRequest)->withURLToRetrieveAuthedRecording(...)
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

    public function withURLToRetrieveAuthedRecording(
        string $urlToRetrieveAuthedRecording
    ): self {
        $obj = clone $this;
        $obj['urlToRetrieveAuthedRecording'] = $urlToRetrieveAuthedRecording;

        return $obj;
    }
}
