<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\Crm;

use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Crm\Pipelines\CollectionResponsePipelineNoPaging;
use HubspotSDK\Crm\Pipelines\CollectionResponsePublicAuditInfoNoPaging;
use HubspotSDK\Crm\Pipelines\Pipeline;
use HubspotSDK\Crm\Pipelines\PipelineStageInput;
use HubspotSDK\RequestOptions;

use const HubspotSDK\Core\OMIT as omit;

interface PipelinesContract
{
    /**
     * @api
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
    ): Pipeline;

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
        ?RequestOptions $requestOptions = null,
    ): Pipeline;

    /**
     * @api
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
    ): Pipeline;

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
        ?RequestOptions $requestOptions = null,
    ): Pipeline;

    /**
     * @api
     *
     * @throws APIException
     */
    public function list(
        string $objectType,
        ?RequestOptions $requestOptions = null
    ): CollectionResponsePipelineNoPaging;

    /**
     * @api
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
    ): mixed;

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
        ?RequestOptions $requestOptions = null,
    ): mixed;

    /**
     * @api
     *
     * @param string $objectType
     *
     * @throws APIException
     */
    public function get(
        string $pipelineID,
        $objectType,
        ?RequestOptions $requestOptions = null
    ): Pipeline;

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
        ?RequestOptions $requestOptions = null,
    ): Pipeline;

    /**
     * @api
     *
     * @param string $objectType
     *
     * @throws APIException
     */
    public function getAudit(
        string $pipelineID,
        $objectType,
        ?RequestOptions $requestOptions = null
    ): CollectionResponsePublicAuditInfoNoPaging;

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
        ?RequestOptions $requestOptions = null,
    ): CollectionResponsePublicAuditInfoNoPaging;

    /**
     * @api
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
    ): Pipeline;

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
        ?RequestOptions $requestOptions = null,
    ): Pipeline;
}
