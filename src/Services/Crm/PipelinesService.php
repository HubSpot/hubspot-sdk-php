<?php

declare(strict_types=1);

namespace HubspotSDK\Services\Crm;

use HubspotSDK\Client;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Crm\Pipelines\CollectionResponsePipelineNoPaging;
use HubspotSDK\Crm\Pipelines\CollectionResponsePublicAuditInfoNoPaging;
use HubspotSDK\Crm\Pipelines\Pipeline;
use HubspotSDK\RequestOptions;
use HubspotSDK\ServiceContracts\Crm\PipelinesContract;
use HubspotSDK\Services\Crm\Pipelines\StagesService;

final class PipelinesService implements PipelinesContract
{
    /**
     * @api
     */
    public PipelinesRawService $raw;

    /**
     * @api
     */
    public StagesService $stages;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new PipelinesRawService($client);
        $this->stages = new StagesService($client);
    }

    /**
     * @api
     *
     * Create a new pipeline with the provided property values. The entire pipeline object, including its unique ID, will be returned in the response.
     *
     * @param string $objectType The object type of the pipeline being created (ex. deals or tickets)
     * @param int $displayOrder The order for displaying this pipeline. If two pipelines have a matching `displayOrder`, they will be sorted alphabetically by label.
     * @param string $label A unique label used to organize pipelines in HubSpot's UI
     * @param list<array{
     *   displayOrder: int, label: string, metadata: array<string,string>
     * }> $stages Pipeline stage inputs used to create the new or replacement pipeline
     *
     * @throws APIException
     */
    public function create(
        string $objectType,
        int $displayOrder,
        string $label,
        array $stages,
        ?RequestOptions $requestOptions = null,
    ): Pipeline {
        $params = [
            'displayOrder' => $displayOrder, 'label' => $label, 'stages' => $stages,
        ];

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->create($objectType, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Perform a partial update of the pipeline identified by `{pipelineId}`. The updated pipeline will be returned in the response.
     *
     * @param string $pipelineID path param: The unique identifier of the pipeline to be updated
     * @param string $objectType Path param: The object type of the pipeline being updated (ex. deals or tickets)
     * @param bool $validateDealStageUsagesBeforeDelete query param: Indicates whether to validate deal stage usages before deleting the pipeline
     * @param bool $validateReferencesBeforeDelete query param: Indicates whether to validate references before deleting the pipeline
     * @param bool $archived Body param: Whether the pipeline is archived. This property should only be provided when restoring an archived pipeline. If it's provided in any other call, the request will fail and a `400 Bad Request` will be returned.
     * @param int $displayOrder Body param: The order for displaying this pipeline. If two pipelines have a matching `displayOrder`, they will be sorted alphabetically by label.
     * @param string $label Body param: A unique label used to organize pipelines in HubSpot's UI
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
        // @phpstan-ignore-next-line function.impossibleType
        $params = array_filter($params, callback: static fn ($v) => !is_null($v));

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->update($pipelineID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Return all pipelines for the object type specified by `{objectType}`.
     *
     * @param string $objectType The object type of the pipelines being retrieved (ex. deals or tickets)
     *
     * @throws APIException
     */
    public function list(
        string $objectType,
        ?RequestOptions $requestOptions = null
    ): CollectionResponsePipelineNoPaging {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->list($objectType, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Delete a pipeline identified by its unique pipelineId
     *
     * @param string $pipelineID path param: The unique identifier of the pipeline to be deleted
     * @param string $objectType Path param: The object type of the pipeline being deleted (ex. deals or tickets)
     * @param bool $validateDealStageUsagesBeforeDelete query param: Indicates whether to validate deal stage usages before deleting the pipeline
     * @param bool $validateReferencesBeforeDelete query param: Indicates whether to validate references before deleting the pipeline
     *
     * @throws APIException
     */
    public function delete(
        string $pipelineID,
        string $objectType,
        bool $validateDealStageUsagesBeforeDelete = false,
        bool $validateReferencesBeforeDelete = false,
        ?RequestOptions $requestOptions = null,
    ): mixed {
        $params = [
            'objectType' => $objectType,
            'validateDealStageUsagesBeforeDelete' => $validateDealStageUsagesBeforeDelete,
            'validateReferencesBeforeDelete' => $validateReferencesBeforeDelete,
        ];
        // @phpstan-ignore-next-line function.impossibleType
        $params = array_filter($params, callback: static fn ($v) => !is_null($v));

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->delete($pipelineID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Return a single pipeline object identified by its unique `{pipelineId}`.
     *
     * @param string $pipelineID the unique identifier of the pipeline to be retrieved
     * @param string $objectType The object type of the pipeline being retrieved (ex. deals or tickets)
     *
     * @throws APIException
     */
    public function get(
        string $pipelineID,
        string $objectType,
        ?RequestOptions $requestOptions = null,
    ): Pipeline {
        $params = ['objectType' => $objectType];

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->get($pipelineID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Return a reverse chronological list of all mutations that have occurred on the pipeline identified by `{pipelineId}`.
     *
     * @param string $pipelineID the unique identifier for the pipeline whose audit history is being retrieved
     * @param string $objectType The object type of the pipeline audit being retrieved (ex. deals or tickets)
     *
     * @throws APIException
     */
    public function getAudit(
        string $pipelineID,
        string $objectType,
        ?RequestOptions $requestOptions = null,
    ): CollectionResponsePublicAuditInfoNoPaging {
        $params = ['objectType' => $objectType];

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->getAudit($pipelineID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Replace all properties of an existing pipeline with the provided values.
     *
     * @param string $pipelineID path param: The unique identifier of the pipeline to be replaced
     * @param string $objectType Path param: The object type of the pipeline being replaced (ex. deals or tickets)
     * @param int $displayOrder Body param: The order for displaying this pipeline. If two pipelines have a matching `displayOrder`, they will be sorted alphabetically by label.
     * @param string $label Body param: A unique label used to organize pipelines in HubSpot's UI
     * @param list<array{
     *   displayOrder: int, label: string, metadata: array<string,string>
     * }> $stages Body param: Pipeline stage inputs used to create the new or replacement pipeline
     * @param bool $validateDealStageUsagesBeforeDelete query param: Indicates whether to validate deal stage usages before deleting the pipeline
     * @param bool $validateReferencesBeforeDelete query param: Indicates whether to validate references before deleting the pipeline
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
        // @phpstan-ignore-next-line function.impossibleType
        $params = array_filter($params, callback: static fn ($v) => !is_null($v));

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->replace($pipelineID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
