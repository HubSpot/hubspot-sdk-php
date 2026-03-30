<?php

declare(strict_types=1);

namespace HubspotSDK\Services\Cms\Pages;

use HubspotSDK\Client;
use HubspotSDK\Cms\ContentLanguageVariation;
use HubspotSDK\Cms\Pages\Page;
use HubspotSDK\Cms\Pages\WebsitePages\WebsitePageCloneParams;
use HubspotSDK\Cms\Pages\WebsitePages\WebsitePageCreateParams;
use HubspotSDK\Cms\Pages\WebsitePages\WebsitePageCreateParams\AbStatus;
use HubspotSDK\Cms\Pages\WebsitePages\WebsitePageCreateParams\ContentTypeCategory;
use HubspotSDK\Cms\Pages\WebsitePages\WebsitePageCreateParams\CurrentState;
use HubspotSDK\Cms\Pages\WebsitePages\WebsitePageCreateParams\Language;
use HubspotSDK\Cms\Pages\WebsitePages\WebsitePageDeleteParams;
use HubspotSDK\Cms\Pages\WebsitePages\WebsitePageGetParams;
use HubspotSDK\Cms\Pages\WebsitePages\WebsitePageListParams;
use HubspotSDK\Cms\Pages\WebsitePages\WebsitePageScheduleParams;
use HubspotSDK\Cms\Pages\WebsitePages\WebsitePageSetNewLangPrimaryParams;
use HubspotSDK\Cms\Pages\WebsitePages\WebsitePageUpdateDraftParams;
use HubspotSDK\Cms\Pages\WebsitePages\WebsitePageUpdateParams;
use HubspotSDK\Core\Contracts\BaseResponse;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\RequestOptions;
use HubspotSDK\ServiceContracts\Cms\Pages\WebsitePagesRawContract;

/**
 * @phpstan-import-type ContentLanguageVariationShape from \HubspotSDK\Cms\ContentLanguageVariation
 * @phpstan-import-type RequestOpts from \HubspotSDK\RequestOptions
 */
