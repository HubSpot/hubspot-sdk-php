<?php

declare(strict_types=1);

namespace HubspotSDK\Automation\Actions;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type RequestContextVariants from \HubspotSDK\Automation\Actions\CallbackCompletionBatchRequest\RequestContext
 * @phpstan-import-type RequestContextShape from \HubspotSDK\Automation\Actions\CallbackCompletionBatchRequest\RequestContext
 *
 * @phpstan-type CallbackCompletionBatchRequestShape = array{
 *   callbackID: string,
 *   outputFields: array<string,string>,
 *   typedOutputs: mixed,
 *   failureReasonType?: string|null,
 *   requestContext?: RequestContextShape|null,
 * }
 */
final class CallbackCompletionBatchRequest implements BaseModel
{
    /** @use SdkModel<CallbackCompletionBatchRequestShape> */
    use SdkModel;

    /**
     * The unique identifier for the callback.
     */
    #[Required('callbackId')]
    public string $callbackID;

    /**
     * Holds the output fields for the callback completion.
     *
     * @var array<string,string> $outputFields
     */
    #[Required(map: 'string')]
    public array $outputFields;

    /**
     * Contains the typed outputs for the callback completion.
     */
    #[Required]
    public mixed $typedOutputs;

    /**
     * Specifies the type of failure reason for the callback completion.
     */
    #[Optional]
    public ?string $failureReasonType;

    /**
     * Defines the context of the request, which can be one of several predefined types.
     *
     * @var RequestContextVariants|null $requestContext
     */
    #[Optional]
    public WorkflowsRequestContext|AgentRequestContext|CopilotRequestContext|StandaloneRequestContext|TestRequestContext|null $requestContext;

    /**
     * `new CallbackCompletionBatchRequest()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * CallbackCompletionBatchRequest::with(
     *   callbackID: ..., outputFields: ..., typedOutputs: ...
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new CallbackCompletionBatchRequest)
     *   ->withCallbackID(...)
     *   ->withOutputFields(...)
     *   ->withTypedOutputs(...)
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
        string $callbackID,
        array $outputFields,
        mixed $typedOutputs,
        ?string $failureReasonType = null,
        WorkflowsRequestContext|array|AgentRequestContext|CopilotRequestContext|StandaloneRequestContext|TestRequestContext|null $requestContext = null,
    ): self {
        $self = new self;

        $self['callbackID'] = $callbackID;
        $self['outputFields'] = $outputFields;
        $self['typedOutputs'] = $typedOutputs;

        null !== $failureReasonType && $self['failureReasonType'] = $failureReasonType;
        null !== $requestContext && $self['requestContext'] = $requestContext;

        return $self;
    }

    /**
     * The unique identifier for the callback.
     */
    public function withCallbackID(string $callbackID): self
    {
        $self = clone $this;
        $self['callbackID'] = $callbackID;

        return $self;
    }

    /**
     * Holds the output fields for the callback completion.
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
     * Contains the typed outputs for the callback completion.
     */
    public function withTypedOutputs(mixed $typedOutputs): self
    {
        $self = clone $this;
        $self['typedOutputs'] = $typedOutputs;

        return $self;
    }

    /**
     * Specifies the type of failure reason for the callback completion.
     */
    public function withFailureReasonType(string $failureReasonType): self
    {
        $self = clone $this;
        $self['failureReasonType'] = $failureReasonType;

        return $self;
    }

    /**
     * Defines the context of the request, which can be one of several predefined types.
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
