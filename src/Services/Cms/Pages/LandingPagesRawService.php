<?php

declare(strict_types=1);

namespace HubspotSDK\Services\Cms\Pages;

use HubspotSDK\Client;
use HubspotSDK\Cms\Pages\BatchResponseContentFolder;
use HubspotSDK\Cms\Pages\BatchResponsePage;
use HubspotSDK\Cms\Pages\ContentFolder;
use HubspotSDK\Cms\Pages\LandingPages\LandingPageAttachToLangGroupParams;
use HubspotSDK\Cms\Pages\LandingPages\LandingPageCloneParams;
use HubspotSDK\Cms\Pages\LandingPages\LandingPageCreateAbTestVariationParams;
use HubspotSDK\Cms\Pages\LandingPages\LandingPageCreateBatchParams;
use HubspotSDK\Cms\Pages\LandingPages\LandingPageCreateFolderParams;
use HubspotSDK\Cms\Pages\LandingPages\LandingPageCreateFoldersBatchParams;
use HubspotSDK\Cms\Pages\LandingPages\LandingPageCreateLanguageVariationParams;
use HubspotSDK\Cms\Pages\LandingPages\LandingPageCreateParams;
use HubspotSDK\Cms\Pages\LandingPages\LandingPageCreateParams\AbStatus;
use HubspotSDK\Cms\Pages\LandingPages\LandingPageCreateParams\ContentTypeCategory;
use HubspotSDK\Cms\Pages\LandingPages\LandingPageCreateParams\CurrentState;
use HubspotSDK\Cms\Pages\LandingPages\LandingPageCreateParams\Language;
use HubspotSDK\Cms\Pages\LandingPages\LandingPageDeleteBatchParams;
use HubspotSDK\Cms\Pages\LandingPages\LandingPageDeleteFolderParams;
use HubspotSDK\Cms\Pages\LandingPages\LandingPageDeleteFoldersBatchParams;
use HubspotSDK\Cms\Pages\LandingPages\LandingPageDeleteParams;
use HubspotSDK\Cms\Pages\LandingPages\LandingPageDetachFromLangGroupParams;
use HubspotSDK\Cms\Pages\LandingPages\LandingPageEndAbTestParams;
use HubspotSDK\Cms\Pages\LandingPages\LandingPageGetBatchParams;
use HubspotSDK\Cms\Pages\LandingPages\LandingPageGetFolderParams;
use HubspotSDK\Cms\Pages\LandingPages\LandingPageGetFolderRevisionParams;
use HubspotSDK\Cms\Pages\LandingPages\LandingPageGetFoldersBatchParams;
use HubspotSDK\Cms\Pages\LandingPages\LandingPageGetParams;
use HubspotSDK\Cms\Pages\LandingPages\LandingPageGetRevisionParams;
use HubspotSDK\Cms\Pages\LandingPages\LandingPageListFolderRevisionsParams;
use HubspotSDK\Cms\Pages\LandingPages\LandingPageListFoldersParams;
use HubspotSDK\Cms\Pages\LandingPages\LandingPageListParams;
use HubspotSDK\Cms\Pages\LandingPages\LandingPageListRevisionsParams;
use HubspotSDK\Cms\Pages\LandingPages\LandingPageRerunAbTestParams;
use HubspotSDK\Cms\Pages\LandingPages\LandingPageRestoreFolderRevisionParams;
use HubspotSDK\Cms\Pages\LandingPages\LandingPageRestoreRevisionParams;
use HubspotSDK\Cms\Pages\LandingPages\LandingPageRestoreRevisionToDraftParams;
use HubspotSDK\Cms\Pages\LandingPages\LandingPageScheduleParams;
use HubspotSDK\Cms\Pages\LandingPages\LandingPageSetNewLangPrimaryParams;
use HubspotSDK\Cms\Pages\LandingPages\LandingPageUpdateBatchParams;
use HubspotSDK\Cms\Pages\LandingPages\LandingPageUpdateDraftParams;
use HubspotSDK\Cms\Pages\LandingPages\LandingPageUpdateFolderParams;
use HubspotSDK\Cms\Pages\LandingPages\LandingPageUpdateFoldersBatchParams;
use HubspotSDK\Cms\Pages\LandingPages\LandingPageUpdateLanguagesParams;
use HubspotSDK\Cms\Pages\LandingPages\LandingPageUpdateParams;
use HubspotSDK\Cms\Pages\Page;
use HubspotSDK\Cms\Pages\PagesContentLanguageVariation;
use HubspotSDK\Cms\Pages\VersionContentFolder;
use HubspotSDK\Cms\Pages\VersionPage;
use HubspotSDK\Core\Contracts\BaseResponse;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\RequestOptions;
use HubspotSDK\ServiceContracts\Cms\Pages\LandingPagesRawContract;

