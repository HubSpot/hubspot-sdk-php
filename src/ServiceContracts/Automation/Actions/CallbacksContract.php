<?php

declare(strict_types=1);

namespace HubSpotSDK\ServiceContracts\Automation\Actions;

use HubSpotSDK\Automation\Actions\AgentRequestContext;
use HubSpotSDK\Automation\Actions\CallbackCompletionBatchRequest;
use HubSpotSDK\Automation\Actions\CopilotRequestContext;
use HubSpotSDK\Automation\Actions\StandaloneRequestContext;
use HubSpotSDK\Automation\Actions\TestRequestContext;
use HubSpotSDK\Automation\Actions\WorkflowsRequestContext;
use HubSpotSDK\Core\Exceptions\APIException;
use HubSpotSDK\RequestOptions;

/**
 * @phpstan-import-type RequestContextShape from \HubSpotSDK\Automation\Actions\Callbacks\CallbackCompleteParams\RequestContext
 * @phpstan-import-type CallbackCompletionBatchRequestShape from \HubSpotSDK\Automation\Actions\CallbackCompletionBatchRequest
 * @phpstan-import-type RequestOpts from \HubSpotSDK\RequestOptions
 */
interface CallbacksContract
{
    /**
     * @api
     *
     * @param array<string,string> $outputFields contains the output fields associated with the callback, with each field represented as a key-value pair
     * @param mixed $typedOutputs holds the typed outputs related to the callback, structured as an object
     * @param string $failureReasonType indicates the reason for the failure of a callback completion
     * @param RequestContextShape $requestContext specifies the context in which the request is made, which can be one of several predefined contexts
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function complete(
        string $callbackID,
        array $outputFields,
        mixed $typedOutputs,
        ?string $failureReasonType = null,
        WorkflowsRequestContext|array|AgentRequestContext|CopilotRequestContext|StandaloneRequestContext|TestRequestContext|null $requestContext = null,
        RequestOptions|array|null $requestOptions = null,
    ): mixed;

    /**
     * @api
     *
     * @param list<CallbackCompletionBatchRequest|CallbackCompletionBatchRequestShape> $inputs
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function completeBatch(
        array $inputs,
        RequestOptions|array|null $requestOptions = null
    ): mixed;
}
