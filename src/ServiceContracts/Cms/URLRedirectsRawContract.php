<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\Cms;

use HubspotSDK\Cms\URLRedirects\URLMapping;
use HubspotSDK\Cms\URLRedirects\URLRedirectCreateParams;
use HubspotSDK\Cms\URLRedirects\URLRedirectListParams;
use HubspotSDK\Cms\URLRedirects\URLRedirectUpdateParams;
use HubspotSDK\Core\Contracts\BaseResponse;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Page;
use HubspotSDK\RequestOptions;

interface URLRedirectsRawContract
{
    /**
     * @api
     *
     * @param array<string,mixed>|URLRedirectCreateParams $params
     *
     * @return BaseResponse<URLMapping>
     *
     * @throws APIException
     */
    public function create(
        array|URLRedirectCreateParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $urlRedirectID the ID of the target url redirect to update
     * @param array<string,mixed>|URLRedirectUpdateParams $params
     *
     * @return BaseResponse<URLMapping>
     *
     * @throws APIException
     */
    public function update(
        string $urlRedirectID,
        array|URLRedirectUpdateParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|URLRedirectListParams $params
     *
     * @return BaseResponse<Page<URLMapping>>
     *
     * @throws APIException
     */
    public function list(
        array|URLRedirectListParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $urlRedirectID the ID of the target redirect
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function delete(
        string $urlRedirectID,
        ?RequestOptions $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $urlRedirectID the ID of the target redirect
     *
     * @return BaseResponse<URLMapping>
     *
     * @throws APIException
     */
    public function get(
        string $urlRedirectID,
        ?RequestOptions $requestOptions = null
    ): BaseResponse;
}
