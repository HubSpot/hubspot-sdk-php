<?php

declare(strict_types=1);

namespace HubspotSDK\Services\Crm;

use HubspotSDK\Client;
use HubspotSDK\Core\Contracts\BaseResponse;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Crm\Pipelines\CollectionResponsePipelineNoPaging;
use HubspotSDK\Crm\Pipelines\CollectionResponsePipelineStageNoPaging;
use HubspotSDK\Crm\Pipelines\CollectionResponsePublicAuditInfoNoPaging;
use HubspotSDK\Crm\Pipelines\Pipeline;
use HubspotSDK\Crm\Pipelines\PipelineCreateParams;
use HubspotSDK\Crm\Pipelines\PipelineCreateStageParams;
use HubspotSDK\Crm\Pipelines\PipelineDeleteParams;
use HubspotSDK\Crm\Pipelines\PipelineDeleteStageParams;
use HubspotSDK\Crm\Pipelines\PipelineGetParams;
use HubspotSDK\Crm\Pipelines\PipelineGetStageParams;
use HubspotSDK\Crm\Pipelines\PipelineListAuditParams;
use HubspotSDK\Crm\Pipelines\PipelineListStageAuditParams;
use HubspotSDK\Crm\Pipelines\PipelineListStagesParams;
use HubspotSDK\Crm\Pipelines\PipelineStage;
use HubspotSDK\Crm\Pipelines\PipelineStageInput;
use HubspotSDK\Crm\Pipelines\PipelineUpdateAllPropertiesParams;
use HubspotSDK\Crm\Pipelines\PipelineUpdateParams;
use HubspotSDK\Crm\Pipelines\PipelineUpdateStageAllPropertiesParams;
use HubspotSDK\Crm\Pipelines\PipelineUpdateStageParams;
use HubspotSDK\RequestOptions;
use HubspotSDK\ServiceContracts\Crm\PipelinesRawContract;

