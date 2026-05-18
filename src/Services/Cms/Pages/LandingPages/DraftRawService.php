<?php

declare(strict_types=1);

namespace HubSpotSDK\Services\Cms\Pages\LandingPages;

use HubSpotSDK\Client;
use HubSpotSDK\Cms\ContentLanguageVariation;
use HubSpotSDK\Cms\Pages\LandingPages\Draft\DraftUpdateParams;
use HubSpotSDK\Cms\Pages\LandingPages\Draft\DraftUpdateParams\AbStatus;
use HubSpotSDK\Cms\Pages\LandingPages\Draft\DraftUpdateParams\ContentTypeCategory;
use HubSpotSDK\Cms\Pages\LandingPages\Draft\DraftUpdateParams\CurrentState;
use HubSpotSDK\Cms\Pages\LandingPages\Draft\DraftUpdateParams\Language;
use HubSpotSDK\Cms\Pages\PagesPage;
use HubSpotSDK\Core\Contracts\BaseResponse;
use HubSpotSDK\Core\Exceptions\APIException;
use HubSpotSDK\RequestOptions;
use HubSpotSDK\ServiceContracts\Cms\Pages\LandingPages\DraftRawContract;

/**
 * @phpstan-import-type ContentLanguageVariationShape from \HubSpotSDK\Cms\ContentLanguageVariation
 * @phpstan-import-type RequestOpts from \HubSpotSDK\RequestOptions
 */
final class DraftRawService implements DraftRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Partially updates the draft version of a single landing page, specified by its ID. You only need to specify the column values that you are modifying.
     *
     * @param string $objectID the unique identifier of the landing page draft to update
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
     * }|DraftUpdateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<PagesPage>
     *
     * @throws APIException
     */
    public function update(
        string $objectID,
        array|DraftUpdateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = DraftUpdateParams::parseRequest(
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
            convert: PagesPage::class,
        );
    }

    /**
     * @api
     *
     * Retrieve the full draft version of a landing page, specified by page ID.
     *
     * @param string $objectID the unique identifier of the landing page whose draft version is to be retrieved
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<PagesPage>
     *
     * @throws APIException
     */
    public function get(
        string $objectID,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['cms/pages/2026-03/landing-pages/%1$s/draft', $objectID],
            options: $requestOptions,
            convert: PagesPage::class,
        );
    }

    /**
     * @api
     *
     * Take any changes from the draft version of the Landing Page and apply them to the live version.
     *
     * @param string $objectID the unique identifier of the landing page draft to be published
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function pushLive(
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
     * @param string $objectID the unique identifier of the landing page whose draft is to be reset
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function reset(
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
}
