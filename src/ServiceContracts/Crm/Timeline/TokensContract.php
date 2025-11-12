<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\Crm\Timeline;

use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Crm\Timeline\TimelineEventTemplateToken;
use HubspotSDK\Crm\Timeline\Tokens\TokenCreateParams;
use HubspotSDK\Crm\Timeline\Tokens\TokenDeleteParams;
use HubspotSDK\Crm\Timeline\Tokens\TokenUpdateParams;
use HubspotSDK\RequestOptions;

interface TokensContract
{
    /**
     * @api
     *
     * @param array<mixed>|TokenCreateParams $params
     *
     * @throws APIException
     */
    public function create(
        string $eventTemplateID,
        array|TokenCreateParams $params,
        ?RequestOptions $requestOptions = null,
    ): TimelineEventTemplateToken;

    /**
     * @api
     *
     * @param array<mixed>|TokenUpdateParams $params
     *
     * @throws APIException
     */
    public function update(
        string $tokenName,
        array|TokenUpdateParams $params,
        ?RequestOptions $requestOptions = null,
    ): TimelineEventTemplateToken;

    /**
     * @api
     *
     * @param array<mixed>|TokenDeleteParams $params
     *
     * @throws APIException
     */
    public function delete(
        string $tokenName,
        array|TokenDeleteParams $params,
        ?RequestOptions $requestOptions = null,
    ): mixed;
}
