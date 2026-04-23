<?php

declare(strict_types=1);

namespace HubSpotSDK\Services\Automation\Actions;

use HubSpotSDK\Automation\Actions\OutputFieldDefinition;
use HubSpotSDK\Automation\Actions\PublicActionDefinition;
use HubSpotSDK\Automation\Actions\PublicActionDefinitionRequiresObjectResponse;
use HubSpotSDK\Automation\Actions\PublicActionFunction;
use HubSpotSDK\Automation\Actions\PublicActionLabels;
use HubSpotSDK\Automation\Actions\PublicExecutionTranslationRule;
use HubSpotSDK\Automation\Actions\PublicInputFieldDefinition;
use HubSpotSDK\Automation\Actions\PublicObjectRequestOptions;
use HubSpotSDK\Client;
use HubSpotSDK\Core\Exceptions\APIException;
use HubSpotSDK\Core\Util;
use HubSpotSDK\Page;
use HubSpotSDK\RequestOptions;
use HubSpotSDK\ServiceContracts\Automation\Actions\DefinitionsContract;

/**
 * @phpstan-import-type PublicActionFunctionShape from \HubSpotSDK\Automation\Actions\PublicActionFunction
 * @phpstan-import-type InputFieldDependencyShape from \HubSpotSDK\Automation\Actions\Definitions\DefinitionCreateParams\InputFieldDependency
 * @phpstan-import-type InputFieldDependencyShape from \HubSpotSDK\Automation\Actions\Definitions\DefinitionUpdateParams\InputFieldDependency as InputFieldDependencyShape1
 * @phpstan-import-type PublicInputFieldDefinitionShape from \HubSpotSDK\Automation\Actions\PublicInputFieldDefinition
 * @phpstan-import-type PublicActionLabelsShape from \HubSpotSDK\Automation\Actions\PublicActionLabels
 * @phpstan-import-type PublicExecutionTranslationRuleShape from \HubSpotSDK\Automation\Actions\PublicExecutionTranslationRule
 * @phpstan-import-type PublicObjectRequestOptionsShape from \HubSpotSDK\Automation\Actions\PublicObjectRequestOptions
 * @phpstan-import-type OutputFieldDefinitionShape from \HubSpotSDK\Automation\Actions\OutputFieldDefinition
 * @phpstan-import-type RequestOpts from \HubSpotSDK\RequestOptions
 */
final class DefinitionsService implements DefinitionsContract
{
    /**
     * @api
     */
    public DefinitionsRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new DefinitionsRawService($client);
    }

    /**
     * @api
     *
     * Create a new custom workflow action.
     *
     * @param string $actionURL the URL endpoint where the action is executed
     * @param list<PublicActionFunction|PublicActionFunctionShape> $functions
     * @param list<PublicInputFieldDefinition|PublicInputFieldDefinitionShape> $inputFields
     * @param array<string,PublicActionLabels|PublicActionLabelsShape> $labels holds various labels associated with the action, including names and descriptions
     * @param list<string> $objectTypes
     * @param bool $published indicates whether the action is published and available for use
     * @param int $archivedAt the timestamp indicating when the action was archived
     * @param list<PublicExecutionTranslationRule|PublicExecutionTranslationRuleShape> $executionRules
     * @param list<InputFieldDependencyShape> $inputFieldDependencies
     * @param PublicObjectRequestOptions|PublicObjectRequestOptionsShape $objectRequestOptions
     * @param list<OutputFieldDefinition|OutputFieldDefinitionShape> $outputFields
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
     * Update an existing action definition by ID.
     *
     * @param string $definitionID Path param
     * @param int $appID Path param
     * @param string $actionURL body param: The URL endpoint where the action is executed
     * @param list<PublicExecutionTranslationRule|PublicExecutionTranslationRuleShape> $executionRules Body param
     * @param list<InputFieldDependencyShape1> $inputFieldDependencies Body param
     * @param list<PublicInputFieldDefinition|PublicInputFieldDefinitionShape> $inputFields Body param
     * @param array<string,PublicActionLabels|PublicActionLabelsShape> $labels body param: Contains labels for the action, including names and descriptions
     * @param PublicObjectRequestOptions|PublicObjectRequestOptionsShape $objectRequestOptions Body param
     * @param list<string> $objectTypes Body param
     * @param list<OutputFieldDefinition|OutputFieldDefinitionShape> $outputFields Body param
     * @param bool $published body param: Indicates whether the action is published and available for use
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
     * Retrieve custom workflow action definitions by app ID.
     *
     * @param string $after The paging cursor token of the last successfully read resource will be returned as the `paging.next.after` JSON property of a paged response containing more results.
     * @param bool $archived whether to return only results that have been archived
     * @param int $limit the maximum number of results to display per page
     * @param RequestOpts|null $requestOptions
     *
     * @return Page<PublicActionDefinition>
     *
     * @throws APIException
     */
    public function list(
        int $appID,
        ?string $after = null,
        bool $archived = false,
        ?int $limit = null,
        RequestOptions|array|null $requestOptions = null,
    ): Page {
        $params = Util::removeNulls(
            ['after' => $after, 'archived' => $archived, 'limit' => $limit]
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->list($appID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Delete an action definition by ID.
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function delete(
        string $definitionID,
        int $appID,
        RequestOptions|array|null $requestOptions = null,
    ): mixed {
        $params = Util::removeNulls(['appID' => $appID]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->delete($definitionID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Set whether a custom action definition requires an object.
     *
     * @param string $definitionID Path param
     * @param int $appID Path param
     * @param bool $requiresObject body param: Indicates whether a custom action definition requires an associated object
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
     * Retrieve a custom workflow action definition by ID.
     *
     * @param string $definitionID Path param
     * @param int $appID Path param
     * @param bool $archived query param: Whether to return only results that have been archived
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function get(
        string $definitionID,
        int $appID,
        bool $archived = false,
        RequestOptions|array|null $requestOptions = null,
    ): PublicActionDefinition {
        $params = Util::removeNulls(['appID' => $appID, 'archived' => $archived]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->get($definitionID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Retrieve whether a custom action definition requires an object.
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
