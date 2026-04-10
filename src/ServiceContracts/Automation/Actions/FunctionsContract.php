<?php

declare(strict_types=1);

namespace HubSpotSDK\ServiceContracts\Automation\Actions;

use HubSpotSDK\Automation\Actions\CollectionResponsePublicActionFunctionIdentifierNoPaging;
use HubSpotSDK\Automation\Actions\Functions\FunctionDeleteParams\FunctionType;
use HubSpotSDK\Automation\Actions\PublicActionFunction;
use HubSpotSDK\Automation\Actions\PublicActionFunctionIdentifier;
use HubSpotSDK\Core\Exceptions\APIException;
use HubSpotSDK\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \HubSpotSDK\RequestOptions
 */
interface FunctionsContract
{
    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function list(
        string $definitionID,
        int $appID,
        RequestOptions|array|null $requestOptions = null,
    ): CollectionResponsePublicActionFunctionIdentifierNoPaging;

    /**
     * @api
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
    ): mixed;

    /**
     * @api
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
    ): PublicActionFunctionIdentifier;

    /**
     * @api
     *
     * @param \HubSpotSDK\Automation\Actions\Functions\FunctionCreateOrReplaceByFunctionTypeParams\FunctionType|string $functionType Path param
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
    ): PublicActionFunctionIdentifier;

    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function deleteByFunctionType(
        \HubSpotSDK\Automation\Actions\Functions\FunctionDeleteByFunctionTypeParams\FunctionType|string $functionType,
        int $appID,
        string $definitionID,
        RequestOptions|array|null $requestOptions = null,
    ): mixed;

    /**
     * @api
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
    ): PublicActionFunction;

    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function getByFunctionType(
        \HubSpotSDK\Automation\Actions\Functions\FunctionGetByFunctionTypeParams\FunctionType|string $functionType,
        int $appID,
        string $definitionID,
        RequestOptions|array|null $requestOptions = null,
    ): PublicActionFunction;
}
