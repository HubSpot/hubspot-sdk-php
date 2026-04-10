<?php

declare(strict_types=1);

namespace HubSpotSDK\Services\Crm\Extensions;

use HubSpotSDK\Client;
use HubSpotSDK\Core\Exceptions\APIException;
use HubSpotSDK\Core\Util;
use HubSpotSDK\Crm\Extensions\VideoConferencing\ExternalSettings;
use HubSpotSDK\RequestOptions;
use HubSpotSDK\ServiceContracts\Crm\Extensions\VideoConferencingContract;

/**
 * @phpstan-import-type RequestOpts from \HubSpotSDK\RequestOptions
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
     * Create or update video conference extension settings for your app
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
     * Delete video conference extension settings for your app
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
     * Fetch video conference extension settings for your app
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
