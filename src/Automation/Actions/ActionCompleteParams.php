<?php

declare(strict_types=1);

namespace HubspotSDK\Automation\Actions;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * An object containing the method's parameters.
 * Example usage:
 * ```
 * $params = (new ActionCompleteParams); // set properties as needed
 * $client->automation.actions->complete(...$params->toArray());
 * ```
 * Completes a callback.
 *
 * @method toArray()
 *   Returns the parameters as an associative array suitable for passing to the client method.
 *
 *   `$client->automation.actions->complete(...$params->toArray());`
 *
 * @see HubspotSDK\Automation\Actions->complete
 *
 * @phpstan-type action_complete_params = array{
 *   outputFields: array<string, string>
 * }
 */
final class ActionCompleteParams implements BaseModel
{
    /** @use SdkModel<action_complete_params> */
    use SdkModel;
    use SdkParams;

    /** @var array<string, string> $outputFields */
    #[Api(map: 'string')]
    public array $outputFields;

    /**
     * `new ActionCompleteParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * ActionCompleteParams::with(outputFields: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new ActionCompleteParams)->withOutputFields(...)
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
     *
     * @param array<string, string> $outputFields
     */
    public static function with(array $outputFields): self
    {
        $obj = new self;

        $obj->outputFields = $outputFields;

        return $obj;
    }

    /**
     * @param array<string, string> $outputFields
     */
    public function withOutputFields(array $outputFields): self
    {
        $obj = clone $this;
        $obj->outputFields = $outputFields;

        return $obj;
    }
}
