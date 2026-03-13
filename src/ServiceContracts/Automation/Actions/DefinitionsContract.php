<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\Automation\Actions;

use HubspotSDK\Automation\Actions\InputFieldDefinition;
use HubspotSDK\Automation\Actions\OutputFieldDefinition;
use HubspotSDK\Automation\Actions\PublicActionDefinition;
use HubspotSDK\Automation\Actions\PublicActionFunction;
use HubspotSDK\Automation\Actions\PublicActionLabels;
use HubspotSDK\Automation\Actions\PublicExecutionTranslationRule;
use HubspotSDK\Automation\Actions\PublicObjectRequestOptions;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Page;
use HubspotSDK\RequestOptions;

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
interface DefinitionsContract
{
    /**
     * @api
     *
     * @param int $appID the ID of the app
     * @param list<PublicActionFunction|PublicActionFunctionShape> $functions
     * @param list<InputFieldDefinition|InputFieldDefinitionShape> $inputFields
     * @param array<string,PublicActionLabels|PublicActionLabelsShape> $labels
     * @param list<string> $objectTypes
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
    ): PublicActionDefinition;

    /**
     * @api
     *
     * @param string $definitionID path param: The ID of the custom action definition
     * @param int $appID path param: The ID of the app
     * @param string $actionURL Body param
     * @param list<PublicExecutionTranslationRule|PublicExecutionTranslationRuleShape> $executionRules Body param
     * @param list<InputFieldDependencyShape1> $inputFieldDependencies Body param
     * @param list<InputFieldDefinition|InputFieldDefinitionShape> $inputFields Body param
     * @param array<string,PublicActionLabels|PublicActionLabelsShape> $labels Body param
     * @param PublicObjectRequestOptions|PublicObjectRequestOptionsShape $objectRequestOptions Body param
     * @param list<string> $objectTypes Body param
     * @param list<OutputFieldDefinition|OutputFieldDefinitionShape> $outputFields Body param
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
     * @param int $appID the ID of the app
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
    ): Page;

    /**
     * @api
     *
     * @param string $definitionID the ID of the custom action definition
     * @param int $appID the ID of the app
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function delete(
        string $definitionID,
        int $appID,
        RequestOptions|array|null $requestOptions = null,
    ): mixed;

    /**
     * @api
     *
     * @param string $definitionID path param: The ID of the custom action
     * @param int $appID path param: The ID of the app
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
    ): PublicActionDefinition;
}
