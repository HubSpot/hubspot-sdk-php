<?php

declare(strict_types=1);

namespace HubspotSDK\Events\Send;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * Send multiple event completions at once.
 *
 * @see HubspotSDK\Events\Send->sendBatch
 *
 * @phpstan-type send_send_batch_params = array{
 *   inputs: list<BehavioralEventHTTPCompletionRequest>
 * }
 */
final class SendSendBatchParams implements BaseModel
{
    /** @use SdkModel<send_send_batch_params> */
    use SdkModel;
    use SdkParams;

    /** @var list<BehavioralEventHTTPCompletionRequest> $inputs */
    #[Api(list: BehavioralEventHTTPCompletionRequest::class)]
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
     * @param list<BehavioralEventHTTPCompletionRequest> $inputs
     */
    public static function with(array $inputs): self
    {
        $obj = new self;

        $obj->inputs = $inputs;

        return $obj;
    }

    /**
     * @param list<BehavioralEventHTTPCompletionRequest> $inputs
     */
    public function withInputs(array $inputs): self
    {
        $obj = clone $this;
        $obj->inputs = $inputs;

        return $obj;
    }
}
