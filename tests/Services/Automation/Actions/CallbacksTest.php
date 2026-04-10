<?php

namespace Tests\Services\Automation\Actions;

use HubSpotSDK\Client;
use HubSpotSDK\Core\Util;
use PHPUnit\Framework\Attributes\CoversNothing;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Tests\UnsupportedMockTests;

/**
 * @internal
 */
#[CoversNothing]
final class CallbacksTest extends TestCase
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
    public function testComplete(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->automation->actions->callbacks->complete(
            'callbackId',
            outputFields: ['foo' => 'string'],
            typedOutputs: (object) []
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertNull($result);
    }

    #[Test]
    public function testCompleteWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->automation->actions->callbacks->complete(
            'callbackId',
            outputFields: ['foo' => 'string'],
            typedOutputs: (object) [],
            failureReasonType: 'failureReasonType',
            requestContext: [
                'source' => 'WORKFLOWS',
                'workflowID' => 0,
                'actionExecutionIndexIdentifier' => [
                    'actionExecutionIndex' => 0, 'enrollmentID' => 0,
                ],
                'actionID' => 0,
            ],
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertNull($result);
    }

    #[Test]
    public function testCompleteBatch(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->automation->actions->callbacks->completeBatch(
            inputs: [
                [
                    'callbackID' => 'callbackId',
                    'outputFields' => ['foo' => 'string'],
                    'typedOutputs' => (object) [],
                ],
            ],
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertNull($result);
    }

    #[Test]
    public function testCompleteBatchWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->automation->actions->callbacks->completeBatch(
            inputs: [
                [
                    'callbackID' => 'callbackId',
                    'outputFields' => ['foo' => 'string'],
                    'typedOutputs' => (object) [],
                    'failureReasonType' => 'failureReasonType',
                    'requestContext' => [
                        'source' => 'WORKFLOWS',
                        'workflowID' => 0,
                        'actionExecutionIndexIdentifier' => [
                            'actionExecutionIndex' => 0, 'enrollmentID' => 0,
                        ],
                        'actionID' => 0,
                    ],
                ],
            ],
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertNull($result);
    }
}
