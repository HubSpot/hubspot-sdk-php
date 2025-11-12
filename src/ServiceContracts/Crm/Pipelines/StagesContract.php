<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\Crm\Pipelines;

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

interface StagesContract
{
    /**
     * @api
     *
     * @param array<mixed>|StageCreateParams $params
     *
     * @throws APIException
     */
    public function create(
        string $pipelineID,
        array|StageCreateParams $params,
        ?RequestOptions $requestOptions = null,
    ): PipelineStage;

    /**
     * @api
     *
     * @param array<mixed>|StageUpdateParams $params
     *
     * @throws APIException
     */
    public function update(
        string $stageID,
        array|StageUpdateParams $params,
        ?RequestOptions $requestOptions = null,
    ): PipelineStage;

    /**
     * @api
     *
     * @param array<mixed>|StageListParams $params
     *
     * @throws APIException
     */
    public function list(
        string $pipelineID,
        array|StageListParams $params,
        ?RequestOptions $requestOptions = null,
    ): CollectionResponsePipelineStageNoPaging;

    /**
     * @api
     *
     * @param array<mixed>|StageDeleteParams $params
     *
     * @throws APIException
     */
    public function delete(
        string $stageID,
        array|StageDeleteParams $params,
        ?RequestOptions $requestOptions = null,
    ): mixed;

    /**
     * @api
     *
     * @param array<mixed>|StageGetParams $params
     *
     * @throws APIException
     */
    public function get(
        string $stageID,
        array|StageGetParams $params,
        ?RequestOptions $requestOptions = null,
    ): PipelineStage;

    /**
     * @api
     *
     * @param array<mixed>|StageGetAuditParams $params
     *
     * @throws APIException
     */
    public function getAudit(
        string $stageID,
        array|StageGetAuditParams $params,
        ?RequestOptions $requestOptions = null,
    ): CollectionResponsePublicAuditInfoNoPaging;

    /**
     * @api
     *
     * @param array<mixed>|StageReplaceParams $params
     *
     * @throws APIException
     */
    public function replace(
        string $stageID,
        array|StageReplaceParams $params,
        ?RequestOptions $requestOptions = null,
    ): PipelineStage;
}
