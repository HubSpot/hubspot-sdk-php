<?php

declare(strict_types=1);

namespace HubspotSDK\Services\Crm\Extensions\VideoConferencing;

use HubspotSDK\Client;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Crm\Extensions\VideoConferencing\ExternalSettings;
use HubspotSDK\RequestOptions;
use HubspotSDK\ServiceContracts\Crm\Extensions\VideoConferencing\SettingsContract;

final class SettingsService implements SettingsContract
{
    /**
     * @api
     */
    public SettingsRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new SettingsRawService($client);
    }

    /**
     * @api
     *
     * @param string $createMeetingURL the URL that HubSpot will send requests to create a new video conference
     * @param string $deleteMeetingURL the URL that HubSpot will send notifications of meetings that have been deleted in HubSpot
     * @param string $updateMeetingURL The URL that HubSpot will send updates to existing meetings. Typically called when the user changes the topic or times of a meeting.
     * @param string $userVerifyURL the URL that HubSpot will use to verify that a user exists in the video conference application
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
        ?RequestOptions $requestOptions = null,
    ): ExternalSettings {
        $params = [
            'createMeetingURL' => $createMeetingURL,
            'deleteMeetingURL' => $deleteMeetingURL,
            'fetchAccountsUri' => $fetchAccountsUri,
            'updateMeetingURL' => $updateMeetingURL,
            'userVerifyURL' => $userVerifyURL,
        ];
        // @phpstan-ignore-next-line function.impossibleType
        $params = array_filter($params, callback: static fn ($v) => !is_null($v));

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->update($appID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * @throws APIException
     */
    public function delete(
        int $appID,
        ?RequestOptions $requestOptions = null
    ): mixed {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->delete($appID, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * @throws APIException
     */
    public function get(
        int $appID,
        ?RequestOptions $requestOptions = null
    ): ExternalSettings {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->get($appID, requestOptions: $requestOptions);

        return $response->parse();
    }
}
