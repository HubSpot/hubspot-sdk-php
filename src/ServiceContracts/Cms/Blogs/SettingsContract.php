<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\Cms\Blogs;

use HubspotSDK\Cms\Blogs\Settings\Blog;
use HubspotSDK\Cms\Blogs\Settings\CollectionResponseWithTotalVersionBlog;
use HubspotSDK\Cms\Blogs\Settings\VersionBlog;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Page;
use HubspotSDK\RequestOptions;

use const HubspotSDK\Core\OMIT as omit;

interface SettingsContract
{
    /**
     * @api
     *
     * @param string $after The cursor token value to get the next set of results. You can get this from the `paging.next.after` JSON property of a paged response containing more results.
     * @param bool $archived Specifies whether to return archived Blogs. Defaults to `false`.
     * @param \DateTimeInterface $createdAfter only return Blogs created after the specified time
     * @param \DateTimeInterface $createdAt only return Blogs created at exactly the specified time
     * @param \DateTimeInterface $createdBefore only return Blogs created before the specified time
     * @param int $limit The maximum number of results to return. Default is 100.
     * @param list<string> $sort Specifies which fields to use for sorting results. Valid fields are `name` and `id`
     * @param \DateTimeInterface $updatedAfter only return Blogs last updated after the specified time
     * @param \DateTimeInterface $updatedAt only return Blogs last updated at exactly the specified time
     * @param \DateTimeInterface $updatedBefore only return Blogs last updated before the specified time
     *
     * @return Page<Blog>
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
     * @return Page<Blog>
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
     * @param string $id ID of blog to clone
     * @param string $language target language of new variant
     * @param string $primaryLanguage language of primary blog to clone
     * @param string $slug path to this blog
     *
     * @throws APIException
     */
    public function createLanguageVariation(
        $id,
        $language = omit,
        $primaryLanguage = omit,
        $slug = omit,
        ?RequestOptions $requestOptions = null,
    ): Blog;

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
    ): Blog;

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
     * @throws APIException
     */
    public function get(
        string $blogID,
        ?RequestOptions $requestOptions = null
    ): Blog;

    /**
     * @api
     *
     * @param string $blogID
     *
     * @throws APIException
     */
    public function getRevision(
        string $revisionID,
        $blogID,
        ?RequestOptions $requestOptions = null
    ): VersionBlog;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function getRevisionRaw(
        string $revisionID,
        array $params,
        ?RequestOptions $requestOptions = null,
    ): VersionBlog;

    /**
     * @api
     *
     * @param string $after The cursor token value to get the next set of results. You can get this from the `paging.next.after` JSON property of a paged response containing more results.
     * @param string $before
     * @param int $limit The maximum number of results to return. Default is 100.
     *
     * @throws APIException
     */
    public function listRevisions(
        string $blogID,
        $after = omit,
        $before = omit,
        $limit = omit,
        ?RequestOptions $requestOptions = null,
    ): CollectionResponseWithTotalVersionBlog;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function listRevisionsRaw(
        string $blogID,
        array $params,
        ?RequestOptions $requestOptions = null
    ): CollectionResponseWithTotalVersionBlog;

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
