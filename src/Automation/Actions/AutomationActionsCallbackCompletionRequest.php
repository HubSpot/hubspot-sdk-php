<?php

declare(strict_types=1);

namespace HubspotSDK\Automation\Actions;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type automation_actions_callback_completion_request = array{
 *   outputFields: array<string, string>
 * }
 */
final class AutomationActionsCallbackCompletionRequest implements BaseModel
{
    /** @use SdkModel<automation_actions_callback_completion_request> */
    use SdkModel;

    /** @var array<string, string> $outputFields */
    #[Api(map: 'string')]
    public array $outputFields;

    /**
     * `new AutomationActionsCallbackCompletionRequest()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * AutomationActionsCallbackCompletionRequest::with(outputFields: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new AutomationActionsCallbackCompletionRequest)->withOutputFields(...)
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
