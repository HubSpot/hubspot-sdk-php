<?php

namespace Tests\Services\Cms\Blogs\Posts;

use HubspotSDK\Client;
use HubspotSDK\Cms\Angle;
use HubspotSDK\Cms\BackgroundImage;
use HubspotSDK\Cms\Blogs\Posts\BlogPost;
use HubspotSDK\Cms\Blogs\Posts\BreakpointStyles;
use HubspotSDK\Cms\ColorStop;
use HubspotSDK\Cms\Gradient;
use HubspotSDK\Cms\LayoutSection;
use HubspotSDK\Cms\Pages\PagesContentLanguageVariation;
use HubspotSDK\Cms\RgbaColor;
use HubspotSDK\Cms\RowMetaData;
use HubspotSDK\Cms\SideOrCorner;
use HubspotSDK\Cms\Styles;
use PHPUnit\Framework\Attributes\CoversNothing;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Tests\UnsupportedMockTests;

/**
 * @internal
 */
#[CoversNothing]
final class BatchTest extends TestCase
{
    protected Client $client;

    protected function setUp(): void
    {
        parent::setUp();

        $testUrl = getenv('TEST_API_BASE_URL') ?: 'http://127.0.0.1:4010';
        $client = new Client(
            accessToken: 'pat-na1-xxxxxxxx-xxxx',
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

        $result = $this->client->cms->blogs->posts->batch->create(
            [
                BlogPost::with(
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
                        'foo' => PagesContentLanguageVariation::with(
                            id: 0,
                            archivedInDashboard: true,
                            authorName: 'authorName',
                            campaign: 'campaign',
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
                ),
            ],
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testCreateWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->cms->blogs->posts->batch->create(
            [
                BlogPost::with(
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
                        'foo' => PagesContentLanguageVariation::with(
                            id: 0,
                            archivedInDashboard: true,
                            authorName: 'authorName',
                            campaign: 'campaign',
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
                ),
            ],
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testUpdate(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->cms->blogs->posts->batch->update(
            inputs: [(object) []]
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testUpdateWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->cms->blogs->posts->batch->update(
            inputs: [(object) []]
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testDelete(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->cms->blogs->posts->batch->delete(['string']);

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testDeleteWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->cms->blogs->posts->batch->delete(['string']);

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testGet(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->cms->blogs->posts->batch->get(inputs: ['string']);

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testGetWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->cms->blogs->posts->batch->get(inputs: ['string']);

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }
}
