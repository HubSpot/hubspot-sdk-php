<?php

declare(strict_types=1);

namespace HubspotSDK\Automation\Actions\Callbacks;

use HubspotSDK\Automation\Actions\CallbackCompletionBatchRequest;
use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * Complete a batch of blocked action executions.
 *
 * @see HubspotSDK\Services\Automation\Actions\CallbacksService::completeBatch()
 *
 * @phpstan-type CallbackCompleteBatchParamsShape = array{
 *   inputs: list<CallbackCompletionBatchRequest|array{
 *     callbackId: string, outputFields: array<string,string>
 *   }>,
 * }
 */
final class CallbackCompleteBatchParams implements BaseModel
{
    /** @use SdkModel<CallbackCompleteBatchParamsShape> */
    use SdkModel;
    use SdkParams;

    /** @var list<CallbackCompletionBatchRequest> $inputs */
    #[Api(list: CallbackCompletionBatchRequest::class)]
    public array $inputs;

    /**
     * `new CallbackCompleteBatchParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * CallbackCompleteBatchParams::with(inputs: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new CallbackCompleteBatchParams)->withInputs(...)
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
     * @param list<CallbackCompletionBatchRequest|array{
     *   callbackId: string, outputFields: array<string,string>
     * }> $inputs
     */
    public static function with(array $inputs): self
    {
        $obj = new self;

        $obj['inputs'] = $inputs;

        return $obj;
    }

    /**
     * @param list<CallbackCompletionBatchRequest|array{
     *   callbackId: string, outputFields: array<string,string>
     * }> $inputs
     */
    public function withInputs(array $inputs): self
    {
        $obj = clone $this;
        $obj['inputs'] = $inputs;

        return $obj;
    }
}
