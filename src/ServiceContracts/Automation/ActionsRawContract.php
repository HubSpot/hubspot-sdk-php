<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\Automation;

use HubspotSDK\Automation\Actions\ActionCompleteBatchParams;
use HubspotSDK\Automation\Actions\ActionCompleteParams;
use HubspotSDK\Automation\Actions\ActionCreateOrReplaceByFunctionTypeParams;
use HubspotSDK\Automation\Actions\ActionCreateOrReplaceByFunctionTypeParams\FunctionType;
use HubspotSDK\Automation\Actions\ActionCreateOrReplaceParams;
use HubspotSDK\Automation\Actions\ActionCreateParams;
use HubspotSDK\Automation\Actions\ActionCreateRequiresObjectParams;
use HubspotSDK\Automation\Actions\ActionDeleteByFunctionTypeParams;
use HubspotSDK\Automation\Actions\ActionDeleteParams;
use HubspotSDK\Automation\Actions\ActionGetByFunctionTypeParams;
use HubspotSDK\Automation\Actions\ActionGetParams;
use HubspotSDK\Automation\Actions\ActionGetRequiresObjectParams;
use HubspotSDK\Automation\Actions\ActionListParams;
use HubspotSDK\Automation\Actions\ActionUpdateParams;
use HubspotSDK\Automation\Actions\PublicActionDefinition;
use HubspotSDK\Automation\Actions\PublicActionDefinitionRequiresObjectResponse;
use HubspotSDK\Automation\Actions\PublicActionFunction;
use HubspotSDK\Automation\Actions\PublicActionFunctionIdentifier;
use HubspotSDK\Automation\Actions\PublicActionRevision;
use HubspotSDK\Core\Contracts\BaseResponse;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Page;
use HubspotSDK\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \HubspotSDK\RequestOptions
 */
interface ActionsRawContract
{
    /**
     * @api
     *
     * @param array<string,mixed>|ActionCreateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<PublicActionDefinition>
     *
     * @throws APIException
     */
    public function create(
        int $appID,
        array|ActionCreateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $definitionID Path param
     * @param array<string,mixed>|ActionUpdateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<PublicActionDefinition>
     *
     * @throws APIException
     */
    public function update(
        string $definitionID,
        array|ActionUpdateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $definitionID Path param
     * @param array<string,mixed>|ActionListParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<Page<PublicActionRevision>>
     *
     * @throws APIException
     */
    public function list(
        string $definitionID,
        array|ActionListParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|ActionDeleteParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function delete(
        string $functionID,
        array|ActionDeleteParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|ActionCompleteParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function complete(
        string $callbackID,
        array|ActionCompleteParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|ActionCompleteBatchParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function completeBatch(
        array|ActionCompleteBatchParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $functionID Path param
     * @param array<string,mixed>|ActionCreateOrReplaceParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<PublicActionFunctionIdentifier>
     *
     * @throws APIException
     */
    public function createOrReplace(
        string $functionID,
        array|ActionCreateOrReplaceParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param FunctionType|string $functionType Path param
     * @param array<string,mixed>|ActionCreateOrReplaceByFunctionTypeParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<PublicActionFunctionIdentifier>
     *
     * @throws APIException
     */
    public function createOrReplaceByFunctionType(
        FunctionType|string $functionType,
        array|ActionCreateOrReplaceByFunctionTypeParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $definitionID Path param
     * @param array<string,mixed>|ActionCreateRequiresObjectParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function createRequiresObject(
        string $definitionID,
        array|ActionCreateRequiresObjectParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|ActionDeleteByFunctionTypeParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function deleteByFunctionType(
        ActionDeleteByFunctionTypeParams\FunctionType|string $functionType,
        array|ActionDeleteByFunctionTypeParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|ActionGetParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<PublicActionRevision>
     *
     * @throws APIException
     */
    public function get(
        string $revisionID,
        array|ActionGetParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|ActionGetByFunctionTypeParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<PublicActionFunction>
     *
     * @throws APIException
     */
    public function getByFunctionType(
        ActionGetByFunctionTypeParams\FunctionType|string $functionType,
        array|ActionGetByFunctionTypeParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|ActionGetRequiresObjectParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<PublicActionDefinitionRequiresObjectResponse>
     *
     * @throws APIException
     */
    public function getRequiresObject(
        string $definitionID,
        array|ActionGetRequiresObjectParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;
}
