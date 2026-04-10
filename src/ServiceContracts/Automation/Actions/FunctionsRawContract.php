<?php

declare(strict_types=1);

namespace HubSpotSDK\ServiceContracts\Automation\Actions;

use HubSpotSDK\Automation\Actions\CollectionResponsePublicActionFunctionIdentifierNoPaging;
use HubSpotSDK\Automation\Actions\Functions\FunctionCreateOrReplaceByFunctionTypeParams;
use HubSpotSDK\Automation\Actions\Functions\FunctionCreateOrReplaceByFunctionTypeParams\FunctionType;
use HubSpotSDK\Automation\Actions\Functions\FunctionCreateOrReplaceParams;
use HubSpotSDK\Automation\Actions\Functions\FunctionDeleteByFunctionTypeParams;
use HubSpotSDK\Automation\Actions\Functions\FunctionDeleteParams;
use HubSpotSDK\Automation\Actions\Functions\FunctionGetByFunctionTypeParams;
use HubSpotSDK\Automation\Actions\Functions\FunctionGetParams;
use HubSpotSDK\Automation\Actions\Functions\FunctionListParams;
use HubSpotSDK\Automation\Actions\PublicActionFunction;
use HubSpotSDK\Automation\Actions\PublicActionFunctionIdentifier;
use HubSpotSDK\Core\Contracts\BaseResponse;
use HubSpotSDK\Core\Exceptions\APIException;
use HubSpotSDK\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \HubSpotSDK\RequestOptions
 */
interface FunctionsRawContract
{
    /**
     * @api
     *
     * @param array<string,mixed>|FunctionListParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<CollectionResponsePublicActionFunctionIdentifierNoPaging>
     *
     * @throws APIException
     */
    public function list(
        string $definitionID,
        array|FunctionListParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|FunctionDeleteParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function delete(
        string $functionID,
        array|FunctionDeleteParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $functionID Path param
     * @param array<string,mixed>|FunctionCreateOrReplaceParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<PublicActionFunctionIdentifier>
     *
     * @throws APIException
     */
    public function createOrReplace(
        string $functionID,
        array|FunctionCreateOrReplaceParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param FunctionType|string $functionType Path param
     * @param array<string,mixed>|FunctionCreateOrReplaceByFunctionTypeParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<PublicActionFunctionIdentifier>
     *
     * @throws APIException
     */
    public function createOrReplaceByFunctionType(
        FunctionType|string $functionType,
        array|FunctionCreateOrReplaceByFunctionTypeParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|FunctionDeleteByFunctionTypeParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function deleteByFunctionType(
        FunctionDeleteByFunctionTypeParams\FunctionType|string $functionType,
        array|FunctionDeleteByFunctionTypeParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|FunctionGetParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<PublicActionFunction>
     *
     * @throws APIException
     */
    public function get(
        string $functionID,
        array|FunctionGetParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|FunctionGetByFunctionTypeParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<PublicActionFunction>
     *
     * @throws APIException
     */
    public function getByFunctionType(
        FunctionGetByFunctionTypeParams\FunctionType|string $functionType,
        array|FunctionGetByFunctionTypeParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;
}
