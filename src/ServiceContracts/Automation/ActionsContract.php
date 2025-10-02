<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\Automation;

use HubspotSDK\Automation\Actions\ActionDeleteParams\FunctionType;
use HubspotSDK\Automation\Actions\AutomationActionsCallbackCompletionBatchRequest;
use HubspotSDK\Automation\Actions\AutomationActionsCollectionResponsePublicActionRevisionForwardPaging;
use HubspotSDK\Automation\Actions\AutomationActionsInputFieldDefinition;
use HubspotSDK\Automation\Actions\AutomationActionsOutputFieldDefinition;
use HubspotSDK\Automation\Actions\AutomationActionsPublicActionDefinition;
use HubspotSDK\Automation\Actions\AutomationActionsPublicActionFunction;
use HubspotSDK\Automation\Actions\AutomationActionsPublicActionFunctionIdentifier;
use HubspotSDK\Automation\Actions\AutomationActionsPublicActionLabels;
use HubspotSDK\Automation\Actions\AutomationActionsPublicConditionalSingleFieldDependency;
use HubspotSDK\Automation\Actions\AutomationActionsPublicExecutionTranslationRule;
use HubspotSDK\Automation\Actions\AutomationActionsPublicObjectRequestOptions;
use HubspotSDK\Automation\Actions\AutomationActionsPublicSingleFieldDependency;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Core\Implementation\HasRawResponse;
use HubspotSDK\RequestOptions;

use const HubspotSDK\Core\OMIT as omit;

interface ActionsContract
{
    /**
     * @api
     *
     * @param string $actionURL
     * @param list<AutomationActionsPublicActionFunction> $functions
     * @param list<AutomationActionsInputFieldDefinition> $inputFields
     * @param array<string, AutomationActionsPublicActionLabels> $labels
     * @param list<string> $objectTypes
     * @param bool $published
     * @param int $archivedAt
     * @param list<AutomationActionsPublicExecutionTranslationRule> $executionRules
     * @param list<AutomationActionsPublicSingleFieldDependency|AutomationActionsPublicConditionalSingleFieldDependency> $inputFieldDependencies
     * @param AutomationActionsPublicObjectRequestOptions $objectRequestOptions
     * @param list<AutomationActionsOutputFieldDefinition> $outputFields
     *
     * @return AutomationActionsPublicActionDefinition<HasRawResponse>
     *
     * @throws APIException
     */
    public function create(
        int $appID,
        $actionURL,
        $functions,
        $inputFields,
        $labels,
        $objectTypes,
        $published,
        $archivedAt = omit,
        $executionRules = omit,
        $inputFieldDependencies = omit,
        $objectRequestOptions = omit,
        $outputFields = omit,
        ?RequestOptions $requestOptions = null,
    ): AutomationActionsPublicActionDefinition;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @return AutomationActionsPublicActionDefinition<HasRawResponse>
     *
     * @throws APIException
     */
    public function createRaw(
        int $appID,
        array $params,
        ?RequestOptions $requestOptions = null
    ): AutomationActionsPublicActionDefinition;

    /**
     * @api
     *
     * @param int $appID
     * @param string $actionURL
     * @param list<AutomationActionsPublicExecutionTranslationRule> $executionRules
     * @param list<AutomationActionsPublicSingleFieldDependency|AutomationActionsPublicConditionalSingleFieldDependency> $inputFieldDependencies
     * @param list<AutomationActionsInputFieldDefinition> $inputFields
     * @param array<string, AutomationActionsPublicActionLabels> $labels
     * @param AutomationActionsPublicObjectRequestOptions $objectRequestOptions
     * @param list<string> $objectTypes
     * @param list<AutomationActionsOutputFieldDefinition> $outputFields
     * @param bool $published
     *
     * @return AutomationActionsPublicActionDefinition<HasRawResponse>
     *
     * @throws APIException
     */
    public function update(
        string $definitionID,
        $appID,
        $actionURL = omit,
        $executionRules = omit,
        $inputFieldDependencies = omit,
        $inputFields = omit,
        $labels = omit,
        $objectRequestOptions = omit,
        $objectTypes = omit,
        $outputFields = omit,
        $published = omit,
        ?RequestOptions $requestOptions = null,
    ): AutomationActionsPublicActionDefinition;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @return AutomationActionsPublicActionDefinition<HasRawResponse>
     *
     * @throws APIException
     */
    public function updateRaw(
        string $definitionID,
        array $params,
        ?RequestOptions $requestOptions = null,
    ): AutomationActionsPublicActionDefinition;

