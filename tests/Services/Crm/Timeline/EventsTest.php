<?php

namespace Tests\Services\Crm\Timeline;

use HubspotSDK\Client;
use HubspotSDK\Crm\Timeline\EventDetail;
use HubspotSDK\Crm\Timeline\TimelineEventResponse;
use PHPUnit\Framework\Attributes\CoversNothing;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Tests\UnsupportedMockTests;

/**
 * @internal
 */
#[CoversNothing]
final class EventsTest extends TestCase
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

        $result = $this->client->crm->timeline->events->create([
            'eventTemplateId' => '1001298',
            'tokens' => [
                'petAge' => 'string', 'petColor' => 'black', 'petName' => 'Art3mis',
            ],
        ]);

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(TimelineEventResponse::class, $result);
    }

    #[Test]
    public function testCreateWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->crm->timeline->events->create([
            'eventTemplateId' => '1001298',
            'tokens' => [
                'petAge' => 'string', 'petColor' => 'black', 'petName' => 'Art3mis',
            ],
            'id' => 'id',
            'domain' => 'domain',
            'email' => 'art3mis-pup@petspot.com',
            'extraData' => [
                'questions' => [
                    ['answer' => 'Bark!', 'question' => 'Who\'s a good girl?'],
                    ['answer' => 'Woof!', 'question' => 'Do you wanna go on a walk?'],
                ],
            ],
            'objectId' => 'objectId',
            'timelineIFrame' => [
                'headerLabel' => 'Art3mis dog',
                'height' => 400,
                'linkLabel' => 'View Art3mis',
                'url' => 'https://my.petspot.com/pets/Art3mis',
                'width' => 600,
            ],
            'timestamp' => new \DateTimeImmutable('2019-12-27T18:11:19.117Z'),
            'utk' => 'utk',
        ]);

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(TimelineEventResponse::class, $result);
    }

    #[Test]
    public function testBatchCreate(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->crm->timeline->events->batchCreate([
            'inputs' => [
                [
                    'eventTemplateId' => '1001298',
                    'tokens' => [
                        'petAge' => 'string', 'petColor' => 'black', 'petName' => 'Art3mis',
                    ],
                ],
                [
                    'eventTemplateId' => '1001298',
                    'tokens' => [
                        'petAge' => 'string', 'petColor' => 'yellow', 'petName' => 'Pocket',
                    ],
                ],
            ],
        ]);

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertNull($result);
    }

    #[Test]
    public function testBatchCreateWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->crm->timeline->events->batchCreate([
            'inputs' => [
                [
                    'eventTemplateId' => '1001298',
                    'tokens' => [
                        'petAge' => 'string', 'petColor' => 'black', 'petName' => 'Art3mis',
                    ],
                    'id' => 'id',
                    'domain' => 'domain',
                    'email' => 'art3mis-pup@petspot.com',
                    'extraData' => [
                        'questions' => [
                            ['answer' => 'Bark!', 'question' => 'Who\'s a good girl?'],
                            ['answer' => 'Woof!', 'question' => 'Do you wanna go on a walk?'],
                        ],
                    ],
                    'objectId' => 'objectId',
                    'timelineIFrame' => [
                        'headerLabel' => 'Art3mis dog',
                        'height' => 400,
                        'linkLabel' => 'View Art3mis',
                        'url' => 'https://my.petspot.com/pets/Art3mis',
                        'width' => 600,
                    ],
                    'timestamp' => new \DateTimeImmutable('2019-12-27T18:11:19.117Z'),
                    'utk' => 'utk',
                ],
                [
                    'eventTemplateId' => '1001298',
                    'tokens' => [
                        'petAge' => 'string', 'petColor' => 'yellow', 'petName' => 'Pocket',
                    ],
                    'id' => 'id',
                    'domain' => 'domain',
                    'email' => 'pocket-tiger@petspot.com',
                    'extraData' => [
                        'questions' => [
                            ['answer' => 'Purr...', 'question' => 'Who\'s a good kitty?'],
                            [
                                'answer' => 'Meow!',
                                'question' => 'Will you stop playing with that?',
                            ],
                        ],
                    ],
                    'objectId' => 'objectId',
                    'timelineIFrame' => [
                        'headerLabel' => 'Pocket Tiger',
                        'height' => 400,
                        'linkLabel' => 'View Pocket',
                        'url' => 'https://my.petspot.com/pets/Pocket',
                        'width' => 600,
                    ],
                    'timestamp' => new \DateTimeImmutable('2019-12-27T18:11:19.117Z'),
                    'utk' => 'utk',
                ],
            ],
        ]);

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertNull($result);
    }

    #[Test]
    public function testGet(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->crm->timeline->events->get(
            'eventId',
            ['eventTemplateId' => 'eventTemplateId']
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(TimelineEventResponse::class, $result);
    }

    #[Test]
    public function testGetWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->crm->timeline->events->get(
            'eventId',
            ['eventTemplateId' => 'eventTemplateId']
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(TimelineEventResponse::class, $result);
    }

    #[Test]
    public function testGetDetail(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->crm->timeline->events->getDetail(
            'eventId',
            ['eventTemplateId' => 'eventTemplateId']
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(EventDetail::class, $result);
    }

    #[Test]
    public function testGetDetailWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->crm->timeline->events->getDetail(
            'eventId',
            ['eventTemplateId' => 'eventTemplateId']
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(EventDetail::class, $result);
    }
}
