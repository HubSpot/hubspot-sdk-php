<?php

namespace Tests\Services\DataStudio;

use HubspotSDK\Client;
use HubspotSDK\Core\Util;
use HubspotSDK\DataStudio\Datasource\DataSourceGetResponse;
use HubspotSDK\DataStudio\Datasource\DataSourceUpdateResponse;
use PHPUnit\Framework\Attributes\CoversNothing;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Tests\UnsupportedMockTests;

/**
 * @internal
 */
#[CoversNothing]
final class DatasourceTest extends TestCase
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
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->dataStudio->datasource->create(
            bodyParts: [
                [
                    'contentDisposition' => [
                        'creationDate' => new \DateTimeImmutable(
                            '2019-12-27T18:11:19.117Z'
                        ),
                        'fileName' => 'fileName',
                        'modificationDate' => new \DateTimeImmutable(
                            '2019-12-27T18:11:19.117Z'
                        ),
                        'parameters' => ['foo' => 'string'],
                        'readDate' => new \DateTimeImmutable('2019-12-27T18:11:19.117Z'),
                        'size' => 0,
                        'type' => 'type',
                    ],
                    'entity' => (object) [],
                    'headers' => ['foo' => ['string']],
                    'mediaType' => [
                        'parameters' => ['foo' => 'string'],
                        'subtype' => 'subtype',
                        'type' => 'type',
                        'wildcardSubtype' => true,
                        'wildcardType' => true,
                ],
                    'messageBodyWorkers' => (object) [],
                    'parameterizedHeaders' => [
                        'foo' => [['parameters' => ['foo' => 'string'], 'value' => 'value']],
                ],
                    'providers' => (object) [],
                ],
            ],
            contentDisposition: [
                'creationDate' => new \DateTimeImmutable('2019-12-27T18:11:19.117Z'),
                'fileName' => 'fileName',
                'modificationDate' => new \DateTimeImmutable(
                    '2019-12-27T18:11:19.117Z'
                ),
                'parameters' => ['foo' => 'string'],
                'readDate' => new \DateTimeImmutable('2019-12-27T18:11:19.117Z'),
                'size' => 0,
                'type' => 'type',
            ],
            entity: (object) [],
            fields: [
                'foo' => [
                    [
                        'contentDisposition' => [
                            'creationDate' => new \DateTimeImmutable(
                                '2019-12-27T18:11:19.117Z'
                            ),
                            'fileName' => 'fileName',
                            'modificationDate' => new \DateTimeImmutable(
                                '2019-12-27T18:11:19.117Z'
                            ),
                            'parameters' => ['foo' => 'string'],
                            'readDate' => new \DateTimeImmutable('2019-12-27T18:11:19.117Z'),
                            'size' => 0,
                            'type' => 'type',
                        ],
                        'entity' => (object) [],
                        'formDataContentDisposition' => [
                            'creationDate' => new \DateTimeImmutable(
                                '2019-12-27T18:11:19.117Z'
                            ),
                            'fileName' => 'fileName',
                            'modificationDate' => new \DateTimeImmutable(
                                '2019-12-27T18:11:19.117Z'
                            ),
                            'name' => 'name',
                            'parameters' => ['foo' => 'string'],
                            'readDate' => new \DateTimeImmutable('2019-12-27T18:11:19.117Z'),
                            'size' => 0,
                            'type' => 'type',
                    ],
                        'headers' => ['foo' => ['string']],
                        'mediaType' => [
                            'parameters' => ['foo' => 'string'],
                            'subtype' => 'subtype',
                            'type' => 'type',
                            'wildcardSubtype' => true,
                            'wildcardType' => true,
                    ],
                        'messageBodyWorkers' => (object) [],
                        'name' => 'name',
                        'parameterizedHeaders' => [
                            'foo' => [
                                ['parameters' => ['foo' => 'string'], 'value' => 'value'],
                            ],
                    ],
                        'providers' => (object) [],
                        'simple' => true,
                        'value' => 'value',
                    ],
                ],
            ],
            headers: ['foo' => ['string']],
            mediaType: [
                'parameters' => ['foo' => 'string'],
                'subtype' => 'subtype',
                'type' => 'type',
                'wildcardSubtype' => true,
                'wildcardType' => true,
            ],
            messageBodyWorkers: (object) [],
            parameterizedHeaders: [
                'foo' => [['parameters' => ['foo' => 'string'], 'value' => 'value']],
            ],
            providers: (object) [],
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertIsString($result);
    }

    #[Test]
    public function testCreateWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->dataStudio->datasource->create(
            bodyParts: [
                [
                    'contentDisposition' => [
                        'creationDate' => new \DateTimeImmutable(
                            '2019-12-27T18:11:19.117Z'
                        ),
                        'fileName' => 'fileName',
                        'modificationDate' => new \DateTimeImmutable(
                            '2019-12-27T18:11:19.117Z'
                        ),
                        'parameters' => ['foo' => 'string'],
                        'readDate' => new \DateTimeImmutable('2019-12-27T18:11:19.117Z'),
                        'size' => 0,
                        'type' => 'type',
                    ],
                    'entity' => (object) [],
                    'headers' => ['foo' => ['string']],
                    'mediaType' => [
                        'parameters' => ['foo' => 'string'],
                        'subtype' => 'subtype',
                        'type' => 'type',
                        'wildcardSubtype' => true,
                        'wildcardType' => true,
                ],
                    'messageBodyWorkers' => (object) [],
                    'parameterizedHeaders' => [
                        'foo' => [['parameters' => ['foo' => 'string'], 'value' => 'value']],
                ],
                    'providers' => (object) [],
                    'parent' => [
                        'bodyParts' => [],
                        'contentDisposition' => [
                            'creationDate' => new \DateTimeImmutable(
                                '2019-12-27T18:11:19.117Z'
                            ),
                            'fileName' => 'fileName',
                            'modificationDate' => new \DateTimeImmutable(
                                '2019-12-27T18:11:19.117Z'
                            ),
                            'parameters' => ['foo' => 'string'],
                            'readDate' => new \DateTimeImmutable('2019-12-27T18:11:19.117Z'),
                            'size' => 0,
                            'type' => 'type',
                        ],
                        'entity' => (object) [],
                        'headers' => ['foo' => ['string']],
                        'mediaType' => [
                            'parameters' => ['foo' => 'string'],
                            'subtype' => 'subtype',
                            'type' => 'type',
                            'wildcardSubtype' => true,
                            'wildcardType' => true,
                    ],
                        'messageBodyWorkers' => (object) [],
                        'parameterizedHeaders' => [
                            'foo' => [
                                ['parameters' => ['foo' => 'string'], 'value' => 'value'],
                            ],
                    ],
                        'providers' => (object) [],
                ],
                ],
            ],
            contentDisposition: [
                'creationDate' => new \DateTimeImmutable('2019-12-27T18:11:19.117Z'),
                'fileName' => 'fileName',
                'modificationDate' => new \DateTimeImmutable(
                    '2019-12-27T18:11:19.117Z'
                ),
                'parameters' => ['foo' => 'string'],
                'readDate' => new \DateTimeImmutable('2019-12-27T18:11:19.117Z'),
                'size' => 0,
                'type' => 'type',
            ],
            entity: (object) [],
            fields: [
                'foo' => [
                    [
                        'contentDisposition' => [
                            'creationDate' => new \DateTimeImmutable(
                                '2019-12-27T18:11:19.117Z'
                            ),
                            'fileName' => 'fileName',
                            'modificationDate' => new \DateTimeImmutable(
                                '2019-12-27T18:11:19.117Z'
                            ),
                            'parameters' => ['foo' => 'string'],
                            'readDate' => new \DateTimeImmutable('2019-12-27T18:11:19.117Z'),
                            'size' => 0,
                            'type' => 'type',
                        ],
                        'entity' => (object) [],
                        'formDataContentDisposition' => [
                            'creationDate' => new \DateTimeImmutable(
                                '2019-12-27T18:11:19.117Z'
                            ),
                            'fileName' => 'fileName',
                            'modificationDate' => new \DateTimeImmutable(
                                '2019-12-27T18:11:19.117Z'
                            ),
                            'name' => 'name',
                            'parameters' => ['foo' => 'string'],
                            'readDate' => new \DateTimeImmutable('2019-12-27T18:11:19.117Z'),
                            'size' => 0,
                            'type' => 'type',
                    ],
                        'headers' => ['foo' => ['string']],
                        'mediaType' => [
                            'parameters' => ['foo' => 'string'],
                            'subtype' => 'subtype',
                            'type' => 'type',
                            'wildcardSubtype' => true,
                            'wildcardType' => true,
                    ],
                        'messageBodyWorkers' => (object) [],
                        'name' => 'name',
                        'parameterizedHeaders' => [
                            'foo' => [
                                ['parameters' => ['foo' => 'string'], 'value' => 'value'],
                            ],
                    ],
                        'providers' => (object) [],
                        'simple' => true,
                        'value' => 'value',
                        'parent' => [
                            'bodyParts' => [
                                [
                                    'contentDisposition' => [
                                        'creationDate' => new \DateTimeImmutable(
                                            '2019-12-27T18:11:19.117Z'
                                        ),
                                        'fileName' => 'fileName',
                                        'modificationDate' => new \DateTimeImmutable(
                                            '2019-12-27T18:11:19.117Z'
                                        ),
                                        'parameters' => ['foo' => 'string'],
                                        'readDate' => new \DateTimeImmutable(
                                            '2019-12-27T18:11:19.117Z'
                                        ),
                                        'size' => 0,
                                        'type' => 'type',
                                    ],
                                    'entity' => (object) [],
                                    'headers' => ['foo' => ['string']],
                                    'mediaType' => [
                                        'parameters' => ['foo' => 'string'],
                                        'subtype' => 'subtype',
                                        'type' => 'type',
                                        'wildcardSubtype' => true,
                                        'wildcardType' => true,
                                ],
                                    'messageBodyWorkers' => (object) [],
                                    'parameterizedHeaders' => [
                                        'foo' => [
                                            ['parameters' => ['foo' => 'string'], 'value' => 'value'],
                                        ],
                                ],
                                    'providers' => (object) [],
                                ],
                            ],
                            'contentDisposition' => [
                            'creationDate' => new \DateTimeImmutable(
                                '2019-12-27T18:11:19.117Z'
                            ),
                            'fileName' => 'fileName',
                            'modificationDate' => new \DateTimeImmutable(
                                '2019-12-27T18:11:19.117Z'
                            ),
                            'parameters' => ['foo' => 'string'],
                            'readDate' => new \DateTimeImmutable(
                                '2019-12-27T18:11:19.117Z'
                            ),
                            'size' => 0,
                            'type' => 'type',
                        ],
                            'entity' => (object) [],
                            'headers' => ['foo' => ['string']],
                            'mediaType' => [
                            'parameters' => ['foo' => 'string'],
                            'subtype' => 'subtype',
                            'type' => 'type',
                            'wildcardSubtype' => true,
                            'wildcardType' => true,
                        ],
                            'messageBodyWorkers' => (object) [],
                            'parameterizedHeaders' => [
                            'foo' => [
                                ['parameters' => ['foo' => 'string'], 'value' => 'value'],
                            ],
                        ],
                            'providers' => (object) [],
                    ],
                    ],
                ],
            ],
            headers: ['foo' => ['string']],
            mediaType: [
                'parameters' => ['foo' => 'string'],
                'subtype' => 'subtype',
                'type' => 'type',
                'wildcardSubtype' => true,
                'wildcardType' => true,
            ],
            messageBodyWorkers: (object) [],
            parameterizedHeaders: [
                'foo' => [['parameters' => ['foo' => 'string'], 'value' => 'value']],
            ],
            providers: (object) [],
            parent: [
                'bodyParts' => [
                    [
                        'contentDisposition' => [
                            'creationDate' => new \DateTimeImmutable(
                                '2019-12-27T18:11:19.117Z'
                            ),
                            'fileName' => 'fileName',
                            'modificationDate' => new \DateTimeImmutable(
                                '2019-12-27T18:11:19.117Z'
                            ),
                            'parameters' => ['foo' => 'string'],
                            'readDate' => new \DateTimeImmutable('2019-12-27T18:11:19.117Z'),
                            'size' => 0,
                            'type' => 'type',
                        ],
                        'entity' => (object) [],
                        'headers' => ['foo' => ['string']],
                        'mediaType' => [
                            'parameters' => ['foo' => 'string'],
                            'subtype' => 'subtype',
                            'type' => 'type',
                            'wildcardSubtype' => true,
                            'wildcardType' => true,
                    ],
                        'messageBodyWorkers' => (object) [],
                        'parameterizedHeaders' => [
                            'foo' => [
                                ['parameters' => ['foo' => 'string'], 'value' => 'value'],
                            ],
                    ],
                        'providers' => (object) [],
                    ],
                ],
                'contentDisposition' => [
                'creationDate' => new \DateTimeImmutable('2019-12-27T18:11:19.117Z'),
                'fileName' => 'fileName',
                'modificationDate' => new \DateTimeImmutable(
                    '2019-12-27T18:11:19.117Z'
                ),
                'parameters' => ['foo' => 'string'],
                'readDate' => new \DateTimeImmutable('2019-12-27T18:11:19.117Z'),
                'size' => 0,
                'type' => 'type',
            ],
                'entity' => (object) [],
                'headers' => ['foo' => ['string']],
                'mediaType' => [
                'parameters' => ['foo' => 'string'],
                'subtype' => 'subtype',
                'type' => 'type',
                'wildcardSubtype' => true,
                'wildcardType' => true,
            ],
                'messageBodyWorkers' => (object) [],
                'parameterizedHeaders' => [
                'foo' => [['parameters' => ['foo' => 'string'], 'value' => 'value']],
            ],
                'providers' => (object) [],
            ],
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertIsString($result);
    }

    #[Test]
    public function testUpdate(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->dataStudio->datasource->update(
            0,
            bodyParts: [
                [
                    'contentDisposition' => [
                        'creationDate' => new \DateTimeImmutable(
                            '2019-12-27T18:11:19.117Z'
                        ),
                        'fileName' => 'fileName',
                        'modificationDate' => new \DateTimeImmutable(
                            '2019-12-27T18:11:19.117Z'
                        ),
                        'parameters' => ['foo' => 'string'],
                        'readDate' => new \DateTimeImmutable('2019-12-27T18:11:19.117Z'),
                        'size' => 0,
                        'type' => 'type',
                    ],
                    'entity' => (object) [],
                    'headers' => ['foo' => ['string']],
                    'mediaType' => [
                        'parameters' => ['foo' => 'string'],
                        'subtype' => 'subtype',
                        'type' => 'type',
                        'wildcardSubtype' => true,
                        'wildcardType' => true,
                ],
                    'messageBodyWorkers' => (object) [],
                    'parameterizedHeaders' => [
                        'foo' => [['parameters' => ['foo' => 'string'], 'value' => 'value']],
                ],
                    'providers' => (object) [],
                ],
            ],
            contentDisposition: [
                'creationDate' => new \DateTimeImmutable('2019-12-27T18:11:19.117Z'),
                'fileName' => 'fileName',
                'modificationDate' => new \DateTimeImmutable(
                    '2019-12-27T18:11:19.117Z'
                ),
                'parameters' => ['foo' => 'string'],
                'readDate' => new \DateTimeImmutable('2019-12-27T18:11:19.117Z'),
                'size' => 0,
                'type' => 'type',
            ],
            entity: (object) [],
            fields: [
                'foo' => [
                    [
                        'contentDisposition' => [
                            'creationDate' => new \DateTimeImmutable(
                                '2019-12-27T18:11:19.117Z'
                            ),
                            'fileName' => 'fileName',
                            'modificationDate' => new \DateTimeImmutable(
                                '2019-12-27T18:11:19.117Z'
                            ),
                            'parameters' => ['foo' => 'string'],
                            'readDate' => new \DateTimeImmutable('2019-12-27T18:11:19.117Z'),
                            'size' => 0,
                            'type' => 'type',
                        ],
                        'entity' => (object) [],
                        'formDataContentDisposition' => [
                            'creationDate' => new \DateTimeImmutable(
                                '2019-12-27T18:11:19.117Z'
                            ),
                            'fileName' => 'fileName',
                            'modificationDate' => new \DateTimeImmutable(
                                '2019-12-27T18:11:19.117Z'
                            ),
                            'name' => 'name',
                            'parameters' => ['foo' => 'string'],
                            'readDate' => new \DateTimeImmutable('2019-12-27T18:11:19.117Z'),
                            'size' => 0,
                            'type' => 'type',
                    ],
                        'headers' => ['foo' => ['string']],
                        'mediaType' => [
                            'parameters' => ['foo' => 'string'],
                            'subtype' => 'subtype',
                            'type' => 'type',
                            'wildcardSubtype' => true,
                            'wildcardType' => true,
                    ],
                        'messageBodyWorkers' => (object) [],
                        'name' => 'name',
                        'parameterizedHeaders' => [
                            'foo' => [
                                ['parameters' => ['foo' => 'string'], 'value' => 'value'],
                            ],
                    ],
                        'providers' => (object) [],
                        'simple' => true,
                        'value' => 'value',
                    ],
                ],
            ],
            headers: ['foo' => ['string']],
            mediaType: [
                'parameters' => ['foo' => 'string'],
                'subtype' => 'subtype',
                'type' => 'type',
                'wildcardSubtype' => true,
                'wildcardType' => true,
            ],
            messageBodyWorkers: (object) [],
            parameterizedHeaders: [
                'foo' => [['parameters' => ['foo' => 'string'], 'value' => 'value']],
            ],
            providers: (object) [],
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(DataSourceUpdateResponse::class, $result);
    }

    #[Test]
    public function testUpdateWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->dataStudio->datasource->update(
            0,
            bodyParts: [
                [
                    'contentDisposition' => [
                        'creationDate' => new \DateTimeImmutable(
                            '2019-12-27T18:11:19.117Z'
                        ),
                        'fileName' => 'fileName',
                        'modificationDate' => new \DateTimeImmutable(
                            '2019-12-27T18:11:19.117Z'
                        ),
                        'parameters' => ['foo' => 'string'],
                        'readDate' => new \DateTimeImmutable('2019-12-27T18:11:19.117Z'),
                        'size' => 0,
                        'type' => 'type',
                    ],
                    'entity' => (object) [],
                    'headers' => ['foo' => ['string']],
                    'mediaType' => [
                        'parameters' => ['foo' => 'string'],
                        'subtype' => 'subtype',
                        'type' => 'type',
                        'wildcardSubtype' => true,
                        'wildcardType' => true,
                ],
                    'messageBodyWorkers' => (object) [],
                    'parameterizedHeaders' => [
                        'foo' => [['parameters' => ['foo' => 'string'], 'value' => 'value']],
                ],
                    'providers' => (object) [],
                    'parent' => [
                        'bodyParts' => [],
                        'contentDisposition' => [
                            'creationDate' => new \DateTimeImmutable(
                                '2019-12-27T18:11:19.117Z'
                            ),
                            'fileName' => 'fileName',
                            'modificationDate' => new \DateTimeImmutable(
                                '2019-12-27T18:11:19.117Z'
                            ),
                            'parameters' => ['foo' => 'string'],
                            'readDate' => new \DateTimeImmutable('2019-12-27T18:11:19.117Z'),
                            'size' => 0,
                            'type' => 'type',
                        ],
                        'entity' => (object) [],
                        'headers' => ['foo' => ['string']],
                        'mediaType' => [
                            'parameters' => ['foo' => 'string'],
                            'subtype' => 'subtype',
                            'type' => 'type',
                            'wildcardSubtype' => true,
                            'wildcardType' => true,
                    ],
                        'messageBodyWorkers' => (object) [],
                        'parameterizedHeaders' => [
                            'foo' => [
                                ['parameters' => ['foo' => 'string'], 'value' => 'value'],
                            ],
                    ],
                        'providers' => (object) [],
                ],
                ],
            ],
            contentDisposition: [
                'creationDate' => new \DateTimeImmutable('2019-12-27T18:11:19.117Z'),
                'fileName' => 'fileName',
                'modificationDate' => new \DateTimeImmutable(
                    '2019-12-27T18:11:19.117Z'
                ),
                'parameters' => ['foo' => 'string'],
                'readDate' => new \DateTimeImmutable('2019-12-27T18:11:19.117Z'),
                'size' => 0,
                'type' => 'type',
            ],
            entity: (object) [],
            fields: [
                'foo' => [
                    [
                        'contentDisposition' => [
                            'creationDate' => new \DateTimeImmutable(
                                '2019-12-27T18:11:19.117Z'
                            ),
                            'fileName' => 'fileName',
                            'modificationDate' => new \DateTimeImmutable(
                                '2019-12-27T18:11:19.117Z'
                            ),
                            'parameters' => ['foo' => 'string'],
                            'readDate' => new \DateTimeImmutable('2019-12-27T18:11:19.117Z'),
                            'size' => 0,
                            'type' => 'type',
                        ],
                        'entity' => (object) [],
                        'formDataContentDisposition' => [
                            'creationDate' => new \DateTimeImmutable(
                                '2019-12-27T18:11:19.117Z'
                            ),
                            'fileName' => 'fileName',
                            'modificationDate' => new \DateTimeImmutable(
                                '2019-12-27T18:11:19.117Z'
                            ),
                            'name' => 'name',
                            'parameters' => ['foo' => 'string'],
                            'readDate' => new \DateTimeImmutable('2019-12-27T18:11:19.117Z'),
                            'size' => 0,
                            'type' => 'type',
                    ],
                        'headers' => ['foo' => ['string']],
                        'mediaType' => [
                            'parameters' => ['foo' => 'string'],
                            'subtype' => 'subtype',
                            'type' => 'type',
                            'wildcardSubtype' => true,
                            'wildcardType' => true,
                    ],
                        'messageBodyWorkers' => (object) [],
                        'name' => 'name',
                        'parameterizedHeaders' => [
                            'foo' => [
                                ['parameters' => ['foo' => 'string'], 'value' => 'value'],
                            ],
                    ],
                        'providers' => (object) [],
                        'simple' => true,
                        'value' => 'value',
                        'parent' => [
                            'bodyParts' => [
                                [
                                    'contentDisposition' => [
                                        'creationDate' => new \DateTimeImmutable(
                                            '2019-12-27T18:11:19.117Z'
                                        ),
                                        'fileName' => 'fileName',
                                        'modificationDate' => new \DateTimeImmutable(
                                            '2019-12-27T18:11:19.117Z'
                                        ),
                                        'parameters' => ['foo' => 'string'],
                                        'readDate' => new \DateTimeImmutable(
                                            '2019-12-27T18:11:19.117Z'
                                        ),
                                        'size' => 0,
                                        'type' => 'type',
                                    ],
                                    'entity' => (object) [],
                                    'headers' => ['foo' => ['string']],
                                    'mediaType' => [
                                        'parameters' => ['foo' => 'string'],
                                        'subtype' => 'subtype',
                                        'type' => 'type',
                                        'wildcardSubtype' => true,
                                        'wildcardType' => true,
                                ],
                                    'messageBodyWorkers' => (object) [],
                                    'parameterizedHeaders' => [
                                        'foo' => [
                                            ['parameters' => ['foo' => 'string'], 'value' => 'value'],
                                        ],
                                ],
                                    'providers' => (object) [],
                                ],
                            ],
                            'contentDisposition' => [
                            'creationDate' => new \DateTimeImmutable(
                                '2019-12-27T18:11:19.117Z'
                            ),
                            'fileName' => 'fileName',
                            'modificationDate' => new \DateTimeImmutable(
                                '2019-12-27T18:11:19.117Z'
                            ),
                            'parameters' => ['foo' => 'string'],
                            'readDate' => new \DateTimeImmutable(
                                '2019-12-27T18:11:19.117Z'
                            ),
                            'size' => 0,
                            'type' => 'type',
                        ],
                            'entity' => (object) [],
                            'headers' => ['foo' => ['string']],
                            'mediaType' => [
                            'parameters' => ['foo' => 'string'],
                            'subtype' => 'subtype',
                            'type' => 'type',
                            'wildcardSubtype' => true,
                            'wildcardType' => true,
                        ],
                            'messageBodyWorkers' => (object) [],
                            'parameterizedHeaders' => [
                            'foo' => [
                                ['parameters' => ['foo' => 'string'], 'value' => 'value'],
                            ],
                        ],
                            'providers' => (object) [],
                    ],
                    ],
                ],
            ],
            headers: ['foo' => ['string']],
            mediaType: [
                'parameters' => ['foo' => 'string'],
                'subtype' => 'subtype',
                'type' => 'type',
                'wildcardSubtype' => true,
                'wildcardType' => true,
            ],
            messageBodyWorkers: (object) [],
            parameterizedHeaders: [
                'foo' => [['parameters' => ['foo' => 'string'], 'value' => 'value']],
            ],
            providers: (object) [],
            parent: [
                'bodyParts' => [
                    [
                        'contentDisposition' => [
                            'creationDate' => new \DateTimeImmutable(
                                '2019-12-27T18:11:19.117Z'
                            ),
                            'fileName' => 'fileName',
                            'modificationDate' => new \DateTimeImmutable(
                                '2019-12-27T18:11:19.117Z'
                            ),
                            'parameters' => ['foo' => 'string'],
                            'readDate' => new \DateTimeImmutable('2019-12-27T18:11:19.117Z'),
                            'size' => 0,
                            'type' => 'type',
                        ],
                        'entity' => (object) [],
                        'headers' => ['foo' => ['string']],
                        'mediaType' => [
                            'parameters' => ['foo' => 'string'],
                            'subtype' => 'subtype',
                            'type' => 'type',
                            'wildcardSubtype' => true,
                            'wildcardType' => true,
                    ],
                        'messageBodyWorkers' => (object) [],
                        'parameterizedHeaders' => [
                            'foo' => [
                                ['parameters' => ['foo' => 'string'], 'value' => 'value'],
                            ],
                    ],
                        'providers' => (object) [],
                    ],
                ],
                'contentDisposition' => [
                'creationDate' => new \DateTimeImmutable('2019-12-27T18:11:19.117Z'),
                'fileName' => 'fileName',
                'modificationDate' => new \DateTimeImmutable(
                    '2019-12-27T18:11:19.117Z'
                ),
                'parameters' => ['foo' => 'string'],
                'readDate' => new \DateTimeImmutable('2019-12-27T18:11:19.117Z'),
                'size' => 0,
                'type' => 'type',
            ],
                'entity' => (object) [],
                'headers' => ['foo' => ['string']],
                'mediaType' => [
                'parameters' => ['foo' => 'string'],
                'subtype' => 'subtype',
                'type' => 'type',
                'wildcardSubtype' => true,
                'wildcardType' => true,
            ],
                'messageBodyWorkers' => (object) [],
                'parameterizedHeaders' => [
                'foo' => [['parameters' => ['foo' => 'string'], 'value' => 'value']],
            ],
                'providers' => (object) [],
            ],
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(DataSourceUpdateResponse::class, $result);
    }

    #[Test]
    public function testDelete(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->dataStudio->datasource->delete(0);

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertIsString($result);
    }

    #[Test]
    public function testGet(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->dataStudio->datasource->get(0);

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(DataSourceGetResponse::class, $result);
    }
}
