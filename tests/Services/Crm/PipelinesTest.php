<?php

namespace Tests\Services\Crm;

use HubspotSDK\Client;
use HubspotSDK\Core\Util;
use HubspotSDK\Crm\Pipelines\CollectionResponsePipelineNoPaging;
use HubspotSDK\Crm\Pipelines\CollectionResponsePublicAuditInfoNoPaging;
use HubspotSDK\Crm\Pipelines\Pipeline;
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

        $result = $this->client->crm->pipelines->create(
            'objectType',
            displayOrder: 0,
            label: 'My replaced pipeline',
            stages: [
                [
                    'displayOrder' => 0,
                    'label' => 'In Progress',
                    'metadata' => ['ticketState' => 'OPEN'],
                ],
                [
                    'displayOrder' => 1,
                    'label' => 'Done',
                    'metadata' => ['ticketState' => 'CLOSED'],
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
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->crm->pipelines->create(
            'objectType',
            displayOrder: 0,
            label: 'My replaced pipeline',
            stages: [
                [
                    'displayOrder' => 0,
                    'label' => 'In Progress',
                    'metadata' => ['ticketState' => 'OPEN'],
                ],
                [
                    'displayOrder' => 1,
                    'label' => 'Done',
                    'metadata' => ['ticketState' => 'CLOSED'],
                ],
            ],
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(Pipeline::class, $result);
    }

    #[Test]
    public function testUpdate(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
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
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->crm->pipelines->update(
            'pipelineId',
            objectType: 'objectType',
            validateDealStageUsagesBeforeDelete: true,
            validateReferencesBeforeDelete: true,
            archived: true,
            displayOrder: 0,
            label: 'My updated pipeline',
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(Pipeline::class, $result);
    }

    #[Test]
    public function testList(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->crm->pipelines->list('objectType');

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(CollectionResponsePipelineNoPaging::class, $result);
    }

    #[Test]
    public function testDelete(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
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
            $this->markTestSkipped('Prism tests are disabled');
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
    public function testGet(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
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
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->crm->pipelines->get(
            'pipelineId',
            objectType: 'objectType'
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(Pipeline::class, $result);
    }

    #[Test]
    public function testGetAudit(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->crm->pipelines->getAudit(
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
    public function testGetAuditWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->crm->pipelines->getAudit(
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
    public function testReplace(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->crm->pipelines->replace(
            'pipelineId',
            objectType: 'objectType',
            displayOrder: 0,
            label: 'My replaced pipeline',
            stages: [
                [
                    'displayOrder' => 0,
                    'label' => 'In Progress',
                    'metadata' => ['ticketState' => 'OPEN'],
                ],
                [
                    'displayOrder' => 1,
                    'label' => 'Done',
                    'metadata' => ['ticketState' => 'CLOSED'],
                ],
            ],
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(Pipeline::class, $result);
    }

    #[Test]
    public function testReplaceWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->crm->pipelines->replace(
            'pipelineId',
            objectType: 'objectType',
            displayOrder: 0,
            label: 'My replaced pipeline',
            stages: [
                [
                    'displayOrder' => 0,
                    'label' => 'In Progress',
                    'metadata' => ['ticketState' => 'OPEN'],
                ],
                [
                    'displayOrder' => 1,
                    'label' => 'Done',
                    'metadata' => ['ticketState' => 'CLOSED'],
                ],
            ],
            validateDealStageUsagesBeforeDelete: true,
            validateReferencesBeforeDelete: true,
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(Pipeline::class, $result);
    }
}
