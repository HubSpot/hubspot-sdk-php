<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\Extensions\Calling\RecordingSettings;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @see HubspotSDK\Services\Crm\Extensions\Calling\RecordingSettingsService::update()
 *
 * @phpstan-type RecordingSettingUpdateParamsShape = array{
 *   urlToRetrieveAuthedRecording?: string|null
 * }
 */
final class RecordingSettingUpdateParams implements BaseModel
{
    /** @use SdkModel<RecordingSettingUpdateParamsShape> */
    use SdkModel;
    use SdkParams;

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

    public function withURLToRetrieveAuthedRecording(
        string $urlToRetrieveAuthedRecording
    ): self {
        $self = clone $this;
        $self['urlToRetrieveAuthedRecording'] = $urlToRetrieveAuthedRecording;

        return $self;
    }
}
