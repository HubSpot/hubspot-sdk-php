<?php

declare(strict_types=1);

namespace HubSpotSDK\Services\Automation\Actions;

use HubSpotSDK\Automation\Actions\Definitions\DefinitionCreateParams;
use HubSpotSDK\Automation\Actions\Definitions\DefinitionCreateRequiresObjectParams;
use HubSpotSDK\Automation\Actions\Definitions\DefinitionDeleteParams;
use HubSpotSDK\Automation\Actions\Definitions\DefinitionGetParams;
use HubSpotSDK\Automation\Actions\Definitions\DefinitionGetRequiresObjectParams;
use HubSpotSDK\Automation\Actions\Definitions\DefinitionListParams;
use HubSpotSDK\Automation\Actions\Definitions\DefinitionUpdateParams;
use HubSpotSDK\Automation\Actions\PublicActionDefinition;
use HubSpotSDK\Automation\Actions\PublicActionDefinitionRequiresObjectResponse;
use HubSpotSDK\Automation\Actions\PublicActionFunction;
use HubSpotSDK\Automation\Actions\PublicActionLabels;
use HubSpotSDK\Automation\Actions\PublicExecutionTranslationRule;
use HubSpotSDK\Automation\Actions\PublicInputFieldDefinition;
use HubSpotSDK\Automation\Actions\PublicObjectRequestOptions;
use HubSpotSDK\Client;
use HubSpotSDK\Core\Contracts\BaseResponse;
use HubSpotSDK\Core\Exceptions\APIException;
use HubSpotSDK\Page;
use HubSpotSDK\RequestOptions;
use HubSpotSDK\ServiceContracts\Automation\Actions\DefinitionsRawContract;

/**
 * @phpstan-import-type PublicActionFunctionShape from \HubSpotSDK\Automation\Actions\PublicActionFunction
 * @phpstan-import-type InputFieldDependencyShape from \HubSpotSDK\Automation\Actions\Definitions\DefinitionCreateParams\InputFieldDependency
 * @phpstan-import-type InputFieldDependencyShape from \HubSpotSDK\Automation\Actions\Definitions\DefinitionUpdateParams\InputFieldDependency as InputFieldDependencyShape1
 * @phpstan-import-type PublicInputFieldDefinitionShape from \HubSpotSDK\Automation\Actions\PublicInputFieldDefinition
 * @phpstan-import-type PublicActionLabelsShape from \HubSpotSDK\Automation\Actions\PublicActionLabels
 * @phpstan-import-type PublicExecutionTranslationRuleShape from \HubSpotSDK\Automation\Actions\PublicExecutionTranslationRule
 * @phpstan-import-type PublicObjectRequestOptionsShape from \HubSpotSDK\Automation\Actions\PublicObjectRequestOptions
 * @phpstan-import-type RequestOpts from \HubSpotSDK\RequestOptions
 */
final class DefinitionsRawService implements DefinitionsRawContract
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
     * }|DefinitionCreateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<PublicActionDefinition>
     *
     * @throws APIException
     */
    public function create(
        int $appID,
        array|DefinitionCreateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = DefinitionCreateParams::parseRequest(
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
     * }|DefinitionUpdateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<PublicActionDefinition>
     *
     * @throws APIException
     */
    public function update(
        string $definitionID,
        array|DefinitionUpdateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = DefinitionUpdateParams::parseRequest(
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
     * Retrieve custom workflow action definitions by app ID.
     *
     * @param array{
     *   after?: string, archived?: bool, limit?: int
     * }|DefinitionListParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<Page<PublicActionDefinition>>
     *
     * @throws APIException
     */
    public function list(
        int $appID,
        array|DefinitionListParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = DefinitionListParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['automation/actions/2026-03/%1$s', $appID],
            query: $parsed,
            options: $options,
            convert: PublicActionDefinition::class,
            page: Page::class,
        );
    }

    /**
     * @api
     *
     * Delete an action definition by ID.
     *
     * @param array{appID: int}|DefinitionDeleteParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function delete(
        string $definitionID,
        array|DefinitionDeleteParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = DefinitionDeleteParams::parseRequest(
            $params,
            $requestOptions,
        );
        $appID = $parsed['appID'];
        unset($parsed['appID']);

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'delete',
            path: ['automation/actions/2026-03/%1$s/%2$s', $appID, $definitionID],
            options: $options,
            convert: null,
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
     * }|DefinitionCreateRequiresObjectParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function createRequiresObject(
        string $definitionID,
        array|DefinitionCreateRequiresObjectParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = DefinitionCreateRequiresObjectParams::parseRequest(
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
     * Retrieve a custom workflow action definition by ID.
     *
     * @param string $definitionID Path param
     * @param array{appID: int, archived?: bool}|DefinitionGetParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<PublicActionDefinition>
     *
     * @throws APIException
     */
    public function get(
        string $definitionID,
        array|DefinitionGetParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = DefinitionGetParams::parseRequest(
            $params,
            $requestOptions,
        );
        $appID = $parsed['appID'];
        unset($parsed['appID']);

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['automation/actions/2026-03/%1$s/%2$s', $appID, $definitionID],
            query: $parsed,
            options: $options,
            convert: PublicActionDefinition::class,
        );
    }

    /**
     * @api
     *
     * Retrieve whether a custom action definition requires an object.
     *
     * @param array{appID: int}|DefinitionGetRequiresObjectParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<PublicActionDefinitionRequiresObjectResponse>
     *
     * @throws APIException
     */
    public function getRequiresObject(
        string $definitionID,
        array|DefinitionGetRequiresObjectParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = DefinitionGetRequiresObjectParams::parseRequest(
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
