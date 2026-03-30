<?php

declare(strict_types=1);

namespace HubspotSDK\Services\Automation\Actions;

use HubspotSDK\Automation\Actions\AgentRequestContext;
use HubspotSDK\Automation\Actions\CallbackCompletionBatchRequest;
use HubspotSDK\Automation\Actions\CopilotRequestContext;
use HubspotSDK\Automation\Actions\StandaloneRequestContext;
use HubspotSDK\Automation\Actions\TestRequestContext;
use HubspotSDK\Automation\Actions\WorkflowsRequestContext;
use HubspotSDK\Client;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Core\Util;
use HubspotSDK\RequestOptions;
use HubspotSDK\ServiceContracts\Automation\Actions\CallbacksContract;

/**
 * @phpstan-import-type RequestContextShape from \HubspotSDK\Automation\Actions\Callbacks\CallbackCompleteParams\RequestContext
 * @phpstan-import-type CallbackCompletionBatchRequestShape from \HubspotSDK\Automation\Actions\CallbackCompletionBatchRequest
 * @phpstan-import-type RequestOpts from \HubspotSDK\RequestOptions
 */
final class CallbacksService implements CallbacksContract
{
    /**
     * @api
     */
    public CallbacksRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new CallbacksRawService($client);
    }

    /**
     * @api
     *
     * Complete a specific blocked action execution by ID.
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
    ): mixed {
        $params = Util::removeNulls(
            [
                'outputFields' => $outputFields,
                'typedOutputs' => $typedOutputs,
                'failureReasonType' => $failureReasonType,
                'requestContext' => $requestContext,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->complete($callbackID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Complete a batch of blocked action executions.
     *
     * @param list<CallbackCompletionBatchRequest|CallbackCompletionBatchRequestShape> $inputs
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function completeBatch(
        array $inputs,
        RequestOptions|array|null $requestOptions = null
    ): mixed {
        $params = Util::removeNulls(['inputs' => $inputs]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->completeBatch(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
