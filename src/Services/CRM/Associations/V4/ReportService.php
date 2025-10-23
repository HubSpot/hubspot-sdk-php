<?php

declare(strict_types=1);

namespace HubspotSDK\Services\CRM\Associations\V4;

use HubspotSDK\Client;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\CRM\Associations\V4\ReportCreationResponse;
use HubspotSDK\RequestOptions;
use HubspotSDK\ServiceContracts\CRM\Associations\V4\ReportContract;

final class ReportService implements ReportContract
{
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Requests a report of all objects in the portal which have a high usage of associations
     *
     * @throws APIException
     */
    public function requestHighUsageReport(
        int $userID,
        ?RequestOptions $requestOptions = null
    ): ReportCreationResponse {
        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'post',
            path: ['crm/v4/associations/usage/high-usage-report/%1$s', $userID],
            options: $requestOptions,
            convert: ReportCreationResponse::class,
        );
    }
}
