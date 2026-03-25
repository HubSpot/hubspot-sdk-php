<?php

declare(strict_types=1);

namespace HubspotSDK\Services\Crm\Extensions;

use HubspotSDK\Client;
use HubspotSDK\Core\Contracts\BaseResponse;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Crm\Extensions\Calling\CallingCreateParams;
use HubspotSDK\Crm\Extensions\Calling\CallingMarkReadyParams;
use HubspotSDK\Crm\Extensions\Calling\CallingUpdateParams;
use HubspotSDK\Crm\Extensions\Calling\RecordingSettingsResponse;
use HubspotSDK\RequestOptions;
use HubspotSDK\ServiceContracts\Crm\Extensions\CallingRawContract;

/**
 * @phpstan-import-type RequestOpts from \HubspotSDK\RequestOptions
 */
final class CallingRawService implements CallingRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * @param array{urlToRetrieveAuthedRecording: string}|CallingCreateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<RecordingSettingsResponse>
     *
     * @throws APIException
     */
    public function create(
        int $appID,
        array|CallingCreateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = CallingCreateParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: ['crm/extensions/calling/2026-03/%1$s/settings/recording', $appID],
            body: (object) $parsed,
            options: $options,
            convert: RecordingSettingsResponse::class,
        );
    }

    /**
     * @api
     *
     * @param array{urlToRetrieveAuthedRecording?: string}|CallingUpdateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<RecordingSettingsResponse>
     *
     * @throws APIException
     */
    public function update(
        int $appID,
        array|CallingUpdateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = CallingUpdateParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'patch',
            path: ['crm/extensions/calling/2026-03/%1$s/settings/recording', $appID],
            body: (object) $parsed,
            options: $options,
            convert: RecordingSettingsResponse::class,
        );
    }

    /**
     * @api
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
            path: [
                'crm/extensions/calling/2026-03/%1$s/settings/channel-connection',
                $appID,
            ],
            options: $requestOptions,
            convert: null,
        );
    }

    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<RecordingSettingsResponse>
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
            path: ['crm/extensions/calling/2026-03/%1$s/settings/recording', $appID],
            options: $requestOptions,
            convert: RecordingSettingsResponse::class,
        );
    }

    /**
     * @api
     *
     * @param array{engagementID: int}|CallingMarkReadyParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function markReady(
        array|CallingMarkReadyParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = CallingMarkReadyParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: 'crm/extensions/calling/2026-03/recordings/ready',
            body: (object) $parsed,
            options: $options,
            convert: null,
        );
    }
}
