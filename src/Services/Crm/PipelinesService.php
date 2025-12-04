<?php

declare(strict_types=1);

namespace HubspotSDK\Services\Crm;

use HubspotSDK\Client;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Crm\Pipelines\CollectionResponsePipelineNoPaging;
use HubspotSDK\Crm\Pipelines\CollectionResponsePublicAuditInfoNoPaging;
use HubspotSDK\Crm\Pipelines\Pipeline;
use HubspotSDK\Crm\Pipelines\PipelineCreateParams;
use HubspotSDK\Crm\Pipelines\PipelineDeleteParams;
use HubspotSDK\Crm\Pipelines\PipelineGetAuditParams;
use HubspotSDK\Crm\Pipelines\PipelineGetParams;
use HubspotSDK\Crm\Pipelines\PipelineReplaceParams;
use HubspotSDK\Crm\Pipelines\PipelineUpdateParams;
use HubspotSDK\RequestOptions;
use HubspotSDK\ServiceContracts\Crm\PipelinesContract;
use HubspotSDK\Services\Crm\Pipelines\StagesService;

final class PipelinesService implements PipelinesContract
{
    /**
     * @api
     */
    public StagesService $stages;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->stages = new StagesService($client);
    }

    /**
     * @api
     *
     * Create a new pipeline with the provided property values. The entire pipeline object, including its unique ID, will be returned in the response.
     *
     * @param array{
     *   displayOrder: int,
     *   label: string,
     *   stages: list<array{
     *     displayOrder: int, label: string, metadata: array<string,string>
     *   }>,
     * }|PipelineCreateParams $params
     *
     * @throws APIException
     */
    public function create(
        string $objectType,
        array|PipelineCreateParams $params,
        ?RequestOptions $requestOptions = null,
    ): Pipeline {
        [$parsed, $options] = PipelineCreateParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
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
     * Perform a partial update of the pipeline identified by `{pipelineId}`. The updated pipeline will be returned in the response.
     *
     * @param array{
     *   objectType: string,
     *   validateDealStageUsagesBeforeDelete?: bool,
     *   validateReferencesBeforeDelete?: bool,
     *   archived?: bool,
     *   displayOrder?: int,
     *   label?: string,
     * }|PipelineUpdateParams $params
     *
     * @throws APIException
     */
    public function update(
        string $pipelineID,
        array|PipelineUpdateParams $params,
        ?RequestOptions $requestOptions = null,
    ): Pipeline {
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
            path: ['crm/v3/pipelines/%1$s/%2$s', $objectType, $pipelineID],
            query: array_diff_key($parsed, $query_params),
            body: (object) array_diff_key(
                array_diff_key($parsed, $query_params),
                ['objectType']
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
     * @throws APIException
     */
    public function list(
        string $objectType,
        ?RequestOptions $requestOptions = null
    ): CollectionResponsePipelineNoPaging {
        // @phpstan-ignore-next-line return.type
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
     * Delete a pipeline identified by its unique pipelineId
     *
     * @param array{
     *   objectType: string,
     *   validateDealStageUsagesBeforeDelete?: bool,
     *   validateReferencesBeforeDelete?: bool,
     * }|PipelineDeleteParams $params
     *
     * @throws APIException
     */
    public function delete(
        string $pipelineID,
        array|PipelineDeleteParams $params,
        ?RequestOptions $requestOptions = null,
    ): mixed {
        [$parsed, $options] = PipelineDeleteParams::parseRequest(
            $params,
            $requestOptions,
        );
        $objectType = $parsed['objectType'];
        unset($parsed['objectType']);

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'delete',
            path: ['crm/v3/pipelines/%1$s/%2$s', $objectType, $pipelineID],
            query: $parsed,
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
     *
     * @throws APIException
     */
    public function get(
        string $pipelineID,
        array|PipelineGetParams $params,
        ?RequestOptions $requestOptions = null,
    ): Pipeline {
        [$parsed, $options] = PipelineGetParams::parseRequest(
            $params,
            $requestOptions,
        );
        $objectType = $parsed['objectType'];
        unset($parsed['objectType']);

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['crm/v3/pipelines/%1$s/%2$s', $objectType, $pipelineID],
            options: $options,
            convert: Pipeline::class,
        );
    }

    /**
     * @api
     *
     * Return a reverse chronological list of all mutations that have occurred on the pipeline identified by `{pipelineId}`.
     *
     * @param array{objectType: string}|PipelineGetAuditParams $params
     *
     * @throws APIException
     */
    public function getAudit(
        string $pipelineID,
        array|PipelineGetAuditParams $params,
        ?RequestOptions $requestOptions = null,
    ): CollectionResponsePublicAuditInfoNoPaging {
        [$parsed, $options] = PipelineGetAuditParams::parseRequest(
            $params,
            $requestOptions,
        );
        $objectType = $parsed['objectType'];
        unset($parsed['objectType']);

        // @phpstan-ignore-next-line return.type
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
     * Replace all properties of an existing pipeline with the provided values.
     *
     * @param array{
     *   objectType: string,
     *   displayOrder: int,
     *   label: string,
     *   stages: list<array{
     *     displayOrder: int, label: string, metadata: array<string,string>
     *   }>,
     *   validateDealStageUsagesBeforeDelete?: bool,
     *   validateReferencesBeforeDelete?: bool,
     * }|PipelineReplaceParams $params
     *
     * @throws APIException
     */
    public function replace(
        string $pipelineID,
        array|PipelineReplaceParams $params,
        ?RequestOptions $requestOptions = null,
    ): Pipeline {
        [$parsed, $options] = PipelineReplaceParams::parseRequest(
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
            path: ['crm/v3/pipelines/%1$s/%2$s', $objectType, $pipelineID],
            query: array_diff_key($parsed, $query_params),
            body: (object) array_diff_key(
                array_diff_key($parsed, $query_params),
                ['objectType']
            ),
            options: $options,
            convert: Pipeline::class,
        );
    }
}
