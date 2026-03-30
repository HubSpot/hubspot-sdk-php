<?php

declare(strict_types=1);

namespace HubspotSDK\Automation\Actions;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type RequestContextVariants from \HubspotSDK\Automation\Actions\CallbackCompletionRequest\RequestContext
 * @phpstan-import-type RequestContextShape from \HubspotSDK\Automation\Actions\CallbackCompletionRequest\RequestContext
 *
 * @phpstan-type CallbackCompletionRequestShape = array{
 *   outputFields: array<string,string>,
 *   typedOutputs: mixed,
 *   failureReasonType?: string|null,
 *   requestContext?: RequestContextShape|null,
 * }
 */
final class CallbackCompletionRequest implements BaseModel
{
    /** @use SdkModel<CallbackCompletionRequestShape> */
    use SdkModel;

    /**
     * Contains the output fields associated with the callback, with each field represented as a key-value pair.
     *
     * @var array<string,string> $outputFields
     */
    #[Required(map: 'string')]
    public array $outputFields;

    /**
     * Holds the typed outputs related to the callback, structured as an object.
     */
    #[Required]
    public mixed $typedOutputs;

    /**
     * Indicates the reason for the failure of a callback completion.
     */
    #[Optional]
    public ?string $failureReasonType;

    /**
     * Specifies the context in which the request is made, which can be one of several predefined contexts.
     *
     * @var RequestContextVariants|null $requestContext
     */
    #[Optional]
    public WorkflowsRequestContext|AgentRequestContext|CopilotRequestContext|StandaloneRequestContext|TestRequestContext|null $requestContext;

    /**
     * `new CallbackCompletionRequest()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * CallbackCompletionRequest::with(outputFields: ..., typedOutputs: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new CallbackCompletionRequest)->withOutputFields(...)->withTypedOutputs(...)
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
     * @param array<string,string> $outputFields
     * @param RequestContextShape|null $requestContext
     */
    public static function with(
        array $outputFields,
        mixed $typedOutputs,
        ?string $failureReasonType = null,
        WorkflowsRequestContext|array|AgentRequestContext|CopilotRequestContext|StandaloneRequestContext|TestRequestContext|null $requestContext = null,
    ): self {
        $self = new self;

        $self['outputFields'] = $outputFields;
        $self['typedOutputs'] = $typedOutputs;

        null !== $failureReasonType && $self['failureReasonType'] = $failureReasonType;
        null !== $requestContext && $self['requestContext'] = $requestContext;

        return $self;
    }

    /**
     * Contains the output fields associated with the callback, with each field represented as a key-value pair.
     *
     * @param array<string,string> $outputFields
     */
    public function withOutputFields(array $outputFields): self
    {
        $self = clone $this;
        $self['outputFields'] = $outputFields;

        return $self;
    }

    /**
     * Holds the typed outputs related to the callback, structured as an object.
     */
    public function withTypedOutputs(mixed $typedOutputs): self
    {
        $self = clone $this;
        $self['typedOutputs'] = $typedOutputs;

        return $self;
    }

    /**
     * Indicates the reason for the failure of a callback completion.
     */
    public function withFailureReasonType(string $failureReasonType): self
    {
        $self = clone $this;
        $self['failureReasonType'] = $failureReasonType;

        return $self;
    }

    /**
     * Specifies the context in which the request is made, which can be one of several predefined contexts.
     *
     * @param RequestContextShape $requestContext
     */
    public function withRequestContext(
        WorkflowsRequestContext|array|AgentRequestContext|CopilotRequestContext|StandaloneRequestContext|TestRequestContext $requestContext,
    ): self {
        $self = clone $this;
        $self['requestContext'] = $requestContext;

        return $self;
    }
}
