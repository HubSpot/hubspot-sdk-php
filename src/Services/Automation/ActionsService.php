<?php

declare(strict_types=1);

namespace HubspotSDK\Services\Automation;

use HubspotSDK\Automation\Actions\ActionDeleteParams\FunctionType;
use HubspotSDK\Automation\Actions\AgentRequestContext;
use HubspotSDK\Automation\Actions\CallbackCompletionBatchRequest;
use HubspotSDK\Automation\Actions\CopilotRequestContext;
use HubspotSDK\Automation\Actions\PublicActionDefinition;
use HubspotSDK\Automation\Actions\PublicActionDefinitionRequiresObjectResponse;
use HubspotSDK\Automation\Actions\PublicActionFunction;
use HubspotSDK\Automation\Actions\PublicActionFunctionIdentifier;
use HubspotSDK\Automation\Actions\PublicActionLabels;
use HubspotSDK\Automation\Actions\PublicActionRevision;
use HubspotSDK\Automation\Actions\PublicExecutionTranslationRule;
use HubspotSDK\Automation\Actions\PublicInputFieldDefinition;
use HubspotSDK\Automation\Actions\PublicObjectRequestOptions;
use HubspotSDK\Automation\Actions\StandaloneRequestContext;
use HubspotSDK\Automation\Actions\TestRequestContext;
use HubspotSDK\Automation\Actions\WorkflowsRequestContext;
use HubspotSDK\Client;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Core\Util;
use HubspotSDK\Page;
use HubspotSDK\RequestOptions;
use HubspotSDK\ServiceContracts\Automation\ActionsContract;

/**
 * @phpstan-import-type PublicActionFunctionShape from \HubspotSDK\Automation\Actions\PublicActionFunction
 * @phpstan-import-type InputFieldDependencyShape from \HubspotSDK\Automation\Actions\ActionCreateParams\InputFieldDependency
 * @phpstan-import-type InputFieldDependencyShape from \HubspotSDK\Automation\Actions\ActionUpdateParams\InputFieldDependency as InputFieldDependencyShape1
 * @phpstan-import-type RequestContextShape from \HubspotSDK\Automation\Actions\ActionCompleteParams\RequestContext
 * @phpstan-import-type CallbackCompletionBatchRequestShape from \HubspotSDK\Automation\Actions\CallbackCompletionBatchRequest
 * @phpstan-import-type PublicInputFieldDefinitionShape from \HubspotSDK\Automation\Actions\PublicInputFieldDefinition
 * @phpstan-import-type PublicActionLabelsShape from \HubspotSDK\Automation\Actions\PublicActionLabels
 * @phpstan-import-type PublicExecutionTranslationRuleShape from \HubspotSDK\Automation\Actions\PublicExecutionTranslationRule
 * @phpstan-import-type PublicObjectRequestOptionsShape from \HubspotSDK\Automation\Actions\PublicObjectRequestOptions
 * @phpstan-import-type RequestOpts from \HubspotSDK\RequestOptions
 */
