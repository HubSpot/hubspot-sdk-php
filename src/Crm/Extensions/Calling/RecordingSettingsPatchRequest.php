<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\Extensions\Calling;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type RecordingSettingsPatchRequestShape = array{
 *   urlToRetrieveAuthedRecording?: string|null
 * }
 */
final class RecordingSettingsPatchRequest implements BaseModel
{
    /** @use SdkModel<RecordingSettingsPatchRequestShape> */
    use SdkModel;

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
        $obj = new self;

        null !== $urlToRetrieveAuthedRecording && $obj['urlToRetrieveAuthedRecording'] = $urlToRetrieveAuthedRecording;

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
