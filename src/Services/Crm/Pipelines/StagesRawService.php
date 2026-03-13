<?php

declare(strict_types=1);

namespace HubspotSDK\Services\Crm\Pipelines;

use HubspotSDK\Client;
use HubspotSDK\Core\Contracts\BaseResponse;
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
use HubspotSDK\ServiceContracts\Crm\Pipelines\StagesRawContract;

/**
 * @phpstan-import-type RequestOpts from \HubspotSDK\RequestOptions
 */
final class StagesRawService implements StagesRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Create a new stage within the specified pipeline.
     *
     * @param string $pipelineID path param: The unique identifier of the pipeline to which the stage will be added
     * @param array{
     *   objectType: string,
     *   displayOrder: int,
     *   label: string,
     *   metadata: array<string,string>,
     * }|StageCreateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<PipelineStage>
     *
     * @throws APIException
     */
    public function create(
        string $pipelineID,
        array|StageCreateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = StageCreateParams::parseRequest(
            $params,
            $requestOptions,
        );
        $objectType = $parsed['objectType'];
        unset($parsed['objectType']);

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: ['crm/v3/pipelines/%1$s/%2$s/stages', $objectType, $pipelineID],
            body: (object) array_diff_key($parsed, array_flip(['objectType'])),
            options: $options,
            convert: PipelineStage::class,
        );
    }

    /**
     * @api
     *
     * Perform a partial update on a specific stage of a pipeline.
     *
     * @param string $stageID path param: The unique identifier of the stage to be updated in the pipeline
     * @param array{
     *   objectType: string,
     *   pipelineID: string,
     *   metadata: array<string,string>,
     *   archived?: bool,
     *   displayOrder?: int,
     *   label?: string,
     * }|StageUpdateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<PipelineStage>
     *
     * @throws APIException
     */
    public function update(
        string $stageID,
        array|StageUpdateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = StageUpdateParams::parseRequest(
            $params,
            $requestOptions,
        );
        $objectType = $parsed['objectType'];
        unset($parsed['objectType']);
        $pipelineID = $parsed['pipelineID'];
        unset($parsed['pipelineID']);

        // @phpstan-ignore-next-line return.type
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
     * Return all the stages associated with the pipeline identified by `{pipelineId}`.
     *
     * @param string $pipelineID the unique identifier of the pipeline whose stages are being retrieved
     * @param array{objectType: string}|StageListParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<CollectionResponsePipelineStageNoPaging>
     *
     * @throws APIException
     */
    public function list(
        string $pipelineID,
        array|StageListParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = StageListParams::parseRequest(
            $params,
            $requestOptions,
        );
        $objectType = $parsed['objectType'];
        unset($parsed['objectType']);

        // @phpstan-ignore-next-line return.type
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
     * Delete a specific stage from a pipeline.
     *
     * @param string $stageID the unique identifier of the stage to be deleted from the pipeline
     * @param array{objectType: string, pipelineID: string}|StageDeleteParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function delete(
        string $stageID,
        array|StageDeleteParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = StageDeleteParams::parseRequest(
            $params,
            $requestOptions,
        );
        $objectType = $parsed['objectType'];
        unset($parsed['objectType']);
        $pipelineID = $parsed['pipelineID'];
        unset($parsed['pipelineID']);

        // @phpstan-ignore-next-line return.type
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
     * Retrieve a specific stage from a pipeline using its ID.
     *
     * @param string $stageID the unique identifier of the stage to be retrieved from the pipeline
     * @param array{objectType: string, pipelineID: string}|StageGetParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<PipelineStage>
     *
     * @throws APIException
     */
    public function get(
        string $stageID,
        array|StageGetParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = StageGetParams::parseRequest(
            $params,
            $requestOptions,
        );
        $objectType = $parsed['objectType'];
        unset($parsed['objectType']);
        $pipelineID = $parsed['pipelineID'];
        unset($parsed['pipelineID']);

        // @phpstan-ignore-next-line return.type
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
     * @param string $stageID the unique identifier for the pipeline stage being audited
     * @param array{objectType: string, pipelineID: string}|StageGetAuditParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<CollectionResponsePublicAuditInfoNoPaging>
     *
     * @throws APIException
     */
    public function getAudit(
        string $stageID,
        array|StageGetAuditParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = StageGetAuditParams::parseRequest(
            $params,
            $requestOptions,
        );
        $objectType = $parsed['objectType'];
        unset($parsed['objectType']);
        $pipelineID = $parsed['pipelineID'];
        unset($parsed['pipelineID']);

        // @phpstan-ignore-next-line return.type
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
     * @param string $stageID path param: The unique identifier of the stage to be replaced in the pipeline
     * @param array{
     *   objectType: string,
     *   pipelineID: string,
     *   displayOrder: int,
     *   label: string,
     *   metadata: array<string,string>,
     * }|StageReplaceParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<PipelineStage>
     *
     * @throws APIException
     */
    public function replace(
        string $stageID,
        array|StageReplaceParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = StageReplaceParams::parseRequest(
            $params,
            $requestOptions,
        );
        $objectType = $parsed['objectType'];
        unset($parsed['objectType']);
        $pipelineID = $parsed['pipelineID'];
        unset($parsed['pipelineID']);

        // @phpstan-ignore-next-line return.type
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
