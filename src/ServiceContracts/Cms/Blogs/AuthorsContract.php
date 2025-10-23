<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\Cms\Blogs;

use HubspotSDK\Cms\Blogs\Authors\AuthorCreateParams\Language;
use HubspotSDK\Cms\Blogs\Authors\BatchResponseBlogAuthor;
use HubspotSDK\Cms\Blogs\Authors\BlogAuthor;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Page;
use HubspotSDK\RequestOptions;

use const HubspotSDK\Core\OMIT as omit;

interface AuthorsContract
{
    /**
     * @api
     *
     * @param string $id the unique ID of the Blog Author
     * @param string $avatar URL to the blog author's avatar, if supplying a custom one
     * @param string $bio a short biography of the blog author
     * @param \DateTimeInterface $created
     * @param \DateTimeInterface $deletedAt the timestamp (ISO8601 format) when this Blog Author was deleted
     * @param string $displayName the full name of the Blog Author to be displayed
     * @param string $email email address of the Blog Author
     * @param string $facebook URL to the Blog Author's Facebook page
     * @param string $fullName
     * @param Language|value-of<Language> $language the explicitly defined ISO 639 language code of the blog author
     * @param string $linkedin URL to the blog author's LinkedIn page
     * @param string $name
     * @param string $slug
     * @param int $translatedFromID ID of the primary blog author this object was translated from
     * @param string $twitter URL or username of the Twitter account associated with the Blog Author. This will be normalized into the Twitter url for said user.
     * @param \DateTimeInterface $updated
     * @param string $website URL to the website of the Blog Author
     *
     * @throws APIException
     */
    public function create(
        $id,
        $avatar,
        $bio,
        $created,
        $deletedAt,
        $displayName,
        $email,
        $facebook,
        $fullName,
        $language,
        $linkedin,
        $name,
        $slug,
        $translatedFromID,
        $twitter,
        $updated,
        $website,
        ?RequestOptions $requestOptions = null,
    ): BlogAuthor;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function createRaw(
        array $params,
        ?RequestOptions $requestOptions = null
    ): BlogAuthor;

    /**
     * @api
     *
     * @param string $id the unique ID of the Blog Author
     * @param string $avatar URL to the blog author's avatar, if supplying a custom one
     * @param string $bio a short biography of the blog author
     * @param \DateTimeInterface $created
     * @param \DateTimeInterface $deletedAt the timestamp (ISO8601 format) when this Blog Author was deleted
     * @param string $displayName the full name of the Blog Author to be displayed
     * @param string $email email address of the Blog Author
     * @param string $facebook URL to the Blog Author's Facebook page
     * @param string $fullName
     * @param \HubspotSDK\Cms\Blogs\Authors\AuthorUpdateParams\Language|value-of<\HubspotSDK\Cms\Blogs\Authors\AuthorUpdateParams\Language> $language the explicitly defined ISO 639 language code of the blog author
     * @param string $linkedin URL to the blog author's LinkedIn page
     * @param string $name
     * @param string $slug
     * @param int $translatedFromID ID of the primary blog author this object was translated from
     * @param string $twitter URL or username of the Twitter account associated with the Blog Author. This will be normalized into the Twitter url for said user.
     * @param \DateTimeInterface $updated
     * @param string $website URL to the website of the Blog Author
     * @param bool $archived Specifies whether to update deleted Blog Authors. Defaults to `false`.
     *
     * @throws APIException
     */
    public function update(
        string $objectID,
        $id,
        $avatar,
        $bio,
        $created,
        $deletedAt,
        $displayName,
        $email,
        $facebook,
        $fullName,
        $language,
        $linkedin,
        $name,
        $slug,
        $translatedFromID,
        $twitter,
        $updated,
        $website,
        $archived = omit,
        ?RequestOptions $requestOptions = null,
    ): BlogAuthor;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function updateRaw(
        string $objectID,
        array $params,
        ?RequestOptions $requestOptions = null
    ): BlogAuthor;

    /**
     * @api
     *
     * @param string $after The cursor token value to get the next set of results. You can get this from the `paging.next.after` JSON property of a paged response containing more results.
     * @param bool $archived Specifies whether to return deleted Blog Authors. Defaults to `false`.
     * @param \DateTimeInterface $createdAfter only return Blog Authors created after the specified time
     * @param \DateTimeInterface $createdAt only return Blog Authors created at exactly the specified time
     * @param \DateTimeInterface $createdBefore only return Blog Authors created before the specified time
     * @param int $limit The maximum number of results to return. Default is 100.
     * @param string $property
     * @param list<string> $sort Specifies which fields to use for sorting results. Valid fields are `name`, `createdAt`, `updatedAt`, `createdBy`, `updatedBy`. `createdAt` will be used by default.
     * @param \DateTimeInterface $updatedAfter only return Blog Authors last updated after the specified time
     * @param \DateTimeInterface $updatedAt only return Blog Authors last updated at exactly the specified time
     * @param \DateTimeInterface $updatedBefore only return Blog Authors last updated before the specified time
     *
     * @return Page<BlogAuthor>
     *
     * @throws APIException
     */
    public function list(
        $after = omit,
        $archived = omit,
        $createdAfter = omit,
        $createdAt = omit,
        $createdBefore = omit,
        $limit = omit,
        $property = omit,
        $sort = omit,
        $updatedAfter = omit,
        $updatedAt = omit,
        $updatedBefore = omit,
        ?RequestOptions $requestOptions = null,
    ): Page;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @return Page<BlogAuthor>
     *
     * @throws APIException
     */
    public function listRaw(
        array $params,
        ?RequestOptions $requestOptions = null
    ): Page;

