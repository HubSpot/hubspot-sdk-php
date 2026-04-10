<?php

declare(strict_types=1);

namespace HubSpotSDK\Crm\Extensions\Calling;

use HubSpotSDK\Core\Attributes\Required;
use HubSpotSDK\Core\Concerns\SdkModel;
use HubSpotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type RecordingSettingsRequestShape = array{
 *   urlToRetrieveAuthedRecording: string
 * }
 */
final class RecordingSettingsRequest implements BaseModel
{
    /** @use SdkModel<RecordingSettingsRequestShape> */
    use SdkModel;

    /**
     * The URL used to access authenticated call recordings.
     */
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
        $self = new self;

        $self['urlToRetrieveAuthedRecording'] = $urlToRetrieveAuthedRecording;

        return $self;
    }

    /**
     * The URL used to access authenticated call recordings.
     */
    public function withURLToRetrieveAuthedRecording(
        string $urlToRetrieveAuthedRecording
    ): self {
        $self = clone $this;
        $self['urlToRetrieveAuthedRecording'] = $urlToRetrieveAuthedRecording;

        return $self;
    }
}
