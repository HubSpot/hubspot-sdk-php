<?php

declare(strict_types=1);

namespace HubspotSDK\Automation\Workflows;

use HubspotSDK\Automation\Workflows\APISingleConnectionAction\Type;
use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type APIConnectionShape from \HubspotSDK\Automation\Workflows\APIConnection
 *
 * @phpstan-type APISingleConnectionActionShape = array{
 *   actionID: string,
 *   actionTypeID: string,
 *   actionTypeVersion: int,
 *   fields: array<string,mixed>,
 *   type: Type|value-of<Type>,
 *   connection?: null|APIConnection|APIConnectionShape,
 * }
 */
final class APISingleConnectionAction implements BaseModel
{
    /** @use SdkModel<APISingleConnectionActionShape> */
    use SdkModel;

    #[Required('actionId')]
    public string $actionID;

    #[Required('actionTypeId')]
    public string $actionTypeID;

    #[Required]
    public int $actionTypeVersion;

    /** @var array<string,mixed> $fields */
    #[Required(map: 'mixed')]
    public array $fields;

    /** @var value-of<Type> $type */
    #[Required(enum: Type::class)]
    public string $type;

    #[Optional]
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
     * @param array<string,mixed> $fields
     * @param Type|value-of<Type> $type
     * @param APIConnectionShape $connection
     */
    public static function with(
        string $actionID,
        string $actionTypeID,
        int $actionTypeVersion,
        array $fields,
        Type|string $type = 'SINGLE_CONNECTION',
        APIConnection|array|null $connection = null,
    ): self {
        $self = new self;

        $self['actionID'] = $actionID;
        $self['actionTypeID'] = $actionTypeID;
        $self['actionTypeVersion'] = $actionTypeVersion;
        $self['fields'] = $fields;
        $self['type'] = $type;

        null !== $connection && $self['connection'] = $connection;

        return $self;
    }

    public function withActionID(string $actionID): self
    {
        $self = clone $this;
        $self['actionID'] = $actionID;

        return $self;
    }

    public function withActionTypeID(string $actionTypeID): self
    {
        $self = clone $this;
        $self['actionTypeID'] = $actionTypeID;

        return $self;
    }

    public function withActionTypeVersion(int $actionTypeVersion): self
    {
        $self = clone $this;
        $self['actionTypeVersion'] = $actionTypeVersion;

        return $self;
    }

    /**
     * @param array<string,mixed> $fields
     */
    public function withFields(array $fields): self
    {
        $self = clone $this;
        $self['fields'] = $fields;

        return $self;
    }

    /**
     * @param Type|value-of<Type> $type
     */
    public function withType(Type|string $type): self
    {
        $self = clone $this;
        $self['type'] = $type;

        return $self;
    }

    /**
     * @param APIConnectionShape $connection
     */
    public function withConnection(APIConnection|array $connection): self
    {
        $self = clone $this;
        $self['connection'] = $connection;

        return $self;
    }
}
