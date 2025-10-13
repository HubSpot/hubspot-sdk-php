<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\Cms\Blogs;

use HubspotSDK\Cms\Blogs\Tags\BatchResponseTag;
use HubspotSDK\Cms\Blogs\Tags\Tag;
use HubspotSDK\Cms\Blogs\Tags\TagCreateParams\Language;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Page;
use HubspotSDK\RequestOptions;

use const HubspotSDK\Core\OMIT as omit;

interface TagsContract
{
    /**
     * @api
     *
     * @param string $id the unique ID of the Blog Tag
     * @param \DateTimeInterface $created
     * @param \DateTimeInterface $deletedAt the timestamp (ISO8601 format) when this Blog Tag was deleted
     * @param Language|value-of<Language> $language the explicitly defined ISO 639 language code of the tag
     * @param string $name the name of the tag
     * @param int $translatedFromID ID of the primary tag this object was translated from
     * @param \DateTimeInterface $updated
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
    ): Tag;

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
    ): Tag;

    /**
     * @api
     *
     * @param string $id the unique ID of the Blog Tag
     * @param \DateTimeInterface $created
     * @param \DateTimeInterface $deletedAt the timestamp (ISO8601 format) when this Blog Tag was deleted
     * @param \HubspotSDK\Cms\Blogs\Tags\TagUpdateParams\Language|value-of<\HubspotSDK\Cms\Blogs\Tags\TagUpdateParams\Language> $language the explicitly defined ISO 639 language code of the tag
     * @param string $name the name of the tag
     * @param int $translatedFromID ID of the primary tag this object was translated from
     * @param \DateTimeInterface $updated
     * @param bool $archived Specifies whether to update deleted Blog Tags. Defaults to `false`.
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
    ): Tag;

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
    ): Tag;

    /**
     * @api
     *
     * @param string $after The cursor token value to get the next set of results. You can get this from the `paging.next.after` JSON property of a paged response containing more results.
     * @param bool $archived Specifies whether to return deleted Blog Tags. Defaults to `false`.
     * @param \DateTimeInterface $createdAfter only return Blog Tags created after the specified time
     * @param \DateTimeInterface $createdAt only return Blog Tags created at exactly the specified time
     * @param \DateTimeInterface $createdBefore only return Blog Tags created before the specified time
     * @param int $limit The maximum number of results to return. Default is 100.
     * @param string $property
     * @param list<string> $sort Specifies which fields to use for sorting results. Valid fields are `name`, `createdAt`, `updatedAt`, `createdBy`, `updatedBy`. `createdAt` will be used by default.
     * @param \DateTimeInterface $updatedAfter only return Blog Tags last updated after the specified time
     * @param \DateTimeInterface $updatedAt only return Blog Tags last updated at exactly the specified time
     * @param \DateTimeInterface $updatedBefore only return Blog Tags last updated before the specified time
     *
     * @return Page<Tag>
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
     * @return Page<Tag>
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
     * @param list<string> $inputs strings to input
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
     * @param string $id ID of the object to add to a multi-language group
     * @param \HubspotSDK\Cms\Blogs\Tags\TagAttachToLangGroupParams\Language|value-of<\HubspotSDK\Cms\Blogs\Tags\TagAttachToLangGroupParams\Language> $language designated language of the object to add to a multi-language group
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
     * @param list<Tag> $inputs blog tags to input
     *
     * @throws APIException
     */
    public function createBatch(
        $inputs,
        ?RequestOptions $requestOptions = null
    ): BatchResponseTag;

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
    ): BatchResponseTag;

    /**
     * @api
     *
     * @param string $id ID of the object to be cloned
     * @param string $name name of newly cloned blog tag
     * @param string $language target language of new variant
     * @param string $primaryLanguage language of primary blog tag to clone
     *
     * @throws APIException
     */
    public function createLangVariation(
        $id,
        $name,
        $language = omit,
        $primaryLanguage = omit,
        ?RequestOptions $requestOptions = null,
    ): Tag;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function createLangVariationRaw(
        array $params,
        ?RequestOptions $requestOptions = null
    ): Tag;

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
     * @param bool $archived Specifies whether to return deleted Blog Tags. Defaults to `false`.
     * @param string $property
     *
     * @throws APIException
     */
    public function read(
        string $objectID,
        $archived = omit,
        $property = omit,
        ?RequestOptions $requestOptions = null,
    ): Tag;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function readRaw(
        string $objectID,
        array $params,
        ?RequestOptions $requestOptions = null
    ): Tag;

    /**
     * @api
     *
     * @param list<string> $inputs strings to input
     * @param bool $archived Specifies whether to return deleted Blog Tags. Defaults to `false`.
     *
     * @throws APIException
     */
    public function readBatch(
        $inputs,
        $archived = omit,
        ?RequestOptions $requestOptions = null
    ): BatchResponseTag;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function readBatchRaw(
        array $params,
        ?RequestOptions $requestOptions = null
    ): BatchResponseTag;

    /**
     * @api
     *
     * @param string $id ID of object to set as primary in multi-language group
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
     * @param list<mixed> $inputs JSON nodes to input
     * @param bool $archived Specifies whether to update deleted Blog Tags. Defaults to `false`.
     *
     * @throws APIException
     */
    public function updateBatch(
        $inputs,
        $archived = omit,
        ?RequestOptions $requestOptions = null
    ): BatchResponseTag;

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
    ): BatchResponseTag;

    /**
     * @api
     *
     * @param array<string,
     * string,> $languages Map of object IDs to associated languages of object in the multi-language group
     * @param string $primaryID ID of the primary object in the multi-language group
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
