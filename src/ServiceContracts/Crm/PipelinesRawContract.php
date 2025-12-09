<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\Crm;

use HubspotSDK\Core\Contracts\BaseResponse;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Crm\Pipelines\CollectionResponsePipelineNoPaging;
use HubspotSDK\Crm\Pipelines\CollectionResponsePublicAuditInfoNoPaging;
use HubspotSDK\Crm\Pipelines\Pipeline;
use HubspotSDK\Crm\Pipelines\PipelineCreateParams;
use HubspotSDK\Crm\Pipelines\PipelineDeleteParams;
use HubspotSDK\Crm\Pipelines\PipelineGetAuditParams;
use HubspotSDK\Crm\Pipelines\PipelineGetParams;
use HubspotSDK\Crm\Pipelines\PipelineReplaceParams;
use HubspotSDK\Crm\Pipelines\PipelineUpdateParams;
use HubspotSDK\RequestOptions;

interface PipelinesRawContract
{
    /**
     * @api
     *
     * @param string $objectType The object type of the pipeline being created (ex. deals or tickets)
     * @param array<mixed>|PipelineCreateParams $params
     *
     * @return BaseResponse<Pipeline>
     *
     * @throws APIException
     */
    public function create(
        string $objectType,
        array|PipelineCreateParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $pipelineID path param: The unique identifier of the pipeline to be updated
     * @param array<mixed>|PipelineUpdateParams $params
     *
     * @return BaseResponse<Pipeline>
     *
     * @throws APIException
     */
    public function update(
        string $pipelineID,
        array|PipelineUpdateParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $objectType The object type of the pipelines being retrieved (ex. deals or tickets)
     *
     * @return BaseResponse<CollectionResponsePipelineNoPaging>
     *
     * @throws APIException
     */
    public function list(
        string $objectType,
        ?RequestOptions $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $pipelineID path param: The unique identifier of the pipeline to be deleted
     * @param array<mixed>|PipelineDeleteParams $params
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function delete(
        string $pipelineID,
        array|PipelineDeleteParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $pipelineID the unique identifier of the pipeline to be retrieved
     * @param array<mixed>|PipelineGetParams $params
     *
     * @return BaseResponse<Pipeline>
     *
     * @throws APIException
     */
    public function get(
        string $pipelineID,
        array|PipelineGetParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $pipelineID the unique identifier for the pipeline whose audit history is being retrieved
     * @param array<mixed>|PipelineGetAuditParams $params
     *
     * @return BaseResponse<CollectionResponsePublicAuditInfoNoPaging>
     *
     * @throws APIException
     */
    public function getAudit(
        string $pipelineID,
        array|PipelineGetAuditParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $pipelineID path param: The unique identifier of the pipeline to be replaced
     * @param array<mixed>|PipelineReplaceParams $params
     *
     * @return BaseResponse<Pipeline>
     *
     * @throws APIException
     */
    public function replace(
        string $pipelineID,
        array|PipelineReplaceParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;
}
