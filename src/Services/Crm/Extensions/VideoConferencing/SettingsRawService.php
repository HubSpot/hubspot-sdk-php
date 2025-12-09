<?php

declare(strict_types=1);

namespace HubspotSDK\Services\Crm\Extensions\VideoConferencing;

use HubspotSDK\Client;
use HubspotSDK\Core\Contracts\BaseResponse;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Crm\Extensions\VideoConferencing\ExternalSettings;
use HubspotSDK\Crm\Extensions\VideoConferencing\Settings\SettingUpdateParams;
use HubspotSDK\RequestOptions;
use HubspotSDK\ServiceContracts\Crm\Extensions\VideoConferencing\SettingsRawContract;

final class SettingsRawService implements SettingsRawContract
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
     *   createMeetingURL: string,
     *   deleteMeetingURL?: string,
     *   fetchAccountsUri?: string,
     *   updateMeetingURL?: string,
     *   userVerifyURL?: string,
     * }|SettingUpdateParams $params
     *
     * @return BaseResponse<ExternalSettings>
     *
     * @throws APIException
     */
    public function update(
        int $appID,
        array|SettingUpdateParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = SettingUpdateParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
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
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function delete(
        int $appID,
        ?RequestOptions $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
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
     * @return BaseResponse<ExternalSettings>
     *
     * @throws APIException
     */
    public function get(
        int $appID,
        ?RequestOptions $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['crm/v3/extensions/videoconferencing/settings/%1$s', $appID],
            options: $requestOptions,
            convert: ExternalSettings::class,
        );
    }
}
