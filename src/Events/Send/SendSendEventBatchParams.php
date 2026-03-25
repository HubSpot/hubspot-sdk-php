<?php

declare(strict_types=1);

namespace HubspotSDK\Events\Send;

use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @see HubspotSDK\Services\Events\SendService::sendEventBatch()
 *
 * @phpstan-import-type BehavioralEventHTTPCompletionRequestShape from \HubspotSDK\Events\Send\BehavioralEventHTTPCompletionRequest
 *
 * @phpstan-type SendSendEventBatchParamsShape = array{
 *   inputs: list<BehavioralEventHTTPCompletionRequest|BehavioralEventHTTPCompletionRequestShape>,
 * }
 */
final class SendSendEventBatchParams implements BaseModel
{
    /** @use SdkModel<SendSendEventBatchParamsShape> */
    use SdkModel;
    use SdkParams;

    /** @var list<BehavioralEventHTTPCompletionRequest> $inputs */
    #[Required(list: BehavioralEventHTTPCompletionRequest::class)]
    public array $inputs;

    /**
     * `new SendSendEventBatchParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * SendSendEventBatchParams::with(inputs: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new SendSendEventBatchParams)->withInputs(...)
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
     * @param list<BehavioralEventHTTPCompletionRequest|BehavioralEventHTTPCompletionRequestShape> $inputs
     */
    public static function with(array $inputs): self
    {
        $self = new self;

        $self['inputs'] = $inputs;

        return $self;
    }

    /**
     * @param list<BehavioralEventHTTPCompletionRequest|BehavioralEventHTTPCompletionRequestShape> $inputs
     */
    public function withInputs(array $inputs): self
    {
        $self = clone $this;
        $self['inputs'] = $inputs;

        return $self;
    }
}
