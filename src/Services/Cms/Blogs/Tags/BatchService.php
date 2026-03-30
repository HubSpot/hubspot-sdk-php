<?php

declare(strict_types=1);

namespace HubspotSDK\Services\Cms\Blogs\Tags;

use HubspotSDK\Client;
use HubspotSDK\Cms\Blogs\Tags\Tag;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Core\Util;
use HubspotSDK\RequestOptions;
use HubspotSDK\ServiceContracts\Cms\Blogs\Tags\BatchContract;

/**
 * @phpstan-import-type TagShape from \HubspotSDK\Cms\Blogs\Tags\Tag
 * @phpstan-import-type RequestOpts from \HubspotSDK\RequestOptions
 */
final class BatchService implements BatchContract
{
    /**
     * @api
     */
    public BatchRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new BatchRawService($client);
    }

    /**
     * @api
     *
     * Delete the Blog Tag objects identified in the request body.
     *
     * @param list<string> $inputs strings to input
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function delete(
        array $inputs,
        RequestOptions|array|null $requestOptions = null
    ): mixed {
        $params = Util::removeNulls(['inputs' => $inputs]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->delete(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Create the Blog Tag objects detailed in the request body.
     *
     * @param list<Tag|TagShape> $inputs blog tags to input
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function createBatch(
        array $inputs,
        RequestOptions|array|null $requestOptions = null
    ): string {
        $params = Util::removeNulls(['inputs' => $inputs]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->createBatch(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Retrieve the Blog Tag objects identified in the request body.
     *
     * @param list<string> $inputs body param: Strings to input
     * @param bool $archived query param: Whether to return only results that have been archived
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function getBatch(
        array $inputs,
        ?bool $archived = null,
        RequestOptions|array|null $requestOptions = null,
    ): string {
        $params = Util::removeNulls(['inputs' => $inputs, 'archived' => $archived]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->getBatch(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Update the Blog Tag objects identified in the request body.
     *
     * @param list<mixed> $inputs body param: JSON nodes to input
     * @param bool $archived query param: Whether to return only results that have been archived
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function updateBatch(
        array $inputs,
        ?bool $archived = null,
        RequestOptions|array|null $requestOptions = null,
    ): string {
        $params = Util::removeNulls(['inputs' => $inputs, 'archived' => $archived]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->updateBatch(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
