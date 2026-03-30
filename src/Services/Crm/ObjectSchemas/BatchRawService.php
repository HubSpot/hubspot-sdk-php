<?php

declare(strict_types=1);

namespace HubspotSDK\Services\Crm\ObjectSchemas;

use HubspotSDK\Client;
use HubspotSDK\Core\Contracts\BaseResponse;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Crm\ObjectSchemas\Batch\BatchGetParams;
use HubspotSDK\Crm\ObjectSchemas\CollectionResponseObjectSchemaNoPaging;
use HubspotSDK\RequestOptions;
use HubspotSDK\ServiceContracts\Crm\ObjectSchemas\BatchRawContract;

/**
 * @phpstan-import-type RequestOpts from \HubspotSDK\RequestOptions
 */
final class BatchRawService implements BatchRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Retrieve details of multiple custom object schemas by providing a batch request with specified inputs. This operation allows you to fetch schema information, including properties and associations, for multiple custom objects in a single API call.
     *
     * @param array{
     *   includeAssociationDefinitions: bool,
     *   includeAuditMetadata: bool,
     *   includePropertyDefinitions: bool,
     *   inputs: list<string>,
     * }|BatchGetParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<CollectionResponseObjectSchemaNoPaging>
     *
     * @throws APIException
     */
    public function get(
        array|BatchGetParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = BatchGetParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: 'crm-object-schemas/2026-03/schemas/batch/read',
            body: (object) $parsed,
            options: $options,
            convert: CollectionResponseObjectSchemaNoPaging::class,
        );
    }
}
