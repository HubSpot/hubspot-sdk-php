<?php

declare(strict_types=1);

namespace HubspotSDK\Services\Webhooks\Webhooks;

use HubspotSDK\Client;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Core\Util;
use HubspotSDK\RequestOptions;
use HubspotSDK\ServiceContracts\Webhooks\Webhooks\BatchContract;
use HubspotSDK\Webhooks\Webhooks\BatchResponseJournalFetchResponse;
use HubspotSDK\Webhooks\Webhooks\BatchResponseSubscriptionResponse;
use HubspotSDK\Webhooks\Webhooks\SubscriptionBatchUpdateRequest;

/**
 * @phpstan-import-type SubscriptionBatchUpdateRequestShape from \HubspotSDK\Webhooks\Webhooks\SubscriptionBatchUpdateRequest
 * @phpstan-import-type RequestOpts from \HubspotSDK\RequestOptions
 */
final class BatchService implements BatchContract
{
    /**
     * @api
     */
    public BatchRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new BatchRawService($client);
    }

    /**
     * @api
     *
     * @param list<string> $inputs body param: Strings to input
     * @param int $installPortalID Query param
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function get(
        array $inputs,
        ?int $installPortalID = null,
        RequestOptions|array|null $requestOptions = null,
    ): BatchResponseJournalFetchResponse {
        $params = Util::removeNulls(
            ['inputs' => $inputs, 'installPortalID' => $installPortalID]
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->get(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function getEarliest(
        int $count,
        ?int $installPortalID = null,
        RequestOptions|array|null $requestOptions = null,
    ): BatchResponseJournalFetchResponse {
        $params = Util::removeNulls(['installPortalID' => $installPortalID]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->getEarliest($count, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function getLatest(
        int $count,
        ?int $installPortalID = null,
        RequestOptions|array|null $requestOptions = null,
    ): BatchResponseJournalFetchResponse {
        $params = Util::removeNulls(['installPortalID' => $installPortalID]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->getLatest($count, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * @param list<string> $inputs body param: Strings to input
     * @param int $installPortalID Query param
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function getLocal(
        array $inputs,
        ?int $installPortalID = null,
        RequestOptions|array|null $requestOptions = null,
    ): BatchResponseJournalFetchResponse {
        $params = Util::removeNulls(
            ['inputs' => $inputs, 'installPortalID' => $installPortalID]
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->getLocal(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function getLocalEarliest(
        int $count,
        ?int $installPortalID = null,
        RequestOptions|array|null $requestOptions = null,
    ): BatchResponseJournalFetchResponse {
        $params = Util::removeNulls(['installPortalID' => $installPortalID]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->getLocalEarliest($count, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function getLocalLatest(
        int $count,
        ?int $installPortalID = null,
        RequestOptions|array|null $requestOptions = null,
    ): BatchResponseJournalFetchResponse {
        $params = Util::removeNulls(['installPortalID' => $installPortalID]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->getLocalLatest($count, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * @param int $count Path param
     * @param string $offset Path param
     * @param int $installPortalID Query param
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function getLocalNext(
        int $count,
        string $offset,
        ?int $installPortalID = null,
        RequestOptions|array|null $requestOptions = null,
    ): BatchResponseJournalFetchResponse {
        $params = Util::removeNulls(
            ['offset' => $offset, 'installPortalID' => $installPortalID]
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->getLocalNext($count, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * @param int $count Path param
     * @param string $offset Path param
     * @param int $installPortalID Query param
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function getNext(
        int $count,
        string $offset,
        ?int $installPortalID = null,
        RequestOptions|array|null $requestOptions = null,
    ): BatchResponseJournalFetchResponse {
        $params = Util::removeNulls(
            ['offset' => $offset, 'installPortalID' => $installPortalID]
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->getNext($count, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Batch create event subscriptions for the specified app.
     *
     * @param list<SubscriptionBatchUpdateRequest|SubscriptionBatchUpdateRequestShape> $inputs
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function updateSubscriptions(
        int $appID,
        array $inputs,
        RequestOptions|array|null $requestOptions = null
    ): BatchResponseSubscriptionResponse {
        $params = Util::removeNulls(['inputs' => $inputs]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->updateSubscriptions($appID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
