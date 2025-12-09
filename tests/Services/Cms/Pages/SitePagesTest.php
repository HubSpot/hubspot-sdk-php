<?php

namespace Tests\Services\Cms\Pages;

use HubspotSDK\Client;
use HubspotSDK\Cms\Pages\BatchResponsePage;
use HubspotSDK\Cms\Pages\Page;
use HubspotSDK\Cms\Pages\VersionPage;
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

        $result = $this->client->cms->pages->sitePages->create([
            'id' => 'id',
            'abStatus' => 'automated_loser_variant',
            'abTestId' => 'abTestId',
            'archivedAt' => new \DateTimeImmutable('2019-12-27T18:11:19.117Z'),
            'archivedInDashboard' => true,
            'attachedStylesheets' => [['foo' => []]],
            'authorName' => 'authorName',
            'campaign' => 'campaign',
            'categoryId' => 0,
            'contentGroupId' => 'contentGroupId',
            'contentTypeCategory' => '0',
            'created' => new \DateTimeImmutable('2019-12-27T18:11:19.117Z'),
            'createdById' => 'createdById',
            'currentlyPublished' => true,
            'currentState' => 'AUTOMATED',
            'domain' => 'domain',
            'dynamicPageDataSourceId' => 'dynamicPageDataSourceId',
            'dynamicPageDataSourceType' => 0,
            'dynamicPageHubDbTableId' => 'dynamicPageHubDbTableId',
            'enableDomainStylesheets' => true,
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
            'pageRedirected' => true,
            'password' => 'password',
            'publicAccessRules' => [[]],
            'publicAccessRulesEnabled' => true,
            'publishDate' => new \DateTimeImmutable('2019-12-27T18:11:19.117Z'),
            'publishImmediately' => true,
            'slug' => 'slug',
            'state' => 'state',
            'subcategory' => 'subcategory',
            'templatePath' => 'templatePath',
            'themeSettingsValues' => ['foo' => []],
            'translatedFromId' => 'translatedFromId',
            'translations' => [
                'foo' => [
                    'id' => 0,
                    'archivedInDashboard' => true,
                    'authorName' => 'authorName',
                    'campaign' => 'campaign',
                    'created' => new \DateTimeImmutable('2019-12-27T18:11:19.117Z'),
                    'name' => 'name',
                    'password' => 'password',
                    'publicAccessRules' => [[]],
                    'publicAccessRulesEnabled' => true,
                    'publishDate' => new \DateTimeImmutable('2019-12-27T18:11:19.117Z'),
                    'slug' => 'slug',
                    'state' => 'state',
                    'updated' => new \DateTimeImmutable('2019-12-27T18:11:19.117Z'),
                ],
            ],
            'updated' => new \DateTimeImmutable('2019-12-27T18:11:19.117Z'),
            'updatedById' => 'updatedById',
            'url' => 'url',
            'useFeaturedImage' => true,
            'widgetContainers' => ['foo' => []],
            'widgets' => ['foo' => []],
        ]);

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertNull($result);
    }

    #[Test]
    public function testCreateWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->cms->pages->sitePages->create([
            'id' => 'id',
            'abStatus' => 'automated_loser_variant',
            'abTestId' => 'abTestId',
            'archivedAt' => new \DateTimeImmutable('2019-12-27T18:11:19.117Z'),
            'archivedInDashboard' => true,
            'attachedStylesheets' => [['foo' => []]],
            'authorName' => 'authorName',
            'campaign' => 'campaign',
            'categoryId' => 0,
            'contentGroupId' => 'contentGroupId',
            'contentTypeCategory' => '0',
            'created' => new \DateTimeImmutable('2019-12-27T18:11:19.117Z'),
            'createdById' => 'createdById',
            'currentlyPublished' => true,
            'currentState' => 'AUTOMATED',
            'domain' => 'domain',
            'dynamicPageDataSourceId' => 'dynamicPageDataSourceId',
            'dynamicPageDataSourceType' => 0,
            'dynamicPageHubDbTableId' => 'dynamicPageHubDbTableId',
            'enableDomainStylesheets' => true,
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
            'pageRedirected' => true,
            'password' => 'password',
            'publicAccessRules' => [[]],
            'publicAccessRulesEnabled' => true,
            'publishDate' => new \DateTimeImmutable('2019-12-27T18:11:19.117Z'),
            'publishImmediately' => true,
            'slug' => 'slug',
            'state' => 'state',
            'subcategory' => 'subcategory',
            'templatePath' => 'templatePath',
            'themeSettingsValues' => ['foo' => []],
            'translatedFromId' => 'translatedFromId',
            'translations' => [
                'foo' => [
                    'id' => 0,
                    'archivedInDashboard' => true,
                    'authorName' => 'authorName',
                    'campaign' => 'campaign',
                    'created' => new \DateTimeImmutable('2019-12-27T18:11:19.117Z'),
                    'name' => 'name',
                    'password' => 'password',
                    'publicAccessRules' => [[]],
                    'publicAccessRulesEnabled' => true,
                    'publishDate' => new \DateTimeImmutable('2019-12-27T18:11:19.117Z'),
                    'slug' => 'slug',
                    'state' => 'state',
                    'updated' => new \DateTimeImmutable('2019-12-27T18:11:19.117Z'),
                    'tagIds' => [0],
                ],
            ],
            'updated' => new \DateTimeImmutable('2019-12-27T18:11:19.117Z'),
            'updatedById' => 'updatedById',
            'url' => 'url',
            'useFeaturedImage' => true,
            'widgetContainers' => ['foo' => []],
            'widgets' => ['foo' => []],
        ]);

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertNull($result);
    }

    #[Test]
    public function testUpdate(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->cms->pages->sitePages->update(
            'objectId',
            [
                'id' => 'id',
                'abStatus' => 'automated_loser_variant',
                'abTestId' => 'abTestId',
                'archivedAt' => new \DateTimeImmutable('2019-12-27T18:11:19.117Z'),
                'archivedInDashboard' => true,
                'attachedStylesheets' => [['foo' => []]],
                'authorName' => 'authorName',
                'campaign' => 'campaign',
                'categoryId' => 0,
                'contentGroupId' => 'contentGroupId',
                'contentTypeCategory' => '0',
                'created' => new \DateTimeImmutable('2019-12-27T18:11:19.117Z'),
                'createdById' => 'createdById',
                'currentlyPublished' => true,
                'currentState' => 'AUTOMATED',
                'domain' => 'domain',
                'dynamicPageDataSourceId' => 'dynamicPageDataSourceId',
                'dynamicPageDataSourceType' => 0,
                'dynamicPageHubDbTableId' => 'dynamicPageHubDbTableId',
                'enableDomainStylesheets' => true,
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
                'pageRedirected' => true,
                'password' => 'password',
                'publicAccessRules' => [[]],
                'publicAccessRulesEnabled' => true,
                'publishDate' => new \DateTimeImmutable('2019-12-27T18:11:19.117Z'),
                'publishImmediately' => true,
                'slug' => 'slug',
                'state' => 'state',
                'subcategory' => 'subcategory',
                'templatePath' => 'templatePath',
                'themeSettingsValues' => ['foo' => []],
                'translatedFromId' => 'translatedFromId',
                'translations' => [
                    'foo' => [
                        'id' => 0,
                        'archivedInDashboard' => true,
                        'authorName' => 'authorName',
                        'campaign' => 'campaign',
                        'created' => new \DateTimeImmutable('2019-12-27T18:11:19.117Z'),
                        'name' => 'name',
                        'password' => 'password',
                        'publicAccessRules' => [[]],
                        'publicAccessRulesEnabled' => true,
                        'publishDate' => new \DateTimeImmutable('2019-12-27T18:11:19.117Z'),
                        'slug' => 'slug',
                        'state' => 'state',
                        'updated' => new \DateTimeImmutable('2019-12-27T18:11:19.117Z'),
                    ],
                ],
                'updated' => new \DateTimeImmutable('2019-12-27T18:11:19.117Z'),
                'updatedById' => 'updatedById',
                'url' => 'url',
                'useFeaturedImage' => true,
                'widgetContainers' => ['foo' => []],
                'widgets' => ['foo' => []],
            ],
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(Page::class, $result);
    }

    #[Test]
    public function testUpdateWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->cms->pages->sitePages->update(
            'objectId',
            [
                'id' => 'id',
                'abStatus' => 'automated_loser_variant',
                'abTestId' => 'abTestId',
                'archivedAt' => new \DateTimeImmutable('2019-12-27T18:11:19.117Z'),
                'archivedInDashboard' => true,
                'attachedStylesheets' => [['foo' => []]],
                'authorName' => 'authorName',
                'campaign' => 'campaign',
                'categoryId' => 0,
                'contentGroupId' => 'contentGroupId',
                'contentTypeCategory' => '0',
                'created' => new \DateTimeImmutable('2019-12-27T18:11:19.117Z'),
                'createdById' => 'createdById',
                'currentlyPublished' => true,
                'currentState' => 'AUTOMATED',
                'domain' => 'domain',
                'dynamicPageDataSourceId' => 'dynamicPageDataSourceId',
                'dynamicPageDataSourceType' => 0,
                'dynamicPageHubDbTableId' => 'dynamicPageHubDbTableId',
                'enableDomainStylesheets' => true,
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
                'pageRedirected' => true,
                'password' => 'password',
                'publicAccessRules' => [[]],
                'publicAccessRulesEnabled' => true,
                'publishDate' => new \DateTimeImmutable('2019-12-27T18:11:19.117Z'),
                'publishImmediately' => true,
                'slug' => 'slug',
                'state' => 'state',
                'subcategory' => 'subcategory',
                'templatePath' => 'templatePath',
                'themeSettingsValues' => ['foo' => []],
                'translatedFromId' => 'translatedFromId',
                'translations' => [
                    'foo' => [
                        'id' => 0,
                        'archivedInDashboard' => true,
                        'authorName' => 'authorName',
                        'campaign' => 'campaign',
                        'created' => new \DateTimeImmutable('2019-12-27T18:11:19.117Z'),
                        'name' => 'name',
                        'password' => 'password',
                        'publicAccessRules' => [[]],
                        'publicAccessRulesEnabled' => true,
                        'publishDate' => new \DateTimeImmutable('2019-12-27T18:11:19.117Z'),
                        'slug' => 'slug',
                        'state' => 'state',
                        'updated' => new \DateTimeImmutable('2019-12-27T18:11:19.117Z'),
                        'tagIds' => [0],
                    ],
                ],
                'updated' => new \DateTimeImmutable('2019-12-27T18:11:19.117Z'),
                'updatedById' => 'updatedById',
                'url' => 'url',
                'useFeaturedImage' => true,
                'widgetContainers' => ['foo' => []],
                'widgets' => ['foo' => []],
                'archived' => true,
            ],
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(Page::class, $result);
    }

    #[Test]
    public function testList(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->cms->pages->sitePages->list([]);

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(\HubspotSDK\Page::class, $result);
    }

    #[Test]
    public function testDelete(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->cms->pages->sitePages->delete('objectId', []);

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertNull($result);
    }

    #[Test]
    public function testAttachToLangGroup(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->cms->pages->sitePages->attachToLangGroup([
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

        $result = $this->client->cms->pages->sitePages->attachToLangGroup([
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

        $result = $this->client->cms->pages->sitePages->clone(['id' => 'id']);

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(Page::class, $result);
    }

    #[Test]
    public function testCloneWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->cms->pages->sitePages->clone([
            'id' => 'id', 'cloneName' => 'cloneName',
        ]);

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(Page::class, $result);
    }

    #[Test]
    public function testCreateAbTestVariation(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->cms->pages->sitePages->createAbTestVariation([
            'contentId' => 'contentId', 'variationName' => 'variationName',
        ]);

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(Page::class, $result);
    }

    #[Test]
    public function testCreateAbTestVariationWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->cms->pages->sitePages->createAbTestVariation([
            'contentId' => 'contentId', 'variationName' => 'variationName',
        ]);

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(Page::class, $result);
    }

    #[Test]
    public function testCreateBatch(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->cms->pages->sitePages->createBatch([
            'inputs' => [
                [
                    'id' => 'id',
                    'abStatus' => 'automated_loser_variant',
                    'abTestId' => 'abTestId',
                    'archivedAt' => new \DateTimeImmutable('2019-12-27T18:11:19.117Z'),
                    'archivedInDashboard' => true,
                    'attachedStylesheets' => [['foo' => []]],
                    'authorName' => 'authorName',
                    'campaign' => 'campaign',
                    'categoryId' => 0,
                    'contentGroupId' => 'contentGroupId',
                    'contentTypeCategory' => '0',
                    'created' => new \DateTimeImmutable('2019-12-27T18:11:19.117Z'),
                    'createdById' => 'createdById',
                    'currentlyPublished' => true,
                    'currentState' => 'AUTOMATED',
                    'domain' => 'domain',
                    'dynamicPageDataSourceId' => 'dynamicPageDataSourceId',
                    'dynamicPageDataSourceType' => 0,
                    'dynamicPageHubDbTableId' => 'dynamicPageHubDbTableId',
                    'enableDomainStylesheets' => true,
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
                                        'backgroundColor' => [
                                            'a' => 0, 'b' => 0, 'g' => 0, 'r' => 0,
                                        ],
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
                    'pageRedirected' => true,
                    'password' => 'password',
                    'publicAccessRules' => [[]],
                    'publicAccessRulesEnabled' => true,
                    'publishDate' => new \DateTimeImmutable('2019-12-27T18:11:19.117Z'),
                    'publishImmediately' => true,
                    'slug' => 'slug',
                    'state' => 'state',
                    'subcategory' => 'subcategory',
                    'templatePath' => 'templatePath',
                    'themeSettingsValues' => ['foo' => []],
                    'translatedFromId' => 'translatedFromId',
                    'translations' => [
                        'foo' => [
                            'id' => 0,
                            'archivedInDashboard' => true,
                            'authorName' => 'authorName',
                            'campaign' => 'campaign',
                            'created' => new \DateTimeImmutable('2019-12-27T18:11:19.117Z'),
                            'name' => 'name',
                            'password' => 'password',
                            'publicAccessRules' => [[]],
                            'publicAccessRulesEnabled' => true,
                            'publishDate' => new \DateTimeImmutable(
                                '2019-12-27T18:11:19.117Z'
                            ),
                            'slug' => 'slug',
                            'state' => 'state',
                            'updated' => new \DateTimeImmutable('2019-12-27T18:11:19.117Z'),
                        ],
                    ],
                    'updated' => new \DateTimeImmutable('2019-12-27T18:11:19.117Z'),
                    'updatedById' => 'updatedById',
                    'url' => 'url',
                    'useFeaturedImage' => true,
                    'widgetContainers' => ['foo' => []],
                    'widgets' => ['foo' => []],
                ],
            ],
        ]);

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(BatchResponsePage::class, $result);
    }

    #[Test]
    public function testCreateBatchWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->cms->pages->sitePages->createBatch([
            'inputs' => [
                [
                    'id' => 'id',
                    'abStatus' => 'automated_loser_variant',
                    'abTestId' => 'abTestId',
                    'archivedAt' => new \DateTimeImmutable('2019-12-27T18:11:19.117Z'),
                    'archivedInDashboard' => true,
                    'attachedStylesheets' => [['foo' => []]],
                    'authorName' => 'authorName',
                    'campaign' => 'campaign',
                    'categoryId' => 0,
                    'contentGroupId' => 'contentGroupId',
                    'contentTypeCategory' => '0',
                    'created' => new \DateTimeImmutable('2019-12-27T18:11:19.117Z'),
                    'createdById' => 'createdById',
                    'currentlyPublished' => true,
                    'currentState' => 'AUTOMATED',
                    'domain' => 'domain',
                    'dynamicPageDataSourceId' => 'dynamicPageDataSourceId',
                    'dynamicPageDataSourceType' => 0,
                    'dynamicPageHubDbTableId' => 'dynamicPageHubDbTableId',
                    'enableDomainStylesheets' => true,
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
                                        'backgroundColor' => [
                                            'a' => 0, 'b' => 0, 'g' => 0, 'r' => 0,
                                        ],
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
                                            'foo' => [
                                                'hidden' => true, 'margin' => [], 'padding' => [],
                                            ],
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
                    'pageRedirected' => true,
                    'password' => 'password',
                    'publicAccessRules' => [[]],
                    'publicAccessRulesEnabled' => true,
                    'publishDate' => new \DateTimeImmutable('2019-12-27T18:11:19.117Z'),
                    'publishImmediately' => true,
                    'slug' => 'slug',
                    'state' => 'state',
                    'subcategory' => 'subcategory',
                    'templatePath' => 'templatePath',
                    'themeSettingsValues' => ['foo' => []],
                    'translatedFromId' => 'translatedFromId',
                    'translations' => [
                        'foo' => [
                            'id' => 0,
                            'archivedInDashboard' => true,
                            'authorName' => 'authorName',
                            'campaign' => 'campaign',
                            'created' => new \DateTimeImmutable('2019-12-27T18:11:19.117Z'),
                            'name' => 'name',
                            'password' => 'password',
                            'publicAccessRules' => [[]],
                            'publicAccessRulesEnabled' => true,
                            'publishDate' => new \DateTimeImmutable(
                                '2019-12-27T18:11:19.117Z'
                            ),
                            'slug' => 'slug',
                            'state' => 'state',
                            'updated' => new \DateTimeImmutable('2019-12-27T18:11:19.117Z'),
                            'tagIds' => [0],
                        ],
                    ],
                    'updated' => new \DateTimeImmutable('2019-12-27T18:11:19.117Z'),
                    'updatedById' => 'updatedById',
                    'url' => 'url',
                    'useFeaturedImage' => true,
                    'widgetContainers' => ['foo' => []],
                    'widgets' => ['foo' => []],
                ],
            ],
        ]);

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(BatchResponsePage::class, $result);
    }

    #[Test]
    public function testCreateLanguageVariation(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->cms->pages->sitePages->createLanguageVariation([
            'id' => 'id',
        ]);

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(Page::class, $result);
    }

    #[Test]
    public function testCreateLanguageVariationWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->cms->pages->sitePages->createLanguageVariation([
            'id' => 'id',
            'language' => 'language',
            'primaryLanguage' => 'primaryLanguage',
        ]);

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(Page::class, $result);
    }

    #[Test]
    public function testDeleteBatch(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->cms->pages->sitePages->deleteBatch([
            'inputs' => ['string'],
        ]);

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertNull($result);
    }

    #[Test]
    public function testDeleteBatchWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->cms->pages->sitePages->deleteBatch([
            'inputs' => ['string'],
        ]);

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertNull($result);
    }

    #[Test]
    public function testDetachFromLangGroup(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->cms->pages->sitePages->detachFromLangGroup([
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

        $result = $this->client->cms->pages->sitePages->detachFromLangGroup([
            'id' => 'id',
        ]);

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertNull($result);
    }

    #[Test]
    public function testEndAbTest(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->cms->pages->sitePages->endAbTest([
            'abTestId' => 'abTestId', 'winnerId' => 'winnerId',
        ]);

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertNull($result);
    }

    #[Test]
    public function testEndAbTestWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->cms->pages->sitePages->endAbTest([
            'abTestId' => 'abTestId', 'winnerId' => 'winnerId',
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

        $result = $this->client->cms->pages->sitePages->get('objectId', []);

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(Page::class, $result);
    }

    #[Test]
    public function testGetBatch(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->cms->pages->sitePages->getBatch([
            'inputs' => ['string'],
        ]);

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(BatchResponsePage::class, $result);
    }

    #[Test]
    public function testGetBatchWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->cms->pages->sitePages->getBatch([
            'inputs' => ['string'], 'archived' => true,
        ]);

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(BatchResponsePage::class, $result);
    }

    #[Test]
    public function testGetDraft(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->cms->pages->sitePages->getDraft('objectId');

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(Page::class, $result);
    }

    #[Test]
    public function testGetRevision(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->cms->pages->sitePages->getRevision(
            'revisionId',
            ['objectId' => 'objectId']
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(VersionPage::class, $result);
    }

    #[Test]
    public function testGetRevisionWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->cms->pages->sitePages->getRevision(
            'revisionId',
            ['objectId' => 'objectId']
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(VersionPage::class, $result);
    }

    #[Test]
    public function testListRevisions(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->cms->pages->sitePages->listRevisions(
            'objectId',
            []
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(\HubspotSDK\Page::class, $result);
    }

    #[Test]
    public function testPublishDraft(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->cms->pages->sitePages->publishDraft('objectId');

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertNull($result);
    }

    #[Test]
    public function testRerunAbTest(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->cms->pages->sitePages->rerunAbTest([
            'abTestId' => 'abTestId', 'variationId' => 'variationId',
        ]);

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertNull($result);
    }

    #[Test]
    public function testRerunAbTestWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->cms->pages->sitePages->rerunAbTest([
            'abTestId' => 'abTestId', 'variationId' => 'variationId',
        ]);

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertNull($result);
    }

    #[Test]
    public function testResetDraft(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->cms->pages->sitePages->resetDraft('objectId');

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertNull($result);
    }

    #[Test]
    public function testRestoreRevision(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->cms->pages->sitePages->restoreRevision(
            'revisionId',
            ['objectId' => 'objectId']
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(Page::class, $result);
    }

    #[Test]
    public function testRestoreRevisionWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->cms->pages->sitePages->restoreRevision(
            'revisionId',
            ['objectId' => 'objectId']
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(Page::class, $result);
    }

    #[Test]
    public function testRestoreRevisionToDraft(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->cms->pages->sitePages->restoreRevisionToDraft(
            0,
            ['objectId' => 'objectId']
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(Page::class, $result);
    }

    #[Test]
    public function testRestoreRevisionToDraftWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->cms->pages->sitePages->restoreRevisionToDraft(
            0,
            ['objectId' => 'objectId']
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(Page::class, $result);
    }

    #[Test]
    public function testSchedule(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->cms->pages->sitePages->schedule([
            'id' => 'id',
            'publishDate' => new \DateTimeImmutable('2019-12-27T18:11:19.117Z'),
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

        $result = $this->client->cms->pages->sitePages->schedule([
            'id' => 'id',
            'publishDate' => new \DateTimeImmutable('2019-12-27T18:11:19.117Z'),
        ]);

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertNull($result);
    }

    #[Test]
    public function testSetNewLangPrimary(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->cms->pages->sitePages->setNewLangPrimary([
            'id' => 'id',
        ]);

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertNull($result);
    }

    #[Test]
    public function testSetNewLangPrimaryWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->cms->pages->sitePages->setNewLangPrimary([
            'id' => 'id',
        ]);

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertNull($result);
    }

    #[Test]
    public function testUpdateBatch(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->cms->pages->sitePages->updateBatch([
            'inputs' => [[]],
        ]);

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(BatchResponsePage::class, $result);
    }

    #[Test]
    public function testUpdateBatchWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->cms->pages->sitePages->updateBatch([
            'inputs' => [[]], 'archived' => true,
        ]);

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(BatchResponsePage::class, $result);
    }

    #[Test]
    public function testUpdateDraft(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->cms->pages->sitePages->updateDraft(
            'objectId',
            [
                'id' => 'id',
                'abStatus' => 'automated_loser_variant',
                'abTestId' => 'abTestId',
                'archivedAt' => new \DateTimeImmutable('2019-12-27T18:11:19.117Z'),
                'archivedInDashboard' => true,
                'attachedStylesheets' => [['foo' => []]],
                'authorName' => 'authorName',
                'campaign' => 'campaign',
                'categoryId' => 0,
                'contentGroupId' => 'contentGroupId',
                'contentTypeCategory' => '0',
                'created' => new \DateTimeImmutable('2019-12-27T18:11:19.117Z'),
                'createdById' => 'createdById',
                'currentlyPublished' => true,
                'currentState' => 'AUTOMATED',
                'domain' => 'domain',
                'dynamicPageDataSourceId' => 'dynamicPageDataSourceId',
                'dynamicPageDataSourceType' => 0,
                'dynamicPageHubDbTableId' => 'dynamicPageHubDbTableId',
                'enableDomainStylesheets' => true,
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
                'pageRedirected' => true,
                'password' => 'password',
                'publicAccessRules' => [[]],
                'publicAccessRulesEnabled' => true,
                'publishDate' => new \DateTimeImmutable('2019-12-27T18:11:19.117Z'),
                'publishImmediately' => true,
                'slug' => 'slug',
                'state' => 'state',
                'subcategory' => 'subcategory',
                'templatePath' => 'templatePath',
                'themeSettingsValues' => ['foo' => []],
                'translatedFromId' => 'translatedFromId',
                'translations' => [
                    'foo' => [
                        'id' => 0,
                        'archivedInDashboard' => true,
                        'authorName' => 'authorName',
                        'campaign' => 'campaign',
                        'created' => new \DateTimeImmutable('2019-12-27T18:11:19.117Z'),
                        'name' => 'name',
                        'password' => 'password',
                        'publicAccessRules' => [[]],
                        'publicAccessRulesEnabled' => true,
                        'publishDate' => new \DateTimeImmutable('2019-12-27T18:11:19.117Z'),
                        'slug' => 'slug',
                        'state' => 'state',
                        'updated' => new \DateTimeImmutable('2019-12-27T18:11:19.117Z'),
                    ],
                ],
                'updated' => new \DateTimeImmutable('2019-12-27T18:11:19.117Z'),
                'updatedById' => 'updatedById',
                'url' => 'url',
                'useFeaturedImage' => true,
                'widgetContainers' => ['foo' => []],
                'widgets' => ['foo' => []],
            ],
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(Page::class, $result);
    }

    #[Test]
    public function testUpdateDraftWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->cms->pages->sitePages->updateDraft(
            'objectId',
            [
                'id' => 'id',
                'abStatus' => 'automated_loser_variant',
                'abTestId' => 'abTestId',
                'archivedAt' => new \DateTimeImmutable('2019-12-27T18:11:19.117Z'),
                'archivedInDashboard' => true,
                'attachedStylesheets' => [['foo' => []]],
                'authorName' => 'authorName',
                'campaign' => 'campaign',
                'categoryId' => 0,
                'contentGroupId' => 'contentGroupId',
                'contentTypeCategory' => '0',
                'created' => new \DateTimeImmutable('2019-12-27T18:11:19.117Z'),
                'createdById' => 'createdById',
                'currentlyPublished' => true,
                'currentState' => 'AUTOMATED',
                'domain' => 'domain',
                'dynamicPageDataSourceId' => 'dynamicPageDataSourceId',
                'dynamicPageDataSourceType' => 0,
                'dynamicPageHubDbTableId' => 'dynamicPageHubDbTableId',
                'enableDomainStylesheets' => true,
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
                'pageRedirected' => true,
                'password' => 'password',
                'publicAccessRules' => [[]],
                'publicAccessRulesEnabled' => true,
                'publishDate' => new \DateTimeImmutable('2019-12-27T18:11:19.117Z'),
                'publishImmediately' => true,
                'slug' => 'slug',
                'state' => 'state',
                'subcategory' => 'subcategory',
                'templatePath' => 'templatePath',
                'themeSettingsValues' => ['foo' => []],
                'translatedFromId' => 'translatedFromId',
                'translations' => [
                    'foo' => [
                        'id' => 0,
                        'archivedInDashboard' => true,
                        'authorName' => 'authorName',
                        'campaign' => 'campaign',
                        'created' => new \DateTimeImmutable('2019-12-27T18:11:19.117Z'),
                        'name' => 'name',
                        'password' => 'password',
                        'publicAccessRules' => [[]],
                        'publicAccessRulesEnabled' => true,
                        'publishDate' => new \DateTimeImmutable('2019-12-27T18:11:19.117Z'),
                        'slug' => 'slug',
                        'state' => 'state',
                        'updated' => new \DateTimeImmutable('2019-12-27T18:11:19.117Z'),
                        'tagIds' => [0],
                    ],
                ],
                'updated' => new \DateTimeImmutable('2019-12-27T18:11:19.117Z'),
                'updatedById' => 'updatedById',
                'url' => 'url',
                'useFeaturedImage' => true,
                'widgetContainers' => ['foo' => []],
                'widgets' => ['foo' => []],
            ],
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(Page::class, $result);
    }

    #[Test]
    public function testUpdateLanguages(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->cms->pages->sitePages->updateLanguages([
            'languages' => ['foo' => 'string'], 'primaryId' => 'primaryId',
        ]);

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertNull($result);
    }

    #[Test]
    public function testUpdateLanguagesWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->cms->pages->sitePages->updateLanguages([
            'languages' => ['foo' => 'string'], 'primaryId' => 'primaryId',
        ]);

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertNull($result);
    }
}
