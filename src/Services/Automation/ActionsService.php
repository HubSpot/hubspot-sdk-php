<?php

declare(strict_types=1);

namespace HubspotSDK\Services\Automation;

use HubspotSDK\Automation\Actions\ActionArchiveByFunctionTypeParams;
use HubspotSDK\Automation\Actions\ActionCompleteBatchParams;
use HubspotSDK\Automation\Actions\ActionCompleteParams;
use HubspotSDK\Automation\Actions\ActionCreateOrReplaceByFunctionTypeParams;
use HubspotSDK\Automation\Actions\ActionCreateOrReplaceParams;
use HubspotSDK\Automation\Actions\ActionCreateParams;
use HubspotSDK\Automation\Actions\ActionDeleteParams;
use HubspotSDK\Automation\Actions\ActionDeleteParams\FunctionType;
use HubspotSDK\Automation\Actions\ActionGetByFunctionTypeParams;
use HubspotSDK\Automation\Actions\ActionListParams;
use HubspotSDK\Automation\Actions\ActionReadParams;
use HubspotSDK\Automation\Actions\ActionUpdateParams;
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
use HubspotSDK\Client;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Page;
use HubspotSDK\RequestOptions;
use HubspotSDK\ServiceContracts\Automation\ActionsContract;

use const HubspotSDK\Core\OMIT as omit;

