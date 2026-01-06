<?php

declare(strict_types=1);

namespace HubspotSDK\Services\Crm\Associations\V4;

use HubspotSDK\Client;
use HubspotSDK\Core\Contracts\BaseResponse;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Crm\Associations\V4\ReportCreationResponse;
use HubspotSDK\RequestOptions;
use HubspotSDK\ServiceContracts\Crm\Associations\V4\ReportRawContract;

final class ReportRawService implements ReportRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Requests a report of all objects in the portal which have a high usage of associations
     *
     * @param int $userID The user for the report
     *
     * @return BaseResponse<ReportCreationResponse>
     *
     * @throws APIException
     */
    public function requestHighUsageReport(
        int $userID,
        ?RequestOptions $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: ['crm/v4/associations/usage/high-usage-report/%1$s', $userID],
            options: $requestOptions,
            convert: ReportCreationResponse::class,
        );
    }
}
