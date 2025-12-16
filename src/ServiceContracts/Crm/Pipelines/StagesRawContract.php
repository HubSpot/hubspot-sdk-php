<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\Crm\Pipelines;

use HubspotSDK\Core\Contracts\BaseResponse;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Crm\Pipelines\CollectionResponsePipelineStageNoPaging;
use HubspotSDK\Crm\Pipelines\CollectionResponsePublicAuditInfoNoPaging;
use HubspotSDK\Crm\Pipelines\PipelineStage;
use HubspotSDK\Crm\Pipelines\Stages\StageCreateParams;
use HubspotSDK\Crm\Pipelines\Stages\StageDeleteParams;
use HubspotSDK\Crm\Pipelines\Stages\StageGetAuditParams;
use HubspotSDK\Crm\Pipelines\Stages\StageGetParams;
use HubspotSDK\Crm\Pipelines\Stages\StageListParams;
use HubspotSDK\Crm\Pipelines\Stages\StageReplaceParams;
use HubspotSDK\Crm\Pipelines\Stages\StageUpdateParams;
use HubspotSDK\RequestOptions;

interface StagesRawContract
{
    /**
     * @api
     *
     * @param string $pipelineID path param: The unique identifier of the pipeline to which the stage will be added
     * @param array<string,mixed>|StageCreateParams $params
     *
     * @return BaseResponse<PipelineStage>
     *
     * @throws APIException
     */
    public function create(
        string $pipelineID,
        array|StageCreateParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $stageID path param: The unique identifier of the stage to be updated in the pipeline
     * @param array<string,mixed>|StageUpdateParams $params
     *
     * @return BaseResponse<PipelineStage>
     *
     * @throws APIException
     */
    public function update(
        string $stageID,
        array|StageUpdateParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $pipelineID the unique identifier of the pipeline whose stages are being retrieved
     * @param array<string,mixed>|StageListParams $params
     *
     * @return BaseResponse<CollectionResponsePipelineStageNoPaging>
     *
     * @throws APIException
     */
    public function list(
        string $pipelineID,
        array|StageListParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $stageID the unique identifier of the stage to be deleted from the pipeline
     * @param array<string,mixed>|StageDeleteParams $params
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function delete(
        string $stageID,
        array|StageDeleteParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $stageID the unique identifier of the stage to be retrieved from the pipeline
     * @param array<string,mixed>|StageGetParams $params
     *
     * @return BaseResponse<PipelineStage>
     *
     * @throws APIException
     */
    public function get(
        string $stageID,
        array|StageGetParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $stageID the unique identifier for the pipeline stage being audited
     * @param array<string,mixed>|StageGetAuditParams $params
     *
     * @return BaseResponse<CollectionResponsePublicAuditInfoNoPaging>
     *
     * @throws APIException
     */
    public function getAudit(
        string $stageID,
        array|StageGetAuditParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $stageID path param: The unique identifier of the stage to be replaced in the pipeline
     * @param array<string,mixed>|StageReplaceParams $params
     *
     * @return BaseResponse<PipelineStage>
     *
     * @throws APIException
     */
    public function replace(
        string $stageID,
        array|StageReplaceParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;
}
