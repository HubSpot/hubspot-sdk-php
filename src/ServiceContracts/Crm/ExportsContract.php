<?php

declare(strict_types=1);

namespace HubSpotSDK\ServiceContracts\Crm;

use HubSpotSDK\Core\Exceptions\APIException;
use HubSpotSDK\Crm\Exports\ActionResponseWithSingleResultUri;
use HubSpotSDK\Crm\Exports\ExportCreateAsyncParams\ExportInternalValuesOption;
use HubSpotSDK\Crm\Exports\ExportCreateAsyncParams\ExportType;
use HubSpotSDK\Crm\Exports\ExportCreateAsyncParams\Format;
use HubSpotSDK\Crm\Exports\ExportCreateAsyncParams\Language;
use HubSpotSDK\Crm\Exports\PublicCrmSearchRequest;
use HubSpotSDK\Crm\Exports\PublicExportResponse;
use HubSpotSDK\RequestOptions;
use HubSpotSDK\TaskLocator;

/**
 * @phpstan-import-type PublicCrmSearchRequestShape from \HubSpotSDK\Crm\Exports\PublicCrmSearchRequest
 * @phpstan-import-type RequestOpts from \HubSpotSDK\RequestOptions
 */
interface ExportsContract
{
    /**
     * @api
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
    ): TaskLocator;

    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function get(
        int $exportID,
        RequestOptions|array|null $requestOptions = null
    ): PublicExportResponse;

    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function getStatus(
        int $taskID,
        RequestOptions|array|null $requestOptions = null
    ): ActionResponseWithSingleResultUri;
}
