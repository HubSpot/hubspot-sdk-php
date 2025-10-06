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
     * Create a pipeline
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
     * Update a pipeline stage
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
     * Retrieve all pipelines
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
     * Delete a pipeline stage
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
     * Return an audit of all changes to the pipeline
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
     * Return a pipeline stage by ID
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
     * Replace a pipeline stage
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
