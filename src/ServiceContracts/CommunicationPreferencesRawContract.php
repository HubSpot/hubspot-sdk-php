<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts;

use HubspotSDK\CommunicationPreferences\ActionResponseWithResultsPublicStatus;
use HubspotSDK\CommunicationPreferences\ActionResponseWithResultsPublicWideStatus;
use HubspotSDK\CommunicationPreferences\CommunicationPreferenceGenerateLinksParams;
use HubspotSDK\CommunicationPreferences\CommunicationPreferenceGetStatusesParams;
use HubspotSDK\CommunicationPreferences\CommunicationPreferenceGetUnsubscribeAllStatusParams;
use HubspotSDK\CommunicationPreferences\CommunicationPreferenceSubscribeParams;
use HubspotSDK\CommunicationPreferences\CommunicationPreferenceUnsubscribeAllParams;
use HubspotSDK\CommunicationPreferences\CommunicationPreferenceUnsubscribeParams;
use HubspotSDK\CommunicationPreferences\CommunicationPreferenceUpdateStatusParams;
use HubspotSDK\CommunicationPreferences\LinkGenerationResponse;
use HubspotSDK\CommunicationPreferences\PublicSubscriptionStatus;
use HubspotSDK\CommunicationPreferences\PublicSubscriptionStatusesResponse;
use HubspotSDK\Core\Contracts\BaseResponse;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \HubspotSDK\RequestOptions
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
     * @param string $emailAddress the email address of the recipient whose subscription status is being retrieved
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<PublicSubscriptionStatusesResponse>
     *
     * @throws APIException
     */
    public function getStatusByEmail(
        string $emailAddress,
        RequestOptions|array|null $requestOptions = null
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
     * @param string $subscriberIDString the unique identifier of the subscriber whose unsubscribe status is being retrieved
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
     * @param array<string,mixed>|CommunicationPreferenceSubscribeParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<PublicSubscriptionStatus>
     *
     * @throws APIException
     */
    public function subscribe(
        array|CommunicationPreferenceSubscribeParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|CommunicationPreferenceUnsubscribeParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<PublicSubscriptionStatus>
     *
     * @throws APIException
     */
    public function unsubscribe(
        array|CommunicationPreferenceUnsubscribeParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $subscriberIDString the unique identifier of the subscriber to be unsubscribed from all communications
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
     * @param string $subscriberIDString the unique identifier of the subscriber whose subscription status is to be updated
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
