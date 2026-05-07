<?php

namespace Tests\Services\Cms;

use HubSpotSDK\AssociationDefinition;
use HubSpotSDK\Client;
use HubSpotSDK\Cms\MediaBridge\AttentionSpanEvent;
use HubSpotSDK\Cms\MediaBridge\BulkIntegratorObjectCreationResponse;
use HubSpotSDK\Cms\MediaBridge\CollectionResponseObjectSchemaNoPaging;
use HubSpotSDK\Cms\MediaBridge\CollectionResponsePropertyNoPaging;
use HubSpotSDK\Cms\MediaBridge\EventVisibilityChange;
use HubSpotSDK\Cms\MediaBridge\EventVisibilityResponse;
use HubSpotSDK\Cms\MediaBridge\IntegratorOEmbedDomainModel;
use HubSpotSDK\Cms\MediaBridge\MediaBridgeProperty;
use HubSpotSDK\Cms\MediaBridge\MediaBridgeProviderRegistrationResponse;
use HubSpotSDK\Cms\MediaBridge\MediaPlayedEvent;
use HubSpotSDK\Cms\MediaBridge\MediaPlayedPercentageEvent;
use HubSpotSDK\Cms\MediaBridge\ObjectDefinitionResponse;
use HubSpotSDK\Cms\MediaBridge\ObjectSchema;
use HubSpotSDK\Cms\MediaBridge\OEmbedDomainsCollectionResponse;
use HubSpotSDK\CollectionResponsePropertyGroupNoPaging;
use HubSpotSDK\Core\Util;
use HubSpotSDK\ObjectTypeDefinition;
use HubSpotSDK\PropertyGroup;
use PHPUnit\Framework\Attributes\CoversNothing;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Tests\UnsupportedMockTests;

/**
 * @internal
 */
