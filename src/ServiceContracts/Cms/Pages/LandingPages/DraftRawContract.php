<?php

declare(strict_types=1);

namespace HubSpotSDK\ServiceContracts\Cms\Pages\LandingPages;

use HubSpotSDK\Cms\Pages\LandingPages\Draft\DraftUpdateParams;
use HubSpotSDK\Cms\Pages\PagesPage;
use HubSpotSDK\Core\Contracts\BaseResponse;
use HubSpotSDK\Core\Exceptions\APIException;
use HubSpotSDK\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \HubSpotSDK\RequestOptions
 */
interface DraftRawContract
{
    /**
     * @api
     *
     * @param string $objectID the unique identifier of the landing page draft to update
     * @param array<string,mixed>|DraftUpdateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<PagesPage>
     *
     * @throws APIException
     */
    public function update(
        string $objectID,
        array|DraftUpdateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $objectID the unique identifier of the landing page whose draft version is to be retrieved
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<PagesPage>
     *
     * @throws APIException
     */
    public function get(
        string $objectID,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $objectID the unique identifier of the landing page draft to be published
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function pushLive(
        string $objectID,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $objectID the unique identifier of the landing page whose draft is to be reset
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function reset(
        string $objectID,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse;
}