final class ActionsService implements ActionsContract
{
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Create a new custom action definition
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
        [$parsed, $options] = ActionCreateParams::parseRequest(
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
     * Update an existing action definition
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
        [$parsed, $options] = ActionUpdateParams::parseRequest(
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
     * Retrieve revisions for a given definition
     *
     * @param int $appID
     * @param string $after
     * @param int $limit
     *
     * @return Page<PublicActionRevision>
     *
     * @throws APIException
     */
    public function list(
        string $definitionID,
        $appID,
        $after = omit,
        $limit = omit,
        ?RequestOptions $requestOptions = null,
    ): Page {
        $params = ['appID' => $appID, 'after' => $after, 'limit' => $limit];

        return $this->listRaw($definitionID, $params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @return Page<PublicActionRevision>
     *
     * @throws APIException
     */
    public function listRaw(
        string $definitionID,
        array $params,
        ?RequestOptions $requestOptions = null
    ): Page {
        [$parsed, $options] = ActionListParams::parseRequest(
            $params,
            $requestOptions
        );
        $appID = $parsed['appID'];
        unset($parsed['appID']);

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: [
                'automation/v4/actions/%1$s/%2$s/revisions', $appID, $definitionID,
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
     * Archive a function for a definition
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
    ): mixed {
        $params = [
            'appID' => $appID,
            'definitionID' => $definitionID,
            'functionType' => $functionType,
        ];

        return $this->deleteRaw($functionID, $params, $requestOptions);
    }

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
        ?RequestOptions $requestOptions = null
    ): mixed {
        [$parsed, $options] = ActionDeleteParams::parseRequest(
            $params,
            $requestOptions
        );
        $appID = $parsed['appID'];
        unset($parsed['appID']);
        $definitionID = $parsed['definitionID'];
        unset($parsed['definitionID']);
        $functionType = $parsed['functionType'];
        unset($parsed['functionType']);

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'delete',
            path: [
                'automation/v4/actions/%1$s/%2$s/functions/%3$s/%4$s',
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
     * Delete a function for a definition
     *
     * @param ActionArchiveByFunctionTypeParams\FunctionType|value-of<ActionArchiveByFunctionTypeParams\FunctionType> $functionType
     * @param int $appID
     * @param string $definitionID
     *
     * @throws APIException
     */
    public function archiveByFunctionType(
        ActionArchiveByFunctionTypeParams\FunctionType|string $functionType,
        $appID,
        $definitionID,
        ?RequestOptions $requestOptions = null,
    ): mixed {
        $params = ['appID' => $appID, 'definitionID' => $definitionID];

        return $this->archiveByFunctionTypeRaw(
            $functionType,
            $params,
            $requestOptions
        );
    }

    /**
     * @api
     *
     * @param ActionArchiveByFunctionTypeParams\FunctionType|value-of<ActionArchiveByFunctionTypeParams\FunctionType> $functionType
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function archiveByFunctionTypeRaw(
        ActionArchiveByFunctionTypeParams\FunctionType|string $functionType,
        array $params,
        ?RequestOptions $requestOptions = null,
    ): mixed {
        [$parsed, $options] = ActionArchiveByFunctionTypeParams::parseRequest(
            $params,
            $requestOptions
        );
        $appID = $parsed['appID'];
        unset($parsed['appID']);
        $definitionID = $parsed['definitionID'];
        unset($parsed['definitionID']);

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'delete',
            path: [
                'automation/v4/actions/%1$s/%2$s/functions/%3$s',
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
     * Completes a callback
     *
     * @param array<string, string> $outputFields
     *
     * @throws APIException
     */
    public function complete(
        string $callbackID,
        $outputFields,
        ?RequestOptions $requestOptions = null
    ): mixed {
        $params = ['outputFields' => $outputFields];

        return $this->completeRaw($callbackID, $params, $requestOptions);
    }

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
        ?RequestOptions $requestOptions = null
    ): mixed {
        [$parsed, $options] = ActionCompleteParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'post',
            path: ['automation/v4/actions/callbacks/%1$s/complete', $callbackID],
            body: (object) $parsed,
            options: $options,
            convert: null,
        );
    }

    /**
     * @api
     *
     * Complete a batch of callbacks
     *
     * @param list<CallbackCompletionBatchRequest> $inputs
     *
     * @throws APIException
     */
    public function completeBatch(
        $inputs,
        ?RequestOptions $requestOptions = null
    ): mixed {
        $params = ['inputs' => $inputs];

        return $this->completeBatchRaw($params, $requestOptions);
    }

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
    ): mixed {
        [$parsed, $options] = ActionCompleteBatchParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'post',
            path: 'automation/v4/actions/callbacks/complete',
            body: (object) $parsed,
            options: $options,
            convert: null,
        );
    }

    /**
     * @api
     *
     * Update a function for a definition
     *
     * @param int $appID
     * @param string $definitionID
     * @param ActionCreateOrReplaceParams\FunctionType|value-of<ActionCreateOrReplaceParams\FunctionType> $functionType
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
    ): PublicActionFunctionIdentifier {
        $params = [
            'appID' => $appID,
            'definitionID' => $definitionID,
            'functionType' => $functionType,
            'body' => $body,
        ];

        return $this->createOrReplaceRaw($functionID, $params, $requestOptions);
    }

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
        ?RequestOptions $requestOptions = null
    ): PublicActionFunctionIdentifier {
        [$parsed, $options] = ActionCreateOrReplaceParams::parseRequest(
            $params,
            $requestOptions
        );
        $appID = $parsed['appID'];
        unset($parsed['appID']);
        $definitionID = $parsed['definitionID'];
        unset($parsed['definitionID']);
        $functionType = $parsed['functionType'];
        unset($parsed['functionType']);

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'put',
            path: [
                'automation/v4/actions/%1$s/%2$s/functions/%3$s/%4$s',
                $appID,
                $definitionID,
                $functionType,
                $functionID,
            ],
            headers: ['Content-Type' => 'text/plain'],
            body: array_diff_key(
                $parsed['body'],
                array_flip(['appID', 'definitionID', 'functionType'])
            ),
            options: $options,
            convert: PublicActionFunctionIdentifier::class,
        );
    }

    /**
     * @api
     *
     * Insert a function for a definition
     *
     * @param ActionCreateOrReplaceByFunctionTypeParams\FunctionType|value-of<ActionCreateOrReplaceByFunctionTypeParams\FunctionType> $functionType
     * @param int $appID
     * @param string $definitionID
     * @param string $body
     *
     * @throws APIException
     */
    public function createOrReplaceByFunctionType(
        ActionCreateOrReplaceByFunctionTypeParams\FunctionType|string $functionType,
        $appID,
        $definitionID,
        $body,
        ?RequestOptions $requestOptions = null,
    ): PublicActionFunctionIdentifier {
        $params = [
            'appID' => $appID, 'definitionID' => $definitionID, 'body' => $body,
        ];

        return $this->createOrReplaceByFunctionTypeRaw(
            $functionType,
            $params,
            $requestOptions
        );
    }

    /**
     * @api
     *
     * @param ActionCreateOrReplaceByFunctionTypeParams\FunctionType|value-of<ActionCreateOrReplaceByFunctionTypeParams\FunctionType> $functionType
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function createOrReplaceByFunctionTypeRaw(
        ActionCreateOrReplaceByFunctionTypeParams\FunctionType|string $functionType,
        array $params,
        ?RequestOptions $requestOptions = null,
    ): PublicActionFunctionIdentifier {
        [
            $parsed, $options,
        ] = ActionCreateOrReplaceByFunctionTypeParams::parseRequest(
            $params,
            $requestOptions
        );
        $appID = $parsed['appID'];
        unset($parsed['appID']);
        $definitionID = $parsed['definitionID'];
        unset($parsed['definitionID']);

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'put',
            path: [
                'automation/v4/actions/%1$s/%2$s/functions/%3$s',
                $appID,
                $definitionID,
                $functionType,
            ],
            headers: ['Content-Type' => 'text/plain'],
            body: array_diff_key(
                $parsed['body'],
                array_flip(['appID', 'definitionID'])
            ),
            options: $options,
            convert: PublicActionFunctionIdentifier::class,
        );
    }

    /**
     * @api
     *
     * Retrieve functions by a type for a given definition
     *
     * @param ActionGetByFunctionTypeParams\FunctionType|value-of<ActionGetByFunctionTypeParams\FunctionType> $functionType
     * @param int $appID
     * @param string $definitionID
     *
     * @throws APIException
     */
    public function getByFunctionType(
        ActionGetByFunctionTypeParams\FunctionType|string $functionType,
        $appID,
        $definitionID,
        ?RequestOptions $requestOptions = null,
    ): PublicActionFunction {
        $params = ['appID' => $appID, 'definitionID' => $definitionID];

        return $this->getByFunctionTypeRaw($functionType, $params, $requestOptions);
    }

    /**
     * @api
     *
     * @param ActionGetByFunctionTypeParams\FunctionType|value-of<ActionGetByFunctionTypeParams\FunctionType> $functionType
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function getByFunctionTypeRaw(
        ActionGetByFunctionTypeParams\FunctionType|string $functionType,
        array $params,
        ?RequestOptions $requestOptions = null,
    ): PublicActionFunction {
        [$parsed, $options] = ActionGetByFunctionTypeParams::parseRequest(
            $params,
            $requestOptions
        );
        $appID = $parsed['appID'];
        unset($parsed['appID']);
        $definitionID = $parsed['definitionID'];
        unset($parsed['definitionID']);

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: [
                'automation/v4/actions/%1$s/%2$s/functions/%3$s',
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
     * Retrieve a function from a given definition
     *
     * @param int $appID
     * @param string $definitionID
     * @param ActionReadParams\FunctionType|value-of<ActionReadParams\FunctionType> $functionType
     *
     * @throws APIException
     */
    public function read(
        string $functionID,
        $appID,
        $definitionID,
        $functionType,
        ?RequestOptions $requestOptions = null,
    ): PublicActionFunction {
        $params = [
            'appID' => $appID,
            'definitionID' => $definitionID,
            'functionType' => $functionType,
        ];

        return $this->readRaw($functionID, $params, $requestOptions);
    }

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
        ?RequestOptions $requestOptions = null
    ): PublicActionFunction {
        [$parsed, $options] = ActionReadParams::parseRequest(
            $params,
            $requestOptions
        );
        $appID = $parsed['appID'];
        unset($parsed['appID']);
        $definitionID = $parsed['definitionID'];
        unset($parsed['definitionID']);
        $functionType = $parsed['functionType'];
        unset($parsed['functionType']);

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: [
                'automation/v4/actions/%1$s/%2$s/functions/%3$s/%4$s',
                $appID,
                $definitionID,
                $functionType,
                $functionID,
            ],
            options: $options,
            convert: PublicActionFunction::class,
        );
    }
}
