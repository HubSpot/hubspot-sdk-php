<?php

declare(strict_types=1);

namespace HubspotSDK\Automation\Actions;

use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @see HubspotSDK\Services\Automation\ActionsService::completeBatch()
 *
 * @phpstan-import-type CallbackCompletionBatchRequestShape from \HubspotSDK\Automation\Actions\CallbackCompletionBatchRequest
 *
 * @phpstan-type ActionCompleteBatchParamsShape = array{
 *   inputs: list<CallbackCompletionBatchRequest|CallbackCompletionBatchRequestShape>,
 * }
 */
final class ActionCompleteBatchParams implements BaseModel
{
    /** @use SdkModel<ActionCompleteBatchParamsShape> */
    use SdkModel;
    use SdkParams;

    /** @var list<CallbackCompletionBatchRequest> $inputs */
    #[Required(list: CallbackCompletionBatchRequest::class)]
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
