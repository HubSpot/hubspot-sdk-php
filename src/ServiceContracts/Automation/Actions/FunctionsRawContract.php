<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\Automation\Actions;

use HubspotSDK\Automation\Actions\CollectionResponsePublicActionFunctionIdentifierNoPaging;
use HubspotSDK\Automation\Actions\Functions\FunctionCreateOrReplaceByFunctionTypeParams;
use HubspotSDK\Automation\Actions\Functions\FunctionCreateOrReplaceByFunctionTypeParams\FunctionType;
use HubspotSDK\Automation\Actions\Functions\FunctionCreateOrReplaceParams;
use HubspotSDK\Automation\Actions\Functions\FunctionDeleteByFunctionTypeParams;
use HubspotSDK\Automation\Actions\Functions\FunctionDeleteParams;
use HubspotSDK\Automation\Actions\Functions\FunctionGetByFunctionTypeParams;
use HubspotSDK\Automation\Actions\Functions\FunctionGetParams;
use HubspotSDK\Automation\Actions\Functions\FunctionListParams;
use HubspotSDK\Automation\Actions\PublicActionFunction;
use HubspotSDK\Automation\Actions\PublicActionFunctionIdentifier;
use HubspotSDK\Core\Contracts\BaseResponse;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\RequestOptions;

interface FunctionsRawContract
{
    /**
     * @api
     *
     * @param string $definitionID the ID of the definition
     * @param array<string,mixed>|FunctionListParams $params
     *
     * @return BaseResponse<CollectionResponsePublicActionFunctionIdentifierNoPaging>
     *
     * @throws APIException
     */
    public function list(
        string $definitionID,
        array|FunctionListParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|FunctionDeleteParams $params
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function delete(
        string $functionID,
        array|FunctionDeleteParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $functionID path param: The ID of the function
     * @param array<string,mixed>|FunctionCreateOrReplaceParams $params
     *
     * @return BaseResponse<PublicActionFunctionIdentifier>
     *
     * @throws APIException
     */
    public function createOrReplace(
        string $functionID,
        array|FunctionCreateOrReplaceParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param FunctionType|value-of<FunctionType> $functionType Path param: The type of function. Can be `PRE_ACTION_EXECUTION`, `PRE_FETCH_OPTIONS`, `POST_FETCH_OPTIONS`, `POST_ACTION_EXECUTION`.
     * @param array<string,mixed>|FunctionCreateOrReplaceByFunctionTypeParams $params
     *
     * @return BaseResponse<PublicActionFunctionIdentifier>
     *
     * @throws APIException
     */
    public function createOrReplaceByFunctionType(
        FunctionType|string $functionType,
        array|FunctionCreateOrReplaceByFunctionTypeParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param FunctionDeleteByFunctionTypeParams\FunctionType|value-of<FunctionDeleteByFunctionTypeParams\FunctionType> $functionType The type of function. Can be `PRE_ACTION_EXECUTION`, `PRE_FETCH_OPTIONS`, `POST_FETCH_OPTIONS`, `POST_ACTION_EXECUTION`.
     * @param array<string,mixed>|FunctionDeleteByFunctionTypeParams $params
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function deleteByFunctionType(
        FunctionDeleteByFunctionTypeParams\FunctionType|string $functionType,
        array|FunctionDeleteByFunctionTypeParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $functionID the ID of the function
     * @param array<string,mixed>|FunctionGetParams $params
     *
     * @return BaseResponse<PublicActionFunction>
     *
     * @throws APIException
     */
    public function get(
        string $functionID,
        array|FunctionGetParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param FunctionGetByFunctionTypeParams\FunctionType|value-of<FunctionGetByFunctionTypeParams\FunctionType> $functionType The type of function. Can be `PRE_ACTION_EXECUTION`, `PRE_FETCH_OPTIONS`, `POST_FETCH_OPTIONS`, `POST_ACTION_EXECUTION`.
     * @param array<string,mixed>|FunctionGetByFunctionTypeParams $params
     *
     * @return BaseResponse<PublicActionFunction>
     *
     * @throws APIException
     */
    public function getByFunctionType(
        FunctionGetByFunctionTypeParams\FunctionType|string $functionType,
        array|FunctionGetByFunctionTypeParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;
}