/**
 * @phpstan-import-type PipelineStageInputShape from \HubspotSDK\Crm\Pipelines\PipelineStageInput
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
     * Create a new pipeline with the provided property values. The entire pipeline object, including its unique ID, will be returned in the response.
     *
     * @param array{
     *   displayOrder: int,
     *   label: string,
     *   stages: list<PipelineStageInput|PipelineStageInputShape>,
     *   pipelineID?: string,
     * }|PipelineCreateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<Pipeline>
     *
     * @throws APIException
     */
    public function create(
        string $objectType,
        array|PipelineCreateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = PipelineCreateParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: ['crm/pipelines/2026-03/%1$s', $objectType],
            body: (object) $parsed,
            options: $options,
            convert: Pipeline::class,
        );
    }

    /**
     * @api
     *
     * Perform a partial update of the pipeline identified by `{pipelineId}`. The updated pipeline will be returned in the response.
     *
     * @param string $pipelineID Path param
     * @param array{
     *   objectType: string,
     *   validateDealStageUsagesBeforeDelete?: bool,
     *   validateReferencesBeforeDelete?: bool,
     *   archived?: bool,
     *   displayOrder?: int,
     *   label?: string,
     * }|PipelineUpdateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<Pipeline>
     *
     * @throws APIException
     */
    public function update(
        string $pipelineID,
        array|PipelineUpdateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = PipelineUpdateParams::parseRequest(
            $params,
            $requestOptions,
        );
        $objectType = $parsed['objectType'];
        unset($parsed['objectType']);
        $query_params = array_flip(
            ['validateDealStageUsagesBeforeDelete', 'validateReferencesBeforeDelete']
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'patch',
            path: ['crm/pipelines/2026-03/%1$s/%2$s', $objectType, $pipelineID],
            query: array_intersect_key($parsed, $query_params),
            body: (object) array_diff_key(
                array_diff_key($parsed, $query_params),
                array_flip(['objectType'])
            ),
            options: $options,
            convert: Pipeline::class,
        );
    }

    /**
     * @api
     *
     * Return all pipelines for the object type specified by `{objectType}`.
     *
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<CollectionResponsePipelineNoPaging>
     *
     * @throws APIException
     */
    public function list(
        string $objectType,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['crm/pipelines/2026-03/%1$s', $objectType],
            options: $requestOptions,
            convert: CollectionResponsePipelineNoPaging::class,
        );
    }

    /**
     * @api
     *
     * Delete a pipeline
     *
     * @param string $pipelineID Path param
     * @param array{
     *   objectType: string,
     *   validateDealStageUsagesBeforeDelete?: bool,
     *   validateReferencesBeforeDelete?: bool,
     * }|PipelineDeleteParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function delete(
        string $pipelineID,
        array|PipelineDeleteParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = PipelineDeleteParams::parseRequest(
            $params,
            $requestOptions,
        );
        $objectType = $parsed['objectType'];
        unset($parsed['objectType']);

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'delete',
            path: ['crm/pipelines/2026-03/%1$s/%2$s', $objectType, $pipelineID],
            query: $parsed,
            options: $options,
            convert: null,
        );
    }

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
     * }|PipelineCreateStageParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<PipelineStage>
     *
     * @throws APIException
     */
    public function createStage(
        string $pipelineID,
        array|PipelineCreateStageParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = PipelineCreateStageParams::parseRequest(
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
     * Delete a pipeline stage
     *
     * @param array{
     *   objectType: string, pipelineID: string
     * }|PipelineDeleteStageParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function deleteStage(
        string $stageID,
        array|PipelineDeleteStageParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = PipelineDeleteStageParams::parseRequest(
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
     * Return a single pipeline object identified by its unique `{pipelineId}`.
     *
     * @param array{objectType: string}|PipelineGetParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<Pipeline>
     *
     * @throws APIException
     */
    public function get(
        string $pipelineID,
        array|PipelineGetParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = PipelineGetParams::parseRequest(
            $params,
            $requestOptions,
        );
        $objectType = $parsed['objectType'];
        unset($parsed['objectType']);

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['crm/pipelines/2026-03/%1$s/%2$s', $objectType, $pipelineID],
            options: $options,
            convert: Pipeline::class,
        );
    }

    /**
     * @api
     *
     * Return a pipeline stage by ID
     *
     * @param array{
     *   objectType: string, pipelineID: string
     * }|PipelineGetStageParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<PipelineStage>
     *
     * @throws APIException
     */
    public function getStage(
        string $stageID,
        array|PipelineGetStageParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = PipelineGetStageParams::parseRequest(
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
     * Return a reverse chronological list of all mutations that have occurred on the pipeline identified by `{pipelineId}`.
     *
     * @param array{objectType: string}|PipelineListAuditParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<CollectionResponsePublicAuditInfoNoPaging>
     *
     * @throws APIException
     */
    public function listAudit(
        string $pipelineID,
        array|PipelineListAuditParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = PipelineListAuditParams::parseRequest(
            $params,
            $requestOptions,
        );
        $objectType = $parsed['objectType'];
        unset($parsed['objectType']);

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['crm/pipelines/2026-03/%1$s/%2$s/audit', $objectType, $pipelineID],
            options: $options,
            convert: CollectionResponsePublicAuditInfoNoPaging::class,
        );
    }

    /**
     * @api
     *
     * Return a reverse chronological list of all mutations that have occurred on the pipeline stage identified by `{stageId}`.
     *
     * @param array{
     *   objectType: string, pipelineID: string
     * }|PipelineListStageAuditParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<CollectionResponsePublicAuditInfoNoPaging>
     *
     * @throws APIException
     */
    public function listStageAudit(
        string $stageID,
        array|PipelineListStageAuditParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = PipelineListStageAuditParams::parseRequest(
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
     * Return all the stages associated with the pipeline identified by `{pipelineId}`.
     *
     * @param array{objectType: string}|PipelineListStagesParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<CollectionResponsePipelineStageNoPaging>
     *
     * @throws APIException
     */
    public function listStages(
        string $pipelineID,
        array|PipelineListStagesParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = PipelineListStagesParams::parseRequest(
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
     * Replace a pipeline
     *
     * @param string $pipelineID Path param
     * @param array{
     *   objectType: string,
     *   displayOrder: int,
     *   label: string,
     *   stages: list<PipelineStageInput|PipelineStageInputShape>,
     *   validateDealStageUsagesBeforeDelete?: bool,
     *   validateReferencesBeforeDelete?: bool,
     * }|PipelineUpdateAllPropertiesParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<Pipeline>
     *
     * @throws APIException
     */
    public function updateAllProperties(
        string $pipelineID,
        array|PipelineUpdateAllPropertiesParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = PipelineUpdateAllPropertiesParams::parseRequest(
            $params,
            $requestOptions,
        );
        $objectType = $parsed['objectType'];
        unset($parsed['objectType']);
        $query_params = array_flip(
            ['validateDealStageUsagesBeforeDelete', 'validateReferencesBeforeDelete']
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'put',
            path: ['crm/pipelines/2026-03/%1$s/%2$s', $objectType, $pipelineID],
            query: array_intersect_key($parsed, $query_params),
            body: (object) array_diff_key(
                array_diff_key($parsed, $query_params),
                array_flip(['objectType'])
            ),
            options: $options,
            convert: Pipeline::class,
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
     * }|PipelineUpdateStageParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<PipelineStage>
     *
     * @throws APIException
     */
    public function updateStage(
        string $stageID,
        array|PipelineUpdateStageParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = PipelineUpdateStageParams::parseRequest(
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
     * Replace all the properties of an existing pipeline stage with the values provided. The updated stage will be returned in the response.
     *
     * @param string $stageID Path param
     * @param array{
     *   objectType: string,
     *   pipelineID: string,
     *   displayOrder: int,
     *   label: string,
     *   metadata: array<string,string>,
     * }|PipelineUpdateStageAllPropertiesParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<PipelineStage>
     *
     * @throws APIException
     */
    public function updateStageAllProperties(
        string $stageID,
        array|PipelineUpdateStageAllPropertiesParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = PipelineUpdateStageAllPropertiesParams::parseRequest(
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
