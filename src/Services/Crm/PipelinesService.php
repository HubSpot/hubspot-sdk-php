<?php

declare(strict_types=1);

namespace HubspotSDK\Services\Crm;

use HubspotSDK\Client;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Core\Util;
use HubspotSDK\Crm\Pipelines\CollectionResponsePipelineNoPaging;
use HubspotSDK\Crm\Pipelines\CollectionResponsePipelineStageNoPaging;
use HubspotSDK\Crm\Pipelines\CollectionResponsePublicAuditInfoNoPaging;
use HubspotSDK\Crm\Pipelines\Pipeline;
use HubspotSDK\Crm\Pipelines\PipelineStage;
use HubspotSDK\Crm\Pipelines\PipelineStageInput;
use HubspotSDK\RequestOptions;
use HubspotSDK\ServiceContracts\Crm\PipelinesContract;

/**
 * @phpstan-import-type PipelineStageInputShape from \HubspotSDK\Crm\Pipelines\PipelineStageInput
 * @phpstan-import-type RequestOpts from \HubspotSDK\RequestOptions
 */
final class PipelinesService implements PipelinesContract
{
    /**
     * @api
     */
    public PipelinesRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new PipelinesRawService($client);
    }

    /**
     * @api
     *
     * Create a new pipeline with the provided property values. The entire pipeline object, including its unique ID, will be returned in the response.
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
    ): Pipeline {
        $params = Util::removeNulls(
            [
                'displayOrder' => $displayOrder,
                'label' => $label,
                'stages' => $stages,
                'pipelineID' => $pipelineID,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->create($objectType, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Perform a partial update of the pipeline identified by `{pipelineId}`. The updated pipeline will be returned in the response.
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
    ): Pipeline {
        $params = Util::removeNulls(
            [
                'objectType' => $objectType,
                'validateDealStageUsagesBeforeDelete' => $validateDealStageUsagesBeforeDelete,
                'validateReferencesBeforeDelete' => $validateReferencesBeforeDelete,
                'archived' => $archived,
                'displayOrder' => $displayOrder,
                'label' => $label,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->update($pipelineID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Return all pipelines for the object type specified by `{objectType}`.
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function list(
        string $objectType,
        RequestOptions|array|null $requestOptions = null
    ): CollectionResponsePipelineNoPaging {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->list($objectType, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Delete a pipeline
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
    ): mixed {
        $params = Util::removeNulls(
            [
                'objectType' => $objectType,
                'validateDealStageUsagesBeforeDelete' => $validateDealStageUsagesBeforeDelete,
                'validateReferencesBeforeDelete' => $validateReferencesBeforeDelete,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->delete($pipelineID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Create a pipeline stage
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
    ): PipelineStage {
        $params = Util::removeNulls(
            [
                'objectType' => $objectType,
                'displayOrder' => $displayOrder,
                'label' => $label,
                'metadata' => $metadata,
                'stageID' => $stageID,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->createStage($pipelineID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Delete a pipeline stage
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
    ): mixed {
        $params = Util::removeNulls(
            ['objectType' => $objectType, 'pipelineID' => $pipelineID]
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->deleteStage($stageID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Return a single pipeline object identified by its unique `{pipelineId}`.
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function get(
        string $pipelineID,
        string $objectType,
        RequestOptions|array|null $requestOptions = null,
    ): Pipeline {
        $params = Util::removeNulls(['objectType' => $objectType]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->get($pipelineID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Return a pipeline stage by ID
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
    ): PipelineStage {
        $params = Util::removeNulls(
            ['objectType' => $objectType, 'pipelineID' => $pipelineID]
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->getStage($stageID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Return a reverse chronological list of all mutations that have occurred on the pipeline identified by `{pipelineId}`.
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function listAudit(
        string $pipelineID,
        string $objectType,
        RequestOptions|array|null $requestOptions = null,
    ): CollectionResponsePublicAuditInfoNoPaging {
        $params = Util::removeNulls(['objectType' => $objectType]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->listAudit($pipelineID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Return a reverse chronological list of all mutations that have occurred on the pipeline stage identified by `{stageId}`.
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
    ): CollectionResponsePublicAuditInfoNoPaging {
        $params = Util::removeNulls(
            ['objectType' => $objectType, 'pipelineID' => $pipelineID]
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->listStageAudit($stageID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Return all the stages associated with the pipeline identified by `{pipelineId}`.
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function listStages(
        string $pipelineID,
        string $objectType,
        RequestOptions|array|null $requestOptions = null,
    ): CollectionResponsePipelineStageNoPaging {
        $params = Util::removeNulls(['objectType' => $objectType]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->listStages($pipelineID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Replace a pipeline
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
    ): Pipeline {
        $params = Util::removeNulls(
            [
                'objectType' => $objectType,
                'displayOrder' => $displayOrder,
                'label' => $label,
                'stages' => $stages,
                'validateDealStageUsagesBeforeDelete' => $validateDealStageUsagesBeforeDelete,
                'validateReferencesBeforeDelete' => $validateReferencesBeforeDelete,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->updateAllProperties($pipelineID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

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
    ): PipelineStage {
        $params = Util::removeNulls(
            [
                'objectType' => $objectType,
                'pipelineID' => $pipelineID,
                'metadata' => $metadata,
                'archived' => $archived,
                'displayOrder' => $displayOrder,
                'label' => $label,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->updateStage($stageID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Replace all the properties of an existing pipeline stage with the values provided. The updated stage will be returned in the response.
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
    ): PipelineStage {
        $params = Util::removeNulls(
            [
                'objectType' => $objectType,
                'pipelineID' => $pipelineID,
                'displayOrder' => $displayOrder,
                'label' => $label,
                'metadata' => $metadata,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->updateStageAllProperties($stageID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
