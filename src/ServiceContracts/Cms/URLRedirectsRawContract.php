<?php

declare(strict_types=1);

namespace HubSpotSDK\ServiceContracts\Cms;

use HubSpotSDK\Cms\URLRedirects\URLMapping;
use HubSpotSDK\Cms\URLRedirects\URLRedirectCreateParams;
use HubSpotSDK\Cms\URLRedirects\URLRedirectListParams;
use HubSpotSDK\Cms\URLRedirects\URLRedirectUpdateParams;
use HubSpotSDK\Core\Contracts\BaseResponse;
use HubSpotSDK\Core\Exceptions\APIException;
use HubSpotSDK\Page;
use HubSpotSDK\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \HubSpotSDK\RequestOptions
 */
interface URLRedirectsRawContract
{
    /**
     * @api
     *
     * @param array<string,mixed>|URLRedirectCreateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<URLMapping>
     *
     * @throws APIException
     */
    public function create(
        array|URLRedirectCreateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|URLRedirectUpdateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<URLMapping>
     *
     * @throws APIException
     */
    public function update(
        string $urlRedirectID,
        array|URLRedirectUpdateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|URLRedirectListParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<Page<URLMapping>>
     *
     * @throws APIException
     */
    public function list(
        array|URLRedirectListParams $params,
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
        string $urlRedirectID,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<URLMapping>
     *
     * @throws APIException
     */
    public function get(
        string $urlRedirectID,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse;
}
