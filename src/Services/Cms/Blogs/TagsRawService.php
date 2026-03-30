<?php

declare(strict_types=1);

namespace HubspotSDK\Services\Cms\Blogs;

use HubspotSDK\Client;
use HubspotSDK\Cms\Blogs\Tags\TagAttachToLangGroupParams;
use HubspotSDK\Cms\Blogs\Tags\TagAttachToLangGroupParams\PrimaryLanguage;
use HubspotSDK\Cms\Blogs\Tags\TagCreateLangVariationParams;
use HubspotSDK\Cms\Blogs\Tags\TagCreateParams;
use HubspotSDK\Cms\Blogs\Tags\TagCreateParams\Language;
use HubspotSDK\Cms\Blogs\Tags\TagDeleteParams;
use HubspotSDK\Cms\Blogs\Tags\TagDetachFromLangGroupParams;
use HubspotSDK\Cms\Blogs\Tags\TagGetParams;
use HubspotSDK\Cms\Blogs\Tags\TagListAuthorsCursorByQueryParams;
use HubspotSDK\Cms\Blogs\Tags\TagListAuthorsCursorParams;
use HubspotSDK\Cms\Blogs\Tags\TagListCursorByQueryParams;
use HubspotSDK\Cms\Blogs\Tags\TagListCursorParams;
use HubspotSDK\Cms\Blogs\Tags\TagListParams;
use HubspotSDK\Cms\Blogs\Tags\TagListPostsCursorByQueryParams;
use HubspotSDK\Cms\Blogs\Tags\TagListPostsCursorParams;
use HubspotSDK\Cms\Blogs\Tags\TagSetLangPrimaryParams;
use HubspotSDK\Cms\Blogs\Tags\TagUpdateLangsParams;
use HubspotSDK\Cms\Blogs\Tags\TagUpdateParams;
use HubspotSDK\Core\Contracts\BaseResponse;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\RequestOptions;
use HubspotSDK\ServiceContracts\Cms\Blogs\TagsRawContract;

