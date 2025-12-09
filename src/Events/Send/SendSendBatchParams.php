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
 * @phpstan-type SendSendBatchParamsShape = array{
 *   inputs: list<BehavioralEventHTTPCompletionRequest|array{
 *     eventName: string,
 *     properties: array<string,string>,
 *     email?: string|null,
 *     objectId?: string|null,
 *     occurredAt?: \DateTimeInterface|null,
 *     utk?: string|null,
 *     uuid?: string|null,
 *   }>,
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
     * @param list<BehavioralEventHTTPCompletionRequest|array{
     *   eventName: string,
     *   properties: array<string,string>,
     *   email?: string|null,
     *   objectId?: string|null,
     *   occurredAt?: \DateTimeInterface|null,
     *   utk?: string|null,
     *   uuid?: string|null,
     * }> $inputs
     */
    public static function with(array $inputs): self
    {
        $obj = new self;

        $obj['inputs'] = $inputs;

        return $obj;
    }

    /**
     * @param list<BehavioralEventHTTPCompletionRequest|array{
     *   eventName: string,
     *   properties: array<string,string>,
     *   email?: string|null,
     *   objectId?: string|null,
     *   occurredAt?: \DateTimeInterface|null,
     *   utk?: string|null,
     *   uuid?: string|null,
     * }> $inputs
     */
    public function withInputs(array $inputs): self
    {
        $obj = clone $this;
        $obj['inputs'] = $inputs;

        return $obj;
    }
}
