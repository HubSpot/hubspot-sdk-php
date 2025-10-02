<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\CRM;

use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Core\Implementation\HasRawResponse;
use HubspotSDK\CRM\Pipelines\CRMPipelinesCollectionResponsePipelineNoPaging;
use HubspotSDK\CRM\Pipelines\CRMPipelinesCollectionResponsePublicAuditInfoNoPaging;
use HubspotSDK\CRM\Pipelines\CRMPipelinesPipeline;
use HubspotSDK\CRM\Pipelines\CRMPipelinesPipelineStage;
use HubspotSDK\CRM\Pipelines\CRMPipelinesPipelineStageInput;
use HubspotSDK\RequestOptions;

use const HubspotSDK\Core\OMIT as omit;

interface PipelinesContract
{
    /**
     * @api
     *
     * @param int $displayOrder
     * @param string $label
     * @param list<CRMPipelinesPipelineStageInput> $stages
     *
     * @return CRMPipelinesPipeline<HasRawResponse>
     *
     * @throws APIException
     */
    public function create(
        string $objectType,
        $displayOrder,
        $label,
        $stages,
        ?RequestOptions $requestOptions = null,
    ): CRMPipelinesPipeline;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @return CRMPipelinesPipeline<HasRawResponse>
     *
     * @throws APIException
     */
    public function createRaw(
        string $objectType,
        array $params,
        ?RequestOptions $requestOptions = null,
    ): CRMPipelinesPipeline;

    /**
     * @api
     *
     * @param string $objectType
     * @param string $pipelineID
     * @param bool $archived
     * @param int $displayOrder
     * @param string $label
     * @param array<string, string> $metadata
     *
     * @return CRMPipelinesPipelineStage<HasRawResponse>
     *
     * @throws APIException
     */
    public function update(
        string $stageID,
        $objectType,
        $pipelineID,
        $archived = omit,
        $displayOrder = omit,
        $label = omit,
        $metadata = omit,
        ?RequestOptions $requestOptions = null,
    ): CRMPipelinesPipelineStage;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @return CRMPipelinesPipelineStage<HasRawResponse>
     *
     * @throws APIException
     */
    public function updateRaw(
        string $stageID,
        array $params,
        ?RequestOptions $requestOptions = null
    ): CRMPipelinesPipelineStage;

    /**
     * @api
     *
     * @return CRMPipelinesCollectionResponsePipelineNoPaging<HasRawResponse>
     *
     * @throws APIException
     */
    public function list(
        string $objectType,
        ?RequestOptions $requestOptions = null
    ): CRMPipelinesCollectionResponsePipelineNoPaging;

    /**
     * @api
     *
     * @return CRMPipelinesCollectionResponsePipelineNoPaging<HasRawResponse>
     *
     * @throws APIException
     */
    public function listRaw(
        string $objectType,
        mixed $params,
        ?RequestOptions $requestOptions = null,
    ): CRMPipelinesCollectionResponsePipelineNoPaging;

    /**
     * @api
     *
     * @param string $objectType
     * @param string $pipelineID
     *
     * @throws APIException
     */
    public function delete(
        string $stageID,
        $objectType,
        $pipelineID,
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
        string $stageID,
        array $params,
        ?RequestOptions $requestOptions = null
    ): mixed;

    /**
     * @api
     *
     * @param string $objectType
     *
     * @return CRMPipelinesCollectionResponsePublicAuditInfoNoPaging<HasRawResponse>
     *
     * @throws APIException
     */
    public function getAudit(
        string $pipelineID,
        $objectType,
        ?RequestOptions $requestOptions = null
    ): CRMPipelinesCollectionResponsePublicAuditInfoNoPaging;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @return CRMPipelinesCollectionResponsePublicAuditInfoNoPaging<HasRawResponse>
     *
     * @throws APIException
     */
    public function getAuditRaw(
        string $pipelineID,
        array $params,
        ?RequestOptions $requestOptions = null,
    ): CRMPipelinesCollectionResponsePublicAuditInfoNoPaging;

    /**
     * @api
     *
     * @param string $objectType
     * @param string $pipelineID
     *
     * @return CRMPipelinesPipelineStage<HasRawResponse>
     *
     * @throws APIException
     */
    public function read(
        string $stageID,
        $objectType,
        $pipelineID,
        ?RequestOptions $requestOptions = null,
    ): CRMPipelinesPipelineStage;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @return CRMPipelinesPipelineStage<HasRawResponse>
     *
     * @throws APIException
     */
    public function readRaw(
        string $stageID,
        array $params,
        ?RequestOptions $requestOptions = null
    ): CRMPipelinesPipelineStage;

    /**
     * @api
     *
     * @param string $objectType
     * @param string $pipelineID
     * @param int $displayOrder
     * @param string $label
     * @param array<string, string> $metadata
     *
     * @return CRMPipelinesPipelineStage<HasRawResponse>
     *
     * @throws APIException
     */
    public function replace(
        string $stageID,
        $objectType,
        $pipelineID,
        $displayOrder,
        $label,
        $metadata = omit,
        ?RequestOptions $requestOptions = null,
    ): CRMPipelinesPipelineStage;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @return CRMPipelinesPipelineStage<HasRawResponse>
     *
     * @throws APIException
     */
    public function replaceRaw(
        string $stageID,
        array $params,
        ?RequestOptions $requestOptions = null
    ): CRMPipelinesPipelineStage;
}
