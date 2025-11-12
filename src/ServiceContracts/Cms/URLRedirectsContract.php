<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\Cms;

use HubspotSDK\Cms\URLRedirects\URLMapping;
use HubspotSDK\Cms\URLRedirects\URLRedirectCreateParams;
use HubspotSDK\Cms\URLRedirects\URLRedirectListParams;
use HubspotSDK\Cms\URLRedirects\URLRedirectUpdateParams;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Page;
use HubspotSDK\RequestOptions;

interface URLRedirectsContract
{
    /**
     * @api
     *
     * @param array<mixed>|URLRedirectCreateParams $params
     *
     * @throws APIException
     */
    public function create(
        array|URLRedirectCreateParams $params,
        ?RequestOptions $requestOptions = null,
    ): URLMapping;

    /**
     * @api
     *
     * @param array<mixed>|URLRedirectUpdateParams $params
     *
     * @throws APIException
     */
    public function update(
        string $urlRedirectID,
        array|URLRedirectUpdateParams $params,
        ?RequestOptions $requestOptions = null,
    ): URLMapping;

    /**
     * @api
     *
     * @param array<mixed>|URLRedirectListParams $params
     *
     * @return Page<URLMapping>
     *
     * @throws APIException
     */
    public function list(
        array|URLRedirectListParams $params,
        ?RequestOptions $requestOptions = null,
    ): Page;

    /**
     * @api
     *
     * @throws APIException
     */
    public function delete(
        string $urlRedirectID,
        ?RequestOptions $requestOptions = null
    ): mixed;

    /**
     * @api
     *
     * @throws APIException
     */
    public function get(
        string $urlRedirectID,
        ?RequestOptions $requestOptions = null
    ): URLMapping;
}
