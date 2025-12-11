<?php

declare(strict_types=1);

namespace HubspotSDK\Services\Automation\Actions;

use HubspotSDK\Automation\Actions\CollectionResponsePublicActionFunctionIdentifierNoPaging;
use HubspotSDK\Automation\Actions\Functions\FunctionDeleteParams\FunctionType;
use HubspotSDK\Automation\Actions\PublicActionFunction;
use HubspotSDK\Automation\Actions\PublicActionFunctionIdentifier;
use HubspotSDK\Client;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Core\Util;
use HubspotSDK\RequestOptions;
use HubspotSDK\ServiceContracts\Automation\Actions\FunctionsContract;

final class FunctionsService implements FunctionsContract
{
    /**
     * @api
     */
    public FunctionsRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new FunctionsRawService($client);
    }

    /**
     * @api
     *
     * Retrieve all functions included in a definition.
     *
     * @param string $definitionID the ID of the definition
     * @param int $appID the ID of the app
     *
     * @throws APIException
     */
    public function list(
        string $definitionID,
        int $appID,
        ?RequestOptions $requestOptions = null
    ): CollectionResponsePublicActionFunctionIdentifierNoPaging {
        $params = Util::removeNulls(['appID' => $appID]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->list($definitionID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Archive a function for a specific definition.
     *
     * @param 'POST_ACTION_EXECUTION'|'POST_FETCH_OPTIONS'|'PRE_ACTION_EXECUTION'|'PRE_FETCH_OPTIONS'|FunctionType $functionType
     *
     * @throws APIException
     */
    public function delete(
        string $functionID,
        int $appID,
        string $definitionID,
        string|FunctionType $functionType,
        ?RequestOptions $requestOptions = null,
    ): mixed {
        $params = Util::removeNulls(
            [
                'appID' => $appID,
                'definitionID' => $definitionID,
                'functionType' => $functionType,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->delete($functionID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Update a function for a given definition by ID.
     *
     * @param string $functionID path param: The ID of the function
     * @param int $appID path param: The ID of the app
     * @param string $definitionID path param: The ID of the definition
     * @param 'POST_ACTION_EXECUTION'|'POST_FETCH_OPTIONS'|'PRE_ACTION_EXECUTION'|'PRE_FETCH_OPTIONS'|\HubspotSDK\Automation\Actions\Functions\FunctionCreateOrReplaceParams\FunctionType $functionType Path param: The type of function. Can be `PRE_ACTION_EXECUTION`, `PRE_FETCH_OPTIONS`, `POST_FETCH_OPTIONS`, `POST_ACTION_EXECUTION`.
     * @param string $body Body param:
     *
     * @throws APIException
     */
    public function createOrReplace(
        string $functionID,
        int $appID,
        string $definitionID,
        string|\HubspotSDK\Automation\Actions\Functions\FunctionCreateOrReplaceParams\FunctionType $functionType,
        string $body,
        ?RequestOptions $requestOptions = null,
    ): PublicActionFunctionIdentifier {
        $params = Util::removeNulls(
            [
                'appID' => $appID,
                'definitionID' => $definitionID,
                'functionType' => $functionType,
                'body' => $body,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->createOrReplace($functionID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Add a function for a given definition.
     *
     * @param \HubspotSDK\Automation\Actions\Functions\FunctionCreateOrReplaceByFunctionTypeParams\FunctionType|value-of<\HubspotSDK\Automation\Actions\Functions\FunctionCreateOrReplaceByFunctionTypeParams\FunctionType> $functionType Path param: The type of function. Can be `PRE_ACTION_EXECUTION`, `PRE_FETCH_OPTIONS`, `POST_FETCH_OPTIONS`, `POST_ACTION_EXECUTION`.
     * @param int $appID path param: The ID of the app
     * @param string $definitionID path param: The ID of the definition
     * @param string $body Body param:
     *
     * @throws APIException
     */
    public function createOrReplaceByFunctionType(
        \HubspotSDK\Automation\Actions\Functions\FunctionCreateOrReplaceByFunctionTypeParams\FunctionType|string $functionType,
        int $appID,
        string $definitionID,
        string $body,
        ?RequestOptions $requestOptions = null,
    ): PublicActionFunctionIdentifier {
        $params = Util::removeNulls(
            ['appID' => $appID, 'definitionID' => $definitionID, 'body' => $body]
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->createOrReplaceByFunctionType($functionType, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Delete a function within a given definition.
     *
     * @param \HubspotSDK\Automation\Actions\Functions\FunctionDeleteByFunctionTypeParams\FunctionType|value-of<\HubspotSDK\Automation\Actions\Functions\FunctionDeleteByFunctionTypeParams\FunctionType> $functionType The type of function. Can be `PRE_ACTION_EXECUTION`, `PRE_FETCH_OPTIONS`, `POST_FETCH_OPTIONS`, `POST_ACTION_EXECUTION`.
     * @param int $appID the ID of the app
     * @param string $definitionID the ID of the definition
     *
     * @throws APIException
     */
    public function deleteByFunctionType(
        \HubspotSDK\Automation\Actions\Functions\FunctionDeleteByFunctionTypeParams\FunctionType|string $functionType,
        int $appID,
        string $definitionID,
        ?RequestOptions $requestOptions = null,
    ): mixed {
        $params = Util::removeNulls(
            ['appID' => $appID, 'definitionID' => $definitionID]
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->deleteByFunctionType($functionType, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Retrieve a specific function from a given definition.
     *
     * @param string $functionID the ID of the function
     * @param int $appID the ID of the app
     * @param string $definitionID the ID of the definition
     * @param 'POST_ACTION_EXECUTION'|'POST_FETCH_OPTIONS'|'PRE_ACTION_EXECUTION'|'PRE_FETCH_OPTIONS'|\HubspotSDK\Automation\Actions\Functions\FunctionGetParams\FunctionType $functionType The type of function. Can be `PRE_ACTION_EXECUTION`, `PRE_FETCH_OPTIONS`, `POST_FETCH_OPTIONS`, `POST_ACTION_EXECUTION`.
     *
     * @throws APIException
     */
    public function get(
        string $functionID,
        int $appID,
        string $definitionID,
        string|\HubspotSDK\Automation\Actions\Functions\FunctionGetParams\FunctionType $functionType,
        ?RequestOptions $requestOptions = null,
    ): PublicActionFunction {
        $params = Util::removeNulls(
            [
                'appID' => $appID,
                'definitionID' => $definitionID,
                'functionType' => $functionType,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->get($functionID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Retrieve functions of a specific type for a given definition.
     *
     * @param \HubspotSDK\Automation\Actions\Functions\FunctionGetByFunctionTypeParams\FunctionType|value-of<\HubspotSDK\Automation\Actions\Functions\FunctionGetByFunctionTypeParams\FunctionType> $functionType The type of function. Can be `PRE_ACTION_EXECUTION`, `PRE_FETCH_OPTIONS`, `POST_FETCH_OPTIONS`, `POST_ACTION_EXECUTION`.
     * @param int $appID the ID of the app
     * @param string $definitionID the ID of the definition
     *
     * @throws APIException
     */
    public function getByFunctionType(
        \HubspotSDK\Automation\Actions\Functions\FunctionGetByFunctionTypeParams\FunctionType|string $functionType,
        int $appID,
        string $definitionID,
        ?RequestOptions $requestOptions = null,
    ): PublicActionFunction {
        $params = Util::removeNulls(
            ['appID' => $appID, 'definitionID' => $definitionID]
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->getByFunctionType($functionType, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
