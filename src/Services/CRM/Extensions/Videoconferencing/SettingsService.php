<?php

declare(strict_types=1);

namespace HubspotSDK\Services\CRM\Extensions\Videoconferencing;

use HubspotSDK\Client;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\CRM\Extensions\Videoconferencing\ExternalSettings;
use HubspotSDK\CRM\Extensions\Videoconferencing\Settings\SettingUpdateParams;
use HubspotSDK\RequestOptions;
use HubspotSDK\ServiceContracts\CRM\Extensions\Videoconferencing\SettingsContract;

use const HubspotSDK\Core\OMIT as omit;

final class SettingsService implements SettingsContract
{
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Updates the settings for a video conference application with the specified ID.
     *
     * @param string $createMeetingURL the URL that HubSpot will send requests to create a new video conference
     * @param string $deleteMeetingURL the URL that HubSpot will send notifications of meetings that have been deleted in HubSpot
     * @param string $fetchAccountsUri
     * @param string $updateMeetingURL The URL that HubSpot will send updates to existing meetings. Typically called when the user changes the topic or times of a meeting.
     * @param string $userVerifyURL the URL that HubSpot will use to verify that a user exists in the video conference application
     *
     * @throws APIException
     */
    public function update(
        int $appID,
        $createMeetingURL,
        $deleteMeetingURL = omit,
        $fetchAccountsUri = omit,
        $updateMeetingURL = omit,
        $userVerifyURL = omit,
        ?RequestOptions $requestOptions = null,
    ): ExternalSettings {
        $params = [
            'createMeetingURL' => $createMeetingURL,
            'deleteMeetingURL' => $deleteMeetingURL,
            'fetchAccountsUri' => $fetchAccountsUri,
            'updateMeetingURL' => $updateMeetingURL,
            'userVerifyURL' => $userVerifyURL,
        ];

        return $this->updateRaw($appID, $params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function updateRaw(
        int $appID,
        array $params,
        ?RequestOptions $requestOptions = null
    ): ExternalSettings {
        [$parsed, $options] = SettingUpdateParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'put',
            path: ['crm/v3/extensions/videoconferencing/settings/%1$s', $appID],
            body: (object) $parsed,
            options: $options,
            convert: ExternalSettings::class,
        );
    }

    /**
     * @api
     *
     * Deletes the settings for a video conference application with the specified ID.
     *
     * @throws APIException
     */
    public function delete(
        int $appID,
        ?RequestOptions $requestOptions = null
    ): mixed {
        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'delete',
            path: ['crm/v3/extensions/videoconferencing/settings/%1$s', $appID],
            options: $requestOptions,
            convert: null,
        );
    }

    /**
     * @api
     *
     * Return the settings for a video conference application with the specified ID.
     *
     * @throws APIException
     */
    public function get(
        int $appID,
        ?RequestOptions $requestOptions = null
    ): ExternalSettings {
        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: ['crm/v3/extensions/videoconferencing/settings/%1$s', $appID],
            options: $requestOptions,
            convert: ExternalSettings::class,
        );
    }
}
