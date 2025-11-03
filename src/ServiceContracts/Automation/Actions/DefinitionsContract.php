<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\Automation\Actions;

use HubspotSDK\Automation\Actions\InputFieldDefinition;
use HubspotSDK\Automation\Actions\OutputFieldDefinition;
use HubspotSDK\Automation\Actions\PublicActionDefinition;
use HubspotSDK\Automation\Actions\PublicActionFunction;
use HubspotSDK\Automation\Actions\PublicActionLabels;
use HubspotSDK\Automation\Actions\PublicConditionalSingleFieldDependency;
use HubspotSDK\Automation\Actions\PublicExecutionTranslationRule;
use HubspotSDK\Automation\Actions\PublicObjectRequestOptions;
use HubspotSDK\Automation\Actions\PublicSingleFieldDependency;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Page;
use HubspotSDK\RequestOptions;

use const HubspotSDK\Core\OMIT as omit;

interface DefinitionsContract
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
    ): Page;

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
    ): Page;

    /**
     * @api
     *
     * @param int $appID
     *
     * @throws APIException
     */
    public function delete(
        string $definitionID,
        $appID,
        ?RequestOptions $requestOptions = null
    ): mixed;

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
        ?RequestOptions $requestOptions = null,
    ): mixed;

    /**
     * @api
     *
     * @param int $appID
     * @param bool $archived whether to return only results that have been archived
     *
     * @throws APIException
     */
    public function get(
        string $definitionID,
        $appID,
        $archived = omit,
        ?RequestOptions $requestOptions = null,
    ): PublicActionDefinition;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function getRaw(
        string $definitionID,
        array $params,
        ?RequestOptions $requestOptions = null,
    ): PublicActionDefinition;
}
