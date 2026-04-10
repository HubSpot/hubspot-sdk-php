<?php

declare(strict_types=1);

namespace HubSpotSDK\Services\Crm\Timeline;

use HubSpotSDK\Client;
use HubSpotSDK\Core\Contracts\BaseResponse;
use HubSpotSDK\Core\Exceptions\APIException;
use HubSpotSDK\Crm\Timeline\AppEventOccurrence;
use HubSpotSDK\Crm\Timeline\Batch\BatchCreateParams;
use HubSpotSDK\Crm\Timeline\BatchResponseAppEventOccurrence;
use HubSpotSDK\RequestOptions;
use HubSpotSDK\ServiceContracts\Crm\Timeline\BatchRawContract;

/**
 * @phpstan-import-type AppEventOccurrenceShape from \HubSpotSDK\Crm\Timeline\AppEventOccurrence
 * @phpstan-import-type RequestOpts from \HubSpotSDK\RequestOptions
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
