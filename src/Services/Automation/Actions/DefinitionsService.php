<?php

declare(strict_types=1);

namespace HubspotSDK\Services\Automation\Actions;

use HubspotSDK\Automation\Actions\Definitions\DefinitionCreateParams;
use HubspotSDK\Automation\Actions\Definitions\DefinitionDeleteParams;
use HubspotSDK\Automation\Actions\Definitions\DefinitionGetParams;
use HubspotSDK\Automation\Actions\Definitions\DefinitionListParams;
use HubspotSDK\Automation\Actions\Definitions\DefinitionUpdateParams;
use HubspotSDK\Automation\Actions\FieldTypeDefinition;
use HubspotSDK\Automation\Actions\InputFieldDefinition;
use HubspotSDK\Automation\Actions\OutputFieldDefinition;
use HubspotSDK\Automation\Actions\PublicActionDefinition;
use HubspotSDK\Automation\Actions\PublicActionFunction;
use HubspotSDK\Automation\Actions\PublicActionLabels;
use HubspotSDK\Automation\Actions\PublicExecutionTranslationRule;
use HubspotSDK\Automation\Actions\PublicObjectRequestOptions;
use HubspotSDK\Client;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Page;
use HubspotSDK\RequestOptions;
use HubspotSDK\ServiceContracts\Automation\Actions\DefinitionsContract;

final class DefinitionsService implements DefinitionsContract
{
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
     *   actionUrl: string,
     *   functions: list<array{
     *     functionSource: string,
     *     functionType: 'POST_ACTION_EXECUTION'|'POST_FETCH_OPTIONS'|'PRE_ACTION_EXECUTION'|'PRE_FETCH_OPTIONS',
     *     id?: string,
     *   }|PublicActionFunction>,
     *   inputFields: list<array{
     *     isRequired: bool,
     *     typeDefinition: array<mixed>|FieldTypeDefinition,
     *     automationFieldType?: string,
     *     supportedValueTypes?: list<mixed>,
     *   }|InputFieldDefinition>,
     *   labels: array<string,array{
     *     actionName: string,
     *     actionCardContent?: string,
     *     actionDescription?: string,
     *     appDisplayName?: string,
     *     executionRules?: array<string,string>,
     *     inputFieldDescriptions?: array<string,string>,
     *     inputFieldLabels?: array<string,string>,
     *     inputFieldOptionLabels?: array<string,array<string,string>>,
     *     outputFieldLabels?: array<string,string>,
     *   }|PublicActionLabels>,
     *   objectTypes: list<string>,
     *   published: bool,
     *   archivedAt?: int,
     *   executionRules?: list<array{
     *     conditions: array<string,mixed>, labelName: string
     *   }|PublicExecutionTranslationRule>,
     *   inputFieldDependencies?: list<array<string,mixed>>,
     *   objectRequestOptions?: array{
     *     properties: list<string>
     *   }|PublicObjectRequestOptions,
     *   outputFields?: list<array{
     *     typeDefinition: array<mixed>|FieldTypeDefinition
     *   }|OutputFieldDefinition>,
     * }|DefinitionCreateParams $params
     *
     * @throws APIException
     */
    public function create(
        int $appID,
        array|DefinitionCreateParams $params,
        ?RequestOptions $requestOptions = null,
    ): PublicActionDefinition {
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
     * @param array{
     *   appId: int,
     *   actionUrl?: string,
     *   executionRules?: list<array{
     *     conditions: array<string,mixed>, labelName: string
     *   }|PublicExecutionTranslationRule>,
     *   inputFieldDependencies?: list<array<string,mixed>>,
     *   inputFields?: list<array{
     *     isRequired: bool,
     *     typeDefinition: array<mixed>|FieldTypeDefinition,
     *     automationFieldType?: string,
     *     supportedValueTypes?: list<mixed>,
     *   }|InputFieldDefinition>,
     *   labels?: array<string,array{
     *     actionName: string,
     *     actionCardContent?: string,
     *     actionDescription?: string,
     *     appDisplayName?: string,
     *     executionRules?: array<string,string>,
     *     inputFieldDescriptions?: array<string,string>,
     *     inputFieldLabels?: array<string,string>,
     *     inputFieldOptionLabels?: array<string,array<string,string>>,
     *     outputFieldLabels?: array<string,string>,
     *   }|PublicActionLabels>,
     *   objectRequestOptions?: array{
     *     properties: list<string>
     *   }|PublicObjectRequestOptions,
     *   objectTypes?: list<string>,
     *   outputFields?: list<array{
     *     typeDefinition: array<mixed>|FieldTypeDefinition
     *   }|OutputFieldDefinition>,
     *   published?: bool,
     * }|DefinitionUpdateParams $params
     *
     * @throws APIException
     */
    public function update(
        string $definitionID,
        array|DefinitionUpdateParams $params,
        ?RequestOptions $requestOptions = null,
    ): PublicActionDefinition {
        [$parsed, $options] = DefinitionUpdateParams::parseRequest(
            $params,
            $requestOptions,
        );
        $appID = $parsed['appId'];
        unset($parsed['appId']);

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'patch',
            path: ['automation/v4/actions/%1$s/%2$s', $appID, $definitionID],
            body: (object) array_diff_key($parsed, ['appId']),
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
     *
     * @return Page<PublicActionDefinition>
     *
     * @throws APIException
     */
    public function list(
        int $appID,
        array|DefinitionListParams $params,
        ?RequestOptions $requestOptions = null,
    ): Page {
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
     * @param array{appId: int}|DefinitionDeleteParams $params
     *
     * @throws APIException
     */
    public function delete(
        string $definitionID,
        array|DefinitionDeleteParams $params,
        ?RequestOptions $requestOptions = null,
    ): mixed {
        [$parsed, $options] = DefinitionDeleteParams::parseRequest(
            $params,
            $requestOptions,
        );
        $appID = $parsed['appId'];
        unset($parsed['appId']);

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
     * @param array{appId: int, archived?: bool}|DefinitionGetParams $params
     *
     * @throws APIException
     */
    public function get(
        string $definitionID,
        array|DefinitionGetParams $params,
        ?RequestOptions $requestOptions = null,
    ): PublicActionDefinition {
        [$parsed, $options] = DefinitionGetParams::parseRequest(
            $params,
            $requestOptions,
        );
        $appID = $parsed['appId'];
        unset($parsed['appId']);

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
