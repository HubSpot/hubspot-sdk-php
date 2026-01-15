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

/**
 * @phpstan-import-type RequestOpts from \HubspotSDK\RequestOptions
 */
interface TokensRawContract
{
    /**
     * @api
     *
     * @param string $eventTemplateID path param: The event template ID
     * @param array<string,mixed>|TokenCreateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<TimelineEventTemplateToken>
     *
     * @throws APIException
     */
    public function create(
        string $eventTemplateID,
        array|TokenCreateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $tokenName path param: The token name
     * @param array<string,mixed>|TokenUpdateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<TimelineEventTemplateToken>
     *
     * @throws APIException
     */
    public function update(
        string $tokenName,
        array|TokenUpdateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $tokenName the token name
     * @param array<string,mixed>|TokenDeleteParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function delete(
        string $tokenName,
        array|TokenDeleteParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;
}
