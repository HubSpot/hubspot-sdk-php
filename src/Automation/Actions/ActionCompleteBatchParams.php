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
 * $params = (new ActionCompleteBatchParams); // set properties as needed
 * $client->automation.actions->completeBatch(...$params->toArray());
 * ```
 * Complete a batch of callbacks.
 *
 * @method toArray()
 *   Returns the parameters as an associative array suitable for passing to the client method.
 *
 *   `$client->automation.actions->completeBatch(...$params->toArray());`
 *
 * @see HubspotSDK\Automation\Actions->completeBatch
 *
 * @phpstan-type action_complete_batch_params = array{
 *   inputs: list<AutomationActionsCallbackCompletionBatchRequest>
 * }
 */
final class ActionCompleteBatchParams implements BaseModel
{
    /** @use SdkModel<action_complete_batch_params> */
    use SdkModel;
    use SdkParams;

    /** @var list<AutomationActionsCallbackCompletionBatchRequest> $inputs */
    #[Api(list: AutomationActionsCallbackCompletionBatchRequest::class)]
    public array $inputs;

    /**
     * `new ActionCompleteBatchParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * ActionCompleteBatchParams::with(inputs: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new ActionCompleteBatchParams)->withInputs(...)
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
