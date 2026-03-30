<?php

declare(strict_types=1);

namespace HubspotSDK\Services\Crm\Timeline;

use HubspotSDK\Client;
use HubspotSDK\Core\Contracts\BaseResponse;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Crm\Timeline\AppEventOccurrence;
use HubspotSDK\Crm\Timeline\Batch\BatchCreateParams;
use HubspotSDK\Crm\Timeline\BatchResponseAppEventOccurrence;
use HubspotSDK\RequestOptions;
use HubspotSDK\ServiceContracts\Crm\Timeline\BatchRawContract;

/**
 * @phpstan-import-type AppEventOccurrenceShape from \HubspotSDK\Crm\Timeline\AppEventOccurrence
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
     * @param array{
     *   inputs: list<AppEventOccurrence|AppEventOccurrenceShape>
     * }|BatchCreateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<BatchResponseAppEventOccurrence>
     *
     * @throws APIException
     */
    public function create(
        array|BatchCreateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = BatchCreateParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: 'integrators/timeline/2026-03/events/batch',
            body: (object) $parsed,
            options: $options,
            convert: BatchResponseAppEventOccurrence::class,
        );
    }
}
