<?php

declare(strict_types=1);

namespace HubSpotSDK\Services;

use HubSpotSDK\Client;
use HubSpotSDK\CommunicationPreferences\ActionResponseWithResultsPublicStatus;
use HubSpotSDK\CommunicationPreferences\ActionResponseWithResultsPublicWideStatus;
use HubSpotSDK\CommunicationPreferences\CommunicationPreferenceGenerateLinksParams;
use HubSpotSDK\CommunicationPreferences\CommunicationPreferenceGenerateLinksParams\Channel;
use HubSpotSDK\CommunicationPreferences\CommunicationPreferenceGetStatusesParams;
use HubSpotSDK\CommunicationPreferences\CommunicationPreferenceGetUnsubscribeAllStatusParams;
use HubSpotSDK\CommunicationPreferences\CommunicationPreferenceUnsubscribeAllParams;
use HubSpotSDK\CommunicationPreferences\CommunicationPreferenceUpdateStatusParams;
use HubSpotSDK\CommunicationPreferences\CommunicationPreferenceUpdateStatusParams\LegalBasis;
use HubSpotSDK\CommunicationPreferences\CommunicationPreferenceUpdateStatusParams\StatusState;
use HubSpotSDK\CommunicationPreferences\LinkGenerationResponse;
use HubSpotSDK\Core\Contracts\BaseResponse;
use HubSpotSDK\Core\Exceptions\APIException;
use HubSpotSDK\Core\Util;
use HubSpotSDK\RequestOptions;
use HubSpotSDK\ServiceContracts\CommunicationPreferencesRawContract;

/**
 * @phpstan-import-type RequestOpts from \HubSpotSDK\RequestOptions
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
     * Retrieve a contact's current email subscription preferences.
     *
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
     * Unsubscribe a contact from all email subscriptions.
     *
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
     * @param array{
     *   channel: CommunicationPreferenceUpdateStatusParams\Channel|value-of<CommunicationPreferenceUpdateStatusParams\Channel>,
     *   statusState: StatusState|value-of<StatusState>,
     *   subscriptionID: int,
     *   legalBasis?: value-of<LegalBasis>,
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
