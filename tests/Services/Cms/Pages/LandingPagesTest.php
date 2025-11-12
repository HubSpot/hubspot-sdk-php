<?php

namespace Tests\Services\Cms\Pages;

use HubspotSDK\Client;
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
            'abStatus' => 'master',
            'abTestId' => 'abTestId',
            'archivedAt' => '2019-12-27T18:11:19.117Z',
            'archivedInDashboard' => true,
            'attachedStylesheets' => [['foo' => []]],
            'authorName' => 'authorName',
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
            'publishDate' => '2019-12-27T18:11:19.117Z',
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

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testCreateWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->cms->pages->landingPages->create([
            'id' => 'id',
            'abStatus' => 'master',
            'abTestId' => 'abTestId',
            'archivedAt' => '2019-12-27T18:11:19.117Z',
            'archivedInDashboard' => true,
            'attachedStylesheets' => [['foo' => []]],
            'authorName' => 'authorName',
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
            'publishDate' => '2019-12-27T18:11:19.117Z',
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

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
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
                'abStatus' => 'master',
                'abTestId' => 'abTestId',
                'archivedAt' => '2019-12-27T18:11:19.117Z',
                'archivedInDashboard' => true,
                'attachedStylesheets' => [['foo' => []]],
                'authorName' => 'authorName',
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
                'publishDate' => '2019-12-27T18:11:19.117Z',
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

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
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
                'abStatus' => 'master',
                'abTestId' => 'abTestId',
                'archivedAt' => '2019-12-27T18:11:19.117Z',
                'archivedInDashboard' => true,
                'attachedStylesheets' => [['foo' => []]],
                'authorName' => 'authorName',
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
                'publishDate' => '2019-12-27T18:11:19.117Z',
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

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testList(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->cms->pages->landingPages->list([]);

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testDelete(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->cms->pages->landingPages->delete('objectId', []);

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testAttachToLangGroup(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->cms->pages->landingPages->attachToLangGroup([
            'id' => 'id', 'language' => 'language', 'primaryId' => 'primaryId',
        ]);

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testAttachToLangGroupWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->cms->pages->landingPages->attachToLangGroup([
            'id' => 'id', 'language' => 'language', 'primaryId' => 'primaryId',
        ]);

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testClone(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->cms->pages->landingPages->clone(['id' => 'id']);

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testCloneWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->cms->pages->landingPages->clone(['id' => 'id']);

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testCreateAbTestVariation(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->cms->pages->landingPages->createAbTestVariation([
            'contentId' => 'contentId', 'variationName' => 'variationName',
        ]);

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testCreateAbTestVariationWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->cms->pages->landingPages->createAbTestVariation([
            'contentId' => 'contentId', 'variationName' => 'variationName',
        ]);

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
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
                    'abStatus' => 'master',
                    'abTestId' => 'abTestId',
                    'archivedAt' => '2019-12-27T18:11:19.117Z',
                    'archivedInDashboard' => true,
                    'attachedStylesheets' => [['foo' => []]],
                    'authorName' => 'authorName',
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
                    'publishDate' => '2019-12-27T18:11:19.117Z',
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
            ],
        ]);

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
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
                    'abStatus' => 'master',
                    'abTestId' => 'abTestId',
                    'archivedAt' => '2019-12-27T18:11:19.117Z',
                    'archivedInDashboard' => true,
                    'attachedStylesheets' => [['foo' => []]],
                    'authorName' => 'authorName',
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
                    'publishDate' => '2019-12-27T18:11:19.117Z',
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
            ],
        ]);

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
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
            'created' => '2019-12-27T18:11:19.117Z',
            'deletedAt' => '2019-12-27T18:11:19.117Z',
            'name' => 'name',
            'parentFolderId' => 0,
            'updated' => '2019-12-27T18:11:19.117Z',
        ]);

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
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
            'created' => '2019-12-27T18:11:19.117Z',
            'deletedAt' => '2019-12-27T18:11:19.117Z',
            'name' => 'name',
            'parentFolderId' => 0,
            'updated' => '2019-12-27T18:11:19.117Z',
        ]);

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
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
                    'created' => '2019-12-27T18:11:19.117Z',
                    'deletedAt' => '2019-12-27T18:11:19.117Z',
                    'name' => 'name',
                    'parentFolderId' => 0,
                    'updated' => '2019-12-27T18:11:19.117Z',
                ],
            ],
        ]);

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
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
                    'created' => '2019-12-27T18:11:19.117Z',
                    'deletedAt' => '2019-12-27T18:11:19.117Z',
                    'name' => 'name',
                    'parentFolderId' => 0,
                    'updated' => '2019-12-27T18:11:19.117Z',
                ],
            ],
        ]);

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
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

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testCreateLanguageVariationWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->cms->pages->landingPages->createLanguageVariation([
            'id' => 'id',
        ]);

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
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

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
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

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
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

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
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

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
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

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
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

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
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

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testEndAbTest(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->cms->pages->landingPages->endAbTest([
            'abTestId' => 'abTestId', 'winnerId' => 'winnerId',
        ]);

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testEndAbTestWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->cms->pages->landingPages->endAbTest([
            'abTestId' => 'abTestId', 'winnerId' => 'winnerId',
        ]);

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testGet(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->cms->pages->landingPages->get('objectId', []);

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
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

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testGetBatchWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->cms->pages->landingPages->getBatch([
            'inputs' => ['string'],
        ]);

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testGetDraft(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->cms->pages->landingPages->getDraft('objectId');

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
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

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testGetFolderRevision(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->cms->pages->landingPages->getFolderRevision(
            'revisionId',
            ['objectId' => 'objectId']
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testGetFolderRevisionWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->cms->pages->landingPages->getFolderRevision(
            'revisionId',
            ['objectId' => 'objectId']
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
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

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testGetFoldersBatchWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->cms->pages->landingPages->getFoldersBatch([
            'inputs' => ['string'],
        ]);

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testGetRevision(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->cms->pages->landingPages->getRevision(
            'revisionId',
            ['objectId' => 'objectId']
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testGetRevisionWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->cms->pages->landingPages->getRevision(
            'revisionId',
            ['objectId' => 'objectId']
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
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

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testListFolders(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->cms->pages->landingPages->listFolders([]);

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
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

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testPublishDraft(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->cms->pages->landingPages->publishDraft('objectId');

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testRerunAbTest(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->cms->pages->landingPages->rerunAbTest([
            'abTestId' => 'abTestId', 'variationId' => 'variationId',
        ]);

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testRerunAbTestWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->cms->pages->landingPages->rerunAbTest([
            'abTestId' => 'abTestId', 'variationId' => 'variationId',
        ]);

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testResetDraft(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->cms->pages->landingPages->resetDraft('objectId');

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testRestoreFolderRevision(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->cms->pages->landingPages->restoreFolderRevision(
            'revisionId',
            ['objectId' => 'objectId']
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testRestoreFolderRevisionWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->cms->pages->landingPages->restoreFolderRevision(
            'revisionId',
            ['objectId' => 'objectId']
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testRestoreRevision(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->cms->pages->landingPages->restoreRevision(
            'revisionId',
            ['objectId' => 'objectId']
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testRestoreRevisionWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->cms->pages->landingPages->restoreRevision(
            'revisionId',
            ['objectId' => 'objectId']
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testRestoreRevisionToDraft(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->cms->pages->landingPages->restoreRevisionToDraft(
            0,
            ['objectId' => 'objectId']
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testRestoreRevisionToDraftWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->cms->pages->landingPages->restoreRevisionToDraft(
            0,
            ['objectId' => 'objectId']
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testSchedule(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->cms->pages->landingPages->schedule([
            'id' => 'id', 'publishDate' => '2019-12-27T18:11:19.117Z',
        ]);

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testScheduleWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->cms->pages->landingPages->schedule([
            'id' => 'id', 'publishDate' => '2019-12-27T18:11:19.117Z',
        ]);

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
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

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
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

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
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

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testUpdateBatchWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->cms->pages->landingPages->updateBatch([
            'inputs' => [[]],
        ]);

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
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
                'abStatus' => 'master',
                'abTestId' => 'abTestId',
                'archivedAt' => '2019-12-27T18:11:19.117Z',
                'archivedInDashboard' => true,
                'attachedStylesheets' => [['foo' => []]],
                'authorName' => 'authorName',
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
                'publishDate' => '2019-12-27T18:11:19.117Z',
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

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
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
                'abStatus' => 'master',
                'abTestId' => 'abTestId',
                'archivedAt' => '2019-12-27T18:11:19.117Z',
                'archivedInDashboard' => true,
                'attachedStylesheets' => [['foo' => []]],
                'authorName' => 'authorName',
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
                'publishDate' => '2019-12-27T18:11:19.117Z',
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

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
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
                'created' => '2019-12-27T18:11:19.117Z',
                'deletedAt' => '2019-12-27T18:11:19.117Z',
                'name' => 'name',
                'parentFolderId' => 0,
                'updated' => '2019-12-27T18:11:19.117Z',
            ],
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
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
                'created' => '2019-12-27T18:11:19.117Z',
                'deletedAt' => '2019-12-27T18:11:19.117Z',
                'name' => 'name',
                'parentFolderId' => 0,
                'updated' => '2019-12-27T18:11:19.117Z',
            ],
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
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

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testUpdateFoldersBatchWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->cms->pages->landingPages->updateFoldersBatch([
            'inputs' => [[]],
        ]);

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testUpdateLanguages(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->cms->pages->landingPages->updateLanguages([
            'languages' => ['foo' => 'string'], 'primaryId' => 'primaryId',
        ]);

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testUpdateLanguagesWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->cms->pages->landingPages->updateLanguages([
            'languages' => ['foo' => 'string'], 'primaryId' => 'primaryId',
        ]);

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }
}
