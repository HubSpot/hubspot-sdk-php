<?php

declare(strict_types=1);

namespace HubSpotSDK\Services\Cms\Blogs\Posts;

use HubSpotSDK\Client;
use HubSpotSDK\Core\Exceptions\APIException;
use HubSpotSDK\Core\Util;
use HubSpotSDK\RequestOptions;
use HubSpotSDK\ServiceContracts\Cms\Blogs\Posts\RevisionsContract;

/**
 * @phpstan-import-type RequestOpts from \HubSpotSDK\RequestOptions
 */
final class RevisionsService implements RevisionsContract
{
    /**
     * @api
     */
    public RevisionsRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new RevisionsRawService($client);
    }

    /**
     * @api
     *
     * Retrieve a previous version of a blog post.
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function getPreviousVersion(
        string $revisionID,
        string $objectID,
        RequestOptions|array|null $requestOptions = null,
    ): string {
        $params = Util::removeNulls(['objectID' => $objectID]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->getPreviousVersion($revisionID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Retrieve all the previous versions of a blog post.
     *
     * @param string $after The paging cursor token of the last successfully read resource will be returned as the `paging.next.after` JSON property of a paged response containing more results.
     * @param int $limit the maximum number of results to display per page
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function getPreviousVersions(
        string $objectID,
        ?string $after = null,
        ?string $before = null,
        ?int $limit = null,
        RequestOptions|array|null $requestOptions = null,
    ): string {
        $params = Util::removeNulls(
            ['after' => $after, 'before' => $before, 'limit' => $limit]
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->getPreviousVersions($objectID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Restores a blog post to one of its previous versions.
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function restorePreviousVersion(
        string $revisionID,
        string $objectID,
        RequestOptions|array|null $requestOptions = null,
    ): string {
        $params = Util::removeNulls(['objectID' => $objectID]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->restorePreviousVersion($revisionID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Takes a specified version of a blog post, sets it as the new draft version of the blog post.
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function restorePreviousVersionToDraft(
        int $revisionID,
        string $objectID,
        RequestOptions|array|null $requestOptions = null,
    ): string {
        $params = Util::removeNulls(['objectID' => $objectID]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->restorePreviousVersionToDraft($revisionID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
