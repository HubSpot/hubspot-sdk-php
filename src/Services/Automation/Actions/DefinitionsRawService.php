<?php

declare(strict_types=1);

namespace HubspotSDK\Services\Automation\Actions;

use HubspotSDK\Automation\Actions\Definitions\DefinitionCreateParams;
use HubspotSDK\Automation\Actions\Definitions\DefinitionDeleteParams;
use HubspotSDK\Automation\Actions\Definitions\DefinitionGetParams;
use HubspotSDK\Automation\Actions\Definitions\DefinitionListParams;
use HubspotSDK\Automation\Actions\Definitions\DefinitionUpdateParams;
use HubspotSDK\Automation\Actions\InputFieldDefinition;
use HubspotSDK\Automation\Actions\OutputFieldDefinition;
use HubspotSDK\Automation\Actions\PublicActionDefinition;
use HubspotSDK\Automation\Actions\PublicActionFunction;
use HubspotSDK\Automation\Actions\PublicActionLabels;
use HubspotSDK\Automation\Actions\PublicExecutionTranslationRule;
use HubspotSDK\Automation\Actions\PublicObjectRequestOptions;
use HubspotSDK\Client;
use HubspotSDK\Core\Contracts\BaseResponse;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Page;
use HubspotSDK\RequestOptions;
use HubspotSDK\ServiceContracts\Automation\Actions\DefinitionsRawContract;

/**
 * @phpstan-import-type PublicActionFunctionShape from \HubspotSDK\Automation\Actions\PublicActionFunction
 * @phpstan-import-type InputFieldDependencyShape from \HubspotSDK\Automation\Actions\Definitions\DefinitionCreateParams\InputFieldDependency
 * @phpstan-import-type InputFieldDependencyShape from \HubspotSDK\Automation\Actions\Definitions\DefinitionUpdateParams\InputFieldDependency as InputFieldDependencyShape1
 * @phpstan-import-type InputFieldDefinitionShape from \HubspotSDK\Automation\Actions\InputFieldDefinition
 * @phpstan-import-type PublicActionLabelsShape from \HubspotSDK\Automation\Actions\PublicActionLabels
 * @phpstan-import-type PublicExecutionTranslationRuleShape from \HubspotSDK\Automation\Actions\PublicExecutionTranslationRule
 * @phpstan-import-type PublicObjectRequestOptionsShape from \HubspotSDK\Automation\Actions\PublicObjectRequestOptions
 * @phpstan-import-type OutputFieldDefinitionShape from \HubspotSDK\Automation\Actions\OutputFieldDefinition
 * @phpstan-import-type RequestOpts from \HubspotSDK\RequestOptions
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
     * @param int $appID the ID of the app
     * @param array{
     *   actionURL: string,
     *   functions: list<PublicActionFunction|PublicActionFunctionShape>,
     *   inputFields: list<InputFieldDefinition|InputFieldDefinitionShape>,
     *   labels: array<string,PublicActionLabels|PublicActionLabelsShape>,
     *   objectTypes: list<string>,
     *   published: bool,
     *   archivedAt?: int,
     *   executionRules?: list<PublicExecutionTranslationRule|PublicExecutionTranslationRuleShape>,
     *   inputFieldDependencies?: list<InputFieldDependencyShape>,
     *   objectRequestOptions?: PublicObjectRequestOptions|PublicObjectRequestOptionsShape,
     *   outputFields?: list<OutputFieldDefinition|OutputFieldDefinitionShape>,
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
            path: ['automation/v4/actions/%1$s', $appID],
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
     * @param string $definitionID path param: The ID of the custom action definition
     * @param array{
     *   appID: int,
     *   actionURL?: string,
     *   executionRules?: list<PublicExecutionTranslationRule|PublicExecutionTranslationRuleShape>,
     *   inputFieldDependencies?: list<InputFieldDependencyShape1>,
     *   inputFields?: list<InputFieldDefinition|InputFieldDefinitionShape>,
     *   labels?: array<string,PublicActionLabels|PublicActionLabelsShape>,
     *   objectRequestOptions?: PublicObjectRequestOptions|PublicObjectRequestOptionsShape,
     *   objectTypes?: list<string>,
     *   outputFields?: list<OutputFieldDefinition|OutputFieldDefinitionShape>,
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
            path: ['automation/v4/actions/%1$s/%2$s', $appID, $definitionID],
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
     * @param int $appID the ID of the app
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
            path: ['automation/v4/actions/%1$s', $appID],
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
     * @param string $definitionID the ID of the custom action definition
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
            path: ['automation/v4/actions/%1$s/%2$s', $appID, $definitionID],
            options: $options,
            convert: null,
        );
    }

    /**
     * @api
     *
     * Retrieve a custom workflow action definition by ID.
     *
     * @param string $definitionID path param: The ID of the custom action
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
            path: ['automation/v4/actions/%1$s/%2$s', $appID, $definitionID],
            query: $parsed,
            options: $options,
            convert: PublicActionDefinition::class,
        );
    }
}
