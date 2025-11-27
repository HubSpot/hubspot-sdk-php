<?php

namespace Tests\Services\Cms\Blogs;

use HubspotSDK\Client;
use HubspotSDK\Cms\Blogs\Posts\BlogPost;
use HubspotSDK\Cms\Blogs\Posts\VersionBlogPost;
use HubspotSDK\Page;
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

        $result = $this->client->cms->blogs->posts->create([
            'id' => 'id',
            'abStatus' => 'automated_loser_variant',
            'abTestId' => 'abTestId',
            'archivedAt' => 0,
            'archivedInDashboard' => true,
            'attachedStylesheets' => [['foo' => []]],
            'authorName' => 'authorName',
            'blogAuthorId' => 'blogAuthorId',
            'campaign' => 'campaign',
            'categoryId' => 0,
            'contentGroupId' => 'contentGroupId',
            'contentTypeCategory' => '0',
            'created' => '2019-12-27T18:11:19.117Z',
            'createdById' => 'createdById',
            'currentlyPublished' => true,
            'currentState' => 'AUTOMATED',
            'domain' => 'domain',
            'dynamicPageDataSourceId' => 'dynamicPageDataSourceId',
            'dynamicPageDataSourceType' => 0,
            'dynamicPageHubDbTableId' => 'dynamicPageHubDbTableId',
            'enableDomainStylesheets' => true,
            'enableGoogleAmpOutputOverride' => true,
            'enableLayoutStylesheets' => true,
            'featuredImage' => 'featuredImage',
            'featuredImageAltText' => 'featuredImageAltText',
            'folderId' => 'folderId',
            'footerHtml' => 'footerHtml',
            'headHtml' => 'headHtml',
            'htmlTitle' => 'htmlTitle',
            'includeDefaultCustomCss' => true,
            'language' => 'af',
            'layoutSections' => [
                'foo' => [
                    'cells' => [],
                    'cssClass' => 'cssClass',
                    'cssId' => 'cssId',
                    'cssStyle' => 'cssStyle',
                    'label' => 'label',
                    'name' => 'name',
                    'params' => ['foo' => []],
                    'rowMetaData' => [
                        [
                            'cssClass' => 'cssClass',
                            'styles' => [
                                'backgroundColor' => ['a' => 0, 'b' => 0, 'g' => 0, 'r' => 0],
                                'backgroundGradient' => [
                                    'angle' => ['units' => 'units', 'value' => 0],
                                    'colors' => [
                                        ['color' => ['a' => 0, 'b' => 0, 'g' => 0, 'r' => 0]],
                                    ],
                                    'sideOrCorner' => [
                                        'horizontalSide' => 'horizontalSide',
                                        'verticalSide' => 'verticalSide',
                                    ],
                                ],
                                'backgroundImage' => [
                                    'backgroundPosition' => 'backgroundPosition',
                                    'backgroundSize' => 'backgroundSize',
                                    'imageUrl' => 'imageUrl',
                                ],
                                'flexboxPositioning' => 'flexboxPositioning',
                                'forceFullWidthSection' => true,
                                'maxWidthSectionCentering' => 0,
                                'verticalAlignment' => 'verticalAlignment',
                            ],
                        ],
                    ],
                    'rows' => [[]],
                    'styles' => [
                        'backgroundColor' => ['a' => 0, 'b' => 0, 'g' => 0, 'r' => 0],
                        'backgroundGradient' => [
                            'angle' => ['units' => 'units', 'value' => 0],
                            'colors' => [
                                ['color' => ['a' => 0, 'b' => 0, 'g' => 0, 'r' => 0]],
                            ],
                            'sideOrCorner' => [
                                'horizontalSide' => 'horizontalSide',
                                'verticalSide' => 'verticalSide',
                            ],
                        ],
                        'backgroundImage' => [
                            'backgroundPosition' => 'backgroundPosition',
                            'backgroundSize' => 'backgroundSize',
                            'imageUrl' => 'imageUrl',
                        ],
                        'flexboxPositioning' => 'flexboxPositioning',
                        'forceFullWidthSection' => true,
                        'maxWidthSectionCentering' => 0,
                        'verticalAlignment' => 'verticalAlignment',
                    ],
                    'type' => 'type',
                    'w' => 0,
                    'x' => 0,
                ],
            ],
            'linkRelCanonicalUrl' => 'linkRelCanonicalUrl',
            'mabExperimentId' => 'mabExperimentId',
            'metaDescription' => 'metaDescription',
            'name' => 'name',
            'pageExpiryDate' => 0,
            'pageExpiryEnabled' => true,
            'pageExpiryRedirectId' => 0,
            'pageExpiryRedirectUrl' => 'pageExpiryRedirectUrl',
            'password' => 'password',
            'postBody' => 'postBody',
            'postSummary' => 'postSummary',
            'publicAccessRules' => [[]],
            'publicAccessRulesEnabled' => true,
            'publishDate' => '2019-12-27T18:11:19.117Z',
            'publishImmediately' => true,
            'rssBody' => 'rssBody',
            'rssSummary' => 'rssSummary',
            'slug' => 'slug',
            'state' => 'state',
            'tagIds' => [0],
            'themeSettingsValues' => ['foo' => []],
            'translatedFromId' => 'translatedFromId',
            'translations' => [
                'foo' => [
                    'id' => 0,
                    'archivedInDashboard' => true,
                    'authorName' => 'authorName',
                    'campaign' => 'campaign',
                    'created' => '2019-12-27T18:11:19.117Z',
                    'name' => 'name',
                    'password' => 'password',
                    'publicAccessRules' => [[]],
                    'publicAccessRulesEnabled' => true,
                    'publishDate' => '2019-12-27T18:11:19.117Z',
                    'slug' => 'slug',
                    'state' => 'state',
                    'updated' => '2019-12-27T18:11:19.117Z',
                ],
            ],
            'updated' => '2019-12-27T18:11:19.117Z',
            'updatedById' => 'updatedById',
            'url' => 'url',
            'useFeaturedImage' => true,
            'widgetContainers' => ['foo' => []],
            'widgets' => ['foo' => []],
        ]);

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(BlogPost::class, $result);
    }

    #[Test]
    public function testCreateWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->cms->blogs->posts->create([
            'id' => 'id',
            'abStatus' => 'automated_loser_variant',
            'abTestId' => 'abTestId',
            'archivedAt' => 0,
            'archivedInDashboard' => true,
            'attachedStylesheets' => [['foo' => []]],
            'authorName' => 'authorName',
            'blogAuthorId' => 'blogAuthorId',
            'campaign' => 'campaign',
            'categoryId' => 0,
            'contentGroupId' => 'contentGroupId',
            'contentTypeCategory' => '0',
            'created' => '2019-12-27T18:11:19.117Z',
            'createdById' => 'createdById',
            'currentlyPublished' => true,
            'currentState' => 'AUTOMATED',
            'domain' => 'domain',
            'dynamicPageDataSourceId' => 'dynamicPageDataSourceId',
            'dynamicPageDataSourceType' => 0,
            'dynamicPageHubDbTableId' => 'dynamicPageHubDbTableId',
            'enableDomainStylesheets' => true,
            'enableGoogleAmpOutputOverride' => true,
            'enableLayoutStylesheets' => true,
            'featuredImage' => 'featuredImage',
            'featuredImageAltText' => 'featuredImageAltText',
            'folderId' => 'folderId',
            'footerHtml' => 'footerHtml',
            'headHtml' => 'headHtml',
            'htmlTitle' => 'htmlTitle',
            'includeDefaultCustomCss' => true,
            'language' => 'af',
            'layoutSections' => [
                'foo' => [
                    'cells' => [],
                    'cssClass' => 'cssClass',
                    'cssId' => 'cssId',
                    'cssStyle' => 'cssStyle',
                    'label' => 'label',
                    'name' => 'name',
                    'params' => ['foo' => []],
                    'rowMetaData' => [
                        [
                            'cssClass' => 'cssClass',
                            'styles' => [
                                'backgroundColor' => ['a' => 0, 'b' => 0, 'g' => 0, 'r' => 0],
                                'backgroundGradient' => [
                                    'angle' => ['units' => 'units', 'value' => 0],
                                    'colors' => [
                                        ['color' => ['a' => 0, 'b' => 0, 'g' => 0, 'r' => 0]],
                                    ],
                                    'sideOrCorner' => [
                                        'horizontalSide' => 'horizontalSide',
                                        'verticalSide' => 'verticalSide',
                                    ],
                                ],
                                'backgroundImage' => [
                                    'backgroundPosition' => 'backgroundPosition',
                                    'backgroundSize' => 'backgroundSize',
                                    'imageUrl' => 'imageUrl',
                                ],
                                'flexboxPositioning' => 'flexboxPositioning',
                                'forceFullWidthSection' => true,
                                'maxWidthSectionCentering' => 0,
                                'verticalAlignment' => 'verticalAlignment',
                                'breakpointStyles' => [
                                    'foo' => ['hidden' => true, 'margin' => [], 'padding' => []],
                                ],
                            ],
                        ],
                    ],
                    'rows' => [[]],
                    'styles' => [
                        'backgroundColor' => ['a' => 0, 'b' => 0, 'g' => 0, 'r' => 0],
                        'backgroundGradient' => [
                            'angle' => ['units' => 'units', 'value' => 0],
                            'colors' => [
                                ['color' => ['a' => 0, 'b' => 0, 'g' => 0, 'r' => 0]],
                            ],
                            'sideOrCorner' => [
                                'horizontalSide' => 'horizontalSide',
                                'verticalSide' => 'verticalSide',
                            ],
                        ],
                        'backgroundImage' => [
                            'backgroundPosition' => 'backgroundPosition',
                            'backgroundSize' => 'backgroundSize',
                            'imageUrl' => 'imageUrl',
                        ],
                        'flexboxPositioning' => 'flexboxPositioning',
                        'forceFullWidthSection' => true,
                        'maxWidthSectionCentering' => 0,
                        'verticalAlignment' => 'verticalAlignment',
                        'breakpointStyles' => [
                            'foo' => ['hidden' => true, 'margin' => [], 'padding' => []],
                        ],
                    ],
                    'type' => 'type',
                    'w' => 0,
                    'x' => 0,
                ],
            ],
            'linkRelCanonicalUrl' => 'linkRelCanonicalUrl',
            'mabExperimentId' => 'mabExperimentId',
            'metaDescription' => 'metaDescription',
            'name' => 'name',
            'pageExpiryDate' => 0,
            'pageExpiryEnabled' => true,
            'pageExpiryRedirectId' => 0,
            'pageExpiryRedirectUrl' => 'pageExpiryRedirectUrl',
            'password' => 'password',
            'postBody' => 'postBody',
            'postSummary' => 'postSummary',
            'publicAccessRules' => [[]],
            'publicAccessRulesEnabled' => true,
            'publishDate' => '2019-12-27T18:11:19.117Z',
            'publishImmediately' => true,
            'rssBody' => 'rssBody',
            'rssSummary' => 'rssSummary',
            'slug' => 'slug',
            'state' => 'state',
            'tagIds' => [0],
            'themeSettingsValues' => ['foo' => []],
            'translatedFromId' => 'translatedFromId',
            'translations' => [
                'foo' => [
                    'id' => 0,
                    'archivedInDashboard' => true,
                    'authorName' => 'authorName',
                    'campaign' => 'campaign',
                    'created' => '2019-12-27T18:11:19.117Z',
                    'name' => 'name',
                    'password' => 'password',
                    'publicAccessRules' => [[]],
                    'publicAccessRulesEnabled' => true,
                    'publishDate' => '2019-12-27T18:11:19.117Z',
                    'slug' => 'slug',
                    'state' => 'state',
                    'updated' => '2019-12-27T18:11:19.117Z',
                    'tagIds' => [0],
                ],
            ],
            'updated' => '2019-12-27T18:11:19.117Z',
            'updatedById' => 'updatedById',
            'url' => 'url',
            'useFeaturedImage' => true,
            'widgetContainers' => ['foo' => []],
            'widgets' => ['foo' => []],
        ]);

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(BlogPost::class, $result);
    }

    #[Test]
    public function testUpdate(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->cms->blogs->posts->update(
            'objectId',
            [
                'id' => 'id',
                'abStatus' => 'automated_loser_variant',
                'abTestId' => 'abTestId',
                'archivedAt' => 0,
                'archivedInDashboard' => true,
                'attachedStylesheets' => [['foo' => []]],
                'authorName' => 'authorName',
                'blogAuthorId' => 'blogAuthorId',
                'campaign' => 'campaign',
                'categoryId' => 0,
                'contentGroupId' => 'contentGroupId',
                'contentTypeCategory' => '0',
                'created' => '2019-12-27T18:11:19.117Z',
                'createdById' => 'createdById',
                'currentlyPublished' => true,
                'currentState' => 'AUTOMATED',
                'domain' => 'domain',
                'dynamicPageDataSourceId' => 'dynamicPageDataSourceId',
                'dynamicPageDataSourceType' => 0,
                'dynamicPageHubDbTableId' => 'dynamicPageHubDbTableId',
                'enableDomainStylesheets' => true,
                'enableGoogleAmpOutputOverride' => true,
                'enableLayoutStylesheets' => true,
                'featuredImage' => 'featuredImage',
                'featuredImageAltText' => 'featuredImageAltText',
                'folderId' => 'folderId',
                'footerHtml' => 'footerHtml',
                'headHtml' => 'headHtml',
                'htmlTitle' => 'htmlTitle',
                'includeDefaultCustomCss' => true,
                'language' => 'af',
                'layoutSections' => [
                    'foo' => [
                        'cells' => [],
                        'cssClass' => 'cssClass',
                        'cssId' => 'cssId',
                        'cssStyle' => 'cssStyle',
                        'label' => 'label',
                        'name' => 'name',
                        'params' => ['foo' => []],
                        'rowMetaData' => [
                            [
                                'cssClass' => 'cssClass',
                                'styles' => [
                                    'backgroundColor' => ['a' => 0, 'b' => 0, 'g' => 0, 'r' => 0],
                                    'backgroundGradient' => [
                                        'angle' => ['units' => 'units', 'value' => 0],
                                        'colors' => [
                                            ['color' => ['a' => 0, 'b' => 0, 'g' => 0, 'r' => 0]],
                                        ],
                                        'sideOrCorner' => [
                                            'horizontalSide' => 'horizontalSide',
                                            'verticalSide' => 'verticalSide',
                                        ],
                                    ],
                                    'backgroundImage' => [
                                        'backgroundPosition' => 'backgroundPosition',
                                        'backgroundSize' => 'backgroundSize',
                                        'imageUrl' => 'imageUrl',
                                    ],
                                    'flexboxPositioning' => 'flexboxPositioning',
                                    'forceFullWidthSection' => true,
                                    'maxWidthSectionCentering' => 0,
                                    'verticalAlignment' => 'verticalAlignment',
                                ],
                            ],
                        ],
                        'rows' => [[]],
                        'styles' => [
                            'backgroundColor' => ['a' => 0, 'b' => 0, 'g' => 0, 'r' => 0],
                            'backgroundGradient' => [
                                'angle' => ['units' => 'units', 'value' => 0],
                                'colors' => [
                                    ['color' => ['a' => 0, 'b' => 0, 'g' => 0, 'r' => 0]],
                                ],
                                'sideOrCorner' => [
                                    'horizontalSide' => 'horizontalSide',
                                    'verticalSide' => 'verticalSide',
                                ],
                            ],
                            'backgroundImage' => [
                                'backgroundPosition' => 'backgroundPosition',
                                'backgroundSize' => 'backgroundSize',
                                'imageUrl' => 'imageUrl',
                            ],
                            'flexboxPositioning' => 'flexboxPositioning',
                            'forceFullWidthSection' => true,
                            'maxWidthSectionCentering' => 0,
                            'verticalAlignment' => 'verticalAlignment',
                        ],
                        'type' => 'type',
                        'w' => 0,
                        'x' => 0,
                    ],
                ],
                'linkRelCanonicalUrl' => 'linkRelCanonicalUrl',
                'mabExperimentId' => 'mabExperimentId',
                'metaDescription' => 'metaDescription',
                'name' => 'name',
                'pageExpiryDate' => 0,
                'pageExpiryEnabled' => true,
                'pageExpiryRedirectId' => 0,
                'pageExpiryRedirectUrl' => 'pageExpiryRedirectUrl',
                'password' => 'password',
                'postBody' => 'postBody',
                'postSummary' => 'postSummary',
                'publicAccessRules' => [[]],
                'publicAccessRulesEnabled' => true,
                'publishDate' => '2019-12-27T18:11:19.117Z',
                'publishImmediately' => true,
                'rssBody' => 'rssBody',
                'rssSummary' => 'rssSummary',
                'slug' => 'slug',
                'state' => 'state',
                'tagIds' => [0],
                'themeSettingsValues' => ['foo' => []],
                'translatedFromId' => 'translatedFromId',
                'translations' => [
                    'foo' => [
                        'id' => 0,
                        'archivedInDashboard' => true,
                        'authorName' => 'authorName',
                        'campaign' => 'campaign',
                        'created' => '2019-12-27T18:11:19.117Z',
                        'name' => 'name',
                        'password' => 'password',
                        'publicAccessRules' => [[]],
                        'publicAccessRulesEnabled' => true,
                        'publishDate' => '2019-12-27T18:11:19.117Z',
                        'slug' => 'slug',
                        'state' => 'state',
                        'updated' => '2019-12-27T18:11:19.117Z',
                    ],
                ],
                'updated' => '2019-12-27T18:11:19.117Z',
                'updatedById' => 'updatedById',
                'url' => 'url',
                'useFeaturedImage' => true,
                'widgetContainers' => ['foo' => []],
                'widgets' => ['foo' => []],
            ],
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(BlogPost::class, $result);
    }

    #[Test]
    public function testUpdateWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->cms->blogs->posts->update(
            'objectId',
            [
                'id' => 'id',
                'abStatus' => 'automated_loser_variant',
                'abTestId' => 'abTestId',
                'archivedAt' => 0,
                'archivedInDashboard' => true,
                'attachedStylesheets' => [['foo' => []]],
                'authorName' => 'authorName',
                'blogAuthorId' => 'blogAuthorId',
                'campaign' => 'campaign',
                'categoryId' => 0,
                'contentGroupId' => 'contentGroupId',
                'contentTypeCategory' => '0',
                'created' => '2019-12-27T18:11:19.117Z',
                'createdById' => 'createdById',
                'currentlyPublished' => true,
                'currentState' => 'AUTOMATED',
                'domain' => 'domain',
                'dynamicPageDataSourceId' => 'dynamicPageDataSourceId',
                'dynamicPageDataSourceType' => 0,
                'dynamicPageHubDbTableId' => 'dynamicPageHubDbTableId',
                'enableDomainStylesheets' => true,
                'enableGoogleAmpOutputOverride' => true,
                'enableLayoutStylesheets' => true,
                'featuredImage' => 'featuredImage',
                'featuredImageAltText' => 'featuredImageAltText',
                'folderId' => 'folderId',
                'footerHtml' => 'footerHtml',
                'headHtml' => 'headHtml',
                'htmlTitle' => 'htmlTitle',
                'includeDefaultCustomCss' => true,
                'language' => 'af',
                'layoutSections' => [
                    'foo' => [
                        'cells' => [],
                        'cssClass' => 'cssClass',
                        'cssId' => 'cssId',
                        'cssStyle' => 'cssStyle',
                        'label' => 'label',
                        'name' => 'name',
                        'params' => ['foo' => []],
                        'rowMetaData' => [
                            [
                                'cssClass' => 'cssClass',
                                'styles' => [
                                    'backgroundColor' => ['a' => 0, 'b' => 0, 'g' => 0, 'r' => 0],
                                    'backgroundGradient' => [
                                        'angle' => ['units' => 'units', 'value' => 0],
                                        'colors' => [
                                            ['color' => ['a' => 0, 'b' => 0, 'g' => 0, 'r' => 0]],
                                        ],
                                        'sideOrCorner' => [
                                            'horizontalSide' => 'horizontalSide',
                                            'verticalSide' => 'verticalSide',
                                        ],
                                    ],
                                    'backgroundImage' => [
                                        'backgroundPosition' => 'backgroundPosition',
                                        'backgroundSize' => 'backgroundSize',
                                        'imageUrl' => 'imageUrl',
                                    ],
                                    'flexboxPositioning' => 'flexboxPositioning',
                                    'forceFullWidthSection' => true,
                                    'maxWidthSectionCentering' => 0,
                                    'verticalAlignment' => 'verticalAlignment',
                                    'breakpointStyles' => [
                                        'foo' => ['hidden' => true, 'margin' => [], 'padding' => []],
                                    ],
                                ],
                            ],
                        ],
                        'rows' => [[]],
                        'styles' => [
                            'backgroundColor' => ['a' => 0, 'b' => 0, 'g' => 0, 'r' => 0],
                            'backgroundGradient' => [
                                'angle' => ['units' => 'units', 'value' => 0],
                                'colors' => [
                                    ['color' => ['a' => 0, 'b' => 0, 'g' => 0, 'r' => 0]],
                                ],
                                'sideOrCorner' => [
                                    'horizontalSide' => 'horizontalSide',
                                    'verticalSide' => 'verticalSide',
                                ],
                            ],
                            'backgroundImage' => [
                                'backgroundPosition' => 'backgroundPosition',
                                'backgroundSize' => 'backgroundSize',
                                'imageUrl' => 'imageUrl',
                            ],
                            'flexboxPositioning' => 'flexboxPositioning',
                            'forceFullWidthSection' => true,
                            'maxWidthSectionCentering' => 0,
                            'verticalAlignment' => 'verticalAlignment',
                            'breakpointStyles' => [
                                'foo' => ['hidden' => true, 'margin' => [], 'padding' => []],
                            ],
                        ],
                        'type' => 'type',
                        'w' => 0,
                        'x' => 0,
                    ],
                ],
                'linkRelCanonicalUrl' => 'linkRelCanonicalUrl',
                'mabExperimentId' => 'mabExperimentId',
                'metaDescription' => 'metaDescription',
                'name' => 'name',
                'pageExpiryDate' => 0,
                'pageExpiryEnabled' => true,
                'pageExpiryRedirectId' => 0,
                'pageExpiryRedirectUrl' => 'pageExpiryRedirectUrl',
                'password' => 'password',
                'postBody' => 'postBody',
                'postSummary' => 'postSummary',
                'publicAccessRules' => [[]],
                'publicAccessRulesEnabled' => true,
                'publishDate' => '2019-12-27T18:11:19.117Z',
                'publishImmediately' => true,
                'rssBody' => 'rssBody',
                'rssSummary' => 'rssSummary',
                'slug' => 'slug',
                'state' => 'state',
                'tagIds' => [0],
                'themeSettingsValues' => ['foo' => []],
                'translatedFromId' => 'translatedFromId',
                'translations' => [
                    'foo' => [
                        'id' => 0,
                        'archivedInDashboard' => true,
                        'authorName' => 'authorName',
                        'campaign' => 'campaign',
                        'created' => '2019-12-27T18:11:19.117Z',
                        'name' => 'name',
                        'password' => 'password',
                        'publicAccessRules' => [[]],
                        'publicAccessRulesEnabled' => true,
                        'publishDate' => '2019-12-27T18:11:19.117Z',
                        'slug' => 'slug',
                        'state' => 'state',
                        'updated' => '2019-12-27T18:11:19.117Z',
                        'tagIds' => [0],
                    ],
                ],
                'updated' => '2019-12-27T18:11:19.117Z',
                'updatedById' => 'updatedById',
                'url' => 'url',
                'useFeaturedImage' => true,
                'widgetContainers' => ['foo' => []],
                'widgets' => ['foo' => []],
                'archived' => true,
            ],
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(BlogPost::class, $result);
    }

    #[Test]
    public function testList(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->cms->blogs->posts->list([]);

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(Page::class, $result);
    }

    #[Test]
    public function testDelete(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->cms->blogs->posts->delete('objectId', []);

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertNull($result);
    }

    #[Test]
    public function testAttachToLangGroup(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->cms->blogs->posts->attachToLangGroup([
            'id' => 'id', 'language' => 'language', 'primaryId' => 'primaryId',
        ]);

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertNull($result);
    }

    #[Test]
    public function testAttachToLangGroupWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->cms->blogs->posts->attachToLangGroup([
            'id' => 'id',
            'language' => 'language',
            'primaryId' => 'primaryId',
            'primaryLanguage' => 'primaryLanguage',
        ]);

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertNull($result);
    }

    #[Test]
    public function testClone(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->cms->blogs->posts->clone(['id' => 'id']);

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(BlogPost::class, $result);
    }

    #[Test]
    public function testCloneWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->cms->blogs->posts->clone([
            'id' => 'id', 'cloneName' => 'cloneName',
        ]);

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(BlogPost::class, $result);
    }

    #[Test]
    public function testCreateLangVariation(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->cms->blogs->posts->createLangVariation([
            'id' => 'id',
        ]);

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(BlogPost::class, $result);
    }

    #[Test]
    public function testCreateLangVariationWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->cms->blogs->posts->createLangVariation([
            'id' => 'id', 'language' => 'language',
        ]);

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(BlogPost::class, $result);
    }

    #[Test]
    public function testDetachFromLangGroup(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->cms->blogs->posts->detachFromLangGroup([
            'id' => 'id',
        ]);

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertNull($result);
    }

    #[Test]
    public function testDetachFromLangGroupWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->cms->blogs->posts->detachFromLangGroup([
            'id' => 'id',
        ]);

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertNull($result);
    }

    #[Test]
    public function testGet(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->cms->blogs->posts->get('objectId', []);

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(BlogPost::class, $result);
    }

    #[Test]
    public function testGetDraftByID(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->cms->blogs->posts->getDraftByID('objectId');

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(BlogPost::class, $result);
    }

    #[Test]
    public function testGetPreviousVersion(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->cms->blogs->posts->getPreviousVersion(
            'revisionId',
            ['objectId' => 'objectId']
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(VersionBlogPost::class, $result);
    }

    #[Test]
    public function testGetPreviousVersionWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->cms->blogs->posts->getPreviousVersion(
            'revisionId',
            ['objectId' => 'objectId']
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(VersionBlogPost::class, $result);
    }

    #[Test]
    public function testGetPreviousVersions(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->cms->blogs->posts->getPreviousVersions(
            'objectId',
            []
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(Page::class, $result);
    }

    #[Test]
    public function testPushLive(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->cms->blogs->posts->pushLive('objectId');

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertNull($result);
    }

    #[Test]
    public function testResetDraft(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->cms->blogs->posts->resetDraft('objectId');

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertNull($result);
    }

    #[Test]
    public function testRestorePreviousVersion(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->cms->blogs->posts->restorePreviousVersion(
            'revisionId',
            ['objectId' => 'objectId']
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(BlogPost::class, $result);
    }

    #[Test]
    public function testRestorePreviousVersionWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->cms->blogs->posts->restorePreviousVersion(
            'revisionId',
            ['objectId' => 'objectId']
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(BlogPost::class, $result);
    }

    #[Test]
    public function testRestorePreviousVersionToDraft(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->cms->blogs->posts->restorePreviousVersionToDraft(
            0,
            ['objectId' => 'objectId']
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(BlogPost::class, $result);
    }

    #[Test]
    public function testRestorePreviousVersionToDraftWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->cms->blogs->posts->restorePreviousVersionToDraft(
            0,
            ['objectId' => 'objectId']
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(BlogPost::class, $result);
    }

    #[Test]
    public function testSchedule(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->cms->blogs->posts->schedule([
            'id' => 'id', 'publishDate' => '2019-12-27T18:11:19.117Z',
        ]);

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertNull($result);
    }

    #[Test]
    public function testScheduleWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->cms->blogs->posts->schedule([
            'id' => 'id', 'publishDate' => '2019-12-27T18:11:19.117Z',
        ]);

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertNull($result);
    }

    #[Test]
    public function testSetLangPrimary(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->cms->blogs->posts->setLangPrimary(['id' => 'id']);

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertNull($result);
    }

    #[Test]
    public function testSetLangPrimaryWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->cms->blogs->posts->setLangPrimary(['id' => 'id']);

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertNull($result);
    }

    #[Test]
    public function testUpdateDraft(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->cms->blogs->posts->updateDraft(
            'objectId',
            [
                'id' => 'id',
                'abStatus' => 'automated_loser_variant',
                'abTestId' => 'abTestId',
                'archivedAt' => 0,
                'archivedInDashboard' => true,
                'attachedStylesheets' => [['foo' => []]],
                'authorName' => 'authorName',
                'blogAuthorId' => 'blogAuthorId',
                'campaign' => 'campaign',
                'categoryId' => 0,
                'contentGroupId' => 'contentGroupId',
                'contentTypeCategory' => '0',
                'created' => '2019-12-27T18:11:19.117Z',
                'createdById' => 'createdById',
                'currentlyPublished' => true,
                'currentState' => 'AUTOMATED',
                'domain' => 'domain',
                'dynamicPageDataSourceId' => 'dynamicPageDataSourceId',
                'dynamicPageDataSourceType' => 0,
                'dynamicPageHubDbTableId' => 'dynamicPageHubDbTableId',
                'enableDomainStylesheets' => true,
                'enableGoogleAmpOutputOverride' => true,
                'enableLayoutStylesheets' => true,
                'featuredImage' => 'featuredImage',
                'featuredImageAltText' => 'featuredImageAltText',
                'folderId' => 'folderId',
                'footerHtml' => 'footerHtml',
                'headHtml' => 'headHtml',
                'htmlTitle' => 'htmlTitle',
                'includeDefaultCustomCss' => true,
                'language' => 'af',
                'layoutSections' => [
                    'foo' => [
                        'cells' => [],
                        'cssClass' => 'cssClass',
                        'cssId' => 'cssId',
                        'cssStyle' => 'cssStyle',
                        'label' => 'label',
                        'name' => 'name',
                        'params' => ['foo' => []],
                        'rowMetaData' => [
                            [
                                'cssClass' => 'cssClass',
                                'styles' => [
                                    'backgroundColor' => ['a' => 0, 'b' => 0, 'g' => 0, 'r' => 0],
                                    'backgroundGradient' => [
                                        'angle' => ['units' => 'units', 'value' => 0],
                                        'colors' => [
                                            ['color' => ['a' => 0, 'b' => 0, 'g' => 0, 'r' => 0]],
                                        ],
                                        'sideOrCorner' => [
                                            'horizontalSide' => 'horizontalSide',
                                            'verticalSide' => 'verticalSide',
                                        ],
                                    ],
                                    'backgroundImage' => [
                                        'backgroundPosition' => 'backgroundPosition',
                                        'backgroundSize' => 'backgroundSize',
                                        'imageUrl' => 'imageUrl',
                                    ],
                                    'flexboxPositioning' => 'flexboxPositioning',
                                    'forceFullWidthSection' => true,
                                    'maxWidthSectionCentering' => 0,
                                    'verticalAlignment' => 'verticalAlignment',
                                ],
                            ],
                        ],
                        'rows' => [[]],
                        'styles' => [
                            'backgroundColor' => ['a' => 0, 'b' => 0, 'g' => 0, 'r' => 0],
                            'backgroundGradient' => [
                                'angle' => ['units' => 'units', 'value' => 0],
                                'colors' => [
                                    ['color' => ['a' => 0, 'b' => 0, 'g' => 0, 'r' => 0]],
                                ],
                                'sideOrCorner' => [
                                    'horizontalSide' => 'horizontalSide',
                                    'verticalSide' => 'verticalSide',
                                ],
                            ],
                            'backgroundImage' => [
                                'backgroundPosition' => 'backgroundPosition',
                                'backgroundSize' => 'backgroundSize',
                                'imageUrl' => 'imageUrl',
                            ],
                            'flexboxPositioning' => 'flexboxPositioning',
                            'forceFullWidthSection' => true,
                            'maxWidthSectionCentering' => 0,
                            'verticalAlignment' => 'verticalAlignment',
                        ],
                        'type' => 'type',
                        'w' => 0,
                        'x' => 0,
                    ],
                ],
                'linkRelCanonicalUrl' => 'linkRelCanonicalUrl',
                'mabExperimentId' => 'mabExperimentId',
                'metaDescription' => 'metaDescription',
                'name' => 'name',
                'pageExpiryDate' => 0,
                'pageExpiryEnabled' => true,
                'pageExpiryRedirectId' => 0,
                'pageExpiryRedirectUrl' => 'pageExpiryRedirectUrl',
                'password' => 'password',
                'postBody' => 'postBody',
                'postSummary' => 'postSummary',
                'publicAccessRules' => [[]],
                'publicAccessRulesEnabled' => true,
                'publishDate' => '2019-12-27T18:11:19.117Z',
                'publishImmediately' => true,
                'rssBody' => 'rssBody',
                'rssSummary' => 'rssSummary',
                'slug' => 'slug',
                'state' => 'state',
                'tagIds' => [0],
                'themeSettingsValues' => ['foo' => []],
                'translatedFromId' => 'translatedFromId',
                'translations' => [
                    'foo' => [
                        'id' => 0,
                        'archivedInDashboard' => true,
                        'authorName' => 'authorName',
                        'campaign' => 'campaign',
                        'created' => '2019-12-27T18:11:19.117Z',
                        'name' => 'name',
                        'password' => 'password',
                        'publicAccessRules' => [[]],
                        'publicAccessRulesEnabled' => true,
                        'publishDate' => '2019-12-27T18:11:19.117Z',
                        'slug' => 'slug',
                        'state' => 'state',
                        'updated' => '2019-12-27T18:11:19.117Z',
                    ],
                ],
                'updated' => '2019-12-27T18:11:19.117Z',
                'updatedById' => 'updatedById',
                'url' => 'url',
                'useFeaturedImage' => true,
                'widgetContainers' => ['foo' => []],
                'widgets' => ['foo' => []],
            ],
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(BlogPost::class, $result);
    }

    #[Test]
    public function testUpdateDraftWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->cms->blogs->posts->updateDraft(
            'objectId',
            [
                'id' => 'id',
                'abStatus' => 'automated_loser_variant',
                'abTestId' => 'abTestId',
                'archivedAt' => 0,
                'archivedInDashboard' => true,
                'attachedStylesheets' => [['foo' => []]],
                'authorName' => 'authorName',
                'blogAuthorId' => 'blogAuthorId',
                'campaign' => 'campaign',
                'categoryId' => 0,
                'contentGroupId' => 'contentGroupId',
                'contentTypeCategory' => '0',
                'created' => '2019-12-27T18:11:19.117Z',
                'createdById' => 'createdById',
                'currentlyPublished' => true,
                'currentState' => 'AUTOMATED',
                'domain' => 'domain',
                'dynamicPageDataSourceId' => 'dynamicPageDataSourceId',
                'dynamicPageDataSourceType' => 0,
                'dynamicPageHubDbTableId' => 'dynamicPageHubDbTableId',
                'enableDomainStylesheets' => true,
                'enableGoogleAmpOutputOverride' => true,
                'enableLayoutStylesheets' => true,
                'featuredImage' => 'featuredImage',
                'featuredImageAltText' => 'featuredImageAltText',
                'folderId' => 'folderId',
                'footerHtml' => 'footerHtml',
                'headHtml' => 'headHtml',
                'htmlTitle' => 'htmlTitle',
                'includeDefaultCustomCss' => true,
                'language' => 'af',
                'layoutSections' => [
                    'foo' => [
                        'cells' => [],
                        'cssClass' => 'cssClass',
                        'cssId' => 'cssId',
                        'cssStyle' => 'cssStyle',
                        'label' => 'label',
                        'name' => 'name',
                        'params' => ['foo' => []],
                        'rowMetaData' => [
                            [
                                'cssClass' => 'cssClass',
                                'styles' => [
                                    'backgroundColor' => ['a' => 0, 'b' => 0, 'g' => 0, 'r' => 0],
                                    'backgroundGradient' => [
                                        'angle' => ['units' => 'units', 'value' => 0],
                                        'colors' => [
                                            ['color' => ['a' => 0, 'b' => 0, 'g' => 0, 'r' => 0]],
                                        ],
                                        'sideOrCorner' => [
                                            'horizontalSide' => 'horizontalSide',
                                            'verticalSide' => 'verticalSide',
                                        ],
                                    ],
                                    'backgroundImage' => [
                                        'backgroundPosition' => 'backgroundPosition',
                                        'backgroundSize' => 'backgroundSize',
                                        'imageUrl' => 'imageUrl',
                                    ],
                                    'flexboxPositioning' => 'flexboxPositioning',
                                    'forceFullWidthSection' => true,
                                    'maxWidthSectionCentering' => 0,
                                    'verticalAlignment' => 'verticalAlignment',
                                    'breakpointStyles' => [
                                        'foo' => ['hidden' => true, 'margin' => [], 'padding' => []],
                                    ],
                                ],
                            ],
                        ],
                        'rows' => [[]],
                        'styles' => [
                            'backgroundColor' => ['a' => 0, 'b' => 0, 'g' => 0, 'r' => 0],
                            'backgroundGradient' => [
                                'angle' => ['units' => 'units', 'value' => 0],
                                'colors' => [
                                    ['color' => ['a' => 0, 'b' => 0, 'g' => 0, 'r' => 0]],
                                ],
                                'sideOrCorner' => [
                                    'horizontalSide' => 'horizontalSide',
                                    'verticalSide' => 'verticalSide',
                                ],
                            ],
                            'backgroundImage' => [
                                'backgroundPosition' => 'backgroundPosition',
                                'backgroundSize' => 'backgroundSize',
                                'imageUrl' => 'imageUrl',
                            ],
                            'flexboxPositioning' => 'flexboxPositioning',
                            'forceFullWidthSection' => true,
                            'maxWidthSectionCentering' => 0,
                            'verticalAlignment' => 'verticalAlignment',
                            'breakpointStyles' => [
                                'foo' => ['hidden' => true, 'margin' => [], 'padding' => []],
                            ],
                        ],
                        'type' => 'type',
                        'w' => 0,
                        'x' => 0,
                    ],
                ],
                'linkRelCanonicalUrl' => 'linkRelCanonicalUrl',
                'mabExperimentId' => 'mabExperimentId',
                'metaDescription' => 'metaDescription',
                'name' => 'name',
                'pageExpiryDate' => 0,
                'pageExpiryEnabled' => true,
                'pageExpiryRedirectId' => 0,
                'pageExpiryRedirectUrl' => 'pageExpiryRedirectUrl',
                'password' => 'password',
                'postBody' => 'postBody',
                'postSummary' => 'postSummary',
                'publicAccessRules' => [[]],
                'publicAccessRulesEnabled' => true,
                'publishDate' => '2019-12-27T18:11:19.117Z',
                'publishImmediately' => true,
                'rssBody' => 'rssBody',
                'rssSummary' => 'rssSummary',
                'slug' => 'slug',
                'state' => 'state',
                'tagIds' => [0],
                'themeSettingsValues' => ['foo' => []],
                'translatedFromId' => 'translatedFromId',
                'translations' => [
                    'foo' => [
                        'id' => 0,
                        'archivedInDashboard' => true,
                        'authorName' => 'authorName',
                        'campaign' => 'campaign',
                        'created' => '2019-12-27T18:11:19.117Z',
                        'name' => 'name',
                        'password' => 'password',
                        'publicAccessRules' => [[]],
                        'publicAccessRulesEnabled' => true,
                        'publishDate' => '2019-12-27T18:11:19.117Z',
                        'slug' => 'slug',
                        'state' => 'state',
                        'updated' => '2019-12-27T18:11:19.117Z',
                        'tagIds' => [0],
                    ],
                ],
                'updated' => '2019-12-27T18:11:19.117Z',
                'updatedById' => 'updatedById',
                'url' => 'url',
                'useFeaturedImage' => true,
                'widgetContainers' => ['foo' => []],
                'widgets' => ['foo' => []],
            ],
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(BlogPost::class, $result);
    }

    #[Test]
    public function testUpdateLangs(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->cms->blogs->posts->updateLangs([
            'languages' => ['foo' => 'string'], 'primaryId' => 'primaryId',
        ]);

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertNull($result);
    }

    #[Test]
    public function testUpdateLangsWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->cms->blogs->posts->updateLangs([
            'languages' => ['foo' => 'string'], 'primaryId' => 'primaryId',
        ]);

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertNull($result);
    }
}
