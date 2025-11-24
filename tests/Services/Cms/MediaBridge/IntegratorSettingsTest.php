<?php

namespace Tests\Services\Cms\MediaBridge;

use HubspotSDK\Client;
use PHPUnit\Framework\Attributes\CoversNothing;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Tests\UnsupportedMockTests;

/**
 * @internal
 */
#[CoversNothing]
final class IntegratorSettingsTest extends TestCase
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
    public function testCreateObjectDefinition(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this
            ->client
            ->cms
            ->mediaBridge
            ->integratorSettings
            ->createObjectDefinition(0, ['mediaTypes' => ['VIDEO']])
        ;

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testCreateObjectDefinitionWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this
            ->client
            ->cms
            ->mediaBridge
            ->integratorSettings
            ->createObjectDefinition(0, ['mediaTypes' => ['VIDEO']])
        ;

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testCreateOembedDomain(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this
            ->client
            ->cms
            ->mediaBridge
            ->integratorSettings
            ->createOembedDomain(
                0,
                [
                    'endpoints' => [
                        'discovery' => true, 'schemes' => ['string'], 'url' => 'url',
                    ],
                ],
            )
        ;

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testCreateOembedDomainWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this
            ->client
            ->cms
            ->mediaBridge
            ->integratorSettings
            ->createOembedDomain(
                0,
                [
                    'endpoints' => [
                        'discovery' => true, 'schemes' => ['string'], 'url' => 'url',
                    ],
                ],
            )
        ;

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testDeleteOembedDomain(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this
            ->client
            ->cms
            ->mediaBridge
            ->integratorSettings
            ->deleteOembedDomain(0, [])
        ;

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testGetEventVisibilitySettings(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this
            ->client
            ->cms
            ->mediaBridge
            ->integratorSettings
            ->getEventVisibilitySettings(0)
        ;

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testGetObjectDefinitionsByMediaType(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this
            ->client
            ->cms
            ->mediaBridge
            ->integratorSettings
            ->getObjectDefinitionsByMediaType('AUDIO', ['appId' => 0])
        ;

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testGetObjectDefinitionsByMediaTypeWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this
            ->client
            ->cms
            ->mediaBridge
            ->integratorSettings
            ->getObjectDefinitionsByMediaType('AUDIO', ['appId' => 0])
        ;

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testGetOembedDomain(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this
            ->client
            ->cms
            ->mediaBridge
            ->integratorSettings
            ->getOembedDomain('oEmbedDomainId', ['appId' => 0])
        ;

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testGetOembedDomainWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this
            ->client
            ->cms
            ->mediaBridge
            ->integratorSettings
            ->getOembedDomain('oEmbedDomainId', ['appId' => 0])
        ;

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testListOembedDomains(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this
            ->client
            ->cms
            ->mediaBridge
            ->integratorSettings
            ->listOembedDomains(0, [])
        ;

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testRegisterAppName(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this
            ->client
            ->cms
            ->mediaBridge
            ->integratorSettings
            ->registerAppName(0, ['updatedAt' => 0])
        ;

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testRegisterAppNameWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this
            ->client
            ->cms
            ->mediaBridge
            ->integratorSettings
            ->registerAppName(0, ['updatedAt' => 0])
        ;

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testUpdateAppName(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this
            ->client
            ->cms
            ->mediaBridge
            ->integratorSettings
            ->updateAppName(0, ['updatedAt' => 0])
        ;

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testUpdateAppNameWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this
            ->client
            ->cms
            ->mediaBridge
            ->integratorSettings
            ->updateAppName(0, ['updatedAt' => 0])
        ;

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testUpdateEventVisibilitySettings(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this
            ->client
            ->cms
            ->mediaBridge
            ->integratorSettings
            ->updateEventVisibilitySettings(
                0,
                ['eventType' => 'ALL', 'updatedAt' => 0]
            )
        ;

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testUpdateEventVisibilitySettingsWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this
            ->client
            ->cms
            ->mediaBridge
            ->integratorSettings
            ->updateEventVisibilitySettings(
                0,
                ['eventType' => 'ALL', 'updatedAt' => 0]
            )
        ;

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testUpdateOembedDomain(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this
            ->client
            ->cms
            ->mediaBridge
            ->integratorSettings
            ->updateOembedDomain(
                'oEmbedDomainId',
                [
                    'appId' => 0,
                    'endpoints' => [
                        'discovery' => true, 'schemes' => ['string'], 'url' => 'url',
                    ],
                ],
            )
        ;

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testUpdateOembedDomainWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this
            ->client
            ->cms
            ->mediaBridge
            ->integratorSettings
            ->updateOembedDomain(
                'oEmbedDomainId',
                [
                    'appId' => 0,
                    'endpoints' => [
                        'discovery' => true, 'schemes' => ['string'], 'url' => 'url',
                    ],
                ],
            );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }
}
