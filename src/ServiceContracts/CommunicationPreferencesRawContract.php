<?php

declare(strict_types=1);

namespace HubSpotSDK\ServiceContracts;

use HubSpotSDK\CommunicationPreferences\ActionResponseWithResultsPublicStatus;
use HubSpotSDK\CommunicationPreferences\ActionResponseWithResultsPublicWideStatus;
use HubSpotSDK\CommunicationPreferences\CommunicationPreferenceGenerateLinksParams;
use HubSpotSDK\CommunicationPreferences\CommunicationPreferenceGetStatusesParams;
use HubSpotSDK\CommunicationPreferences\CommunicationPreferenceGetUnsubscribeAllStatusParams;
use HubSpotSDK\CommunicationPreferences\CommunicationPreferenceUnsubscribeAllParams;
use HubSpotSDK\CommunicationPreferences\CommunicationPreferenceUpdateStatusParams;
use HubSpotSDK\CommunicationPreferences\LinkGenerationResponse;
use HubSpotSDK\Core\Contracts\BaseResponse;
use HubSpotSDK\Core\Exceptions\APIException;
use HubSpotSDK\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \HubSpotSDK\RequestOptions
 */
interface CommunicationPreferencesRawContract
{
    /**
     * @api
     *
     * @param array<string,mixed>|CommunicationPreferenceGenerateLinksParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<LinkGenerationResponse>
     *
     * @throws APIException
     */
    public function generateLinks(
        array|CommunicationPreferenceGenerateLinksParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $subscriberIDString the unique identifier of the subscriber whose communication preferences status is being retrieved
     * @param array<string,mixed>|CommunicationPreferenceGetStatusesParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<ActionResponseWithResultsPublicStatus>
     *
     * @throws APIException
     */
    public function getStatuses(
        string $subscriberIDString,
        array|CommunicationPreferenceGetStatusesParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $subscriberIDString the unique identifier of the subscriber to unsubscribe from all communication preferences
     * @param array<string,mixed>|CommunicationPreferenceGetUnsubscribeAllStatusParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<ActionResponseWithResultsPublicWideStatus>
     *
     * @throws APIException
     */
    public function getUnsubscribeAllStatus(
        string $subscriberIDString,
        array|CommunicationPreferenceGetUnsubscribeAllStatusParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $subscriberIDString the unique identifier of the subscriber to unsubscribe from all communication preferences
     * @param array<string,mixed>|CommunicationPreferenceUnsubscribeAllParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<ActionResponseWithResultsPublicStatus>
     *
     * @throws APIException
     */
    public function unsubscribeAll(
        string $subscriberIDString,
        array|CommunicationPreferenceUnsubscribeAllParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $subscriberIDString the unique identifier of the subscriber whose communication preferences status is being updated
     * @param array<string,mixed>|CommunicationPreferenceUpdateStatusParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<ActionResponseWithResultsPublicStatus>
     *
     * @throws APIException
     */
    public function updateStatus(
        string $subscriberIDString,
        array|CommunicationPreferenceUpdateStatusParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;
}
