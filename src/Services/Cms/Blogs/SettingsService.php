<?php

declare(strict_types=1);

namespace HubspotSDK\Services\Cms\Blogs;

use HubspotSDK\Client;
use HubspotSDK\Cms\Blogs\Settings\Blog;
use HubspotSDK\Cms\Blogs\Settings\CollectionResponseWithTotalVersionBlog;
use HubspotSDK\Cms\Blogs\Settings\SettingAttachToLangGroupParams;
use HubspotSDK\Cms\Blogs\Settings\SettingCreateLanguageVariationParams;
use HubspotSDK\Cms\Blogs\Settings\SettingDetachFromLangGroupParams;
use HubspotSDK\Cms\Blogs\Settings\SettingGetRevisionParams;
use HubspotSDK\Cms\Blogs\Settings\SettingListParams;
use HubspotSDK\Cms\Blogs\Settings\SettingListRevisionsParams;
use HubspotSDK\Cms\Blogs\Settings\SettingSetNewLangPrimaryParams;
use HubspotSDK\Cms\Blogs\Settings\SettingUpdateLanguagesParams;
use HubspotSDK\Cms\Blogs\Settings\VersionBlog;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Page;
use HubspotSDK\RequestOptions;
use HubspotSDK\ServiceContracts\Cms\Blogs\SettingsContract;

use const HubspotSDK\Core\OMIT as omit;

final class SettingsService implements SettingsContract
{
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Get the list of Blogs. Supports paging and filtering. This method would be useful for an integration that examined these models and used an external service to suggest edits.
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
    ): Page {
        $params = [
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
        ];

        return $this->listRaw($params, $requestOptions);
    }

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
    ): Page {
        [$parsed, $options] = SettingListParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: 'cms/v3/blog-settings/settings',
            query: $parsed,
            options: $options,
            convert: Blog::class,
            page: Page::class,
        );
    }

    /**
     * @api
     *
     * Attach a blog to a multi-language group.
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
    ): mixed {
        $params = [
            'id' => $id,
            'language' => $language,
            'primaryID' => $primaryID,
            'primaryLanguage' => $primaryLanguage,
        ];

        return $this->attachToLangGroupRaw($params, $requestOptions);
    }

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
    ): mixed {
        [$parsed, $options] = SettingAttachToLangGroupParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'post',
            path: 'cms/v3/blog-settings/settings/multi-language/attach-to-lang-group',
            body: (object) $parsed,
            options: $options,
            convert: null,
        );
    }

    /**
     * @api
     *
     * Create a new language variation from an existing blog
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
    ): Blog {
        $params = [
            'id' => $id,
            'language' => $language,
            'primaryLanguage' => $primaryLanguage,
            'slug' => $slug,
        ];

        return $this->createLanguageVariationRaw($params, $requestOptions);
    }

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
    ): Blog {
        [$parsed, $options] = SettingCreateLanguageVariationParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'post',
            path: 'cms/v3/blog-settings/settings/multi-language/create-language-variation',
            body: (object) $parsed,
            options: $options,
            convert: Blog::class,
        );
    }

    /**
     * @api
     *
     * Detach a blog from a multi-language group.
     *
     * @param string $id ID of the object to remove from a multi-language group
     *
     * @throws APIException
     */
    public function detachFromLangGroup(
        $id,
        ?RequestOptions $requestOptions = null
    ): mixed {
        $params = ['id' => $id];

        return $this->detachFromLangGroupRaw($params, $requestOptions);
    }

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
    ): mixed {
        [$parsed, $options] = SettingDetachFromLangGroupParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'post',
            path: 'cms/v3/blog-settings/settings/multi-language/detach-from-lang-group',
            body: (object) $parsed,
            options: $options,
            convert: null,
        );
    }

    /**
     * @api
     *
     * Retrieve the Blog object identified by the id in the path.
     *
     * @throws APIException
     */
    public function get(
        string $blogID,
        ?RequestOptions $requestOptions = null
    ): Blog {
        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: ['cms/v3/blog-settings/settings/%1$s', $blogID],
            options: $requestOptions,
            convert: Blog::class,
        );
    }

    /**
     * @api
     *
     * Retrieves a previous version of a Blog
     *
     * @param string $blogID
     *
     * @throws APIException
     */
    public function getRevision(
        string $revisionID,
        $blogID,
        ?RequestOptions $requestOptions = null
    ): VersionBlog {
        $params = ['blogID' => $blogID];

        return $this->getRevisionRaw($revisionID, $params, $requestOptions);
    }

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
        ?RequestOptions $requestOptions = null
    ): VersionBlog {
        [$parsed, $options] = SettingGetRevisionParams::parseRequest(
            $params,
            $requestOptions
        );
        $blogID = $parsed['blogID'];
        unset($parsed['blogID']);

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: [
                'cms/v3/blog-settings/settings/%1$s/revisions/%2$s',
                $blogID,
                $revisionID,
            ],
            options: $options,
            convert: VersionBlog::class,
        );
    }

    /**
     * @api
     *
     * Retrieves all the previous versions of a Blog
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
    ): CollectionResponseWithTotalVersionBlog {
        $params = ['after' => $after, 'before' => $before, 'limit' => $limit];

        return $this->listRevisionsRaw($blogID, $params, $requestOptions);
    }

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
    ): CollectionResponseWithTotalVersionBlog {
        [$parsed, $options] = SettingListRevisionsParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: ['cms/v3/blog-settings/settings/%1$s/revisions', $blogID],
            query: $parsed,
            options: $options,
            convert: CollectionResponseWithTotalVersionBlog::class,
        );
    }

    /**
     * @api
     *
     * Set a blog as the primary language of a multi-language group.
     *
     * @param string $id ID of object to set as primary in multi-language group
     *
     * @throws APIException
     */
    public function setNewLangPrimary(
        $id,
        ?RequestOptions $requestOptions = null
    ): mixed {
        $params = ['id' => $id];

        return $this->setNewLangPrimaryRaw($params, $requestOptions);
    }

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
    ): mixed {
        [$parsed, $options] = SettingSetNewLangPrimaryParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'put',
            path: 'cms/v3/blog-settings/settings/multi-language/set-new-lang-primary',
            body: (object) $parsed,
            options: $options,
            convert: null,
        );
    }

    /**
     * @api
     *
     * Explicitly set new languages for each blog in a multi-language group.
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
    ): mixed {
        $params = ['languages' => $languages, 'primaryID' => $primaryID];

        return $this->updateLanguagesRaw($params, $requestOptions);
    }

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
    ): mixed {
        [$parsed, $options] = SettingUpdateLanguagesParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'post',
            path: 'cms/v3/blog-settings/settings/multi-language/update-languages',
            body: (object) $parsed,
            options: $options,
            convert: null,
        );
    }
}
