<?php

declare(strict_types=1);

namespace HubspotSDK\Services\Cms\Blogs;

use HubspotSDK\Client;
use HubspotSDK\Cms\Blogs\Tags\BlogsTagsBatchResponseTag;
use HubspotSDK\Cms\Blogs\Tags\BlogsTagsCollectionResponseWithTotalTagForwardPaging;
use HubspotSDK\Cms\Blogs\Tags\BlogsTagsTag;
use HubspotSDK\Cms\Blogs\Tags\TagArchiveBatchParams;
use HubspotSDK\Cms\Blogs\Tags\TagAttachToLangGroupParams;
use HubspotSDK\Cms\Blogs\Tags\TagCreateBatchParams;
use HubspotSDK\Cms\Blogs\Tags\TagCreateLangVariationParams;
use HubspotSDK\Cms\Blogs\Tags\TagCreateParams;
use HubspotSDK\Cms\Blogs\Tags\TagCreateParams\Language;
use HubspotSDK\Cms\Blogs\Tags\TagDeleteParams;
use HubspotSDK\Cms\Blogs\Tags\TagDetachFromLangGroupParams;
use HubspotSDK\Cms\Blogs\Tags\TagListParams;
use HubspotSDK\Cms\Blogs\Tags\TagReadBatchParams;
use HubspotSDK\Cms\Blogs\Tags\TagReadParams;
use HubspotSDK\Cms\Blogs\Tags\TagSetLangPrimaryParams;
use HubspotSDK\Cms\Blogs\Tags\TagUpdateBatchParams;
use HubspotSDK\Cms\Blogs\Tags\TagUpdateLangsParams;
use HubspotSDK\Cms\Blogs\Tags\TagUpdateParams;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Core\Implementation\HasRawResponse;
use HubspotSDK\RequestOptions;
use HubspotSDK\ServiceContracts\Cms\Blogs\TagsContract;

use const HubspotSDK\Core\OMIT as omit;

