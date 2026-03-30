<?php

declare(strict_types=1);

namespace HubspotSDK\Services\Crm\Extensions;

use HubspotSDK\Client;
use HubspotSDK\Core\Contracts\BaseResponse;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Crm\Extensions\VideoConferencing\ExternalSettings;
use HubspotSDK\Crm\Extensions\VideoConferencing\VideoConferencingUpdateParams;
use HubspotSDK\RequestOptions;
use HubspotSDK\ServiceContracts\Crm\Extensions\VideoConferencingRawContract;

/**
 * @phpstan-import-type RequestOpts from \HubspotSDK\RequestOptions
 */
final class VideoConferencingRawService implements VideoConferencingRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Create or update video conference extension settings for your app
     *
     * @param array{
     *   createMeetingURL: string,
     *   deleteMeetingURL?: string,
     *   fetchAccountsUri?: string,
     *   updateMeetingURL?: string,
     *   userVerifyURL?: string,
     * }|VideoConferencingUpdateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<ExternalSettings>
     *
     * @throws APIException
     */
    public function update(
        int $appID,
        array|VideoConferencingUpdateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = VideoConferencingUpdateParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'put',
            path: ['crm/extensions/videoconferencing/2026-03/settings/%1$s', $appID],
            body: (object) $parsed,
            options: $options,
            convert: ExternalSettings::class,
        );
    }

    /**
     * @api
     *
     * Delete video conference extension settings for your app
     *
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function delete(
        int $appID,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'delete',
            path: ['crm/extensions/videoconferencing/2026-03/settings/%1$s', $appID],
            options: $requestOptions,
            convert: null,
        );
    }

    /**
     * @api
     *
     * Fetch video conference extension settings for your app
     *
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<ExternalSettings>
     *
     * @throws APIException
     */
    public function get(
        int $appID,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['crm/extensions/videoconferencing/2026-03/settings/%1$s', $appID],
            options: $requestOptions,
            convert: ExternalSettings::class,
        );
    }
}
