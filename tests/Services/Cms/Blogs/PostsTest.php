<?php

namespace Tests\Services\Cms\Blogs;

use HubspotSDK\Client;
use HubspotSDK\Cms\Blogs\Posts\Angle;
use HubspotSDK\Cms\Blogs\Posts\BackgroundImage;
use HubspotSDK\Cms\Blogs\Posts\BreakpointStyles;
use HubspotSDK\Cms\Blogs\Posts\ColorStop;
use HubspotSDK\Cms\Blogs\Posts\ContentLanguageVariation;
use HubspotSDK\Cms\Blogs\Posts\Gradient;
use HubspotSDK\Cms\Blogs\Posts\LayoutSection;
use HubspotSDK\Cms\Blogs\Posts\RgbaColor;
use HubspotSDK\Cms\Blogs\Posts\RowMetaData;
use HubspotSDK\Cms\Blogs\Posts\SideOrCorner;
use HubspotSDK\Cms\Blogs\Posts\Styles;
use PHPUnit\Framework\Attributes\CoversNothing;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Tests\UnsupportedMockTests;

/**
 * @internal
 */
#[CoversNothing]
final class PostsTest extends TestCase
{
    protected Client $client;

    protected function setUp(): void
    {
        parent::setUp();

        $testUrl = getenv('TEST_API_BASE_URL') ?: 'http://127.0.0.1:4010';
        $client = new Client(
            accessToken: 'pat-na1-xxxxxxxx-xxxx-xxxx-xxxx-xxxxxxxxxxxx',
            baseUrl: $testUrl,
        );

        $this->client = $client;
    }

