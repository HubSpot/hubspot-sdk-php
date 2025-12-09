<?php

declare(strict_types=1);

namespace HubspotSDK\Services\Crm\Extensions\VideoConferencing;

use HubspotSDK\Client;
use HubspotSDK\Core\Contracts\BaseResponse;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Crm\Extensions\VideoConferencing\ExternalSettings;
use HubspotSDK\Crm\Extensions\VideoConferencing\Settings\SettingUpdateParams;
use HubspotSDK\RequestOptions;
use HubspotSDK\ServiceContracts\Crm\Extensions\VideoConferencing\SettingsContract;

final class SettingsService implements SettingsContract
{
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * @param array{
     *   createMeetingURL: string,
     *   deleteMeetingURL?: string,
     *   fetchAccountsUri?: string,
     *   updateMeetingURL?: string,
     *   userVerifyURL?: string,
     * }|SettingUpdateParams $params
     *
     * @throws APIException
     */
    public function update(
        int $appID,
        array|SettingUpdateParams $params,
        ?RequestOptions $requestOptions = null,
    ): ExternalSettings {
        [$parsed, $options] = SettingUpdateParams::parseRequest(
            $params,
            $requestOptions,
        );

        /** @var BaseResponse<ExternalSettings> */
        $response = $this->client->request(
            method: 'put',
            path: ['crm/v3/extensions/videoconferencing/settings/%1$s', $appID],
            body: (object) $parsed,
            options: $options,
            convert: ExternalSettings::class,
        );

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
        /** @var BaseResponse<mixed> */
        $response = $this->client->request(
            method: 'delete',
            path: ['crm/v3/extensions/videoconferencing/settings/%1$s', $appID],
            options: $requestOptions,
            convert: null,
        );

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
        /** @var BaseResponse<ExternalSettings> */
        $response = $this->client->request(
            method: 'get',
            path: ['crm/v3/extensions/videoconferencing/settings/%1$s', $appID],
            options: $requestOptions,
            convert: ExternalSettings::class,
        );

        return $response->parse();
    }
}
