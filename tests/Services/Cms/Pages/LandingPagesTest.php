<?php

namespace Tests\Services\Cms\Pages;

use HubspotSDK\Client;
use HubspotSDK\Cms\Pages\BatchResponseContentFolder;
use HubspotSDK\Cms\Pages\BatchResponsePage;
use HubspotSDK\Cms\Pages\ContentFolder;
use HubspotSDK\Cms\Pages\Page;
use HubspotSDK\Cms\Pages\VersionContentFolder;
use HubspotSDK\Cms\Pages\VersionPage;
use PHPUnit\Framework\Attributes\CoversNothing;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Tests\UnsupportedMockTests;

/**
 * @internal
 */
#[CoversNothing]
final class LandingPagesTest extends TestCase
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

        $result = $this->client->cms->pages->landingPages->create([
            'id' => 'id',
            'abStatus' => 'automated_loser_variant',
            'abTestID' => 'abTestId',
            'archivedAt' => new \DateTimeImmutable('2019-12-27T18:11:19.117Z'),
            'archivedInDashboard' => true,
            'attachedStylesheets' => [['foo' => []]],
            'authorName' => 'authorName',
            'campaign' => 'campaign',
            'categoryID' => 0,
            'contentGroupID' => 'contentGroupId',
            'contentTypeCategory' => '0',
            'created' => new \DateTimeImmutable('2019-12-27T18:11:19.117Z'),
            'createdByID' => 'createdById',
            'currentlyPublished' => true,
            'currentState' => 'AUTOMATED',
            'domain' => 'domain',
            'dynamicPageDataSourceID' => 'dynamicPageDataSourceId',
            'dynamicPageDataSourceType' => 0,
            'dynamicPageHubDBTableID' => 'dynamicPageHubDbTableId',
            'enableDomainStylesheets' => true,
            'enableLayoutStylesheets' => true,
            'featuredImage' => 'featuredImage',
            'featuredImageAltText' => 'featuredImageAltText',
            'folderID' => 'folderId',
            'footerHTML' => 'footerHtml',
            'headHTML' => 'headHtml',
            'htmlTitle' => 'htmlTitle',
            'includeDefaultCustomCss' => true,
            'language' => 'af',
            'layoutSections' => [
                'foo' => [
                    'cells' => [],
                    'cssClass' => 'cssClass',
                    'cssID' => 'cssId',
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
                                    'imageURL' => 'imageUrl',
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
                            'imageURL' => 'imageUrl',
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
            'linkRelCanonicalURL' => 'linkRelCanonicalUrl',
            'mabExperimentID' => 'mabExperimentId',
            'metaDescription' => 'metaDescription',
            'name' => 'name',
            'pageExpiryDate' => 0,
            'pageExpiryEnabled' => true,
            'pageExpiryRedirectID' => 0,
            'pageExpiryRedirectURL' => 'pageExpiryRedirectUrl',
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
            'translatedFromID' => 'translatedFromId',
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
            'updatedByID' => 'updatedById',
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

        $result = $this->client->cms->pages->landingPages->create([
            'id' => 'id',
            'abStatus' => 'automated_loser_variant',
            'abTestID' => 'abTestId',
            'archivedAt' => new \DateTimeImmutable('2019-12-27T18:11:19.117Z'),
            'archivedInDashboard' => true,
            'attachedStylesheets' => [['foo' => []]],
            'authorName' => 'authorName',
            'campaign' => 'campaign',
            'categoryID' => 0,
            'contentGroupID' => 'contentGroupId',
            'contentTypeCategory' => '0',
            'created' => new \DateTimeImmutable('2019-12-27T18:11:19.117Z'),
            'createdByID' => 'createdById',
            'currentlyPublished' => true,
            'currentState' => 'AUTOMATED',
            'domain' => 'domain',
            'dynamicPageDataSourceID' => 'dynamicPageDataSourceId',
            'dynamicPageDataSourceType' => 0,
            'dynamicPageHubDBTableID' => 'dynamicPageHubDbTableId',
            'enableDomainStylesheets' => true,
            'enableLayoutStylesheets' => true,
            'featuredImage' => 'featuredImage',
            'featuredImageAltText' => 'featuredImageAltText',
            'folderID' => 'folderId',
            'footerHTML' => 'footerHtml',
            'headHTML' => 'headHtml',
            'htmlTitle' => 'htmlTitle',
            'includeDefaultCustomCss' => true,
            'language' => 'af',
            'layoutSections' => [
                'foo' => [
                    'cells' => [],
                    'cssClass' => 'cssClass',
                    'cssID' => 'cssId',
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
                                    'imageURL' => 'imageUrl',
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
                            'imageURL' => 'imageUrl',
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
            'linkRelCanonicalURL' => 'linkRelCanonicalUrl',
            'mabExperimentID' => 'mabExperimentId',
            'metaDescription' => 'metaDescription',
            'name' => 'name',
            'pageExpiryDate' => 0,
            'pageExpiryEnabled' => true,
            'pageExpiryRedirectID' => 0,
            'pageExpiryRedirectURL' => 'pageExpiryRedirectUrl',
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
            'translatedFromID' => 'translatedFromId',
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
                    'tagIDs' => [0],
                ],
            ],
            'updated' => new \DateTimeImmutable('2019-12-27T18:11:19.117Z'),
            'updatedByID' => 'updatedById',
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

        $result = $this->client->cms->pages->landingPages->update(
            'objectId',
            [
                'id' => 'id',
                'abStatus' => 'automated_loser_variant',
                'abTestID' => 'abTestId',
                'archivedAt' => new \DateTimeImmutable('2019-12-27T18:11:19.117Z'),
                'archivedInDashboard' => true,
                'attachedStylesheets' => [['foo' => []]],
                'authorName' => 'authorName',
                'campaign' => 'campaign',
                'categoryID' => 0,
                'contentGroupID' => 'contentGroupId',
                'contentTypeCategory' => '0',
                'created' => new \DateTimeImmutable('2019-12-27T18:11:19.117Z'),
                'createdByID' => 'createdById',
                'currentlyPublished' => true,
                'currentState' => 'AUTOMATED',
                'domain' => 'domain',
                'dynamicPageDataSourceID' => 'dynamicPageDataSourceId',
                'dynamicPageDataSourceType' => 0,
                'dynamicPageHubDBTableID' => 'dynamicPageHubDbTableId',
                'enableDomainStylesheets' => true,
                'enableLayoutStylesheets' => true,
                'featuredImage' => 'featuredImage',
                'featuredImageAltText' => 'featuredImageAltText',
                'folderID' => 'folderId',
                'footerHTML' => 'footerHtml',
                'headHTML' => 'headHtml',
                'htmlTitle' => 'htmlTitle',
                'includeDefaultCustomCss' => true,
                'language' => 'af',
                'layoutSections' => [
                    'foo' => [
                        'cells' => [],
                        'cssClass' => 'cssClass',
                        'cssID' => 'cssId',
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
                                        'imageURL' => 'imageUrl',
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
                                'imageURL' => 'imageUrl',
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
                'linkRelCanonicalURL' => 'linkRelCanonicalUrl',
                'mabExperimentID' => 'mabExperimentId',
                'metaDescription' => 'metaDescription',
                'name' => 'name',
                'pageExpiryDate' => 0,
                'pageExpiryEnabled' => true,
                'pageExpiryRedirectID' => 0,
                'pageExpiryRedirectURL' => 'pageExpiryRedirectUrl',
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
                'translatedFromID' => 'translatedFromId',
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
                'updatedByID' => 'updatedById',
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

        $result = $this->client->cms->pages->landingPages->update(
            'objectId',
            [
                'id' => 'id',
                'abStatus' => 'automated_loser_variant',
                'abTestID' => 'abTestId',
                'archivedAt' => new \DateTimeImmutable('2019-12-27T18:11:19.117Z'),
                'archivedInDashboard' => true,
                'attachedStylesheets' => [['foo' => []]],
                'authorName' => 'authorName',
                'campaign' => 'campaign',
                'categoryID' => 0,
                'contentGroupID' => 'contentGroupId',
                'contentTypeCategory' => '0',
                'created' => new \DateTimeImmutable('2019-12-27T18:11:19.117Z'),
                'createdByID' => 'createdById',
                'currentlyPublished' => true,
                'currentState' => 'AUTOMATED',
                'domain' => 'domain',
                'dynamicPageDataSourceID' => 'dynamicPageDataSourceId',
                'dynamicPageDataSourceType' => 0,
                'dynamicPageHubDBTableID' => 'dynamicPageHubDbTableId',
                'enableDomainStylesheets' => true,
                'enableLayoutStylesheets' => true,
                'featuredImage' => 'featuredImage',
                'featuredImageAltText' => 'featuredImageAltText',
                'folderID' => 'folderId',
                'footerHTML' => 'footerHtml',
                'headHTML' => 'headHtml',
                'htmlTitle' => 'htmlTitle',
                'includeDefaultCustomCss' => true,
                'language' => 'af',
                'layoutSections' => [
                    'foo' => [
                        'cells' => [],
                        'cssClass' => 'cssClass',
                        'cssID' => 'cssId',
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
                                        'imageURL' => 'imageUrl',
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
                                'imageURL' => 'imageUrl',
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
                'linkRelCanonicalURL' => 'linkRelCanonicalUrl',
                'mabExperimentID' => 'mabExperimentId',
                'metaDescription' => 'metaDescription',
                'name' => 'name',
                'pageExpiryDate' => 0,
                'pageExpiryEnabled' => true,
                'pageExpiryRedirectID' => 0,
                'pageExpiryRedirectURL' => 'pageExpiryRedirectUrl',
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
                'translatedFromID' => 'translatedFromId',
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
                        'tagIDs' => [0],
                    ],
                ],
                'updated' => new \DateTimeImmutable('2019-12-27T18:11:19.117Z'),
                'updatedByID' => 'updatedById',
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

        $result = $this->client->cms->pages->landingPages->list([]);

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(\HubspotSDK\Page::class, $result);
    }

    #[Test]
    public function testDelete(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->cms->pages->landingPages->delete('objectId', []);

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertNull($result);
    }

    #[Test]
    public function testAttachToLangGroup(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->cms->pages->landingPages->attachToLangGroup([
            'id' => 'id', 'language' => 'language', 'primaryID' => 'primaryId',
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

        $result = $this->client->cms->pages->landingPages->attachToLangGroup([
            'id' => 'id',
            'language' => 'language',
            'primaryID' => 'primaryId',
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

        $result = $this->client->cms->pages->landingPages->clone(['id' => 'id']);

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(Page::class, $result);
    }

    #[Test]
    public function testCloneWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->cms->pages->landingPages->clone([
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

        $result = $this->client->cms->pages->landingPages->createAbTestVariation([
            'contentID' => 'contentId', 'variationName' => 'variationName',
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

        $result = $this->client->cms->pages->landingPages->createAbTestVariation([
            'contentID' => 'contentId', 'variationName' => 'variationName',
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

        $result = $this->client->cms->pages->landingPages->createBatch([
            'inputs' => [
                [
                    'id' => 'id',
                    'abStatus' => 'automated_loser_variant',
                    'abTestID' => 'abTestId',
                    'archivedAt' => new \DateTimeImmutable('2019-12-27T18:11:19.117Z'),
                    'archivedInDashboard' => true,
                    'attachedStylesheets' => [['foo' => []]],
                    'authorName' => 'authorName',
                    'campaign' => 'campaign',
                    'categoryID' => 0,
                    'contentGroupID' => 'contentGroupId',
                    'contentTypeCategory' => '0',
                    'created' => new \DateTimeImmutable('2019-12-27T18:11:19.117Z'),
                    'createdByID' => 'createdById',
                    'currentlyPublished' => true,
                    'currentState' => 'AUTOMATED',
                    'domain' => 'domain',
                    'dynamicPageDataSourceID' => 'dynamicPageDataSourceId',
                    'dynamicPageDataSourceType' => 0,
                    'dynamicPageHubDBTableID' => 'dynamicPageHubDbTableId',
                    'enableDomainStylesheets' => true,
                    'enableLayoutStylesheets' => true,
                    'featuredImage' => 'featuredImage',
                    'featuredImageAltText' => 'featuredImageAltText',
                    'folderID' => 'folderId',
                    'footerHTML' => 'footerHtml',
                    'headHTML' => 'headHtml',
                    'htmlTitle' => 'htmlTitle',
                    'includeDefaultCustomCss' => true,
                    'language' => 'af',
                    'layoutSections' => [
                        'foo' => [
                            'cells' => [],
                            'cssClass' => 'cssClass',
                            'cssID' => 'cssId',
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
                                            'imageURL' => 'imageUrl',
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
                                    'imageURL' => 'imageUrl',
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
                    'linkRelCanonicalURL' => 'linkRelCanonicalUrl',
                    'mabExperimentID' => 'mabExperimentId',
                    'metaDescription' => 'metaDescription',
                    'name' => 'name',
                    'pageExpiryDate' => 0,
                    'pageExpiryEnabled' => true,
                    'pageExpiryRedirectID' => 0,
                    'pageExpiryRedirectURL' => 'pageExpiryRedirectUrl',
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
                    'translatedFromID' => 'translatedFromId',
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
                    'updatedByID' => 'updatedById',
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

        $result = $this->client->cms->pages->landingPages->createBatch([
            'inputs' => [
                [
                    'id' => 'id',
                    'abStatus' => 'automated_loser_variant',
                    'abTestID' => 'abTestId',
                    'archivedAt' => new \DateTimeImmutable('2019-12-27T18:11:19.117Z'),
                    'archivedInDashboard' => true,
                    'attachedStylesheets' => [['foo' => []]],
                    'authorName' => 'authorName',
                    'campaign' => 'campaign',
                    'categoryID' => 0,
                    'contentGroupID' => 'contentGroupId',
                    'contentTypeCategory' => '0',
                    'created' => new \DateTimeImmutable('2019-12-27T18:11:19.117Z'),
                    'createdByID' => 'createdById',
                    'currentlyPublished' => true,
                    'currentState' => 'AUTOMATED',
                    'domain' => 'domain',
                    'dynamicPageDataSourceID' => 'dynamicPageDataSourceId',
                    'dynamicPageDataSourceType' => 0,
                    'dynamicPageHubDBTableID' => 'dynamicPageHubDbTableId',
                    'enableDomainStylesheets' => true,
                    'enableLayoutStylesheets' => true,
                    'featuredImage' => 'featuredImage',
                    'featuredImageAltText' => 'featuredImageAltText',
                    'folderID' => 'folderId',
                    'footerHTML' => 'footerHtml',
                    'headHTML' => 'headHtml',
                    'htmlTitle' => 'htmlTitle',
                    'includeDefaultCustomCss' => true,
                    'language' => 'af',
                    'layoutSections' => [
                        'foo' => [
                            'cells' => [],
                            'cssClass' => 'cssClass',
                            'cssID' => 'cssId',
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
                                            'imageURL' => 'imageUrl',
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
                                    'imageURL' => 'imageUrl',
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
                    'linkRelCanonicalURL' => 'linkRelCanonicalUrl',
                    'mabExperimentID' => 'mabExperimentId',
                    'metaDescription' => 'metaDescription',
                    'name' => 'name',
                    'pageExpiryDate' => 0,
                    'pageExpiryEnabled' => true,
                    'pageExpiryRedirectID' => 0,
                    'pageExpiryRedirectURL' => 'pageExpiryRedirectUrl',
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
                    'translatedFromID' => 'translatedFromId',
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
                            'tagIDs' => [0],
                        ],
                    ],
                    'updated' => new \DateTimeImmutable('2019-12-27T18:11:19.117Z'),
                    'updatedByID' => 'updatedById',
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
    public function testCreateFolder(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->cms->pages->landingPages->createFolder([
            'id' => 'id',
            'category' => 0,
            'created' => new \DateTimeImmutable('2019-12-27T18:11:19.117Z'),
            'deletedAt' => new \DateTimeImmutable('2019-12-27T18:11:19.117Z'),
            'name' => 'name',
            'parentFolderID' => 0,
            'updated' => new \DateTimeImmutable('2019-12-27T18:11:19.117Z'),
        ]);

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(ContentFolder::class, $result);
    }

    #[Test]
    public function testCreateFolderWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->cms->pages->landingPages->createFolder([
            'id' => 'id',
            'category' => 0,
            'created' => new \DateTimeImmutable('2019-12-27T18:11:19.117Z'),
            'deletedAt' => new \DateTimeImmutable('2019-12-27T18:11:19.117Z'),
            'name' => 'name',
            'parentFolderID' => 0,
            'updated' => new \DateTimeImmutable('2019-12-27T18:11:19.117Z'),
        ]);

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(ContentFolder::class, $result);
    }

    #[Test]
    public function testCreateFoldersBatch(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->cms->pages->landingPages->createFoldersBatch([
            'inputs' => [
                [
                    'id' => 'id',
                    'category' => 0,
                    'created' => new \DateTimeImmutable('2019-12-27T18:11:19.117Z'),
                    'deletedAt' => new \DateTimeImmutable('2019-12-27T18:11:19.117Z'),
                    'name' => 'name',
                    'parentFolderID' => 0,
                    'updated' => new \DateTimeImmutable('2019-12-27T18:11:19.117Z'),
                ],
            ],
        ]);

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(BatchResponseContentFolder::class, $result);
    }

    #[Test]
    public function testCreateFoldersBatchWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->cms->pages->landingPages->createFoldersBatch([
            'inputs' => [
                [
                    'id' => 'id',
                    'category' => 0,
                    'created' => new \DateTimeImmutable('2019-12-27T18:11:19.117Z'),
                    'deletedAt' => new \DateTimeImmutable('2019-12-27T18:11:19.117Z'),
                    'name' => 'name',
                    'parentFolderID' => 0,
                    'updated' => new \DateTimeImmutable('2019-12-27T18:11:19.117Z'),
                ],
            ],
        ]);

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(BatchResponseContentFolder::class, $result);
    }

    #[Test]
    public function testCreateLanguageVariation(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->cms->pages->landingPages->createLanguageVariation([
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

        $result = $this->client->cms->pages->landingPages->createLanguageVariation([
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

        $result = $this->client->cms->pages->landingPages->deleteBatch([
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

        $result = $this->client->cms->pages->landingPages->deleteBatch([
            'inputs' => ['string'],
        ]);

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertNull($result);
    }

    #[Test]
    public function testDeleteFolder(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->cms->pages->landingPages->deleteFolder(
            'objectId',
            []
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertNull($result);
    }

    #[Test]
    public function testDeleteFoldersBatch(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->cms->pages->landingPages->deleteFoldersBatch([
            'inputs' => ['string'],
        ]);

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertNull($result);
    }

    #[Test]
    public function testDeleteFoldersBatchWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->cms->pages->landingPages->deleteFoldersBatch([
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

        $result = $this->client->cms->pages->landingPages->detachFromLangGroup([
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

        $result = $this->client->cms->pages->landingPages->detachFromLangGroup([
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

        $result = $this->client->cms->pages->landingPages->endAbTest([
            'abTestID' => 'abTestId', 'winnerID' => 'winnerId',
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

        $result = $this->client->cms->pages->landingPages->endAbTest([
            'abTestID' => 'abTestId', 'winnerID' => 'winnerId',
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

        $result = $this->client->cms->pages->landingPages->get('objectId', []);

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(Page::class, $result);
    }

    #[Test]
    public function testGetBatch(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->cms->pages->landingPages->getBatch([
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

        $result = $this->client->cms->pages->landingPages->getBatch([
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

        $result = $this->client->cms->pages->landingPages->getDraft('objectId');

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(Page::class, $result);
    }

    #[Test]
    public function testGetFolder(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->cms->pages->landingPages->getFolder(
            'objectId',
            []
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(ContentFolder::class, $result);
    }

    #[Test]
    public function testGetFolderRevision(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->cms->pages->landingPages->getFolderRevision(
            'revisionId',
            ['objectID' => 'objectId']
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(VersionContentFolder::class, $result);
    }

    #[Test]
    public function testGetFolderRevisionWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->cms->pages->landingPages->getFolderRevision(
            'revisionId',
            ['objectID' => 'objectId']
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(VersionContentFolder::class, $result);
    }

    #[Test]
    public function testGetFoldersBatch(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->cms->pages->landingPages->getFoldersBatch([
            'inputs' => ['string'],
        ]);

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(BatchResponseContentFolder::class, $result);
    }

    #[Test]
    public function testGetFoldersBatchWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->cms->pages->landingPages->getFoldersBatch([
            'inputs' => ['string'], 'archived' => true,
        ]);

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(BatchResponseContentFolder::class, $result);
    }

    #[Test]
    public function testGetRevision(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->cms->pages->landingPages->getRevision(
            'revisionId',
            ['objectID' => 'objectId']
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

        $result = $this->client->cms->pages->landingPages->getRevision(
            'revisionId',
            ['objectID' => 'objectId']
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(VersionPage::class, $result);
    }

    #[Test]
    public function testListFolderRevisions(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->cms->pages->landingPages->listFolderRevisions(
            'objectId',
            []
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(\HubspotSDK\Page::class, $result);
    }

    #[Test]
    public function testListFolders(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->cms->pages->landingPages->listFolders([]);

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(\HubspotSDK\Page::class, $result);
    }

    #[Test]
    public function testListRevisions(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->cms->pages->landingPages->listRevisions(
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

        $result = $this->client->cms->pages->landingPages->publishDraft('objectId');

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertNull($result);
    }

    #[Test]
    public function testRerunAbTest(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->cms->pages->landingPages->rerunAbTest([
            'abTestID' => 'abTestId', 'variationID' => 'variationId',
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

        $result = $this->client->cms->pages->landingPages->rerunAbTest([
            'abTestID' => 'abTestId', 'variationID' => 'variationId',
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

        $result = $this->client->cms->pages->landingPages->resetDraft('objectId');

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertNull($result);
    }

    #[Test]
    public function testRestoreFolderRevision(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->cms->pages->landingPages->restoreFolderRevision(
            'revisionId',
            ['objectID' => 'objectId']
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(ContentFolder::class, $result);
    }

    #[Test]
    public function testRestoreFolderRevisionWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->cms->pages->landingPages->restoreFolderRevision(
            'revisionId',
            ['objectID' => 'objectId']
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(ContentFolder::class, $result);
    }

    #[Test]
    public function testRestoreRevision(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->cms->pages->landingPages->restoreRevision(
            'revisionId',
            ['objectID' => 'objectId']
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

        $result = $this->client->cms->pages->landingPages->restoreRevision(
            'revisionId',
            ['objectID' => 'objectId']
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

        $result = $this->client->cms->pages->landingPages->restoreRevisionToDraft(
            0,
            ['objectID' => 'objectId']
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

        $result = $this->client->cms->pages->landingPages->restoreRevisionToDraft(
            0,
            ['objectID' => 'objectId']
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

        $result = $this->client->cms->pages->landingPages->schedule([
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

        $result = $this->client->cms->pages->landingPages->schedule([
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

        $result = $this->client->cms->pages->landingPages->setNewLangPrimary([
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

        $result = $this->client->cms->pages->landingPages->setNewLangPrimary([
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

        $result = $this->client->cms->pages->landingPages->updateBatch([
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

        $result = $this->client->cms->pages->landingPages->updateBatch([
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

        $result = $this->client->cms->pages->landingPages->updateDraft(
            'objectId',
            [
                'id' => 'id',
                'abStatus' => 'automated_loser_variant',
                'abTestID' => 'abTestId',
                'archivedAt' => new \DateTimeImmutable('2019-12-27T18:11:19.117Z'),
                'archivedInDashboard' => true,
                'attachedStylesheets' => [['foo' => []]],
                'authorName' => 'authorName',
                'campaign' => 'campaign',
                'categoryID' => 0,
                'contentGroupID' => 'contentGroupId',
                'contentTypeCategory' => '0',
                'created' => new \DateTimeImmutable('2019-12-27T18:11:19.117Z'),
                'createdByID' => 'createdById',
                'currentlyPublished' => true,
                'currentState' => 'AUTOMATED',
                'domain' => 'domain',
                'dynamicPageDataSourceID' => 'dynamicPageDataSourceId',
                'dynamicPageDataSourceType' => 0,
                'dynamicPageHubDBTableID' => 'dynamicPageHubDbTableId',
                'enableDomainStylesheets' => true,
                'enableLayoutStylesheets' => true,
                'featuredImage' => 'featuredImage',
                'featuredImageAltText' => 'featuredImageAltText',
                'folderID' => 'folderId',
                'footerHTML' => 'footerHtml',
                'headHTML' => 'headHtml',
                'htmlTitle' => 'htmlTitle',
                'includeDefaultCustomCss' => true,
                'language' => 'af',
                'layoutSections' => [
                    'foo' => [
                        'cells' => [],
                        'cssClass' => 'cssClass',
                        'cssID' => 'cssId',
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
                                        'imageURL' => 'imageUrl',
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
                                'imageURL' => 'imageUrl',
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
                'linkRelCanonicalURL' => 'linkRelCanonicalUrl',
                'mabExperimentID' => 'mabExperimentId',
                'metaDescription' => 'metaDescription',
                'name' => 'name',
                'pageExpiryDate' => 0,
                'pageExpiryEnabled' => true,
                'pageExpiryRedirectID' => 0,
                'pageExpiryRedirectURL' => 'pageExpiryRedirectUrl',
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
                'translatedFromID' => 'translatedFromId',
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
                'updatedByID' => 'updatedById',
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

        $result = $this->client->cms->pages->landingPages->updateDraft(
            'objectId',
            [
                'id' => 'id',
                'abStatus' => 'automated_loser_variant',
                'abTestID' => 'abTestId',
                'archivedAt' => new \DateTimeImmutable('2019-12-27T18:11:19.117Z'),
                'archivedInDashboard' => true,
                'attachedStylesheets' => [['foo' => []]],
                'authorName' => 'authorName',
                'campaign' => 'campaign',
                'categoryID' => 0,
                'contentGroupID' => 'contentGroupId',
                'contentTypeCategory' => '0',
                'created' => new \DateTimeImmutable('2019-12-27T18:11:19.117Z'),
                'createdByID' => 'createdById',
                'currentlyPublished' => true,
                'currentState' => 'AUTOMATED',
                'domain' => 'domain',
                'dynamicPageDataSourceID' => 'dynamicPageDataSourceId',
                'dynamicPageDataSourceType' => 0,
                'dynamicPageHubDBTableID' => 'dynamicPageHubDbTableId',
                'enableDomainStylesheets' => true,
                'enableLayoutStylesheets' => true,
                'featuredImage' => 'featuredImage',
                'featuredImageAltText' => 'featuredImageAltText',
                'folderID' => 'folderId',
                'footerHTML' => 'footerHtml',
                'headHTML' => 'headHtml',
                'htmlTitle' => 'htmlTitle',
                'includeDefaultCustomCss' => true,
                'language' => 'af',
                'layoutSections' => [
                    'foo' => [
                        'cells' => [],
                        'cssClass' => 'cssClass',
                        'cssID' => 'cssId',
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
                                        'imageURL' => 'imageUrl',
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
                                'imageURL' => 'imageUrl',
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
                'linkRelCanonicalURL' => 'linkRelCanonicalUrl',
                'mabExperimentID' => 'mabExperimentId',
                'metaDescription' => 'metaDescription',
                'name' => 'name',
                'pageExpiryDate' => 0,
                'pageExpiryEnabled' => true,
                'pageExpiryRedirectID' => 0,
                'pageExpiryRedirectURL' => 'pageExpiryRedirectUrl',
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
                'translatedFromID' => 'translatedFromId',
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
                        'tagIDs' => [0],
                    ],
                ],
                'updated' => new \DateTimeImmutable('2019-12-27T18:11:19.117Z'),
                'updatedByID' => 'updatedById',
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
    public function testUpdateFolder(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->cms->pages->landingPages->updateFolder(
            'objectId',
            [
                'id' => 'id',
                'category' => 0,
                'created' => new \DateTimeImmutable('2019-12-27T18:11:19.117Z'),
                'deletedAt' => new \DateTimeImmutable('2019-12-27T18:11:19.117Z'),
                'name' => 'name',
                'parentFolderID' => 0,
                'updated' => new \DateTimeImmutable('2019-12-27T18:11:19.117Z'),
            ],
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(ContentFolder::class, $result);
    }

    #[Test]
    public function testUpdateFolderWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->cms->pages->landingPages->updateFolder(
            'objectId',
            [
                'id' => 'id',
                'category' => 0,
                'created' => new \DateTimeImmutable('2019-12-27T18:11:19.117Z'),
                'deletedAt' => new \DateTimeImmutable('2019-12-27T18:11:19.117Z'),
                'name' => 'name',
                'parentFolderID' => 0,
                'updated' => new \DateTimeImmutable('2019-12-27T18:11:19.117Z'),
                'archived' => true,
            ],
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(ContentFolder::class, $result);
    }

    #[Test]
    public function testUpdateFoldersBatch(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->cms->pages->landingPages->updateFoldersBatch([
            'inputs' => [[]],
        ]);

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(BatchResponseContentFolder::class, $result);
    }

    #[Test]
    public function testUpdateFoldersBatchWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->cms->pages->landingPages->updateFoldersBatch([
            'inputs' => [[]], 'archived' => true,
        ]);

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(BatchResponseContentFolder::class, $result);
    }

    #[Test]
    public function testUpdateLanguages(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->cms->pages->landingPages->updateLanguages([
            'languages' => ['foo' => 'string'], 'primaryID' => 'primaryId',
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

        $result = $this->client->cms->pages->landingPages->updateLanguages([
            'languages' => ['foo' => 'string'], 'primaryID' => 'primaryId',
        ]);

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertNull($result);
    }
}
