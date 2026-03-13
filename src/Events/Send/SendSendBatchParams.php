<?php

declare(strict_types=1);

namespace HubspotSDK\Events\Send;

use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * Send multiple event completions at once.
 *
 * @see HubspotSDK\Services\Events\SendService::sendBatch()
 *
 * @phpstan-import-type BehavioralEventHTTPCompletionRequestShape from \HubspotSDK\Events\Send\BehavioralEventHTTPCompletionRequest
 *
 * @phpstan-type SendSendBatchParamsShape = array{
 *   inputs: list<BehavioralEventHTTPCompletionRequest|BehavioralEventHTTPCompletionRequestShape>,
 * }
 */
final class SendSendBatchParams implements BaseModel
{
    /** @use SdkModel<SendSendBatchParamsShape> */
    use SdkModel;
    use SdkParams;

    /** @var list<BehavioralEventHTTPCompletionRequest> $inputs */
    #[Required(list: BehavioralEventHTTPCompletionRequest::class)]
    public array $inputs;

    /**
     * `new SendSendBatchParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * SendSendBatchParams::with(inputs: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new SendSendBatchParams)->withInputs(...)
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
