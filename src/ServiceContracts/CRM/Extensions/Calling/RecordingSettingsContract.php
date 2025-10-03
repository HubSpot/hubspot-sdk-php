<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\CRM\Extensions\Calling;

use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\CRM\Extensions\Calling\ExtensionsCallingRecordingSettingsResponse;
use HubspotSDK\RequestOptions;

use const HubspotSDK\Core\OMIT as omit;

interface RecordingSettingsContract
{
    /**
     * @api
     *
     * @throws APIException
     */
    public function getURLFormat(
        int $appID,
        ?RequestOptions $requestOptions = null
    ): ExtensionsCallingRecordingSettingsResponse;

    /**
     * @api
     *
     * @throws APIException
     */
    public function getURLFormatRaw(
        int $appID,
        mixed $params,
        ?RequestOptions $requestOptions = null
    ): ExtensionsCallingRecordingSettingsResponse;

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
     * @param string $urlToRetrieveAuthedRecording
     *
     * @throws APIException
     */
    public function registerURLFormat(
        int $appID,
        $urlToRetrieveAuthedRecording,
        ?RequestOptions $requestOptions = null,
    ): ExtensionsCallingRecordingSettingsResponse;

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
    ): ExtensionsCallingRecordingSettingsResponse;

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
    ): ExtensionsCallingRecordingSettingsResponse;

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
    ): ExtensionsCallingRecordingSettingsResponse;
}
