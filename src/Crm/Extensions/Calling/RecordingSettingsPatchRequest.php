<?php

declare(strict_types=1);

namespace HubSpotSDK\Crm\Extensions\Calling;

use HubSpotSDK\Core\Attributes\Optional;
use HubSpotSDK\Core\Concerns\SdkModel;
use HubSpotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type RecordingSettingsPatchRequestShape = array{
 *   urlToRetrieveAuthedRecording?: string|null
 * }
 */
final class RecordingSettingsPatchRequest implements BaseModel
{
    /** @use SdkModel<RecordingSettingsPatchRequestShape> */
    use SdkModel;

    /**
     * The URL used to access authenticated call recordings.
     */
    #[Optional]
    public ?string $urlToRetrieveAuthedRecording;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(
        ?string $urlToRetrieveAuthedRecording = null
    ): self {
        $self = new self;

        null !== $urlToRetrieveAuthedRecording && $self['urlToRetrieveAuthedRecording'] = $urlToRetrieveAuthedRecording;

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
