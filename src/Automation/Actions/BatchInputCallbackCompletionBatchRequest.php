<?php

declare(strict_types=1);

namespace HubspotSDK\Automation\Actions;

use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type BatchInputCallbackCompletionBatchRequestShape = array{
 *   inputs: list<CallbackCompletionBatchRequest>
 * }
 */
final class BatchInputCallbackCompletionBatchRequest implements BaseModel
{
    /** @use SdkModel<BatchInputCallbackCompletionBatchRequestShape> */
    use SdkModel;

    /** @var list<CallbackCompletionBatchRequest> $inputs */
    #[Required(list: CallbackCompletionBatchRequest::class)]
    public array $inputs;

    /**
     * `new BatchInputCallbackCompletionBatchRequest()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * BatchInputCallbackCompletionBatchRequest::with(inputs: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new BatchInputCallbackCompletionBatchRequest)->withInputs(...)
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
