<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\Crm\Pipelines;

use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Crm\Pipelines\CollectionResponsePipelineStageNoPaging;
use HubspotSDK\Crm\Pipelines\CollectionResponsePublicAuditInfoNoPaging;
use HubspotSDK\Crm\Pipelines\PipelineStage;
use HubspotSDK\RequestOptions;

interface StagesContract
{
    /**
     * @api
     *
     * @param string $pipelineID path param: The unique identifier of the pipeline to which the stage will be added
     * @param string $objectType Path param: The object type of the stage being created (ex. deals or tickets)
     * @param int $displayOrder Body param: The order for displaying this pipeline stage. If two pipeline stages have a matching `displayOrder`, they will be sorted alphabetically by label.
     * @param string $label Body param: A label used to organize pipeline stages in HubSpot's UI. Each pipeline stage's label must be unique within that pipeline.
     * @param array<string,string> $metadata Body param: A JSON object containing properties that are not present on all object pipelines.
     *
     * For `deals` pipelines, the `probability` field is required (`{ "probability": 0.5 }`), and represents the likelihood a deal will close. Possible values are between 0.0 and 1.0 in increments of 0.1.
     *
     * For `tickets` pipelines, the `ticketState` field is optional (`{ "ticketState": "OPEN" }`), and represents whether the ticket remains open or has been closed by a member of your Support team. Possible values are `OPEN` or `CLOSED`.
     *
     * @throws APIException
     */
    public function create(
        string $pipelineID,
        string $objectType,
        int $displayOrder,
        string $label,
        array $metadata,
        ?RequestOptions $requestOptions = null,
    ): PipelineStage;

    /**
     * @api
     *
     * @param string $stageID path param: The unique identifier of the stage to be updated in the pipeline
     * @param string $objectType Path param: The object type of the stage being updated (ex. deals or tickets)
     * @param string $pipelineID path param: The unique identifier of the pipeline containing the stage to be updated
     * @param array<string,string> $metadata Body param: A JSON object containing properties that are not present on all object pipelines.
     *
     * For `deals` pipelines, the `probability` field is required (`{ "probability": 0.5 }`), and represents the likelihood a deal will close. Possible values are between 0.0 and 1.0 in increments of 0.1.
     *
     * For `tickets` pipelines, the `ticketState` field is optional (`{ "ticketState": "OPEN" }`), and represents whether the ticket remains open or has been closed by a member of your Support team. Possible values are `OPEN` or `CLOSED`.
     * @param bool $archived body param: Whether the pipeline is archived
     * @param int $displayOrder Body param: The order for displaying this pipeline stage. If two pipeline stages have a matching `displayOrder`, they will be sorted alphabetically by label.
     * @param string $label Body param: A label used to organize pipeline stages in HubSpot's UI. Each pipeline stage's label must be unique within that pipeline.
     *
     * @throws APIException
     */
    public function update(
        string $stageID,
        string $objectType,
        string $pipelineID,
        array $metadata,
        ?bool $archived = null,
        ?int $displayOrder = null,
        ?string $label = null,
        ?RequestOptions $requestOptions = null,
    ): PipelineStage;

    /**
     * @api
     *
     * @param string $pipelineID the unique identifier of the pipeline whose stages are being retrieved
     * @param string $objectType The object type of the stages being retrieved (ex. deals or tickets)
     *
     * @throws APIException
     */
    public function list(
        string $pipelineID,
        string $objectType,
        ?RequestOptions $requestOptions = null,
    ): CollectionResponsePipelineStageNoPaging;

    /**
     * @api
     *
     * @param string $stageID the unique identifier of the stage to be deleted from the pipeline
     * @param string $objectType The object type of the stage being deleted (ex. deals or tickets)
     * @param string $pipelineID the unique identifier of the pipeline from which the stage will be deleted
     *
     * @throws APIException
     */
    public function delete(
        string $stageID,
        string $objectType,
        string $pipelineID,
        ?RequestOptions $requestOptions = null,
    ): mixed;

    /**
     * @api
     *
     * @param string $stageID the unique identifier of the stage to be retrieved from the pipeline
     * @param string $objectType The object type of the stage being retrieved (ex. deals or tickets)
     * @param string $pipelineID the unique identifier of the pipeline containing the stage to be retrieved
     *
     * @throws APIException
     */
    public function get(
        string $stageID,
        string $objectType,
        string $pipelineID,
        ?RequestOptions $requestOptions = null,
    ): PipelineStage;

    /**
     * @api
     *
     * @param string $stageID the unique identifier for the pipeline stage being audited
     * @param string $objectType The object type of the stage audit being retrieved (ex. deals or tickets)
     *
     * @throws APIException
     */
    public function getAudit(
        string $stageID,
        string $objectType,
        string $pipelineID,
        ?RequestOptions $requestOptions = null,
    ): CollectionResponsePublicAuditInfoNoPaging;

    /**
     * @api
     *
     * @param string $stageID path param: The unique identifier of the stage to be replaced in the pipeline
     * @param string $objectType Path param: The object type of the pipeline being updated (ex. deals or tickets)
     * @param string $pipelineID path param: The unique identifier of the pipeline to which the stage belongs
     * @param int $displayOrder Body param: The order for displaying this pipeline stage. If two pipeline stages have a matching `displayOrder`, they will be sorted alphabetically by label.
     * @param string $label Body param: A label used to organize pipeline stages in HubSpot's UI. Each pipeline stage's label must be unique within that pipeline.
     * @param array<string,string> $metadata Body param: A JSON object containing properties that are not present on all object pipelines.
     *
     * For `deals` pipelines, the `probability` field is required (`{ "probability": 0.5 }`), and represents the likelihood a deal will close. Possible values are between 0.0 and 1.0 in increments of 0.1.
     *
     * For `tickets` pipelines, the `ticketState` field is optional (`{ "ticketState": "OPEN" }`), and represents whether the ticket remains open or has been closed by a member of your Support team. Possible values are `OPEN` or `CLOSED`.
     *
     * @throws APIException
     */
    public function replace(
        string $stageID,
        string $objectType,
        string $pipelineID,
        int $displayOrder,
        string $label,
        array $metadata,
        ?RequestOptions $requestOptions = null,
    ): PipelineStage;
}
