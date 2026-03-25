<?php

declare(strict_types=1);

namespace HubspotSDK\Services\Crm\Extensions;

use HubspotSDK\Client;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Core\Util;
use HubspotSDK\Crm\Extensions\VideoConferencing\ExternalSettings;
use HubspotSDK\RequestOptions;
use HubspotSDK\ServiceContracts\Crm\Extensions\VideoConferencingContract;

/**
 * @phpstan-import-type RequestOpts from \HubspotSDK\RequestOptions
 */
final class VideoConferencingService implements VideoConferencingContract
{
    /**
     * @api
     */
    public VideoConferencingRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new VideoConferencingRawService($client);
    }

    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function update(
        int $appID,
        string $createMeetingURL,
        ?string $deleteMeetingURL = null,
        ?string $fetchAccountsUri = null,
        ?string $updateMeetingURL = null,
        ?string $userVerifyURL = null,
        RequestOptions|array|null $requestOptions = null,
    ): ExternalSettings {
        $params = Util::removeNulls(
            [
                'createMeetingURL' => $createMeetingURL,
                'deleteMeetingURL' => $deleteMeetingURL,
                'fetchAccountsUri' => $fetchAccountsUri,
                'updateMeetingURL' => $updateMeetingURL,
                'userVerifyURL' => $userVerifyURL,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->update($appID, params: $params, requestOptions: $requestOptions);

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
        int $appID,
        RequestOptions|array|null $requestOptions = null
    ): mixed {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->delete($appID, requestOptions: $requestOptions);

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
        int $appID,
        RequestOptions|array|null $requestOptions = null
    ): ExternalSettings {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->get($appID, requestOptions: $requestOptions);

        return $response->parse();
    }
}
