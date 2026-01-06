<?php

namespace Tests\Services\Crm\Pipelines;

use HubspotSDK\Client;
use HubspotSDK\Crm\Pipelines\CollectionResponsePipelineStageNoPaging;
use HubspotSDK\Crm\Pipelines\CollectionResponsePublicAuditInfoNoPaging;
use HubspotSDK\Crm\Pipelines\PipelineStage;
use PHPUnit\Framework\Attributes\CoversNothing;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Tests\UnsupportedMockTests;

/**
 * @internal
 */
#[CoversNothing]
final class StagesTest extends TestCase
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

        $result = $this->client->crm->pipelines->stages->create(
            'pipelineId',
            objectType: 'objectType',
            displayOrder: 1,
            label: 'Done',
            metadata: ['ticketState' => 'CLOSED'],
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(PipelineStage::class, $result);
    }

    #[Test]
    public function testCreateWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->crm->pipelines->stages->create(
            'pipelineId',
            objectType: 'objectType',
            displayOrder: 1,
            label: 'Done',
            metadata: ['ticketState' => 'CLOSED'],
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(PipelineStage::class, $result);
    }

    #[Test]
    public function testUpdate(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->crm->pipelines->stages->update(
            'stageId',
            objectType: 'objectType',
            pipelineID: 'pipelineId',
            metadata: ['ticketState' => 'CLOSED'],
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(PipelineStage::class, $result);
    }

    #[Test]
    public function testUpdateWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->crm->pipelines->stages->update(
            'stageId',
            objectType: 'objectType',
            pipelineID: 'pipelineId',
            metadata: ['ticketState' => 'CLOSED'],
            archived: true,
            displayOrder: 1,
            label: 'Done',
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(PipelineStage::class, $result);
    }

    #[Test]
    public function testList(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->crm->pipelines->stages->list(
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
    public function testListWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->crm->pipelines->stages->list(
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
    public function testDelete(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->crm->pipelines->stages->delete(
            'stageId',
            objectType: 'objectType',
            pipelineID: 'pipelineId'
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertNull($result);
    }

    #[Test]
    public function testDeleteWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->crm->pipelines->stages->delete(
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
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->crm->pipelines->stages->get(
            'stageId',
            objectType: 'objectType',
            pipelineID: 'pipelineId'
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(PipelineStage::class, $result);
    }

    #[Test]
    public function testGetWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->crm->pipelines->stages->get(
            'stageId',
            objectType: 'objectType',
            pipelineID: 'pipelineId'
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(PipelineStage::class, $result);
    }

    #[Test]
    public function testGetAudit(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->crm->pipelines->stages->getAudit(
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
    public function testGetAuditWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->crm->pipelines->stages->getAudit(
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
    public function testReplace(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->crm->pipelines->stages->replace(
            'stageId',
            objectType: 'objectType',
            pipelineID: 'pipelineId',
            displayOrder: 1,
            label: 'Done',
            metadata: ['ticketState' => 'CLOSED'],
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(PipelineStage::class, $result);
    }

    #[Test]
    public function testReplaceWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->crm->pipelines->stages->replace(
            'stageId',
            objectType: 'objectType',
            pipelineID: 'pipelineId',
            displayOrder: 1,
            label: 'Done',
            metadata: ['ticketState' => 'CLOSED'],
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(PipelineStage::class, $result);
    }
}
