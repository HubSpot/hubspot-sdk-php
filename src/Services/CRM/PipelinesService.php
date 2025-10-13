<?php

declare(strict_types=1);

namespace HubspotSDK\Services\CRM;

use HubspotSDK\Client;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\CRM\Pipelines\CollectionResponsePipelineNoPaging;
use HubspotSDK\CRM\Pipelines\CollectionResponsePublicAuditInfoNoPaging;
use HubspotSDK\CRM\Pipelines\Pipeline;
use HubspotSDK\CRM\Pipelines\PipelineCreateParams;
use HubspotSDK\CRM\Pipelines\PipelineDeleteParams;
use HubspotSDK\CRM\Pipelines\PipelineGetAuditParams;
use HubspotSDK\CRM\Pipelines\PipelineReadParams;
use HubspotSDK\CRM\Pipelines\PipelineReplaceParams;
use HubspotSDK\CRM\Pipelines\PipelineStage;
use HubspotSDK\CRM\Pipelines\PipelineStageInput;
use HubspotSDK\CRM\Pipelines\PipelineUpdateParams;
use HubspotSDK\RequestOptions;
use HubspotSDK\ServiceContracts\CRM\PipelinesContract;

use const HubspotSDK\Core\OMIT as omit;

final class PipelinesService implements PipelinesContract
{
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Create a new pipeline with the provided property values. The entire pipeline object, including its unique ID, will be returned in the response.
     *
     * @param int $displayOrder The order for displaying this pipeline. If two pipelines have a matching `displayOrder`, they will be sorted alphabetically by label.
     * @param string $label A unique label used to organize pipelines in HubSpot's UI
     * @param list<PipelineStageInput> $stages pipeline stage inputs used to create the new or replacement pipeline
     *
     * @throws APIException
     */
    public function create(
        string $objectType,
        $displayOrder,
        $label,
        $stages,
        ?RequestOptions $requestOptions = null,
    ): Pipeline {
        $params = [
            'displayOrder' => $displayOrder, 'label' => $label, 'stages' => $stages,
        ];

        return $this->createRaw($objectType, $params, $requestOptions);
    }

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
        ?RequestOptions $requestOptions = null
    ): Pipeline {
        [$parsed, $options] = PipelineCreateParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'post',
            path: ['crm/v3/pipelines/%1$s', $objectType],
            body: (object) $parsed,
            options: $options,
            convert: Pipeline::class,
        );
    }

    /**
     * @api
     *
     * Perform a partial update of the pipeline stage identified by `{stageId}` associated with the pipeline identified by `{pipelineId}`. Any properties not included in this update will keep their existing values. The updated stage will be returned in the response.
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
    ): PipelineStage {
        $params = [
            'objectType' => $objectType,
            'pipelineID' => $pipelineID,
            'archived' => $archived,
            'displayOrder' => $displayOrder,
            'label' => $label,
            'metadata' => $metadata,
        ];

        return $this->updateRaw($stageID, $params, $requestOptions);
    }

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
    ): PipelineStage {
        [$parsed, $options] = PipelineUpdateParams::parseRequest(
            $params,
            $requestOptions
        );
        $objectType = $parsed['objectType'];
        unset($parsed['objectType']);
        $pipelineID = $parsed['pipelineID'];
        unset($parsed['pipelineID']);

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'patch',
            path: [
                'crm/v3/pipelines/%1$s/%2$s/stages/%3$s',
                $objectType,
                $pipelineID,
                $stageID,
            ],
            body: (object) array_diff_key(
                $parsed,
                array_flip(['objectType', 'pipelineID'])
            ),
            options: $options,
            convert: PipelineStage::class,
        );
    }

    /**
     * @api
     *
     * Return all pipelines for the object type specified by `{objectType}`.
     *
     * @throws APIException
     */
    public function list(
        string $objectType,
        ?RequestOptions $requestOptions = null
    ): CollectionResponsePipelineNoPaging {
        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: ['crm/v3/pipelines/%1$s', $objectType],
            options: $requestOptions,
            convert: CollectionResponsePipelineNoPaging::class,
        );
    }

    /**
     * @api
     *
     * Delete the pipeline stage identified by `{stageId}` associated with the pipeline identified by `{pipelineId}`.
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
    ): mixed {
        $params = ['objectType' => $objectType, 'pipelineID' => $pipelineID];

        return $this->deleteRaw($stageID, $params, $requestOptions);
    }

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
    ): mixed {
        [$parsed, $options] = PipelineDeleteParams::parseRequest(
            $params,
            $requestOptions
        );
        $objectType = $parsed['objectType'];
        unset($parsed['objectType']);
        $pipelineID = $parsed['pipelineID'];
        unset($parsed['pipelineID']);

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'delete',
            path: [
                'crm/v3/pipelines/%1$s/%2$s/stages/%3$s',
                $objectType,
                $pipelineID,
                $stageID,
            ],
            options: $options,
            convert: null,
        );
    }

    /**
     * @api
     *
     * Return a reverse chronological list of all mutations that have occurred on the pipeline identified by `{pipelineId}`.
     *
     * @param string $objectType
     *
     * @throws APIException
     */
    public function getAudit(
        string $pipelineID,
        $objectType,
        ?RequestOptions $requestOptions = null
    ): CollectionResponsePublicAuditInfoNoPaging {
        $params = ['objectType' => $objectType];

        return $this->getAuditRaw($pipelineID, $params, $requestOptions);
    }

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
        ?RequestOptions $requestOptions = null
    ): CollectionResponsePublicAuditInfoNoPaging {
        [$parsed, $options] = PipelineGetAuditParams::parseRequest(
            $params,
            $requestOptions
        );
        $objectType = $parsed['objectType'];
        unset($parsed['objectType']);

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: ['crm/v3/pipelines/%1$s/%2$s/audit', $objectType, $pipelineID],
            options: $options,
            convert: CollectionResponsePublicAuditInfoNoPaging::class,
        );
    }

    /**
     * @api
     *
     * Return the stage identified by `{stageId}` associated with the pipeline identified by `{pipelineId}`.
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
    ): PipelineStage {
        $params = ['objectType' => $objectType, 'pipelineID' => $pipelineID];

        return $this->readRaw($stageID, $params, $requestOptions);
    }

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
    ): PipelineStage {
        [$parsed, $options] = PipelineReadParams::parseRequest(
            $params,
            $requestOptions
        );
        $objectType = $parsed['objectType'];
        unset($parsed['objectType']);
        $pipelineID = $parsed['pipelineID'];
        unset($parsed['pipelineID']);

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: [
                'crm/v3/pipelines/%1$s/%2$s/stages/%3$s',
                $objectType,
                $pipelineID,
                $stageID,
            ],
            options: $options,
            convert: PipelineStage::class,
        );
    }

    /**
     * @api
     *
     * Replace all the properties of an existing pipeline stage with the values provided. The updated stage will be returned in the response.
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
    ): PipelineStage {
        $params = [
            'objectType' => $objectType,
            'pipelineID' => $pipelineID,
            'displayOrder' => $displayOrder,
            'label' => $label,
            'metadata' => $metadata,
        ];

        return $this->replaceRaw($stageID, $params, $requestOptions);
    }

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
    ): PipelineStage {
        [$parsed, $options] = PipelineReplaceParams::parseRequest(
            $params,
            $requestOptions
        );
        $objectType = $parsed['objectType'];
        unset($parsed['objectType']);
        $pipelineID = $parsed['pipelineID'];
        unset($parsed['pipelineID']);

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'put',
            path: [
                'crm/v3/pipelines/%1$s/%2$s/stages/%3$s',
                $objectType,
                $pipelineID,
                $stageID,
            ],
            body: (object) array_diff_key(
                $parsed,
                array_flip(['objectType', 'pipelineID'])
            ),
            options: $options,
            convert: PipelineStage::class,
        );
    }
}
