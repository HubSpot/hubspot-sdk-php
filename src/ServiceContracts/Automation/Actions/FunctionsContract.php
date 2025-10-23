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
     * @param int $appID
     *
     * @throws APIException
     */
    public function list(
        string $definitionID,
        $appID,
        ?RequestOptions $requestOptions = null
    ): CollectionResponsePublicActionFunctionIdentifierNoPaging;

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
        ?RequestOptions $requestOptions = null,
    ): CollectionResponsePublicActionFunctionIdentifierNoPaging;

    /**
     * @api
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
    ): mixed;

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
        ?RequestOptions $requestOptions = null,
    ): mixed;

    /**
     * @api
     *
     * @param \HubspotSDK\Automation\Actions\Functions\FunctionArchiveByFunctionTypeParams\FunctionType|value-of<\HubspotSDK\Automation\Actions\Functions\FunctionArchiveByFunctionTypeParams\FunctionType> $functionType
     * @param int $appID
     * @param string $definitionID
     *
     * @throws APIException
     */
    public function archiveByFunctionType(
        \HubspotSDK\Automation\Actions\Functions\FunctionArchiveByFunctionTypeParams\FunctionType|string $functionType,
        $appID,
        $definitionID,
        ?RequestOptions $requestOptions = null,
    ): mixed;

    /**
     * @api
     *
     * @param \HubspotSDK\Automation\Actions\Functions\FunctionArchiveByFunctionTypeParams\FunctionType|value-of<\HubspotSDK\Automation\Actions\Functions\FunctionArchiveByFunctionTypeParams\FunctionType> $functionType
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function archiveByFunctionTypeRaw(
        \HubspotSDK\Automation\Actions\Functions\FunctionArchiveByFunctionTypeParams\FunctionType|string $functionType,
        array $params,
        ?RequestOptions $requestOptions = null,
    ): mixed;

    /**
     * @api
     *
     * @param int $appID
     * @param string $definitionID
     * @param \HubspotSDK\Automation\Actions\Functions\FunctionCreateOrReplaceParams\FunctionType|value-of<\HubspotSDK\Automation\Actions\Functions\FunctionCreateOrReplaceParams\FunctionType> $functionType
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
    ): PublicActionFunctionIdentifier;

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
        ?RequestOptions $requestOptions = null,
    ): PublicActionFunctionIdentifier;

    /**
     * @api
     *
     * @param \HubspotSDK\Automation\Actions\Functions\FunctionCreateOrReplaceByFunctionTypeParams\FunctionType|value-of<\HubspotSDK\Automation\Actions\Functions\FunctionCreateOrReplaceByFunctionTypeParams\FunctionType> $functionType
     * @param int $appID
     * @param string $definitionID
     * @param string $body
     *
     * @throws APIException
     */
    public function createOrReplaceByFunctionType(
        \HubspotSDK\Automation\Actions\Functions\FunctionCreateOrReplaceByFunctionTypeParams\FunctionType|string $functionType,
        $appID,
        $definitionID,
        $body,
        ?RequestOptions $requestOptions = null,
    ): PublicActionFunctionIdentifier;

    /**
     * @api
     *
     * @param \HubspotSDK\Automation\Actions\Functions\FunctionCreateOrReplaceByFunctionTypeParams\FunctionType|value-of<\HubspotSDK\Automation\Actions\Functions\FunctionCreateOrReplaceByFunctionTypeParams\FunctionType> $functionType
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function createOrReplaceByFunctionTypeRaw(
        \HubspotSDK\Automation\Actions\Functions\FunctionCreateOrReplaceByFunctionTypeParams\FunctionType|string $functionType,
        array $params,
        ?RequestOptions $requestOptions = null,
    ): PublicActionFunctionIdentifier;

    /**
     * @api
     *
     * @param \HubspotSDK\Automation\Actions\Functions\FunctionGetByFunctionTypeParams\FunctionType|value-of<\HubspotSDK\Automation\Actions\Functions\FunctionGetByFunctionTypeParams\FunctionType> $functionType
     * @param int $appID
     * @param string $definitionID
     *
     * @throws APIException
     */
    public function getByFunctionType(
        \HubspotSDK\Automation\Actions\Functions\FunctionGetByFunctionTypeParams\FunctionType|string $functionType,
        $appID,
        $definitionID,
        ?RequestOptions $requestOptions = null,
    ): PublicActionFunction;

    /**
     * @api
     *
     * @param \HubspotSDK\Automation\Actions\Functions\FunctionGetByFunctionTypeParams\FunctionType|value-of<\HubspotSDK\Automation\Actions\Functions\FunctionGetByFunctionTypeParams\FunctionType> $functionType
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function getByFunctionTypeRaw(
        \HubspotSDK\Automation\Actions\Functions\FunctionGetByFunctionTypeParams\FunctionType|string $functionType,
        array $params,
        ?RequestOptions $requestOptions = null,
    ): PublicActionFunction;

    /**
     * @api
     *
     * @param int $appID
     * @param string $definitionID
     * @param \HubspotSDK\Automation\Actions\Functions\FunctionReadParams\FunctionType|value-of<\HubspotSDK\Automation\Actions\Functions\FunctionReadParams\FunctionType> $functionType
     *
     * @throws APIException
     */
    public function read(
        string $functionID,
        $appID,
        $definitionID,
        $functionType,
        ?RequestOptions $requestOptions = null,
    ): PublicActionFunction;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function readRaw(
        string $functionID,
        array $params,
        ?RequestOptions $requestOptions = null,
    ): PublicActionFunction;
}
