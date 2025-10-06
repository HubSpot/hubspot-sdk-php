<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\CRM;

use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\CRM\Pipelines\CollectionResponsePipelineNoPaging;
use HubspotSDK\CRM\Pipelines\CollectionResponsePublicAuditInfoNoPaging;
use HubspotSDK\CRM\Pipelines\Pipeline;
use HubspotSDK\CRM\Pipelines\PipelineStage;
use HubspotSDK\CRM\Pipelines\PipelineStageInput;
use HubspotSDK\RequestOptions;

use const HubspotSDK\Core\OMIT as omit;

interface PipelinesContract
{
    /**
     * @api
     *
     * @param int $displayOrder
     * @param string $label
     * @param list<PipelineStageInput> $stages
     *
     * @throws APIException
     */
    public function create(
        string $objectType,
        $displayOrder,
        $label,
        $stages,
        ?RequestOptions $requestOptions = null,
    ): Pipeline;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function createRaw(
        string $objectType,
        array $params,
        ?RequestOptions $requestOptions = null,
    ): Pipeline;

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
    ): PipelineStage;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function updateRaw(
        string $stageID,
        array $params,
        ?RequestOptions $requestOptions = null
    ): PipelineStage;

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
     * @throws APIException
     */
    public function getAudit(
        string $pipelineID,
        $objectType,
        ?RequestOptions $requestOptions = null
    ): CollectionResponsePublicAuditInfoNoPaging;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function getAuditRaw(
        string $pipelineID,
        array $params,
        ?RequestOptions $requestOptions = null,
    ): CollectionResponsePublicAuditInfoNoPaging;

    /**
     * @api
     *
     * @param string $objectType
     * @param string $pipelineID
     *
     * @throws APIException
     */
    public function read(
        string $stageID,
        $objectType,
        $pipelineID,
        ?RequestOptions $requestOptions = null,
    ): PipelineStage;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function readRaw(
        string $stageID,
        array $params,
        ?RequestOptions $requestOptions = null
    ): PipelineStage;

    /**
     * @api
     *
     * @param string $objectType
     * @param string $pipelineID
     * @param int $displayOrder
     * @param string $label
     * @param array<string, string> $metadata
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
    ): PipelineStage;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function replaceRaw(
        string $stageID,
        array $params,
        ?RequestOptions $requestOptions = null
    ): PipelineStage;
}
