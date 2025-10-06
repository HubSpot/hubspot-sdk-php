<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\CRM\Extensions;

use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\CRM\Extensions\Calling\ChannelConnectionSettingsResponse;
use HubspotSDK\CRM\Extensions\Calling\RecordingSettingsResponse;
use HubspotSDK\RequestOptions;

use const HubspotSDK\Core\OMIT as omit;

interface CallingContract
{
    /**
     * @api
     *
     * @param bool $isReady
     * @param string $url
     *
     * @throws APIException
     */
    public function create(
        int $appID,
        $isReady,
        $url,
        ?RequestOptions $requestOptions = null
    ): ChannelConnectionSettingsResponse;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function createRaw(
        int $appID,
        array $params,
        ?RequestOptions $requestOptions = null
    ): ChannelConnectionSettingsResponse;

    /**
     * @api
     *
     * @param bool $isReady
     * @param string $url
     *
     * @throws APIException
     */
    public function update(
        int $appID,
        $isReady = omit,
        $url = omit,
        ?RequestOptions $requestOptions = null,
    ): ChannelConnectionSettingsResponse;

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
    ): ChannelConnectionSettingsResponse;

    /**
     * @api
     *
     * @throws APIException
     */
    public function delete(
        int $appID,
        ?RequestOptions $requestOptions = null
    ): mixed;

    /**
     * @api
     *
     * @throws APIException
     */
    public function getURLFormat(
        int $appID,
        ?RequestOptions $requestOptions = null
    ): RecordingSettingsResponse;

    /**
     * @api
     *
     * @param int $engagementID
     *
     * @throws APIException
     */
    public function markAsReady(
        $engagementID,
        ?RequestOptions $requestOptions = null
    ): mixed;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function markAsReadyRaw(
        array $params,
        ?RequestOptions $requestOptions = null
    ): mixed;

    /**
     * @api
     *
     * @throws APIException
     */
    public function read(
        int $appID,
        ?RequestOptions $requestOptions = null
    ): ChannelConnectionSettingsResponse;

    /**
     * @api
     *
     * @param string $urlToRetrieveAuthedRecording
     *
     * @throws APIException
     */
    public function registerURLFormat(
        int $appID,
        $urlToRetrieveAuthedRecording,
        ?RequestOptions $requestOptions = null,
    ): RecordingSettingsResponse;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function registerURLFormatRaw(
        int $appID,
        array $params,
        ?RequestOptions $requestOptions = null
    ): RecordingSettingsResponse;

    /**
     * @api
     *
     * @param string $urlToRetrieveAuthedRecording
     *
     * @throws APIException
     */
    public function updateURLFormat(
        int $appID,
        $urlToRetrieveAuthedRecording = omit,
        ?RequestOptions $requestOptions = null,
    ): RecordingSettingsResponse;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function updateURLFormatRaw(
        int $appID,
        array $params,
        ?RequestOptions $requestOptions = null
    ): RecordingSettingsResponse;
}
