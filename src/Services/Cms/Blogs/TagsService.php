<?php

declare(strict_types=1);

namespace HubspotSDK\Services\Cms\Blogs;

use HubspotSDK\Client;
use HubspotSDK\Cms\Blogs\Tags\BatchResponseTag;
use HubspotSDK\Cms\Blogs\Tags\Tag;
use HubspotSDK\Cms\Blogs\Tags\TagCreateParams\Language;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Core\Util;
use HubspotSDK\Page;
use HubspotSDK\RequestOptions;
use HubspotSDK\ServiceContracts\Cms\Blogs\TagsContract;

/**
 * @phpstan-import-type TagShape from \HubspotSDK\Cms\Blogs\Tags\Tag
 * @phpstan-import-type RequestOpts from \HubspotSDK\RequestOptions
 */
final class TagsService implements TagsContract
{
    /**
     * @api
     */
    public TagsRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new TagsRawService($client);
    }

    /**
     * @api
     *
     * Create a new Blog Tag.
     *
     * @param string $id the unique ID of the Blog Tag
     * @param \DateTimeInterface $deletedAt the timestamp (ISO8601 format) when this Blog Tag was deleted
     * @param Language|value-of<Language> $language the explicitly defined ISO 639 language code of the tag
     * @param string $name the name of the tag
     * @param int $translatedFromID ID of the primary tag this object was translated from
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
        int $translatedFromID,
        \DateTimeInterface $updated,
        RequestOptions|array|null $requestOptions = null,
    ): Tag {
        $params = Util::removeNulls(
            [
                'id' => $id,
                'created' => $created,
                'deletedAt' => $deletedAt,
                'language' => $language,
                'name' => $name,
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
     * @param string $objectID path param: The Blog Tag id
     * @param string $id body param: The unique ID of the Blog Tag
     * @param \DateTimeInterface $created Body param
     * @param \DateTimeInterface $deletedAt body param: The timestamp (ISO8601 format) when this Blog Tag was deleted
     * @param \HubspotSDK\Cms\Blogs\Tags\TagUpdateParams\Language|value-of<\HubspotSDK\Cms\Blogs\Tags\TagUpdateParams\Language> $language body param: The explicitly defined ISO 639 language code of the tag
     * @param string $name body param: The name of the tag
     * @param int $translatedFromID body param: ID of the primary tag this object was translated from
     * @param \DateTimeInterface $updated Body param
     * @param bool $archived Query param: Specifies whether to update deleted Blog Tags. Defaults to `false`.
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
        int $translatedFromID,
        \DateTimeInterface $updated,
        ?bool $archived = null,
        RequestOptions|array|null $requestOptions = null,
    ): Tag {
        $params = Util::removeNulls(
            [
                'id' => $id,
                'created' => $created,
                'deletedAt' => $deletedAt,
                'language' => $language,
                'name' => $name,
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
     * @param string $after The cursor token value to get the next set of results. You can get this from the `paging.next.after` JSON property of a paged response containing more results.
     * @param bool $archived Specifies whether to return deleted Blog Tags. Defaults to `false`.
     * @param \DateTimeInterface $createdAfter only return Blog Tags created after the specified time
     * @param \DateTimeInterface $createdAt only return Blog Tags created at exactly the specified time
     * @param \DateTimeInterface $createdBefore only return Blog Tags created before the specified time
     * @param int $limit The maximum number of results to return. Default is 100.
     * @param list<string> $sort Specifies which fields to use for sorting results. Valid fields are `name`, `createdAt`, `updatedAt`, `createdBy`, `updatedBy`. `createdAt` will be used by default.
     * @param \DateTimeInterface $updatedAfter only return Blog Tags last updated after the specified time
     * @param \DateTimeInterface $updatedAt only return Blog Tags last updated at exactly the specified time
     * @param \DateTimeInterface $updatedBefore only return Blog Tags last updated before the specified time
     * @param RequestOpts|null $requestOptions
     *
     * @return Page<Tag>
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
     * Delete the Blog Tag object identified by the id in the path.
     *
     * @param string $objectID the Blog Tag id
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
     * @param string $language designated language of the object to add to a multi-language group
     * @param string $primaryID ID of primary language object in multi-language group
     * @param string $primaryLanguage primary language of the multi-language group
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function attachToLangGroup(
        string $id,
        string $language,
        string $primaryID,
        ?string $primaryLanguage = null,
        RequestOptions|array|null $requestOptions = null,
    ): mixed {
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
    ): BatchResponseTag {
        $params = Util::removeNulls(['inputs' => $inputs]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->createBatch(params: $params, requestOptions: $requestOptions);

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
    ): Tag {
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
     * Delete the Blog Tag objects identified in the request body.
     *
     * @param list<string> $inputs strings to input
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function deleteBatch(
        array $inputs,
        RequestOptions|array|null $requestOptions = null
    ): mixed {
        $params = Util::removeNulls(['inputs' => $inputs]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->deleteBatch(params: $params, requestOptions: $requestOptions);

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
    ): mixed {
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
     * @param string $objectID the Blog Tag id
     * @param bool $archived Specifies whether to return deleted Blog Tags. Defaults to `false`.
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function get(
        string $objectID,
        ?bool $archived = null,
        ?string $property = null,
        RequestOptions|array|null $requestOptions = null,
    ): Tag {
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
     * Retrieve the Blog Tag objects identified in the request body.
     *
     * @param list<string> $inputs body param: Strings to input
     * @param bool $archived Query param: Specifies whether to return deleted Blog Tags. Defaults to `false`.
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function getBatch(
        array $inputs,
        ?bool $archived = null,
        RequestOptions|array|null $requestOptions = null,
    ): BatchResponseTag {
        $params = Util::removeNulls(['inputs' => $inputs, 'archived' => $archived]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->getBatch(params: $params, requestOptions: $requestOptions);

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
     * Update the Blog Tag objects identified in the request body.
     *
     * @param list<mixed> $inputs body param: JSON nodes to input
     * @param bool $archived Query param: Specifies whether to update deleted Blog Tags. Defaults to `false`.
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function updateBatch(
        array $inputs,
        ?bool $archived = null,
        RequestOptions|array|null $requestOptions = null,
    ): BatchResponseTag {
        $params = Util::removeNulls(['inputs' => $inputs, 'archived' => $archived]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->updateBatch(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Explicitly set new languages for each Blog Tag in a multi-language group.
     *
     * @param array<string,string> $languages map of object IDs to associated languages of object in the multi-language group
     * @param string $primaryID ID of the primary object in the multi-language group
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function updateLangs(
        array $languages,
        string $primaryID,
        RequestOptions|array|null $requestOptions = null,
    ): mixed {
        $params = Util::removeNulls(
            ['languages' => $languages, 'primaryID' => $primaryID]
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->updateLangs(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
