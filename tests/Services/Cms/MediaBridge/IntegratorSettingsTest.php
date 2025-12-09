<?php

namespace Tests\Services\Cms\MediaBridge;

use HubspotSDK\Client;
use HubspotSDK\Cms\MediaBridge\BulkIntegratorObjectCreationResponse;
use HubspotSDK\Cms\MediaBridge\EventVisibilityChange;
use HubspotSDK\Cms\MediaBridge\EventVisibilityResponse;
use HubspotSDK\Cms\MediaBridge\IntegratorOEmbedDomainModel;
use HubspotSDK\Cms\MediaBridge\MediaBridgeProviderRegistrationResponse;
use HubspotSDK\Cms\MediaBridge\ObjectDefinitionResponse;
use HubspotSDK\Cms\MediaBridge\OEmbedDomainsCollectionResponse;
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

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(
            BulkIntegratorObjectCreationResponse::class,
            $result
        );
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

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(
            BulkIntegratorObjectCreationResponse::class,
            $result
        );
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

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(IntegratorOEmbedDomainModel::class, $result);
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
                    'portalID' => 0,
                ],
            )
        ;

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(IntegratorOEmbedDomainModel::class, $result);
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

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertNull($result);
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

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(EventVisibilityResponse::class, $result);
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
            ->getObjectDefinitionsByMediaType('AUDIO', ['appID' => 0])
        ;

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(ObjectDefinitionResponse::class, $result);
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
            ->getObjectDefinitionsByMediaType(
                'AUDIO',
                ['appID' => 0, 'includeFullDefinition' => true]
            )
        ;

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(ObjectDefinitionResponse::class, $result);
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
            ->getOembedDomain('oEmbedDomainId', ['appID' => 0])
        ;

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(IntegratorOEmbedDomainModel::class, $result);
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
            ->getOembedDomain('oEmbedDomainId', ['appID' => 0])
        ;

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(IntegratorOEmbedDomainModel::class, $result);
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

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(OEmbedDomainsCollectionResponse::class, $result);
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

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(
            MediaBridgeProviderRegistrationResponse::class,
            $result
        );
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
            ->registerAppName(0, ['updatedAt' => 0, 'name' => 'name'])
        ;

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(
            MediaBridgeProviderRegistrationResponse::class,
            $result
        );
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

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(
            MediaBridgeProviderRegistrationResponse::class,
            $result
        );
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
            ->updateAppName(0, ['updatedAt' => 0, 'name' => 'name'])
        ;

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(
            MediaBridgeProviderRegistrationResponse::class,
            $result
        );
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

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(EventVisibilityChange::class, $result);
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
                [
                    'eventType' => 'ALL',
                    'updatedAt' => 0,
                    'showInReporting' => true,
                    'showInTimeline' => true,
                    'showInWorkflows' => true,
                ],
            )
        ;

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(EventVisibilityChange::class, $result);
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
                    'appID' => 0,
                    'endpoints' => [
                        'discovery' => true, 'schemes' => ['string'], 'url' => 'url',
                    ],
                ],
            )
        ;

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(IntegratorOEmbedDomainModel::class, $result);
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
                    'appID' => 0,
                    'endpoints' => [
                        'discovery' => true, 'schemes' => ['string'], 'url' => 'url',
                    ],
                    'portalID' => 0,
                ],
            );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(IntegratorOEmbedDomainModel::class, $result);
    }
}