final class WebsitePagesRawService implements WebsitePagesRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Create a new website page.
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
     *   contentTypeCategory: value-of<ContentTypeCategory>,
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
     *   translations: array<string,ContentLanguageVariation|ContentLanguageVariationShape>,
     *   updated: \DateTimeInterface,
     *   updatedByID: string,
     *   url: string,
     *   useFeaturedImage: bool,
     *   widgetContainers: array<string,mixed>,
     *   widgets: array<string,mixed>,
     * }|WebsitePageCreateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<Page>
     *
     * @throws APIException
     */
    public function create(
        array|WebsitePageCreateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = WebsitePageCreateParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: 'cms/pages/2026-03/site-pages',
            headers: ['Content-Type' => '*/*'],
            body: (object) $parsed,
            options: $options,
            convert: Page::class,
        );
    }

    /**
     * @api
     *
     * Partially updates a single website page, specified by its ID. You only need to specify the column values that you are modifying.
     *
     * @param string $objectID Path param
     * @param array{
     *   id: string,
     *   abStatus: value-of<WebsitePageUpdateParams\AbStatus>,
     *   abTestID: string,
     *   archivedAt: \DateTimeInterface,
     *   archivedInDashboard: bool,
     *   attachedStylesheets: list<array<string,mixed>>,
     *   authorName: string,
     *   campaign: string,
     *   categoryID: int,
     *   contentGroupID: string,
     *   contentTypeCategory: value-of<WebsitePageUpdateParams\ContentTypeCategory>,
     *   created: \DateTimeInterface,
     *   createdByID: string,
     *   currentlyPublished: bool,
     *   currentState: value-of<WebsitePageUpdateParams\CurrentState>,
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
     *   language: value-of<WebsitePageUpdateParams\Language>,
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
     *   translations: array<string,ContentLanguageVariation|ContentLanguageVariationShape>,
     *   updated: \DateTimeInterface,
     *   updatedByID: string,
     *   url: string,
     *   useFeaturedImage: bool,
     *   widgetContainers: array<string,mixed>,
     *   widgets: array<string,mixed>,
     *   archived?: bool,
     * }|WebsitePageUpdateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<Page>
     *
     * @throws APIException
     */
    public function update(
        string $objectID,
        array|WebsitePageUpdateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = WebsitePageUpdateParams::parseRequest(
            $params,
            $requestOptions,
        );
        $query_params = array_flip(['archived']);

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'patch',
            path: ['cms/pages/2026-03/site-pages/%1$s', $objectID],
            query: array_intersect_key($parsed, $query_params),
            headers: ['Content-Type' => '*/*'],
            body: (object) array_diff_key($parsed, $query_params),
            options: $options,
            convert: Page::class,
        );
    }

    /**
     * @api
     *
     * Retrieve all website pages. Supports paging and filtering. This method would be useful for an integration that examined these models and used an external service to suggest edits.
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
     * }|WebsitePageListParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<\HubspotSDK\Page<Page>>
     *
     * @throws APIException
     */
    public function list(
        array|WebsitePageListParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = WebsitePageListParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: 'cms/pages/2026-03/site-pages',
            query: $parsed,
            options: $options,
            convert: Page::class,
            page: \HubspotSDK\Page::class,
        );
    }

    /**
     * @api
     *
     * Delete a website page, specified by its ID.
     *
     * @param array{archived?: bool}|WebsitePageDeleteParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function delete(
        string $objectID,
        array|WebsitePageDeleteParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = WebsitePageDeleteParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'delete',
            path: ['cms/pages/2026-03/site-pages/%1$s', $objectID],
            query: $parsed,
            options: $options,
            convert: null,
        );
    }

    /**
     * @api
     *
     * Create a copy of an existing website page.
     *
     * @param array{id: string, cloneName?: string}|WebsitePageCloneParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<Page>
     *
     * @throws APIException
     */
    public function clone(
        array|WebsitePageCloneParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = WebsitePageCloneParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: 'cms/pages/2026-03/site-pages/clone',
            headers: ['Content-Type' => '*/*'],
            body: (object) $parsed,
            options: $options,
            convert: Page::class,
        );
    }

    /**
     * @api
     *
     * Retrieve a website page by its ID.
     *
     * @param array{archived?: bool, property?: string}|WebsitePageGetParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<Page>
     *
     * @throws APIException
     */
    public function get(
        string $objectID,
        array|WebsitePageGetParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = WebsitePageGetParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['cms/pages/2026-03/site-pages/%1$s', $objectID],
            query: $parsed,
            options: $options,
            convert: Page::class,
        );
    }

    /**
     * @api
     *
     * Retrieve the full draft version of a website page, specified by its ID.
     *
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
            path: ['cms/pages/2026-03/site-pages/%1$s/draft', $objectID],
            options: $requestOptions,
            convert: Page::class,
        );
    }

    /**
     * @api
     *
     * Take any changes from the draft version of the website page and apply them to the live version.
     *
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
            path: ['cms/pages/2026-03/site-pages/%1$s/draft/push-live', $objectID],
            options: $requestOptions,
            convert: null,
        );
    }

    /**
     * @api
     *
     * Schedule a website page to published at a future time.
     *
     * @param array{
     *   id: string, publishDate: \DateTimeInterface
     * }|WebsitePageScheduleParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function schedule(
        array|WebsitePageScheduleParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = WebsitePageScheduleParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: 'cms/pages/2026-03/site-pages/schedule',
            headers: ['Content-Type' => '*/*'],
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
     * @param array{id: string}|WebsitePageSetNewLangPrimaryParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function setNewLangPrimary(
        array|WebsitePageSetNewLangPrimaryParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = WebsitePageSetNewLangPrimaryParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'put',
            path: 'cms/pages/2026-03/landing-pages/multi-language/set-new-lang-primary',
            headers: ['Content-Type' => '*/*'],
            body: (object) $parsed,
            options: $options,
            convert: null,
        );
    }

    /**
     * @api
     *
     * Partially update the draft version of a website page, specified by page ID. You only need to specify the values for the details that you're modifying.
     *
     * @param array{
     *   id: string,
     *   abStatus: value-of<WebsitePageUpdateDraftParams\AbStatus>,
     *   abTestID: string,
     *   archivedAt: \DateTimeInterface,
     *   archivedInDashboard: bool,
     *   attachedStylesheets: list<array<string,mixed>>,
     *   authorName: string,
     *   campaign: string,
     *   categoryID: int,
     *   contentGroupID: string,
     *   contentTypeCategory: value-of<WebsitePageUpdateDraftParams\ContentTypeCategory>,
     *   created: \DateTimeInterface,
     *   createdByID: string,
     *   currentlyPublished: bool,
     *   currentState: value-of<WebsitePageUpdateDraftParams\CurrentState>,
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
     *   language: value-of<WebsitePageUpdateDraftParams\Language>,
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
     *   translations: array<string,ContentLanguageVariation|ContentLanguageVariationShape>,
     *   updated: \DateTimeInterface,
     *   updatedByID: string,
     *   url: string,
     *   useFeaturedImage: bool,
     *   widgetContainers: array<string,mixed>,
     *   widgets: array<string,mixed>,
     * }|WebsitePageUpdateDraftParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<Page>
     *
     * @throws APIException
     */
    public function updateDraft(
        string $objectID,
        array|WebsitePageUpdateDraftParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = WebsitePageUpdateDraftParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'patch',
            path: ['cms/pages/2026-03/site-pages/%1$s/draft', $objectID],
            headers: ['Content-Type' => '*/*'],
            body: (object) $parsed,
            options: $options,
            convert: Page::class,
        );
    }
}
