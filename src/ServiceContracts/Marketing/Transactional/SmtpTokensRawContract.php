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

/**
 * @phpstan-import-type RequestOpts from \HubspotSDK\RequestOptions
 */
interface SmtpTokensRawContract
{
    /**
     * @api
     *
     * @param array<string,mixed>|SmtpTokenCreateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<SmtpAPITokenView>
     *
     * @throws APIException
     */
    public function create(
        array|SmtpTokenCreateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|SmtpTokenListParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<Page<SmtpAPITokenView>>
     *
     * @throws APIException
     */
    public function list(
        array|SmtpTokenListParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function delete(
        string $tokenID,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<SmtpAPITokenView>
     *
     * @throws APIException
     */
    public function get(
        string $tokenID,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<SmtpAPITokenView>
     *
     * @throws APIException
     */
    public function resetPassword(
        string $tokenID,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse;
}
