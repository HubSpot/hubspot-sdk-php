<?php

namespace Tests\Services\Marketing;

use HubspotSDK\Client;
use HubspotSDK\Marketing\Emails\PublicEmail;
use HubspotSDK\Marketing\Emails\VersionPublicEmail;
use HubspotSDK\Page;
use PHPUnit\Framework\Attributes\CoversNothing;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Tests\UnsupportedMockTests;

/**
 * @internal
 */
#[CoversNothing]
final class EmailsTest extends TestCase
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

        $result = $this->client->marketing->emails->create([
            'name' => 'My subject',
        ]);

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(PublicEmail::class, $result);
    }

    #[Test]
    public function testCreateWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->marketing->emails->create([
            'name' => 'My subject',
            'activeDomain' => 'test.hs-sites.com',
            'archived' => false,
            'businessUnitId' => 0,
            'campaign' => '1b7f51a6-33c1-44d6-ba28-fe81f655dced',
            'content' => [
                'flexAreas' => ['main' => []],
                'plainTextVersion' => 'This is custom! View in browser ({{view_as_page_url}})\n\nHello {{ contact.firstname }},\n\nPlain text emails have minimal formatting so your reader can really focus on what you have to say. Introduce yourself and explain why you’re reaching out.\n\nEvery email should try to lead the reader to some kind of action. Use this space to describe why the reader should want to click on the link below. Put the link on its own line to really draw their eye to it.\n\nLink text\n\nNow it’s time to wrap up your email. Before your signature, thank the recipient for reading. You can also invite them to send this email to any of their colleagues who might be interested.\n\nAll the best,\n\nYour full name\n\nYour job title\n\nOther contact information\n\n{{site_settings.company_name}}, {{site_settings.company_street_address_1}}, {{site_settings.company_street_address_2}}, {{site_settings.company_city}}, {{site_settings.company_state}} {{site_settings.company_zip}}, {{site_settings.company_country}}, {{site_settings.company_phone}}\n\nUnsubscribe ({{unsubscribe_link_all}})\n\nManage preferences ({{unsubscribe_link}})',
                'smartFields' => ['foo' => []],
                'styleSettings' => [
                    'backgroundColor' => 'backgroundColor',
                    'backgroundImage' => 'backgroundImage',
                    'backgroundImageType' => 'backgroundImageType',
                    'bodyBorderColor' => 'bodyBorderColor',
                    'bodyBorderColorChoice' => 'bodyBorderColorChoice',
                    'bodyBorderWidth' => 0,
                    'bodyColor' => 'bodyColor',
                    'buttonStyleSettings' => [
                        'backgroundColor' => [],
                        'cornerRadius' => 0,
                        'fontStyle' => [
                            'bold' => true,
                            'color' => 'color',
                            'font' => 'font',
                            'italic' => true,
                            'size' => 0,
                            'underline' => true,
                        ],
                    ],
                    'colorPickerFavorite1' => 'colorPickerFavorite1',
                    'colorPickerFavorite2' => 'colorPickerFavorite2',
                    'colorPickerFavorite3' => 'colorPickerFavorite3',
                    'colorPickerFavorite4' => 'colorPickerFavorite4',
                    'colorPickerFavorite5' => 'colorPickerFavorite5',
                    'colorPickerFavorite6' => 'colorPickerFavorite6',
                    'dividerStyleSettings' => [
                        'color' => [], 'height' => 0, 'lineType' => 'lineType',
                    ],
                    'emailBodyPadding' => 'emailBodyPadding',
                    'emailBodyWidth' => 'emailBodyWidth',
                    'headingOneFont' => [
                        'bold' => true,
                        'color' => 'color',
                        'font' => 'font',
                        'italic' => true,
                        'size' => 0,
                        'underline' => true,
                    ],
                    'headingTwoFont' => [
                        'bold' => true,
                        'color' => 'color',
                        'font' => 'font',
                        'italic' => true,
                        'size' => 0,
                        'underline' => true,
                    ],
                    'linksFont' => [
                        'bold' => true,
                        'color' => 'color',
                        'font' => 'font',
                        'italic' => true,
                        'size' => 0,
                        'underline' => true,
                    ],
                    'primaryAccentColor' => 'primaryAccentColor',
                    'primaryFont' => 'primaryFont',
                    'primaryFontColor' => 'primaryFontColor',
                    'primaryFontLineHeight' => 'primaryFontLineHeight',
                    'primaryFontSize' => 0,
                    'secondaryAccentColor' => 'secondaryAccentColor',
                    'secondaryFont' => 'secondaryFont',
                    'secondaryFontColor' => 'secondaryFontColor',
                    'secondaryFontLineHeight' => 'secondaryFontLineHeight',
                    'secondaryFontSize' => 0,
                ],
                'templatePath' => 'templatePath',
                'themeSettingsValues' => ['foo' => []],
                'widgetContainers' => ['foo' => []],
                'widgets' => [
                    'module-0-1-1' => [],
                    'module-1-1-1' => [],
                    'module_160676180617911' => [],
                    'preview_text' => [],
                ],
            ],
            'feedbackSurveyId' => 'feedbackSurveyId',
            'folderIdV2' => 0,
            'from' => [
                'customReplyTo' => 'customReplyTo',
                'fromName' => 'Bruce Wayne',
                'replyTo' => 'test@hubspot.com',
            ],
            'jitterSendTime' => true,
            'language' => 'af',
            'publishDate' => new \DateTimeImmutable('2023-11-30T18:44:20.387Z'),
            'rssData' => [
                'blogEmailType' => 'blogEmailType',
                'blogImageMaxWidth' => 0,
                'blogLayout' => 'blogLayout',
                'hubspotBlogId' => 'hubspotBlogId',
                'maxEntries' => 0,
                'rssEntryTemplate' => 'rssEntryTemplate',
                'timing' => ['foo' => []],
                'url' => 'url',
                'useHeadlineAsSubject' => true,
            ],
            'sendOnPublish' => true,
            'state' => 'DRAFT',
            'subcategory' => 'batch',
            'subject' => 'My subject',
            'subscriptionDetails' => [
                'officeLocationId' => '5449392956',
                'preferencesGroupId' => 'preferencesGroupId',
                'subscriptionId' => 'subscriptionId',
                'subscriptionName' => 'subscriptionName',
            ],
            'testing' => [
                'abSampleSizeDefault' => 'automated_loser_variant',
                'abSamplingDefault' => 'automated_loser_variant',
                'abStatus' => 'automated_loser_variant',
                'abSuccessMetric' => 'CLICKS_BY_DELIVERED',
                'abTestPercentage' => 0,
                'hoursToWait' => 0,
                'isAbVariation' => true,
                'testId' => 'testId',
            ],
            'to' => [
                'contactIds' => ['exclude' => ['string'], 'include' => ['string']],
                'contactIlsLists' => ['exclude' => ['string'], 'include' => ['string']],
                'contactLists' => ['exclude' => ['string'], 'include' => ['string']],
                'limitSendFrequency' => true,
                'suppressGraymail' => true,
            ],
            'webversion' => [
                'domain' => 'domain',
                'enabled' => true,
                'expiresAt' => new \DateTimeImmutable('2020-11-30T18:44:20.387Z'),
                'isPageRedirected' => true,
                'metaDescription' => '',
                'pageExpiryEnabled' => true,
                'redirectToPageId' => 'redirectToPageId',
                'redirectToUrl' => 'http://www.example.org',
                'slug' => 'slug',
                'title' => 'title',
                'url' => 'url',
            ],
        ]);

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(PublicEmail::class, $result);
    }

    #[Test]
    public function testUpdate(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->marketing->emails->update('emailId', []);

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(PublicEmail::class, $result);
    }

    #[Test]
    public function testList(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->marketing->emails->list([]);

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(Page::class, $result);
    }

    #[Test]
    public function testDelete(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->marketing->emails->delete('emailId', []);

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertNull($result);
    }

    #[Test]
    public function testClone(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->marketing->emails->clone(['id' => 'id']);

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(PublicEmail::class, $result);
    }

    #[Test]
    public function testCloneWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->marketing->emails->clone([
            'id' => 'id', 'cloneName' => 'cloneName', 'language' => 'language',
        ]);

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(PublicEmail::class, $result);
    }

    #[Test]
    public function testCreateAbTestVariation(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->marketing->emails->createAbTestVariation([
            'contentId' => 'contentId', 'variationName' => 'variationName',
        ]);

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(PublicEmail::class, $result);
    }

    #[Test]
    public function testCreateAbTestVariationWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->marketing->emails->createAbTestVariation([
            'contentId' => 'contentId', 'variationName' => 'variationName',
        ]);

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(PublicEmail::class, $result);
    }

    #[Test]
    public function testGet(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->marketing->emails->get('emailId', []);

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(PublicEmail::class, $result);
    }

    #[Test]
    public function testGetAbTestVariation(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->marketing->emails->getAbTestVariation(
            'emailId',
            []
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(PublicEmail::class, $result);
    }

    #[Test]
    public function testGetDraft(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->marketing->emails->getDraft('emailId');

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(PublicEmail::class, $result);
    }

    #[Test]
    public function testGetRevision(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->marketing->emails->getRevision(
            'revisionId',
            ['emailId' => 'emailId']
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(VersionPublicEmail::class, $result);
    }

    #[Test]
    public function testGetRevisionWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->marketing->emails->getRevision(
            'revisionId',
            ['emailId' => 'emailId']
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(VersionPublicEmail::class, $result);
    }

    #[Test]
    public function testListRevisions(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->marketing->emails->listRevisions('emailId', []);

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(Page::class, $result);
    }

    #[Test]
    public function testPublish(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->marketing->emails->publish('emailId');

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertNull($result);
    }

    #[Test]
    public function testResetDraft(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->marketing->emails->resetDraft('emailId');

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertNull($result);
    }

    #[Test]
    public function testRestoreRevision(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->marketing->emails->restoreRevision(
            'revisionId',
            ['emailId' => 'emailId']
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertNull($result);
    }

    #[Test]
    public function testRestoreRevisionWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->marketing->emails->restoreRevision(
            'revisionId',
            ['emailId' => 'emailId']
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertNull($result);
    }

    #[Test]
    public function testRestoreRevisionToDraft(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->marketing->emails->restoreRevisionToDraft(
            0,
            ['emailId' => 'emailId']
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(PublicEmail::class, $result);
    }

    #[Test]
    public function testRestoreRevisionToDraftWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->marketing->emails->restoreRevisionToDraft(
            0,
            ['emailId' => 'emailId']
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(PublicEmail::class, $result);
    }

    #[Test]
    public function testUnpublish(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->marketing->emails->unpublish('emailId');

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertNull($result);
    }

    #[Test]
    public function testUpdateDraft(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->marketing->emails->updateDraft('emailId', []);

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(PublicEmail::class, $result);
    }
}
