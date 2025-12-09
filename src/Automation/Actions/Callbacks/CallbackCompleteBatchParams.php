<?php

declare(strict_types=1);

namespace HubspotSDK\Automation\Actions\Callbacks;

use HubspotSDK\Automation\Actions\CallbackCompletionBatchRequest;
use HubspotSDK\Core\Attributes\Required;
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
 *     callbackID: string, outputFields: array<string,string>
 *   }>,
 * }
 */
final class CallbackCompleteBatchParams implements BaseModel
{
    /** @use SdkModel<CallbackCompleteBatchParamsShape> */
    use SdkModel;
    use SdkParams;

    /** @var list<CallbackCompletionBatchRequest> $inputs */
    #[Required(list: CallbackCompletionBatchRequest::class)]
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
     *   callbackID: string, outputFields: array<string,string>
     * }> $inputs
     */
    public static function with(array $inputs): self
    {
        $self = new self;

        $self['inputs'] = $inputs;

        return $self;
    }

    /**
     * @param list<CallbackCompletionBatchRequest|array{
     *   callbackID: string, outputFields: array<string,string>
     * }> $inputs
     */
    public function withInputs(array $inputs): self
    {
        $self = clone $this;
        $self['inputs'] = $inputs;

        return $self;
    }
}
