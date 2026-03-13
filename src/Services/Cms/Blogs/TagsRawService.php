<?php

declare(strict_types=1);

namespace HubspotSDK\Services\Cms\Blogs;

use HubspotSDK\Client;
use HubspotSDK\Cms\Blogs\Tags\BatchResponseTag;
use HubspotSDK\Cms\Blogs\Tags\Tag;
use HubspotSDK\Cms\Blogs\Tags\TagAttachToLangGroupParams;
use HubspotSDK\Cms\Blogs\Tags\TagCreateBatchParams;
use HubspotSDK\Cms\Blogs\Tags\TagCreateLangVariationParams;
use HubspotSDK\Cms\Blogs\Tags\TagCreateParams;
use HubspotSDK\Cms\Blogs\Tags\TagCreateParams\Language;
use HubspotSDK\Cms\Blogs\Tags\TagDeleteBatchParams;
use HubspotSDK\Cms\Blogs\Tags\TagDeleteParams;
use HubspotSDK\Cms\Blogs\Tags\TagDetachFromLangGroupParams;
use HubspotSDK\Cms\Blogs\Tags\TagGetBatchParams;
use HubspotSDK\Cms\Blogs\Tags\TagGetParams;
use HubspotSDK\Cms\Blogs\Tags\TagListParams;
use HubspotSDK\Cms\Blogs\Tags\TagSetLangPrimaryParams;
use HubspotSDK\Cms\Blogs\Tags\TagUpdateBatchParams;
use HubspotSDK\Cms\Blogs\Tags\TagUpdateLangsParams;
use HubspotSDK\Cms\Blogs\Tags\TagUpdateParams;
use HubspotSDK\Core\Contracts\BaseResponse;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Page;
use HubspotSDK\RequestOptions;
use HubspotSDK\ServiceContracts\Cms\Blogs\TagsRawContract;

/**
 * @phpstan-import-type TagShape from \HubspotSDK\Cms\Blogs\Tags\Tag
 * @phpstan-import-type RequestOpts from \HubspotSDK\RequestOptions
 */
