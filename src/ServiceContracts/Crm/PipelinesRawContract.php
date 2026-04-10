<?php

declare(strict_types=1);

namespace HubSpotSDK\ServiceContracts\Crm;

use HubSpotSDK\Core\Contracts\BaseResponse;
use HubSpotSDK\Core\Exceptions\APIException;
use HubSpotSDK\Crm\Pipelines\CollectionResponsePipelineNoPaging;
use HubSpotSDK\Crm\Pipelines\CollectionResponsePipelineStageNoPaging;
use HubSpotSDK\Crm\Pipelines\CollectionResponsePublicAuditInfoNoPaging;
use HubSpotSDK\Crm\Pipelines\Pipeline;
use HubSpotSDK\Crm\Pipelines\PipelineCreateParams;
use HubSpotSDK\Crm\Pipelines\PipelineCreateStageParams;
use HubSpotSDK\Crm\Pipelines\PipelineDeleteParams;
use HubSpotSDK\Crm\Pipelines\PipelineDeleteStageParams;
use HubSpotSDK\Crm\Pipelines\PipelineGetParams;
use HubSpotSDK\Crm\Pipelines\PipelineGetStageParams;
use HubSpotSDK\Crm\Pipelines\PipelineListAuditParams;
use HubSpotSDK\Crm\Pipelines\PipelineListStageAuditParams;
use HubSpotSDK\Crm\Pipelines\PipelineListStagesParams;
use HubSpotSDK\Crm\Pipelines\PipelineStage;
use HubSpotSDK\Crm\Pipelines\PipelineUpdateAllPropertiesParams;
use HubSpotSDK\Crm\Pipelines\PipelineUpdateParams;
use HubSpotSDK\Crm\Pipelines\PipelineUpdateStageAllPropertiesParams;
use HubSpotSDK\Crm\Pipelines\PipelineUpdateStageParams;
use HubSpotSDK\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \HubSpotSDK\RequestOptions
 */
interface PipelinesRawContract
{
    /**
     * @api
     *
     * @param array<string,mixed>|PipelineCreateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<Pipeline>
     *
     * @throws APIException
     */
    public function create(
        string $objectType,
        array|PipelineCreateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $pipelineID Path param
     * @param array<string,mixed>|PipelineUpdateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<Pipeline>
     *
     * @throws APIException
     */
    public function update(
        string $pipelineID,
        array|PipelineUpdateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<CollectionResponsePipelineNoPaging>
     *
     * @throws APIException
     */
    public function list(
        string $objectType,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $pipelineID Path param
     * @param array<string,mixed>|PipelineDeleteParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function delete(
        string $pipelineID,
        array|PipelineDeleteParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $pipelineID Path param
     * @param array<string,mixed>|PipelineCreateStageParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<PipelineStage>
     *
     * @throws APIException
     */
    public function createStage(
        string $pipelineID,
        array|PipelineCreateStageParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|PipelineDeleteStageParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function deleteStage(
        string $stageID,
        array|PipelineDeleteStageParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|PipelineGetParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<Pipeline>
     *
     * @throws APIException
     */
    public function get(
        string $pipelineID,
        array|PipelineGetParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|PipelineGetStageParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<PipelineStage>
     *
     * @throws APIException
     */
    public function getStage(
        string $stageID,
        array|PipelineGetStageParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|PipelineListAuditParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<CollectionResponsePublicAuditInfoNoPaging>
     *
     * @throws APIException
     */
    public function listAudit(
        string $pipelineID,
        array|PipelineListAuditParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|PipelineListStageAuditParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<CollectionResponsePublicAuditInfoNoPaging>
     *
     * @throws APIException
     */
    public function listStageAudit(
        string $stageID,
        array|PipelineListStageAuditParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|PipelineListStagesParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<CollectionResponsePipelineStageNoPaging>
     *
     * @throws APIException
     */
    public function listStages(
        string $pipelineID,
        array|PipelineListStagesParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $pipelineID Path param
     * @param array<string,mixed>|PipelineUpdateAllPropertiesParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<Pipeline>
     *
     * @throws APIException
     */
    public function updateAllProperties(
        string $pipelineID,
        array|PipelineUpdateAllPropertiesParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $stageID Path param
     * @param array<string,mixed>|PipelineUpdateStageParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<PipelineStage>
     *
     * @throws APIException
     */
    public function updateStage(
        string $stageID,
        array|PipelineUpdateStageParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $stageID Path param
     * @param array<string,mixed>|PipelineUpdateStageAllPropertiesParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<PipelineStage>
     *
     * @throws APIException
     */
    public function updateStageAllProperties(
        string $stageID,
        array|PipelineUpdateStageAllPropertiesParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;
}
