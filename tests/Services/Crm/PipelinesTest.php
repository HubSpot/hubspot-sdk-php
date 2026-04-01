<?php

namespace Tests\Services\Crm;

use HubspotSDK\Client;
use HubspotSDK\Core\Util;
use HubspotSDK\Crm\Pipelines\CollectionResponsePipelineNoPaging;
use HubspotSDK\Crm\Pipelines\CollectionResponsePipelineStageNoPaging;
use HubspotSDK\Crm\Pipelines\CollectionResponsePublicAuditInfoNoPaging;
use HubspotSDK\Crm\Pipelines\Pipeline;
use HubspotSDK\Crm\Pipelines\PipelineStage;
use PHPUnit\Framework\Attributes\CoversNothing;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Tests\UnsupportedMockTests;

/**
 * @internal
 */
#[CoversNothing]
final class PipelinesTest extends TestCase
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

        $result = $this->client->crm->pipelines->create(
            'objectType',
            displayOrder: 0,
            label: 'label',
            stages: [
                [
                    'displayOrder' => 0,
                    'label' => 'label',
                    'metadata' => ['foo' => 'string'],
                ],
            ],
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(Pipeline::class, $result);
    }

    #[Test]
    public function testCreateWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->crm->pipelines->create(
            'objectType',
            displayOrder: 0,
            label: 'label',
            stages: [
                [
                    'displayOrder' => 0,
                    'label' => 'label',
                    'metadata' => ['foo' => 'string'],
                    'stageID' => 'stageId',
                ],
            ],
            pipelineID: 'pipelineId',
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(Pipeline::class, $result);
    }

    #[Test]
    public function testUpdate(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->crm->pipelines->update(
            'pipelineId',
            objectType: 'objectType'
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(Pipeline::class, $result);
    }

    #[Test]
    public function testUpdateWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->crm->pipelines->update(
            'pipelineId',
            objectType: 'objectType',
            validateDealStageUsagesBeforeDelete: true,
            validateReferencesBeforeDelete: true,
            archived: true,
            displayOrder: 0,
            label: 'label',
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(Pipeline::class, $result);
    }

    #[Test]
    public function testList(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->crm->pipelines->list('objectType');

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(CollectionResponsePipelineNoPaging::class, $result);
    }

    #[Test]
    public function testDelete(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->crm->pipelines->delete(
            'pipelineId',
            objectType: 'objectType'
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertNull($result);
    }

    #[Test]
    public function testDeleteWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->crm->pipelines->delete(
            'pipelineId',
            objectType: 'objectType',
            validateDealStageUsagesBeforeDelete: true,
            validateReferencesBeforeDelete: true,
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertNull($result);
    }

    #[Test]
    public function testCreateStage(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->crm->pipelines->createStage(
            'pipelineId',
            objectType: 'objectType',
            displayOrder: 0,
            label: 'label',
            metadata: ['foo' => 'string'],
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(PipelineStage::class, $result);
    }

    #[Test]
    public function testCreateStageWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->crm->pipelines->createStage(
            'pipelineId',
            objectType: 'objectType',
            displayOrder: 0,
            label: 'label',
            metadata: ['foo' => 'string'],
            stageID: 'stageId',
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(PipelineStage::class, $result);
    }

    #[Test]
    public function testDeleteStage(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->crm->pipelines->deleteStage(
            'stageId',
            objectType: 'objectType',
            pipelineID: 'pipelineId'
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertNull($result);
    }

    #[Test]
    public function testDeleteStageWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->crm->pipelines->deleteStage(
            'stageId',
            objectType: 'objectType',
            pipelineID: 'pipelineId'
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertNull($result);
    }

    #[Test]
    public function testGet(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->crm->pipelines->get(
            'pipelineId',
            objectType: 'objectType'
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(Pipeline::class, $result);
    }

    #[Test]
    public function testGetWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->crm->pipelines->get(
            'pipelineId',
            objectType: 'objectType'
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(Pipeline::class, $result);
    }

    #[Test]
    public function testGetStage(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->crm->pipelines->getStage(
            'stageId',
            objectType: 'objectType',
            pipelineID: 'pipelineId'
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(PipelineStage::class, $result);
    }

    #[Test]
    public function testGetStageWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->crm->pipelines->getStage(
            'stageId',
            objectType: 'objectType',
            pipelineID: 'pipelineId'
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(PipelineStage::class, $result);
    }

    #[Test]
    public function testListAudit(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->crm->pipelines->listAudit(
            'pipelineId',
            objectType: 'objectType'
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(
            CollectionResponsePublicAuditInfoNoPaging::class,
            $result
        );
    }

    #[Test]
    public function testListAuditWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->crm->pipelines->listAudit(
            'pipelineId',
            objectType: 'objectType'
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(
            CollectionResponsePublicAuditInfoNoPaging::class,
            $result
        );
    }

    #[Test]
    public function testListStageAudit(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->crm->pipelines->listStageAudit(
            'stageId',
            objectType: 'objectType',
            pipelineID: 'pipelineId'
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(
            CollectionResponsePublicAuditInfoNoPaging::class,
            $result
        );
    }

    #[Test]
    public function testListStageAuditWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->crm->pipelines->listStageAudit(
            'stageId',
            objectType: 'objectType',
            pipelineID: 'pipelineId'
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(
            CollectionResponsePublicAuditInfoNoPaging::class,
            $result
        );
    }

    #[Test]
    public function testListStages(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->crm->pipelines->listStages(
            'pipelineId',
            objectType: 'objectType'
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(
            CollectionResponsePipelineStageNoPaging::class,
            $result
        );
    }

    #[Test]
    public function testListStagesWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->crm->pipelines->listStages(
            'pipelineId',
            objectType: 'objectType'
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(
            CollectionResponsePipelineStageNoPaging::class,
            $result
        );
    }

    #[Test]
    public function testUpdateAllProperties(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->crm->pipelines->updateAllProperties(
            'pipelineId',
            objectType: 'objectType',
            displayOrder: 0,
            label: 'label',
            stages: [
                [
                    'displayOrder' => 0,
                    'label' => 'label',
                    'metadata' => ['foo' => 'string'],
                ],
            ],
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(Pipeline::class, $result);
    }

    #[Test]
    public function testUpdateAllPropertiesWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->crm->pipelines->updateAllProperties(
            'pipelineId',
            objectType: 'objectType',
            displayOrder: 0,
            label: 'label',
            stages: [
                [
                    'displayOrder' => 0,
                    'label' => 'label',
                    'metadata' => ['foo' => 'string'],
                    'stageID' => 'stageId',
                ],
            ],
            validateDealStageUsagesBeforeDelete: true,
            validateReferencesBeforeDelete: true,
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(Pipeline::class, $result);
    }

    #[Test]
    public function testUpdateStage(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->crm->pipelines->updateStage(
            'stageId',
            objectType: 'objectType',
            pipelineID: 'pipelineId',
            metadata: ['foo' => 'string'],
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(PipelineStage::class, $result);
    }

    #[Test]
    public function testUpdateStageWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->crm->pipelines->updateStage(
            'stageId',
            objectType: 'objectType',
            pipelineID: 'pipelineId',
            metadata: ['foo' => 'string'],
            archived: true,
            displayOrder: 0,
            label: 'label',
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(PipelineStage::class, $result);
    }

    #[Test]
    public function testUpdateStageAllProperties(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->crm->pipelines->updateStageAllProperties(
            'stageId',
            objectType: 'objectType',
            pipelineID: 'pipelineId',
            displayOrder: 0,
            label: 'label',
            metadata: ['foo' => 'string'],
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(PipelineStage::class, $result);
    }

    #[Test]
    public function testUpdateStageAllPropertiesWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->crm->pipelines->updateStageAllProperties(
            'stageId',
            objectType: 'objectType',
            pipelineID: 'pipelineId',
            displayOrder: 0,
            label: 'label',
            metadata: ['foo' => 'string'],
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(PipelineStage::class, $result);
    }
}
