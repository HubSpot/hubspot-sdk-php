<?php

declare(strict_types=1);

namespace HubspotSDK\CRM\Extensions\Calling\RecordingSettings;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * Update the URL that HubSpot will use to retrieve [call recordings](https://developers.hubspot.com/docs/guides/apps/extensions/calling-extensions/recordings-and-transcriptions#register-your-app-s-endpoint-with-hubspot-using-the-calling-settings-api).
 *
 * @see HubspotSDK\CRM\Extensions\Calling\RecordingSettings->update
 *
 * @phpstan-type RecordingSettingUpdateParamsShape = array{
 *   urlToRetrieveAuthedRecording?: string
 * }
 */
final class RecordingSettingUpdateParams implements BaseModel
{
    /** @use SdkModel<RecordingSettingUpdateParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Api(optional: true)]
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

        null !== $urlToRetrieveAuthedRecording && $obj->urlToRetrieveAuthedRecording = $urlToRetrieveAuthedRecording;

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
