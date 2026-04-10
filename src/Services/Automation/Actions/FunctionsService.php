<?php

declare(strict_types=1);

namespace HubSpotSDK\Services\Automation\Actions;

use HubSpotSDK\Automation\Actions\CollectionResponsePublicActionFunctionIdentifierNoPaging;
use HubSpotSDK\Automation\Actions\Functions\FunctionDeleteParams\FunctionType;
use HubSpotSDK\Automation\Actions\PublicActionFunction;
use HubSpotSDK\Automation\Actions\PublicActionFunctionIdentifier;
use HubSpotSDK\Client;
use HubSpotSDK\Core\Exceptions\APIException;
use HubSpotSDK\Core\Util;
use HubSpotSDK\RequestOptions;
use HubSpotSDK\ServiceContracts\Automation\Actions\FunctionsContract;

/**
 * @phpstan-import-type RequestOpts from \HubSpotSDK\RequestOptions
 */
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
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function list(
        string $definitionID,
        int $appID,
        RequestOptions|array|null $requestOptions = null,
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
     * @param FunctionType|value-of<FunctionType> $functionType
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function delete(
        string $functionID,
        int $appID,
        string $definitionID,
        FunctionType|string $functionType,
        RequestOptions|array|null $requestOptions = null,
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
     * @param string $functionID Path param
     * @param int $appID Path param
     * @param string $definitionID Path param
     * @param \HubSpotSDK\Automation\Actions\Functions\FunctionCreateOrReplaceParams\FunctionType|value-of<\HubSpotSDK\Automation\Actions\Functions\FunctionCreateOrReplaceParams\FunctionType> $functionType Path param
     * @param string $body Body param
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function createOrReplace(
        string $functionID,
        int $appID,
        string $definitionID,
        \HubSpotSDK\Automation\Actions\Functions\FunctionCreateOrReplaceParams\FunctionType|string $functionType,
        string $body,
        RequestOptions|array|null $requestOptions = null,
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
     * @param \HubSpotSDK\Automation\Actions\Functions\FunctionCreateOrReplaceByFunctionTypeParams\FunctionType|value-of<\HubSpotSDK\Automation\Actions\Functions\FunctionCreateOrReplaceByFunctionTypeParams\FunctionType> $functionType Path param
     * @param int $appID Path param
     * @param string $definitionID Path param
     * @param string $body Body param
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function createOrReplaceByFunctionType(
        \HubSpotSDK\Automation\Actions\Functions\FunctionCreateOrReplaceByFunctionTypeParams\FunctionType|string $functionType,
        int $appID,
        string $definitionID,
        string $body,
        RequestOptions|array|null $requestOptions = null,
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
     * @param \HubSpotSDK\Automation\Actions\Functions\FunctionDeleteByFunctionTypeParams\FunctionType|value-of<\HubSpotSDK\Automation\Actions\Functions\FunctionDeleteByFunctionTypeParams\FunctionType> $functionType
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function deleteByFunctionType(
        \HubSpotSDK\Automation\Actions\Functions\FunctionDeleteByFunctionTypeParams\FunctionType|string $functionType,
        int $appID,
        string $definitionID,
        RequestOptions|array|null $requestOptions = null,
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
     * @param \HubSpotSDK\Automation\Actions\Functions\FunctionGetParams\FunctionType|value-of<\HubSpotSDK\Automation\Actions\Functions\FunctionGetParams\FunctionType> $functionType
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function get(
        string $functionID,
        int $appID,
        string $definitionID,
        \HubSpotSDK\Automation\Actions\Functions\FunctionGetParams\FunctionType|string $functionType,
        RequestOptions|array|null $requestOptions = null,
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
     * @param \HubSpotSDK\Automation\Actions\Functions\FunctionGetByFunctionTypeParams\FunctionType|value-of<\HubSpotSDK\Automation\Actions\Functions\FunctionGetByFunctionTypeParams\FunctionType> $functionType
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function getByFunctionType(
        \HubSpotSDK\Automation\Actions\Functions\FunctionGetByFunctionTypeParams\FunctionType|string $functionType,
        int $appID,
        string $definitionID,
        RequestOptions|array|null $requestOptions = null,
    ): PublicActionFunction {
        $params = Util::removeNulls(
            ['appID' => $appID, 'definitionID' => $definitionID]
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->getByFunctionType($functionType, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
