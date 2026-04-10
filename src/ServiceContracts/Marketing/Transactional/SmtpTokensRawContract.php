<?php

declare(strict_types=1);

namespace HubSpotSDK\ServiceContracts\Marketing\Transactional;

use HubSpotSDK\Core\Contracts\BaseResponse;
use HubSpotSDK\Core\Exceptions\APIException;
use HubSpotSDK\Marketing\Transactional\SmtpAPITokenView;
use HubSpotSDK\Marketing\Transactional\SmtpTokens\SmtpTokenCreateParams;
use HubSpotSDK\Marketing\Transactional\SmtpTokens\SmtpTokenListParams;
use HubSpotSDK\Page;
use HubSpotSDK\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \HubSpotSDK\RequestOptions
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
