<?php

declare(strict_types=1);

namespace HubspotSDK\Services\Crm\Extensions;

use HubspotSDK\Client;
use HubspotSDK\Core\Contracts\BaseResponse;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Crm\Extensions\Calling\CallingCreateChannelConnectionSettingsParams;
use HubspotSDK\Crm\Extensions\Calling\CallingCreateInboundCallParams;
use HubspotSDK\Crm\Extensions\Calling\CallingCreateInboundCallParams\FinalCallStatus;
use HubspotSDK\Crm\Extensions\Calling\CallingCreateRecordingReadyParams;
use HubspotSDK\Crm\Extensions\Calling\CallingCreateRecordingSettingsParams;
use HubspotSDK\Crm\Extensions\Calling\CallingCreateSettingsParams;
use HubspotSDK\Crm\Extensions\Calling\CallingUpdateChannelConnectionSettingsParams;
use HubspotSDK\Crm\Extensions\Calling\CallingUpdateRecordingSettingsParams;
use HubspotSDK\Crm\Extensions\Calling\CallingUpdateSettingsParams;
use HubspotSDK\Crm\Extensions\Calling\ChannelConnectionSettingsResponse;
use HubspotSDK\Crm\Extensions\Calling\CompletedThirdPartyCallResponse;
use HubspotSDK\Crm\Extensions\Calling\FormattedPhoneNumber;
use HubspotSDK\Crm\Extensions\Calling\RecordingSettingsResponse;
use HubspotSDK\Crm\Extensions\Calling\SettingsResponse;
use HubspotSDK\RequestOptions;
use HubspotSDK\ServiceContracts\Crm\Extensions\CallingRawContract;

