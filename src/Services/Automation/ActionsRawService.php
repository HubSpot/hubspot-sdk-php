<?php

declare(strict_types=1);

namespace HubspotSDK\Services\Automation;

use HubspotSDK\Automation\Actions\ActionCompleteBatchParams;
use HubspotSDK\Automation\Actions\ActionCompleteParams;
use HubspotSDK\Automation\Actions\ActionCreateOrReplaceByFunctionTypeParams;
use HubspotSDK\Automation\Actions\ActionCreateOrReplaceParams;
use HubspotSDK\Automation\Actions\ActionCreateParams;
use HubspotSDK\Automation\Actions\ActionCreateRequiresObjectParams;
use HubspotSDK\Automation\Actions\ActionDeleteByFunctionTypeParams;
use HubspotSDK\Automation\Actions\ActionDeleteParams;
use HubspotSDK\Automation\Actions\ActionDeleteParams\FunctionType;
use HubspotSDK\Automation\Actions\ActionGetByFunctionTypeParams;
use HubspotSDK\Automation\Actions\ActionGetParams;
use HubspotSDK\Automation\Actions\ActionGetRequiresObjectParams;
use HubspotSDK\Automation\Actions\ActionListParams;
use HubspotSDK\Automation\Actions\ActionUpdateParams;
use HubspotSDK\Automation\Actions\CallbackCompletionBatchRequest;
use HubspotSDK\Automation\Actions\PublicActionDefinition;
use HubspotSDK\Automation\Actions\PublicActionDefinitionRequiresObjectResponse;
use HubspotSDK\Automation\Actions\PublicActionFunction;
use HubspotSDK\Automation\Actions\PublicActionFunctionIdentifier;
use HubspotSDK\Automation\Actions\PublicActionLabels;
use HubspotSDK\Automation\Actions\PublicActionRevision;
use HubspotSDK\Automation\Actions\PublicExecutionTranslationRule;
use HubspotSDK\Automation\Actions\PublicInputFieldDefinition;
use HubspotSDK\Automation\Actions\PublicObjectRequestOptions;
use HubspotSDK\Client;
use HubspotSDK\Core\Contracts\BaseResponse;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Page;
use HubspotSDK\RequestOptions;
use HubspotSDK\ServiceContracts\Automation\ActionsRawContract;

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
final class ActionsRawService implements ActionsRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Create a new custom workflow action.
     *
     * @param array{
     *   actionURL: string,
     *   functions: list<PublicActionFunction|PublicActionFunctionShape>,
     *   inputFields: list<PublicInputFieldDefinition|PublicInputFieldDefinitionShape>,
     *   labels: array<string,PublicActionLabels|PublicActionLabelsShape>,
     *   objectTypes: list<string>,
     *   published: bool,
     *   archivedAt?: int,
     *   executionRules?: list<PublicExecutionTranslationRule|PublicExecutionTranslationRuleShape>,
     *   inputFieldDependencies?: list<InputFieldDependencyShape>,
     *   objectRequestOptions?: PublicObjectRequestOptions|PublicObjectRequestOptionsShape,
     *   outputFields?: list<mixed>,
     * }|ActionCreateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<PublicActionDefinition>
     *
     * @throws APIException
     */
    public function create(
        int $appID,
        array|ActionCreateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = ActionCreateParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: ['automation/actions/2026-03/%1$s', $appID],
            body: (object) $parsed,
            options: $options,
            convert: PublicActionDefinition::class,
        );
    }

    /**
     * @api
     *
     * Update an existing action definition by ID.
     *
     * @param string $definitionID Path param
     * @param array{
     *   appID: int,
     *   actionURL?: string,
     *   executionRules?: list<PublicExecutionTranslationRule|PublicExecutionTranslationRuleShape>,
     *   inputFieldDependencies?: list<InputFieldDependencyShape1>,
     *   inputFields?: list<PublicInputFieldDefinition|PublicInputFieldDefinitionShape>,
     *   labels?: array<string,PublicActionLabels|PublicActionLabelsShape>,
     *   objectRequestOptions?: PublicObjectRequestOptions|PublicObjectRequestOptionsShape,
     *   objectTypes?: list<string>,
     *   outputFields?: list<mixed>,
     *   published?: bool,
     * }|ActionUpdateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<PublicActionDefinition>
     *
     * @throws APIException
     */
    public function update(
        string $definitionID,
        array|ActionUpdateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = ActionUpdateParams::parseRequest(
            $params,
            $requestOptions,
        );
        $appID = $parsed['appID'];
        unset($parsed['appID']);

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'patch',
            path: ['automation/actions/2026-03/%1$s/%2$s', $appID, $definitionID],
            body: (object) array_diff_key($parsed, array_flip(['appID'])),
            options: $options,
            convert: PublicActionDefinition::class,
        );
    }

    /**
     * @api
     *
     * Retrieve the versions of a definition by ID.
     *
     * @param string $definitionID Path param
     * @param array{appID: int, after?: string, limit?: int}|ActionListParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<Page<PublicActionRevision>>
     *
     * @throws APIException
     */
    public function list(
        string $definitionID,
        array|ActionListParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = ActionListParams::parseRequest(
            $params,
            $requestOptions,
        );
        $appID = $parsed['appID'];
        unset($parsed['appID']);

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: [
                'automation/actions/2026-03/%1$s/%2$s/revisions', $appID, $definitionID,
            ],
            query: $parsed,
            options: $options,
            convert: PublicActionRevision::class,
            page: Page::class,
        );
    }

    /**
     * @api
     *
     * Archive a function for a specific definition.
     *
     * @param array{
     *   appID: int, definitionID: string, functionType: value-of<FunctionType>
     * }|ActionDeleteParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function delete(
        string $functionID,
        array|ActionDeleteParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = ActionDeleteParams::parseRequest(
            $params,
            $requestOptions,
        );
        $appID = $parsed['appID'];
        unset($parsed['appID']);
        $definitionID = $parsed['definitionID'];
        unset($parsed['definitionID']);
        $functionType = $parsed['functionType'];
        unset($parsed['functionType']);

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'delete',
            path: [
                'automation/actions/2026-03/%1$s/%2$s/functions/%3$s/%4$s',
                $appID,
                $definitionID,
                $functionType,
                $functionID,
            ],
            options: $options,
            convert: null,
        );
    }

    /**
     * @api
     *
     * Complete a specific blocked action execution by ID.
     *
     * @param array{
     *   outputFields: array<string,string>,
     *   typedOutputs: mixed,
     *   failureReasonType?: string,
     *   requestContext?: RequestContextShape,
     * }|ActionCompleteParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function complete(
        string $callbackID,
        array|ActionCompleteParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = ActionCompleteParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: ['automation/actions/callbacks/2026-03/%1$s/complete', $callbackID],
            body: (object) $parsed,
            options: $options,
            convert: null,
        );
    }

    /**
     * @api
     *
     * Complete a batch of blocked action executions.
     *
     * @param array{
     *   inputs: list<CallbackCompletionBatchRequest|CallbackCompletionBatchRequestShape>,
     * }|ActionCompleteBatchParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function completeBatch(
        array|ActionCompleteBatchParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = ActionCompleteBatchParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: 'automation/actions/callbacks/2026-03/complete',
            body: (object) $parsed,
            options: $options,
            convert: null,
        );
    }

    /**
     * @api
     *
     * Update a function for a given definition by ID.
     *
     * @param string $functionID Path param
     * @param array{
     *   appID: int,
     *   definitionID: string,
     *   functionType: value-of<ActionCreateOrReplaceParams\FunctionType>,
     *   body: string,
     * }|ActionCreateOrReplaceParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<PublicActionFunctionIdentifier>
     *
     * @throws APIException
     */
    public function createOrReplace(
        string $functionID,
        array|ActionCreateOrReplaceParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = ActionCreateOrReplaceParams::parseRequest(
            $params,
            $requestOptions,
        );
        $appID = $parsed['appID'];
        unset($parsed['appID']);
        $definitionID = $parsed['definitionID'];
        unset($parsed['definitionID']);
        $functionType = $parsed['functionType'];
        unset($parsed['functionType']);

        /** @var array<string,mixed> */
        $body = $parsed['body'];

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'put',
            path: [
                'automation/actions/2026-03/%1$s/%2$s/functions/%3$s/%4$s',
                $appID,
                $definitionID,
                $functionType,
                $functionID,
            ],
            headers: ['Content-Type' => 'text/plain'],
            body: array_diff_key(
                $body,
                array_flip(['appID', 'definitionID', 'functionType'])
            ),
            options: $options,
            convert: PublicActionFunctionIdentifier::class,
        );
    }

    /**
     * @api
     *
     * Add a function for a given definition.
     *
     * @param ActionCreateOrReplaceByFunctionTypeParams\FunctionType|value-of<ActionCreateOrReplaceByFunctionTypeParams\FunctionType> $functionType Path param
     * @param array{
     *   appID: int, definitionID: string, body: string
     * }|ActionCreateOrReplaceByFunctionTypeParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<PublicActionFunctionIdentifier>
     *
     * @throws APIException
     */
    public function createOrReplaceByFunctionType(
        ActionCreateOrReplaceByFunctionTypeParams\FunctionType|string $functionType,
        array|ActionCreateOrReplaceByFunctionTypeParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = ActionCreateOrReplaceByFunctionTypeParams::parseRequest(
            $params,
            $requestOptions,
        );
        $appID = $parsed['appID'];
        unset($parsed['appID']);
        $definitionID = $parsed['definitionID'];
        unset($parsed['definitionID']);

        /** @var array<string,mixed> */
        $body = $parsed['body'];

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'put',
            path: [
                'automation/actions/2026-03/%1$s/%2$s/functions/%3$s',
                $appID,
                $definitionID,
                $functionType,
            ],
            headers: ['Content-Type' => 'text/plain'],
            body: array_diff_key($body, array_flip(['appID', 'definitionID'])),
            options: $options,
            convert: PublicActionFunctionIdentifier::class,
        );
    }

    /**
     * @api
     *
     * Set whether a custom action definition requires an object.
     *
     * @param string $definitionID Path param
     * @param array{
     *   appID: int, requiresObject: bool
     * }|ActionCreateRequiresObjectParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function createRequiresObject(
        string $definitionID,
        array|ActionCreateRequiresObjectParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = ActionCreateRequiresObjectParams::parseRequest(
            $params,
            $requestOptions,
        );
        $appID = $parsed['appID'];
        unset($parsed['appID']);

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: [
                'automation/actions/2026-03/%1$s/%2$s/requires-object',
                $appID,
                $definitionID,
            ],
            body: (object) array_diff_key($parsed, array_flip(['appID'])),
            options: $options,
            convert: null,
        );
    }

    /**
     * @api
     *
     * Delete a function within a given definition.
     *
     * @param ActionDeleteByFunctionTypeParams\FunctionType|value-of<ActionDeleteByFunctionTypeParams\FunctionType> $functionType
     * @param array{
     *   appID: int, definitionID: string
     * }|ActionDeleteByFunctionTypeParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function deleteByFunctionType(
        ActionDeleteByFunctionTypeParams\FunctionType|string $functionType,
        array|ActionDeleteByFunctionTypeParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = ActionDeleteByFunctionTypeParams::parseRequest(
            $params,
            $requestOptions,
        );
        $appID = $parsed['appID'];
        unset($parsed['appID']);
        $definitionID = $parsed['definitionID'];
        unset($parsed['definitionID']);

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'delete',
            path: [
                'automation/actions/2026-03/%1$s/%2$s/functions/%3$s',
                $appID,
                $definitionID,
                $functionType,
            ],
            options: $options,
            convert: null,
        );
    }

    /**
     * @api
     *
     * Retrieve a specific revision of a definition by revision ID.
     *
     * @param array{appID: int, definitionID: string}|ActionGetParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<PublicActionRevision>
     *
     * @throws APIException
     */
    public function get(
        string $revisionID,
        array|ActionGetParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = ActionGetParams::parseRequest(
            $params,
            $requestOptions,
        );
        $appID = $parsed['appID'];
        unset($parsed['appID']);
        $definitionID = $parsed['definitionID'];
        unset($parsed['definitionID']);

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: [
                'automation/actions/2026-03/%1$s/%2$s/revisions/%3$s',
                $appID,
                $definitionID,
                $revisionID,
            ],
            options: $options,
            convert: PublicActionRevision::class,
        );
    }

    /**
     * @api
     *
     * Retrieve functions of a specific type for a given definition.
     *
     * @param ActionGetByFunctionTypeParams\FunctionType|value-of<ActionGetByFunctionTypeParams\FunctionType> $functionType
     * @param array{
     *   appID: int, definitionID: string
     * }|ActionGetByFunctionTypeParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<PublicActionFunction>
     *
     * @throws APIException
     */
    public function getByFunctionType(
        ActionGetByFunctionTypeParams\FunctionType|string $functionType,
        array|ActionGetByFunctionTypeParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = ActionGetByFunctionTypeParams::parseRequest(
            $params,
            $requestOptions,
        );
        $appID = $parsed['appID'];
        unset($parsed['appID']);
        $definitionID = $parsed['definitionID'];
        unset($parsed['definitionID']);

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: [
                'automation/actions/2026-03/%1$s/%2$s/functions/%3$s',
                $appID,
                $definitionID,
                $functionType,
            ],
            options: $options,
            convert: PublicActionFunction::class,
        );
    }

    /**
     * @api
     *
     * Retrieve whether a custom action definition requires an object.
     *
     * @param array{appID: int}|ActionGetRequiresObjectParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<PublicActionDefinitionRequiresObjectResponse>
     *
     * @throws APIException
     */
    public function getRequiresObject(
        string $definitionID,
        array|ActionGetRequiresObjectParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = ActionGetRequiresObjectParams::parseRequest(
            $params,
            $requestOptions,
        );
        $appID = $parsed['appID'];
        unset($parsed['appID']);

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: [
                'automation/actions/2026-03/%1$s/%2$s/requires-object',
                $appID,
                $definitionID,
            ],
            options: $options,
            convert: PublicActionDefinitionRequiresObjectResponse::class,
        );
    }
}
