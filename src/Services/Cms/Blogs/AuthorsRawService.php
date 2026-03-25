<?php

declare(strict_types=1);

namespace HubspotSDK\Services\Cms\Blogs;

use HubspotSDK\Client;
use HubspotSDK\Cms\Blogs\Authors\AuthorAttachToLangGroupParams;
use HubspotSDK\Cms\Blogs\Authors\AuthorAttachToLangGroupParams\PrimaryLanguage;
use HubspotSDK\Cms\Blogs\Authors\AuthorCreateLanguageVariationParams;
use HubspotSDK\Cms\Blogs\Authors\AuthorCreateParams;
use HubspotSDK\Cms\Blogs\Authors\AuthorCreateParams\Language;
use HubspotSDK\Cms\Blogs\Authors\AuthorDeleteParams;
use HubspotSDK\Cms\Blogs\Authors\AuthorDetachFromLangGroupParams;
use HubspotSDK\Cms\Blogs\Authors\AuthorGetParams;
use HubspotSDK\Cms\Blogs\Authors\AuthorListParams;
use HubspotSDK\Cms\Blogs\Authors\AuthorSetNewLangPrimaryParams;
use HubspotSDK\Cms\Blogs\Authors\AuthorUpdateLanguagesParams;
use HubspotSDK\Cms\Blogs\Authors\AuthorUpdateParams;
use HubspotSDK\Cms\Blogs\Authors\BlogAuthor;
use HubspotSDK\Core\Contracts\BaseResponse;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\RequestOptions;
use HubspotSDK\ServiceContracts\Cms\Blogs\AuthorsRawContract;

/**
 * @phpstan-import-type BlogAuthorShape from \HubspotSDK\Cms\Blogs\Authors\BlogAuthor
 * @phpstan-import-type RequestOpts from \HubspotSDK\RequestOptions
 */
