<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\Crm;

use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Crm\Pipelines\CollectionResponsePipelineNoPaging;
use HubspotSDK\Crm\Pipelines\CollectionResponsePipelineStageNoPaging;
use HubspotSDK\Crm\Pipelines\CollectionResponsePublicAuditInfoNoPaging;
use HubspotSDK\Crm\Pipelines\Pipeline;
use HubspotSDK\Crm\Pipelines\PipelineStage;
use HubspotSDK\Crm\Pipelines\PipelineStageInput;
use HubspotSDK\RequestOptions;

/**
 * @phpstan-import-type PipelineStageInputShape from \HubspotSDK\Crm\Pipelines\PipelineStageInput
 * @phpstan-import-type RequestOpts from \HubspotSDK\RequestOptions
 */
interface PipelinesContract
{
    /**
     * @api
     *
     * @param int $displayOrder The order for displaying this pipeline. If two pipelines have a matching `displayOrder`, they will be sorted alphabetically by label.
     * @param string $label A unique label used to organize pipelines in HubSpot's UI
     * @param list<PipelineStageInput|PipelineStageInputShape> $stages pipeline stage inputs used to create the new or replacement pipeline
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function create(
        string $objectType,
        int $displayOrder,
        string $label,
        array $stages,
        ?string $pipelineID = null,
        RequestOptions|array|null $requestOptions = null,
    ): Pipeline;

    /**
     * @api
     *
     * @param string $pipelineID Path param
     * @param string $objectType Path param
     * @param bool $validateDealStageUsagesBeforeDelete Query param
     * @param bool $validateReferencesBeforeDelete Query param
     * @param bool $archived Body param: Whether the pipeline is archived. This property should only be provided when restoring an archived pipeline. If it's provided in any other call, the request will fail and a `400 Bad Request` will be returned.
     * @param int $displayOrder Body param: The order for displaying this pipeline. If two pipelines have a matching `displayOrder`, they will be sorted alphabetically by label.
     * @param string $label Body param: A unique label used to organize pipelines in HubSpot's UI
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function update(
        string $pipelineID,
        string $objectType,
        bool $validateDealStageUsagesBeforeDelete = false,
        bool $validateReferencesBeforeDelete = false,
        ?bool $archived = null,
        ?int $displayOrder = null,
        ?string $label = null,
        RequestOptions|array|null $requestOptions = null,
    ): Pipeline;

    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function list(
        string $objectType,
        RequestOptions|array|null $requestOptions = null
    ): CollectionResponsePipelineNoPaging;

    /**
     * @api
     *
     * @param string $pipelineID Path param
     * @param string $objectType Path param
     * @param bool $validateDealStageUsagesBeforeDelete Query param
     * @param bool $validateReferencesBeforeDelete Query param
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function delete(
        string $pipelineID,
        string $objectType,
        bool $validateDealStageUsagesBeforeDelete = false,
        bool $validateReferencesBeforeDelete = false,
        RequestOptions|array|null $requestOptions = null,
    ): mixed;

    /**
     * @api
     *
     * @param string $pipelineID Path param
     * @param string $objectType Path param
     * @param int $displayOrder Body param: The order for displaying this pipeline stage. If two pipeline stages have a matching `displayOrder`, they will be sorted alphabetically by label.
     * @param string $label Body param: A label used to organize pipeline stages in HubSpot's UI. Each pipeline stage's label must be unique within that pipeline.
     * @param array<string,string> $metadata Body param: A JSON object containing properties that are not present on all object pipelines.
     *
     * For `deals` pipelines, the `probability` field is required (`{ "probability": 0.5 }`), and represents the likelihood a deal will close. Possible values are between 0.0 and 1.0 in increments of 0.1.
     *
     * For `tickets` pipelines, the `ticketState` field is optional (`{ "ticketState": "OPEN" }`), and represents whether the ticket remains open or has been closed by a member of your Support team. Possible values are `OPEN` or `CLOSED`.
     * @param string $stageID Body param
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function createStage(
        string $pipelineID,
        string $objectType,
        int $displayOrder,
        string $label,
        array $metadata,
        ?string $stageID = null,
        RequestOptions|array|null $requestOptions = null,
    ): PipelineStage;

    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function deleteStage(
        string $stageID,
        string $objectType,
        string $pipelineID,
        RequestOptions|array|null $requestOptions = null,
    ): mixed;

    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function get(
        string $pipelineID,
        string $objectType,
        RequestOptions|array|null $requestOptions = null,
    ): Pipeline;

    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function getStage(
        string $stageID,
        string $objectType,
        string $pipelineID,
        RequestOptions|array|null $requestOptions = null,
    ): PipelineStage;

    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function listAudit(
        string $pipelineID,
        string $objectType,
        RequestOptions|array|null $requestOptions = null,
    ): CollectionResponsePublicAuditInfoNoPaging;

    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function listStageAudit(
        string $stageID,
        string $objectType,
        string $pipelineID,
        RequestOptions|array|null $requestOptions = null,
    ): CollectionResponsePublicAuditInfoNoPaging;

    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function listStages(
        string $pipelineID,
        string $objectType,
        RequestOptions|array|null $requestOptions = null,
    ): CollectionResponsePipelineStageNoPaging;

    /**
     * @api
     *
     * @param string $pipelineID Path param
     * @param string $objectType Path param
     * @param int $displayOrder Body param: The order for displaying this pipeline stage. If two pipeline stages have a matching `displayOrder`, they will be sorted alphabetically by label.
     * @param string $label Body param: A label used to organize pipeline stages in HubSpot's UI. Each pipeline stage's label must be unique within that pipeline.
     * @param list<PipelineStageInput|PipelineStageInputShape> $stages Body param: The stages associated with the pipeline. They can be retrieved and updated via the pipeline stages endpoints.
     * @param bool $validateDealStageUsagesBeforeDelete Query param
     * @param bool $validateReferencesBeforeDelete Query param
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function updateAllProperties(
        string $pipelineID,
        string $objectType,
        int $displayOrder,
        string $label,
        array $stages,
        bool $validateDealStageUsagesBeforeDelete = false,
        bool $validateReferencesBeforeDelete = false,
        RequestOptions|array|null $requestOptions = null,
    ): Pipeline;

    /**
     * @api
     *
     * @param string $stageID Path param
     * @param string $objectType Path param
     * @param string $pipelineID Path param
     * @param array<string,string> $metadata Body param: A JSON object containing properties that are not present on all object pipelines.
     *
     * For `deals` pipelines, the `probability` field is required (`{ "probability": 0.5 }`), and represents the likelihood a deal will close. Possible values are between 0.0 and 1.0 in increments of 0.1.
     *
     * For `tickets` pipelines, the `ticketState` field is optional (`{ "ticketState": "OPEN" }`), and represents whether the ticket remains open or has been closed by a member of your Support team. Possible values are `OPEN` or `CLOSED`.
     * @param bool $archived body param: Whether the pipeline is archived
     * @param int $displayOrder Body param: The order for displaying this pipeline stage. If two pipeline stages have a matching `displayOrder`, they will be sorted alphabetically by label.
     * @param string $label Body param: A label used to organize pipeline stages in HubSpot's UI. Each pipeline stage's label must be unique within that pipeline.
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function updateStage(
        string $stageID,
        string $objectType,
        string $pipelineID,
        array $metadata,
        ?bool $archived = null,
        ?int $displayOrder = null,
        ?string $label = null,
        RequestOptions|array|null $requestOptions = null,
    ): PipelineStage;

    /**
     * @api
     *
     * @param string $stageID Path param
     * @param string $objectType Path param
     * @param string $pipelineID Path param
     * @param int $displayOrder Body param: The order for displaying this pipeline stage. If two pipeline stages have a matching `displayOrder`, they will be sorted alphabetically by label.
     * @param string $label Body param: A label used to organize pipeline stages in HubSpot's UI. Each pipeline stage's label must be unique within that pipeline.
     * @param array<string,string> $metadata Body param: A JSON object containing properties that are not present on all object pipelines.
     *
     * For `deals` pipelines, the `probability` field is required (`{ "probability": 0.5 }`), and represents the likelihood a deal will close. Possible values are between 0.0 and 1.0 in increments of 0.1.
     *
     * For `tickets` pipelines, the `ticketState` field is optional (`{ "ticketState": "OPEN" }`), and represents whether the ticket remains open or has been closed by a member of your Support team. Possible values are `OPEN` or `CLOSED`.
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function updateStageAllProperties(
        string $stageID,
        string $objectType,
        string $pipelineID,
        int $displayOrder,
        string $label,
        array $metadata,
        RequestOptions|array|null $requestOptions = null,
    ): PipelineStage;
}
