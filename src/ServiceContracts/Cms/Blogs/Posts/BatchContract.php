<?php

declare(strict_types=1);

namespace HubSpotSDK\ServiceContracts\Cms\Blogs\Posts;

use HubSpotSDK\Core\Exceptions\APIException;
use HubSpotSDK\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \HubSpotSDK\RequestOptions
 */
interface BatchContract
{
    /**
     * @api
     *
     * @param list<mixed> $inputs blog posts to input
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function create(
        array $inputs,
        RequestOptions|array|null $requestOptions = null
    ): string;

    /**
     * @api
     *
     * @param list<mixed> $inputs body param: JSON nodes to input
     * @param bool $archived query param: Whether to return only results that have been archived
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function update(
        array $inputs,
        ?bool $archived = null,
        RequestOptions|array|null $requestOptions = null,
    ): string;

    /**
     * @api
     *
     * @param list<string> $inputs strings to input
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function delete(
        array $inputs,
        RequestOptions|array|null $requestOptions = null
    ): mixed;

    /**
     * @api
     *
     * @param list<string> $inputs body param: Strings to input
     * @param bool $archived query param: Whether to return only results that have been archived
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function get(
        array $inputs,
        ?bool $archived = null,
        RequestOptions|array|null $requestOptions = null,
    ): string;
}
