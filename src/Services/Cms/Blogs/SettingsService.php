<?php

declare(strict_types=1);

namespace HubspotSDK\Services\Cms\Blogs;

use HubspotSDK\Client;
use HubspotSDK\Cms\Blogs\Settings\Blog;
use HubspotSDK\Cms\Blogs\Settings\BlogVersion;
use HubspotSDK\Cms\Blogs\Settings\VersionBlog;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Core\Util;
use HubspotSDK\Page;
use HubspotSDK\RequestOptions;
use HubspotSDK\ServiceContracts\Cms\Blogs\SettingsContract;
use HubspotSDK\Services\Cms\Blogs\Settings\MultiLanguageService;

/**
 * @phpstan-import-type RequestOpts from \HubspotSDK\RequestOptions
 */
final class SettingsService implements SettingsContract
{
    /**
     * @api
     */
    public SettingsRawService $raw;

    /**
     * @api
     */
    public MultiLanguageService $multiLanguage;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new SettingsRawService($client);
        $this->multiLanguage = new MultiLanguageService($client);
    }

    /**
     * @api
     *
     * Get the list of blogs. Results can be limited and filtered by creation or updated date.
     *
     * @param string $after The paging cursor token of the last successfully read resource will be returned as the `paging.next.after` JSON property of a paged response containing more results.
     * @param bool $archived whether to return only results that have been archived
     * @param int $limit the maximum number of results to display per page
     * @param list<string> $sort
     * @param RequestOpts|null $requestOptions
     *
     * @return Page<Blog>
     *
     * @throws APIException
     */
    public function list(
        ?string $after = null,
        ?bool $archived = null,
        ?\DateTimeInterface $createdAfter = null,
        ?\DateTimeInterface $createdAt = null,
        ?\DateTimeInterface $createdBefore = null,
        ?int $limit = null,
        ?array $sort = null,
        ?\DateTimeInterface $updatedAfter = null,
        ?\DateTimeInterface $updatedAt = null,
        ?\DateTimeInterface $updatedBefore = null,
        RequestOptions|array|null $requestOptions = null,
    ): Page {
        $params = Util::removeNulls(
            [
                'after' => $after,
                'archived' => $archived,
                'createdAfter' => $createdAfter,
                'createdAt' => $createdAt,
                'createdBefore' => $createdBefore,
                'limit' => $limit,
                'sort' => $sort,
                'updatedAfter' => $updatedAfter,
                'updatedAt' => $updatedAt,
                'updatedBefore' => $updatedBefore,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->list(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Retrieve a specific blog by its ID.
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function get(
        string $blogID,
        RequestOptions|array|null $requestOptions = null
    ): Blog {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->get($blogID, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Get a specific blog revision.
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function getRevision(
        string $revisionID,
        string $blogID,
        RequestOptions|array|null $requestOptions = null,
    ): BlogVersion {
        $params = Util::removeNulls(['blogID' => $blogID]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->getRevision($revisionID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Get the list of blog revisions. Results can be limited and filtered by creation or updated date.
     *
     * @param string $after The paging cursor token of the last successfully read resource will be returned as the `paging.next.after` JSON property of a paged response containing more results.
     * @param int $limit the maximum number of results to display per page
     * @param RequestOpts|null $requestOptions
     *
     * @return Page<VersionBlog>
     *
     * @throws APIException
     */
    public function listRevisions(
        string $blogID,
        ?string $after = null,
        ?string $before = null,
        ?int $limit = null,
        RequestOptions|array|null $requestOptions = null,
    ): Page {
        $params = Util::removeNulls(
            ['after' => $after, 'before' => $before, 'limit' => $limit]
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->listRevisions($blogID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