    /**
     * @api
     *
     * @param int $appID
     * @param string $after
     * @param int $limit
     *
     * @return AutomationActionsCollectionResponsePublicActionRevisionForwardPaging<
     *   HasRawResponse
     * >
     *
     * @throws APIException
     */
    public function list(
        string $definitionID,
        $appID,
        $after = omit,
        $limit = omit,
        ?RequestOptions $requestOptions = null,
    ): AutomationActionsCollectionResponsePublicActionRevisionForwardPaging;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @return AutomationActionsCollectionResponsePublicActionRevisionForwardPaging<
     *   HasRawResponse
     * >
     *
     * @throws APIException
     */
    public function listRaw(
        string $definitionID,
        array $params,
        ?RequestOptions $requestOptions = null,
    ): AutomationActionsCollectionResponsePublicActionRevisionForwardPaging;

    /**
     * @api
     *
     * @param int $appID
     * @param string $definitionID
     * @param FunctionType|value-of<FunctionType> $functionType
     *
     * @throws APIException
     */
    public function delete(
        string $functionID,
        $appID,
        $definitionID,
        $functionType,
        ?RequestOptions $requestOptions = null,
    ): mixed;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function deleteRaw(
        string $functionID,
        array $params,
        ?RequestOptions $requestOptions = null,
    ): mixed;

    /**
     * @api
     *
     * @param HubspotSDK\Automation\Actions\ActionArchiveByFunctionTypeParams\FunctionType|value-of<HubspotSDK\Automation\Actions\ActionArchiveByFunctionTypeParams\FunctionType> $functionType
     * @param int $appID
     * @param string $definitionID
     *
     * @throws APIException
     */
    public function archiveByFunctionType(
        HubspotSDK\Automation\Actions\ActionArchiveByFunctionTypeParams\FunctionType|string $functionType,
        $appID,
        $definitionID,
        ?RequestOptions $requestOptions = null,
    ): mixed;

    /**
     * @api
     *
     * @param HubspotSDK\Automation\Actions\ActionArchiveByFunctionTypeParams\FunctionType|value-of<HubspotSDK\Automation\Actions\ActionArchiveByFunctionTypeParams\FunctionType> $functionType
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function archiveByFunctionTypeRaw(
        HubspotSDK\Automation\Actions\ActionArchiveByFunctionTypeParams\FunctionType|string $functionType,
        array $params,
        ?RequestOptions $requestOptions = null,
    ): mixed;

    /**
     * @api
     *
     * @param array<string, string> $outputFields
     *
     * @throws APIException
     */
    public function complete(
        string $callbackID,
        $outputFields,
        ?RequestOptions $requestOptions = null,
    ): mixed;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function completeRaw(
        string $callbackID,
        array $params,
        ?RequestOptions $requestOptions = null,
    ): mixed;

    /**
     * @api
     *
     * @param list<AutomationActionsCallbackCompletionBatchRequest> $inputs
     *
     * @throws APIException
     */
    public function completeBatch(
        $inputs,
        ?RequestOptions $requestOptions = null
    ): mixed;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function completeBatchRaw(
        array $params,
        ?RequestOptions $requestOptions = null
    ): mixed;

    /**
     * @api
     *
     * @param int $appID
     * @param string $definitionID
     * @param HubspotSDK\Automation\Actions\ActionCreateOrReplaceParams\FunctionType|value-of<HubspotSDK\Automation\Actions\ActionCreateOrReplaceParams\FunctionType> $functionType
     * @param string $body
     *
     * @return AutomationActionsPublicActionFunctionIdentifier<HasRawResponse>
     *
     * @throws APIException
     */
    public function createOrReplace(
        string $functionID,
        $appID,
        $definitionID,
        $functionType,
        $body,
        ?RequestOptions $requestOptions = null,
    ): AutomationActionsPublicActionFunctionIdentifier;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @return AutomationActionsPublicActionFunctionIdentifier<HasRawResponse>
     *
     * @throws APIException
     */
    public function createOrReplaceRaw(
        string $functionID,
        array $params,
        ?RequestOptions $requestOptions = null,
    ): AutomationActionsPublicActionFunctionIdentifier;

