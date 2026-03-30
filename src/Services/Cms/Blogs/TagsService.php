<?php

declare(strict_types=1);

namespace HubspotSDK\Services\Cms\Blogs;

use HubspotSDK\Client;
use HubspotSDK\Cms\Blogs\Tags\TagAttachToLangGroupParams\PrimaryLanguage;
use HubspotSDK\Cms\Blogs\Tags\TagCreateParams\Language;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Core\Util;
use HubspotSDK\RequestOptions;
use HubspotSDK\ServiceContracts\Cms\Blogs\TagsContract;
use HubspotSDK\Services\Cms\Blogs\Tags\BatchService;

/**
 * @phpstan-import-type RequestOpts from \HubspotSDK\RequestOptions
 */
final class TagsService implements TagsContract
{
    /**
     * @api
     */
    public TagsRawService $raw;

    /**
     * @api
     */
    public BatchService $batch;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new TagsRawService($client);
        $this->batch = new BatchService($client);
    }

    /**
     * @api
     *
     * Create a new Blog Tag.
     *
     * @param string $id the unique ID of the Blog Tag
     * @param \DateTimeInterface $created the timestamp (ISO8601 format) when this Blog Tag was created
     * @param \DateTimeInterface $deletedAt the timestamp (ISO8601 format) when this Blog Tag was deleted
     * @param Language|value-of<Language> $language the explicitly defined ISO 639 language code of the tag
     * @param string $name the name of the tag
     * @param int $translatedFromID ID of the primary tag this object was translated from
     * @param \DateTimeInterface $updated the timestamp (ISO8601 format) when this Blog Tag was updated
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function create(
        string $id,
        \DateTimeInterface $created,
        \DateTimeInterface $deletedAt,
        Language|string $language,
        string $name,
        string $slug,
        int $translatedFromID,
        \DateTimeInterface $updated,
        RequestOptions|array|null $requestOptions = null,
    ): string {
        $params = Util::removeNulls(
            [
                'id' => $id,
                'created' => $created,
                'deletedAt' => $deletedAt,
                'language' => $language,
                'name' => $name,
                'slug' => $slug,
                'translatedFromID' => $translatedFromID,
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
     * Sparse updates a single Blog Tag object identified by the id in the path.
     * All the column values need not be specified. Only the that need to be modified can be specified.
     *
     * @param string $objectID Path param
     * @param string $id body param: The unique ID of the Blog Tag
     * @param \DateTimeInterface $created body param: The timestamp (ISO8601 format) when this Blog Tag was created
     * @param \DateTimeInterface $deletedAt body param: The timestamp (ISO8601 format) when this Blog Tag was deleted
     * @param \HubspotSDK\Cms\Blogs\Tags\TagUpdateParams\Language|value-of<\HubspotSDK\Cms\Blogs\Tags\TagUpdateParams\Language> $language body param: The explicitly defined ISO 639 language code of the tag
     * @param string $name body param: The name of the tag
     * @param string $slug Body param
     * @param int $translatedFromID body param: ID of the primary tag this object was translated from
     * @param \DateTimeInterface $updated body param: The timestamp (ISO8601 format) when this Blog Tag was updated
     * @param bool $archived query param: Whether to return only results that have been archived
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function update(
        string $objectID,
        string $id,
        \DateTimeInterface $created,
        \DateTimeInterface $deletedAt,
        \HubspotSDK\Cms\Blogs\Tags\TagUpdateParams\Language|string $language,
        string $name,
        string $slug,
        int $translatedFromID,
        \DateTimeInterface $updated,
        ?bool $archived = null,
        RequestOptions|array|null $requestOptions = null,
    ): string {
        $params = Util::removeNulls(
            [
                'id' => $id,
                'created' => $created,
                'deletedAt' => $deletedAt,
                'language' => $language,
                'name' => $name,
                'slug' => $slug,
                'translatedFromID' => $translatedFromID,
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
     * Get the list of blog tags. Supports paging and filtering. This method would be useful for an integration that examined these models and used an external service to suggest edits.
     *
     * @param string $after The paging cursor token of the last successfully read resource will be returned as the `paging.next.after` JSON property of a paged response containing more results.
     * @param bool $archived whether to return only results that have been archived
     * @param int $limit the maximum number of results to display per page
     * @param list<string> $sort
     * @param RequestOpts|null $requestOptions
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
    ): string {
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
     * Delete the Blog Tag object identified by the id in the path.
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
     * Attach a Blog Tag to a multi-language group.
     *
     * @param string $id ID of the object to add to a multi-language group
     * @param \HubspotSDK\Cms\Blogs\Tags\TagAttachToLangGroupParams\Language|value-of<\HubspotSDK\Cms\Blogs\Tags\TagAttachToLangGroupParams\Language> $language designated language of the object to add to a multi-language group
     * @param string $primaryID ID of primary language object in multi-language group
     * @param PrimaryLanguage|value-of<PrimaryLanguage> $primaryLanguage primary language of the multi-language group
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function attachToLangGroup(
        string $id,
        \HubspotSDK\Cms\Blogs\Tags\TagAttachToLangGroupParams\Language|string $language,
        string $primaryID,
        PrimaryLanguage|string|null $primaryLanguage = null,
        RequestOptions|array|null $requestOptions = null,
    ): string {
        $params = Util::removeNulls(
            [
                'id' => $id,
                'language' => $language,
                'primaryID' => $primaryID,
                'primaryLanguage' => $primaryLanguage,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->attachToLangGroup(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Create a new language variation from an existing Blog Tag
     *
     * @param string $id ID of the object to be cloned
     * @param string $name name of newly cloned blog tag
     * @param string $language target language of new variant
     * @param string $primaryLanguage language of primary blog tag to clone
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function createLangVariation(
        string $id,
        string $name,
        ?string $language = null,
        ?string $primaryLanguage = null,
        RequestOptions|array|null $requestOptions = null,
    ): string {
        $params = Util::removeNulls(
            [
                'id' => $id,
                'name' => $name,
                'language' => $language,
                'primaryLanguage' => $primaryLanguage,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->createLangVariation(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Detach a Blog Tag from a multi-language group.
     *
     * @param string $id ID of the object to remove from a multi-language group
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function detachFromLangGroup(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): string {
        $params = Util::removeNulls(['id' => $id]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->detachFromLangGroup(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Retrieve the Blog Tag object identified by the id in the path.
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
    ): string {
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
     * @param string $after The paging cursor token of the last successfully read resource will be returned as the `paging.next.after` JSON property of a paged response containing more results.
     * @param bool $archived whether to return only results that have been archived
     * @param int $limit the maximum number of results to display per page
     * @param list<string> $sort
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function listAuthorsCursor(
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
    ): string {
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
        $response = $this->raw->listAuthorsCursor(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * @param string $after The paging cursor token of the last successfully read resource will be returned as the `paging.next.after` JSON property of a paged response containing more results.
     * @param bool $archived whether to return only results that have been archived
     * @param int $limit the maximum number of results to display per page
     * @param list<string> $sort
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function listAuthorsCursorByQuery(
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
    ): string {
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
        $response = $this->raw->listAuthorsCursorByQuery(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * @param string $after The paging cursor token of the last successfully read resource will be returned as the `paging.next.after` JSON property of a paged response containing more results.
     * @param bool $archived whether to return only results that have been archived
     * @param int $limit the maximum number of results to display per page
     * @param list<string> $sort
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function listCursor(
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
    ): string {
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
        $response = $this->raw->listCursor(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * @param string $after The paging cursor token of the last successfully read resource will be returned as the `paging.next.after` JSON property of a paged response containing more results.
     * @param bool $archived whether to return only results that have been archived
     * @param int $limit the maximum number of results to display per page
     * @param list<string> $sort
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function listCursorByQuery(
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
    ): string {
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
        $response = $this->raw->listCursorByQuery(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * @param string $after The paging cursor token of the last successfully read resource will be returned as the `paging.next.after` JSON property of a paged response containing more results.
     * @param bool $archived whether to return only results that have been archived
     * @param int $limit the maximum number of results to display per page
     * @param list<string> $sort
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function listPostsCursor(
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
    ): string {
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
        $response = $this->raw->listPostsCursor(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * @param string $after The paging cursor token of the last successfully read resource will be returned as the `paging.next.after` JSON property of a paged response containing more results.
     * @param bool $archived whether to return only results that have been archived
     * @param int $limit the maximum number of results to display per page
     * @param list<string> $sort
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function listPostsCursorByQuery(
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
    ): string {
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
        $response = $this->raw->listPostsCursorByQuery(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Set a Blog Tag as the primary language of a multi-language group.
     *
     * @param string $id ID of object to set as primary in multi-language group
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function setLangPrimary(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): mixed {
        $params = Util::removeNulls(['id' => $id]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->setLangPrimary(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Explicitly set new languages for each Blog Tag in a multi-language group.
     *
     * @param array<string,\HubspotSDK\Cms\Blogs\Tags\TagUpdateLangsParams\Language|value-of<\HubspotSDK\Cms\Blogs\Tags\TagUpdateLangsParams\Language>> $languages map of object IDs to associated languages of object in the multi-language group
     * @param string $primaryID ID of the primary object in the multi-language group
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function updateLangs(
        array $languages,
        string $primaryID,
        RequestOptions|array|null $requestOptions = null,
    ): string {
        $params = Util::removeNulls(
            ['languages' => $languages, 'primaryID' => $primaryID]
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->updateLangs(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
