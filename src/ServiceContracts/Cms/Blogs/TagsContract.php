<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\Cms\Blogs;

use HubspotSDK\Cms\Blogs\Tags\BatchResponseTag;
use HubspotSDK\Cms\Blogs\Tags\Tag;
use HubspotSDK\Cms\Blogs\Tags\TagCreateParams\Language;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Page;
use HubspotSDK\RequestOptions;

/**
 * @phpstan-import-type TagShape from \HubspotSDK\Cms\Blogs\Tags\Tag
 * @phpstan-import-type RequestOpts from \HubspotSDK\RequestOptions
 */
interface TagsContract
{
    /**
     * @api
     *
     * @param string $id the unique ID of the Blog Tag
     * @param \DateTimeInterface $deletedAt the timestamp (ISO8601 format) when this Blog Tag was deleted
     * @param Language|value-of<Language> $language the explicitly defined ISO 639 language code of the tag
     * @param string $name the name of the tag
     * @param int $translatedFromID ID of the primary tag this object was translated from
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function create(
        string $id,
        \DateTimeInterface $created,
        \DateTimeInterface $deletedAt,
        Language|string $language,
        string $name,
        int $translatedFromID,
        \DateTimeInterface $updated,
        RequestOptions|array|null $requestOptions = null,
    ): Tag;

    /**
     * @api
     *
     * @param string $objectID path param: The Blog Tag id
     * @param string $id body param: The unique ID of the Blog Tag
     * @param \DateTimeInterface $created Body param
     * @param \DateTimeInterface $deletedAt body param: The timestamp (ISO8601 format) when this Blog Tag was deleted
     * @param \HubspotSDK\Cms\Blogs\Tags\TagUpdateParams\Language|value-of<\HubspotSDK\Cms\Blogs\Tags\TagUpdateParams\Language> $language body param: The explicitly defined ISO 639 language code of the tag
     * @param string $name body param: The name of the tag
     * @param int $translatedFromID body param: ID of the primary tag this object was translated from
     * @param \DateTimeInterface $updated Body param
     * @param bool $archived Query param: Specifies whether to update deleted Blog Tags. Defaults to `false`.
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function update(
        string $objectID,
        string $id,
        \DateTimeInterface $created,
        \DateTimeInterface $deletedAt,
        \HubspotSDK\Cms\Blogs\Tags\TagUpdateParams\Language|string $language,
        string $name,
        int $translatedFromID,
        \DateTimeInterface $updated,
        ?bool $archived = null,
        RequestOptions|array|null $requestOptions = null,
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
     * @param list<string> $sort Specifies which fields to use for sorting results. Valid fields are `name`, `createdAt`, `updatedAt`, `createdBy`, `updatedBy`. `createdAt` will be used by default.
     * @param \DateTimeInterface $updatedAfter only return Blog Tags last updated after the specified time
     * @param \DateTimeInterface $updatedAt only return Blog Tags last updated at exactly the specified time
     * @param \DateTimeInterface $updatedBefore only return Blog Tags last updated before the specified time
     * @param RequestOpts|null $requestOptions
     *
     * @return Page<Tag>
     *
     * @throws APIException
     */
    public function list(
        ?string $after = null,
        ?bool $archived = null,
        ?\DateTimeInterface $createdAfter = null,
        ?\DateTimeInterface $createdAt = null,
        ?\DateTimeInterface $createdBefore = null,
        ?int $limit = null,
        ?string $property = null,
        ?array $sort = null,
        ?\DateTimeInterface $updatedAfter = null,
        ?\DateTimeInterface $updatedAt = null,
        ?\DateTimeInterface $updatedBefore = null,
        RequestOptions|array|null $requestOptions = null,
    ): Page;

    /**
     * @api
     *
     * @param string $objectID the Blog Tag id
     * @param bool $archived whether to return only results that have been archived
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function delete(
        string $objectID,
        ?bool $archived = null,
        RequestOptions|array|null $requestOptions = null,
    ): mixed;

    /**
     * @api
     *
     * @param string $id ID of the object to add to a multi-language group
     * @param string $language designated language of the object to add to a multi-language group
     * @param string $primaryID ID of primary language object in multi-language group
     * @param string $primaryLanguage primary language of the multi-language group
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function attachToLangGroup(
        string $id,
        string $language,
        string $primaryID,
        ?string $primaryLanguage = null,
        RequestOptions|array|null $requestOptions = null,
    ): mixed;

    /**
     * @api
     *
     * @param list<Tag|TagShape> $inputs blog tags to input
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function createBatch(
        array $inputs,
        RequestOptions|array|null $requestOptions = null
    ): BatchResponseTag;

    /**
     * @api
     *
     * @param string $id ID of the object to be cloned
     * @param string $name name of newly cloned blog tag
     * @param string $language target language of new variant
     * @param string $primaryLanguage language of primary blog tag to clone
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function createLangVariation(
        string $id,
        string $name,
        ?string $language = null,
        ?string $primaryLanguage = null,
        RequestOptions|array|null $requestOptions = null,
    ): Tag;

    /**
     * @api
     *
     * @param list<string> $inputs strings to input
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function deleteBatch(
        array $inputs,
        RequestOptions|array|null $requestOptions = null
    ): mixed;

    /**
     * @api
     *
     * @param string $id ID of the object to remove from a multi-language group
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function detachFromLangGroup(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): mixed;

    /**
     * @api
     *
     * @param string $objectID the Blog Tag id
     * @param bool $archived Specifies whether to return deleted Blog Tags. Defaults to `false`.
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function get(
        string $objectID,
        ?bool $archived = null,
        ?string $property = null,
        RequestOptions|array|null $requestOptions = null,
    ): Tag;

    /**
     * @api
     *
     * @param list<string> $inputs body param: Strings to input
     * @param bool $archived Query param: Specifies whether to return deleted Blog Tags. Defaults to `false`.
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function getBatch(
        array $inputs,
        ?bool $archived = null,
        RequestOptions|array|null $requestOptions = null,
    ): BatchResponseTag;

    /**
     * @api
     *
     * @param string $id ID of object to set as primary in multi-language group
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function setLangPrimary(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): mixed;

    /**
     * @api
     *
     * @param list<mixed> $inputs body param: JSON nodes to input
     * @param bool $archived Query param: Specifies whether to update deleted Blog Tags. Defaults to `false`.
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function updateBatch(
        array $inputs,
        ?bool $archived = null,
        RequestOptions|array|null $requestOptions = null,
    ): BatchResponseTag;

    /**
     * @api
     *
     * @param array<string,string> $languages map of object IDs to associated languages of object in the multi-language group
     * @param string $primaryID ID of the primary object in the multi-language group
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function updateLangs(
        array $languages,
        string $primaryID,
        RequestOptions|array|null $requestOptions = null,
    ): mixed;
}
