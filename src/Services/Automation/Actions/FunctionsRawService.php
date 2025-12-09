<?php

declare(strict_types=1);

namespace HubspotSDK\Services\Automation\Actions;

use HubspotSDK\Automation\Actions\CollectionResponsePublicActionFunctionIdentifierNoPaging;
use HubspotSDK\Automation\Actions\Functions\FunctionCreateOrReplaceByFunctionTypeParams;
use HubspotSDK\Automation\Actions\Functions\FunctionCreateOrReplaceParams;
use HubspotSDK\Automation\Actions\Functions\FunctionDeleteByFunctionTypeParams;
use HubspotSDK\Automation\Actions\Functions\FunctionDeleteParams;
use HubspotSDK\Automation\Actions\Functions\FunctionDeleteParams\FunctionType;
use HubspotSDK\Automation\Actions\Functions\FunctionGetByFunctionTypeParams;
use HubspotSDK\Automation\Actions\Functions\FunctionGetParams;
use HubspotSDK\Automation\Actions\Functions\FunctionListParams;
use HubspotSDK\Automation\Actions\PublicActionFunction;
use HubspotSDK\Automation\Actions\PublicActionFunctionIdentifier;
use HubspotSDK\Client;
use HubspotSDK\Core\Contracts\BaseResponse;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\RequestOptions;
use HubspotSDK\ServiceContracts\Automation\Actions\FunctionsRawContract;

final class FunctionsRawService implements FunctionsRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Retrieve all functions included in a definition.
     *
     * @param string $definitionID the ID of the definition
     * @param array{appID: int}|FunctionListParams $params
     *
     * @return BaseResponse<CollectionResponsePublicActionFunctionIdentifierNoPaging>
     *
     * @throws APIException
     */
    public function list(
        string $definitionID,
        array|FunctionListParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = FunctionListParams::parseRequest(
            $params,
            $requestOptions,
        );
        $appID = $parsed['appID'];
        unset($parsed['appID']);

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: [
                'automation/v4/actions/%1$s/%2$s/functions', $appID, $definitionID,
            ],
            options: $options,
            convert: CollectionResponsePublicActionFunctionIdentifierNoPaging::class,
        );
    }

    /**
     * @api
     *
     * Archive a function for a specific definition.
     *
     * @param array{
     *   appID: int, definitionID: string, functionType: value-of<FunctionType>
     * }|FunctionDeleteParams $params
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function delete(
        string $functionID,
        array|FunctionDeleteParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = FunctionDeleteParams::parseRequest(
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
     * Update a function for a given definition by ID.
     *
     * @param string $functionID path param: The ID of the function
     * @param array{
     *   appID: int,
     *   definitionID: string,
     *   functionType: value-of<FunctionCreateOrReplaceParams\FunctionType>,
     *   body: string,
     * }|FunctionCreateOrReplaceParams $params
     *
     * @return BaseResponse<PublicActionFunctionIdentifier>
     *
     * @throws APIException
     */
    public function createOrReplace(
        string $functionID,
        array|FunctionCreateOrReplaceParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = FunctionCreateOrReplaceParams::parseRequest(
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
                'automation/v4/actions/%1$s/%2$s/functions/%3$s/%4$s',
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
     * @param FunctionCreateOrReplaceByFunctionTypeParams\FunctionType|value-of<FunctionCreateOrReplaceByFunctionTypeParams\FunctionType> $functionType Path param: The type of function. Can be `PRE_ACTION_EXECUTION`, `PRE_FETCH_OPTIONS`, `POST_FETCH_OPTIONS`, `POST_ACTION_EXECUTION`.
     * @param array{
     *   appID: int, definitionID: string, body: string
     * }|FunctionCreateOrReplaceByFunctionTypeParams $params
     *
     * @return BaseResponse<PublicActionFunctionIdentifier>
     *
     * @throws APIException
     */
    public function createOrReplaceByFunctionType(
        FunctionCreateOrReplaceByFunctionTypeParams\FunctionType|string $functionType,
        array|FunctionCreateOrReplaceByFunctionTypeParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = FunctionCreateOrReplaceByFunctionTypeParams::parseRequest(
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
                'automation/v4/actions/%1$s/%2$s/functions/%3$s',
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
     * Delete a function within a given definition.
     *
     * @param FunctionDeleteByFunctionTypeParams\FunctionType|value-of<FunctionDeleteByFunctionTypeParams\FunctionType> $functionType The type of function. Can be `PRE_ACTION_EXECUTION`, `PRE_FETCH_OPTIONS`, `POST_FETCH_OPTIONS`, `POST_ACTION_EXECUTION`.
     * @param array{
     *   appID: int, definitionID: string
     * }|FunctionDeleteByFunctionTypeParams $params
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function deleteByFunctionType(
        FunctionDeleteByFunctionTypeParams\FunctionType|string $functionType,
        array|FunctionDeleteByFunctionTypeParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = FunctionDeleteByFunctionTypeParams::parseRequest(
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
     * Retrieve a specific function from a given definition.
     *
     * @param string $functionID the ID of the function
     * @param array{
     *   appID: int,
     *   definitionID: string,
     *   functionType: value-of<FunctionGetParams\FunctionType>,
     * }|FunctionGetParams $params
     *
     * @return BaseResponse<PublicActionFunction>
     *
     * @throws APIException
     */
    public function get(
        string $functionID,
        array|FunctionGetParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = FunctionGetParams::parseRequest(
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

    /**
     * @api
     *
     * Retrieve functions of a specific type for a given definition.
     *
     * @param FunctionGetByFunctionTypeParams\FunctionType|value-of<FunctionGetByFunctionTypeParams\FunctionType> $functionType The type of function. Can be `PRE_ACTION_EXECUTION`, `PRE_FETCH_OPTIONS`, `POST_FETCH_OPTIONS`, `POST_ACTION_EXECUTION`.
     * @param array{
     *   appID: int, definitionID: string
     * }|FunctionGetByFunctionTypeParams $params
     *
     * @return BaseResponse<PublicActionFunction>
     *
     * @throws APIException
     */
    public function getByFunctionType(
        FunctionGetByFunctionTypeParams\FunctionType|string $functionType,
        array|FunctionGetByFunctionTypeParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = FunctionGetByFunctionTypeParams::parseRequest(
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
                'automation/v4/actions/%1$s/%2$s/functions/%3$s',
                $appID,
                $definitionID,
                $functionType,
            ],
            options: $options,
            convert: PublicActionFunction::class,
        );
    }
}
