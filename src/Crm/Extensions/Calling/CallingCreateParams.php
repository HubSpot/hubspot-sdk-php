<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\Extensions\Calling;

use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * Create new recording settings for a specific app using the provided app ID.
 *
 * @see HubspotSDK\Services\Crm\Extensions\CallingService::create()
 *
 * @phpstan-type CallingCreateParamsShape = array{
 *   urlToRetrieveAuthedRecording: string
 * }
 */
final class CallingCreateParams implements BaseModel
{
    /** @use SdkModel<CallingCreateParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * The URL used to access authenticated call recordings.
     */
    #[Required]
    public string $urlToRetrieveAuthedRecording;

    /**
     * `new CallingCreateParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * CallingCreateParams::with(urlToRetrieveAuthedRecording: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new CallingCreateParams)->withURLToRetrieveAuthedRecording(...)
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
