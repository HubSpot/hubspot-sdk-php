<?php

declare(strict_types=1);

namespace HubspotSDK\Automation\Workflows;

use HubspotSDK\Automation\Workflows\APISingleConnectionAction\Type;
use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type APISingleConnectionActionShape = array{
 *   actionId: string,
 *   actionTypeId: string,
 *   actionTypeVersion: int,
 *   fields: array<string,mixed>,
 *   type: value-of<Type>,
 *   connection?: APIConnection|null,
 * }
 */
final class APISingleConnectionAction implements BaseModel
{
    /** @use SdkModel<APISingleConnectionActionShape> */
    use SdkModel;

    #[Api]
    public string $actionId;

    #[Api]
    public string $actionTypeId;

    #[Api]
    public int $actionTypeVersion;

    /** @var array<string,mixed> $fields */
    #[Api(map: 'mixed')]
    public array $fields;

    /** @var value-of<Type> $type */
    #[Api(enum: Type::class)]
    public string $type;

    #[Api(optional: true)]
    public ?APIConnection $connection;

    /**
     * `new APISingleConnectionAction()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * APISingleConnectionAction::with(
     *   actionId: ...,
     *   actionTypeId: ...,
     *   actionTypeVersion: ...,
     *   fields: ...,
     *   type: ...,
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new APISingleConnectionAction)
     *   ->withActionID(...)
     *   ->withActionTypeID(...)
     *   ->withActionTypeVersion(...)
     *   ->withFields(...)
     *   ->withType(...)
     * ```
     */
    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param array<string,mixed> $fields
     * @param Type|value-of<Type> $type
     * @param APIConnection|array{edgeType: string, nextActionId: string} $connection
     */
    public static function with(
        string $actionId,
        string $actionTypeId,
        int $actionTypeVersion,
        array $fields,
        Type|string $type = 'SINGLE_CONNECTION',
        APIConnection|array|null $connection = null,
    ): self {
        $obj = new self;

        $obj['actionId'] = $actionId;
        $obj['actionTypeId'] = $actionTypeId;
        $obj['actionTypeVersion'] = $actionTypeVersion;
        $obj['fields'] = $fields;
        $obj['type'] = $type;

        null !== $connection && $obj['connection'] = $connection;

        return $obj;
    }

    public function withActionID(string $actionID): self
    {
        $obj = clone $this;
        $obj['actionId'] = $actionID;

        return $obj;
    }

    public function withActionTypeID(string $actionTypeID): self
    {
        $obj = clone $this;
        $obj['actionTypeId'] = $actionTypeID;

        return $obj;
    }

    public function withActionTypeVersion(int $actionTypeVersion): self
    {
        $obj = clone $this;
        $obj['actionTypeVersion'] = $actionTypeVersion;

        return $obj;
    }

    /**
     * @param array<string,mixed> $fields
     */
    public function withFields(array $fields): self
    {
        $obj = clone $this;
        $obj['fields'] = $fields;

        return $obj;
    }

    /**
     * @param Type|value-of<Type> $type
     */
    public function withType(Type|string $type): self
    {
        $obj = clone $this;
        $obj['type'] = $type;

        return $obj;
    }

    /**
     * @param APIConnection|array{edgeType: string, nextActionId: string} $connection
     */
    public function withConnection(APIConnection|array $connection): self
    {
        $obj = clone $this;
        $obj['connection'] = $connection;

        return $obj;
    }
}
