<?php

namespace Tests\Services\Crm\Associations\Schema\V4;

use HubspotSDK\Client;
use HubspotSDK\Crm\Associations\Schema\V4\CollectionResponseAssociationSpecWithLabel;
use PHPUnit\Framework\Attributes\CoversNothing;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Tests\UnsupportedMockTests;

/**
 * @internal
 */
#[CoversNothing]
final class DefinitionsTest extends TestCase
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
    public function testCreateLabel(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this
            ->client
            ->crm
            ->associations
            ->schema
            ->v4
            ->definitions
            ->createLabel(
                'toObjectType',
                [
                    'fromObjectType' => 'fromObjectType',
                    'label' => 'label',
                    'name' => 'name',
                ],
            )
        ;

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(
            CollectionResponseAssociationSpecWithLabel::class,
            $result
        );
    }

    #[Test]
    public function testCreateLabelWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this
            ->client
            ->crm
            ->associations
            ->schema
            ->v4
            ->definitions
            ->createLabel(
                'toObjectType',
                [
                    'fromObjectType' => 'fromObjectType',
                    'label' => 'label',
                    'name' => 'name',
                    'inverseLabel' => 'inverseLabel',
                ],
            )
        ;

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(
            CollectionResponseAssociationSpecWithLabel::class,
            $result
        );
    }

    #[Test]
    public function testDeleteLabel(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this
            ->client
            ->crm
            ->associations
            ->schema
            ->v4
            ->definitions
            ->deleteLabel(
                0,
                ['fromObjectType' => 'fromObjectType', 'toObjectType' => 'toObjectType'],
            )
        ;

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertNull($result);
    }

    #[Test]
    public function testDeleteLabelWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this
            ->client
            ->crm
            ->associations
            ->schema
            ->v4
            ->definitions
            ->deleteLabel(
                0,
                ['fromObjectType' => 'fromObjectType', 'toObjectType' => 'toObjectType'],
            )
        ;

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertNull($result);
    }

    #[Test]
    public function testListLabels(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this
            ->client
            ->crm
            ->associations
            ->schema
            ->v4
            ->definitions
            ->listLabels('toObjectType', ['fromObjectType' => 'fromObjectType'])
        ;

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(
            CollectionResponseAssociationSpecWithLabel::class,
            $result
        );
    }

    #[Test]
    public function testListLabelsWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this
            ->client
            ->crm
            ->associations
            ->schema
            ->v4
            ->definitions
            ->listLabels('toObjectType', ['fromObjectType' => 'fromObjectType'])
        ;

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(
            CollectionResponseAssociationSpecWithLabel::class,
            $result
        );
    }

    #[Test]
    public function testUpdateLabel(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this
            ->client
            ->crm
            ->associations
            ->schema
            ->v4
            ->definitions
            ->updateLabel(
                'toObjectType',
                [
                    'fromObjectType' => 'fromObjectType',
                    'associationTypeId' => 0,
                    'label' => 'label',
                ],
            )
        ;

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertNull($result);
    }

    #[Test]
    public function testUpdateLabelWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this
            ->client
            ->crm
            ->associations
            ->schema
            ->v4
            ->definitions
            ->updateLabel(
                'toObjectType',
                [
                    'fromObjectType' => 'fromObjectType',
                    'associationTypeId' => 0,
                    'label' => 'label',
                    'inverseLabel' => 'inverseLabel',
                ],
            )
        ;

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertNull($result);
    }
}
