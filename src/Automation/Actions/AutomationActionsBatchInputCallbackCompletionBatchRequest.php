<?php

declare(strict_types=1);

namespace HubspotSDK\Automation\Actions;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type automation_actions_batch_input_callback_completion_batch_request = array{
 *   inputs: list<AutomationActionsCallbackCompletionBatchRequest>
 * }
 */
final class AutomationActionsBatchInputCallbackCompletionBatchRequest implements BaseModel
{
    /**
     * @use SdkModel<automation_actions_batch_input_callback_completion_batch_request>
     */
    use SdkModel;

    /** @var list<AutomationActionsCallbackCompletionBatchRequest> $inputs */
    #[Api(list: AutomationActionsCallbackCompletionBatchRequest::class)]
    public array $inputs;

    /**
     * `new AutomationActionsBatchInputCallbackCompletionBatchRequest()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * AutomationActionsBatchInputCallbackCompletionBatchRequest::with(inputs: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new AutomationActionsBatchInputCallbackCompletionBatchRequest)->withInputs(...)
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
     * @param list<AutomationActionsCallbackCompletionBatchRequest> $inputs
     */
    public static function with(array $inputs): self
    {
        $obj = new self;

        $obj->inputs = $inputs;

        return $obj;
    }

    /**
     * @param list<AutomationActionsCallbackCompletionBatchRequest> $inputs
     */
    public function withInputs(array $inputs): self
    {
        $obj = clone $this;
        $obj->inputs = $inputs;

        return $obj;
    }
}
