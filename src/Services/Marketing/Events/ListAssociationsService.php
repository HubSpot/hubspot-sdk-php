<?php

declare(strict_types=1);

namespace HubspotSDK\Services\Marketing\Events;

use HubspotSDK\Client;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Core\Util;
use HubspotSDK\Marketing\Events\CollectionResponseWithTotalPublicList;
use HubspotSDK\RequestOptions;
use HubspotSDK\ServiceContracts\Marketing\Events\ListAssociationsContract;

/**
 * @phpstan-import-type RequestOpts from \HubspotSDK\RequestOptions
 */
final class ListAssociationsService implements ListAssociationsContract
{
    /**
     * @api
     */
    public ListAssociationsRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new ListAssociationsRawService($client);
    }

    /**
     * @api
     *
     * @param string $marketingEventID the internal id of the marketing event in HubSpot
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function list(
        string $marketingEventID,
        RequestOptions|array|null $requestOptions = null
    ): CollectionResponseWithTotalPublicList {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->list($marketingEventID, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * @param string $listID the ILS ID of the list
     * @param string $marketingEventID the internal id of the marketing event in HubSpot
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function delete(
        string $listID,
        string $marketingEventID,
        RequestOptions|array|null $requestOptions = null,
    ): mixed {
        $params = Util::removeNulls(['marketingEventID' => $marketingEventID]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->delete($listID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * @param string $listID the ILS ID of the list
     * @param string $marketingEventID the internal id of the marketing event in HubSpot
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function associate(
        string $listID,
        string $marketingEventID,
        RequestOptions|array|null $requestOptions = null,
    ): mixed {
        $params = Util::removeNulls(['marketingEventID' => $marketingEventID]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->associate($listID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * @param string $listID the ILS ID of the list
     * @param string $externalAccountID the accountId that is associated with this marketing event in the external event application
     * @param string $externalEventID the id of the marketing event in the external event application
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function associateByExternalAccount(
        string $listID,
        string $externalAccountID,
        string $externalEventID,
        RequestOptions|array|null $requestOptions = null,
    ): mixed {
        $params = Util::removeNulls(
            [
                'externalAccountID' => $externalAccountID,
                'externalEventID' => $externalEventID,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->associateByExternalAccount($listID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * @param string $listID the ILS ID of the list
     * @param string $externalAccountID the accountId that is associated with this marketing event in the external event application
     * @param string $externalEventID the id of the marketing event in the external event application
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function deleteByExternalAccount(
        string $listID,
        string $externalAccountID,
        string $externalEventID,
        RequestOptions|array|null $requestOptions = null,
    ): mixed {
        $params = Util::removeNulls(
            [
                'externalAccountID' => $externalAccountID,
                'externalEventID' => $externalEventID,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->deleteByExternalAccount($listID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * @param string $externalEventID the id of the marketing event in the external event application
     * @param string $externalAccountID the accountId that is associated with this marketing event in the external event application
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function listByExternalAccount(
        string $externalEventID,
        string $externalAccountID,
        RequestOptions|array|null $requestOptions = null,
    ): CollectionResponseWithTotalPublicList {
        $params = Util::removeNulls(['externalAccountID' => $externalAccountID]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->listByExternalAccount($externalEventID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