    #[Test]
    public function testCreate(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->cms->blogs->posts->create(
            id: 'id',
            abStatus: 'master',
            abTestID: 'abTestId',
            archivedAt: 0,
            archivedInDashboard: true,
            attachedStylesheets: [['foo' => (object) []]],
            authorName: 'authorName',
            blogAuthorID: 'blogAuthorId',
            campaign: 'campaign',
            categoryID: 0,
            contentGroupID: 'contentGroupId',
            contentTypeCategory: '0',
            created: new \DateTimeImmutable('2019-12-27T18:11:19.117Z'),
            createdByID: 'createdById',
            currentlyPublished: true,
            currentState: 'AUTOMATED',
            domain: 'domain',
            dynamicPageDataSourceID: 'dynamicPageDataSourceId',
            dynamicPageDataSourceType: 0,
            dynamicPageHubDBTableID: 'dynamicPageHubDbTableId',
            enableDomainStylesheets: true,
            enableGoogleAmpOutputOverride: true,
            enableLayoutStylesheets: true,
            featuredImage: 'featuredImage',
            featuredImageAltText: 'featuredImageAltText',
            folderID: 'folderId',
            footerHTML: 'footerHtml',
            headHTML: 'headHtml',
            htmlTitle: 'htmlTitle',
            includeDefaultCustomCss: true,
            language: 'af',
            layoutSections: [
                'foo' => LayoutSection::with(
                    cells: [],
                    cssClass: 'cssClass',
                    cssID: 'cssId',
                    cssStyle: 'cssStyle',
                    label: 'label',
                    name: 'name',
                    params: ['foo' => (object) []],
                    rowMetaData: [
                        RowMetaData::with(
                            cssClass: 'cssClass',
                            styles: Styles::with(
                                backgroundColor: RgbaColor::with(a: 0, b: 0, g: 0, r: 0),
                                backgroundGradient: Gradient::with(
                                    angle: Angle::with(units: 'units', value: 0),
                                    colors: [
                                        ColorStop::with(
                                            color: RgbaColor::with(a: 0, b: 0, g: 0, r: 0)
                                        ),
                                    ],
                                    sideOrCorner: SideOrCorner::with(
                                        horizontalSide: 'horizontalSide',
                                        verticalSide: 'verticalSide',
                                    ),
                                ),
                                backgroundImage: BackgroundImage::with(
                                    backgroundPosition: 'backgroundPosition',
                                    backgroundSize: 'backgroundSize',
                                    imageURL: 'imageUrl',
                                ),
                                flexboxPositioning: 'flexboxPositioning',
                                forceFullWidthSection: true,
                                maxWidthSectionCentering: 0,
                                verticalAlignment: 'verticalAlignment',
                            ),
                        ),
                    ],
                    rows: [(object) []],
                    styles: Styles::with(
                        backgroundColor: RgbaColor::with(a: 0, b: 0, g: 0, r: 0),
                        backgroundGradient: Gradient::with(
                            angle: Angle::with(units: 'units', value: 0),
                            colors: [
                                ColorStop::with(color: RgbaColor::with(a: 0, b: 0, g: 0, r: 0)),
                            ],
                            sideOrCorner: SideOrCorner::with(
                                horizontalSide: 'horizontalSide',
                                verticalSide: 'verticalSide'
                            ),
                        ),
                        backgroundImage: BackgroundImage::with(
                            backgroundPosition: 'backgroundPosition',
                            backgroundSize: 'backgroundSize',
                            imageURL: 'imageUrl',
                        ),
                        flexboxPositioning: 'flexboxPositioning',
                        forceFullWidthSection: true,
                        maxWidthSectionCentering: 0,
                        verticalAlignment: 'verticalAlignment',
                    ),
                    type: 'type',
                    w: 0,
                    x: 0,
                ),
            ],
            linkRelCanonicalURL: 'linkRelCanonicalUrl',
            mabExperimentID: 'mabExperimentId',
            metaDescription: 'metaDescription',
            name: 'name',
            pageExpiryDate: 0,
            pageExpiryEnabled: true,
            pageExpiryRedirectID: 0,
            pageExpiryRedirectURL: 'pageExpiryRedirectUrl',
            password: 'password',
            postBody: 'postBody',
            postSummary: 'postSummary',
            publicAccessRules: [(object) []],
            publicAccessRulesEnabled: true,
            publishDate: new \DateTimeImmutable('2019-12-27T18:11:19.117Z'),
            publishImmediately: true,
            rssBody: 'rssBody',
            rssSummary: 'rssSummary',
            slug: 'slug',
            state: 'state',
            tagIDs: [0],
            themeSettingsValues: ['foo' => (object) []],
            translatedFromID: 'translatedFromId',
            translations: [
                'foo' => ContentLanguageVariation::with(
                    id: 0,
                    archivedInDashboard: true,
                    authorName: 'authorName',
                    campaign: 'campaign',
                    campaignName: 'campaignName',
                    created: new \DateTimeImmutable('2019-12-27T18:11:19.117Z'),
                    name: 'name',
                    password: 'password',
                    publicAccessRules: [(object) []],
                    publicAccessRulesEnabled: true,
                    publishDate: new \DateTimeImmutable('2019-12-27T18:11:19.117Z'),
                    slug: 'slug',
                    state: 'state',
                    updated: new \DateTimeImmutable('2019-12-27T18:11:19.117Z'),
                ),
            ],
            updated: new \DateTimeImmutable('2019-12-27T18:11:19.117Z'),
            updatedByID: 'updatedById',
            url: 'url',
            useFeaturedImage: true,
            widgetContainers: ['foo' => (object) []],
            widgets: ['foo' => (object) []],
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testCreateWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->cms->blogs->posts->create(
            id: 'id',
            abStatus: 'master',
            abTestID: 'abTestId',
            archivedAt: 0,
            archivedInDashboard: true,
            attachedStylesheets: [['foo' => (object) []]],
            authorName: 'authorName',
            blogAuthorID: 'blogAuthorId',
            campaign: 'campaign',
            categoryID: 0,
            contentGroupID: 'contentGroupId',
            contentTypeCategory: '0',
            created: new \DateTimeImmutable('2019-12-27T18:11:19.117Z'),
            createdByID: 'createdById',
            currentlyPublished: true,
            currentState: 'AUTOMATED',
            domain: 'domain',
            dynamicPageDataSourceID: 'dynamicPageDataSourceId',
            dynamicPageDataSourceType: 0,
            dynamicPageHubDBTableID: 'dynamicPageHubDbTableId',
            enableDomainStylesheets: true,
            enableGoogleAmpOutputOverride: true,
            enableLayoutStylesheets: true,
            featuredImage: 'featuredImage',
            featuredImageAltText: 'featuredImageAltText',
            folderID: 'folderId',
            footerHTML: 'footerHtml',
            headHTML: 'headHtml',
            htmlTitle: 'htmlTitle',
            includeDefaultCustomCss: true,
            language: 'af',
            layoutSections: [
                'foo' => LayoutSection::with(
                    cells: [],
                    cssClass: 'cssClass',
                    cssID: 'cssId',
                    cssStyle: 'cssStyle',
                    label: 'label',
                    name: 'name',
                    params: ['foo' => (object) []],
                    rowMetaData: [
                        RowMetaData::with(
                            cssClass: 'cssClass',
                            styles: Styles::with(
                                backgroundColor: RgbaColor::with(a: 0, b: 0, g: 0, r: 0),
                                backgroundGradient: Gradient::with(
                                    angle: Angle::with(units: 'units', value: 0),
                                    colors: [
                                        ColorStop::with(
                                            color: RgbaColor::with(a: 0, b: 0, g: 0, r: 0)
                                        ),
                                    ],
                                    sideOrCorner: SideOrCorner::with(
                                        horizontalSide: 'horizontalSide',
                                        verticalSide: 'verticalSide',
                                    ),
                                ),
                                backgroundImage: BackgroundImage::with(
                                    backgroundPosition: 'backgroundPosition',
                                    backgroundSize: 'backgroundSize',
                                    imageURL: 'imageUrl',
                                ),
                                flexboxPositioning: 'flexboxPositioning',
                                forceFullWidthSection: true,
                                maxWidthSectionCentering: 0,
                                verticalAlignment: 'verticalAlignment',
                            )
                                ->withBreakpointStyles(
                                    [
                                        'foo' => BreakpointStyles::with(
                                            hidden: true,
                                            margin: (object) [],
                                            padding: (object) []
                                        ),
                                    ],
                                ),
                        ),
                    ],
                    rows: [(object) []],
                    styles: Styles::with(
                        backgroundColor: RgbaColor::with(a: 0, b: 0, g: 0, r: 0),
                        backgroundGradient: Gradient::with(
                            angle: Angle::with(units: 'units', value: 0),
                            colors: [
                                ColorStop::with(color: RgbaColor::with(a: 0, b: 0, g: 0, r: 0)),
                            ],
                            sideOrCorner: SideOrCorner::with(
                                horizontalSide: 'horizontalSide',
                                verticalSide: 'verticalSide'
                            ),
                        ),
                        backgroundImage: BackgroundImage::with(
                            backgroundPosition: 'backgroundPosition',
                            backgroundSize: 'backgroundSize',
                            imageURL: 'imageUrl',
                        ),
                        flexboxPositioning: 'flexboxPositioning',
                        forceFullWidthSection: true,
                        maxWidthSectionCentering: 0,
                        verticalAlignment: 'verticalAlignment',
                    )
                        ->withBreakpointStyles(
                            [
                                'foo' => BreakpointStyles::with(
                                    hidden: true,
                                    margin: (object) [],
                                    padding: (object) []
                                ),
                            ],
                        ),
                    type: 'type',
                    w: 0,
                    x: 0,
                ),
            ],
            linkRelCanonicalURL: 'linkRelCanonicalUrl',
            mabExperimentID: 'mabExperimentId',
            metaDescription: 'metaDescription',
            name: 'name',
            pageExpiryDate: 0,
            pageExpiryEnabled: true,
            pageExpiryRedirectID: 0,
            pageExpiryRedirectURL: 'pageExpiryRedirectUrl',
            password: 'password',
            postBody: 'postBody',
            postSummary: 'postSummary',
            publicAccessRules: [(object) []],
            publicAccessRulesEnabled: true,
            publishDate: new \DateTimeImmutable('2019-12-27T18:11:19.117Z'),
            publishImmediately: true,
            rssBody: 'rssBody',
            rssSummary: 'rssSummary',
            slug: 'slug',
            state: 'state',
            tagIDs: [0],
            themeSettingsValues: ['foo' => (object) []],
            translatedFromID: 'translatedFromId',
            translations: [
                'foo' => ContentLanguageVariation::with(
                    id: 0,
                    archivedInDashboard: true,
                    authorName: 'authorName',
                    campaign: 'campaign',
                    campaignName: 'campaignName',
                    created: new \DateTimeImmutable('2019-12-27T18:11:19.117Z'),
                    name: 'name',
                    password: 'password',
                    publicAccessRules: [(object) []],
                    publicAccessRulesEnabled: true,
                    publishDate: new \DateTimeImmutable('2019-12-27T18:11:19.117Z'),
                    slug: 'slug',
                    state: 'state',
                    updated: new \DateTimeImmutable('2019-12-27T18:11:19.117Z'),
                )
                    ->withTagIDs([0]),
            ],
            updated: new \DateTimeImmutable('2019-12-27T18:11:19.117Z'),
            updatedByID: 'updatedById',
            url: 'url',
            useFeaturedImage: true,
            widgetContainers: ['foo' => (object) []],
            widgets: ['foo' => (object) []],
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testUpdate(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->cms->blogs->posts->update(
            'objectId',
            id: 'id',
            abStatus: 'master',
            abTestID: 'abTestId',
            archivedAt: 0,
            archivedInDashboard: true,
            attachedStylesheets: [['foo' => (object) []]],
            authorName: 'authorName',
            blogAuthorID: 'blogAuthorId',
            campaign: 'campaign',
            categoryID: 0,
            contentGroupID: 'contentGroupId',
            contentTypeCategory: '0',
            created: new \DateTimeImmutable('2019-12-27T18:11:19.117Z'),
            createdByID: 'createdById',
            currentlyPublished: true,
            currentState: 'AUTOMATED',
            domain: 'domain',
            dynamicPageDataSourceID: 'dynamicPageDataSourceId',
            dynamicPageDataSourceType: 0,
            dynamicPageHubDBTableID: 'dynamicPageHubDbTableId',
            enableDomainStylesheets: true,
            enableGoogleAmpOutputOverride: true,
            enableLayoutStylesheets: true,
            featuredImage: 'featuredImage',
            featuredImageAltText: 'featuredImageAltText',
            folderID: 'folderId',
            footerHTML: 'footerHtml',
            headHTML: 'headHtml',
            htmlTitle: 'htmlTitle',
            includeDefaultCustomCss: true,
            language: 'af',
            layoutSections: [
                'foo' => LayoutSection::with(
                    cells: [],
                    cssClass: 'cssClass',
                    cssID: 'cssId',
                    cssStyle: 'cssStyle',
                    label: 'label',
                    name: 'name',
                    params: ['foo' => (object) []],
                    rowMetaData: [
                        RowMetaData::with(
                            cssClass: 'cssClass',
                            styles: Styles::with(
                                backgroundColor: RgbaColor::with(a: 0, b: 0, g: 0, r: 0),
                                backgroundGradient: Gradient::with(
                                    angle: Angle::with(units: 'units', value: 0),
                                    colors: [
                                        ColorStop::with(
                                            color: RgbaColor::with(a: 0, b: 0, g: 0, r: 0)
                                        ),
                                    ],
                                    sideOrCorner: SideOrCorner::with(
                                        horizontalSide: 'horizontalSide',
                                        verticalSide: 'verticalSide',
                                    ),
                                ),
                                backgroundImage: BackgroundImage::with(
                                    backgroundPosition: 'backgroundPosition',
                                    backgroundSize: 'backgroundSize',
                                    imageURL: 'imageUrl',
                                ),
                                flexboxPositioning: 'flexboxPositioning',
                                forceFullWidthSection: true,
                                maxWidthSectionCentering: 0,
                                verticalAlignment: 'verticalAlignment',
                            ),
                        ),
                    ],
                    rows: [(object) []],
                    styles: Styles::with(
                        backgroundColor: RgbaColor::with(a: 0, b: 0, g: 0, r: 0),
                        backgroundGradient: Gradient::with(
                            angle: Angle::with(units: 'units', value: 0),
                            colors: [
                                ColorStop::with(color: RgbaColor::with(a: 0, b: 0, g: 0, r: 0)),
                            ],
                            sideOrCorner: SideOrCorner::with(
                                horizontalSide: 'horizontalSide',
                                verticalSide: 'verticalSide'
                            ),
                        ),
                        backgroundImage: BackgroundImage::with(
                            backgroundPosition: 'backgroundPosition',
                            backgroundSize: 'backgroundSize',
                            imageURL: 'imageUrl',
                        ),
                        flexboxPositioning: 'flexboxPositioning',
                        forceFullWidthSection: true,
                        maxWidthSectionCentering: 0,
                        verticalAlignment: 'verticalAlignment',
                    ),
                    type: 'type',
                    w: 0,
                    x: 0,
                ),
            ],
            linkRelCanonicalURL: 'linkRelCanonicalUrl',
            mabExperimentID: 'mabExperimentId',
            metaDescription: 'metaDescription',
            name: 'name',
            pageExpiryDate: 0,
            pageExpiryEnabled: true,
            pageExpiryRedirectID: 0,
            pageExpiryRedirectURL: 'pageExpiryRedirectUrl',
            password: 'password',
            postBody: 'postBody',
            postSummary: 'postSummary',
            publicAccessRules: [(object) []],
            publicAccessRulesEnabled: true,
            publishDate: new \DateTimeImmutable('2019-12-27T18:11:19.117Z'),
            publishImmediately: true,
            rssBody: 'rssBody',
            rssSummary: 'rssSummary',
            slug: 'slug',
            state: 'state',
            tagIDs: [0],
            themeSettingsValues: ['foo' => (object) []],
            translatedFromID: 'translatedFromId',
            translations: [
                'foo' => ContentLanguageVariation::with(
                    id: 0,
                    archivedInDashboard: true,
                    authorName: 'authorName',
                    campaign: 'campaign',
                    campaignName: 'campaignName',
                    created: new \DateTimeImmutable('2019-12-27T18:11:19.117Z'),
                    name: 'name',
                    password: 'password',
                    publicAccessRules: [(object) []],
                    publicAccessRulesEnabled: true,
                    publishDate: new \DateTimeImmutable('2019-12-27T18:11:19.117Z'),
                    slug: 'slug',
                    state: 'state',
                    updated: new \DateTimeImmutable('2019-12-27T18:11:19.117Z'),
                ),
            ],
            updated: new \DateTimeImmutable('2019-12-27T18:11:19.117Z'),
            updatedByID: 'updatedById',
            url: 'url',
            useFeaturedImage: true,
            widgetContainers: ['foo' => (object) []],
            widgets: ['foo' => (object) []],
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testUpdateWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->cms->blogs->posts->update(
            'objectId',
            id: 'id',
            abStatus: 'master',
            abTestID: 'abTestId',
            archivedAt: 0,
            archivedInDashboard: true,
            attachedStylesheets: [['foo' => (object) []]],
            authorName: 'authorName',
            blogAuthorID: 'blogAuthorId',
            campaign: 'campaign',
            categoryID: 0,
            contentGroupID: 'contentGroupId',
            contentTypeCategory: '0',
            created: new \DateTimeImmutable('2019-12-27T18:11:19.117Z'),
            createdByID: 'createdById',
            currentlyPublished: true,
            currentState: 'AUTOMATED',
            domain: 'domain',
            dynamicPageDataSourceID: 'dynamicPageDataSourceId',
            dynamicPageDataSourceType: 0,
            dynamicPageHubDBTableID: 'dynamicPageHubDbTableId',
            enableDomainStylesheets: true,
            enableGoogleAmpOutputOverride: true,
            enableLayoutStylesheets: true,
            featuredImage: 'featuredImage',
            featuredImageAltText: 'featuredImageAltText',
            folderID: 'folderId',
            footerHTML: 'footerHtml',
            headHTML: 'headHtml',
            htmlTitle: 'htmlTitle',
            includeDefaultCustomCss: true,
            language: 'af',
            layoutSections: [
                'foo' => LayoutSection::with(
                    cells: [],
                    cssClass: 'cssClass',
                    cssID: 'cssId',
                    cssStyle: 'cssStyle',
                    label: 'label',
                    name: 'name',
                    params: ['foo' => (object) []],
                    rowMetaData: [
                        RowMetaData::with(
                            cssClass: 'cssClass',
                            styles: Styles::with(
                                backgroundColor: RgbaColor::with(a: 0, b: 0, g: 0, r: 0),
                                backgroundGradient: Gradient::with(
                                    angle: Angle::with(units: 'units', value: 0),
                                    colors: [
                                        ColorStop::with(
                                            color: RgbaColor::with(a: 0, b: 0, g: 0, r: 0)
                                        ),
                                    ],
                                    sideOrCorner: SideOrCorner::with(
                                        horizontalSide: 'horizontalSide',
                                        verticalSide: 'verticalSide',
                                    ),
                                ),
                                backgroundImage: BackgroundImage::with(
                                    backgroundPosition: 'backgroundPosition',
                                    backgroundSize: 'backgroundSize',
                                    imageURL: 'imageUrl',
                                ),
                                flexboxPositioning: 'flexboxPositioning',
                                forceFullWidthSection: true,
                                maxWidthSectionCentering: 0,
                                verticalAlignment: 'verticalAlignment',
                            )
                                ->withBreakpointStyles(
                                    [
                                        'foo' => BreakpointStyles::with(
                                            hidden: true,
                                            margin: (object) [],
                                            padding: (object) []
                                        ),
                                    ],
                                ),
                        ),
                    ],
                    rows: [(object) []],
                    styles: Styles::with(
                        backgroundColor: RgbaColor::with(a: 0, b: 0, g: 0, r: 0),
                        backgroundGradient: Gradient::with(
                            angle: Angle::with(units: 'units', value: 0),
                            colors: [
                                ColorStop::with(color: RgbaColor::with(a: 0, b: 0, g: 0, r: 0)),
                            ],
                            sideOrCorner: SideOrCorner::with(
                                horizontalSide: 'horizontalSide',
                                verticalSide: 'verticalSide'
                            ),
                        ),
                        backgroundImage: BackgroundImage::with(
                            backgroundPosition: 'backgroundPosition',
                            backgroundSize: 'backgroundSize',
                            imageURL: 'imageUrl',
                        ),
                        flexboxPositioning: 'flexboxPositioning',
                        forceFullWidthSection: true,
                        maxWidthSectionCentering: 0,
                        verticalAlignment: 'verticalAlignment',
                    )
                        ->withBreakpointStyles(
                            [
                                'foo' => BreakpointStyles::with(
                                    hidden: true,
                                    margin: (object) [],
                                    padding: (object) []
                                ),
                            ],
                        ),
                    type: 'type',
                    w: 0,
                    x: 0,
                ),
            ],
            linkRelCanonicalURL: 'linkRelCanonicalUrl',
            mabExperimentID: 'mabExperimentId',
            metaDescription: 'metaDescription',
            name: 'name',
            pageExpiryDate: 0,
            pageExpiryEnabled: true,
            pageExpiryRedirectID: 0,
            pageExpiryRedirectURL: 'pageExpiryRedirectUrl',
            password: 'password',
            postBody: 'postBody',
            postSummary: 'postSummary',
            publicAccessRules: [(object) []],
            publicAccessRulesEnabled: true,
            publishDate: new \DateTimeImmutable('2019-12-27T18:11:19.117Z'),
            publishImmediately: true,
            rssBody: 'rssBody',
            rssSummary: 'rssSummary',
            slug: 'slug',
            state: 'state',
            tagIDs: [0],
            themeSettingsValues: ['foo' => (object) []],
            translatedFromID: 'translatedFromId',
            translations: [
                'foo' => ContentLanguageVariation::with(
                    id: 0,
                    archivedInDashboard: true,
                    authorName: 'authorName',
                    campaign: 'campaign',
                    campaignName: 'campaignName',
                    created: new \DateTimeImmutable('2019-12-27T18:11:19.117Z'),
                    name: 'name',
                    password: 'password',
                    publicAccessRules: [(object) []],
                    publicAccessRulesEnabled: true,
                    publishDate: new \DateTimeImmutable('2019-12-27T18:11:19.117Z'),
                    slug: 'slug',
                    state: 'state',
                    updated: new \DateTimeImmutable('2019-12-27T18:11:19.117Z'),
                )
                    ->withTagIDs([0]),
            ],
            updated: new \DateTimeImmutable('2019-12-27T18:11:19.117Z'),
            updatedByID: 'updatedById',
            url: 'url',
            useFeaturedImage: true,
            widgetContainers: ['foo' => (object) []],
            widgets: ['foo' => (object) []],
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testList(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->cms->blogs->posts->list();

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testDelete(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->cms->blogs->posts->delete('objectId');

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testAttachToLangGroup(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->cms->blogs->posts->attachToLangGroup(
            id: 'id',
            language: 'af',
            primaryID: 'primaryId'
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testAttachToLangGroupWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->cms->blogs->posts->attachToLangGroup(
            id: 'id',
            language: 'af',
            primaryID: 'primaryId'
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testClone(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->cms->blogs->posts->clone(id: 'id');

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testCloneWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->cms->blogs->posts->clone(id: 'id');

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testCreateLangVariation(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->cms->blogs->posts->createLangVariation(id: 'id');

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testCreateLangVariationWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->cms->blogs->posts->createLangVariation(id: 'id');

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testDetachFromLangGroup(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->cms->blogs->posts->detachFromLangGroup('id');

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testDetachFromLangGroupWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->cms->blogs->posts->detachFromLangGroup('id');

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testGetDraftByID(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->cms->blogs->posts->getDraftByID('objectId');

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testGetPreviousVersion(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->cms->blogs->posts->getPreviousVersion(
            'revisionId',
            'objectId'
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testGetPreviousVersionWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->cms->blogs->posts->getPreviousVersion(
            'revisionId',
            'objectId'
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testGetPreviousVersions(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->cms->blogs->posts->getPreviousVersions('objectId');

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testPushLive(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->cms->blogs->posts->pushLive('objectId');

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testRead(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->cms->blogs->posts->read('objectId');

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testResetDraft(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->cms->blogs->posts->resetDraft('objectId');

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testRestorePreviousVersion(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->cms->blogs->posts->restorePreviousVersion(
            'revisionId',
            'objectId'
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testRestorePreviousVersionWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->cms->blogs->posts->restorePreviousVersion(
            'revisionId',
            'objectId'
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testRestorePreviousVersionToDraft(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->cms->blogs->posts->restorePreviousVersionToDraft(
            0,
            'objectId'
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testRestorePreviousVersionToDraftWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->cms->blogs->posts->restorePreviousVersionToDraft(
            0,
            'objectId'
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testSchedule(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->cms->blogs->posts->schedule(
            id: 'id',
            publishDate: new \DateTimeImmutable('2019-12-27T18:11:19.117Z')
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testScheduleWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->cms->blogs->posts->schedule(
            id: 'id',
            publishDate: new \DateTimeImmutable('2019-12-27T18:11:19.117Z')
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testSetLangPrimary(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->cms->blogs->posts->setLangPrimary('id');

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testSetLangPrimaryWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->cms->blogs->posts->setLangPrimary('id');

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testUpdateDraft(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->cms->blogs->posts->updateDraft(
            'objectId',
            id: 'id',
            abStatus: 'master',
            abTestID: 'abTestId',
            archivedAt: 0,
            archivedInDashboard: true,
            attachedStylesheets: [['foo' => (object) []]],
            authorName: 'authorName',
            blogAuthorID: 'blogAuthorId',
            campaign: 'campaign',
            categoryID: 0,
            contentGroupID: 'contentGroupId',
            contentTypeCategory: '0',
            created: new \DateTimeImmutable('2019-12-27T18:11:19.117Z'),
            createdByID: 'createdById',
            currentlyPublished: true,
            currentState: 'AUTOMATED',
            domain: 'domain',
            dynamicPageDataSourceID: 'dynamicPageDataSourceId',
            dynamicPageDataSourceType: 0,
            dynamicPageHubDBTableID: 'dynamicPageHubDbTableId',
            enableDomainStylesheets: true,
            enableGoogleAmpOutputOverride: true,
            enableLayoutStylesheets: true,
            featuredImage: 'featuredImage',
            featuredImageAltText: 'featuredImageAltText',
            folderID: 'folderId',
            footerHTML: 'footerHtml',
            headHTML: 'headHtml',
            htmlTitle: 'htmlTitle',
            includeDefaultCustomCss: true,
            language: 'af',
            layoutSections: [
                'foo' => LayoutSection::with(
                    cells: [],
                    cssClass: 'cssClass',
                    cssID: 'cssId',
                    cssStyle: 'cssStyle',
                    label: 'label',
                    name: 'name',
                    params: ['foo' => (object) []],
                    rowMetaData: [
                        RowMetaData::with(
                            cssClass: 'cssClass',
                            styles: Styles::with(
                                backgroundColor: RgbaColor::with(a: 0, b: 0, g: 0, r: 0),
                                backgroundGradient: Gradient::with(
                                    angle: Angle::with(units: 'units', value: 0),
                                    colors: [
                                        ColorStop::with(
                                            color: RgbaColor::with(a: 0, b: 0, g: 0, r: 0)
                                        ),
                                    ],
                                    sideOrCorner: SideOrCorner::with(
                                        horizontalSide: 'horizontalSide',
                                        verticalSide: 'verticalSide',
                                    ),
                                ),
                                backgroundImage: BackgroundImage::with(
                                    backgroundPosition: 'backgroundPosition',
                                    backgroundSize: 'backgroundSize',
                                    imageURL: 'imageUrl',
                                ),
                                flexboxPositioning: 'flexboxPositioning',
                                forceFullWidthSection: true,
                                maxWidthSectionCentering: 0,
                                verticalAlignment: 'verticalAlignment',
                            ),
                        ),
                    ],
                    rows: [(object) []],
                    styles: Styles::with(
                        backgroundColor: RgbaColor::with(a: 0, b: 0, g: 0, r: 0),
                        backgroundGradient: Gradient::with(
                            angle: Angle::with(units: 'units', value: 0),
                            colors: [
                                ColorStop::with(color: RgbaColor::with(a: 0, b: 0, g: 0, r: 0)),
                            ],
                            sideOrCorner: SideOrCorner::with(
                                horizontalSide: 'horizontalSide',
                                verticalSide: 'verticalSide'
                            ),
                        ),
                        backgroundImage: BackgroundImage::with(
                            backgroundPosition: 'backgroundPosition',
                            backgroundSize: 'backgroundSize',
                            imageURL: 'imageUrl',
                        ),
                        flexboxPositioning: 'flexboxPositioning',
                        forceFullWidthSection: true,
                        maxWidthSectionCentering: 0,
                        verticalAlignment: 'verticalAlignment',
                    ),
                    type: 'type',
                    w: 0,
                    x: 0,
                ),
            ],
            linkRelCanonicalURL: 'linkRelCanonicalUrl',
            mabExperimentID: 'mabExperimentId',
            metaDescription: 'metaDescription',
            name: 'name',
            pageExpiryDate: 0,
            pageExpiryEnabled: true,
            pageExpiryRedirectID: 0,
            pageExpiryRedirectURL: 'pageExpiryRedirectUrl',
            password: 'password',
            postBody: 'postBody',
            postSummary: 'postSummary',
            publicAccessRules: [(object) []],
            publicAccessRulesEnabled: true,
            publishDate: new \DateTimeImmutable('2019-12-27T18:11:19.117Z'),
            publishImmediately: true,
            rssBody: 'rssBody',
            rssSummary: 'rssSummary',
            slug: 'slug',
            state: 'state',
            tagIDs: [0],
            themeSettingsValues: ['foo' => (object) []],
            translatedFromID: 'translatedFromId',
            translations: [
                'foo' => ContentLanguageVariation::with(
                    id: 0,
                    archivedInDashboard: true,
                    authorName: 'authorName',
                    campaign: 'campaign',
                    campaignName: 'campaignName',
                    created: new \DateTimeImmutable('2019-12-27T18:11:19.117Z'),
                    name: 'name',
                    password: 'password',
                    publicAccessRules: [(object) []],
                    publicAccessRulesEnabled: true,
                    publishDate: new \DateTimeImmutable('2019-12-27T18:11:19.117Z'),
                    slug: 'slug',
                    state: 'state',
                    updated: new \DateTimeImmutable('2019-12-27T18:11:19.117Z'),
                ),
            ],
            updated: new \DateTimeImmutable('2019-12-27T18:11:19.117Z'),
            updatedByID: 'updatedById',
            url: 'url',
            useFeaturedImage: true,
            widgetContainers: ['foo' => (object) []],
            widgets: ['foo' => (object) []],
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testUpdateDraftWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->cms->blogs->posts->updateDraft(
            'objectId',
            id: 'id',
            abStatus: 'master',
            abTestID: 'abTestId',
            archivedAt: 0,
            archivedInDashboard: true,
            attachedStylesheets: [['foo' => (object) []]],
            authorName: 'authorName',
            blogAuthorID: 'blogAuthorId',
            campaign: 'campaign',
            categoryID: 0,
            contentGroupID: 'contentGroupId',
            contentTypeCategory: '0',
            created: new \DateTimeImmutable('2019-12-27T18:11:19.117Z'),
            createdByID: 'createdById',
            currentlyPublished: true,
            currentState: 'AUTOMATED',
            domain: 'domain',
            dynamicPageDataSourceID: 'dynamicPageDataSourceId',
            dynamicPageDataSourceType: 0,
            dynamicPageHubDBTableID: 'dynamicPageHubDbTableId',
            enableDomainStylesheets: true,
            enableGoogleAmpOutputOverride: true,
            enableLayoutStylesheets: true,
            featuredImage: 'featuredImage',
            featuredImageAltText: 'featuredImageAltText',
            folderID: 'folderId',
            footerHTML: 'footerHtml',
            headHTML: 'headHtml',
            htmlTitle: 'htmlTitle',
            includeDefaultCustomCss: true,
            language: 'af',
            layoutSections: [
                'foo' => LayoutSection::with(
                    cells: [],
                    cssClass: 'cssClass',
                    cssID: 'cssId',
                    cssStyle: 'cssStyle',
                    label: 'label',
                    name: 'name',
                    params: ['foo' => (object) []],
                    rowMetaData: [
                        RowMetaData::with(
                            cssClass: 'cssClass',
                            styles: Styles::with(
                                backgroundColor: RgbaColor::with(a: 0, b: 0, g: 0, r: 0),
                                backgroundGradient: Gradient::with(
                                    angle: Angle::with(units: 'units', value: 0),
                                    colors: [
                                        ColorStop::with(
                                            color: RgbaColor::with(a: 0, b: 0, g: 0, r: 0)
                                        ),
                                    ],
                                    sideOrCorner: SideOrCorner::with(
                                        horizontalSide: 'horizontalSide',
                                        verticalSide: 'verticalSide',
                                    ),
                                ),
                                backgroundImage: BackgroundImage::with(
                                    backgroundPosition: 'backgroundPosition',
                                    backgroundSize: 'backgroundSize',
                                    imageURL: 'imageUrl',
                                ),
                                flexboxPositioning: 'flexboxPositioning',
                                forceFullWidthSection: true,
                                maxWidthSectionCentering: 0,
                                verticalAlignment: 'verticalAlignment',
                            )
                                ->withBreakpointStyles(
                                    [
                                        'foo' => BreakpointStyles::with(
                                            hidden: true,
                                            margin: (object) [],
                                            padding: (object) []
                                        ),
                                    ],
                                ),
                        ),
                    ],
                    rows: [(object) []],
                    styles: Styles::with(
                        backgroundColor: RgbaColor::with(a: 0, b: 0, g: 0, r: 0),
                        backgroundGradient: Gradient::with(
                            angle: Angle::with(units: 'units', value: 0),
                            colors: [
                                ColorStop::with(color: RgbaColor::with(a: 0, b: 0, g: 0, r: 0)),
                            ],
                            sideOrCorner: SideOrCorner::with(
                                horizontalSide: 'horizontalSide',
                                verticalSide: 'verticalSide'
                            ),
                        ),
                        backgroundImage: BackgroundImage::with(
                            backgroundPosition: 'backgroundPosition',
                            backgroundSize: 'backgroundSize',
                            imageURL: 'imageUrl',
                        ),
                        flexboxPositioning: 'flexboxPositioning',
                        forceFullWidthSection: true,
                        maxWidthSectionCentering: 0,
                        verticalAlignment: 'verticalAlignment',
                    )
                        ->withBreakpointStyles(
                            [
                                'foo' => BreakpointStyles::with(
                                    hidden: true,
                                    margin: (object) [],
                                    padding: (object) []
                                ),
                            ],
                        ),
                    type: 'type',
                    w: 0,
                    x: 0,
                ),
            ],
            linkRelCanonicalURL: 'linkRelCanonicalUrl',
            mabExperimentID: 'mabExperimentId',
            metaDescription: 'metaDescription',
            name: 'name',
            pageExpiryDate: 0,
            pageExpiryEnabled: true,
            pageExpiryRedirectID: 0,
            pageExpiryRedirectURL: 'pageExpiryRedirectUrl',
            password: 'password',
            postBody: 'postBody',
            postSummary: 'postSummary',
            publicAccessRules: [(object) []],
            publicAccessRulesEnabled: true,
            publishDate: new \DateTimeImmutable('2019-12-27T18:11:19.117Z'),
            publishImmediately: true,
            rssBody: 'rssBody',
            rssSummary: 'rssSummary',
            slug: 'slug',
            state: 'state',
            tagIDs: [0],
            themeSettingsValues: ['foo' => (object) []],
            translatedFromID: 'translatedFromId',
            translations: [
                'foo' => ContentLanguageVariation::with(
                    id: 0,
                    archivedInDashboard: true,
                    authorName: 'authorName',
                    campaign: 'campaign',
                    campaignName: 'campaignName',
                    created: new \DateTimeImmutable('2019-12-27T18:11:19.117Z'),
                    name: 'name',
                    password: 'password',
                    publicAccessRules: [(object) []],
                    publicAccessRulesEnabled: true,
                    publishDate: new \DateTimeImmutable('2019-12-27T18:11:19.117Z'),
                    slug: 'slug',
                    state: 'state',
                    updated: new \DateTimeImmutable('2019-12-27T18:11:19.117Z'),
                )
                    ->withTagIDs([0]),
            ],
            updated: new \DateTimeImmutable('2019-12-27T18:11:19.117Z'),
            updatedByID: 'updatedById',
            url: 'url',
            useFeaturedImage: true,
            widgetContainers: ['foo' => (object) []],
            widgets: ['foo' => (object) []],
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testUpdateLangs(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->cms->blogs->posts->updateLangs(
            languages: ['foo' => 'string'],
            primaryID: 'primaryId'
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testUpdateLangsWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->cms->blogs->posts->updateLangs(
            languages: ['foo' => 'string'],
            primaryID: 'primaryId'
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }
}
