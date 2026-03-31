<?php

namespace Tests\Services\Crm\Timeline;

use HubspotSDK\Client;
use HubspotSDK\Core\Util;
use HubspotSDK\Crm\Timeline\BatchResponseAppEventOccurrence;
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
    public function testCreate(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->crm->timeline->batch->create(
            inputs: [
                [
                    'id' => 'id',
                    'eventTypeName' => 'eventTypeName',
                    'properties' => ['foo' => 'string'],
                ],
            ],
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(BatchResponseAppEventOccurrence::class, $result);
    }

    #[Test]
    public function testCreateWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->crm->timeline->batch->create(
            inputs: [
                [
                    'id' => 'id',
                    'eventTypeName' => 'eventTypeName',
                    'properties' => ['foo' => 'string'],
                    'domain' => 'domain',
                    'email' => 'email',
                    'extraData' => (object) [],
                    'objectID' => 'objectId',
                    'objectTypeFullyQualifiedName' => 'objectTypeFullyQualifiedName',
                    'timelineIFrame' => [
                        'headerLabel' => 'headerLabel',
                        'height' => 0,
                        'linkLabel' => 'linkLabel',
                        'url' => 'url',
                        'width' => 0,
                    ],
                    'timestamp' => new \DateTimeImmutable('2019-12-27T18:11:19.117Z'),
                    'utk' => 'utk',
                ],
            ],
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(BatchResponseAppEventOccurrence::class, $result);
    }
}
