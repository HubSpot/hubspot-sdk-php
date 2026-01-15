<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\Crm;

use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Crm\Pipelines\CollectionResponsePipelineNoPaging;
use HubspotSDK\Crm\Pipelines\CollectionResponsePublicAuditInfoNoPaging;
use HubspotSDK\Crm\Pipelines\Pipeline;
use HubspotSDK\Crm\Pipelines\PipelineStageInput;
use HubspotSDK\RequestOptions;

/**
 * @phpstan-import-type PipelineStageInputShape from \HubspotSDK\Crm\Pipelines\PipelineStageInput
 * @phpstan-import-type RequestOpts from \HubspotSDK\RequestOptions
 */
interface PipelinesContract
{
    /**
     * @api
     *
     * @param string $objectType The object type of the pipeline being created (ex. deals or tickets)
     * @param int $displayOrder The order for displaying this pipeline. If two pipelines have a matching `displayOrder`, they will be sorted alphabetically by label.
     * @param string $label A unique label used to organize pipelines in HubSpot's UI
     * @param list<PipelineStageInput|PipelineStageInputShape> $stages pipeline stage inputs used to create the new or replacement pipeline
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function create(
        string $objectType,
        int $displayOrder,
        string $label,
        array $stages,
        RequestOptions|array|null $requestOptions = null,
    ): Pipeline;

    /**
     * @api
     *
     * @param string $pipelineID path param: The unique identifier of the pipeline to be updated
     * @param string $objectType Path param: The object type of the pipeline being updated (ex. deals or tickets)
     * @param bool $validateDealStageUsagesBeforeDelete query param: Indicates whether to validate deal stage usages before deleting the pipeline
     * @param bool $validateReferencesBeforeDelete query param: Indicates whether to validate references before deleting the pipeline
     * @param bool $archived Body param: Whether the pipeline is archived. This property should only be provided when restoring an archived pipeline. If it's provided in any other call, the request will fail and a `400 Bad Request` will be returned.
     * @param int $displayOrder Body param: The order for displaying this pipeline. If two pipelines have a matching `displayOrder`, they will be sorted alphabetically by label.
     * @param string $label Body param: A unique label used to organize pipelines in HubSpot's UI
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function update(
        string $pipelineID,
        string $objectType,
        bool $validateDealStageUsagesBeforeDelete = false,
        bool $validateReferencesBeforeDelete = false,
        ?bool $archived = null,
        ?int $displayOrder = null,
        ?string $label = null,
        RequestOptions|array|null $requestOptions = null,
    ): Pipeline;

    /**
     * @api
     *
     * @param string $objectType The object type of the pipelines being retrieved (ex. deals or tickets)
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function list(
        string $objectType,
        RequestOptions|array|null $requestOptions = null
    ): CollectionResponsePipelineNoPaging;

    /**
     * @api
     *
     * @param string $pipelineID path param: The unique identifier of the pipeline to be deleted
     * @param string $objectType Path param: The object type of the pipeline being deleted (ex. deals or tickets)
     * @param bool $validateDealStageUsagesBeforeDelete query param: Indicates whether to validate deal stage usages before deleting the pipeline
     * @param bool $validateReferencesBeforeDelete query param: Indicates whether to validate references before deleting the pipeline
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function delete(
        string $pipelineID,
        string $objectType,
        bool $validateDealStageUsagesBeforeDelete = false,
        bool $validateReferencesBeforeDelete = false,
        RequestOptions|array|null $requestOptions = null,
    ): mixed;

    /**
     * @api
     *
     * @param string $pipelineID the unique identifier of the pipeline to be retrieved
     * @param string $objectType The object type of the pipeline being retrieved (ex. deals or tickets)
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function get(
        string $pipelineID,
        string $objectType,
        RequestOptions|array|null $requestOptions = null,
    ): Pipeline;

    /**
     * @api
     *
     * @param string $pipelineID the unique identifier for the pipeline whose audit history is being retrieved
     * @param string $objectType The object type of the pipeline audit being retrieved (ex. deals or tickets)
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function getAudit(
        string $pipelineID,
        string $objectType,
        RequestOptions|array|null $requestOptions = null,
    ): CollectionResponsePublicAuditInfoNoPaging;

    /**
     * @api
     *
     * @param string $pipelineID path param: The unique identifier of the pipeline to be replaced
     * @param string $objectType Path param: The object type of the pipeline being replaced (ex. deals or tickets)
     * @param int $displayOrder Body param: The order for displaying this pipeline. If two pipelines have a matching `displayOrder`, they will be sorted alphabetically by label.
     * @param string $label Body param: A unique label used to organize pipelines in HubSpot's UI
     * @param list<PipelineStageInput|PipelineStageInputShape> $stages body param: Pipeline stage inputs used to create the new or replacement pipeline
     * @param bool $validateDealStageUsagesBeforeDelete query param: Indicates whether to validate deal stage usages before deleting the pipeline
     * @param bool $validateReferencesBeforeDelete query param: Indicates whether to validate references before deleting the pipeline
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function replace(
        string $pipelineID,
        string $objectType,
        int $displayOrder,
        string $label,
        array $stages,
        bool $validateDealStageUsagesBeforeDelete = false,
        bool $validateReferencesBeforeDelete = false,
        RequestOptions|array|null $requestOptions = null,
    ): Pipeline;
}
