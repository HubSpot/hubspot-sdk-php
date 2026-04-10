<?php

declare(strict_types=1);

namespace HubSpotSDK\Events\Definitions;

use HubSpotSDK\Core\Attributes\Required;
use HubSpotSDK\Core\Concerns\SdkModel;
use HubSpotSDK\Core\Concerns\SdkParams;
use HubSpotSDK\Core\Contracts\BaseModel;
use HubSpotSDK\Events\BehavioralEventHTTPCompletionRequest;

/**
 * Send multiple event occurrences at once.
 *
 * @see HubSpotSDK\Services\Events\DefinitionsService::sendBatch()
 *
 * @phpstan-import-type BehavioralEventHTTPCompletionRequestShape from \HubSpotSDK\Events\BehavioralEventHTTPCompletionRequest
 *
 * @phpstan-type DefinitionSendBatchParamsShape = array{
 *   inputs: list<BehavioralEventHTTPCompletionRequest|BehavioralEventHTTPCompletionRequestShape>,
 * }
 */
final class DefinitionSendBatchParams implements BaseModel
{
    /** @use SdkModel<DefinitionSendBatchParamsShape> */
    use SdkModel;
    use SdkParams;

    /** @var list<BehavioralEventHTTPCompletionRequest> $inputs */
    #[Required(list: BehavioralEventHTTPCompletionRequest::class)]
    public array $inputs;

    /**
     * `new DefinitionSendBatchParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * DefinitionSendBatchParams::with(inputs: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new DefinitionSendBatchParams)->withInputs(...)
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
