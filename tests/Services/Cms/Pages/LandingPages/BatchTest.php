<?php

namespace Tests\Services\Cms\Pages\LandingPages;

use HubSpotSDK\Client;
use HubSpotSDK\Cms\Pages\BatchResponsePage;
use HubSpotSDK\Core\Util;
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

        $testUrl = Util::getenv('TEST_API_BASE_URL') ?: 'http://127.0.0.1:4010';
        $client = new Client(accessToken: 'My Access Token', baseUrl: $testUrl);

        $this->client = $client;
    }

    #[Test]
    public function testCreateLandingPages(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this
            ->client
            ->cms
            ->pages
            ->landingPages
            ->batch
            ->createLandingPages(
                inputs: [
                    [
                        'id' => 'id',
                        'abStatus' => 'automated_loser_variant',
                        'abTestID' => 'abTestId',
                        'archivedAt' => new \DateTimeImmutable('2019-12-27T18:11:19.117Z'),
                        'archivedInDashboard' => true,
                        'attachedStylesheets' => [['foo' => (object) []]],
                        'authorName' => 'authorName',
                        'campaign' => 'campaign',
                        'categoryID' => 0,
                        'contentGroupID' => 'contentGroupId',
                        'contentTypeCategory' => '0',
                        'created' => new \DateTimeImmutable('2019-12-27T18:11:19.117Z'),
                        'createdByID' => 'createdById',
                        'currentlyPublished' => true,
                        'currentState' => 'AGENT_GENERATED',
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
                        'language' => 'aa',
                        'layoutSections' => [
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
                                            'backgroundColor' => [
                                                'a' => 0, 'b' => 0, 'g' => 0, 'r' => 0,
                                            ],
                                            'backgroundGradient' => [
                                                'angle' => ['units' => 'DEGREES', 'value' => 0],
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
                                        'angle' => ['units' => 'DEGREES', 'value' => 0],
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
                        'publicAccessRules' => [(object) []],
                        'publicAccessRulesEnabled' => true,
                        'publishDate' => new \DateTimeImmutable('2019-12-27T18:11:19.117Z'),
                        'publishImmediately' => true,
                        'slug' => 'slug',
                        'state' => 'state',
                        'subcategory' => 'subcategory',
                        'templatePath' => 'templatePath',
                        'themeSettingsValues' => ['foo' => (object) []],
                        'translatedFromID' => 'translatedFromId',
                        'translations' => [
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
                        'widgetContainers' => ['foo' => (object) []],
                        'widgets' => ['foo' => (object) []],
                    ],
                ],
            )
        ;

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(BatchResponsePage::class, $result);
    }

    #[Test]
    public function testCreateLandingPagesWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this
            ->client
            ->cms
            ->pages
            ->landingPages
            ->batch
            ->createLandingPages(
                inputs: [
                    [
                        'id' => 'id',
                        'abStatus' => 'automated_loser_variant',
                        'abTestID' => 'abTestId',
                        'archivedAt' => new \DateTimeImmutable('2019-12-27T18:11:19.117Z'),
                        'archivedInDashboard' => true,
                        'attachedStylesheets' => [['foo' => (object) []]],
                        'authorName' => 'authorName',
                        'campaign' => 'campaign',
                        'categoryID' => 0,
                        'contentGroupID' => 'contentGroupId',
                        'contentTypeCategory' => '0',
                        'created' => new \DateTimeImmutable('2019-12-27T18:11:19.117Z'),
                        'createdByID' => 'createdById',
                        'currentlyPublished' => true,
                        'currentState' => 'AGENT_GENERATED',
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
                        'language' => 'aa',
                        'layoutSections' => [
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
                                            'backgroundColor' => [
                                                'a' => 0, 'b' => 0, 'g' => 0, 'r' => 0,
                                            ],
                                            'backgroundGradient' => [
                                                'angle' => ['units' => 'DEGREES', 'value' => 0],
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
                                                        'bottom' => ['units' => 'CH', 'value' => 0],
                                                        'top' => ['units' => 'CH', 'value' => 0],
                                                    ],
                                                    'padding' => [
                                                        'bottom' => ['units' => 'CH', 'value' => 0],
                                                        'left' => ['units' => 'CH', 'value' => 0],
                                                        'right' => ['units' => 'CH', 'value' => 0],
                                                        'top' => ['units' => 'CH', 'value' => 0],
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
                                        'angle' => ['units' => 'DEGREES', 'value' => 0],
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
                                                'bottom' => ['units' => 'CH', 'value' => 0],
                                                'top' => ['units' => 'CH', 'value' => 0],
                                            ],
                                            'padding' => [
                                                'bottom' => ['units' => 'CH', 'value' => 0],
                                                'left' => ['units' => 'CH', 'value' => 0],
                                                'right' => ['units' => 'CH', 'value' => 0],
                                                'top' => ['units' => 'CH', 'value' => 0],
                                            ],
                                        ],
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
                        'publicAccessRules' => [(object) []],
                        'publicAccessRulesEnabled' => true,
                        'publishDate' => new \DateTimeImmutable('2019-12-27T18:11:19.117Z'),
                        'publishImmediately' => true,
                        'slug' => 'slug',
                        'state' => 'state',
                        'subcategory' => 'subcategory',
                        'templatePath' => 'templatePath',
                        'themeSettingsValues' => ['foo' => (object) []],
                        'translatedFromID' => 'translatedFromId',
                        'translations' => [
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
                        'widgetContainers' => ['foo' => (object) []],
                        'widgets' => ['foo' => (object) []],
                    ],
                ],
            )
        ;

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(BatchResponsePage::class, $result);
    }

    #[Test]
    public function testDeleteLandingPages(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this
            ->client
            ->cms
            ->pages
            ->landingPages
            ->batch
            ->deleteLandingPages(inputs: ['string'])
        ;

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertNull($result);
    }

    #[Test]
    public function testDeleteLandingPagesWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this
            ->client
            ->cms
            ->pages
            ->landingPages
            ->batch
            ->deleteLandingPages(inputs: ['string'])
        ;

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertNull($result);
    }

    #[Test]
    public function testGetLandingPages(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->cms->pages->landingPages->batch->getLandingPages(
            inputs: ['string']
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(BatchResponsePage::class, $result);
    }

    #[Test]
    public function testGetLandingPagesWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->cms->pages->landingPages->batch->getLandingPages(
            inputs: ['string'],
            archived: true
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(BatchResponsePage::class, $result);
    }

    #[Test]
    public function testUpdateLandingPages(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this
            ->client
            ->cms
            ->pages
            ->landingPages
            ->batch
            ->updateLandingPages(inputs: [(object) []])
        ;

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(BatchResponsePage::class, $result);
    }

    #[Test]
    public function testUpdateLandingPagesWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this
            ->client
            ->cms
            ->pages
            ->landingPages
            ->batch
            ->updateLandingPages(inputs: [(object) []], archived: true)
        ;

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(BatchResponsePage::class, $result);
    }
}
