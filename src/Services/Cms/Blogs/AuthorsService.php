<?php

declare(strict_types=1);

namespace HubspotSDK\Services\Cms\Blogs;

use HubspotSDK\Client;
use HubspotSDK\Cms\Blogs\Authors\AuthorCreateParams\Language;
use HubspotSDK\Cms\Blogs\Authors\BatchResponseBlogAuthor;
use HubspotSDK\Cms\Blogs\Authors\BlogAuthor;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Core\Util;
use HubspotSDK\Page;
use HubspotSDK\RequestOptions;
use HubspotSDK\ServiceContracts\Cms\Blogs\AuthorsContract;

/**
 * @phpstan-import-type RequestOpts from \HubspotSDK\RequestOptions
 * @phpstan-import-type BlogAuthorShape from \HubspotSDK\Cms\Blogs\Authors\BlogAuthor
 */
final class AuthorsService implements AuthorsContract
{
    /**
     * @api
     */
    public AuthorsRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new AuthorsRawService($client);
    }

    /**
     * @api
     *
     * Create a new Blog Author.
     *
     * @param string $id the unique ID of the Blog Author
     * @param string $avatar URL to the blog author's avatar, if supplying a custom one
     * @param string $bio a short biography of the blog author
     * @param \DateTimeInterface $deletedAt the timestamp (ISO8601 format) when this Blog Author was deleted
     * @param string $displayName the full name of the Blog Author to be displayed
     * @param string $email email address of the Blog Author
     * @param string $facebook URL to the Blog Author's Facebook page
     * @param Language|value-of<Language> $language the explicitly defined ISO 639 language code of the blog author
     * @param string $linkedin URL to the blog author's LinkedIn page
     * @param int $translatedFromID ID of the primary blog author this object was translated from
     * @param string $twitter URL or username of the Twitter account associated with the Blog Author. This will be normalized into the Twitter url for said user.
     * @param string $website URL to the website of the Blog Author
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function create(
        string $id,
        string $avatar,
        string $bio,
        \DateTimeInterface $created,
        \DateTimeInterface $deletedAt,
        string $displayName,
        string $email,
        string $facebook,
        string $fullName,
        Language|string $language,
        string $linkedin,
        string $name,
        string $slug,
        int $translatedFromID,
        string $twitter,
        \DateTimeInterface $updated,
        string $website,
        RequestOptions|array|null $requestOptions = null,
    ): BlogAuthor {
        $params = Util::removeNulls(
            [
                'id' => $id,
                'avatar' => $avatar,
                'bio' => $bio,
                'created' => $created,
                'deletedAt' => $deletedAt,
                'displayName' => $displayName,
                'email' => $email,
                'facebook' => $facebook,
                'fullName' => $fullName,
                'language' => $language,
                'linkedin' => $linkedin,
                'name' => $name,
                'slug' => $slug,
                'translatedFromID' => $translatedFromID,
                'twitter' => $twitter,
                'updated' => $updated,
                'website' => $website,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->create(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Sparse updates a single Blog Author object identified by the id in the path.
     * All the column values need not be specified. Only the that need to be modified can be specified.
     *
     * @param string $objectID path param: The Blog Author id
     * @param string $id body param: The unique ID of the Blog Author
     * @param string $avatar body param: URL to the blog author's avatar, if supplying a custom one
     * @param string $bio body param: A short biography of the blog author
     * @param \DateTimeInterface $created Body param
     * @param \DateTimeInterface $deletedAt body param: The timestamp (ISO8601 format) when this Blog Author was deleted
     * @param string $displayName body param: The full name of the Blog Author to be displayed
     * @param string $email body param: Email address of the Blog Author
     * @param string $facebook body param: URL to the Blog Author's Facebook page
     * @param string $fullName Body param
     * @param \HubspotSDK\Cms\Blogs\Authors\AuthorUpdateParams\Language|value-of<\HubspotSDK\Cms\Blogs\Authors\AuthorUpdateParams\Language> $language body param: The explicitly defined ISO 639 language code of the blog author
     * @param string $linkedin body param: URL to the blog author's LinkedIn page
     * @param string $name Body param
     * @param string $slug Body param
     * @param int $translatedFromID body param: ID of the primary blog author this object was translated from
     * @param string $twitter Body param: URL or username of the Twitter account associated with the Blog Author. This will be normalized into the Twitter url for said user.
     * @param \DateTimeInterface $updated Body param
     * @param string $website body param: URL to the website of the Blog Author
     * @param bool $archived Query param: Specifies whether to update deleted Blog Authors. Defaults to `false`.
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function update(
        string $objectID,
        string $id,
        string $avatar,
        string $bio,
        \DateTimeInterface $created,
        \DateTimeInterface $deletedAt,
        string $displayName,
        string $email,
        string $facebook,
        string $fullName,
        \HubspotSDK\Cms\Blogs\Authors\AuthorUpdateParams\Language|string $language,
        string $linkedin,
        string $name,
        string $slug,
        int $translatedFromID,
        string $twitter,
        \DateTimeInterface $updated,
        string $website,
        ?bool $archived = null,
        RequestOptions|array|null $requestOptions = null,
    ): BlogAuthor {
        $params = Util::removeNulls(
            [
                'id' => $id,
                'avatar' => $avatar,
                'bio' => $bio,
                'created' => $created,
                'deletedAt' => $deletedAt,
                'displayName' => $displayName,
                'email' => $email,
                'facebook' => $facebook,
                'fullName' => $fullName,
                'language' => $language,
                'linkedin' => $linkedin,
                'name' => $name,
                'slug' => $slug,
                'translatedFromID' => $translatedFromID,
                'twitter' => $twitter,
                'updated' => $updated,
                'website' => $website,
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
     * Get the list of blog authors. Supports paging and filtering. This method would be useful for an integration that examined these models and used an external service to suggest edits.
     *
     * @param string $after The cursor token value to get the next set of results. You can get this from the `paging.next.after` JSON property of a paged response containing more results.
     * @param bool $archived Specifies whether to return deleted Blog Authors. Defaults to `false`.
     * @param \DateTimeInterface $createdAfter only return Blog Authors created after the specified time
     * @param \DateTimeInterface $createdAt only return Blog Authors created at exactly the specified time
     * @param \DateTimeInterface $createdBefore only return Blog Authors created before the specified time
     * @param int $limit The maximum number of results to return. Default is 100.
     * @param list<string> $sort Specifies which fields to use for sorting results. Valid fields are `name`, `createdAt`, `updatedAt`, `createdBy`, `updatedBy`. `createdAt` will be used by default.
     * @param \DateTimeInterface $updatedAfter only return Blog Authors last updated after the specified time
     * @param \DateTimeInterface $updatedAt only return Blog Authors last updated at exactly the specified time
     * @param \DateTimeInterface $updatedBefore only return Blog Authors last updated before the specified time
     * @param RequestOpts|null $requestOptions
     *
     * @return Page<BlogAuthor>
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
     * Delete the Blog Author object identified by the id in the path.
     *
     * @param string $objectID the Blog Author id
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
     * Attach a Blog Author to a multi-language group.
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
     * Create the Blog Author objects detailed in the request body.
     *
     * @param list<BlogAuthor|BlogAuthorShape> $inputs blog authors to input
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function createBatch(
        array $inputs,
        RequestOptions|array|null $requestOptions = null
    ): BatchResponseBlogAuthor {
        $params = Util::removeNulls(['inputs' => $inputs]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->createBatch(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Create a new language variation from an existing Blog Author.
     *
     * @param string $id ID of the object to be cloned
     * @param BlogAuthor|BlogAuthorShape $blogAuthor model definition for a Blog Author
     * @param string $language language of newly cloned object
     * @param string $primaryLanguage primary language in multi-language group
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function createLanguageVariation(
        string $id,
        BlogAuthor|array $blogAuthor,
        ?string $language = null,
        ?string $primaryLanguage = null,
        RequestOptions|array|null $requestOptions = null,
    ): BlogAuthor {
        $params = Util::removeNulls(
            [
                'id' => $id,
                'blogAuthor' => $blogAuthor,
                'language' => $language,
                'primaryLanguage' => $primaryLanguage,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->createLanguageVariation(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Delete the Blog Author objects identified in the request body.
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
     * Detach a Blog Author from a multi-language group.
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
     * Retrieve the Blog Author object identified by the id in the path.
     *
     * @param string $objectID the Blog Author id
     * @param bool $archived Specifies whether to return deleted Blog Authors. Defaults to `false`.
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function get(
        string $objectID,
        ?bool $archived = null,
        ?string $property = null,
        RequestOptions|array|null $requestOptions = null,
    ): BlogAuthor {
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
     * Retrieve the Blog Author objects identified in the request body.
     *
     * @param list<string> $inputs body param: Strings to input
     * @param bool $archived Query param: Specifies whether to return deleted Blog Authors. Defaults to `false`.
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function getBatch(
        array $inputs,
        ?bool $archived = null,
        RequestOptions|array|null $requestOptions = null,
    ): BatchResponseBlogAuthor {
        $params = Util::removeNulls(['inputs' => $inputs, 'archived' => $archived]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->getBatch(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Set a Blog Author as the primary language of a multi-language group.
     *
     * @param string $id ID of object to set as primary in multi-language group
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function setNewLangPrimary(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): mixed {
        $params = Util::removeNulls(['id' => $id]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->setNewLangPrimary(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Update the Blog Author objects identified in the request body.
     *
     * @param list<mixed> $inputs body param: JSON nodes to input
     * @param bool $archived Query param: Specifies whether to update deleted Blog Authors. Defaults to `false`.
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function updateBatch(
        array $inputs,
        ?bool $archived = null,
        RequestOptions|array|null $requestOptions = null,
    ): BatchResponseBlogAuthor {
        $params = Util::removeNulls(['inputs' => $inputs, 'archived' => $archived]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->updateBatch(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Explicitly set new languages for each Blog Author in a multi-language group.
     *
     * @param array<string,string> $languages map of object IDs to associated languages of object in the multi-language group
     * @param string $primaryID ID of the primary object in the multi-language group
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function updateLanguages(
        array $languages,
        string $primaryID,
        RequestOptions|array|null $requestOptions = null,
    ): mixed {
        $params = Util::removeNulls(
            ['languages' => $languages, 'primaryID' => $primaryID]
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->updateLanguages(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
