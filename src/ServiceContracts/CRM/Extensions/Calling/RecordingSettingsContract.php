<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\CRM\Extensions\Calling;

use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\CRM\Extensions\Calling\RecordingSettingsResponse;
use HubspotSDK\RequestOptions;

use const HubspotSDK\Core\OMIT as omit;

interface RecordingSettingsContract
{
    /**
     * @api
     *
     * @param string $urlToRetrieveAuthedRecording
     *
     * @throws APIException
     */
    public function create(
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
    public function createRaw(
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
    public function update(
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
    public function updateRaw(
        int $appID,
        array $params,
        ?RequestOptions $requestOptions = null
    ): RecordingSettingsResponse;

    /**
     * @api
     *
     * @throws APIException
     */
    public function get(
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
    public function markReady(
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
    public function markReadyRaw(
        array $params,
        ?RequestOptions $requestOptions = null
    ): mixed;
}
