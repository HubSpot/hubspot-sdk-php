<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\Crm\Objects;

use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Crm\CollectionResponseWithTotalSimplePublicObject;
use HubspotSDK\Crm\CreatedResponseSimplePublicObject;
use HubspotSDK\Crm\Objects\Quotes\QuoteCreateParams;
use HubspotSDK\Crm\Objects\Quotes\QuoteGetParams;
use HubspotSDK\Crm\Objects\Quotes\QuoteListParams;
use HubspotSDK\Crm\Objects\Quotes\QuoteSearchParams;
use HubspotSDK\Crm\Objects\Quotes\QuoteUpdateParams;
use HubspotSDK\Crm\SimplePublicObject;
use HubspotSDK\Crm\SimplePublicObjectWithAssociations;
use HubspotSDK\Page;
use HubspotSDK\RequestOptions;

interface QuotesContract
{
    /**
     * @api
     *
     * @param array<mixed>|QuoteCreateParams $params
     *
     * @throws APIException
     */
    public function create(
        array|QuoteCreateParams $params,
        ?RequestOptions $requestOptions = null
    ): CreatedResponseSimplePublicObject;

    /**
     * @api
     *
     * @param array<mixed>|QuoteUpdateParams $params
     *
     * @throws APIException
     */
    public function update(
        string $quoteID,
        array|QuoteUpdateParams $params,
        ?RequestOptions $requestOptions = null,
    ): SimplePublicObject;

    /**
     * @api
     *
     * @param array<mixed>|QuoteListParams $params
     *
     * @return Page<SimplePublicObjectWithAssociations>
     *
     * @throws APIException
     */
    public function list(
        array|QuoteListParams $params,
        ?RequestOptions $requestOptions = null
    ): Page;

    /**
     * @api
     *
     * @throws APIException
     */
    public function delete(
        string $quoteID,
        ?RequestOptions $requestOptions = null
    ): mixed;

    /**
     * @api
     *
     * @param array<mixed>|QuoteGetParams $params
     *
     * @throws APIException
     */
    public function get(
        string $quoteID,
        array|QuoteGetParams $params,
        ?RequestOptions $requestOptions = null,
    ): SimplePublicObjectWithAssociations;

    /**
     * @api
     *
     * @param array<mixed>|QuoteSearchParams $params
     *
     * @throws APIException
     */
    public function search(
        array|QuoteSearchParams $params,
        ?RequestOptions $requestOptions = null
    ): CollectionResponseWithTotalSimplePublicObject;
}