final class TagsService implements TagsContract
{
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Create a new Blog Tag
     *
     * @param string $id
     * @param \DateTimeInterface $created
     * @param \DateTimeInterface $deletedAt
     * @param Language|value-of<Language> $language
     * @param string $name
     * @param int $translatedFromID
     * @param \DateTimeInterface $updated
     *
     * @return BlogsTagsTag<HasRawResponse>
     *
     * @throws APIException
     */
    public function create(
        $id,
        $created,
        $deletedAt,
        $language,
        $name,
        $translatedFromID,
        $updated,
        ?RequestOptions $requestOptions = null,
    ): BlogsTagsTag {
        $params = [
            'id' => $id,
            'created' => $created,
            'deletedAt' => $deletedAt,
            'language' => $language,
            'name' => $name,
            'translatedFromID' => $translatedFromID,
            'updated' => $updated,
        ];

        return $this->createRaw($params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @return BlogsTagsTag<HasRawResponse>
     *
     * @throws APIException
     */
    public function createRaw(
        array $params,
        ?RequestOptions $requestOptions = null
    ): BlogsTagsTag {
        [$parsed, $options] = TagCreateParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'post',
            path: 'cms/v3/blogs/tags',
            body: (object) $parsed,
            options: $options,
            convert: BlogsTagsTag::class,
        );
    }

    /**
     * @api
     *
     * Update a Blog Tag
     *
     * @param string $id
     * @param \DateTimeInterface $created
     * @param \DateTimeInterface $deletedAt
     * @param HubspotSDK\Cms\Blogs\Tags\TagUpdateParams\Language|value-of<HubspotSDK\Cms\Blogs\Tags\TagUpdateParams\Language> $language
     * @param string $name
     * @param int $translatedFromID
     * @param \DateTimeInterface $updated
     * @param bool $archived
     *
     * @return BlogsTagsTag<HasRawResponse>
     *
     * @throws APIException
     */
    public function update(
        string $objectID,
        $id,
        $created,
        $deletedAt,
        $language,
        $name,
        $translatedFromID,
        $updated,
        $archived = omit,
        ?RequestOptions $requestOptions = null,
    ): BlogsTagsTag {
        $params = [
            'id' => $id,
            'created' => $created,
            'deletedAt' => $deletedAt,
            'language' => $language,
            'name' => $name,
            'translatedFromID' => $translatedFromID,
            'updated' => $updated,
            'archived' => $archived,
        ];

        return $this->updateRaw($objectID, $params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @return BlogsTagsTag<HasRawResponse>
     *
     * @throws APIException
     */
    public function updateRaw(
        string $objectID,
        array $params,
        ?RequestOptions $requestOptions = null
    ): BlogsTagsTag {
        [$parsed, $options] = TagUpdateParams::parseRequest(
            $params,
            $requestOptions
        );
        $query_params = array_flip(['archived']);

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'patch',
            path: ['cms/v3/blogs/tags/%1$s', $objectID],
            query: array_diff_key($parsed, $query_params),
            body: (object) array_diff_key($parsed, $query_params),
            options: $options,
            convert: BlogsTagsTag::class,
        );
    }

    /**
     * @api
     *
     * Get all Blog Tags
     *
     * @param string $after
     * @param bool $archived
     * @param \DateTimeInterface $createdAfter
     * @param \DateTimeInterface $createdAt
     * @param \DateTimeInterface $createdBefore
     * @param int $limit
     * @param string $property
     * @param list<string> $sort
     * @param \DateTimeInterface $updatedAfter
     * @param \DateTimeInterface $updatedAt
     * @param \DateTimeInterface $updatedBefore
     *
     * @return BlogsTagsCollectionResponseWithTotalTagForwardPaging<HasRawResponse>
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
    ): BlogsTagsCollectionResponseWithTotalTagForwardPaging {
        $params = [
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
        ];

        return $this->listRaw($params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @return BlogsTagsCollectionResponseWithTotalTagForwardPaging<HasRawResponse>
     *
     * @throws APIException
     */
    public function listRaw(
        array $params,
        ?RequestOptions $requestOptions = null
    ): BlogsTagsCollectionResponseWithTotalTagForwardPaging {
        [$parsed, $options] = TagListParams::parseRequest($params, $requestOptions);

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: 'cms/v3/blogs/tags',
            query: $parsed,
            options: $options,
            convert: BlogsTagsCollectionResponseWithTotalTagForwardPaging::class,
        );
    }

    /**
     * @api
     *
     * Delete a Blog Tag
     *
     * @param bool $archived
     *
     * @throws APIException
     */
    public function delete(
        string $objectID,
        $archived = omit,
        ?RequestOptions $requestOptions = null
    ): mixed {
        $params = ['archived' => $archived];

        return $this->deleteRaw($objectID, $params, $requestOptions);
    }

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
    ): mixed {
        [$parsed, $options] = TagDeleteParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'delete',
            path: ['cms/v3/blogs/tags/%1$s', $objectID],
            query: $parsed,
            options: $options,
            convert: null,
        );
    }

    /**
     * @api
     *
     * Delete a batch of Blog Tags
     *
     * @param list<string> $inputs
     *
     * @throws APIException
     */
    public function archiveBatch(
        $inputs,
        ?RequestOptions $requestOptions = null
    ): mixed {
        $params = ['inputs' => $inputs];

        return $this->archiveBatchRaw($params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function archiveBatchRaw(
        array $params,
        ?RequestOptions $requestOptions = null
    ): mixed {
        [$parsed, $options] = TagArchiveBatchParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'post',
            path: 'cms/v3/blogs/tags/batch/archive',
            body: (object) $parsed,
            options: $options,
            convert: null,
        );
    }

    /**
     * @api
     *
     * Attach a Blog Tag to a multi-language group
     *
     * @param string $id
     * @param string $language
     * @param string $primaryID
     * @param string $primaryLanguage
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
        [$parsed, $options] = TagAttachToLangGroupParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'post',
            path: 'cms/v3/blogs/tags/multi-language/attach-to-lang-group',
            body: (object) $parsed,
            options: $options,
            convert: null,
        );
    }

    /**
     * @api
     *
     * Create a batch of Blog Tags
     *
     * @param list<BlogsTagsTag> $inputs
     *
     * @return BlogsTagsBatchResponseTag<HasRawResponse>
     *
     * @throws APIException
     */
    public function createBatch(
        $inputs,
        ?RequestOptions $requestOptions = null
    ): BlogsTagsBatchResponseTag {
        $params = ['inputs' => $inputs];

        return $this->createBatchRaw($params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @return BlogsTagsBatchResponseTag<HasRawResponse>
     *
     * @throws APIException
     */
    public function createBatchRaw(
        array $params,
        ?RequestOptions $requestOptions = null
    ): BlogsTagsBatchResponseTag {
        [$parsed, $options] = TagCreateBatchParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'post',
            path: 'cms/v3/blogs/tags/batch/create',
            body: (object) $parsed,
            options: $options,
            convert: BlogsTagsBatchResponseTag::class,
        );
    }

    /**
     * @api
     *
     * Create a new language variation
     *
     * @param string $id
     * @param string $name
     * @param string $language
     * @param string $primaryLanguage
     *
     * @return BlogsTagsTag<HasRawResponse>
     *
     * @throws APIException
     */
    public function createLangVariation(
        $id,
        $name,
        $language = omit,
        $primaryLanguage = omit,
        ?RequestOptions $requestOptions = null,
    ): BlogsTagsTag {
        $params = [
            'id' => $id,
            'name' => $name,
            'language' => $language,
            'primaryLanguage' => $primaryLanguage,
        ];

        return $this->createLangVariationRaw($params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @return BlogsTagsTag<HasRawResponse>
     *
     * @throws APIException
     */
    public function createLangVariationRaw(
        array $params,
        ?RequestOptions $requestOptions = null
    ): BlogsTagsTag {
        [$parsed, $options] = TagCreateLangVariationParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'post',
            path: 'cms/v3/blogs/tags/multi-language/create-language-variation',
            body: (object) $parsed,
            options: $options,
            convert: BlogsTagsTag::class,
        );
    }

    /**
     * @api
     *
     * Detach a Blog Tag from a multi-language group
     *
     * @param string $id
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
        [$parsed, $options] = TagDetachFromLangGroupParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'post',
            path: 'cms/v3/blogs/tags/multi-language/detach-from-lang-group',
            body: (object) $parsed,
            options: $options,
            convert: null,
        );
    }

    /**
     * @api
     *
     * Retrieve a Blog Tag
     *
     * @param bool $archived
     * @param string $property
     *
     * @return BlogsTagsTag<HasRawResponse>
     *
     * @throws APIException
     */
    public function read(
        string $objectID,
        $archived = omit,
        $property = omit,
        ?RequestOptions $requestOptions = null,
    ): BlogsTagsTag {
        $params = ['archived' => $archived, 'property' => $property];

        return $this->readRaw($objectID, $params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @return BlogsTagsTag<HasRawResponse>
     *
     * @throws APIException
     */
    public function readRaw(
        string $objectID,
        array $params,
        ?RequestOptions $requestOptions = null
    ): BlogsTagsTag {
        [$parsed, $options] = TagReadParams::parseRequest($params, $requestOptions);

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: ['cms/v3/blogs/tags/%1$s', $objectID],
            query: $parsed,
            options: $options,
            convert: BlogsTagsTag::class,
        );
    }

    /**
     * @api
     *
     * Retrieve a batch of Blog Tags
     *
     * @param list<string> $inputs
     * @param bool $archived
     *
     * @return BlogsTagsBatchResponseTag<HasRawResponse>
     *
     * @throws APIException
     */
    public function readBatch(
        $inputs,
        $archived = omit,
        ?RequestOptions $requestOptions = null
    ): BlogsTagsBatchResponseTag {
        $params = ['inputs' => $inputs, 'archived' => $archived];

        return $this->readBatchRaw($params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @return BlogsTagsBatchResponseTag<HasRawResponse>
     *
     * @throws APIException
     */
    public function readBatchRaw(
        array $params,
        ?RequestOptions $requestOptions = null
    ): BlogsTagsBatchResponseTag {
        [$parsed, $options] = TagReadBatchParams::parseRequest(
            $params,
            $requestOptions
        );
        $query_params = array_flip(['archived']);

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'post',
            path: 'cms/v3/blogs/tags/batch/read',
            query: array_diff_key($parsed, $query_params),
            body: (object) array_diff_key($parsed, $query_params),
            options: $options,
            convert: BlogsTagsBatchResponseTag::class,
        );
    }

    /**
     * @api
     *
     * Set a new primary language
     *
     * @param string $id
     *
     * @throws APIException
     */
    public function setLangPrimary(
        $id,
        ?RequestOptions $requestOptions = null
    ): mixed {
        $params = ['id' => $id];

        return $this->setLangPrimaryRaw($params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function setLangPrimaryRaw(
        array $params,
        ?RequestOptions $requestOptions = null
    ): mixed {
        [$parsed, $options] = TagSetLangPrimaryParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'put',
            path: 'cms/v3/blogs/tags/multi-language/set-new-lang-primary',
            body: (object) $parsed,
            options: $options,
            convert: null,
        );
    }

    /**
     * @api
     *
     * Update a batch of Blog Tags
     *
     * @param list<mixed> $inputs
     * @param bool $archived
     *
     * @return BlogsTagsBatchResponseTag<HasRawResponse>
     *
     * @throws APIException
     */
    public function updateBatch(
        $inputs,
        $archived = omit,
        ?RequestOptions $requestOptions = null
    ): BlogsTagsBatchResponseTag {
        $params = ['inputs' => $inputs, 'archived' => $archived];

        return $this->updateBatchRaw($params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @return BlogsTagsBatchResponseTag<HasRawResponse>
     *
     * @throws APIException
     */
    public function updateBatchRaw(
        array $params,
        ?RequestOptions $requestOptions = null
    ): BlogsTagsBatchResponseTag {
        [$parsed, $options] = TagUpdateBatchParams::parseRequest(
            $params,
            $requestOptions
        );
        $query_params = array_flip(['archived']);

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'post',
            path: 'cms/v3/blogs/tags/batch/update',
            query: array_diff_key($parsed, $query_params),
            body: (object) array_diff_key($parsed, $query_params),
            options: $options,
            convert: BlogsTagsBatchResponseTag::class,
        );
    }

    /**
     * @api
     *
     * Update languages of multi-language group
     *
     * @param array<string, string> $languages
     * @param string $primaryID
     *
     * @throws APIException
     */
    public function updateLangs(
        $languages,
        $primaryID,
        ?RequestOptions $requestOptions = null
    ): mixed {
        $params = ['languages' => $languages, 'primaryID' => $primaryID];

        return $this->updateLangsRaw($params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function updateLangsRaw(
        array $params,
        ?RequestOptions $requestOptions = null
    ): mixed {
        [$parsed, $options] = TagUpdateLangsParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'post',
            path: 'cms/v3/blogs/tags/multi-language/update-languages',
            body: (object) $parsed,
            options: $options,
            convert: null,
        );
    }
}
