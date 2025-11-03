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
use HubspotSDK\Crm\Pipelines\PipelineStageInput;
use HubspotSDK\Crm\Pipelines\PipelineUpdateParams;
use HubspotSDK\RequestOptions;
use HubspotSDK\ServiceContracts\Crm\PipelinesContract;
use HubspotSDK\Services\Crm\Pipelines\StagesService;

use const HubspotSDK\Core\OMIT as omit;

final class PipelinesService implements PipelinesContract
{
    /**
     * @@api
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
     * Perform a partial update of the pipeline identified by `{pipelineId}`. The updated pipeline will be returned in the response.
     *
     * @param string $objectType
     * @param bool $validateDealStageUsagesBeforeDelete
     * @param bool $validateReferencesBeforeDelete
     * @param bool $archived Whether the pipeline is archived. This property should only be provided when restoring an archived pipeline. If it's provided in any other call, the request will fail and a `400 Bad Request` will be returned.
     * @param int $displayOrder The order for displaying this pipeline. If two pipelines have a matching `displayOrder`, they will be sorted alphabetically by label.
     * @param string $label A unique label used to organize pipelines in HubSpot's UI
     *
     * @throws APIException
     */
    public function update(
        string $pipelineID,
        $objectType,
        $validateDealStageUsagesBeforeDelete = omit,
        $validateReferencesBeforeDelete = omit,
        $archived = omit,
        $displayOrder = omit,
        $label = omit,
        ?RequestOptions $requestOptions = null,
    ): Pipeline {
        $params = [
            'objectType' => $objectType,
            'validateDealStageUsagesBeforeDelete' => $validateDealStageUsagesBeforeDelete,
            'validateReferencesBeforeDelete' => $validateReferencesBeforeDelete,
            'archived' => $archived,
            'displayOrder' => $displayOrder,
            'label' => $label,
        ];

        return $this->updateRaw($pipelineID, $params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function updateRaw(
        string $pipelineID,
        array $params,
        ?RequestOptions $requestOptions = null
    ): Pipeline {
        [$parsed, $options] = PipelineUpdateParams::parseRequest(
            $params,
            $requestOptions
        );
        $objectType = $parsed['objectType'];
        unset($parsed['objectType']);
        $query_params = array_flip(
            ['validateDealStageUsagesBeforeDelete', 'validateReferencesBeforeDelete']
        );

        // @phpstan-ignore-next-line;
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
     * Delete a pipeline
     *
     * @param string $objectType
     * @param bool $validateDealStageUsagesBeforeDelete
     * @param bool $validateReferencesBeforeDelete
     *
     * @throws APIException
     */
    public function delete(
        string $pipelineID,
        $objectType,
        $validateDealStageUsagesBeforeDelete = omit,
        $validateReferencesBeforeDelete = omit,
        ?RequestOptions $requestOptions = null,
    ): mixed {
        $params = [
            'objectType' => $objectType,
            'validateDealStageUsagesBeforeDelete' => $validateDealStageUsagesBeforeDelete,
            'validateReferencesBeforeDelete' => $validateReferencesBeforeDelete,
        ];

        return $this->deleteRaw($pipelineID, $params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function deleteRaw(
        string $pipelineID,
        array $params,
        ?RequestOptions $requestOptions = null
    ): mixed {
        [$parsed, $options] = PipelineDeleteParams::parseRequest(
            $params,
            $requestOptions
        );
        $objectType = $parsed['objectType'];
        unset($parsed['objectType']);

        // @phpstan-ignore-next-line;
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
     * @param string $objectType
     *
     * @throws APIException
     */
    public function get(
        string $pipelineID,
        $objectType,
        ?RequestOptions $requestOptions = null
    ): Pipeline {
        $params = ['objectType' => $objectType];

        return $this->getRaw($pipelineID, $params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function getRaw(
        string $pipelineID,
        array $params,
        ?RequestOptions $requestOptions = null
    ): Pipeline {
        [$parsed, $options] = PipelineGetParams::parseRequest(
            $params,
            $requestOptions
        );
        $objectType = $parsed['objectType'];
        unset($parsed['objectType']);

        // @phpstan-ignore-next-line;
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
     * Replace a pipeline
     *
     * @param string $objectType
     * @param int $displayOrder The order for displaying this pipeline. If two pipelines have a matching `displayOrder`, they will be sorted alphabetically by label.
     * @param string $label A unique label used to organize pipelines in HubSpot's UI
     * @param list<PipelineStageInput> $stages pipeline stage inputs used to create the new or replacement pipeline
     * @param bool $validateDealStageUsagesBeforeDelete
     * @param bool $validateReferencesBeforeDelete
     *
     * @throws APIException
     */
    public function replace(
        string $pipelineID,
        $objectType,
        $displayOrder,
        $label,
        $stages,
        $validateDealStageUsagesBeforeDelete = omit,
        $validateReferencesBeforeDelete = omit,
        ?RequestOptions $requestOptions = null,
    ): Pipeline {
        $params = [
            'objectType' => $objectType,
            'displayOrder' => $displayOrder,
            'label' => $label,
            'stages' => $stages,
            'validateDealStageUsagesBeforeDelete' => $validateDealStageUsagesBeforeDelete,
            'validateReferencesBeforeDelete' => $validateReferencesBeforeDelete,
        ];

        return $this->replaceRaw($pipelineID, $params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function replaceRaw(
        string $pipelineID,
        array $params,
        ?RequestOptions $requestOptions = null
    ): Pipeline {
        [$parsed, $options] = PipelineReplaceParams::parseRequest(
            $params,
            $requestOptions
        );
        $objectType = $parsed['objectType'];
        unset($parsed['objectType']);
        $query_params = array_flip(
            ['validateDealStageUsagesBeforeDelete', 'validateReferencesBeforeDelete']
        );

        // @phpstan-ignore-next-line;
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
