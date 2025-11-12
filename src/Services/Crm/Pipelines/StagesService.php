<?php

declare(strict_types=1);

namespace HubspotSDK\Services\Crm\Pipelines;

use HubspotSDK\Client;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Crm\Pipelines\CollectionResponsePipelineStageNoPaging;
use HubspotSDK\Crm\Pipelines\CollectionResponsePublicAuditInfoNoPaging;
use HubspotSDK\Crm\Pipelines\PipelineStage;
use HubspotSDK\Crm\Pipelines\Stages\StageCreateParams;
use HubspotSDK\Crm\Pipelines\Stages\StageDeleteParams;
use HubspotSDK\Crm\Pipelines\Stages\StageGetAuditParams;
use HubspotSDK\Crm\Pipelines\Stages\StageGetParams;
use HubspotSDK\Crm\Pipelines\Stages\StageListParams;
use HubspotSDK\Crm\Pipelines\Stages\StageReplaceParams;
use HubspotSDK\Crm\Pipelines\Stages\StageUpdateParams;
use HubspotSDK\RequestOptions;
use HubspotSDK\ServiceContracts\Crm\Pipelines\StagesContract;

final class StagesService implements StagesContract
{
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Create a pipeline stage
     *
     * @param array{
     *   objectType: string,
     *   displayOrder: int,
     *   label: string,
     *   metadata?: array<string,string>,
     * }|StageCreateParams $params
     *
     * @throws APIException
     */
    public function create(
        string $pipelineID,
        array|StageCreateParams $params,
        ?RequestOptions $requestOptions = null,
    ): PipelineStage {
        [$parsed, $options] = StageCreateParams::parseRequest(
            $params,
            $requestOptions,
        );
        $objectType = $parsed['objectType'];
        unset($parsed['objectType']);

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'post',
            path: ['crm/v3/pipelines/%1$s/%2$s/stages', $objectType, $pipelineID],
            body: (object) array_diff_key($parsed, ['objectType']),
            options: $options,
            convert: PipelineStage::class,
        );
    }

    /**
     * @api
     *
     * @param array{
     *   objectType: string,
     *   pipelineId: string,
     *   archived?: bool,
     *   displayOrder?: int,
     *   label?: string,
     *   metadata?: array<string,string>,
     * }|StageUpdateParams $params
     *
     * @throws APIException
     */
    public function update(
        string $stageID,
        array|StageUpdateParams $params,
        ?RequestOptions $requestOptions = null,
    ): PipelineStage {
        [$parsed, $options] = StageUpdateParams::parseRequest(
            $params,
            $requestOptions,
        );
        $objectType = $parsed['objectType'];
        unset($parsed['objectType']);
        $pipelineID = $parsed['pipelineId'];
        unset($parsed['pipelineId']);

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
                array_flip(['objectType', 'pipelineId'])
            ),
            options: $options,
            convert: PipelineStage::class,
        );
    }

    /**
     * @api
     *
     * Return all the stages associated with the pipeline identified by `{pipelineId}`.
     *
     * @param array{objectType: string}|StageListParams $params
     *
     * @throws APIException
     */
    public function list(
        string $pipelineID,
        array|StageListParams $params,
        ?RequestOptions $requestOptions = null,
    ): CollectionResponsePipelineStageNoPaging {
        [$parsed, $options] = StageListParams::parseRequest(
            $params,
            $requestOptions,
        );
        $objectType = $parsed['objectType'];
        unset($parsed['objectType']);

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: ['crm/v3/pipelines/%1$s/%2$s/stages', $objectType, $pipelineID],
            options: $options,
            convert: CollectionResponsePipelineStageNoPaging::class,
        );
    }

    /**
     * @api
     *
     * Delete a pipeline stage
     *
     * @param array{objectType: string, pipelineId: string}|StageDeleteParams $params
     *
     * @throws APIException
     */
    public function delete(
        string $stageID,
        array|StageDeleteParams $params,
        ?RequestOptions $requestOptions = null,
    ): mixed {
        [$parsed, $options] = StageDeleteParams::parseRequest(
            $params,
            $requestOptions,
        );
        $objectType = $parsed['objectType'];
        unset($parsed['objectType']);
        $pipelineID = $parsed['pipelineId'];
        unset($parsed['pipelineId']);

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
     * Return a pipeline stage by ID
     *
     * @param array{objectType: string, pipelineId: string}|StageGetParams $params
     *
     * @throws APIException
     */
    public function get(
        string $stageID,
        array|StageGetParams $params,
        ?RequestOptions $requestOptions = null,
    ): PipelineStage {
        [$parsed, $options] = StageGetParams::parseRequest(
            $params,
            $requestOptions,
        );
        $objectType = $parsed['objectType'];
        unset($parsed['objectType']);
        $pipelineID = $parsed['pipelineId'];
        unset($parsed['pipelineId']);

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
     * Return a reverse chronological list of all mutations that have occurred on the pipeline stage identified by `{stageId}`.
     *
     * @param array{objectType: string, pipelineId: string}|StageGetAuditParams $params
     *
     * @throws APIException
     */
    public function getAudit(
        string $stageID,
        array|StageGetAuditParams $params,
        ?RequestOptions $requestOptions = null,
    ): CollectionResponsePublicAuditInfoNoPaging {
        [$parsed, $options] = StageGetAuditParams::parseRequest(
            $params,
            $requestOptions,
        );
        $objectType = $parsed['objectType'];
        unset($parsed['objectType']);
        $pipelineID = $parsed['pipelineId'];
        unset($parsed['pipelineId']);

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: [
                'crm/v3/pipelines/%1$s/%2$s/stages/%3$s/audit',
                $objectType,
                $pipelineID,
                $stageID,
            ],
            options: $options,
            convert: CollectionResponsePublicAuditInfoNoPaging::class,
        );
    }

    /**
     * @api
     *
     * Replace all the properties of an existing pipeline stage with the values provided. The updated stage will be returned in the response.
     *
     * @param array{
     *   objectType: string,
     *   pipelineId: string,
     *   displayOrder: int,
     *   label: string,
     *   metadata?: array<string,string>,
     * }|StageReplaceParams $params
     *
     * @throws APIException
     */
    public function replace(
        string $stageID,
        array|StageReplaceParams $params,
        ?RequestOptions $requestOptions = null,
    ): PipelineStage {
        [$parsed, $options] = StageReplaceParams::parseRequest(
            $params,
            $requestOptions,
        );
        $objectType = $parsed['objectType'];
        unset($parsed['objectType']);
        $pipelineID = $parsed['pipelineId'];
        unset($parsed['pipelineId']);

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
                array_flip(['objectType', 'pipelineId'])
            ),
            options: $options,
            convert: PipelineStage::class,
        );
    }
}
