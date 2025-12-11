<?php

declare(strict_types=1);

namespace HubspotSDK\Services\Crm\Pipelines;

use HubspotSDK\Client;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Core\Util;
use HubspotSDK\Crm\Pipelines\CollectionResponsePipelineStageNoPaging;
use HubspotSDK\Crm\Pipelines\CollectionResponsePublicAuditInfoNoPaging;
use HubspotSDK\Crm\Pipelines\PipelineStage;
use HubspotSDK\RequestOptions;
use HubspotSDK\ServiceContracts\Crm\Pipelines\StagesContract;

final class StagesService implements StagesContract
{
    /**
     * @api
     */
    public StagesRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new StagesRawService($client);
    }

    /**
     * @api
     *
     * Create a new stage within the specified pipeline.
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
    ): PipelineStage {
        $params = Util::removeNulls(
            [
                'objectType' => $objectType,
                'displayOrder' => $displayOrder,
                'label' => $label,
                'metadata' => $metadata,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->create($pipelineID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Perform a partial update on a specific stage of a pipeline.
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
        $response = $this->raw->update($stageID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Return all the stages associated with the pipeline identified by `{pipelineId}`.
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
    ): CollectionResponsePipelineStageNoPaging {
        $params = Util::removeNulls(['objectType' => $objectType]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->list($pipelineID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Delete a specific stage from a pipeline.
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
    ): mixed {
        $params = Util::removeNulls(
            ['objectType' => $objectType, 'pipelineID' => $pipelineID]
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->delete($stageID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Retrieve a specific stage from a pipeline using its ID.
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
    ): PipelineStage {
        $params = Util::removeNulls(
            ['objectType' => $objectType, 'pipelineID' => $pipelineID]
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->get($stageID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Return a reverse chronological list of all mutations that have occurred on the pipeline stage identified by `{stageId}`.
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
    ): CollectionResponsePublicAuditInfoNoPaging {
        $params = Util::removeNulls(
            ['objectType' => $objectType, 'pipelineID' => $pipelineID]
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->getAudit($stageID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Replace all the properties of an existing pipeline stage with the values provided. The updated stage will be returned in the response.
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
        $response = $this->raw->replace($stageID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