/**
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
     *   slug: string,
     *   translatedFromID: int,
     *   updated: \DateTimeInterface,
     * }|TagCreateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<string>
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
            path: 'cms/blogs/2026-03/tags',
            headers: ['Content-Type' => '*/*', 'Accept' => '*/*'],
            body: (object) $parsed,
            options: $options,
            convert: 'string',
        );
    }

    /**
     * @api
     *
     * Sparse updates a single Blog Tag object identified by the id in the path.
     * All the column values need not be specified. Only the that need to be modified can be specified.
     *
     * @param string $objectID Path param
     * @param array{
     *   id: string,
     *   created: \DateTimeInterface,
     *   deletedAt: \DateTimeInterface,
     *   language: value-of<TagUpdateParams\Language>,
     *   name: string,
     *   slug: string,
     *   translatedFromID: int,
     *   updated: \DateTimeInterface,
     *   archived?: bool,
     * }|TagUpdateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<string>
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
            path: ['cms/blogs/2026-03/tags/%1$s', $objectID],
            query: array_intersect_key($parsed, $query_params),
            headers: ['Content-Type' => '*/*', 'Accept' => '*/*'],
            body: (object) array_diff_key($parsed, $query_params),
            options: $options,
            convert: 'string',
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
     * @return BaseResponse<string>
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
            path: 'cms/blogs/2026-03/tags',
            query: $parsed,
            headers: ['Accept' => '*/*'],
            options: $options,
            convert: 'string',
        );
    }

    /**
     * @api
     *
     * Delete the Blog Tag object identified by the id in the path.
     *
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
            path: ['cms/blogs/2026-03/tags/%1$s', $objectID],
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
     *   id: string,
     *   language: value-of<TagAttachToLangGroupParams\Language>,
     *   primaryID: string,
     *   primaryLanguage?: value-of<PrimaryLanguage>,
     * }|TagAttachToLangGroupParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<string>
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
            path: 'cms/blogs/2026-03/tags/multi-language/attach-to-lang-group',
            headers: ['Content-Type' => '*/*', 'Accept' => '*/*'],
            body: (object) $parsed,
            options: $options,
            convert: 'string',
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
     * @return BaseResponse<string>
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
            path: 'cms/blogs/2026-03/tags/multi-language/create-language-variation',
            headers: ['Content-Type' => '*/*', 'Accept' => '*/*'],
            body: (object) $parsed,
            options: $options,
            convert: 'string',
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
     * @return BaseResponse<string>
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
            path: 'cms/blogs/2026-03/tags/multi-language/detach-from-lang-group',
            headers: ['Content-Type' => '*/*', 'Accept' => '*/*'],
            body: (object) $parsed,
            options: $options,
            convert: 'string',
        );
    }

    /**
     * @api
     *
     * Retrieve the Blog Tag object identified by the id in the path.
     *
     * @param array{archived?: bool, property?: string}|TagGetParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<string>
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
            path: ['cms/blogs/2026-03/tags/%1$s', $objectID],
            query: $parsed,
            headers: ['Accept' => '*/*'],
            options: $options,
            convert: 'string',
        );
    }

    /**
     * @api
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
     * }|TagListAuthorsCursorParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<string>
     *
     * @throws APIException
     */
    public function listAuthorsCursor(
        array|TagListAuthorsCursorParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = TagListAuthorsCursorParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: 'cms/blogs/2026-03/authors/cursor',
            query: $parsed,
            headers: ['Accept' => '*/*'],
            options: $options,
            convert: 'string',
        );
    }

    /**
     * @api
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
     * }|TagListAuthorsCursorByQueryParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<string>
     *
     * @throws APIException
     */
    public function listAuthorsCursorByQuery(
        array|TagListAuthorsCursorByQueryParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = TagListAuthorsCursorByQueryParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: 'cms/blogs/2026-03/authors/cursor/query',
            query: $parsed,
            headers: ['Accept' => '*/*'],
            options: $options,
            convert: 'string',
        );
    }

    /**
     * @api
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
     * }|TagListCursorParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<string>
     *
     * @throws APIException
     */
    public function listCursor(
        array|TagListCursorParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = TagListCursorParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: 'cms/blogs/2026-03/tags/cursor',
            query: $parsed,
            headers: ['Accept' => '*/*'],
            options: $options,
            convert: 'string',
        );
    }

    /**
     * @api
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
     * }|TagListCursorByQueryParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<string>
     *
     * @throws APIException
     */
    public function listCursorByQuery(
        array|TagListCursorByQueryParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = TagListCursorByQueryParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: 'cms/blogs/2026-03/tags/cursor/query',
            query: $parsed,
            headers: ['Accept' => '*/*'],
            options: $options,
            convert: 'string',
        );
    }

    /**
     * @api
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
     * }|TagListPostsCursorParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<string>
     *
     * @throws APIException
     */
    public function listPostsCursor(
        array|TagListPostsCursorParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = TagListPostsCursorParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: 'cms/blogs/2026-03/posts/cursor',
            query: $parsed,
            headers: ['Accept' => '*/*'],
            options: $options,
            convert: 'string',
        );
    }

    /**
     * @api
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
     * }|TagListPostsCursorByQueryParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<string>
     *
     * @throws APIException
     */
    public function listPostsCursorByQuery(
        array|TagListPostsCursorByQueryParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = TagListPostsCursorByQueryParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: 'cms/blogs/2026-03/posts/cursor/query',
            query: $parsed,
            headers: ['Accept' => '*/*'],
            options: $options,
            convert: 'string',
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
            path: 'cms/blogs/2026-03/tags/multi-language/set-new-lang-primary',
            headers: ['Content-Type' => '*/*'],
            body: (object) $parsed,
            options: $options,
            convert: null,
        );
    }

    /**
     * @api
     *
     * Explicitly set new languages for each Blog Tag in a multi-language group.
     *
     * @param array{
     *   languages: array<string,TagUpdateLangsParams\Language|value-of<TagUpdateLangsParams\Language>>,
     *   primaryID: string,
     * }|TagUpdateLangsParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<string>
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
            path: 'cms/blogs/2026-03/tags/multi-language/update-languages',
            headers: ['Content-Type' => '*/*', 'Accept' => '*/*'],
            body: (object) $parsed,
            options: $options,
            convert: 'string',
        );
    }
}
