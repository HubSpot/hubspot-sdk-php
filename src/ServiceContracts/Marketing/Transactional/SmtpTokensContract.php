<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\Marketing\Transactional;

use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Marketing\Transactional\SmtpAPITokenView;
use HubspotSDK\Marketing\Transactional\SmtpTokens\SmtpTokenCreateParams;
use HubspotSDK\Marketing\Transactional\SmtpTokens\SmtpTokenListParams;
use HubspotSDK\Page;
use HubspotSDK\RequestOptions;

interface SmtpTokensContract
{
    /**
     * @api
     *
     * @param array<mixed>|SmtpTokenCreateParams $params
     *
     * @throws APIException
     */
    public function create(
        array|SmtpTokenCreateParams $params,
        ?RequestOptions $requestOptions = null,
    ): SmtpAPITokenView;

    /**
     * @api
     *
     * @param array<mixed>|SmtpTokenListParams $params
     *
     * @return Page<SmtpAPITokenView>
     *
     * @throws APIException
     */
    public function list(
        array|SmtpTokenListParams $params,
        ?RequestOptions $requestOptions = null
    ): Page;

    /**
     * @api
     *
     * @throws APIException
     */
    public function delete(
        string $tokenID,
        ?RequestOptions $requestOptions = null
    ): mixed;

    /**
     * @api
     *
     * @throws APIException
     */
    public function get(
        string $tokenID,
        ?RequestOptions $requestOptions = null
    ): SmtpAPITokenView;

    /**
     * @api
     *
     * @throws APIException
     */
    public function resetPassword(
        string $tokenID,
        ?RequestOptions $requestOptions = null
    ): SmtpAPITokenView;
}
