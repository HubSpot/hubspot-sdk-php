<?php

declare(strict_types=1);

namespace HubspotSDK\Services\Crm;

use HubspotSDK\Client;
use HubspotSDK\Core\Contracts\BaseResponse;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Crm\Pipelines\CollectionResponsePipelineStageNoPaging;
use HubspotSDK\Crm\Pipelines\CollectionResponsePublicAuditInfoNoPaging;
use HubspotSDK\Crm\Pipelines\PipelineCreateParams;
use HubspotSDK\Crm\Pipelines\PipelineDeleteParams;
use HubspotSDK\Crm\Pipelines\PipelineGetAuditParams;
use HubspotSDK\Crm\Pipelines\PipelineGetParams;
use HubspotSDK\Crm\Pipelines\PipelineListParams;
use HubspotSDK\Crm\Pipelines\PipelineReplaceParams;
use HubspotSDK\Crm\Pipelines\PipelineStage;
use HubspotSDK\Crm\Pipelines\PipelineUpdateParams;
use HubspotSDK\RequestOptions;
use HubspotSDK\ServiceContracts\Crm\PipelinesRawContract;

/**
 * @phpstan-import-type RequestOpts from \HubspotSDK\RequestOptions
 */
final class PipelinesRawService implements PipelinesRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Create a pipeline stage
     *
     * @param string $pipelineID Path param
     * @param array{
     *   objectType: string,
     *   displayOrder: int,
     *   label: string,
     *   metadata: array<string,string>,
     *   stageID?: string,
     * }|PipelineCreateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<PipelineStage>
     *
     * @throws APIException
     */
    public function create(
        string $pipelineID,
        array|PipelineCreateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = PipelineCreateParams::parseRequest(
            $params,
            $requestOptions,
        );
        $objectType = $parsed['objectType'];
        unset($parsed['objectType']);

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: [
                'crm/pipelines/2026-03/%1$s/%2$s/stages', $objectType, $pipelineID,
            ],
            body: (object) array_diff_key($parsed, array_flip(['objectType'])),
            options: $options,
            convert: PipelineStage::class,
        );
    }

    /**
     * @api
     *
     * @param string $stageID Path param
     * @param array{
     *   objectType: string,
     *   pipelineID: string,
     *   metadata: array<string,string>,
     *   archived?: bool,
     *   displayOrder?: int,
     *   label?: string,
     * }|PipelineUpdateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<PipelineStage>
     *
     * @throws APIException
     */
    public function update(
        string $stageID,
        array|PipelineUpdateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = PipelineUpdateParams::parseRequest(
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
                'crm/pipelines/2026-03/%1$s/%2$s/stages/%3$s',
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
     * @param array{objectType: string}|PipelineListParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<CollectionResponsePipelineStageNoPaging>
     *
     * @throws APIException
     */
    public function list(
        string $pipelineID,
        array|PipelineListParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = PipelineListParams::parseRequest(
            $params,
            $requestOptions,
        );
        $objectType = $parsed['objectType'];
        unset($parsed['objectType']);

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: [
                'crm/pipelines/2026-03/%1$s/%2$s/stages', $objectType, $pipelineID,
            ],
            options: $options,
            convert: CollectionResponsePipelineStageNoPaging::class,
        );
    }

    /**
     * @api
     *
     * Delete a pipeline stage
     *
     * @param array{
     *   objectType: string, pipelineID: string
     * }|PipelineDeleteParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function delete(
        string $stageID,
        array|PipelineDeleteParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = PipelineDeleteParams::parseRequest(
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
                'crm/pipelines/2026-03/%1$s/%2$s/stages/%3$s',
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
     * @param array{objectType: string, pipelineID: string}|PipelineGetParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<PipelineStage>
     *
     * @throws APIException
     */
    public function get(
        string $stageID,
        array|PipelineGetParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = PipelineGetParams::parseRequest(
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
                'crm/pipelines/2026-03/%1$s/%2$s/stages/%3$s',
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
     * @param array{
     *   objectType: string, pipelineID: string
     * }|PipelineGetAuditParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<CollectionResponsePublicAuditInfoNoPaging>
     *
     * @throws APIException
     */
    public function getAudit(
        string $stageID,
        array|PipelineGetAuditParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = PipelineGetAuditParams::parseRequest(
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
                'crm/pipelines/2026-03/%1$s/%2$s/stages/%3$s/audit',
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
     * @param string $stageID Path param
     * @param array{
     *   objectType: string,
     *   pipelineID: string,
     *   displayOrder: int,
     *   label: string,
     *   metadata: array<string,string>,
     * }|PipelineReplaceParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<PipelineStage>
     *
     * @throws APIException
     */
    public function replace(
        string $stageID,
        array|PipelineReplaceParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = PipelineReplaceParams::parseRequest(
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
                'crm/pipelines/2026-03/%1$s/%2$s/stages/%3$s',
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
