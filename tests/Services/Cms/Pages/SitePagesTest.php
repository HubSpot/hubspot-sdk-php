<?php

namespace Tests\Services\Cms\Pages;

use HubspotSDK\Client;
use HubspotSDK\Cms\Angle;
use HubspotSDK\Cms\BackgroundImage;
use HubspotSDK\Cms\Blogs\Posts\BreakpointStyles;
use HubspotSDK\Cms\ColorStop;
use HubspotSDK\Cms\Gradient;
use HubspotSDK\Cms\LayoutSection;
use HubspotSDK\Cms\Pages\ContentLanguageVariation;
use HubspotSDK\Cms\Pages\Page;
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
final class SitePagesTest extends TestCase
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

        $result = $this->client->cms->pages->sitePages->create(
            id: 'id',
            abStatus: 'master',
            abTestID: 'abTestId',
            archivedAt: new \DateTimeImmutable('2019-12-27T18:11:19.117Z'),
            archivedInDashboard: true,
            attachedStylesheets: [['foo' => (object) []]],
            authorName: 'authorName',
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
            pageRedirected: true,
            password: 'password',
            publicAccessRules: [(object) []],
            publicAccessRulesEnabled: true,
            publishDate: new \DateTimeImmutable('2019-12-27T18:11:19.117Z'),
            publishImmediately: true,
            slug: 'slug',
            state: 'state',
            subcategory: 'subcategory',
            templatePath: 'templatePath',
            themeSettingsValues: ['foo' => (object) []],
            translatedFromID: 'translatedFromId',
            translations: [
                'foo' => ContentLanguageVariation::with(
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
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testCreateWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->cms->pages->sitePages->create(
            id: 'id',
            abStatus: 'master',
            abTestID: 'abTestId',
            archivedAt: new \DateTimeImmutable('2019-12-27T18:11:19.117Z'),
            archivedInDashboard: true,
            attachedStylesheets: [['foo' => (object) []]],
            authorName: 'authorName',
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
            pageRedirected: true,
            password: 'password',
            publicAccessRules: [(object) []],
            publicAccessRulesEnabled: true,
            publishDate: new \DateTimeImmutable('2019-12-27T18:11:19.117Z'),
            publishImmediately: true,
            slug: 'slug',
            state: 'state',
            subcategory: 'subcategory',
            templatePath: 'templatePath',
            themeSettingsValues: ['foo' => (object) []],
            translatedFromID: 'translatedFromId',
            translations: [
                'foo' => ContentLanguageVariation::with(
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
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testUpdate(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->cms->pages->sitePages->update(
            'objectId',
            id: 'id',
            abStatus: 'master',
            abTestID: 'abTestId',
            archivedAt: new \DateTimeImmutable('2019-12-27T18:11:19.117Z'),
            archivedInDashboard: true,
            attachedStylesheets: [['foo' => (object) []]],
            authorName: 'authorName',
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
            pageRedirected: true,
            password: 'password',
            publicAccessRules: [(object) []],
            publicAccessRulesEnabled: true,
            publishDate: new \DateTimeImmutable('2019-12-27T18:11:19.117Z'),
            publishImmediately: true,
            slug: 'slug',
            state: 'state',
            subcategory: 'subcategory',
            templatePath: 'templatePath',
            themeSettingsValues: ['foo' => (object) []],
            translatedFromID: 'translatedFromId',
            translations: [
                'foo' => ContentLanguageVariation::with(
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
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testUpdateWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->cms->pages->sitePages->update(
            'objectId',
            id: 'id',
            abStatus: 'master',
            abTestID: 'abTestId',
            archivedAt: new \DateTimeImmutable('2019-12-27T18:11:19.117Z'),
            archivedInDashboard: true,
            attachedStylesheets: [['foo' => (object) []]],
            authorName: 'authorName',
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
            pageRedirected: true,
            password: 'password',
            publicAccessRules: [(object) []],
            publicAccessRulesEnabled: true,
            publishDate: new \DateTimeImmutable('2019-12-27T18:11:19.117Z'),
            publishImmediately: true,
            slug: 'slug',
            state: 'state',
            subcategory: 'subcategory',
            templatePath: 'templatePath',
            themeSettingsValues: ['foo' => (object) []],
            translatedFromID: 'translatedFromId',
            translations: [
                'foo' => ContentLanguageVariation::with(
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
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testList(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->cms->pages->sitePages->list();

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testDelete(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->cms->pages->sitePages->delete('objectId');

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testAttachToLangGroup(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->cms->pages->sitePages->attachToLangGroup(
            id: 'id',
            language: 'language',
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

        $result = $this->client->cms->pages->sitePages->attachToLangGroup(
            id: 'id',
            language: 'language',
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

        $result = $this->client->cms->pages->sitePages->clone(id: 'id');

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testCloneWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->cms->pages->sitePages->clone(id: 'id');

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testCreateAbTestVariation(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->cms->pages->sitePages->createAbTestVariation(
            contentID: 'contentId',
            variationName: 'variationName'
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testCreateAbTestVariationWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->cms->pages->sitePages->createAbTestVariation(
            contentID: 'contentId',
            variationName: 'variationName'
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testCreateBatch(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->cms->pages->sitePages->createBatch(
            [
                Page::with(
                    id: 'id',
                    abStatus: 'master',
                    abTestID: 'abTestId',
                    archivedAt: new \DateTimeImmutable('2019-12-27T18:11:19.117Z'),
                    archivedInDashboard: true,
                    attachedStylesheets: [['foo' => (object) []]],
                    authorName: 'authorName',
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
                    pageRedirected: true,
                    password: 'password',
                    publicAccessRules: [(object) []],
                    publicAccessRulesEnabled: true,
                    publishDate: new \DateTimeImmutable('2019-12-27T18:11:19.117Z'),
                    publishImmediately: true,
                    slug: 'slug',
                    state: 'state',
                    subcategory: 'subcategory',
                    templatePath: 'templatePath',
                    themeSettingsValues: ['foo' => (object) []],
                    translatedFromID: 'translatedFromId',
                    translations: [
                        'foo' => ContentLanguageVariation::with(
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
    public function testCreateBatchWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->cms->pages->sitePages->createBatch(
            [
                Page::with(
                    id: 'id',
                    abStatus: 'master',
                    abTestID: 'abTestId',
                    archivedAt: new \DateTimeImmutable('2019-12-27T18:11:19.117Z'),
                    archivedInDashboard: true,
                    attachedStylesheets: [['foo' => (object) []]],
                    authorName: 'authorName',
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
                    pageRedirected: true,
                    password: 'password',
                    publicAccessRules: [(object) []],
                    publicAccessRulesEnabled: true,
                    publishDate: new \DateTimeImmutable('2019-12-27T18:11:19.117Z'),
                    publishImmediately: true,
                    slug: 'slug',
                    state: 'state',
                    subcategory: 'subcategory',
                    templatePath: 'templatePath',
                    themeSettingsValues: ['foo' => (object) []],
                    translatedFromID: 'translatedFromId',
                    translations: [
                        'foo' => ContentLanguageVariation::with(
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
    public function testCreateLanguageVariation(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->cms->pages->sitePages->createLanguageVariation(
            id: 'id'
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testCreateLanguageVariationWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->cms->pages->sitePages->createLanguageVariation(
            id: 'id'
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testDeleteBatch(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->cms->pages->sitePages->deleteBatch(['string']);

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testDeleteBatchWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->cms->pages->sitePages->deleteBatch(['string']);

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testDetachFromLangGroup(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->cms->pages->sitePages->detachFromLangGroup('id');

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testDetachFromLangGroupWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->cms->pages->sitePages->detachFromLangGroup('id');

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testEndAbTest(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->cms->pages->sitePages->endAbTest(
            abTestID: 'abTestId',
            winnerID: 'winnerId'
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testEndAbTestWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->cms->pages->sitePages->endAbTest(
            abTestID: 'abTestId',
            winnerID: 'winnerId'
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testGet(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->cms->pages->sitePages->get('objectId');

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testGetBatch(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->cms->pages->sitePages->getBatch(
            inputs: ['string']
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testGetBatchWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->cms->pages->sitePages->getBatch(
            inputs: ['string']
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testGetDraft(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->cms->pages->sitePages->getDraft('objectId');

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testGetRevision(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->cms->pages->sitePages->getRevision(
            'revisionId',
            'objectId'
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testGetRevisionWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->cms->pages->sitePages->getRevision(
            'revisionId',
            'objectId'
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testListRevisions(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->cms->pages->sitePages->listRevisions('objectId');

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testPublishDraft(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->cms->pages->sitePages->publishDraft('objectId');

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testRerunAbTest(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->cms->pages->sitePages->rerunAbTest(
            abTestID: 'abTestId',
            variationID: 'variationId'
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testRerunAbTestWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->cms->pages->sitePages->rerunAbTest(
            abTestID: 'abTestId',
            variationID: 'variationId'
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testResetDraft(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->cms->pages->sitePages->resetDraft('objectId');

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testRestoreRevision(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->cms->pages->sitePages->restoreRevision(
            'revisionId',
            'objectId'
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testRestoreRevisionWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->cms->pages->sitePages->restoreRevision(
            'revisionId',
            'objectId'
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testRestoreRevisionToDraft(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->cms->pages->sitePages->restoreRevisionToDraft(
            0,
            'objectId'
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testRestoreRevisionToDraftWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->cms->pages->sitePages->restoreRevisionToDraft(
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

        $result = $this->client->cms->pages->sitePages->schedule(
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

        $result = $this->client->cms->pages->sitePages->schedule(
            id: 'id',
            publishDate: new \DateTimeImmutable('2019-12-27T18:11:19.117Z')
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testSetNewLangPrimary(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->cms->pages->sitePages->setNewLangPrimary('id');

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testSetNewLangPrimaryWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->cms->pages->sitePages->setNewLangPrimary('id');

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testUpdateBatch(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->cms->pages->sitePages->updateBatch(
            inputs: [(object) []]
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testUpdateBatchWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->cms->pages->sitePages->updateBatch(
            inputs: [(object) []]
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testUpdateDraft(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->cms->pages->sitePages->updateDraft(
            'objectId',
            id: 'id',
            abStatus: 'master',
            abTestID: 'abTestId',
            archivedAt: new \DateTimeImmutable('2019-12-27T18:11:19.117Z'),
            archivedInDashboard: true,
            attachedStylesheets: [['foo' => (object) []]],
            authorName: 'authorName',
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
            pageRedirected: true,
            password: 'password',
            publicAccessRules: [(object) []],
            publicAccessRulesEnabled: true,
            publishDate: new \DateTimeImmutable('2019-12-27T18:11:19.117Z'),
            publishImmediately: true,
            slug: 'slug',
            state: 'state',
            subcategory: 'subcategory',
            templatePath: 'templatePath',
            themeSettingsValues: ['foo' => (object) []],
            translatedFromID: 'translatedFromId',
            translations: [
                'foo' => ContentLanguageVariation::with(
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
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testUpdateDraftWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->cms->pages->sitePages->updateDraft(
            'objectId',
            id: 'id',
            abStatus: 'master',
            abTestID: 'abTestId',
            archivedAt: new \DateTimeImmutable('2019-12-27T18:11:19.117Z'),
            archivedInDashboard: true,
            attachedStylesheets: [['foo' => (object) []]],
            authorName: 'authorName',
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
            pageRedirected: true,
            password: 'password',
            publicAccessRules: [(object) []],
            publicAccessRulesEnabled: true,
            publishDate: new \DateTimeImmutable('2019-12-27T18:11:19.117Z'),
            publishImmediately: true,
            slug: 'slug',
            state: 'state',
            subcategory: 'subcategory',
            templatePath: 'templatePath',
            themeSettingsValues: ['foo' => (object) []],
            translatedFromID: 'translatedFromId',
            translations: [
                'foo' => ContentLanguageVariation::with(
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
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testUpdateLanguages(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->cms->pages->sitePages->updateLanguages(
            languages: ['foo' => 'string'],
            primaryID: 'primaryId'
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testUpdateLanguagesWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->cms->pages->sitePages->updateLanguages(
            languages: ['foo' => 'string'],
            primaryID: 'primaryId'
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }
}