#[CoversNothing]
final class MediaBridgeTest extends TestCase
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
    public function testCreateAssociation(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->cms->mediaBridge->createAssociation(
            'objectType',
            appID: 0,
            fromObjectTypeID: 'fromObjectTypeId',
            toObjectTypeID: 'toObjectTypeId',
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(AssociationDefinition::class, $result);
    }

    #[Test]
    public function testCreateAssociationWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->cms->mediaBridge->createAssociation(
            'objectType',
            appID: 0,
            fromObjectTypeID: 'fromObjectTypeId',
            toObjectTypeID: 'toObjectTypeId',
            name: 'name',
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(AssociationDefinition::class, $result);
    }

    #[Test]
    public function testCreateAttentionSpanEvent(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->cms->mediaBridge->createAttentionSpanEvent(
            mediaType: 'AUDIO',
            occurredTimestamp: 0,
            rawDataMap: ['foo' => 0],
            sessionID: 'sessionId',
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(AttentionSpanEvent::class, $result);
    }

    #[Test]
    public function testCreateAttentionSpanEventWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->cms->mediaBridge->createAttentionSpanEvent(
            mediaType: 'AUDIO',
            occurredTimestamp: 0,
            rawDataMap: ['foo' => 0],
            sessionID: 'sessionId',
            _hsenc: '_hsenc',
            contactID: 0,
            contactUtk: 'contactUtk',
            derivedValues: ['totalPercentPlayed' => 0, 'totalSecondsPlayed' => 0],
            externalID: 'externalId',
            externalPlayContext: 'EMAIL',
            mediaBridgeID: 0,
            mediaName: 'mediaName',
            mediaURL: 'mediaUrl',
            pageID: 0,
            pageName: 'pageName',
            pageURL: 'pageUrl',
            rawDataString: 'rawDataString',
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(AttentionSpanEvent::class, $result);
    }

    #[Test]
    public function testCreateMediaPlayedEvent(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->cms->mediaBridge->createMediaPlayedEvent(
            mediaType: 'AUDIO',
            occurredTimestamp: 0,
            sessionID: 'sessionId',
            state: 'STARTED',
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(MediaPlayedEvent::class, $result);
    }

    #[Test]
    public function testCreateMediaPlayedEventWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->cms->mediaBridge->createMediaPlayedEvent(
            mediaType: 'AUDIO',
            occurredTimestamp: 0,
            sessionID: 'sessionId',
            state: 'STARTED',
            _hsenc: '_hsenc',
            contactID: 0,
            contactUtk: 'contactUtk',
            externalID: 'externalId',
            externalPlayContext: 'EMAIL',
            iframeURL: 'iframeUrl',
            mediaBridgeID: 0,
            mediaName: 'mediaName',
            mediaURL: 'mediaUrl',
            pageID: 0,
            pageName: 'pageName',
            pageURL: 'pageUrl',
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(MediaPlayedEvent::class, $result);
    }

    #[Test]
    public function testCreateMediaPlayedPercentEvent(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->cms->mediaBridge->createMediaPlayedPercentEvent(
            mediaType: 'AUDIO',
            occurredTimestamp: 0,
            playedPercent: 0,
            sessionID: 'sessionId',
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(MediaPlayedPercentageEvent::class, $result);
    }

    #[Test]
    public function testCreateMediaPlayedPercentEventWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->cms->mediaBridge->createMediaPlayedPercentEvent(
            mediaType: 'AUDIO',
            occurredTimestamp: 0,
            playedPercent: 0,
            sessionID: 'sessionId',
            _hsenc: '_hsenc',
            contactID: 0,
            contactUtk: 'contactUtk',
            externalID: 'externalId',
            externalPlayContext: 'EMAIL',
            mediaBridgeID: 0,
            mediaName: 'mediaName',
            mediaURL: 'mediaUrl',
            pageID: 0,
            pageName: 'pageName',
            pageURL: 'pageUrl',
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(MediaPlayedPercentageEvent::class, $result);
    }

    #[Test]
    public function testCreateObjectType(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->cms->mediaBridge->createObjectType(
            0,
            mediaTypes: ['VIDEO']
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(
            BulkIntegratorObjectCreationResponse::class,
            $result
        );
    }

    #[Test]
    public function testCreateObjectTypeWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->cms->mediaBridge->createObjectType(
            0,
            mediaTypes: ['VIDEO']
        );

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
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->cms->mediaBridge->createOembedDomain(
            0,
            endpoints: ['discovery' => true, 'schemes' => ['string'], 'url' => 'url'],
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(IntegratorOEmbedDomainModel::class, $result);
    }

    #[Test]
    public function testCreateOembedDomainWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->cms->mediaBridge->createOembedDomain(
            0,
            endpoints: ['discovery' => true, 'schemes' => ['string'], 'url' => 'url'],
            portalID: 0,
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(IntegratorOEmbedDomainModel::class, $result);
    }

    #[Test]
    public function testCreateProperty(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->cms->mediaBridge->createProperty(
            'objectType',
            appID: 0,
            fieldType: 'booleancheckbox',
            groupName: 'groupName',
            label: 'label',
            name: 'name',
            type: 'bool',
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(MediaBridgeProperty::class, $result);
    }

    #[Test]
    public function testCreatePropertyWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->cms->mediaBridge->createProperty(
            'objectType',
            appID: 0,
            fieldType: 'booleancheckbox',
            groupName: 'groupName',
            label: 'label',
            name: 'name',
            type: 'bool',
            calculationFormula: 'calculationFormula',
            currencyPropertyName: 'currencyPropertyName',
            dataSensitivity: 'highly_sensitive',
            description: 'description',
            displayOrder: 0,
            externalOptions: true,
            formField: true,
            hasUniqueValue: true,
            hidden: true,
            numberDisplayHint: 'currency',
            options: [
                [
                    'displayOrder' => 0,
                    'hidden' => true,
                    'label' => 'label',
                    'value' => 'value',
                    'description' => 'description',
                ],
            ],
            referencedObjectType: 'referencedObjectType',
            showCurrencySymbol: true,
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(MediaBridgeProperty::class, $result);
    }

    #[Test]
    public function testCreatePropertyGroup(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->cms->mediaBridge->createPropertyGroup(
            'objectType',
            appID: 0,
            label: 'label',
            name: 'name'
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(PropertyGroup::class, $result);
    }

    #[Test]
    public function testCreatePropertyGroupWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->cms->mediaBridge->createPropertyGroup(
            'objectType',
            appID: 0,
            label: 'label',
            name: 'name',
            displayOrder: 0
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(PropertyGroup::class, $result);
    }

    #[Test]
    public function testCreateVideoAssociationDefinition(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->cms->mediaBridge->createVideoAssociationDefinition(
            0
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(AssociationDefinition::class, $result);
    }

    #[Test]
    public function testDeleteAssociation(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->cms->mediaBridge->deleteAssociation(
            'associationId',
            appID: 0,
            objectType: 'objectType'
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertNull($result);
    }

    #[Test]
    public function testDeleteAssociationWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->cms->mediaBridge->deleteAssociation(
            'associationId',
            appID: 0,
            objectType: 'objectType'
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertNull($result);
    }

    #[Test]
    public function testDeleteOembedDomain(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->cms->mediaBridge->deleteOembedDomain(0);

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertNull($result);
    }

    #[Test]
    public function testDeleteProperty(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->cms->mediaBridge->deleteProperty(
            'propertyName',
            appID: 0,
            objectType: 'objectType'
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertNull($result);
    }

    #[Test]
    public function testDeletePropertyWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->cms->mediaBridge->deleteProperty(
            'propertyName',
            appID: 0,
            objectType: 'objectType'
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertNull($result);
    }

    #[Test]
    public function testDeletePropertyGroup(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->cms->mediaBridge->deletePropertyGroup(
            'groupName',
            appID: 0,
            objectType: 'objectType'
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertNull($result);
    }

    #[Test]
    public function testDeletePropertyGroupWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->cms->mediaBridge->deletePropertyGroup(
            'groupName',
            appID: 0,
            objectType: 'objectType'
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertNull($result);
    }

    #[Test]
    public function testGetEventVisibilitySettings(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->cms->mediaBridge->getEventVisibilitySettings(0);

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(EventVisibilityResponse::class, $result);
    }

    #[Test]
    public function testGetOembedDomain(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->cms->mediaBridge->getOembedDomain(
            'oEmbedDomainId',
            appID: 0
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(IntegratorOEmbedDomainModel::class, $result);
    }

    #[Test]
    public function testGetOembedDomainWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->cms->mediaBridge->getOembedDomain(
            'oEmbedDomainId',
            appID: 0
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(IntegratorOEmbedDomainModel::class, $result);
    }

    #[Test]
    public function testGetProperty(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->cms->mediaBridge->getProperty(
            'propertyName',
            appID: 0,
            objectType: 'objectType'
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(MediaBridgeProperty::class, $result);
    }

    #[Test]
    public function testGetPropertyWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->cms->mediaBridge->getProperty(
            'propertyName',
            appID: 0,
            objectType: 'objectType',
            archived: true,
            properties: 'properties',
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(MediaBridgeProperty::class, $result);
    }

    #[Test]
    public function testGetPropertyGroup(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->cms->mediaBridge->getPropertyGroup(
            'groupName',
            appID: 0,
            objectType: 'objectType'
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(PropertyGroup::class, $result);
    }

    #[Test]
    public function testGetPropertyGroupWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->cms->mediaBridge->getPropertyGroup(
            'groupName',
            appID: 0,
            objectType: 'objectType'
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(PropertyGroup::class, $result);
    }

    #[Test]
    public function testGetSchema(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->cms->mediaBridge->getSchema(
            'objectType',
            appID: 0
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(ObjectSchema::class, $result);
    }

    #[Test]
    public function testGetSchemaWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->cms->mediaBridge->getSchema(
            'objectType',
            appID: 0
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(ObjectSchema::class, $result);
    }

    #[Test]
    public function testListObjectTypesByMediaType(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->cms->mediaBridge->listObjectTypesByMediaType(
            'AUDIO',
            appID: 0
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(ObjectDefinitionResponse::class, $result);
    }

    #[Test]
    public function testListObjectTypesByMediaTypeWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->cms->mediaBridge->listObjectTypesByMediaType(
            'AUDIO',
            appID: 0,
            includeFullDefinition: true
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(ObjectDefinitionResponse::class, $result);
    }

    #[Test]
    public function testListOembedDomains(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->cms->mediaBridge->listOembedDomains(0);

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(OEmbedDomainsCollectionResponse::class, $result);
    }

    #[Test]
    public function testListProperties(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->cms->mediaBridge->listProperties(
            'objectType',
            appID: 0
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(CollectionResponsePropertyNoPaging::class, $result);
    }

    #[Test]
    public function testListPropertiesWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->cms->mediaBridge->listProperties(
            'objectType',
            appID: 0,
            archived: true,
            properties: 'properties'
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(CollectionResponsePropertyNoPaging::class, $result);
    }

    #[Test]
    public function testListPropertyGroups(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->cms->mediaBridge->listPropertyGroups(
            'objectType',
            appID: 0
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(
            CollectionResponsePropertyGroupNoPaging::class,
            $result
        );
    }

    #[Test]
    public function testListPropertyGroupsWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->cms->mediaBridge->listPropertyGroups(
            'objectType',
            appID: 0
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(
            CollectionResponsePropertyGroupNoPaging::class,
            $result
        );
    }

    #[Test]
    public function testListSchemas(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->cms->mediaBridge->listSchemas(0);

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(
            CollectionResponseObjectSchemaNoPaging::class,
            $result
        );
    }

    #[Test]
    public function testRegisterAppName(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->cms->mediaBridge->registerAppName(0, updatedAt: 0);

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
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->cms->mediaBridge->registerAppName(
            0,
            updatedAt: 0,
            allowImportOnDisconnect: true,
            moduleName: 'moduleName',
            name: 'name',
        );

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
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->cms->mediaBridge->updateEventVisibilitySettings(
            0,
            eventType: 'ALL',
            updatedAt: 0
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(EventVisibilityChange::class, $result);
    }

    #[Test]
    public function testUpdateEventVisibilitySettingsWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->cms->mediaBridge->updateEventVisibilitySettings(
            0,
            eventType: 'ALL',
            updatedAt: 0,
            showInReporting: true,
            showInTimeline: true,
            showInWorkflows: true,
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(EventVisibilityChange::class, $result);
    }

    #[Test]
    public function testUpdateOembedDomain(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->cms->mediaBridge->updateOembedDomain(
            'oEmbedDomainId',
            appID: 0,
            endpoints: ['discovery' => true, 'schemes' => ['string'], 'url' => 'url'],
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(IntegratorOEmbedDomainModel::class, $result);
    }

    #[Test]
    public function testUpdateOembedDomainWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->cms->mediaBridge->updateOembedDomain(
            'oEmbedDomainId',
            appID: 0,
            endpoints: ['discovery' => true, 'schemes' => ['string'], 'url' => 'url'],
            portalID: 0,
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(IntegratorOEmbedDomainModel::class, $result);
    }

    #[Test]
    public function testUpdateProperty(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->cms->mediaBridge->updateProperty(
            'propertyName',
            appID: 0,
            objectType: 'objectType'
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(MediaBridgeProperty::class, $result);
    }

    #[Test]
    public function testUpdatePropertyWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->cms->mediaBridge->updateProperty(
            'propertyName',
            appID: 0,
            objectType: 'objectType',
            calculationFormula: 'calculationFormula',
            currencyPropertyName: 'currencyPropertyName',
            description: 'description',
            displayOrder: 0,
            fieldType: 'booleancheckbox',
            formField: true,
            groupName: 'groupName',
            hasUniqueValue: true,
            hidden: true,
            label: 'label',
            numberDisplayHint: 'currency',
            options: [
                [
                    'displayOrder' => 0,
                    'hidden' => true,
                    'label' => 'label',
                    'value' => 'value',
                    'description' => 'description',
                ],
            ],
            showCurrencySymbol: true,
            type: 'bool',
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(MediaBridgeProperty::class, $result);
    }

    #[Test]
    public function testUpdatePropertyGroup(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->cms->mediaBridge->updatePropertyGroup(
            'groupName',
            appID: 0,
            objectType: 'objectType'
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(PropertyGroup::class, $result);
    }

    #[Test]
    public function testUpdatePropertyGroupWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->cms->mediaBridge->updatePropertyGroup(
            'groupName',
            appID: 0,
            objectType: 'objectType',
            displayOrder: 0,
            label: 'label',
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(PropertyGroup::class, $result);
    }

    #[Test]
    public function testUpdateSchema(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->cms->mediaBridge->updateSchema(
            'objectType',
            appID: 0,
            clearDescription: true
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(ObjectTypeDefinition::class, $result);
    }

    #[Test]
    public function testUpdateSchemaWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->cms->mediaBridge->updateSchema(
            'objectType',
            appID: 0,
            clearDescription: true,
            allowsSensitiveProperties: true,
            description: 'description',
            labels: ['plural' => 'plural', 'singular' => 'singular'],
            primaryDisplayProperty: 'primaryDisplayProperty',
            requiredProperties: ['string'],
            restorable: true,
            searchableProperties: ['string'],
            secondaryDisplayProperties: ['string'],
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(ObjectTypeDefinition::class, $result);
    }

    #[Test]
    public function testUpdateSettings(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->cms->mediaBridge->updateSettings(0, updatedAt: 0);

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(
            MediaBridgeProviderRegistrationResponse::class,
            $result
        );
    }

    #[Test]
    public function testUpdateSettingsWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->cms->mediaBridge->updateSettings(
            0,
            updatedAt: 0,
            allowImportOnDisconnect: true,
            moduleName: 'moduleName',
            name: 'name',
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(
            MediaBridgeProviderRegistrationResponse::class,
            $result
        );
    }
}
