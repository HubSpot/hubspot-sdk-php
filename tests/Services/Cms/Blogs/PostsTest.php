<?php

namespace Tests\Services\Cms\Blogs;

use HubSpotSDK\Client;
use HubSpotSDK\Core\Util;
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

        $testUrl = Util::getenv('TEST_API_BASE_URL') ?: 'http://127.0.0.1:4010';
        $client = new Client(accessToken: 'My Access Token', baseUrl: $testUrl);

        $this->client = $client;
    }

    #[Test]
    public function testCreate(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->cms->blogs->posts->create(
            id: 'id',
            abStatus: 'automated_loser_variant',
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
            currentState: 'AGENT_GENERATED',
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
            language: 'aa',
            layoutSections: [
                'foo' => [
                    'cells' => [],
                    'cssClass' => 'cssClass',
                    'cssID' => 'cssId',
                    'cssStyle' => 'cssStyle',
                    'label' => 'label',
                    'name' => 'name',
                    'params' => ['foo' => (object) []],
                    'rowMetaData' => [
                        [
                            'cssClass' => 'cssClass',
                            'styles' => [
                                'backgroundColor' => ['a' => 0, 'b' => 0, 'g' => 0, 'r' => 0],
                                'backgroundGradient' => [
                                    'angle' => ['units' => 'deg', 'value' => 0],
                                    'colors' => [
                                        ['color' => ['a' => 0, 'b' => 0, 'g' => 0, 'r' => 0]],
                                    ],
                                    'sideOrCorner' => [
                                        'horizontalSide' => 'CENTER', 'verticalSide' => 'BOTTOM',
                                    ],
                                ],
                                'backgroundImage' => [
                                    'backgroundPosition' => 'backgroundPosition',
                                    'backgroundSize' => 'backgroundSize',
                                    'imageURL' => 'imageUrl',
                                ],
                                'flexboxPositioning' => 'BOTTOM_CENTER',
                                'forceFullWidthSection' => true,
                                'maxWidthSectionCentering' => 0,
                                'verticalAlignment' => 'BOTTOM',
                            ],
                        ],
                    ],
                    'rows' => [[]],
                    'styles' => [
                        'backgroundColor' => ['a' => 0, 'b' => 0, 'g' => 0, 'r' => 0],
                        'backgroundGradient' => [
                            'angle' => ['units' => 'deg', 'value' => 0],
                            'colors' => [
                                ['color' => ['a' => 0, 'b' => 0, 'g' => 0, 'r' => 0]],
                            ],
                            'sideOrCorner' => [
                                'horizontalSide' => 'CENTER', 'verticalSide' => 'BOTTOM',
                            ],
                        ],
                        'backgroundImage' => [
                            'backgroundPosition' => 'backgroundPosition',
                            'backgroundSize' => 'backgroundSize',
                            'imageURL' => 'imageUrl',
                        ],
                        'flexboxPositioning' => 'BOTTOM_CENTER',
                        'forceFullWidthSection' => true,
                        'maxWidthSectionCentering' => 0,
                        'verticalAlignment' => 'BOTTOM',
                    ],
                    'type' => 'type',
                    'w' => 0,
                    'x' => 0,
                ],
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
                'foo' => [
                    'id' => 0,
                    'archivedInDashboard' => true,
                    'authorName' => 'authorName',
                    'campaign' => 'campaign',
                    'campaignName' => 'campaignName',
                    'created' => new \DateTimeImmutable('2019-12-27T18:11:19.117Z'),
                    'name' => 'name',
                    'password' => 'password',
                    'publicAccessRules' => [(object) []],
                    'publicAccessRulesEnabled' => true,
                    'publishDate' => new \DateTimeImmutable('2019-12-27T18:11:19.117Z'),
                    'slug' => 'slug',
                    'state' => 'state',
                    'updated' => new \DateTimeImmutable('2019-12-27T18:11:19.117Z'),
                ],
            ],
            updated: new \DateTimeImmutable('2019-12-27T18:11:19.117Z'),
            updatedByID: 'updatedById',
            url: 'url',
            useFeaturedImage: true,
            widgetContainers: ['foo' => (object) []],
            widgets: ['foo' => (object) []],
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertIsString($result);
    }

    #[Test]
    public function testCreateWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->cms->blogs->posts->create(
            id: 'id',
            abStatus: 'automated_loser_variant',
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
            currentState: 'AGENT_GENERATED',
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
            language: 'aa',
            layoutSections: [
                'foo' => [
                    'cells' => [],
                    'cssClass' => 'cssClass',
                    'cssID' => 'cssId',
                    'cssStyle' => 'cssStyle',
                    'label' => 'label',
                    'name' => 'name',
                    'params' => ['foo' => (object) []],
                    'rowMetaData' => [
                        [
                            'cssClass' => 'cssClass',
                            'styles' => [
                                'backgroundColor' => ['a' => 0, 'b' => 0, 'g' => 0, 'r' => 0],
                                'backgroundGradient' => [
                                    'angle' => ['units' => 'deg', 'value' => 0],
                                    'colors' => [
                                        ['color' => ['a' => 0, 'b' => 0, 'g' => 0, 'r' => 0]],
                                    ],
                                    'sideOrCorner' => [
                                        'horizontalSide' => 'CENTER', 'verticalSide' => 'BOTTOM',
                                    ],
                                ],
                                'backgroundImage' => [
                                    'backgroundPosition' => 'backgroundPosition',
                                    'backgroundSize' => 'backgroundSize',
                                    'imageURL' => 'imageUrl',
                                ],
                                'flexboxPositioning' => 'BOTTOM_CENTER',
                                'forceFullWidthSection' => true,
                                'maxWidthSectionCentering' => 0,
                                'verticalAlignment' => 'BOTTOM',
                                'breakpointStyles' => [
                                    'foo' => [
                                        'hidden' => true,
                                        'margin' => [
                                            'bottom' => ['units' => '%', 'value' => 0],
                                            'top' => ['units' => '%', 'value' => 0],
                                        ],
                                        'padding' => [
                                            'bottom' => ['units' => '%', 'value' => 0],
                                            'left' => ['units' => '%', 'value' => 0],
                                            'right' => ['units' => '%', 'value' => 0],
                                            'top' => ['units' => '%', 'value' => 0],
                                        ],
                                    ],
                                ],
                            ],
                        ],
                    ],
                    'rows' => [[]],
                    'styles' => [
                        'backgroundColor' => ['a' => 0, 'b' => 0, 'g' => 0, 'r' => 0],
                        'backgroundGradient' => [
                            'angle' => ['units' => 'deg', 'value' => 0],
                            'colors' => [
                                ['color' => ['a' => 0, 'b' => 0, 'g' => 0, 'r' => 0]],
                            ],
                            'sideOrCorner' => [
                                'horizontalSide' => 'CENTER', 'verticalSide' => 'BOTTOM',
                            ],
                        ],
                        'backgroundImage' => [
                            'backgroundPosition' => 'backgroundPosition',
                            'backgroundSize' => 'backgroundSize',
                            'imageURL' => 'imageUrl',
                        ],
                        'flexboxPositioning' => 'BOTTOM_CENTER',
                        'forceFullWidthSection' => true,
                        'maxWidthSectionCentering' => 0,
                        'verticalAlignment' => 'BOTTOM',
                        'breakpointStyles' => [
                            'foo' => [
                                'hidden' => true,
                                'margin' => [
                                    'bottom' => ['units' => '%', 'value' => 0],
                                    'top' => ['units' => '%', 'value' => 0],
                                ],
                                'padding' => [
                                    'bottom' => ['units' => '%', 'value' => 0],
                                    'left' => ['units' => '%', 'value' => 0],
                                    'right' => ['units' => '%', 'value' => 0],
                                    'top' => ['units' => '%', 'value' => 0],
                                ],
                            ],
                        ],
                    ],
                    'type' => 'type',
                    'w' => 0,
                    'x' => 0,
                ],
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
                'foo' => [
                    'id' => 0,
                    'archivedInDashboard' => true,
                    'authorName' => 'authorName',
                    'campaign' => 'campaign',
                    'campaignName' => 'campaignName',
                    'created' => new \DateTimeImmutable('2019-12-27T18:11:19.117Z'),
                    'name' => 'name',
                    'password' => 'password',
                    'publicAccessRules' => [(object) []],
                    'publicAccessRulesEnabled' => true,
                    'publishDate' => new \DateTimeImmutable('2019-12-27T18:11:19.117Z'),
                    'slug' => 'slug',
                    'state' => 'state',
                    'updated' => new \DateTimeImmutable('2019-12-27T18:11:19.117Z'),
                    'tagIDs' => [0],
                ],
            ],
            updated: new \DateTimeImmutable('2019-12-27T18:11:19.117Z'),
            updatedByID: 'updatedById',
            url: 'url',
            useFeaturedImage: true,
            widgetContainers: ['foo' => (object) []],
            widgets: ['foo' => (object) []],
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertIsString($result);
    }

    #[Test]
    public function testUpdate(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->cms->blogs->posts->update(
            'objectId',
            id: 'id',
            abStatus: 'automated_loser_variant',
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
            currentState: 'AGENT_GENERATED',
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
            language: 'aa',
            layoutSections: [
                'foo' => [
                    'cells' => [],
                    'cssClass' => 'cssClass',
                    'cssID' => 'cssId',
                    'cssStyle' => 'cssStyle',
                    'label' => 'label',
                    'name' => 'name',
                    'params' => ['foo' => (object) []],
                    'rowMetaData' => [
                        [
                            'cssClass' => 'cssClass',
                            'styles' => [
                                'backgroundColor' => ['a' => 0, 'b' => 0, 'g' => 0, 'r' => 0],
                                'backgroundGradient' => [
                                    'angle' => ['units' => 'deg', 'value' => 0],
                                    'colors' => [
                                        ['color' => ['a' => 0, 'b' => 0, 'g' => 0, 'r' => 0]],
                                    ],
                                    'sideOrCorner' => [
                                        'horizontalSide' => 'CENTER', 'verticalSide' => 'BOTTOM',
                                    ],
                                ],
                                'backgroundImage' => [
                                    'backgroundPosition' => 'backgroundPosition',
                                    'backgroundSize' => 'backgroundSize',
                                    'imageURL' => 'imageUrl',
                                ],
                                'flexboxPositioning' => 'BOTTOM_CENTER',
                                'forceFullWidthSection' => true,
                                'maxWidthSectionCentering' => 0,
                                'verticalAlignment' => 'BOTTOM',
                            ],
                        ],
                    ],
                    'rows' => [[]],
                    'styles' => [
                        'backgroundColor' => ['a' => 0, 'b' => 0, 'g' => 0, 'r' => 0],
                        'backgroundGradient' => [
                            'angle' => ['units' => 'deg', 'value' => 0],
                            'colors' => [
                                ['color' => ['a' => 0, 'b' => 0, 'g' => 0, 'r' => 0]],
                            ],
                            'sideOrCorner' => [
                                'horizontalSide' => 'CENTER', 'verticalSide' => 'BOTTOM',
                            ],
                        ],
                        'backgroundImage' => [
                            'backgroundPosition' => 'backgroundPosition',
                            'backgroundSize' => 'backgroundSize',
                            'imageURL' => 'imageUrl',
                        ],
                        'flexboxPositioning' => 'BOTTOM_CENTER',
                        'forceFullWidthSection' => true,
                        'maxWidthSectionCentering' => 0,
                        'verticalAlignment' => 'BOTTOM',
                    ],
                    'type' => 'type',
                    'w' => 0,
                    'x' => 0,
                ],
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
                'foo' => [
                    'id' => 0,
                    'archivedInDashboard' => true,
                    'authorName' => 'authorName',
                    'campaign' => 'campaign',
                    'campaignName' => 'campaignName',
                    'created' => new \DateTimeImmutable('2019-12-27T18:11:19.117Z'),
                    'name' => 'name',
                    'password' => 'password',
                    'publicAccessRules' => [(object) []],
                    'publicAccessRulesEnabled' => true,
                    'publishDate' => new \DateTimeImmutable('2019-12-27T18:11:19.117Z'),
                    'slug' => 'slug',
                    'state' => 'state',
                    'updated' => new \DateTimeImmutable('2019-12-27T18:11:19.117Z'),
                ],
            ],
            updated: new \DateTimeImmutable('2019-12-27T18:11:19.117Z'),
            updatedByID: 'updatedById',
            url: 'url',
            useFeaturedImage: true,
            widgetContainers: ['foo' => (object) []],
            widgets: ['foo' => (object) []],
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertIsString($result);
    }

    #[Test]
    public function testUpdateWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->cms->blogs->posts->update(
            'objectId',
            id: 'id',
            abStatus: 'automated_loser_variant',
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
            currentState: 'AGENT_GENERATED',
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
            language: 'aa',
            layoutSections: [
                'foo' => [
                    'cells' => [],
                    'cssClass' => 'cssClass',
                    'cssID' => 'cssId',
                    'cssStyle' => 'cssStyle',
                    'label' => 'label',
                    'name' => 'name',
                    'params' => ['foo' => (object) []],
                    'rowMetaData' => [
                        [
                            'cssClass' => 'cssClass',
                            'styles' => [
                                'backgroundColor' => ['a' => 0, 'b' => 0, 'g' => 0, 'r' => 0],
                                'backgroundGradient' => [
                                    'angle' => ['units' => 'deg', 'value' => 0],
                                    'colors' => [
                                        ['color' => ['a' => 0, 'b' => 0, 'g' => 0, 'r' => 0]],
                                    ],
                                    'sideOrCorner' => [
                                        'horizontalSide' => 'CENTER', 'verticalSide' => 'BOTTOM',
                                    ],
                                ],
                                'backgroundImage' => [
                                    'backgroundPosition' => 'backgroundPosition',
                                    'backgroundSize' => 'backgroundSize',
                                    'imageURL' => 'imageUrl',
                                ],
                                'flexboxPositioning' => 'BOTTOM_CENTER',
                                'forceFullWidthSection' => true,
                                'maxWidthSectionCentering' => 0,
                                'verticalAlignment' => 'BOTTOM',
                                'breakpointStyles' => [
                                    'foo' => [
                                        'hidden' => true,
                                        'margin' => [
                                            'bottom' => ['units' => '%', 'value' => 0],
                                            'top' => ['units' => '%', 'value' => 0],
                                        ],
                                        'padding' => [
                                            'bottom' => ['units' => '%', 'value' => 0],
                                            'left' => ['units' => '%', 'value' => 0],
                                            'right' => ['units' => '%', 'value' => 0],
                                            'top' => ['units' => '%', 'value' => 0],
                                        ],
                                    ],
                                ],
                            ],
                        ],
                    ],
                    'rows' => [[]],
                    'styles' => [
                        'backgroundColor' => ['a' => 0, 'b' => 0, 'g' => 0, 'r' => 0],
                        'backgroundGradient' => [
                            'angle' => ['units' => 'deg', 'value' => 0],
                            'colors' => [
                                ['color' => ['a' => 0, 'b' => 0, 'g' => 0, 'r' => 0]],
                            ],
                            'sideOrCorner' => [
                                'horizontalSide' => 'CENTER', 'verticalSide' => 'BOTTOM',
                            ],
                        ],
                        'backgroundImage' => [
                            'backgroundPosition' => 'backgroundPosition',
                            'backgroundSize' => 'backgroundSize',
                            'imageURL' => 'imageUrl',
                        ],
                        'flexboxPositioning' => 'BOTTOM_CENTER',
                        'forceFullWidthSection' => true,
                        'maxWidthSectionCentering' => 0,
                        'verticalAlignment' => 'BOTTOM',
                        'breakpointStyles' => [
                            'foo' => [
                                'hidden' => true,
                                'margin' => [
                                    'bottom' => ['units' => '%', 'value' => 0],
                                    'top' => ['units' => '%', 'value' => 0],
                                ],
                                'padding' => [
                                    'bottom' => ['units' => '%', 'value' => 0],
                                    'left' => ['units' => '%', 'value' => 0],
                                    'right' => ['units' => '%', 'value' => 0],
                                    'top' => ['units' => '%', 'value' => 0],
                                ],
                            ],
                        ],
                    ],
                    'type' => 'type',
                    'w' => 0,
                    'x' => 0,
                ],
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
                'foo' => [
                    'id' => 0,
                    'archivedInDashboard' => true,
                    'authorName' => 'authorName',
                    'campaign' => 'campaign',
                    'campaignName' => 'campaignName',
                    'created' => new \DateTimeImmutable('2019-12-27T18:11:19.117Z'),
                    'name' => 'name',
                    'password' => 'password',
                    'publicAccessRules' => [(object) []],
                    'publicAccessRulesEnabled' => true,
                    'publishDate' => new \DateTimeImmutable('2019-12-27T18:11:19.117Z'),
                    'slug' => 'slug',
                    'state' => 'state',
                    'updated' => new \DateTimeImmutable('2019-12-27T18:11:19.117Z'),
                    'tagIDs' => [0],
                ],
            ],
            updated: new \DateTimeImmutable('2019-12-27T18:11:19.117Z'),
            updatedByID: 'updatedById',
            url: 'url',
            useFeaturedImage: true,
            widgetContainers: ['foo' => (object) []],
            widgets: ['foo' => (object) []],
            archived: true,
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertIsString($result);
    }

    #[Test]
    public function testList(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->cms->blogs->posts->list();

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertIsString($result);
    }

    #[Test]
    public function testDelete(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->cms->blogs->posts->delete('objectId');

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertNull($result);
    }

    #[Test]
    public function testClone(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->cms->blogs->posts->clone(id: 'id');

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertIsString($result);
    }

    #[Test]
    public function testCloneWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->cms->blogs->posts->clone(
            id: 'id',
            cloneName: 'cloneName'
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertIsString($result);
    }

    #[Test]
    public function testGet(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->cms->blogs->posts->get('objectId');

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertIsString($result);
    }

    #[Test]
    public function testGetDraftByID(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->cms->blogs->posts->getDraftByID('objectId');

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertIsString($result);
    }

    #[Test]
    public function testListAuthors(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->cms->blogs->posts->listAuthors();

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertIsString($result);
    }

    #[Test]
    public function testListTags(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->cms->blogs->posts->listTags();

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertIsString($result);
    }

    #[Test]
    public function testPushLive(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->cms->blogs->posts->pushLive('objectId');

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertNull($result);
    }

    #[Test]
    public function testQuery(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->cms->blogs->posts->query();

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertIsString($result);
    }

    #[Test]
    public function testQueryAuthors(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->cms->blogs->posts->queryAuthors();

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertIsString($result);
    }

    #[Test]
    public function testQueryTags(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->cms->blogs->posts->queryTags();

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertIsString($result);
    }

    #[Test]
    public function testResetDraft(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->cms->blogs->posts->resetDraft('objectId');

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertNull($result);
    }

    #[Test]
    public function testSchedule(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->cms->blogs->posts->schedule(
            id: 'id',
            publishDate: new \DateTimeImmutable('2019-12-27T18:11:19.117Z')
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertNull($result);
    }

    #[Test]
    public function testScheduleWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->cms->blogs->posts->schedule(
            id: 'id',
            publishDate: new \DateTimeImmutable('2019-12-27T18:11:19.117Z')
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertNull($result);
    }

    #[Test]
    public function testUpdateDraft(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->cms->blogs->posts->updateDraft(
            'objectId',
            id: 'id',
            abStatus: 'automated_loser_variant',
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
            currentState: 'AGENT_GENERATED',
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
            language: 'aa',
            layoutSections: [
                'foo' => [
                    'cells' => [],
                    'cssClass' => 'cssClass',
                    'cssID' => 'cssId',
                    'cssStyle' => 'cssStyle',
                    'label' => 'label',
                    'name' => 'name',
                    'params' => ['foo' => (object) []],
                    'rowMetaData' => [
                        [
                            'cssClass' => 'cssClass',
                            'styles' => [
                                'backgroundColor' => ['a' => 0, 'b' => 0, 'g' => 0, 'r' => 0],
                                'backgroundGradient' => [
                                    'angle' => ['units' => 'deg', 'value' => 0],
                                    'colors' => [
                                        ['color' => ['a' => 0, 'b' => 0, 'g' => 0, 'r' => 0]],
                                    ],
                                    'sideOrCorner' => [
                                        'horizontalSide' => 'CENTER', 'verticalSide' => 'BOTTOM',
                                    ],
                                ],
                                'backgroundImage' => [
                                    'backgroundPosition' => 'backgroundPosition',
                                    'backgroundSize' => 'backgroundSize',
                                    'imageURL' => 'imageUrl',
                                ],
                                'flexboxPositioning' => 'BOTTOM_CENTER',
                                'forceFullWidthSection' => true,
                                'maxWidthSectionCentering' => 0,
                                'verticalAlignment' => 'BOTTOM',
                            ],
                        ],
                    ],
                    'rows' => [[]],
                    'styles' => [
                        'backgroundColor' => ['a' => 0, 'b' => 0, 'g' => 0, 'r' => 0],
                        'backgroundGradient' => [
                            'angle' => ['units' => 'deg', 'value' => 0],
                            'colors' => [
                                ['color' => ['a' => 0, 'b' => 0, 'g' => 0, 'r' => 0]],
                            ],
                            'sideOrCorner' => [
                                'horizontalSide' => 'CENTER', 'verticalSide' => 'BOTTOM',
                            ],
                        ],
                        'backgroundImage' => [
                            'backgroundPosition' => 'backgroundPosition',
                            'backgroundSize' => 'backgroundSize',
                            'imageURL' => 'imageUrl',
                        ],
                        'flexboxPositioning' => 'BOTTOM_CENTER',
                        'forceFullWidthSection' => true,
                        'maxWidthSectionCentering' => 0,
                        'verticalAlignment' => 'BOTTOM',
                    ],
                    'type' => 'type',
                    'w' => 0,
                    'x' => 0,
                ],
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
                'foo' => [
                    'id' => 0,
                    'archivedInDashboard' => true,
                    'authorName' => 'authorName',
                    'campaign' => 'campaign',
                    'campaignName' => 'campaignName',
                    'created' => new \DateTimeImmutable('2019-12-27T18:11:19.117Z'),
                    'name' => 'name',
                    'password' => 'password',
                    'publicAccessRules' => [(object) []],
                    'publicAccessRulesEnabled' => true,
                    'publishDate' => new \DateTimeImmutable('2019-12-27T18:11:19.117Z'),
                    'slug' => 'slug',
                    'state' => 'state',
                    'updated' => new \DateTimeImmutable('2019-12-27T18:11:19.117Z'),
                ],
            ],
            updated: new \DateTimeImmutable('2019-12-27T18:11:19.117Z'),
            updatedByID: 'updatedById',
            url: 'url',
            useFeaturedImage: true,
            widgetContainers: ['foo' => (object) []],
            widgets: ['foo' => (object) []],
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertIsString($result);
    }

    #[Test]
    public function testUpdateDraftWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->cms->blogs->posts->updateDraft(
            'objectId',
            id: 'id',
            abStatus: 'automated_loser_variant',
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
            currentState: 'AGENT_GENERATED',
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
            language: 'aa',
            layoutSections: [
                'foo' => [
                    'cells' => [],
                    'cssClass' => 'cssClass',
                    'cssID' => 'cssId',
                    'cssStyle' => 'cssStyle',
                    'label' => 'label',
                    'name' => 'name',
                    'params' => ['foo' => (object) []],
                    'rowMetaData' => [
                        [
                            'cssClass' => 'cssClass',
                            'styles' => [
                                'backgroundColor' => ['a' => 0, 'b' => 0, 'g' => 0, 'r' => 0],
                                'backgroundGradient' => [
                                    'angle' => ['units' => 'deg', 'value' => 0],
                                    'colors' => [
                                        ['color' => ['a' => 0, 'b' => 0, 'g' => 0, 'r' => 0]],
                                    ],
                                    'sideOrCorner' => [
                                        'horizontalSide' => 'CENTER', 'verticalSide' => 'BOTTOM',
                                    ],
                                ],
                                'backgroundImage' => [
                                    'backgroundPosition' => 'backgroundPosition',
                                    'backgroundSize' => 'backgroundSize',
                                    'imageURL' => 'imageUrl',
                                ],
                                'flexboxPositioning' => 'BOTTOM_CENTER',
                                'forceFullWidthSection' => true,
                                'maxWidthSectionCentering' => 0,
                                'verticalAlignment' => 'BOTTOM',
                                'breakpointStyles' => [
                                    'foo' => [
                                        'hidden' => true,
                                        'margin' => [
                                            'bottom' => ['units' => '%', 'value' => 0],
                                            'top' => ['units' => '%', 'value' => 0],
                                        ],
                                        'padding' => [
                                            'bottom' => ['units' => '%', 'value' => 0],
                                            'left' => ['units' => '%', 'value' => 0],
                                            'right' => ['units' => '%', 'value' => 0],
                                            'top' => ['units' => '%', 'value' => 0],
                                        ],
                                    ],
                                ],
                            ],
                        ],
                    ],
                    'rows' => [[]],
                    'styles' => [
                        'backgroundColor' => ['a' => 0, 'b' => 0, 'g' => 0, 'r' => 0],
                        'backgroundGradient' => [
                            'angle' => ['units' => 'deg', 'value' => 0],
                            'colors' => [
                                ['color' => ['a' => 0, 'b' => 0, 'g' => 0, 'r' => 0]],
                            ],
                            'sideOrCorner' => [
                                'horizontalSide' => 'CENTER', 'verticalSide' => 'BOTTOM',
                            ],
                        ],
                        'backgroundImage' => [
                            'backgroundPosition' => 'backgroundPosition',
                            'backgroundSize' => 'backgroundSize',
                            'imageURL' => 'imageUrl',
                        ],
                        'flexboxPositioning' => 'BOTTOM_CENTER',
                        'forceFullWidthSection' => true,
                        'maxWidthSectionCentering' => 0,
                        'verticalAlignment' => 'BOTTOM',
                        'breakpointStyles' => [
                            'foo' => [
                                'hidden' => true,
                                'margin' => [
                                    'bottom' => ['units' => '%', 'value' => 0],
                                    'top' => ['units' => '%', 'value' => 0],
                                ],
                                'padding' => [
                                    'bottom' => ['units' => '%', 'value' => 0],
                                    'left' => ['units' => '%', 'value' => 0],
                                    'right' => ['units' => '%', 'value' => 0],
                                    'top' => ['units' => '%', 'value' => 0],
                                ],
                            ],
                        ],
                    ],
                    'type' => 'type',
                    'w' => 0,
                    'x' => 0,
                ],
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
                'foo' => [
                    'id' => 0,
                    'archivedInDashboard' => true,
                    'authorName' => 'authorName',
                    'campaign' => 'campaign',
                    'campaignName' => 'campaignName',
                    'created' => new \DateTimeImmutable('2019-12-27T18:11:19.117Z'),
                    'name' => 'name',
                    'password' => 'password',
                    'publicAccessRules' => [(object) []],
                    'publicAccessRulesEnabled' => true,
                    'publishDate' => new \DateTimeImmutable('2019-12-27T18:11:19.117Z'),
                    'slug' => 'slug',
                    'state' => 'state',
                    'updated' => new \DateTimeImmutable('2019-12-27T18:11:19.117Z'),
                    'tagIDs' => [0],
                ],
            ],
            updated: new \DateTimeImmutable('2019-12-27T18:11:19.117Z'),
            updatedByID: 'updatedById',
            url: 'url',
            useFeaturedImage: true,
            widgetContainers: ['foo' => (object) []],
            widgets: ['foo' => (object) []],
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertIsString($result);
    }
}
