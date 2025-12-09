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
use HubspotSDK\ServiceContracts\Automation\Actions\FunctionsContract;

final class FunctionsService implements FunctionsContract
{
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Retrieve all functions included in a definition.
     *
     * @param array{appId: int}|FunctionListParams $params
     *
     * @throws APIException
     */
    public function list(
        string $definitionID,
        array|FunctionListParams $params,
        ?RequestOptions $requestOptions = null,
    ): CollectionResponsePublicActionFunctionIdentifierNoPaging {
        [$parsed, $options] = FunctionListParams::parseRequest(
            $params,
            $requestOptions,
        );
        $appID = $parsed['appId'];
        unset($parsed['appId']);

        /** @var BaseResponse<CollectionResponsePublicActionFunctionIdentifierNoPaging,> */
        $response = $this->client->request(
            method: 'get',
            path: [
                'automation/v4/actions/%1$s/%2$s/functions', $appID, $definitionID,
            ],
            options: $options,
            convert: CollectionResponsePublicActionFunctionIdentifierNoPaging::class,
        );

        return $response->parse();
    }

    /**
     * @api
     *
     * Archive a function for a specific definition.
     *
     * @param array{
     *   appId: int, definitionId: string, functionType: value-of<FunctionType>
     * }|FunctionDeleteParams $params
     *
     * @throws APIException
     */
    public function delete(
        string $functionID,
        array|FunctionDeleteParams $params,
        ?RequestOptions $requestOptions = null,
    ): mixed {
        [$parsed, $options] = FunctionDeleteParams::parseRequest(
            $params,
            $requestOptions,
        );
        $appID = $parsed['appId'];
        unset($parsed['appId']);
        $definitionID = $parsed['definitionId'];
        unset($parsed['definitionId']);
        $functionType = $parsed['functionType'];
        unset($parsed['functionType']);

        /** @var BaseResponse<mixed> */
        $response = $this->client->request(
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

        return $response->parse();
    }

    /**
     * @api
     *
     * Update a function for a given definition by ID.
     *
     * @throws APIException
     */
    public function createOrReplace(
        string $functionID,
        string $params,
        ?RequestOptions $requestOptions = null
    ): PublicActionFunctionIdentifier {
        [$parsed, $options] = FunctionCreateOrReplaceParams::parseRequest(
            $params,
            $requestOptions,
        );
        $appID = $parsed['appId'];
        unset($parsed['appId']);
        $definitionID = $parsed['definitionId'];
        unset($parsed['definitionId']);
        $functionType = $parsed['functionType'];
        unset($parsed['functionType']);

        /** @var BaseResponse<PublicActionFunctionIdentifier> */
        $response = $this->client->request(
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
                array_flip(['appId', 'definitionId', 'functionType'])
            ),
            options: $options,
            convert: PublicActionFunctionIdentifier::class,
        );

        return $response->parse();
    }

    /**
     * @api
     *
     * Add a function for a given definition.
     *
     * @param FunctionCreateOrReplaceByFunctionTypeParams\FunctionType|value-of<FunctionCreateOrReplaceByFunctionTypeParams\FunctionType> $functionType
     *
     * @throws APIException
     */
    public function createOrReplaceByFunctionType(
        FunctionCreateOrReplaceByFunctionTypeParams\FunctionType|string $functionType,
        string $params,
        ?RequestOptions $requestOptions = null,
    ): PublicActionFunctionIdentifier {
        [$parsed, $options] = FunctionCreateOrReplaceByFunctionTypeParams::parseRequest(
            $params,
            $requestOptions,
        );
        $appID = $parsed['appId'];
        unset($parsed['appId']);
        $definitionID = $parsed['definitionId'];
        unset($parsed['definitionId']);

        /** @var BaseResponse<PublicActionFunctionIdentifier> */
        $response = $this->client->request(
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
                array_flip(['appId', 'definitionId'])
            ),
            options: $options,
            convert: PublicActionFunctionIdentifier::class,
        );

        return $response->parse();
    }

    /**
     * @api
     *
     * Delete a function within a given definition.
     *
     * @param FunctionDeleteByFunctionTypeParams\FunctionType|value-of<FunctionDeleteByFunctionTypeParams\FunctionType> $functionType
     * @param array{
     *   appId: int, definitionId: string
     * }|FunctionDeleteByFunctionTypeParams $params
     *
     * @throws APIException
     */
    public function deleteByFunctionType(
        FunctionDeleteByFunctionTypeParams\FunctionType|string $functionType,
        array|FunctionDeleteByFunctionTypeParams $params,
        ?RequestOptions $requestOptions = null,
    ): mixed {
        [$parsed, $options] = FunctionDeleteByFunctionTypeParams::parseRequest(
            $params,
            $requestOptions,
        );
        $appID = $parsed['appId'];
        unset($parsed['appId']);
        $definitionID = $parsed['definitionId'];
        unset($parsed['definitionId']);

        /** @var BaseResponse<mixed> */
        $response = $this->client->request(
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

        return $response->parse();
    }

    /**
     * @api
     *
     * Retrieve a specific function from a given definition.
     *
     * @param array{
     *   appId: int,
     *   definitionId: string,
     *   functionType: value-of<FunctionGetParams\FunctionType>,
     * }|FunctionGetParams $params
     *
     * @throws APIException
     */
    public function get(
        string $functionID,
        array|FunctionGetParams $params,
        ?RequestOptions $requestOptions = null,
    ): PublicActionFunction {
        [$parsed, $options] = FunctionGetParams::parseRequest(
            $params,
            $requestOptions,
        );
        $appID = $parsed['appId'];
        unset($parsed['appId']);
        $definitionID = $parsed['definitionId'];
        unset($parsed['definitionId']);
        $functionType = $parsed['functionType'];
        unset($parsed['functionType']);

        /** @var BaseResponse<PublicActionFunction> */
        $response = $this->client->request(
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

        return $response->parse();
    }

    /**
     * @api
     *
     * Retrieve functions of a specific type for a given definition.
     *
     * @param FunctionGetByFunctionTypeParams\FunctionType|value-of<FunctionGetByFunctionTypeParams\FunctionType> $functionType
     * @param array{
     *   appId: int, definitionId: string
     * }|FunctionGetByFunctionTypeParams $params
     *
     * @throws APIException
     */
    public function getByFunctionType(
        FunctionGetByFunctionTypeParams\FunctionType|string $functionType,
        array|FunctionGetByFunctionTypeParams $params,
        ?RequestOptions $requestOptions = null,
    ): PublicActionFunction {
        [$parsed, $options] = FunctionGetByFunctionTypeParams::parseRequest(
            $params,
            $requestOptions,
        );
        $appID = $parsed['appId'];
        unset($parsed['appId']);
        $definitionID = $parsed['definitionId'];
        unset($parsed['definitionId']);

        /** @var BaseResponse<PublicActionFunction> */
        $response = $this->client->request(
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

        return $response->parse();
    }
}
