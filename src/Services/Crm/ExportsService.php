<?php

declare(strict_types=1);

namespace HubSpotSDK\Services\Crm;

use HubSpotSDK\Client;
use HubSpotSDK\Core\Exceptions\APIException;
use HubSpotSDK\Core\Util;
use HubSpotSDK\Crm\Exports\ActionResponseWithSingleResultUri;
use HubSpotSDK\Crm\Exports\ExportCreateAsyncParams\ExportInternalValuesOption;
use HubSpotSDK\Crm\Exports\ExportCreateAsyncParams\ExportType;
use HubSpotSDK\Crm\Exports\ExportCreateAsyncParams\Format;
use HubSpotSDK\Crm\Exports\ExportCreateAsyncParams\Language;
use HubSpotSDK\Crm\Exports\PublicCrmSearchRequest;
use HubSpotSDK\Crm\Exports\PublicExportResponse;
use HubSpotSDK\RequestOptions;
use HubSpotSDK\ServiceContracts\Crm\ExportsContract;
use HubSpotSDK\TaskLocator;

/**
 * @phpstan-import-type PublicCrmSearchRequestShape from \HubSpotSDK\Crm\Exports\PublicCrmSearchRequest
 * @phpstan-import-type RequestOpts from \HubSpotSDK\RequestOptions
 */
final class ExportsService implements ExportsContract
{
    /**
     * @api
     */
    public ExportsRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new ExportsRawService($client);
    }

    /**
     * @api
     *
     * Begins exporting CRM data for the portal as specified in the request body
     *
     * @param list<string> $associatedObjectType
     * @param list<ExportInternalValuesOption|value-of<ExportInternalValuesOption>> $exportInternalValuesOptions
     * @param Format|value-of<Format> $format
     * @param Language|value-of<Language> $language
     * @param list<string> $objectProperties
     * @param ExportType|value-of<ExportType> $exportType
     * @param PublicCrmSearchRequest|PublicCrmSearchRequestShape $publicCrmSearchRequest
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function createAsync(
        array $associatedObjectType,
        array $exportInternalValuesOptions,
        string $exportName,
        Format|string $format,
        bool $includeLabeledAssociations,
        bool $includePrimaryDisplayPropertyForAssociatedObjects,
        Language|string $language,
        array $objectProperties,
        string $objectType,
        bool $overrideAssociatedObjectsPerDefinitionPerRowLimit,
        string $listID,
        ExportType|string $exportType = 'LIST',
        PublicCrmSearchRequest|array|null $publicCrmSearchRequest = null,
        RequestOptions|array|null $requestOptions = null,
    ): TaskLocator {
        $params = Util::removeNulls(
            [
                'associatedObjectType' => $associatedObjectType,
                'exportInternalValuesOptions' => $exportInternalValuesOptions,
                'exportName' => $exportName,
                'exportType' => $exportType,
                'format' => $format,
                'includeLabeledAssociations' => $includeLabeledAssociations,
                'includePrimaryDisplayPropertyForAssociatedObjects' => $includePrimaryDisplayPropertyForAssociatedObjects,
                'language' => $language,
                'objectProperties' => $objectProperties,
                'objectType' => $objectType,
                'overrideAssociatedObjectsPerDefinitionPerRowLimit' => $overrideAssociatedObjectsPerDefinitionPerRowLimit,
                'publicCrmSearchRequest' => $publicCrmSearchRequest,
                'listID' => $listID,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->createAsync(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Retrieve detailed information about a specific CRM export, including its current state and properties.
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function get(
        int $exportID,
        RequestOptions|array|null $requestOptions = null
    ): PublicExportResponse {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->get($exportID, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Returns the status of the export with taskId, including the URL of the resulting file if the export status is COMPLETE
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function getStatus(
        int $taskID,
        RequestOptions|array|null $requestOptions = null
    ): ActionResponseWithSingleResultUri {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->getStatus($taskID, requestOptions: $requestOptions);

        return $response->parse();
    }
}
