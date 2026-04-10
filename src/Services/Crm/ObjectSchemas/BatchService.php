<?php

declare(strict_types=1);

namespace HubSpotSDK\Services\Crm\ObjectSchemas;

use HubSpotSDK\Client;
use HubSpotSDK\Core\Exceptions\APIException;
use HubSpotSDK\Core\Util;
use HubSpotSDK\Crm\ObjectSchemas\CollectionResponseObjectSchemaNoPaging;
use HubSpotSDK\RequestOptions;
use HubSpotSDK\ServiceContracts\Crm\ObjectSchemas\BatchContract;

/**
 * @phpstan-import-type RequestOpts from \HubSpotSDK\RequestOptions
 */
final class BatchService implements BatchContract
{
    /**
     * @api
     */
    public BatchRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new BatchRawService($client);
    }

    /**
     * @api
     *
     * Retrieve details of multiple custom object schemas by providing a batch request with specified inputs. This operation allows you to fetch schema information, including properties and associations, for multiple custom objects in a single API call.
     *
     * @param bool $includeAssociationDefinitions indicates whether to include association definitions in the response
     * @param bool $includeAuditMetadata indicates whether to include audit metadata in the response
     * @param bool $includePropertyDefinitions indicates whether to include property definitions in the response
     * @param list<string> $inputs
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function get(
        bool $includeAssociationDefinitions,
        bool $includeAuditMetadata,
        bool $includePropertyDefinitions,
        array $inputs,
        RequestOptions|array|null $requestOptions = null,
    ): CollectionResponseObjectSchemaNoPaging {
        $params = Util::removeNulls(
            [
                'includeAssociationDefinitions' => $includeAssociationDefinitions,
                'includeAuditMetadata' => $includeAuditMetadata,
                'includePropertyDefinitions' => $includePropertyDefinitions,
                'inputs' => $inputs,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->get(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
