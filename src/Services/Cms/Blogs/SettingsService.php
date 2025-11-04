<?php

declare(strict_types=1);

namespace HubspotSDK\Services\Cms\Blogs;

use HubspotSDK\Client;
use HubspotSDK\Cms\Blogs\Settings\Blog;
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
     * @param string $after
     * @param bool $archived
     * @param \DateTimeInterface $createdAfter
     * @param \DateTimeInterface $createdAt
     * @param \DateTimeInterface $createdBefore
     * @param int $limit
     * @param list<string> $sort
     * @param \DateTimeInterface $updatedAfter
     * @param \DateTimeInterface $updatedAt
     * @param \DateTimeInterface $updatedBefore
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
     * @param string $after
     * @param string $before
     * @param int $limit
     *
     * @return Page<VersionBlog>
     *
     * @throws APIException
     */
    public function listRevisions(
        string $blogID,
        $after = omit,
        $before = omit,
        $limit = omit,
        ?RequestOptions $requestOptions = null,
    ): Page {
        $params = ['after' => $after, 'before' => $before, 'limit' => $limit];

        return $this->listRevisionsRaw($blogID, $params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @return Page<VersionBlog>
     *
     * @throws APIException
     */
    public function listRevisionsRaw(
        string $blogID,
        array $params,
        ?RequestOptions $requestOptions = null
    ): Page {
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
            convert: VersionBlog::class,
            page: Page::class,
        );
    }

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
