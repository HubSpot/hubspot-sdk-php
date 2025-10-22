<?php

declare(strict_types=1);

namespace HubspotSDK\CRM\Extensions\Calling;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * Register an external URL that HubSpot will use to retrieve [call recordings](https://developers.hubspot.com/docs/guides/apps/extensions/calling-extensions/recordings-and-transcriptions#register-your-app-s-endpoint-with-hubspot-using-the-calling-settings-api).
 *
 * @see HubspotSDK\CRM\Extensions\Calling->registerURLFormat
 *
 * @phpstan-type calling_register_url_format_params = array{
 *   urlToRetrieveAuthedRecording: string
 * }
 */
final class CallingRegisterURLFormatParams implements BaseModel
{
    /** @use SdkModel<calling_register_url_format_params> */
    use SdkModel;
    use SdkParams;

    #[Api]
    public string $urlToRetrieveAuthedRecording;

    /**
     * `new CallingRegisterURLFormatParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * CallingRegisterURLFormatParams::with(urlToRetrieveAuthedRecording: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new CallingRegisterURLFormatParams)->withURLToRetrieveAuthedRecording(...)
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
