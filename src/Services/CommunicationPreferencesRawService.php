<?php

declare(strict_types=1);

namespace HubspotSDK\Services;

use HubspotSDK\Client;
use HubspotSDK\CommunicationPreferences\ActionResponseWithResultsPublicStatus;
use HubspotSDK\CommunicationPreferences\ActionResponseWithResultsPublicWideStatus;
use HubspotSDK\CommunicationPreferences\CommunicationPreferenceGenerateLinksParams;
use HubspotSDK\CommunicationPreferences\CommunicationPreferenceGenerateLinksParams\Channel;
use HubspotSDK\CommunicationPreferences\CommunicationPreferenceGetStatusesParams;
use HubspotSDK\CommunicationPreferences\CommunicationPreferenceGetUnsubscribeAllStatusParams;
use HubspotSDK\CommunicationPreferences\CommunicationPreferenceSubscribeParams;
use HubspotSDK\CommunicationPreferences\CommunicationPreferenceSubscribeParams\LegalBasis;
use HubspotSDK\CommunicationPreferences\CommunicationPreferenceUnsubscribeAllParams;
use HubspotSDK\CommunicationPreferences\CommunicationPreferenceUnsubscribeParams;
use HubspotSDK\CommunicationPreferences\CommunicationPreferenceUpdateStatusParams;
use HubspotSDK\CommunicationPreferences\CommunicationPreferenceUpdateStatusParams\StatusState;
use HubspotSDK\CommunicationPreferences\LinkGenerationResponse;
use HubspotSDK\CommunicationPreferences\PublicSubscriptionStatus;
use HubspotSDK\CommunicationPreferences\PublicSubscriptionStatusesResponse;
use HubspotSDK\Core\Contracts\BaseResponse;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Core\Util;
use HubspotSDK\RequestOptions;
use HubspotSDK\ServiceContracts\CommunicationPreferencesRawContract;

/**
 * @phpstan-import-type RequestOpts from \HubspotSDK\RequestOptions
 */
