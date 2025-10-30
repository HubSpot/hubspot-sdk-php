<?php

declare(strict_types=1);

namespace HubspotSDK\Automation\Actions;

use HubspotSDK\Core\Attributes\Api;
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
    #[Api(list: CallbackCompletionBatchRequest::class)]
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
     * @param list<CallbackCompletionBatchRequest> $inputs
     */
    public static function with(array $inputs): self
    {
        $obj = new self;

        $obj->inputs = $inputs;

        return $obj;
    }

    /**
     * @param list<CallbackCompletionBatchRequest> $inputs
     */
    public function withInputs(array $inputs): self
    {
        $obj = clone $this;
        $obj->inputs = $inputs;

        return $obj;
    }
}
