<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\Automation\Actions;

use HubspotSDK\Automation\Actions\CollectionResponsePublicActionFunctionIdentifierNoPaging;
use HubspotSDK\Automation\Actions\Functions\FunctionDeleteParams\FunctionType;
use HubspotSDK\Automation\Actions\PublicActionFunction;
use HubspotSDK\Automation\Actions\PublicActionFunctionIdentifier;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\RequestOptions;

interface FunctionsContract
{
    /**
     * @api
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
    ): CollectionResponsePublicActionFunctionIdentifierNoPaging;

    /**
     * @api
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
    ): mixed;

    /**
     * @api
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
    ): PublicActionFunctionIdentifier;

    /**
     * @api
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
    ): PublicActionFunctionIdentifier;

    /**
     * @api
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
    ): mixed;

    /**
     * @api
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
    ): PublicActionFunction;

    /**
     * @api
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
    ): PublicActionFunction;
}
