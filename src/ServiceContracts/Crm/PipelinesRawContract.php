<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\Crm;

use HubspotSDK\Core\Contracts\BaseResponse;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Crm\Pipelines\CollectionResponsePipelineStageNoPaging;
use HubspotSDK\Crm\Pipelines\CollectionResponsePublicAuditInfoNoPaging;
use HubspotSDK\Crm\Pipelines\PipelineCreateParams;
use HubspotSDK\Crm\Pipelines\PipelineDeleteParams;
use HubspotSDK\Crm\Pipelines\PipelineGetAuditParams;
use HubspotSDK\Crm\Pipelines\PipelineGetParams;
use HubspotSDK\Crm\Pipelines\PipelineListParams;
use HubspotSDK\Crm\Pipelines\PipelineReplaceParams;
use HubspotSDK\Crm\Pipelines\PipelineStage;
use HubspotSDK\Crm\Pipelines\PipelineUpdateParams;
use HubspotSDK\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \HubspotSDK\RequestOptions
 */
interface PipelinesRawContract
{
    /**
     * @api
     *
     * @param string $pipelineID Path param
     * @param array<string,mixed>|PipelineCreateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<PipelineStage>
     *
     * @throws APIException
     */
    public function create(
        string $pipelineID,
        array|PipelineCreateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $stageID Path param
     * @param array<string,mixed>|PipelineUpdateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<PipelineStage>
     *
     * @throws APIException
     */
    public function update(
        string $stageID,
        array|PipelineUpdateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|PipelineListParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<CollectionResponsePipelineStageNoPaging>
     *
     * @throws APIException
     */
    public function list(
        string $pipelineID,
        array|PipelineListParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|PipelineDeleteParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function delete(
        string $stageID,
        array|PipelineDeleteParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|PipelineGetParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<PipelineStage>
     *
     * @throws APIException
     */
    public function get(
        string $stageID,
        array|PipelineGetParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|PipelineGetAuditParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<CollectionResponsePublicAuditInfoNoPaging>
     *
     * @throws APIException
     */
    public function getAudit(
        string $stageID,
        array|PipelineGetAuditParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $stageID Path param
     * @param array<string,mixed>|PipelineReplaceParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<PipelineStage>
     *
     * @throws APIException
     */
    public function replace(
        string $stageID,
        array|PipelineReplaceParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;
}
