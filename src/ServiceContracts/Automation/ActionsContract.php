<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\Automation;

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
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Page;
use HubspotSDK\RequestOptions;

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
interface ActionsContract
{
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
    ): PublicActionDefinition;

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
    ): PublicActionDefinition;

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
    ): Page;

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
    ): mixed;

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
    ): PublicActionFunctionIdentifier;

    /**
     * @api
     *
     * @param \HubspotSDK\Automation\Actions\ActionCreateOrReplaceByFunctionTypeParams\FunctionType|string $functionType Path param
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
    ): PublicActionFunctionIdentifier;

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
    ): mixed;

    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function deleteByFunctionType(
        \HubspotSDK\Automation\Actions\ActionDeleteByFunctionTypeParams\FunctionType|string $functionType,
        int $appID,
        string $definitionID,
        RequestOptions|array|null $requestOptions = null,
    ): mixed;

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
    ): PublicActionRevision;

    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function getByFunctionType(
        \HubspotSDK\Automation\Actions\ActionGetByFunctionTypeParams\FunctionType|string $functionType,
        int $appID,
        string $definitionID,
        RequestOptions|array|null $requestOptions = null,
    ): PublicActionFunction;

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
    ): PublicActionDefinitionRequiresObjectResponse;
}
