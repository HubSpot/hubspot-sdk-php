<?php

declare(strict_types=1);

namespace HubspotSDK\Automation\Workflows;

use HubspotSDK\Automation\Workflows\APISingleConnectionAction\Type;
use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type APISingleConnectionActionShape = array{
 *   actionID: string,
 *   actionTypeID: string,
 *   actionTypeVersion: int,
 *   fields: array<string, mixed>,
 *   type: value-of<Type>,
 *   connection?: APIConnection,
 * }
 */
final class APISingleConnectionAction implements BaseModel
{
    /** @use SdkModel<APISingleConnectionActionShape> */
    use SdkModel;

    /**
     * The ID for this action.
     */
    #[Api('actionId')]
    public string $actionID;

    /**
     * The ID of the actionType to use.
     */
    #[Api('actionTypeId')]
    public string $actionTypeID;

    /**
     * The version of this actionType to use.
     */
    #[Api]
    public int $actionTypeVersion;

    /**
     * The fields to pass into this action. Different action types accept different fields.
     *
     * @var array<string, mixed> $fields
     */
    #[Api(map: 'mixed')]
    public array $fields;

    /**
     * The type of action this is, can be: "STATIC_BRANCH", "LIST_BRANCH", "AB_TEST_BRANCH", "CUSTOM_CODE", "WEBHOOK", or "SINGLE_CONNECTION".
     *
     * @var value-of<Type> $type
     */
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
     * @param array<string, mixed> $fields
     * @param Type|value-of<Type> $type
     */
    public static function with(
        string $actionID,
        string $actionTypeID,
        int $actionTypeVersion,
        array $fields,
        Type|string $type = 'SINGLE_CONNECTION',
        ?APIConnection $connection = null,
    ): self {
        $obj = new self;

        $obj->actionID = $actionID;
        $obj->actionTypeID = $actionTypeID;
        $obj->actionTypeVersion = $actionTypeVersion;
        $obj->fields = $fields;
        $obj['type'] = $type;

        null !== $connection && $obj->connection = $connection;

        return $obj;
    }

    /**
     * The ID for this action.
     */
    public function withActionID(string $actionID): self
    {
        $obj = clone $this;
        $obj->actionID = $actionID;

        return $obj;
    }

    /**
     * The ID of the actionType to use.
     */
    public function withActionTypeID(string $actionTypeID): self
    {
        $obj = clone $this;
        $obj->actionTypeID = $actionTypeID;

        return $obj;
    }

    /**
     * The version of this actionType to use.
     */
    public function withActionTypeVersion(int $actionTypeVersion): self
    {
        $obj = clone $this;
        $obj->actionTypeVersion = $actionTypeVersion;

        return $obj;
    }

    /**
     * The fields to pass into this action. Different action types accept different fields.
     *
     * @param array<string, mixed> $fields
     */
    public function withFields(array $fields): self
    {
        $obj = clone $this;
        $obj->fields = $fields;

        return $obj;
    }

    /**
     * The type of action this is, can be: "STATIC_BRANCH", "LIST_BRANCH", "AB_TEST_BRANCH", "CUSTOM_CODE", "WEBHOOK", or "SINGLE_CONNECTION".
     *
     * @param Type|value-of<Type> $type
     */
    public function withType(Type|string $type): self
    {
        $obj = clone $this;
        $obj['type'] = $type;

        return $obj;
    }

    public function withConnection(APIConnection $connection): self
    {
        $obj = clone $this;
        $obj->connection = $connection;

        return $obj;
    }
}
