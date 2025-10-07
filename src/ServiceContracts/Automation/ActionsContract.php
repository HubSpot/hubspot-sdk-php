<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\Automation;

use HubspotSDK\Automation\Actions\ActionDeleteParams\FunctionType;
use HubspotSDK\Automation\Actions\CallbackCompletionBatchRequest;
use HubspotSDK\Automation\Actions\InputFieldDefinition;
use HubspotSDK\Automation\Actions\OutputFieldDefinition;
use HubspotSDK\Automation\Actions\PublicActionDefinition;
use HubspotSDK\Automation\Actions\PublicActionFunction;
use HubspotSDK\Automation\Actions\PublicActionFunctionIdentifier;
use HubspotSDK\Automation\Actions\PublicActionLabels;
use HubspotSDK\Automation\Actions\PublicActionRevision;
use HubspotSDK\Automation\Actions\PublicConditionalSingleFieldDependency;
use HubspotSDK\Automation\Actions\PublicExecutionTranslationRule;
use HubspotSDK\Automation\Actions\PublicObjectRequestOptions;
use HubspotSDK\Automation\Actions\PublicSingleFieldDependency;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\CursorURLPage;
use HubspotSDK\RequestOptions;

use const HubspotSDK\Core\OMIT as omit;

interface ActionsContract
{
    /**
     * @api
     *
     * @param string $actionURL
     * @param list<PublicActionFunction> $functions
     * @param list<InputFieldDefinition> $inputFields
     * @param array<string, PublicActionLabels> $labels
     * @param list<string> $objectTypes
     * @param bool $published
     * @param int $archivedAt
     * @param list<PublicExecutionTranslationRule> $executionRules
     * @param list<PublicSingleFieldDependency|PublicConditionalSingleFieldDependency> $inputFieldDependencies
     * @param PublicObjectRequestOptions $objectRequestOptions
     * @param list<OutputFieldDefinition> $outputFields
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
    ): PublicActionDefinition;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function createRaw(
        int $appID,
        array $params,
        ?RequestOptions $requestOptions = null
    ): PublicActionDefinition;

    /**
     * @api
     *
     * @param int $appID
     * @param string $actionURL
     * @param list<PublicExecutionTranslationRule> $executionRules
     * @param list<PublicSingleFieldDependency|PublicConditionalSingleFieldDependency> $inputFieldDependencies
     * @param list<InputFieldDefinition> $inputFields
     * @param array<string, PublicActionLabels> $labels
     * @param PublicObjectRequestOptions $objectRequestOptions
     * @param list<string> $objectTypes
     * @param list<OutputFieldDefinition> $outputFields
     * @param bool $published
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
    ): PublicActionDefinition;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function updateRaw(
        string $definitionID,
        array $params,
        ?RequestOptions $requestOptions = null,
    ): PublicActionDefinition;

    /**
     * @api
     *
     * @param int $appID
     * @param string $after
     * @param int $limit
     *
     * @return CursorURLPage<PublicActionRevision>
     *
     * @throws APIException
     */
    public function list(
        string $definitionID,
        $appID,
        $after = omit,
        $limit = omit,
        ?RequestOptions $requestOptions = null,
    ): CursorURLPage;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @return CursorURLPage<PublicActionRevision>
     *
     * @throws APIException
     */
    public function listRaw(
        string $definitionID,
        array $params,
        ?RequestOptions $requestOptions = null,
    ): CursorURLPage;

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
     * @param \HubspotSDK\Automation\Actions\ActionArchiveByFunctionTypeParams\FunctionType|value-of<\HubspotSDK\Automation\Actions\ActionArchiveByFunctionTypeParams\FunctionType> $functionType
     * @param int $appID
     * @param string $definitionID
     *
     * @throws APIException
     */
    public function archiveByFunctionType(
        \HubspotSDK\Automation\Actions\ActionArchiveByFunctionTypeParams\FunctionType|string $functionType,
        $appID,
        $definitionID,
        ?RequestOptions $requestOptions = null,
    ): mixed;