final class TagsRawService implements TagsRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Create a new Blog Tag.
     *
     * @param array{
     *   id: string,
     *   created: \DateTimeInterface,
     *   deletedAt: \DateTimeInterface,
     *   language: value-of<Language>,
     *   name: string,
     *   translatedFromID: int,
     *   updated: \DateTimeInterface,
     * }|TagCreateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<Tag>
     *
     * @throws APIException
     */
    public function create(
        array|TagCreateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = TagCreateParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: 'cms/v3/blogs/tags',
            body: (object) $parsed,
            options: $options,
            convert: Tag::class,
        );
    }

    /**
     * @api
     *
     * Sparse updates a single Blog Tag object identified by the id in the path.
     * All the column values need not be specified. Only the that need to be modified can be specified.
     *
     * @param string $objectID path param: The Blog Tag id
     * @param array{
     *   id: string,
     *   created: \DateTimeInterface,
     *   deletedAt: \DateTimeInterface,
     *   language: value-of<TagUpdateParams\Language>,
     *   name: string,
     *   translatedFromID: int,
     *   updated: \DateTimeInterface,
     *   archived?: bool,
     * }|TagUpdateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<Tag>
     *
     * @throws APIException
     */
    public function update(
        string $objectID,
        array|TagUpdateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = TagUpdateParams::parseRequest(
            $params,
            $requestOptions,
        );
        $query_params = array_flip(['archived']);

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'patch',
            path: ['cms/v3/blogs/tags/%1$s', $objectID],
            query: array_intersect_key($parsed, $query_params),
            body: (object) array_diff_key($parsed, $query_params),
            options: $options,
            convert: Tag::class,
        );
    }

    /**
     * @api
     *
     * Get the list of blog tags. Supports paging and filtering. This method would be useful for an integration that examined these models and used an external service to suggest edits.
     *
     * @param array{
     *   after?: string,
     *   archived?: bool,
     *   createdAfter?: \DateTimeInterface,
     *   createdAt?: \DateTimeInterface,
     *   createdBefore?: \DateTimeInterface,
     *   limit?: int,
     *   property?: string,
     *   sort?: list<string>,
     *   updatedAfter?: \DateTimeInterface,
     *   updatedAt?: \DateTimeInterface,
     *   updatedBefore?: \DateTimeInterface,
     * }|TagListParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<Page<Tag>>
     *
     * @throws APIException
     */
    public function list(
        array|TagListParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = TagListParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: 'cms/v3/blogs/tags',
            query: $parsed,
            options: $options,
            convert: Tag::class,
            page: Page::class,
        );
    }

    /**
     * @api
     *
     * Delete the Blog Tag object identified by the id in the path.
     *
     * @param string $objectID the Blog Tag id
     * @param array{archived?: bool}|TagDeleteParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function delete(
        string $objectID,
        array|TagDeleteParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = TagDeleteParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
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
     * Attach a Blog Tag to a multi-language group.
     *
     * @param array{
     *   id: string, language: string, primaryID: string, primaryLanguage?: string
     * }|TagAttachToLangGroupParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function attachToLangGroup(
        array|TagAttachToLangGroupParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = TagAttachToLangGroupParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
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
     * Create the Blog Tag objects detailed in the request body.
     *
     * @param array{inputs: list<Tag|TagShape>}|TagCreateBatchParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<BatchResponseTag>
     *
     * @throws APIException
     */
    public function createBatch(
        array|TagCreateBatchParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = TagCreateBatchParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: 'cms/v3/blogs/tags/batch/create',
            body: (object) $parsed,
            options: $options,
            convert: BatchResponseTag::class,
        );
    }

    /**
     * @api
     *
     * Create a new language variation from an existing Blog Tag
     *
     * @param array{
     *   id: string, name: string, language?: string, primaryLanguage?: string
     * }|TagCreateLangVariationParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<Tag>
     *
     * @throws APIException
     */
    public function createLangVariation(
        array|TagCreateLangVariationParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = TagCreateLangVariationParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: 'cms/v3/blogs/tags/multi-language/create-language-variation',
            body: (object) $parsed,
            options: $options,
            convert: Tag::class,
        );
    }

    /**
     * @api
     *
     * Delete the Blog Tag objects identified in the request body.
     *
     * @param array{inputs: list<string>}|TagDeleteBatchParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function deleteBatch(
        array|TagDeleteBatchParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = TagDeleteBatchParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
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
     * Detach a Blog Tag from a multi-language group.
     *
     * @param array{id: string}|TagDetachFromLangGroupParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function detachFromLangGroup(
        array|TagDetachFromLangGroupParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = TagDetachFromLangGroupParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
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
     * Retrieve the Blog Tag object identified by the id in the path.
     *
     * @param string $objectID the Blog Tag id
     * @param array{archived?: bool, property?: string}|TagGetParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<Tag>
     *
     * @throws APIException
     */
    public function get(
        string $objectID,
        array|TagGetParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = TagGetParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['cms/v3/blogs/tags/%1$s', $objectID],
            query: $parsed,
            options: $options,
            convert: Tag::class,
        );
    }

    /**
     * @api
     *
     * Retrieve the Blog Tag objects identified in the request body.
     *
     * @param array{inputs: list<string>, archived?: bool}|TagGetBatchParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<BatchResponseTag>
     *
     * @throws APIException
     */
    public function getBatch(
        array|TagGetBatchParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = TagGetBatchParams::parseRequest(
            $params,
            $requestOptions,
        );
        $query_params = array_flip(['archived']);

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: 'cms/v3/blogs/tags/batch/read',
            query: array_intersect_key($parsed, $query_params),
            body: (object) array_diff_key($parsed, $query_params),
            options: $options,
            convert: BatchResponseTag::class,
        );
    }

    /**
     * @api
     *
     * Set a Blog Tag as the primary language of a multi-language group.
     *
     * @param array{id: string}|TagSetLangPrimaryParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function setLangPrimary(
        array|TagSetLangPrimaryParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = TagSetLangPrimaryParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
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
     * Update the Blog Tag objects identified in the request body.
     *
     * @param array{inputs: list<mixed>, archived?: bool}|TagUpdateBatchParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<BatchResponseTag>
     *
     * @throws APIException
     */
    public function updateBatch(
        array|TagUpdateBatchParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = TagUpdateBatchParams::parseRequest(
            $params,
            $requestOptions,
        );
        $query_params = array_flip(['archived']);

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: 'cms/v3/blogs/tags/batch/update',
            query: array_intersect_key($parsed, $query_params),
            body: (object) array_diff_key($parsed, $query_params),
            options: $options,
            convert: BatchResponseTag::class,
        );
    }

    /**
     * @api
     *
     * Explicitly set new languages for each Blog Tag in a multi-language group.
     *
     * @param array{
     *   languages: array<string,string>, primaryID: string
     * }|TagUpdateLangsParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function updateLangs(
        array|TagUpdateLangsParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = TagUpdateLangsParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: 'cms/v3/blogs/tags/multi-language/update-languages',
            body: (object) $parsed,
            options: $options,
            convert: null,
        );
    }
}
