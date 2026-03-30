<?php

declare(strict_types=1);

namespace HubspotSDK\Services\Cms\Pages;

use HubspotSDK\Client;
use HubspotSDK\Cms\ContentLanguageVariation;
use HubspotSDK\Cms\Pages\LandingPages\LandingPageCloneParams;
use HubspotSDK\Cms\Pages\LandingPages\LandingPageCreateParams;
use HubspotSDK\Cms\Pages\LandingPages\LandingPageCreateParams\AbStatus;
use HubspotSDK\Cms\Pages\LandingPages\LandingPageCreateParams\ContentTypeCategory;
use HubspotSDK\Cms\Pages\LandingPages\LandingPageCreateParams\CurrentState;
use HubspotSDK\Cms\Pages\LandingPages\LandingPageCreateParams\Language;
use HubspotSDK\Cms\Pages\LandingPages\LandingPageDeleteParams;
use HubspotSDK\Cms\Pages\LandingPages\LandingPageGetParams;
use HubspotSDK\Cms\Pages\LandingPages\LandingPageListParams;
use HubspotSDK\Cms\Pages\LandingPages\LandingPageScheduleParams;
use HubspotSDK\Cms\Pages\LandingPages\LandingPageUpdateDraftParams;
use HubspotSDK\Cms\Pages\LandingPages\LandingPageUpdateParams;
use HubspotSDK\Cms\Pages\Page;
use HubspotSDK\Core\Contracts\BaseResponse;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\RequestOptions;
use HubspotSDK\ServiceContracts\Cms\Pages\LandingPagesRawContract;

/**
 * @phpstan-import-type ContentLanguageVariationShape from \HubspotSDK\Cms\ContentLanguageVariation
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
     * Create a new landing page.
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
     * }|LandingPageCreateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<Page>
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
            path: 'cms/pages/2026-03/landing-pages',
            headers: ['Content-Type' => '*/*'],
            body: (object) $parsed,
            options: $options,
            convert: Page::class,
        );
    }

    /**
     * @api
     *
     * Sparse updates a single Landing Page object identified by the id in the path.
     * You only need to specify the column values that you are modifying.
     *
     * @param string $objectID Path param
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
     *   contentTypeCategory: value-of<LandingPageUpdateParams\ContentTypeCategory>,
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
     *   translations: array<string,ContentLanguageVariation|ContentLanguageVariationShape>,
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
            path: ['cms/pages/2026-03/landing-pages/%1$s', $objectID],
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
            path: 'cms/pages/2026-03/landing-pages',
            query: $parsed,
            options: $options,
            convert: Page::class,
            page: \HubspotSDK\Page::class,
        );
    }

    /**
     * @api
     *
     * Delete a landing page, specified by its ID.
     *
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
            path: ['cms/pages/2026-03/landing-pages/%1$s', $objectID],
            query: $parsed,
            options: $options,
            convert: null,
        );
    }

    /**
     * @api
     *
     * Create a copy of an existing landing page.
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
            path: 'cms/pages/2026-03/landing-pages/clone',
            headers: ['Content-Type' => '*/*'],
            body: (object) $parsed,
            options: $options,
            convert: Page::class,
        );
    }

    /**
     * @api
     *
     * Retrieve a landing page, specified by its ID.
     *
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
            path: ['cms/pages/2026-03/landing-pages/%1$s', $objectID],
            query: $parsed,
            options: $options,
            convert: Page::class,
        );
    }

    /**
     * @api
     *
     * Retrieve the full draft version of a landing page, specified by page ID.
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
            path: ['cms/pages/2026-03/landing-pages/%1$s/draft', $objectID],
            options: $requestOptions,
            convert: Page::class,
        );
    }

    /**
     * @api
     *
     * Take any changes from the draft version of the Landing Page and apply them to the live version.
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
            path: ['cms/pages/2026-03/landing-pages/%1$s/draft/push-live', $objectID],
            options: $requestOptions,
            convert: null,
        );
    }

    /**
     * @api
     *
     * Discards any edits and resets the draft to match the live version.
     *
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
            path: ['cms/pages/2026-03/landing-pages/%1$s/draft/reset', $objectID],
            options: $requestOptions,
            convert: null,
        );
    }

    /**
     * @api
     *
     * Schedule a landing page to be published.
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
            path: 'cms/pages/2026-03/landing-pages/schedule',
            headers: ['Content-Type' => '*/*'],
            body: (object) $parsed,
            options: $options,
            convert: null,
        );
    }

    /**
     * @api
     *
     * Partially updates the draft version of a single landing page, specified by its ID. You only need to specify the column values that you are modifying.
     *
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
     *   contentTypeCategory: value-of<LandingPageUpdateDraftParams\ContentTypeCategory>,
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
     *   translations: array<string,ContentLanguageVariation|ContentLanguageVariationShape>,
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
            path: ['cms/pages/2026-03/landing-pages/%1$s/draft', $objectID],
            headers: ['Content-Type' => '*/*'],
            body: (object) $parsed,
            options: $options,
            convert: Page::class,
        );
    }
}
