<?php

declare(strict_types=1);

namespace HubspotSDK\Automation\Actions;

use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type CallbackCompletionBatchRequestShape from \HubspotSDK\Automation\Actions\CallbackCompletionBatchRequest
 *
 * @phpstan-type BatchInputCallbackCompletionBatchRequestShape = array{
 *   inputs: list<CallbackCompletionBatchRequest|CallbackCompletionBatchRequestShape>,
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
     * @param list<CallbackCompletionBatchRequest|CallbackCompletionBatchRequestShape> $inputs
     */
    public static function with(array $inputs): self
    {
        $self = new self;

        $self['inputs'] = $inputs;

        return $self;
    }

    /**
     * @param list<CallbackCompletionBatchRequest|CallbackCompletionBatchRequestShape> $inputs
     */
    public function withInputs(array $inputs): self
    {
        $self = clone $this;
        $self['inputs'] = $inputs;

        return $self;
    }
}