final class CommunicationPreferencesRawService implements CommunicationPreferencesRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Generate communication preference links for a subscriber. This endpoint allows you to create URLs for managing preferences and unsubscribing, tailored to a specific subscriber. It is useful for integrating communication preference management into your applications.
     *
     * @param array{
     *   channel: Channel|value-of<Channel>,
     *   subscriberIDString: string,
     *   businessUnitID?: int,
     *   language?: string,
     *   subscriptionID?: int,
     * }|CommunicationPreferenceGenerateLinksParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<LinkGenerationResponse>
     *
     * @throws APIException
     */
    public function generateLinks(
        array|CommunicationPreferenceGenerateLinksParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = CommunicationPreferenceGenerateLinksParams::parseRequest(
            $params,
            $requestOptions,
        );
        $query_params = array_flip(['channel', 'businessUnitID']);

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: 'communication-preferences/2026-03/links/generate',
            query: Util::array_transform_keys(
                array_intersect_key($parsed, $query_params),
                ['businessUnitID' => 'businessUnitId'],
            ),
            body: (object) array_diff_key($parsed, $query_params),
            options: $options,
            convert: LinkGenerationResponse::class,
        );
    }

    /**
     * @api
     *
     * Retrieve the subscription statuses for a specific email address. This endpoint allows you to check the current subscription status for email communications, which can be useful for managing communication preferences and ensuring compliance with user preferences.
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
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: [
                'communication-preferences/2026-03/status/email/%1$s', $emailAddress,
            ],
            options: $requestOptions,
            convert: PublicSubscriptionStatusesResponse::class,
        );
    }

    /**
     * @api
     *
     * Retrieve a contact's current email subscription preferences.
     *
     * @param string $subscriberIDString the unique identifier of the subscriber whose communication preferences status is being retrieved
     * @param array{
     *   channel: CommunicationPreferenceGetStatusesParams\Channel|value-of<CommunicationPreferenceGetStatusesParams\Channel>,
     *   businessUnitID?: int,
     * }|CommunicationPreferenceGetStatusesParams $params
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
    ): BaseResponse {
        [$parsed, $options] = CommunicationPreferenceGetStatusesParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: [
                'communication-preferences/2026-03/statuses/%1$s', $subscriberIDString,
            ],
            query: Util::array_transform_keys(
                $parsed,
                ['businessUnitID' => 'businessUnitId']
            ),
            options: $options,
            convert: ActionResponseWithResultsPublicStatus::class,
        );
    }

    /**
     * @api
     *
     * Check whether a contact has unsubscribed from all email subscriptions. If a contact has not opted out of all communications, the response `results` array will be empty.
     *
     * @param string $subscriberIDString the unique identifier of the subscriber whose unsubscribe status is being retrieved
     * @param array{
     *   channel: CommunicationPreferenceGetUnsubscribeAllStatusParams\Channel|value-of<CommunicationPreferenceGetUnsubscribeAllStatusParams\Channel>,
     *   businessUnitID?: int,
     *   verbose?: bool,
     * }|CommunicationPreferenceGetUnsubscribeAllStatusParams $params
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
    ): BaseResponse {
        [$parsed, $options] = CommunicationPreferenceGetUnsubscribeAllStatusParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: [
                'communication-preferences/2026-03/statuses/%1$s/unsubscribe-all',
                $subscriberIDString,
            ],
            query: Util::array_transform_keys(
                $parsed,
                ['businessUnitID' => 'businessUnitId']
            ),
            options: $options,
            convert: ActionResponseWithResultsPublicWideStatus::class,
        );
    }

    /**
     * @api
     *
     * Subscribe a user to a specific communication preference using their email address and subscription ID. This endpoint allows you to manage subscription statuses by updating them to 'subscribed' for a given email address. It is useful for ensuring that users receive communications they have opted into.
     *
     * @param array{
     *   emailAddress: string,
     *   subscriptionID: string,
     *   legalBasis?: value-of<LegalBasis>,
     *   legalBasisExplanation?: string,
     * }|CommunicationPreferenceSubscribeParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<PublicSubscriptionStatus>
     *
     * @throws APIException
     */
    public function subscribe(
        array|CommunicationPreferenceSubscribeParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = CommunicationPreferenceSubscribeParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: 'communication-preferences/2026-03/subscribe',
            body: (object) $parsed,
            options: $options,
            convert: PublicSubscriptionStatus::class,
        );
    }

    /**
     * @api
     *
     * Unsubscribe a user from communication preferences. This endpoint allows you to update the subscription status of a user to 'unsubscribed' for specified communication channels. It is useful for managing user preferences and ensuring compliance with user opt-out requests.
     *
     * @param array{
     *   emailAddress: string,
     *   subscriptionID: string,
     *   legalBasis?: value-of<CommunicationPreferenceUnsubscribeParams\LegalBasis>,
     *   legalBasisExplanation?: string,
     * }|CommunicationPreferenceUnsubscribeParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<PublicSubscriptionStatus>
     *
     * @throws APIException
     */
    public function unsubscribe(
        array|CommunicationPreferenceUnsubscribeParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = CommunicationPreferenceUnsubscribeParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: 'communication-preferences/2026-03/unsubscribe',
            body: (object) $parsed,
            options: $options,
            convert: PublicSubscriptionStatus::class,
        );
    }

    /**
     * @api
     *
     * Unsubscribe a subscriber from all communication channels. This endpoint allows you to remove a subscriber from all communication preferences, effectively opting them out from receiving any further communications. This can be useful for ensuring compliance with user requests or legal requirements.
     *
     * @param string $subscriberIDString the unique identifier of the subscriber to be unsubscribed from all communications
     * @param array{
     *   channel: CommunicationPreferenceUnsubscribeAllParams\Channel|value-of<CommunicationPreferenceUnsubscribeAllParams\Channel>,
     *   businessUnitID?: int,
     *   verbose?: bool,
     * }|CommunicationPreferenceUnsubscribeAllParams $params
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
    ): BaseResponse {
        [$parsed, $options] = CommunicationPreferenceUnsubscribeAllParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: [
                'communication-preferences/2026-03/statuses/%1$s/unsubscribe-all',
                $subscriberIDString,
            ],
            query: Util::array_transform_keys(
                $parsed,
                ['businessUnitID' => 'businessUnitId']
            ),
            options: $options,
            convert: ActionResponseWithResultsPublicStatus::class,
        );
    }

    /**
     * @api
     *
     * Set the subscription status of a specific contact.
     *
     * @param string $subscriberIDString the unique identifier of the subscriber whose subscription status is to be updated
     * @param array{
     *   channel: CommunicationPreferenceUpdateStatusParams\Channel|value-of<CommunicationPreferenceUpdateStatusParams\Channel>,
     *   statusState: StatusState|value-of<StatusState>,
     *   subscriptionID: int,
     *   legalBasis?: value-of<CommunicationPreferenceUpdateStatusParams\LegalBasis>,
     *   legalBasisExplanation?: string,
     * }|CommunicationPreferenceUpdateStatusParams $params
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
    ): BaseResponse {
        [$parsed, $options] = CommunicationPreferenceUpdateStatusParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: [
                'communication-preferences/2026-03/statuses/%1$s', $subscriberIDString,
            ],
            body: (object) $parsed,
            options: $options,
            convert: ActionResponseWithResultsPublicStatus::class,
        );
    }
}
