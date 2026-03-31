<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\Extensions\Calling;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * Update the recording settings for a specific app using the provided app ID.
 *
 * @see HubspotSDK\Services\Crm\Extensions\CallingService::updateRecordingSettings()
 *
 * @phpstan-type CallingUpdateRecordingSettingsParamsShape = array{
 *   urlToRetrieveAuthedRecording?: string|null
 * }
 */
final class CallingUpdateRecordingSettingsParams implements BaseModel
{
    /** @use SdkModel<CallingUpdateRecordingSettingsParamsShape> */
    use SdkModel;
    use SdkParams;

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
