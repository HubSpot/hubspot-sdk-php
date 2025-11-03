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
     * @param int $appID
     *
     * @throws APIException
     */
    public function list(
        string $definitionID,
        $appID,
        ?RequestOptions $requestOptions = null
    ): CollectionResponsePublicActionFunctionIdentifierNoPaging {
        $params = ['appID' => $appID];

        return $this->listRaw($definitionID, $params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function listRaw(
        string $definitionID,
        array $params,
        ?RequestOptions $requestOptions = null
    ): CollectionResponsePublicActionFunctionIdentifierNoPaging {
        [$parsed, $options] = FunctionListParams::parseRequest(
            $params,
            $requestOptions
        );
        $appID = $parsed['appID'];
        unset($parsed['appID']);

        // @phpstan-ignore-next-line;
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
        [$parsed, $options] = FunctionDeleteParams::parseRequest(
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
     * Update a function for a given definition by ID.
     *
     * @param int $appID
     * @param string $definitionID
     * @param FunctionCreateOrReplaceParams\FunctionType|value-of<FunctionCreateOrReplaceParams\FunctionType> $functionType
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
        [$parsed, $options] = FunctionCreateOrReplaceParams::parseRequest(
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
     * Add a function for a given definition.
     *
     * @param FunctionCreateOrReplaceByFunctionTypeParams\FunctionType|value-of<FunctionCreateOrReplaceByFunctionTypeParams\FunctionType> $functionType
     * @param int $appID
     * @param string $definitionID
     * @param string $body
     *
     * @throws APIException
     */
    public function createOrReplaceByFunctionType(
        FunctionCreateOrReplaceByFunctionTypeParams\FunctionType|string $functionType,
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
     * @param FunctionCreateOrReplaceByFunctionTypeParams\FunctionType|value-of<FunctionCreateOrReplaceByFunctionTypeParams\FunctionType> $functionType
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function createOrReplaceByFunctionTypeRaw(
        FunctionCreateOrReplaceByFunctionTypeParams\FunctionType|string $functionType,
        array $params,
        ?RequestOptions $requestOptions = null,
    ): PublicActionFunctionIdentifier {
        [
            $parsed, $options,
        ] = FunctionCreateOrReplaceByFunctionTypeParams::parseRequest(
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
     * Delete a function within a given definition.
     *
     * @param FunctionDeleteByFunctionTypeParams\FunctionType|value-of<FunctionDeleteByFunctionTypeParams\FunctionType> $functionType
     * @param int $appID
     * @param string $definitionID
     *
     * @throws APIException
     */
    public function deleteByFunctionType(
        FunctionDeleteByFunctionTypeParams\FunctionType|string $functionType,
        $appID,
        $definitionID,
        ?RequestOptions $requestOptions = null,
    ): mixed {
        $params = ['appID' => $appID, 'definitionID' => $definitionID];

        return $this->deleteByFunctionTypeRaw(
            $functionType,
            $params,
            $requestOptions
        );
    }

    /**
     * @api
     *
     * @param FunctionDeleteByFunctionTypeParams\FunctionType|value-of<FunctionDeleteByFunctionTypeParams\FunctionType> $functionType
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function deleteByFunctionTypeRaw(
        FunctionDeleteByFunctionTypeParams\FunctionType|string $functionType,
        array $params,
        ?RequestOptions $requestOptions = null,
    ): mixed {
        [$parsed, $options] = FunctionDeleteByFunctionTypeParams::parseRequest(
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
     * Retrieve a specific function from a given definition.
     *
     * @param int $appID
     * @param string $definitionID
     * @param FunctionGetParams\FunctionType|value-of<FunctionGetParams\FunctionType> $functionType
     *
     * @throws APIException
     */
    public function get(
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

        return $this->getRaw($functionID, $params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function getRaw(
        string $functionID,
        array $params,
        ?RequestOptions $requestOptions = null
    ): PublicActionFunction {
        [$parsed, $options] = FunctionGetParams::parseRequest(
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

    /**
     * @api
     *
     * Retrieve functions of a specific type for a given definition.
     *
     * @param FunctionGetByFunctionTypeParams\FunctionType|value-of<FunctionGetByFunctionTypeParams\FunctionType> $functionType
     * @param int $appID
     * @param string $definitionID
     *
     * @throws APIException
     */
    public function getByFunctionType(
        FunctionGetByFunctionTypeParams\FunctionType|string $functionType,
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
     * @param FunctionGetByFunctionTypeParams\FunctionType|value-of<FunctionGetByFunctionTypeParams\FunctionType> $functionType
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function getByFunctionTypeRaw(
        FunctionGetByFunctionTypeParams\FunctionType|string $functionType,
        array $params,
        ?RequestOptions $requestOptions = null,
    ): PublicActionFunction {
        [$parsed, $options] = FunctionGetByFunctionTypeParams::parseRequest(
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
}