    /**
     * @api
     *
     * @param bool $archived whether to return only results that have been archived
     *
     * @throws APIException
     */
    public function delete(
        string $objectID,
        $archived = omit,
        ?RequestOptions $requestOptions = null,
    ): mixed;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function deleteRaw(
        string $objectID,
        array $params,
        ?RequestOptions $requestOptions = null
    ): mixed;

    /**
     * @api
     *
     * @param string $id ID of the object to add to a multi-language group
     * @param string $language designated language of the object to add to a multi-language group
     * @param string $primaryID ID of primary language object in multi-language group
     * @param string $primaryLanguage primary language of the multi-language group
     *
     * @throws APIException
     */
    public function attachToLangGroup(
        $id,
        $language,
        $primaryID,
        $primaryLanguage = omit,
        ?RequestOptions $requestOptions = null,
    ): mixed;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function attachToLangGroupRaw(
        array $params,
        ?RequestOptions $requestOptions = null
    ): mixed;

    /**
     * @api
     *
     * @param list<BlogAuthor> $inputs blog authors to input
     *
     * @throws APIException
     */
    public function createBatch(
        $inputs,
        ?RequestOptions $requestOptions = null
    ): BatchResponseBlogAuthor;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function createBatchRaw(
        array $params,
        ?RequestOptions $requestOptions = null
    ): BatchResponseBlogAuthor;

    /**
     * @api
     *
     * @param string $id ID of the object to be cloned
     * @param BlogAuthor $blogAuthor model definition for a Blog Author
     * @param string $language language of newly cloned object
     * @param string $primaryLanguage primary language in multi-language group
     *
     * @throws APIException
     */
    public function createLanguageVariation(
        $id,
        $blogAuthor,
        $language = omit,
        $primaryLanguage = omit,
        ?RequestOptions $requestOptions = null,
    ): BlogAuthor;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function createLanguageVariationRaw(
        array $params,
        ?RequestOptions $requestOptions = null
    ): BlogAuthor;

    /**
     * @api
     *
     * @param list<string> $inputs strings to input
     *
     * @throws APIException
     */
    public function deleteBatch(
        $inputs,
        ?RequestOptions $requestOptions = null
    ): mixed;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function deleteBatchRaw(
        array $params,
        ?RequestOptions $requestOptions = null
    ): mixed;

    /**
     * @api
     *
     * @param string $id ID of the object to remove from a multi-language group
     *
     * @throws APIException
     */
    public function detachFromLangGroup(
        $id,
        ?RequestOptions $requestOptions = null
    ): mixed;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function detachFromLangGroupRaw(
        array $params,
        ?RequestOptions $requestOptions = null
    ): mixed;

    /**
     * @api
     *
     * @param bool $archived Specifies whether to return deleted Blog Authors. Defaults to `false`.
     * @param string $property
     *
     * @throws APIException
     */
    public function get(
        string $objectID,
        $archived = omit,
        $property = omit,
        ?RequestOptions $requestOptions = null,
    ): BlogAuthor;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function getRaw(
        string $objectID,
        array $params,
        ?RequestOptions $requestOptions = null
    ): BlogAuthor;

    /**
     * @api
     *
     * @param list<string> $inputs strings to input
     * @param bool $archived Specifies whether to return deleted Blog Authors. Defaults to `false`.
     *
     * @throws APIException
     */
    public function getBatch(
        $inputs,
        $archived = omit,
        ?RequestOptions $requestOptions = null
    ): BatchResponseBlogAuthor;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function getBatchRaw(
        array $params,
        ?RequestOptions $requestOptions = null
    ): BatchResponseBlogAuthor;

    /**
     * @api
     *
     * @param string $id ID of object to set as primary in multi-language group
     *
     * @throws APIException
     */
    public function setNewLangPrimary(
        $id,
        ?RequestOptions $requestOptions = null
    ): mixed;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function setNewLangPrimaryRaw(
        array $params,
        ?RequestOptions $requestOptions = null
    ): mixed;

    /**
     * @api
     *
     * @param list<mixed> $inputs JSON nodes to input
     * @param bool $archived Specifies whether to update deleted Blog Authors. Defaults to `false`.
     *
     * @throws APIException
     */
    public function updateBatch(
        $inputs,
        $archived = omit,
        ?RequestOptions $requestOptions = null
    ): BatchResponseBlogAuthor;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function updateBatchRaw(
        array $params,
        ?RequestOptions $requestOptions = null
    ): BatchResponseBlogAuthor;

    /**
     * @api
     *
     * @param array<string,
     * string,> $languages Map of object IDs to associated languages of object in the multi-language group
     * @param string $primaryID ID of the primary object in the multi-language group
     *
     * @throws APIException
     */
    public function updateLanguages(
        $languages,
        $primaryID,
        ?RequestOptions $requestOptions = null
    ): mixed;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function updateLanguagesRaw(
        array $params,
        ?RequestOptions $requestOptions = null
    ): mixed;
}
