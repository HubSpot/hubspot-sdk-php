<?php

declare(strict_types=1);

namespace HubspotSDK\Services\Crm\Associations\V4;

use HubspotSDK\Client;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Crm\Associations\V4\ReportCreationResponse;
use HubspotSDK\RequestOptions;
use HubspotSDK\ServiceContracts\Crm\Associations\V4\ReportContract;

final class ReportService implements ReportContract
{
    /**
     * @api
     */
    public ReportRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new ReportRawService($client);
    }

    /**
     * @api
     *
     * Requests a report of all objects in the portal which have a high usage of associations
     *
     * @param int $userID The user for the report
     *
     * @throws APIException
     */
    public function requestHighUsageReport(
        int $userID,
        ?RequestOptions $requestOptions = null
    ): ReportCreationResponse {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->requestHighUsageReport($userID, requestOptions: $requestOptions);

        return $response->parse();
    }
}