/**
 * @phpstan-import-type RequestOpts from \HubspotSDK\RequestOptions
 * @phpstan-import-type FormattedPhoneNumberShape from \HubspotSDK\Crm\Extensions\Calling\FormattedPhoneNumber
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
     * Establish new channel connection settings for the specified app.
     *
     * @param array{
     *   isReady: bool, url: string
     * }|CallingCreateChannelConnectionSettingsParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<ChannelConnectionSettingsResponse>
     *
     * @throws APIException
     */
    public function createChannelConnectionSettings(
        int $appID,
        array|CallingCreateChannelConnectionSettingsParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = CallingCreateChannelConnectionSettingsParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: [
                'crm/extensions/calling/2026-03/%1$s/settings/channel-connection',
                $appID,
            ],
            body: (object) $parsed,
            options: $options,
            convert: ChannelConnectionSettingsResponse::class,
        );
    }

    /**
     * @api
     *
     * @param array{
     *   createEngagement: bool,
     *   engagementProperties: array<string,string>,
     *   externalCallID: string,
     *   finalCallStatus: value-of<FinalCallStatus>,
     *   fromNumber: FormattedPhoneNumber|FormattedPhoneNumberShape,
     *   potentialRecipientUserIDs: list<int>,
     *   toNumber: FormattedPhoneNumber|FormattedPhoneNumberShape,
     *   callStartedTimestamp?: \DateTimeInterface,
     *   durationSeconds?: int,
     *   userID?: int,
     * }|CallingCreateInboundCallParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<CompletedThirdPartyCallResponse>
     *
     * @throws APIException
     */
    public function createInboundCall(
        array|CallingCreateInboundCallParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = CallingCreateInboundCallParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: 'crm/extensions/calling/2026-03/inbound-call',
            body: (object) $parsed,
            options: $options,
            convert: CompletedThirdPartyCallResponse::class,
        );
    }

    /**
     * @api
     *
     * This endpoint is used to mark a call recording as ready. It requires the engagementId to identify the specific recording.
     *
     * @param array{engagementID: int}|CallingCreateRecordingReadyParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function createRecordingReady(
        array|CallingCreateRecordingReadyParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = CallingCreateRecordingReadyParams::parseRequest(
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

    /**
     * @api
     *
     * Create new recording settings for a specific app using the provided app ID.
     *
     * @param array{
     *   urlToRetrieveAuthedRecording: string
     * }|CallingCreateRecordingSettingsParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<RecordingSettingsResponse>
     *
     * @throws APIException
     */
    public function createRecordingSettings(
        int $appID,
        array|CallingCreateRecordingSettingsParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = CallingCreateRecordingSettingsParams::parseRequest(
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
     * Create new settings for the calling extension associated with the specified appId.
     *
     * @param array{
     *   height: int,
     *   isReady: bool,
     *   name: string,
     *   supportsCustomObjects: bool,
     *   supportsInboundCalling: bool,
     *   url: string,
     *   usesCallingWindow: bool,
     *   usesRemote: bool,
     *   width: int,
     * }|CallingCreateSettingsParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<SettingsResponse>
     *
     * @throws APIException
     */
    public function createSettings(
        int $appID,
        array|CallingCreateSettingsParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = CallingCreateSettingsParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: ['crm/extensions/calling/2026-03/%1$s/settings', $appID],
            body: (object) $parsed,
            options: $options,
            convert: SettingsResponse::class,
        );
    }

    /**
     * @api
     *
     * Delete the channel connection settings associated with the specified app.
     *
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function deleteChannelConnectionSettings(
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
     * Remove the calling extension settings associated with the specified appId. This action cannot be undone.
     *
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function deleteSettings(
        int $appID,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'delete',
            path: ['crm/extensions/calling/2026-03/%1$s/settings', $appID],
            options: $requestOptions,
            convert: null,
        );
    }

    /**
     * @api
     *
     * Access the current channel connection settings for the specified app.
     *
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<ChannelConnectionSettingsResponse>
     *
     * @throws APIException
     */
    public function getChannelConnectionSettings(
        int $appID,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: [
                'crm/extensions/calling/2026-03/%1$s/settings/channel-connection',
                $appID,
            ],
            options: $requestOptions,
            convert: ChannelConnectionSettingsResponse::class,
        );
    }

    /**
     * @api
     *
     * Retrieve the current recording settings for a specific app using the provided app ID.
     *
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<RecordingSettingsResponse>
     *
     * @throws APIException
     */
    public function getRecordingSettings(
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
     * Retrieve the current settings of the calling extension for the specified appId.
     *
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<SettingsResponse>
     *
     * @throws APIException
     */
    public function getSettings(
        int $appID,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['crm/extensions/calling/2026-03/%1$s/settings', $appID],
            options: $requestOptions,
            convert: SettingsResponse::class,
        );
    }

    /**
     * @api
     *
     * Modify the existing channel connection settings for the specified app.
     *
     * @param array{
     *   isReady?: bool, url?: string
     * }|CallingUpdateChannelConnectionSettingsParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<ChannelConnectionSettingsResponse>
     *
     * @throws APIException
     */
    public function updateChannelConnectionSettings(
        int $appID,
        array|CallingUpdateChannelConnectionSettingsParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = CallingUpdateChannelConnectionSettingsParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'patch',
            path: [
                'crm/extensions/calling/2026-03/%1$s/settings/channel-connection',
                $appID,
            ],
            body: (object) $parsed,
            options: $options,
            convert: ChannelConnectionSettingsResponse::class,
        );
    }

    /**
     * @api
     *
     * Update the recording settings for a specific app using the provided app ID.
     *
     * @param array{
     *   urlToRetrieveAuthedRecording?: string
     * }|CallingUpdateRecordingSettingsParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<RecordingSettingsResponse>
     *
     * @throws APIException
     */
    public function updateRecordingSettings(
        int $appID,
        array|CallingUpdateRecordingSettingsParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = CallingUpdateRecordingSettingsParams::parseRequest(
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
     * Modify existing calling extension settings for the specified appId. Only the fields provided in the request will be updated.
     *
     * @param array{
     *   height?: int,
     *   isReady?: bool,
     *   name?: string,
     *   supportsCustomObjects?: bool,
     *   supportsInboundCalling?: bool,
     *   url?: string,
     *   usesCallingWindow?: bool,
     *   usesRemote?: bool,
     *   width?: int,
     * }|CallingUpdateSettingsParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<SettingsResponse>
     *
     * @throws APIException
     */
    public function updateSettings(
        int $appID,
        array|CallingUpdateSettingsParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = CallingUpdateSettingsParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'patch',
            path: ['crm/extensions/calling/2026-03/%1$s/settings', $appID],
            body: (object) $parsed,
            options: $options,
            convert: SettingsResponse::class,
        );
    }
}
