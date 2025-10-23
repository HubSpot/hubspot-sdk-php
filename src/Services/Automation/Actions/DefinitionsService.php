<?php

declare(strict_types=1);

namespace HubspotSDK\Services\Automation\Actions;

use HubspotSDK\Automation\Actions\Definitions\DefinitionCreateParams;
use HubspotSDK\Automation\Actions\Definitions\DefinitionDeleteParams;
use HubspotSDK\Automation\Actions\Definitions\DefinitionListParams;
use HubspotSDK\Automation\Actions\Definitions\DefinitionReadParams;
use HubspotSDK\Automation\Actions\Definitions\DefinitionUpdateParams;
use HubspotSDK\Automation\Actions\InputFieldDefinition;
use HubspotSDK\Automation\Actions\OutputFieldDefinition;
use HubspotSDK\Automation\Actions\PublicActionDefinition;
use HubspotSDK\Automation\Actions\PublicActionFunction;
use HubspotSDK\Automation\Actions\PublicActionLabels;
use HubspotSDK\Automation\Actions\PublicConditionalSingleFieldDependency;
use HubspotSDK\Automation\Actions\PublicExecutionTranslationRule;
use HubspotSDK\Automation\Actions\PublicObjectRequestOptions;
use HubspotSDK\Automation\Actions\PublicSingleFieldDependency;
use HubspotSDK\Client;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Page;
use HubspotSDK\RequestOptions;
use HubspotSDK\ServiceContracts\Automation\Actions\DefinitionsContract;

use const HubspotSDK\Core\OMIT as omit;

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
    ): PublicActionDefinition {
        $params = [
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
        ];

        return $this->createRaw($appID, $params, $requestOptions);
    }

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
    ): PublicActionDefinition {
        [$parsed, $options] = DefinitionCreateParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
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
    ): PublicActionDefinition {
        $params = [
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
        ];

        return $this->updateRaw($definitionID, $params, $requestOptions);
    }

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
        ?RequestOptions $requestOptions = null
    ): PublicActionDefinition {
        [$parsed, $options] = DefinitionUpdateParams::parseRequest(
            $params,
            $requestOptions
        );
        $appID = $parsed['appID'];
        unset($parsed['appID']);

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'patch',
            path: ['automation/v4/actions/%1$s/%2$s', $appID, $definitionID],
            body: (object) array_diff_key($parsed, ['appID']),
            options: $options,
            convert: PublicActionDefinition::class,
        );
    }

    /**
     * @api
     *
     * Retrieve custom workflow action definitions by app ID.
     *
     * @param string $after The paging cursor token of the last successfully read resource will be returned as the `paging.next.after` JSON property of a paged response containing more results.
     * @param bool $archived whether to return only results that have been archived
     * @param int $limit the maximum number of results to display per page
     *
     * @return Page<PublicActionDefinition>
     *
     * @throws APIException
     */
    public function list(
        int $appID,
        $after = omit,
        $archived = omit,
        $limit = omit,
        ?RequestOptions $requestOptions = null,
    ): Page {
        $params = ['after' => $after, 'archived' => $archived, 'limit' => $limit];

        return $this->listRaw($appID, $params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @return Page<PublicActionDefinition>
     *
     * @throws APIException
     */
    public function listRaw(
        int $appID,
        array $params,
        ?RequestOptions $requestOptions = null
    ): Page {
        [$parsed, $options] = DefinitionListParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
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
     * @param int $appID
     *
     * @throws APIException
     */
    public function delete(
        string $definitionID,
        $appID,
        ?RequestOptions $requestOptions = null
    ): mixed {
        $params = ['appID' => $appID];

        return $this->deleteRaw($definitionID, $params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function deleteRaw(
        string $definitionID,
        array $params,
        ?RequestOptions $requestOptions = null
    ): mixed {
        [$parsed, $options] = DefinitionDeleteParams::parseRequest(
            $params,
            $requestOptions
        );
        $appID = $parsed['appID'];
        unset($parsed['appID']);

        // @phpstan-ignore-next-line;
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
     * @param int $appID
     * @param bool $archived whether to return only results that have been archived
     *
     * @throws APIException
     */
    public function read(
        string $definitionID,
        $appID,
        $archived = omit,
        ?RequestOptions $requestOptions = null,
    ): PublicActionDefinition {
        $params = ['appID' => $appID, 'archived' => $archived];

        return $this->readRaw($definitionID, $params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function readRaw(
        string $definitionID,
        array $params,
        ?RequestOptions $requestOptions = null
    ): PublicActionDefinition {
        [$parsed, $options] = DefinitionReadParams::parseRequest(
            $params,
            $requestOptions
        );
        $appID = $parsed['appID'];
        unset($parsed['appID']);

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: ['automation/v4/actions/%1$s/%2$s', $appID, $definitionID],
            query: $parsed,
            options: $options,
            convert: PublicActionDefinition::class,
        );
    }
}
