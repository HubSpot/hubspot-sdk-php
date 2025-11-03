<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\Extensions\Calling\RecordingSettings;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @see HubspotSDK\Crm\Extensions\Calling\RecordingSettings->create
 *
 * @phpstan-type RecordingSettingCreateParamsShape = array{
 *   urlToRetrieveAuthedRecording: string
 * }
 */
final class RecordingSettingCreateParams implements BaseModel
{
    /** @use SdkModel<RecordingSettingCreateParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Api]
    public string $urlToRetrieveAuthedRecording;

    /**
     * `new RecordingSettingCreateParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * RecordingSettingCreateParams::with(urlToRetrieveAuthedRecording: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new RecordingSettingCreateParams)->withURLToRetrieveAuthedRecording(...)
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
