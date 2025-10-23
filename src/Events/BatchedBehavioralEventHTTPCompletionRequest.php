<?php

declare(strict_types=1);

namespace HubspotSDK\Events;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type batched_behavioral_event_http_completion_request = array{
 *   inputs: list<BehavioralEventHTTPCompletionRequest>
 * }
 */
final class BatchedBehavioralEventHTTPCompletionRequest implements BaseModel
{
    /** @use SdkModel<batched_behavioral_event_http_completion_request> */
    use SdkModel;

    /** @var list<BehavioralEventHTTPCompletionRequest> $inputs */
    #[Api(list: BehavioralEventHTTPCompletionRequest::class)]
    public array $inputs;

    /**
     * `new BatchedBehavioralEventHTTPCompletionRequest()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * BatchedBehavioralEventHTTPCompletionRequest::with(inputs: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new BatchedBehavioralEventHTTPCompletionRequest)->withInputs(...)
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