final class ActionsService implements ActionsContract
{
    /**
     * @api
     */
    public ActionsRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new ActionsRawService($client);
    }

    /**
     * @api
     *
     * @param list<PublicActionFunction|PublicActionFunctionShape> $functions
     * @param list<PublicInputFieldDefinition|PublicInputFieldDefinitionShape> $inputFields
     * @param array<string,PublicActionLabels|PublicActionLabelsShape> $labels
     * @param list<string> $objectTypes
     * @param list<PublicExecutionTranslationRule|PublicExecutionTranslationRuleShape> $executionRules
     * @param list<InputFieldDependencyShape> $inputFieldDependencies
     * @param PublicObjectRequestOptions|PublicObjectRequestOptionsShape $objectRequestOptions
     * @param list<mixed> $outputFields
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function create(
        int $appID,
        string $actionURL,
        array $functions,
        array $inputFields,
        array $labels,
        array $objectTypes,
        bool $published,
        ?int $archivedAt = null,
        ?array $executionRules = null,
        ?array $inputFieldDependencies = null,
        PublicObjectRequestOptions|array|null $objectRequestOptions = null,
        ?array $outputFields = null,
        RequestOptions|array|null $requestOptions = null,
    ): PublicActionDefinition {
        $params = Util::removeNulls(
            [
                'actionURL' => $actionURL,
                'functions' => $functions,
                'inputFields' => $inputFields,
                'labels' => $labels,
                'objectTypes' => $objectTypes,
                'published' => $published,
                'archivedAt' => $archivedAt,
                'executionRules' => $executionRules,
                'inputFieldDependencies' => $inputFieldDependencies,
                'objectRequestOptions' => $objectRequestOptions,
                'outputFields' => $outputFields,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->create($appID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * @param string $definitionID Path param
     * @param int $appID Path param
     * @param string $actionURL Body param
     * @param list<PublicExecutionTranslationRule|PublicExecutionTranslationRuleShape> $executionRules Body param
     * @param list<InputFieldDependencyShape1> $inputFieldDependencies Body param
     * @param list<PublicInputFieldDefinition|PublicInputFieldDefinitionShape> $inputFields Body param
     * @param array<string,PublicActionLabels|PublicActionLabelsShape> $labels Body param
     * @param PublicObjectRequestOptions|PublicObjectRequestOptionsShape $objectRequestOptions Body param
     * @param list<string> $objectTypes Body param
     * @param list<mixed> $outputFields Body param
     * @param bool $published Body param
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function update(
        string $definitionID,
        int $appID,
        ?string $actionURL = null,
        ?array $executionRules = null,
        ?array $inputFieldDependencies = null,
        ?array $inputFields = null,
        ?array $labels = null,
        PublicObjectRequestOptions|array|null $objectRequestOptions = null,
        ?array $objectTypes = null,
        ?array $outputFields = null,
        ?bool $published = null,
        RequestOptions|array|null $requestOptions = null,
    ): PublicActionDefinition {
        $params = Util::removeNulls(
            [
                'appID' => $appID,
                'actionURL' => $actionURL,
                'executionRules' => $executionRules,
                'inputFieldDependencies' => $inputFieldDependencies,
                'inputFields' => $inputFields,
                'labels' => $labels,
                'objectRequestOptions' => $objectRequestOptions,
                'objectTypes' => $objectTypes,
                'outputFields' => $outputFields,
                'published' => $published,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->update($definitionID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * @param string $definitionID Path param
     * @param int $appID Path param
     * @param string $after Query param: The paging cursor token of the last successfully read resource will be returned as the `paging.next.after` JSON property of a paged response containing more results.
     * @param int $limit query param: The maximum number of results to display per page
     * @param RequestOpts|null $requestOptions
     *
     * @return Page<PublicActionRevision>
     *
     * @throws APIException
     */
    public function list(
        string $definitionID,
        int $appID,
        ?string $after = null,
        ?int $limit = null,
        RequestOptions|array|null $requestOptions = null,
    ): Page {
        $params = Util::removeNulls(
            ['appID' => $appID, 'after' => $after, 'limit' => $limit]
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->list($definitionID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * @param FunctionType|value-of<FunctionType> $functionType
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function delete(
        string $functionID,
        int $appID,
        string $definitionID,
        FunctionType|string $functionType,
        RequestOptions|array|null $requestOptions = null,
    ): mixed {
        $params = Util::removeNulls(
            [
                'appID' => $appID,
                'definitionID' => $definitionID,
                'functionType' => $functionType,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->delete($functionID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * @param array<string,string> $outputFields
     * @param RequestContextShape $requestContext
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

    /**
     * @api
     *
     * @param string $functionID Path param
     * @param int $appID Path param
     * @param string $definitionID Path param
     * @param \HubspotSDK\Automation\Actions\ActionCreateOrReplaceParams\FunctionType|value-of<\HubspotSDK\Automation\Actions\ActionCreateOrReplaceParams\FunctionType> $functionType Path param
     * @param string $body Body param
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function createOrReplace(
        string $functionID,
        int $appID,
        string $definitionID,
        \HubspotSDK\Automation\Actions\ActionCreateOrReplaceParams\FunctionType|string $functionType,
        string $body,
        RequestOptions|array|null $requestOptions = null,
    ): PublicActionFunctionIdentifier {
        $params = Util::removeNulls(
            [
                'appID' => $appID,
                'definitionID' => $definitionID,
                'functionType' => $functionType,
                'body' => $body,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->createOrReplace($functionID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * @param \HubspotSDK\Automation\Actions\ActionCreateOrReplaceByFunctionTypeParams\FunctionType|value-of<\HubspotSDK\Automation\Actions\ActionCreateOrReplaceByFunctionTypeParams\FunctionType> $functionType Path param
     * @param int $appID Path param
     * @param string $definitionID Path param
     * @param string $body Body param
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function createOrReplaceByFunctionType(
        \HubspotSDK\Automation\Actions\ActionCreateOrReplaceByFunctionTypeParams\FunctionType|string $functionType,
        int $appID,
        string $definitionID,
        string $body,
        RequestOptions|array|null $requestOptions = null,
    ): PublicActionFunctionIdentifier {
        $params = Util::removeNulls(
            ['appID' => $appID, 'definitionID' => $definitionID, 'body' => $body]
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->createOrReplaceByFunctionType($functionType, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * @param string $definitionID Path param
     * @param int $appID Path param
     * @param bool $requiresObject Body param
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function createRequiresObject(
        string $definitionID,
        int $appID,
        bool $requiresObject,
        RequestOptions|array|null $requestOptions = null,
    ): mixed {
        $params = Util::removeNulls(
            ['appID' => $appID, 'requiresObject' => $requiresObject]
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->createRequiresObject($definitionID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * @param \HubspotSDK\Automation\Actions\ActionDeleteByFunctionTypeParams\FunctionType|value-of<\HubspotSDK\Automation\Actions\ActionDeleteByFunctionTypeParams\FunctionType> $functionType
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function deleteByFunctionType(
        \HubspotSDK\Automation\Actions\ActionDeleteByFunctionTypeParams\FunctionType|string $functionType,
        int $appID,
        string $definitionID,
        RequestOptions|array|null $requestOptions = null,
    ): mixed {
        $params = Util::removeNulls(
            ['appID' => $appID, 'definitionID' => $definitionID]
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->deleteByFunctionType($functionType, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function get(
        string $revisionID,
        int $appID,
        string $definitionID,
        RequestOptions|array|null $requestOptions = null,
    ): PublicActionRevision {
        $params = Util::removeNulls(
            ['appID' => $appID, 'definitionID' => $definitionID]
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->get($revisionID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * @param \HubspotSDK\Automation\Actions\ActionGetByFunctionTypeParams\FunctionType|value-of<\HubspotSDK\Automation\Actions\ActionGetByFunctionTypeParams\FunctionType> $functionType
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function getByFunctionType(
        \HubspotSDK\Automation\Actions\ActionGetByFunctionTypeParams\FunctionType|string $functionType,
        int $appID,
        string $definitionID,
        RequestOptions|array|null $requestOptions = null,
    ): PublicActionFunction {
        $params = Util::removeNulls(
            ['appID' => $appID, 'definitionID' => $definitionID]
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->getByFunctionType($functionType, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function getRequiresObject(
        string $definitionID,
        int $appID,
        RequestOptions|array|null $requestOptions = null,
    ): PublicActionDefinitionRequiresObjectResponse {
        $params = Util::removeNulls(['appID' => $appID]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->getRequiresObject($definitionID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