final class AuthorsRawService implements AuthorsRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * @param array{
     *   id: string,
     *   avatar: string,
     *   bio: string,
     *   created: \DateTimeInterface,
     *   deletedAt: \DateTimeInterface,
     *   displayName: string,
     *   email: string,
     *   facebook: string,
     *   fullName: string,
     *   language: value-of<Language>,
     *   linkedin: string,
     *   name: string,
     *   slug: string,
     *   translatedFromID: int,
     *   twitter: string,
     *   updated: \DateTimeInterface,
     *   website: string,
     * }|AuthorCreateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<string>
     *
     * @throws APIException
     */
    public function create(
        array|AuthorCreateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = AuthorCreateParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: 'cms/blogs/2026-03/authors',
            headers: ['Content-Type' => '*/*', 'Accept' => '*/*'],
            body: (object) $parsed,
            options: $options,
            convert: 'string',
        );
    }

    /**
     * @api
     *
     * @param string $objectID Path param
     * @param array{
     *   id: string,
     *   avatar: string,
     *   bio: string,
     *   created: \DateTimeInterface,
     *   deletedAt: \DateTimeInterface,
     *   displayName: string,
     *   email: string,
     *   facebook: string,
     *   fullName: string,
     *   language: value-of<AuthorUpdateParams\Language>,
     *   linkedin: string,
     *   name: string,
     *   slug: string,
     *   translatedFromID: int,
     *   twitter: string,
     *   updated: \DateTimeInterface,
     *   website: string,
     *   archived?: bool,
     * }|AuthorUpdateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<string>
     *
     * @throws APIException
     */
    public function update(
        string $objectID,
        array|AuthorUpdateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = AuthorUpdateParams::parseRequest(
            $params,
            $requestOptions,
        );
        $query_params = array_flip(['archived']);

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'patch',
            path: ['cms/blogs/2026-03/authors/%1$s', $objectID],
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
     * }|AuthorListParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<string>
     *
     * @throws APIException
     */
    public function list(
        array|AuthorListParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = AuthorListParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: 'cms/blogs/2026-03/authors',
            query: $parsed,
            headers: ['Accept' => '*/*'],
            options: $options,
            convert: 'string',
        );
    }

    /**
     * @api
     *
     * @param array{archived?: bool}|AuthorDeleteParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function delete(
        string $objectID,
        array|AuthorDeleteParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = AuthorDeleteParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'delete',
            path: ['cms/blogs/2026-03/authors/%1$s', $objectID],
            query: $parsed,
            options: $options,
            convert: null,
        );
    }

    /**
     * @api
     *
     * @param array{
     *   id: string,
     *   language: value-of<AuthorAttachToLangGroupParams\Language>,
     *   primaryID: string,
     *   primaryLanguage?: value-of<PrimaryLanguage>,
     * }|AuthorAttachToLangGroupParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<string>
     *
     * @throws APIException
     */
    public function attachToLangGroup(
        array|AuthorAttachToLangGroupParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = AuthorAttachToLangGroupParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: 'cms/blogs/2026-03/authors/multi-language/attach-to-lang-group',
            headers: ['Content-Type' => '*/*', 'Accept' => '*/*'],
            body: (object) $parsed,
            options: $options,
            convert: 'string',
        );
    }

    /**
     * @api
     *
     * @param array{
     *   id: string,
     *   blogAuthor: BlogAuthor|BlogAuthorShape,
     *   language?: string,
     *   primaryLanguage?: string,
     * }|AuthorCreateLanguageVariationParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<string>
     *
     * @throws APIException
     */
    public function createLanguageVariation(
        array|AuthorCreateLanguageVariationParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = AuthorCreateLanguageVariationParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: 'cms/blogs/2026-03/authors/multi-language/create-language-variation',
            headers: ['Content-Type' => '*/*', 'Accept' => '*/*'],
            body: (object) $parsed,
            options: $options,
            convert: 'string',
        );
    }

    /**
     * @api
     *
     * @param array{id: string}|AuthorDetachFromLangGroupParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<string>
     *
     * @throws APIException
     */
    public function detachFromLangGroup(
        array|AuthorDetachFromLangGroupParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = AuthorDetachFromLangGroupParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: 'cms/blogs/2026-03/authors/multi-language/detach-from-lang-group',
            headers: ['Content-Type' => '*/*', 'Accept' => '*/*'],
            body: (object) $parsed,
            options: $options,
            convert: 'string',
        );
    }

    /**
     * @api
     *
     * @param array{archived?: bool, property?: string}|AuthorGetParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<string>
     *
     * @throws APIException
     */
    public function get(
        string $objectID,
        array|AuthorGetParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = AuthorGetParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['cms/blogs/2026-03/authors/%1$s', $objectID],
            query: $parsed,
            headers: ['Accept' => '*/*'],
            options: $options,
            convert: 'string',
        );
    }

    /**
     * @api
     *
     * @param array{id: string}|AuthorSetNewLangPrimaryParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function setNewLangPrimary(
        array|AuthorSetNewLangPrimaryParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = AuthorSetNewLangPrimaryParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'put',
            path: 'cms/blogs/2026-03/authors/multi-language/set-new-lang-primary',
            headers: ['Content-Type' => '*/*'],
            body: (object) $parsed,
            options: $options,
            convert: null,
        );
    }

    /**
     * @api
     *
     * @param array{
     *   languages: array<string,AuthorUpdateLanguagesParams\Language|value-of<AuthorUpdateLanguagesParams\Language>>,
     *   primaryID: string,
     * }|AuthorUpdateLanguagesParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<string>
     *
     * @throws APIException
     */
    public function updateLanguages(
        array|AuthorUpdateLanguagesParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = AuthorUpdateLanguagesParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: 'cms/blogs/2026-03/authors/multi-language/update-languages',
            headers: ['Content-Type' => '*/*', 'Accept' => '*/*'],
            body: (object) $parsed,
            options: $options,
            convert: 'string',
        );
    }
}
