<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\Marketing\Transactional;

use HubspotSDK\Core\Contracts\BaseResponse;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Marketing\Transactional\SmtpAPITokenView;
use HubspotSDK\Marketing\Transactional\SmtpTokens\SmtpTokenCreateParams;
use HubspotSDK\Marketing\Transactional\SmtpTokens\SmtpTokenListParams;
use HubspotSDK\Page;
use HubspotSDK\RequestOptions;

interface SmtpTokensRawContract
{
    /**
     * @api
     *
     * @param array<mixed>|SmtpTokenCreateParams $params
     *
     * @return BaseResponse<SmtpAPITokenView>
     *
     * @throws APIException
     */
    public function create(
        array|SmtpTokenCreateParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<mixed>|SmtpTokenListParams $params
     *
     * @return BaseResponse<Page<SmtpAPITokenView>>
     *
     * @throws APIException
     */
    public function list(
        array|SmtpTokenListParams $params,
        ?RequestOptions $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $tokenID identifier generated when a token is created
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function delete(
        string $tokenID,
        ?RequestOptions $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $tokenID identifier generated when a token is created
     *
     * @return BaseResponse<SmtpAPITokenView>
     *
     * @throws APIException
     */
    public function get(
        string $tokenID,
        ?RequestOptions $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $tokenID identifier generated when a token is created
     *
     * @return BaseResponse<SmtpAPITokenView>
     *
     * @throws APIException
     */
    public function resetPassword(
        string $tokenID,
        ?RequestOptions $requestOptions = null
    ): BaseResponse;
}
