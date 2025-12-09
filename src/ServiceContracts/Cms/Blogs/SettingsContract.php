<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\Cms\Blogs;

use HubspotSDK\Cms\Blogs\Settings\Blog;
use HubspotSDK\Cms\Blogs\Settings\VersionBlog;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Page;
use HubspotSDK\RequestOptions;

interface SettingsContract
{
    /**
     * @api
     *
     * @param list<string> $sort
     *
     * @return Page<Blog>
     *
     * @throws APIException
     */
    public function list(
        ?string $after = null,
        ?bool $archived = null,
        string|\DateTimeInterface|null $createdAfter = null,
        string|\DateTimeInterface|null $createdAt = null,
        string|\DateTimeInterface|null $createdBefore = null,
        ?int $limit = null,
        ?array $sort = null,
        string|\DateTimeInterface|null $updatedAfter = null,
        string|\DateTimeInterface|null $updatedAt = null,
        string|\DateTimeInterface|null $updatedBefore = null,
        ?RequestOptions $requestOptions = null,
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
        string $id,
        string $language,
        string $primaryID,
        ?string $primaryLanguage = null,
        ?RequestOptions $requestOptions = null,
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
        string $id,
        ?string $language = null,
        ?string $primaryLanguage = null,
        ?string $slug = null,
        ?RequestOptions $requestOptions = null,
    ): Blog;

    /**
     * @api
     *
     * @param string $id ID of the object to remove from a multi-language group
     *
     * @throws APIException
     */
    public function detachFromLangGroup(
        string $id,
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
     * @throws APIException
     */
    public function getRevision(
        string $revisionID,
        string $blogID,
        ?RequestOptions $requestOptions = null
    ): VersionBlog;

    /**
     * @api
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
        ?RequestOptions $requestOptions = null,
    ): Page;

    /**
     * @api
     *
     * @param string $id ID of object to set as primary in multi-language group
     *
     * @throws APIException
     */
    public function setNewLangPrimary(
        string $id,
        ?RequestOptions $requestOptions = null
    ): mixed;

    /**
     * @api
     *
     * @param array<string,string> $languages map of object IDs to associated languages of object in the multi-language group
     * @param string $primaryID ID of the primary object in the multi-language group
     *
     * @throws APIException
     */
    public function updateLanguages(
        array $languages,
        string $primaryID,
        ?RequestOptions $requestOptions = null,
    ): mixed;
}
