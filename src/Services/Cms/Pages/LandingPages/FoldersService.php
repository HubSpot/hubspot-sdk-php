<?php

declare(strict_types=1);

namespace HubSpotSDK\Services\Cms\Pages\LandingPages;

use HubSpotSDK\Client;
use HubSpotSDK\Cms\Pages\BatchResponseContentFolder;
use HubSpotSDK\Cms\Pages\ContentFolder;
use HubSpotSDK\Cms\Pages\ContentFolderVersion;
use HubSpotSDK\Core\Exceptions\APIException;
use HubSpotSDK\Core\Util;
use HubSpotSDK\Page;
use HubSpotSDK\RequestOptions;
use HubSpotSDK\ServiceContracts\Cms\Pages\LandingPages\FoldersContract;

/**
 * @phpstan-import-type ContentFolderShape from \HubSpotSDK\Cms\Pages\ContentFolder
 * @phpstan-import-type RequestOpts from \HubSpotSDK\RequestOptions
 */
final class FoldersService implements FoldersContract
{
    /**
     * @api
     */
    public FoldersRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new FoldersRawService($client);
    }

    /**
     * @api
     *
     * Create a new folder for landing pages.
     *
     * @param string $id the unique ID of the content folder
     * @param int $category The type of object this folder applies to. Should always be LANDING_PAGE.
     * @param \DateTimeInterface $created the timestamp indicating when the content folder was created
     * @param \DateTimeInterface $deletedAt the timestamp (ISO8601 format) when this content folder was deleted
     * @param string $name The name of the folder which will show up in the app dashboard
     * @param int $parentFolderID The ID of the content folder this folder is nested under
     * @param \DateTimeInterface $updated the timestamp indicating when the content folder was last updated
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function create(
        string $id,
        int $category,
        \DateTimeInterface $created,
        \DateTimeInterface $deletedAt,
        string $name,
        int $parentFolderID,
        \DateTimeInterface $updated,
        RequestOptions|array|null $requestOptions = null,
    ): ContentFolder {
        $params = Util::removeNulls(
            [
                'id' => $id,
                'category' => $category,
                'created' => $created,
                'deletedAt' => $deletedAt,
                'name' => $name,
                'parentFolderID' => $parentFolderID,
                'updated' => $updated,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->create(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Partially update a landing page folder, specified by the folder ID. You only need to specify the details values that you are modifying.
     *
     * @param string $objectID Path param
     * @param string $id body param: The unique ID of the content folder
     * @param int $category Body param: The type of object this folder applies to. Should always be LANDING_PAGE.
     * @param \DateTimeInterface $created body param: The timestamp indicating when the content folder was created
     * @param \DateTimeInterface $deletedAt body param: The timestamp (ISO8601 format) when this content folder was deleted
     * @param string $name Body param: The name of the folder which will show up in the app dashboard
     * @param int $parentFolderID Body param: The ID of the content folder this folder is nested under
     * @param \DateTimeInterface $updated body param: The timestamp indicating when the content folder was last updated
     * @param bool $archived query param: Whether to return only results that have been archived
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function update(
        string $objectID,
        string $id,
        int $category,
        \DateTimeInterface $created,
        \DateTimeInterface $deletedAt,
        string $name,
        int $parentFolderID,
        \DateTimeInterface $updated,
        ?bool $archived = null,
        RequestOptions|array|null $requestOptions = null,
    ): ContentFolder {
        $params = Util::removeNulls(
            [
                'id' => $id,
                'category' => $category,
                'created' => $created,
                'deletedAt' => $deletedAt,
                'name' => $name,
                'parentFolderID' => $parentFolderID,
                'updated' => $updated,
                'archived' => $archived,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->update($objectID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Get the list of Landing Page Folders. Supports paging and filtering. This method would be useful for an integration that examined these models and used an external service to suggest edits.
     *
     * @param string $after The paging cursor token of the last successfully read resource will be returned as the `paging.next.after` JSON property of a paged response containing more results.
     * @param bool $archived whether to return only results that have been archived
     * @param \DateTimeInterface $createdAfter filter folders created after the specified date and time
     * @param \DateTimeInterface $createdAt filter folders by their exact creation date and time
     * @param int $limit the maximum number of results to display per page
     * @param string $property specify a property to include in the response
     * @param list<string> $sort
     * @param RequestOpts|null $requestOptions
     *
     * @return Page<ContentFolder>
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
        ?string $property = null,
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
                'property' => $property,
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
     * Delete a landing page folder, specified by its ID.
     *
     * @param bool $archived whether to return only results that have been archived
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function delete(
        string $objectID,
        ?bool $archived = null,
        RequestOptions|array|null $requestOptions = null,
    ): mixed {
        $params = Util::removeNulls(['archived' => $archived]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->delete($objectID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Retrieve a batch of landing page folders as identified in the request body.
     *
     * @param list<string> $inputs body param: Strings to input
     * @param bool $archived query param: Whether to return only results that have been archived
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function batchGet(
        array $inputs,
        ?bool $archived = null,
        RequestOptions|array|null $requestOptions = null,
    ): BatchResponseContentFolder {
        $params = Util::removeNulls(['inputs' => $inputs, 'archived' => $archived]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->batchGet(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Create a batch of folders as detailed in the request body.
     *
     * @param list<ContentFolder|ContentFolderShape> $inputs content folders to input
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function createFolders(
        array $inputs,
        RequestOptions|array|null $requestOptions = null
    ): BatchResponseContentFolder {
        $params = Util::removeNulls(['inputs' => $inputs]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->createFolders(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Delete a batch of folders as specified in the request body.
     *
     * @param list<string> $inputs strings to input
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function deleteFolders(
        array $inputs,
        RequestOptions|array|null $requestOptions = null
    ): mixed {
        $params = Util::removeNulls(['inputs' => $inputs]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->deleteFolders(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Retrieve a landing page folder, specified by its ID.
     *
     * @param bool $archived whether to return only results that have been archived
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function get(
        string $objectID,
        ?bool $archived = null,
        ?string $property = null,
        RequestOptions|array|null $requestOptions = null,
    ): ContentFolder {
        $params = Util::removeNulls(
            ['archived' => $archived, 'property' => $property]
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->get($objectID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Retrieve a previous version of a folder, specified by the folder ID and revision ID.
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function getRevision(
        string $revisionID,
        string $objectID,
        RequestOptions|array|null $requestOptions = null,
    ): ContentFolderVersion {
        $params = Util::removeNulls(['objectID' => $objectID]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->getRevision($revisionID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Retrieves all the previous versions of a landing page folder.
     *
     * @param string $after The paging cursor token of the last successfully read resource will be returned as the `paging.next.after` JSON property of a paged response containing more results.
     * @param int $limit the maximum number of results to display per page
     * @param RequestOpts|null $requestOptions
     *
     * @return Page<ContentFolderVersion>
     *
     * @throws APIException
     */
    public function listRevisions(
        string $objectID,
        ?string $after = null,
        ?string $before = null,
        ?int $limit = null,
        RequestOptions|array|null $requestOptions = null,
    ): Page {
        $params = Util::removeNulls(
            ['after' => $after, 'before' => $before, 'limit' => $limit]
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->listRevisions($objectID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Takes a specified version of a landing page folder and restores it.
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function restoreRevision(
        string $revisionID,
        string $objectID,
        RequestOptions|array|null $requestOptions = null,
    ): ContentFolder {
        $params = Util::removeNulls(['objectID' => $objectID]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->restoreRevision($revisionID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Update a batch of landing page folders as specified in the request body.
     *
     * @param list<mixed> $inputs body param: JSON nodes to input
     * @param bool $archived query param: Whether to return only results that have been archived
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function updateFolders(
        array $inputs,
        ?bool $archived = null,
        RequestOptions|array|null $requestOptions = null,
    ): BatchResponseContentFolder {
        $params = Util::removeNulls(['inputs' => $inputs, 'archived' => $archived]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->updateFolders(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
