<?php

declare(strict_types=1);

namespace HubspotSDK\Events\Send;

use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type BehavioralEventHTTPCompletionRequestShape from \HubspotSDK\Events\Send\BehavioralEventHTTPCompletionRequest
 *
 * @phpstan-type BatchedBehavioralEventHTTPCompletionRequestShape = array{
 *   inputs: list<BehavioralEventHTTPCompletionRequestShape>
 * }
 */
final class BatchedBehavioralEventHTTPCompletionRequest implements BaseModel
{
    /** @use SdkModel<BatchedBehavioralEventHTTPCompletionRequestShape> */
    use SdkModel;

    /** @var list<BehavioralEventHTTPCompletionRequest> $inputs */
    #[Required(list: BehavioralEventHTTPCompletionRequest::class)]
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
     * @param list<BehavioralEventHTTPCompletionRequestShape> $inputs
     */
    public static function with(array $inputs): self
    {
        $self = new self;

        $self['inputs'] = $inputs;

        return $self;
    }

    /**
     * @param list<BehavioralEventHTTPCompletionRequestShape> $inputs
     */
    public function withInputs(array $inputs): self
    {
        $self = clone $this;
        $self['inputs'] = $inputs;

        return $self;
    }
}
