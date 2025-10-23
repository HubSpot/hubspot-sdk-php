<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\CRM\Pipelines;

use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\CRM\Pipelines\CollectionResponsePipelineStageNoPaging;
use HubspotSDK\CRM\Pipelines\CollectionResponsePublicAuditInfoNoPaging;
use HubspotSDK\CRM\Pipelines\PipelineStage;
use HubspotSDK\RequestOptions;

use const HubspotSDK\Core\OMIT as omit;

interface StagesContract
{
    /**
     * @api
     *
     * @param string $objectType
     * @param int $displayOrder The order for displaying this pipeline stage. If two pipeline stages have a matching `displayOrder`, they will be sorted alphabetically by label.
     * @param string $label A label used to organize pipeline stages in HubSpot's UI. Each pipeline stage's label must be unique within that pipeline.
     * @param array<string,
     * string,> $metadata A JSON object containing properties that are not present on all object pipelines.
     *
     * For `deals` pipelines, the `probability` field is required (`{ "probability": 0.5 }`), and represents the likelihood a deal will close. Possible values are between 0.0 and 1.0 in increments of 0.1.
     *
     * For `tickets` pipelines, the `ticketState` field is optional (`{ "ticketState": "OPEN" }`), and represents whether the ticket remains open or has been closed by a member of your Support team. Possible values are `OPEN` or `CLOSED`.
     *
     * @throws APIException
     */
    public function create(
        string $pipelineID,
        $objectType,
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
    public function createRaw(
        string $pipelineID,
        array $params,
        ?RequestOptions $requestOptions = null,
    ): PipelineStage;

    /**
     * @api
     *
     * @param string $objectType
     * @param string $pipelineID
     * @param bool $archived whether the pipeline is archived
     * @param int $displayOrder The order for displaying this pipeline stage. If two pipeline stages have a matching `displayOrder`, they will be sorted alphabetically by label.
     * @param string $label A label used to organize pipeline stages in HubSpot's UI. Each pipeline stage's label must be unique within that pipeline.
     * @param array<string,
     * string,> $metadata A JSON object containing properties that are not present on all object pipelines.
     *
     * For `deals` pipelines, the `probability` field is required (`{ "probability": 0.5 }`), and represents the likelihood a deal will close. Possible values are between 0.0 and 1.0 in increments of 0.1.
     *
     * For `tickets` pipelines, the `ticketState` field is optional (`{ "ticketState": "OPEN" }`), and represents whether the ticket remains open or has been closed by a member of your Support team. Possible values are `OPEN` or `CLOSED`.
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
     * @param string $objectType
     *
     * @throws APIException
     */
    public function list(
        string $pipelineID,
        $objectType,
        ?RequestOptions $requestOptions = null
    ): CollectionResponsePipelineStageNoPaging;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function listRaw(
        string $pipelineID,
        array $params,
        ?RequestOptions $requestOptions = null,
    ): CollectionResponsePipelineStageNoPaging;

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
     * @param string $pipelineID
     *
     * @throws APIException
     */
    public function get(
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
    public function getRaw(
        string $stageID,
        array $params,
        ?RequestOptions $requestOptions = null
    ): PipelineStage;

    /**
     * @api
     *
     * @param string $objectType
     * @param string $pipelineID
     *
     * @throws APIException
     */
    public function getAudit(
        string $stageID,
        $objectType,
        $pipelineID,
        ?RequestOptions $requestOptions = null,
    ): CollectionResponsePublicAuditInfoNoPaging;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function getAuditRaw(
        string $stageID,
        array $params,
        ?RequestOptions $requestOptions = null
    ): CollectionResponsePublicAuditInfoNoPaging;

    /**
     * @api
     *
     * @param string $objectType
     * @param string $pipelineID
     * @param int $displayOrder The order for displaying this pipeline stage. If two pipeline stages have a matching `displayOrder`, they will be sorted alphabetically by label.
     * @param string $label A label used to organize pipeline stages in HubSpot's UI. Each pipeline stage's label must be unique within that pipeline.
     * @param array<string,
     * string,> $metadata A JSON object containing properties that are not present on all object pipelines.
     *
     * For `deals` pipelines, the `probability` field is required (`{ "probability": 0.5 }`), and represents the likelihood a deal will close. Possible values are between 0.0 and 1.0 in increments of 0.1.
     *
     * For `tickets` pipelines, the `ticketState` field is optional (`{ "ticketState": "OPEN" }`), and represents whether the ticket remains open or has been closed by a member of your Support team. Possible values are `OPEN` or `CLOSED`.
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
