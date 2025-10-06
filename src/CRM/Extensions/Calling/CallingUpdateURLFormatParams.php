<?php

declare(strict_types=1);

namespace HubspotSDK\CRM\Extensions\Calling;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * An object containing the method's parameters.
 * Example usage:
 * ```
 * $params = (new CallingUpdateURLFormatParams); // set properties as needed
 * $client->crm.extensions.calling->updateURLFormat(...$params->toArray());
 * ```
 * Update recording settings.
 *
 * @method toArray()
 *   Returns the parameters as an associative array suitable for passing to the client method.
 *
 *   `$client->crm.extensions.calling->updateURLFormat(...$params->toArray());`
 *
 * @see HubspotSDK\CRM\Extensions\Calling->updateURLFormat
 *
 * @phpstan-type calling_update_url_format_params = array{
 *   urlToRetrieveAuthedRecording?: string
 * }
 */
final class CallingUpdateURLFormatParams implements BaseModel
{
    /** @use SdkModel<calling_update_url_format_params> */
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
