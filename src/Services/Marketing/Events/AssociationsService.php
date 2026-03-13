<?php

declare(strict_types=1);

namespace HubspotSDK\Services\Marketing\Events;

use HubspotSDK\Client;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Core\Util;
use HubspotSDK\Marketing\Events\CollectionResponseWithTotalPublicListNoPaging;
use HubspotSDK\RequestOptions;
use HubspotSDK\ServiceContracts\Marketing\Events\AssociationsContract;

/**
 * @phpstan-import-type RequestOpts from \HubspotSDK\RequestOptions
 */
final class AssociationsService implements AssociationsContract
{
    /**
     * @api
     */
    public AssociationsRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new AssociationsRawService($client);
    }

    /**
     * @api
     *
     * Gets lists associated with a marketing event by marketing event id
     *
     * @param string $marketingEventID the internal id of the marketing event in HubSpot
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function list(
        string $marketingEventID,
        RequestOptions|array|null $requestOptions = null
    ): CollectionResponseWithTotalPublicListNoPaging {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->list($marketingEventID, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Disassociates a list from a marketing event by marketing event id and ILS list id
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
     * Associates a list with a marketing event by marketing event id and ILS list id
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
     * Associates a list with a marketing event by external account id, external event id, and ILS list id
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
     * Disassociates a list from a marketing event by external account id, external event id, and ILS list id
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
     * Gets lists associated with a marketing event by external account id and external event id
     *
     * @param string $externalEventID the id of the marketing event in the external event application
     * @param string $externalAccountID The accountId that is associated with this marketing event in the external event application
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function listByExternalAccount(
        string $externalEventID,
        string $externalAccountID,
        RequestOptions|array|null $requestOptions = null,
    ): CollectionResponseWithTotalPublicListNoPaging {
        $params = Util::removeNulls(['externalAccountID' => $externalAccountID]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->listByExternalAccount($externalEventID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
