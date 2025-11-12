<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\Crm;

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

interface PipelinesContract
{
    /**
     * @api
     *
     * @param array<mixed>|PipelineCreateParams $params
     *
     * @throws APIException
     */
    public function create(
        string $objectType,
        array|PipelineCreateParams $params,
        ?RequestOptions $requestOptions = null,
    ): Pipeline;

    /**
     * @api
     *
     * @param array<mixed>|PipelineUpdateParams $params
     *
     * @throws APIException
     */
    public function update(
        string $pipelineID,
        array|PipelineUpdateParams $params,
        ?RequestOptions $requestOptions = null,
    ): Pipeline;

    /**
     * @api
     *
     * @throws APIException
     */
    public function list(
        string $objectType,
        ?RequestOptions $requestOptions = null
    ): CollectionResponsePipelineNoPaging;

    /**
     * @api
     *
     * @param array<mixed>|PipelineDeleteParams $params
     *
     * @throws APIException
     */
    public function delete(
        string $pipelineID,
        array|PipelineDeleteParams $params,
        ?RequestOptions $requestOptions = null,
    ): mixed;

    /**
     * @api
     *
     * @param array<mixed>|PipelineGetParams $params
     *
     * @throws APIException
     */
    public function get(
        string $pipelineID,
        array|PipelineGetParams $params,
        ?RequestOptions $requestOptions = null,
    ): Pipeline;

    /**
     * @api
     *
     * @param array<mixed>|PipelineGetAuditParams $params
     *
     * @throws APIException
     */
    public function getAudit(
        string $pipelineID,
        array|PipelineGetAuditParams $params,
        ?RequestOptions $requestOptions = null,
    ): CollectionResponsePublicAuditInfoNoPaging;

    /**
     * @api
     *
     * @param array<mixed>|PipelineReplaceParams $params
     *
     * @throws APIException
     */
    public function replace(
        string $pipelineID,
        array|PipelineReplaceParams $params,
        ?RequestOptions $requestOptions = null,
    ): Pipeline;
}
