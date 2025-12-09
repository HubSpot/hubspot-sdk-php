<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\Crm\Timeline;

use HubspotSDK\Core\Contracts\BaseResponse;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Crm\Timeline\TimelineEventTemplateToken;
use HubspotSDK\Crm\Timeline\Tokens\TokenCreateParams;
use HubspotSDK\Crm\Timeline\Tokens\TokenDeleteParams;
use HubspotSDK\Crm\Timeline\Tokens\TokenUpdateParams;
use HubspotSDK\RequestOptions;

interface TokensRawContract
{
    /**
     * @api
     *
     * @param string $eventTemplateID path param: The event template ID
     * @param array<mixed>|TokenCreateParams $params
     *
     * @return BaseResponse<TimelineEventTemplateToken>
     *
     * @throws APIException
     */
    public function create(
        string $eventTemplateID,
        array|TokenCreateParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $tokenName path param: The token name
     * @param array<mixed>|TokenUpdateParams $params
     *
     * @return BaseResponse<TimelineEventTemplateToken>
     *
     * @throws APIException
     */
    public function update(
        string $tokenName,
        array|TokenUpdateParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $tokenName the token name
     * @param array<mixed>|TokenDeleteParams $params
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function delete(
        string $tokenName,
        array|TokenDeleteParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;
}
