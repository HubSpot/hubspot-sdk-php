<?php

declare(strict_types=1);

namespace HubspotSDK\Services\DataStudio;

use HubspotSDK\Client;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Core\Util;
use HubspotSDK\DataStudio\Datasource\ContentDisposition;
use HubspotSDK\DataStudio\Datasource\DataSourceGetResponse;
use HubspotSDK\DataStudio\Datasource\DataSourceUpdateResponse;
use HubspotSDK\DataStudio\Datasource\MediaType;
use HubspotSDK\DataStudio\Datasource\MultiPart;
use HubspotSDK\DataStudio\Datasource\ParameterizedHeader;
use HubspotSDK\RequestOptions;
use HubspotSDK\ServiceContracts\DataStudio\DatasourceContract;

/**
 * @phpstan-import-type ContentDispositionShape from \HubspotSDK\DataStudio\Datasource\ContentDisposition
 * @phpstan-import-type MediaTypeShape from \HubspotSDK\DataStudio\Datasource\MediaType
 * @phpstan-import-type ParameterizedHeaderShape from \HubspotSDK\DataStudio\Datasource\ParameterizedHeader
 * @phpstan-import-type MultiPartShape from \HubspotSDK\DataStudio\Datasource\MultiPart
 * @phpstan-import-type RequestOpts from \HubspotSDK\RequestOptions
 */
final class DatasourceService implements DatasourceContract
{
    /**
     * @api
     */
    public DatasourceRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new DatasourceRawService($client);
    }

    /**
     * @api
     *
     * @param list<mixed> $bodyParts an array of BodyPart objects, each representing a part of the multipart form data
     * @param ContentDisposition|ContentDispositionShape $contentDisposition
     * @param mixed $entity an object representing the entity of the multipart form data, containing the actual data to be processed
     * @param array<string,mixed> $fields an object containing fields of the multipart form data, where each field can have multiple FormDataBodyPart items
     * @param array<string,list<string>> $headers an object containing headers associated with the multipart form data, where each header can have multiple string values
     * @param MediaType|MediaTypeShape $mediaType
     * @param mixed $messageBodyWorkers an object representing workers that process the message body of the multipart form data
     * @param array<string,list<ParameterizedHeader|ParameterizedHeaderShape>> $parameterizedHeaders an object containing parameterized headers, where each header can have multiple ParameterizedHeader items
     * @param mixed $providers an object representing providers associated with the multipart form data
     * @param MultiPart|MultiPartShape $parent
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function create(
        array $bodyParts,
        ContentDisposition|array $contentDisposition,
        mixed $entity,
        array $fields,
        array $headers,
        MediaType|array $mediaType,
        mixed $messageBodyWorkers,
        array $parameterizedHeaders,
        mixed $providers,
        MultiPart|array|null $parent = null,
        RequestOptions|array|null $requestOptions = null,
    ): string {
        $params = Util::removeNulls(
            [
                'bodyParts' => $bodyParts,
                'contentDisposition' => $contentDisposition,
                'entity' => $entity,
                'fields' => $fields,
                'headers' => $headers,
                'mediaType' => $mediaType,
                'messageBodyWorkers' => $messageBodyWorkers,
                'parameterizedHeaders' => $parameterizedHeaders,
                'providers' => $providers,
                'parent' => $parent,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->create(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * @param list<mixed> $bodyParts an array of BodyPart objects, each representing a part of the multipart form data
     * @param ContentDisposition|ContentDispositionShape $contentDisposition
     * @param mixed $entity an object representing the entity of the multipart form data, containing the actual data to be processed
     * @param array<string,mixed> $fields an object containing fields of the multipart form data, where each field can have multiple FormDataBodyPart items
     * @param array<string,list<string>> $headers an object containing headers associated with the multipart form data, where each header can have multiple string values
     * @param MediaType|MediaTypeShape $mediaType
     * @param mixed $messageBodyWorkers an object representing workers that process the message body of the multipart form data
     * @param array<string,list<ParameterizedHeader|ParameterizedHeaderShape>> $parameterizedHeaders an object containing parameterized headers, where each header can have multiple ParameterizedHeader items
     * @param mixed $providers an object representing providers associated with the multipart form data
     * @param MultiPart|MultiPartShape $parent
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function update(
        int $datasourceID,
        array $bodyParts,
        ContentDisposition|array $contentDisposition,
        mixed $entity,
        array $fields,
        array $headers,
        MediaType|array $mediaType,
        mixed $messageBodyWorkers,
        array $parameterizedHeaders,
        mixed $providers,
        MultiPart|array|null $parent = null,
        RequestOptions|array|null $requestOptions = null,
    ): DataSourceUpdateResponse {
        $params = Util::removeNulls(
            [
                'bodyParts' => $bodyParts,
                'contentDisposition' => $contentDisposition,
                'entity' => $entity,
                'fields' => $fields,
                'headers' => $headers,
                'mediaType' => $mediaType,
                'messageBodyWorkers' => $messageBodyWorkers,
                'parameterizedHeaders' => $parameterizedHeaders,
                'providers' => $providers,
                'parent' => $parent,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->update($datasourceID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function delete(
        int $datasourceID,
        RequestOptions|array|null $requestOptions = null
    ): string {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->delete($datasourceID, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function get(
        int $datasourceID,
        RequestOptions|array|null $requestOptions = null
    ): DataSourceGetResponse {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->get($datasourceID, requestOptions: $requestOptions);

        return $response->parse();
    }
}