    /**
     * @api
     *
     * @param HubspotSDK\Automation\Actions\ActionCreateOrReplaceByFunctionTypeParams\FunctionType|value-of<HubspotSDK\Automation\Actions\ActionCreateOrReplaceByFunctionTypeParams\FunctionType> $functionType
     * @param int $appID
     * @param string $definitionID
     * @param string $body
     *
     * @return AutomationActionsPublicActionFunctionIdentifier<HasRawResponse>
     *
     * @throws APIException
     */
    public function createOrReplaceByFunctionType(
        HubspotSDK\Automation\Actions\ActionCreateOrReplaceByFunctionTypeParams\FunctionType|string $functionType,
        $appID,
        $definitionID,
        $body,
        ?RequestOptions $requestOptions = null,
    ): AutomationActionsPublicActionFunctionIdentifier;

    /**
     * @api
     *
     * @param HubspotSDK\Automation\Actions\ActionCreateOrReplaceByFunctionTypeParams\FunctionType|value-of<HubspotSDK\Automation\Actions\ActionCreateOrReplaceByFunctionTypeParams\FunctionType> $functionType
     * @param array<string, mixed> $params
     *
     * @return AutomationActionsPublicActionFunctionIdentifier<HasRawResponse>
     *
     * @throws APIException
     */
    public function createOrReplaceByFunctionTypeRaw(
        HubspotSDK\Automation\Actions\ActionCreateOrReplaceByFunctionTypeParams\FunctionType|string $functionType,
        array $params,
        ?RequestOptions $requestOptions = null,
    ): AutomationActionsPublicActionFunctionIdentifier;

    /**
     * @api
     *
     * @param HubspotSDK\Automation\Actions\ActionGetByFunctionTypeParams\FunctionType|value-of<HubspotSDK\Automation\Actions\ActionGetByFunctionTypeParams\FunctionType> $functionType
     * @param int $appID
     * @param string $definitionID
     *
     * @return AutomationActionsPublicActionFunction<HasRawResponse>
     *
     * @throws APIException
     */
    public function getByFunctionType(
        HubspotSDK\Automation\Actions\ActionGetByFunctionTypeParams\FunctionType|string $functionType,
        $appID,
        $definitionID,
        ?RequestOptions $requestOptions = null,
    ): AutomationActionsPublicActionFunction;

    /**
     * @api
     *
     * @param HubspotSDK\Automation\Actions\ActionGetByFunctionTypeParams\FunctionType|value-of<HubspotSDK\Automation\Actions\ActionGetByFunctionTypeParams\FunctionType> $functionType
     * @param array<string, mixed> $params
     *
     * @return AutomationActionsPublicActionFunction<HasRawResponse>
     *
     * @throws APIException
     */
    public function getByFunctionTypeRaw(
        HubspotSDK\Automation\Actions\ActionGetByFunctionTypeParams\FunctionType|string $functionType,
        array $params,
        ?RequestOptions $requestOptions = null,
    ): AutomationActionsPublicActionFunction;

    /**
     * @api
     *
     * @param int $appID
     * @param string $definitionID
     * @param HubspotSDK\Automation\Actions\ActionReadParams\FunctionType|value-of<HubspotSDK\Automation\Actions\ActionReadParams\FunctionType> $functionType
     *
     * @return AutomationActionsPublicActionFunction<HasRawResponse>
     *
     * @throws APIException
     */
    public function read(
        string $functionID,
        $appID,
        $definitionID,
        $functionType,
        ?RequestOptions $requestOptions = null,
    ): AutomationActionsPublicActionFunction;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @return AutomationActionsPublicActionFunction<HasRawResponse>
     *
     * @throws APIException
     */
    public function readRaw(
        string $functionID,
        array $params,
        ?RequestOptions $requestOptions = null,
    ): AutomationActionsPublicActionFunction;
}