/**
 * @phpstan-import-type ContentFolderShape from \HubspotSDK\Cms\Pages\ContentFolder
 * @phpstan-import-type PagesContentLanguageVariationShape from \HubspotSDK\Cms\Pages\PagesContentLanguageVariation
 * @phpstan-import-type RequestOpts from \HubspotSDK\RequestOptions
 */
final class LandingPagesRawService implements LandingPagesRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Create a new Landing Page
     *
     * @param array{
     *   id: string,
     *   abStatus: value-of<AbStatus>,
     *   abTestID: string,
     *   archivedAt: \DateTimeInterface,
     *   archivedInDashboard: bool,
     *   attachedStylesheets: list<array<string,mixed>>,
     *   authorName: string,
     *   campaign: string,
     *   categoryID: int,
     *   contentGroupID: string,
     *   contentTypeCategory: ContentTypeCategory|value-of<ContentTypeCategory>,
     *   created: \DateTimeInterface,
     *   createdByID: string,
     *   currentlyPublished: bool,
     *   currentState: value-of<CurrentState>,
     *   domain: string,
     *   dynamicPageDataSourceID: string,
     *   dynamicPageDataSourceType: int,
     *   dynamicPageHubDBTableID: string,
     *   enableDomainStylesheets: bool,
     *   enableLayoutStylesheets: bool,
     *   featuredImage: string,
     *   featuredImageAltText: string,
     *   folderID: string,
     *   footerHTML: string,
     *   headHTML: string,
     *   htmlTitle: string,
     *   includeDefaultCustomCss: bool,
     *   language: value-of<Language>,
     *   layoutSections: array<string,mixed>,
     *   linkRelCanonicalURL: string,
     *   mabExperimentID: string,
     *   metaDescription: string,
     *   name: string,
     *   pageExpiryDate: int,
     *   pageExpiryEnabled: bool,
     *   pageExpiryRedirectID: int,
     *   pageExpiryRedirectURL: string,
     *   pageRedirected: bool,
     *   password: string,
     *   publicAccessRules: list<mixed>,
     *   publicAccessRulesEnabled: bool,
     *   publishDate: \DateTimeInterface,
     *   publishImmediately: bool,
     *   slug: string,
     *   state: string,
     *   subcategory: string,
     *   templatePath: string,
     *   themeSettingsValues: array<string,mixed>,
     *   translatedFromID: string,
     *   translations: array<string,PagesContentLanguageVariation|PagesContentLanguageVariationShape>,
     *   updated: \DateTimeInterface,
     *   updatedByID: string,
     *   url: string,
     *   useFeaturedImage: bool,
     *   widgetContainers: array<string,mixed>,
     *   widgets: array<string,mixed>,
     * }|LandingPageCreateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function create(
        array|LandingPageCreateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = LandingPageCreateParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: 'cms/v3/pages/landing-pages',
            body: (object) $parsed,
            options: $options,
            convert: null,
        );
    }

    /**
     * @api
     *
     * Sparse updates a single Landing Page object identified by the id in the path.
     * You only need to specify the column values that you are modifying.
     *
     * @param string $objectID path param: The Landing Page id
     * @param array{
     *   id: string,
     *   abStatus: value-of<LandingPageUpdateParams\AbStatus>,
     *   abTestID: string,
     *   archivedAt: \DateTimeInterface,
     *   archivedInDashboard: bool,
     *   attachedStylesheets: list<array<string,mixed>>,
     *   authorName: string,
     *   campaign: string,
     *   categoryID: int,
     *   contentGroupID: string,
     *   contentTypeCategory: LandingPageUpdateParams\ContentTypeCategory|value-of<LandingPageUpdateParams\ContentTypeCategory>,
     *   created: \DateTimeInterface,
     *   createdByID: string,
     *   currentlyPublished: bool,
     *   currentState: value-of<LandingPageUpdateParams\CurrentState>,
     *   domain: string,
     *   dynamicPageDataSourceID: string,
     *   dynamicPageDataSourceType: int,
     *   dynamicPageHubDBTableID: string,
     *   enableDomainStylesheets: bool,
     *   enableLayoutStylesheets: bool,
     *   featuredImage: string,
     *   featuredImageAltText: string,
     *   folderID: string,
     *   footerHTML: string,
     *   headHTML: string,
     *   htmlTitle: string,
     *   includeDefaultCustomCss: bool,
     *   language: value-of<LandingPageUpdateParams\Language>,
     *   layoutSections: array<string,mixed>,
     *   linkRelCanonicalURL: string,
     *   mabExperimentID: string,
     *   metaDescription: string,
     *   name: string,
     *   pageExpiryDate: int,
     *   pageExpiryEnabled: bool,
     *   pageExpiryRedirectID: int,
     *   pageExpiryRedirectURL: string,
     *   pageRedirected: bool,
     *   password: string,
     *   publicAccessRules: list<mixed>,
     *   publicAccessRulesEnabled: bool,
     *   publishDate: \DateTimeInterface,
     *   publishImmediately: bool,
     *   slug: string,
     *   state: string,
     *   subcategory: string,
     *   templatePath: string,
     *   themeSettingsValues: array<string,mixed>,
     *   translatedFromID: string,
     *   translations: array<string,PagesContentLanguageVariation|PagesContentLanguageVariationShape>,
     *   updated: \DateTimeInterface,
     *   updatedByID: string,
     *   url: string,
     *   useFeaturedImage: bool,
     *   widgetContainers: array<string,mixed>,
     *   widgets: array<string,mixed>,
     *   archived?: bool,
     * }|LandingPageUpdateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<Page>
     *
     * @throws APIException
     */
    public function update(
        string $objectID,
        array|LandingPageUpdateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = LandingPageUpdateParams::parseRequest(
            $params,
            $requestOptions,
        );
        $query_params = array_flip(['archived']);

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'patch',
            path: ['cms/v3/pages/landing-pages/%1$s', $objectID],
            query: array_intersect_key($parsed, $query_params),
            body: (object) array_diff_key($parsed, $query_params),
            options: $options,
            convert: Page::class,
        );
    }

    /**
     * @api
     *
     * Get the list of landing pages. Supports paging and filtering. This method would be useful for an integration that examined these models and used an external service to suggest edits.
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
     * }|LandingPageListParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<\HubspotSDK\Page<Page>>
     *
     * @throws APIException
     */
    public function list(
        array|LandingPageListParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = LandingPageListParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: 'cms/v3/pages/landing-pages',
            query: $parsed,
            options: $options,
            convert: Page::class,
            page: \HubspotSDK\Page::class,
        );
    }

    /**
     * @api
     *
     * Delete the Landing Page object identified by the id in the path.
     *
     * @param string $objectID the Landing Page id
     * @param array{archived?: bool}|LandingPageDeleteParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function delete(
        string $objectID,
        array|LandingPageDeleteParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = LandingPageDeleteParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'delete',
            path: ['cms/v3/pages/landing-pages/%1$s', $objectID],
            query: $parsed,
            options: $options,
            convert: null,
        );
    }

    /**
     * @api
     *
     * Attach a landing page to a multi-language group.
     *
     * @param array{
     *   id: string, language: string, primaryID: string, primaryLanguage?: string
     * }|LandingPageAttachToLangGroupParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function attachToLangGroup(
        array|LandingPageAttachToLangGroupParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = LandingPageAttachToLangGroupParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: 'cms/v3/pages/landing-pages/multi-language/attach-to-lang-group',
            body: (object) $parsed,
            options: $options,
            convert: null,
        );
    }

    /**
     * @api
     *
     * Clone a Landing Page
     *
     * @param array{id: string, cloneName?: string}|LandingPageCloneParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<Page>
     *
     * @throws APIException
     */
    public function clone(
        array|LandingPageCloneParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = LandingPageCloneParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: 'cms/v3/pages/landing-pages/clone',
            body: (object) $parsed,
            options: $options,
            convert: Page::class,
        );
    }

    /**
     * @api
     *
     * Create a new A/B test variation based on the information provided in the request body.
     *
     * @param array{
     *   contentID: string, variationName: string
     * }|LandingPageCreateAbTestVariationParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<Page>
     *
     * @throws APIException
     */
    public function createAbTestVariation(
        array|LandingPageCreateAbTestVariationParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = LandingPageCreateAbTestVariationParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: 'cms/v3/pages/landing-pages/ab-test/create-variation',
            body: (object) $parsed,
            options: $options,
            convert: Page::class,
        );
    }

    /**
     * @api
     *
     * Create the Landing Page objects detailed in the request body.
     *
     * @param array{inputs: list<mixed>}|LandingPageCreateBatchParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<BatchResponsePage>
     *
     * @throws APIException
     */
    public function createBatch(
        array|LandingPageCreateBatchParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = LandingPageCreateBatchParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: 'cms/v3/pages/landing-pages/batch/create',
            body: (object) $parsed,
            options: $options,
            convert: BatchResponsePage::class,
        );
    }

    /**
     * @api
     *
     * Create a new Folder
     *
     * @param array{
     *   id: string,
     *   category: int,
     *   created: \DateTimeInterface,
     *   deletedAt: \DateTimeInterface,
     *   name: string,
     *   parentFolderID: int,
     *   updated: \DateTimeInterface,
     * }|LandingPageCreateFolderParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<ContentFolder>
     *
     * @throws APIException
     */
    public function createFolder(
        array|LandingPageCreateFolderParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = LandingPageCreateFolderParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: 'cms/v3/pages/landing-pages/folders',
            body: (object) $parsed,
            options: $options,
            convert: ContentFolder::class,
        );
    }

    /**
     * @api
     *
     * Create the Folder objects detailed in the request body.
     *
     * @param array{
     *   inputs: list<ContentFolder|ContentFolderShape>
     * }|LandingPageCreateFoldersBatchParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<BatchResponseContentFolder>
     *
     * @throws APIException
     */
    public function createFoldersBatch(
        array|LandingPageCreateFoldersBatchParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = LandingPageCreateFoldersBatchParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: 'cms/v3/pages/landing-pages/folders/batch/create',
            body: (object) $parsed,
            options: $options,
            convert: BatchResponseContentFolder::class,
        );
    }

    /**
     * @api
     *
     * Create a new language variation from an existing landing page
     *
     * @param array{
     *   id: string, language?: string, primaryLanguage?: string
     * }|LandingPageCreateLanguageVariationParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<Page>
     *
     * @throws APIException
     */
    public function createLanguageVariation(
        array|LandingPageCreateLanguageVariationParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = LandingPageCreateLanguageVariationParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: 'cms/v3/pages/landing-pages/multi-language/create-language-variation',
            body: (object) $parsed,
            options: $options,
            convert: Page::class,
        );
    }

    /**
     * @api
     *
     * Delete the Landing Page objects identified in the request body.
     * Note: This is not the same as the dashboard `archive` function. To perform a dashboard `archive` send an normal update with the `archivedInDashboard` field set to true.
     *
     * @param array{inputs: list<string>}|LandingPageDeleteBatchParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function deleteBatch(
        array|LandingPageDeleteBatchParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = LandingPageDeleteBatchParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: 'cms/v3/pages/landing-pages/batch/archive',
            body: (object) $parsed,
            options: $options,
            convert: null,
        );
    }

    /**
     * @api
     *
     * Delete the Folder object identified by the id in the path.
     *
     * @param string $objectID the Folder id
     * @param array{archived?: bool}|LandingPageDeleteFolderParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function deleteFolder(
        string $objectID,
        array|LandingPageDeleteFolderParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = LandingPageDeleteFolderParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'delete',
            path: ['cms/v3/pages/landing-pages/folders/%1$s', $objectID],
            query: $parsed,
            options: $options,
            convert: null,
        );
    }

    /**
     * @api
     *
     * Delete the Folder objects identified in the request body.
     *
     * @param array{inputs: list<string>}|LandingPageDeleteFoldersBatchParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function deleteFoldersBatch(
        array|LandingPageDeleteFoldersBatchParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = LandingPageDeleteFoldersBatchParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: 'cms/v3/pages/landing-pages/folders/batch/archive',
            body: (object) $parsed,
            options: $options,
            convert: null,
        );
    }

    /**
     * @api
     *
     * Detach a landing page from a multi-language group.
     *
     * @param array{id: string}|LandingPageDetachFromLangGroupParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function detachFromLangGroup(
        array|LandingPageDetachFromLangGroupParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = LandingPageDetachFromLangGroupParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: 'cms/v3/pages/landing-pages/multi-language/detach-from-lang-group',
            body: (object) $parsed,
            options: $options,
            convert: null,
        );
    }

    /**
     * @api
     *
     * End an active A/B test and designate a winner.
     *
     * @param array{
     *   abTestID: string, winnerID: string
     * }|LandingPageEndAbTestParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function endAbTest(
        array|LandingPageEndAbTestParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = LandingPageEndAbTestParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: 'cms/v3/pages/landing-pages/ab-test/end',
            body: (object) $parsed,
            options: $options,
            convert: null,
        );
    }

    /**
     * @api
     *
     * Retrieve the Landing Page object identified by the id in the path.
     *
     * @param string $objectID the Landing Page id
     * @param array{archived?: bool, property?: string}|LandingPageGetParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<Page>
     *
     * @throws APIException
     */
    public function get(
        string $objectID,
        array|LandingPageGetParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = LandingPageGetParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['cms/v3/pages/landing-pages/%1$s', $objectID],
            query: $parsed,
            options: $options,
            convert: Page::class,
        );
    }

    /**
     * @api
     *
     * Retrieve the Landing Page objects identified in the request body.
     *
     * @param array{
     *   inputs: list<string>, archived?: bool
     * }|LandingPageGetBatchParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<BatchResponsePage>
     *
     * @throws APIException
     */
    public function getBatch(
        array|LandingPageGetBatchParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = LandingPageGetBatchParams::parseRequest(
            $params,
            $requestOptions,
        );
        $query_params = array_flip(['archived']);

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: 'cms/v3/pages/landing-pages/batch/read',
            query: array_intersect_key($parsed, $query_params),
            body: (object) array_diff_key($parsed, $query_params),
            options: $options,
            convert: BatchResponsePage::class,
        );
    }

    /**
     * @api
     *
     * Retrieve the full draft version of the Landing Page.
     *
     * @param string $objectID the Landing Page id
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<Page>
     *
     * @throws APIException
     */
    public function getDraft(
        string $objectID,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['cms/v3/pages/landing-pages/%1$s/draft', $objectID],
            options: $requestOptions,
            convert: Page::class,
        );
    }

    /**
     * @api
     *
     * Retrieve the Folder object identified by the id in the path.
     *
     * @param string $objectID the Folder id
     * @param array{
     *   archived?: bool, property?: string
     * }|LandingPageGetFolderParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<ContentFolder>
     *
     * @throws APIException
     */
    public function getFolder(
        string $objectID,
        array|LandingPageGetFolderParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = LandingPageGetFolderParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['cms/v3/pages/landing-pages/folders/%1$s', $objectID],
            query: $parsed,
            options: $options,
            convert: ContentFolder::class,
        );
    }

    /**
     * @api
     *
     * Retrieves a previous version of a Folder
     *
     * @param string $revisionID the Folder version id
     * @param array{objectID: string}|LandingPageGetFolderRevisionParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<VersionContentFolder>
     *
     * @throws APIException
     */
    public function getFolderRevision(
        string $revisionID,
        array|LandingPageGetFolderRevisionParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = LandingPageGetFolderRevisionParams::parseRequest(
            $params,
            $requestOptions,
        );
        $objectID = $parsed['objectID'];
        unset($parsed['objectID']);

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: [
                'cms/v3/pages/landing-pages/folders/%1$s/revisions/%2$s',
                $objectID,
                $revisionID,
            ],
            options: $options,
            convert: VersionContentFolder::class,
        );
    }

    /**
     * @api
     *
     * Update the Folder objects identified in the request body.
     *
     * @param array{
     *   inputs: list<string>, archived?: bool
     * }|LandingPageGetFoldersBatchParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<BatchResponseContentFolder>
     *
     * @throws APIException
     */
    public function getFoldersBatch(
        array|LandingPageGetFoldersBatchParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = LandingPageGetFoldersBatchParams::parseRequest(
            $params,
            $requestOptions,
        );
        $query_params = array_flip(['archived']);

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: 'cms/v3/pages/landing-pages/folders/batch/read',
            query: array_intersect_key($parsed, $query_params),
            body: (object) array_diff_key($parsed, $query_params),
            options: $options,
            convert: BatchResponseContentFolder::class,
        );
    }

    /**
     * @api
     *
     * Retrieves a previous version of a Landing Page
     *
     * @param string $revisionID the Landing Page version id
     * @param array{objectID: string}|LandingPageGetRevisionParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<VersionPage>
     *
     * @throws APIException
     */
    public function getRevision(
        string $revisionID,
        array|LandingPageGetRevisionParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = LandingPageGetRevisionParams::parseRequest(
            $params,
            $requestOptions,
        );
        $objectID = $parsed['objectID'];
        unset($parsed['objectID']);

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: [
                'cms/v3/pages/landing-pages/%1$s/revisions/%2$s', $objectID, $revisionID,
            ],
            options: $options,
            convert: VersionPage::class,
        );
    }

    /**
     * @api
     *
     * Retrieves all the previous versions of a Folder.
     *
     * @param string $objectID the Folder id
     * @param array{
     *   after?: string, before?: string, limit?: int
     * }|LandingPageListFolderRevisionsParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<\HubspotSDK\Page<VersionContentFolder>>
     *
     * @throws APIException
     */
    public function listFolderRevisions(
        string $objectID,
        array|LandingPageListFolderRevisionsParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = LandingPageListFolderRevisionsParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['cms/v3/pages/landing-pages/folders/%1$s/revisions', $objectID],
            query: $parsed,
            options: $options,
            convert: VersionContentFolder::class,
            page: \HubspotSDK\Page::class,
        );
    }

    /**
     * @api
     *
     * Get the list of Landing Page Folders. Supports paging and filtering. This method would be useful for an integration that examined these models and used an external service to suggest edits.
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
     * }|LandingPageListFoldersParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<\HubspotSDK\Page<ContentFolder>>
     *
     * @throws APIException
     */
    public function listFolders(
        array|LandingPageListFoldersParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = LandingPageListFoldersParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: 'cms/v3/pages/landing-pages/folders',
            query: $parsed,
            options: $options,
            convert: ContentFolder::class,
            page: \HubspotSDK\Page::class,
        );
    }

    /**
     * @api
     *
     * Retrieves all the previous versions of a Landing Page.
     *
     * @param string $objectID the Landing Page id
     * @param array{
     *   after?: string, before?: string, limit?: int
     * }|LandingPageListRevisionsParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<\HubspotSDK\Page<VersionPage>>
     *
     * @throws APIException
     */
    public function listRevisions(
        string $objectID,
        array|LandingPageListRevisionsParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = LandingPageListRevisionsParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['cms/v3/pages/landing-pages/%1$s/revisions', $objectID],
            query: $parsed,
            options: $options,
            convert: VersionPage::class,
            page: \HubspotSDK\Page::class,
        );
    }

    /**
     * @api
     *
     * Take any changes from the draft version of the Landing Page and apply them to the live version.
     *
     * @param string $objectID the id of the Landing Page for which it's draft will be pushed live
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function publishDraft(
        string $objectID,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: ['cms/v3/pages/landing-pages/%1$s/draft/push-live', $objectID],
            options: $requestOptions,
            convert: null,
        );
    }

    /**
     * @api
     *
     * Rerun a previous A/B test.
     *
     * @param array{
     *   abTestID: string, variationID: string
     * }|LandingPageRerunAbTestParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function rerunAbTest(
        array|LandingPageRerunAbTestParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = LandingPageRerunAbTestParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: 'cms/v3/pages/landing-pages/ab-test/rerun',
            body: (object) $parsed,
            options: $options,
            convert: null,
        );
    }

    /**
     * @api
     *
     * Discards any edits and resets the draft to the live version.
     *
     * @param string $objectID the id of the Landing Page for which it's draft will be reset
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function resetDraft(
        string $objectID,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: ['cms/v3/pages/landing-pages/%1$s/draft/reset', $objectID],
            options: $requestOptions,
            convert: null,
        );
    }

    /**
     * @api
     *
     * Takes a specified version of a Folder and restores it.
     *
     * @param string $revisionID the Folder version id to restore
     * @param array{objectID: string}|LandingPageRestoreFolderRevisionParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<ContentFolder>
     *
     * @throws APIException
     */
    public function restoreFolderRevision(
        string $revisionID,
        array|LandingPageRestoreFolderRevisionParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = LandingPageRestoreFolderRevisionParams::parseRequest(
            $params,
            $requestOptions,
        );
        $objectID = $parsed['objectID'];
        unset($parsed['objectID']);

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: [
                'cms/v3/pages/landing-pages/folders/%1$s/revisions/%2$s/restore',
                $objectID,
                $revisionID,
            ],
            options: $options,
            convert: ContentFolder::class,
        );
    }

    /**
     * @api
     *
     * Takes a specified version of a Landing Page and restores it.
     *
     * @param string $revisionID the Landing Page version id to restore
     * @param array{objectID: string}|LandingPageRestoreRevisionParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<Page>
     *
     * @throws APIException
     */
    public function restoreRevision(
        string $revisionID,
        array|LandingPageRestoreRevisionParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = LandingPageRestoreRevisionParams::parseRequest(
            $params,
            $requestOptions,
        );
        $objectID = $parsed['objectID'];
        unset($parsed['objectID']);

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: [
                'cms/v3/pages/landing-pages/%1$s/revisions/%2$s/restore',
                $objectID,
                $revisionID,
            ],
            options: $options,
            convert: Page::class,
        );
    }

    /**
     * @api
     *
     * Takes a specified version of a Landing Page, sets it as the new draft version of the Landing Page.
     *
     * @param int $revisionID the Landing Page version id to restore
     * @param array{objectID: string}|LandingPageRestoreRevisionToDraftParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<Page>
     *
     * @throws APIException
     */
    public function restoreRevisionToDraft(
        int $revisionID,
        array|LandingPageRestoreRevisionToDraftParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = LandingPageRestoreRevisionToDraftParams::parseRequest(
            $params,
            $requestOptions,
        );
        $objectID = $parsed['objectID'];
        unset($parsed['objectID']);

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: [
                'cms/v3/pages/landing-pages/%1$s/revisions/%2$s/restore-to-draft',
                $objectID,
                $revisionID,
            ],
            options: $options,
            convert: Page::class,
        );
    }

    /**
     * @api
     *
     * Schedule a Landing Page to be Published
     *
     * @param array{
     *   id: string, publishDate: \DateTimeInterface
     * }|LandingPageScheduleParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function schedule(
        array|LandingPageScheduleParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = LandingPageScheduleParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: 'cms/v3/pages/landing-pages/schedule',
            body: (object) $parsed,
            options: $options,
            convert: null,
        );
    }

    /**
     * @api
     *
     * Set a landing page as the primary language of a multi-language group.
     *
     * @param array{id: string}|LandingPageSetNewLangPrimaryParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function setNewLangPrimary(
        array|LandingPageSetNewLangPrimaryParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = LandingPageSetNewLangPrimaryParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'put',
            path: 'cms/v3/pages/landing-pages/multi-language/set-new-lang-primary',
            body: (object) $parsed,
            options: $options,
            convert: null,
        );
    }

    /**
     * @api
     *
     * Update the Landing Page objects identified in the request body.
     *
     * @param array{
     *   inputs: list<mixed>, archived?: bool
     * }|LandingPageUpdateBatchParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<BatchResponsePage>
     *
     * @throws APIException
     */
    public function updateBatch(
        array|LandingPageUpdateBatchParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = LandingPageUpdateBatchParams::parseRequest(
            $params,
            $requestOptions,
        );
        $query_params = array_flip(['archived']);

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: 'cms/v3/pages/landing-pages/batch/update',
            query: array_intersect_key($parsed, $query_params),
            body: (object) array_diff_key($parsed, $query_params),
            options: $options,
            convert: BatchResponsePage::class,
        );
    }

    /**
     * @api
     *
     * Sparse updates the draft version of a single Landing Page object identified by the id in the path.
     * You only need to specify the column values that you are modifying.
     *
     * @param string $objectID the Landing Page id
     * @param array{
     *   id: string,
     *   abStatus: value-of<LandingPageUpdateDraftParams\AbStatus>,
     *   abTestID: string,
     *   archivedAt: \DateTimeInterface,
     *   archivedInDashboard: bool,
     *   attachedStylesheets: list<array<string,mixed>>,
     *   authorName: string,
     *   campaign: string,
     *   categoryID: int,
     *   contentGroupID: string,
     *   contentTypeCategory: LandingPageUpdateDraftParams\ContentTypeCategory|value-of<LandingPageUpdateDraftParams\ContentTypeCategory>,
     *   created: \DateTimeInterface,
     *   createdByID: string,
     *   currentlyPublished: bool,
     *   currentState: value-of<LandingPageUpdateDraftParams\CurrentState>,
     *   domain: string,
     *   dynamicPageDataSourceID: string,
     *   dynamicPageDataSourceType: int,
     *   dynamicPageHubDBTableID: string,
     *   enableDomainStylesheets: bool,
     *   enableLayoutStylesheets: bool,
     *   featuredImage: string,
     *   featuredImageAltText: string,
     *   folderID: string,
     *   footerHTML: string,
     *   headHTML: string,
     *   htmlTitle: string,
     *   includeDefaultCustomCss: bool,
     *   language: value-of<LandingPageUpdateDraftParams\Language>,
     *   layoutSections: array<string,mixed>,
     *   linkRelCanonicalURL: string,
     *   mabExperimentID: string,
     *   metaDescription: string,
     *   name: string,
     *   pageExpiryDate: int,
     *   pageExpiryEnabled: bool,
     *   pageExpiryRedirectID: int,
     *   pageExpiryRedirectURL: string,
     *   pageRedirected: bool,
     *   password: string,
     *   publicAccessRules: list<mixed>,
     *   publicAccessRulesEnabled: bool,
     *   publishDate: \DateTimeInterface,
     *   publishImmediately: bool,
     *   slug: string,
     *   state: string,
     *   subcategory: string,
     *   templatePath: string,
     *   themeSettingsValues: array<string,mixed>,
     *   translatedFromID: string,
     *   translations: array<string,PagesContentLanguageVariation|PagesContentLanguageVariationShape>,
     *   updated: \DateTimeInterface,
     *   updatedByID: string,
     *   url: string,
     *   useFeaturedImage: bool,
     *   widgetContainers: array<string,mixed>,
     *   widgets: array<string,mixed>,
     * }|LandingPageUpdateDraftParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<Page>
     *
     * @throws APIException
     */
    public function updateDraft(
        string $objectID,
        array|LandingPageUpdateDraftParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = LandingPageUpdateDraftParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'patch',
            path: ['cms/v3/pages/landing-pages/%1$s/draft', $objectID],
            body: (object) $parsed,
            options: $options,
            convert: Page::class,
        );
    }

    /**
     * @api
     *
     * Sparse updates a single Folder object identified by the id in the path.
     * You only need to specify the column values that you are modifying.
     *
     * @param string $objectID path param: The Folder id
     * @param array{
     *   id: string,
     *   category: int,
     *   created: \DateTimeInterface,
     *   deletedAt: \DateTimeInterface,
     *   name: string,
     *   parentFolderID: int,
     *   updated: \DateTimeInterface,
     *   archived?: bool,
     * }|LandingPageUpdateFolderParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<ContentFolder>
     *
     * @throws APIException
     */
    public function updateFolder(
        string $objectID,
        array|LandingPageUpdateFolderParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = LandingPageUpdateFolderParams::parseRequest(
            $params,
            $requestOptions,
        );
        $query_params = array_flip(['archived']);

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'patch',
            path: ['cms/v3/pages/landing-pages/folders/%1$s', $objectID],
            query: array_intersect_key($parsed, $query_params),
            body: (object) array_diff_key($parsed, $query_params),
            options: $options,
            convert: ContentFolder::class,
        );
    }

    /**
     * @api
     *
     * Update the Folder objects identified in the request body.
     *
     * @param array{
     *   inputs: list<mixed>, archived?: bool
     * }|LandingPageUpdateFoldersBatchParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<BatchResponseContentFolder>
     *
     * @throws APIException
     */
    public function updateFoldersBatch(
        array|LandingPageUpdateFoldersBatchParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = LandingPageUpdateFoldersBatchParams::parseRequest(
            $params,
            $requestOptions,
        );
        $query_params = array_flip(['archived']);

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: 'cms/v3/pages/landing-pages/folders/batch/update',
            query: array_intersect_key($parsed, $query_params),
            body: (object) array_diff_key($parsed, $query_params),
            options: $options,
            convert: BatchResponseContentFolder::class,
        );
    }

    /**
     * @api
     *
     * Explicitly set new languages for each landing page in a multi-language group.
     *
     * @param array{
     *   languages: array<string,string>, primaryID: string
     * }|LandingPageUpdateLanguagesParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function updateLanguages(
        array|LandingPageUpdateLanguagesParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = LandingPageUpdateLanguagesParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: 'cms/v3/pages/landing-pages/multi-language/update-languages',
            body: (object) $parsed,
            options: $options,
            convert: null,
        );
    }
}
