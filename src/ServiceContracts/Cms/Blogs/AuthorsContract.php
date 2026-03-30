<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\Cms\Blogs;

use HubspotSDK\Cms\Blogs\Authors\AuthorAttachToLangGroupParams\PrimaryLanguage;
use HubspotSDK\Cms\Blogs\Authors\AuthorCreateParams\Language;
use HubspotSDK\Cms\Blogs\Authors\BlogAuthor;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\RequestOptions;

/**
 * @phpstan-import-type BlogAuthorShape from \HubspotSDK\Cms\Blogs\Authors\BlogAuthor
 * @phpstan-import-type RequestOpts from \HubspotSDK\RequestOptions
 */
interface AuthorsContract
{
    /**
     * @api
     *
     * @param string $id the unique ID of the Blog Author
     * @param string $avatar URL to the blog author's avatar, if supplying a custom one
     * @param string $bio a short biography of the blog author
     * @param \DateTimeInterface $created the timestamp (ISO8601 format) when this Blog Author was created
     * @param \DateTimeInterface $deletedAt the timestamp (ISO8601 format) when this Blog Author was deleted
     * @param string $displayName the full name of the Blog Author to be displayed
     * @param string $email email address of the Blog Author
     * @param string $facebook URL to the Blog Author's Facebook page
     * @param string $fullName the full, unabbreviated name of the blog author, typically their first and last name combined
     * @param Language|value-of<Language> $language the explicitly defined ISO 639 language code of the blog author
     * @param string $linkedin URL to the blog author's LinkedIn page
     * @param string $name The name field for the blog author. (This appears to be a shorter or alternative name field compared to fullName.)
     * @param string $slug A URL-friendly identifier for the blog author that can be used to reference the author in URLs. Typically generated from the author's name and contains lowercase letters, hyphens, and underscores.
     * @param int $translatedFromID ID of the primary blog author this object was translated from
     * @param string $twitter URL or username of the Twitter account associated with the Blog Author. This will be normalized into the Twitter url for said user.
     * @param \DateTimeInterface $updated the timestamp (ISO8601 format) when this Blog Author was updated
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
    ): string;

    /**
     * @api
     *
     * @param string $objectID Path param
     * @param string $id body param: The unique ID of the Blog Author
     * @param string $avatar body param: URL to the blog author's avatar, if supplying a custom one
     * @param string $bio body param: A short biography of the blog author
     * @param \DateTimeInterface $created body param: The timestamp (ISO8601 format) when this Blog Author was created
     * @param \DateTimeInterface $deletedAt body param: The timestamp (ISO8601 format) when this Blog Author was deleted
     * @param string $displayName body param: The full name of the Blog Author to be displayed
     * @param string $email body param: Email address of the Blog Author
     * @param string $facebook body param: URL to the Blog Author's Facebook page
     * @param string $fullName body param: The full, unabbreviated name of the blog author, typically their first and last name combined
     * @param \HubspotSDK\Cms\Blogs\Authors\AuthorUpdateParams\Language|value-of<\HubspotSDK\Cms\Blogs\Authors\AuthorUpdateParams\Language> $language body param: The explicitly defined ISO 639 language code of the blog author
     * @param string $linkedin body param: URL to the blog author's LinkedIn page
     * @param string $name Body param: The name field for the blog author. (This appears to be a shorter or alternative name field compared to fullName.)
     * @param string $slug Body param: A URL-friendly identifier for the blog author that can be used to reference the author in URLs. Typically generated from the author's name and contains lowercase letters, hyphens, and underscores.
     * @param int $translatedFromID body param: ID of the primary blog author this object was translated from
     * @param string $twitter Body param: URL or username of the Twitter account associated with the Blog Author. This will be normalized into the Twitter url for said user.
     * @param \DateTimeInterface $updated body param: The timestamp (ISO8601 format) when this Blog Author was updated
     * @param string $website body param: URL to the website of the Blog Author
     * @param bool $archived query param: Whether to return only results that have been archived
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
    ): string;

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
    ): string;

    /**
     * @api
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
    ): mixed;

    /**
     * @api
     *
     * @param string $id ID of the object to add to a multi-language group
     * @param \HubspotSDK\Cms\Blogs\Authors\AuthorAttachToLangGroupParams\Language|value-of<\HubspotSDK\Cms\Blogs\Authors\AuthorAttachToLangGroupParams\Language> $language designated language of the object to add to a multi-language group
     * @param string $primaryID ID of primary language object in multi-language group
     * @param PrimaryLanguage|value-of<PrimaryLanguage> $primaryLanguage primary language of the multi-language group
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function attachToLangGroup(
        string $id,
        \HubspotSDK\Cms\Blogs\Authors\AuthorAttachToLangGroupParams\Language|string $language,
        string $primaryID,
        PrimaryLanguage|string|null $primaryLanguage = null,
        RequestOptions|array|null $requestOptions = null,
    ): string;

    /**
     * @api
     *
     * @param string $id ID of the object to be cloned
     * @param BlogAuthor|BlogAuthorShape $blogAuthor
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
    ): string;

    /**
     * @api
     *
     * @param string $id ID of the object to remove from a multi-language group
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function detachFromLangGroup(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): string;

    /**
     * @api
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
    ): string;

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
    public function listByQuery(
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
    ): string;

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
    public function listPosts(
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
    ): string;

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
    public function listPostsByQuery(
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
    ): string;

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
    public function listTags(
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
    ): string;

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
    public function listTagsByQuery(
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
    ): string;

    /**
     * @api
     *
     * @param string $id ID of object to set as primary in multi-language group
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function setNewLangPrimary(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): mixed;

    /**
     * @api
     *
     * @param array<string,\HubspotSDK\Cms\Blogs\Authors\AuthorUpdateLanguagesParams\Language|value-of<\HubspotSDK\Cms\Blogs\Authors\AuthorUpdateLanguagesParams\Language>> $languages map of object IDs to associated languages of object in the multi-language group
     * @param string $primaryID ID of the primary object in the multi-language group
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function updateLanguages(
        array $languages,
        string $primaryID,
        RequestOptions|array|null $requestOptions = null,
    ): string;
}
