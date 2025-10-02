<?php

declare(strict_types=1);

namespace HubspotSDK\Automation;

use HubspotSDK\Automation\AutomationAPISingleConnectionAction\Type;
use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type automation_api_single_connection_action = array{
 *   actionID: string,
 *   actionTypeID: string,
 *   actionTypeVersion: int,
 *   fields: array<string, mixed>,
 *   type: value-of<Type>,
 *   connection?: AutomationAPIConnection,
 * }
 */
final class AutomationAPISingleConnectionAction implements BaseModel
{
    /** @use SdkModel<automation_api_single_connection_action> */
    use SdkModel;

    #[Api('actionId')]
    public string $actionID;

    #[Api('actionTypeId')]
    public string $actionTypeID;

    #[Api]
    public int $actionTypeVersion;

    /** @var array<string, mixed> $fields */
    #[Api(map: 'mixed')]
    public array $fields;

    /** @var value-of<Type> $type */
    #[Api(enum: Type::class)]
    public string $type;

    #[Api(optional: true)]
    public ?AutomationAPIConnection $connection;

    /**
     * `new AutomationAPISingleConnectionAction()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * AutomationAPISingleConnectionAction::with(
     *   actionID: ...,
     *   actionTypeID: ...,
     *   actionTypeVersion: ...,
     *   fields: ...,
     *   type: ...,
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new AutomationAPISingleConnectionAction)
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
     * @param array<string, mixed> $fields
     * @param Type|value-of<Type> $type
     */
    public static function with(
        string $actionID,
        string $actionTypeID,
        int $actionTypeVersion,
        array $fields,
        Type|string $type = 'SINGLE_CONNECTION',
        ?AutomationAPIConnection $connection = null,
    ): self {
        $obj = new self;

        $obj->actionID = $actionID;
        $obj->actionTypeID = $actionTypeID;
        $obj->actionTypeVersion = $actionTypeVersion;
        $obj->fields = $fields;
        $obj->type = $type instanceof Type ? $type->value : $type;

        null !== $connection && $obj->connection = $connection;

        return $obj;
    }

    public function withActionID(string $actionID): self
    {
        $obj = clone $this;
        $obj->actionID = $actionID;

        return $obj;
    }

    public function withActionTypeID(string $actionTypeID): self
    {
        $obj = clone $this;
        $obj->actionTypeID = $actionTypeID;

        return $obj;
    }

    public function withActionTypeVersion(int $actionTypeVersion): self
    {
        $obj = clone $this;
        $obj->actionTypeVersion = $actionTypeVersion;

        return $obj;
    }

    /**
     * @param array<string, mixed> $fields
     */
    public function withFields(array $fields): self
    {
        $obj = clone $this;
        $obj->fields = $fields;

        return $obj;
    }

    /**
     * @param Type|value-of<Type> $type
     */
    public function withType(Type|string $type): self
    {
        $obj = clone $this;
        $obj->type = $type instanceof Type ? $type->value : $type;

        return $obj;
    }

    public function withConnection(AutomationAPIConnection $connection): self
    {
        $obj = clone $this;
        $obj->connection = $connection;

        return $obj;
    }
}