    /**
     * @api
     *
     * @param \HubspotSDK\Automation\Actions\ActionArchiveByFunctionTypeParams\FunctionType|value-of<\HubspotSDK\Automation\Actions\ActionArchiveByFunctionTypeParams\FunctionType> $functionType
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function archiveByFunctionTypeRaw(
        \HubspotSDK\Automation\Actions\ActionArchiveByFunctionTypeParams\FunctionType|string $functionType,
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
     * @param list<CallbackCompletionBatchRequest> $inputs
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
     * @param \HubspotSDK\Automation\Actions\ActionCreateOrReplaceParams\FunctionType|value-of<\HubspotSDK\Automation\Actions\ActionCreateOrReplaceParams\FunctionType> $functionType
     * @param string $body
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
    ): PublicActionFunctionIdentifier;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function createOrReplaceRaw(
        string $functionID,
        array $params,
        ?RequestOptions $requestOptions = null,
    ): PublicActionFunctionIdentifier;

    /**
     * @api
     *
     * @param \HubspotSDK\Automation\Actions\ActionCreateOrReplaceByFunctionTypeParams\FunctionType|value-of<\HubspotSDK\Automation\Actions\ActionCreateOrReplaceByFunctionTypeParams\FunctionType> $functionType
     * @param int $appID
     * @param string $definitionID
     * @param string $body
     *
     * @throws APIException
     */
    public function createOrReplaceByFunctionType(
        \HubspotSDK\Automation\Actions\ActionCreateOrReplaceByFunctionTypeParams\FunctionType|string $functionType,
        $appID,
        $definitionID,
        $body,
        ?RequestOptions $requestOptions = null,
    ): PublicActionFunctionIdentifier;

    /**
     * @api
     *
     * @param \HubspotSDK\Automation\Actions\ActionCreateOrReplaceByFunctionTypeParams\FunctionType|value-of<\HubspotSDK\Automation\Actions\ActionCreateOrReplaceByFunctionTypeParams\FunctionType> $functionType
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function createOrReplaceByFunctionTypeRaw(
        \HubspotSDK\Automation\Actions\ActionCreateOrReplaceByFunctionTypeParams\FunctionType|string $functionType,
        array $params,
        ?RequestOptions $requestOptions = null,
    ): PublicActionFunctionIdentifier;

    /**
     * @api
     *
     * @param \HubspotSDK\Automation\Actions\ActionGetByFunctionTypeParams\FunctionType|value-of<\HubspotSDK\Automation\Actions\ActionGetByFunctionTypeParams\FunctionType> $functionType
     * @param int $appID
     * @param string $definitionID
     *
     * @throws APIException
     */
    public function getByFunctionType(
        \HubspotSDK\Automation\Actions\ActionGetByFunctionTypeParams\FunctionType|string $functionType,
        $appID,
        $definitionID,
        ?RequestOptions $requestOptions = null,
    ): PublicActionFunction;

    /**
     * @api
     *
     * @param \HubspotSDK\Automation\Actions\ActionGetByFunctionTypeParams\FunctionType|value-of<\HubspotSDK\Automation\Actions\ActionGetByFunctionTypeParams\FunctionType> $functionType
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function getByFunctionTypeRaw(
        \HubspotSDK\Automation\Actions\ActionGetByFunctionTypeParams\FunctionType|string $functionType,
        array $params,
        ?RequestOptions $requestOptions = null,
    ): PublicActionFunction;

    /**
     * @api
     *
     * @param int $appID
     * @param string $definitionID
     * @param \HubspotSDK\Automation\Actions\ActionReadParams\FunctionType|value-of<\HubspotSDK\Automation\Actions\ActionReadParams\FunctionType> $functionType
     *
     * @throws APIException
     */
    public function read(
        string $functionID,
        $appID,
        $definitionID,
        $functionType,
        ?RequestOptions $requestOptions = null,
    ): PublicActionFunction;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function readRaw(
        string $functionID,
        array $params,
        ?RequestOptions $requestOptions = null,
    ): PublicActionFunction;
}
