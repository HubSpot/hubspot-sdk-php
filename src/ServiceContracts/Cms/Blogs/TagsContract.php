<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\Cms\Blogs;

use HubspotSDK\Cms\Blogs\Tags\BlogsTagsBatchResponseTag;
use HubspotSDK\Cms\Blogs\Tags\BlogsTagsCollectionResponseWithTotalTagForwardPaging;
use HubspotSDK\Cms\Blogs\Tags\BlogsTagsTag;
use HubspotSDK\Cms\Blogs\Tags\TagCreateParams\Language;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Core\Implementation\HasRawResponse;
use HubspotSDK\RequestOptions;

use const HubspotSDK\Core\OMIT as omit;

interface TagsContract
{
    /**
     * @api
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
    ): BlogsTagsTag;

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
    ): BlogsTagsTag;

    /**
     * @api
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
    ): BlogsTagsTag;

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
    ): BlogsTagsTag;

    /**
     * @api
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
    ): BlogsTagsCollectionResponseWithTotalTagForwardPaging;

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
    ): BlogsTagsCollectionResponseWithTotalTagForwardPaging;

    /**
     * @api
     *
     * @param bool $archived
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
     * @param list<string> $inputs
     *
     * @throws APIException
     */
    public function archiveBatch(
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
    public function archiveBatchRaw(
        array $params,
        ?RequestOptions $requestOptions = null
    ): mixed;

    /**
     * @api
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
     * @param list<BlogsTagsTag> $inputs
     *
     * @return BlogsTagsBatchResponseTag<HasRawResponse>
     *
     * @throws APIException
     */
    public function createBatch(
        $inputs,
        ?RequestOptions $requestOptions = null
    ): BlogsTagsBatchResponseTag;

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
    ): BlogsTagsBatchResponseTag;

    /**
     * @api
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
    ): BlogsTagsTag;

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
    ): BlogsTagsTag;

    /**
     * @api
     *
     * @param string $id
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
    ): BlogsTagsTag;

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
    ): BlogsTagsTag;

    /**
     * @api
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
    ): BlogsTagsBatchResponseTag;

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
    ): BlogsTagsBatchResponseTag;

    /**
     * @api
     *
     * @param string $id
     *
     * @throws APIException
     */
    public function setLangPrimary(
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
    public function setLangPrimaryRaw(
        array $params,
        ?RequestOptions $requestOptions = null
    ): mixed;

    /**
     * @api
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
    ): BlogsTagsBatchResponseTag;

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
    ): BlogsTagsBatchResponseTag;

    /**
     * @api
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
    ): mixed;

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
    ): mixed;
}
