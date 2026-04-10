<?php

declare(strict_types=1);

namespace HubSpotSDK\Services\Cms\Blogs\Posts;

use HubSpotSDK\Client;
use HubSpotSDK\Cms\Blogs\Posts\Revisions\RevisionGetPreviousVersionParams;
use HubSpotSDK\Cms\Blogs\Posts\Revisions\RevisionGetPreviousVersionsParams;
use HubSpotSDK\Cms\Blogs\Posts\Revisions\RevisionRestorePreviousVersionParams;
use HubSpotSDK\Cms\Blogs\Posts\Revisions\RevisionRestorePreviousVersionToDraftParams;
use HubSpotSDK\Core\Contracts\BaseResponse;
use HubSpotSDK\Core\Exceptions\APIException;
use HubSpotSDK\RequestOptions;
use HubSpotSDK\ServiceContracts\Cms\Blogs\Posts\RevisionsRawContract;

/**
 * @phpstan-import-type RequestOpts from \HubSpotSDK\RequestOptions
 */
final class RevisionsRawService implements RevisionsRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Retrieve a previous version of a blog post.
     *
     * @param array{objectID: string}|RevisionGetPreviousVersionParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<string>
     *
     * @throws APIException
     */
    public function getPreviousVersion(
        string $revisionID,
        array|RevisionGetPreviousVersionParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = RevisionGetPreviousVersionParams::parseRequest(
            $params,
            $requestOptions,
        );
        $objectID = $parsed['objectID'];
        unset($parsed['objectID']);

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: [
                'cms/blogs/2026-03/posts/%1$s/revisions/%2$s', $objectID, $revisionID,
            ],
            headers: ['Accept' => '*/*'],
            options: $options,
            convert: 'string',
        );
    }

    /**
     * @api
     *
     * Retrieve all the previous versions of a blog post.
     *
     * @param array{
     *   after?: string, before?: string, limit?: int
     * }|RevisionGetPreviousVersionsParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<string>
     *
     * @throws APIException
     */
    public function getPreviousVersions(
        string $objectID,
        array|RevisionGetPreviousVersionsParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = RevisionGetPreviousVersionsParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['cms/blogs/2026-03/posts/%1$s/revisions', $objectID],
            query: $parsed,
            headers: ['Accept' => '*/*'],
            options: $options,
            convert: 'string',
        );
    }

    /**
     * @api
     *
     * Restores a blog post to one of its previous versions.
     *
     * @param array{objectID: string}|RevisionRestorePreviousVersionParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<string>
     *
     * @throws APIException
     */
    public function restorePreviousVersion(
        string $revisionID,
        array|RevisionRestorePreviousVersionParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = RevisionRestorePreviousVersionParams::parseRequest(
            $params,
            $requestOptions,
        );
        $objectID = $parsed['objectID'];
        unset($parsed['objectID']);

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: [
                'cms/blogs/2026-03/posts/%1$s/revisions/%2$s/restore',
                $objectID,
                $revisionID,
            ],
            headers: ['Accept' => '*/*'],
            options: $options,
            convert: 'string',
        );
    }

    /**
     * @api
     *
     * Takes a specified version of a blog post, sets it as the new draft version of the blog post.
     *
     * @param array{
     *   objectID: string
     * }|RevisionRestorePreviousVersionToDraftParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<string>
     *
     * @throws APIException
     */
    public function restorePreviousVersionToDraft(
        int $revisionID,
        array|RevisionRestorePreviousVersionToDraftParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = RevisionRestorePreviousVersionToDraftParams::parseRequest(
            $params,
            $requestOptions,
        );
        $objectID = $parsed['objectID'];
        unset($parsed['objectID']);

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: [
                'cms/blogs/2026-03/posts/%1$s/revisions/%2$s/restore-to-draft',
                $objectID,
                $revisionID,
            ],
            headers: ['Accept' => '*/*'],
            options: $options,
            convert: 'string',
        );
    }
}
