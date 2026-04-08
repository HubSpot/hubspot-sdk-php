<?php

declare(strict_types=1);

namespace HubspotSDK\Webhooks;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type ActionOverrideRequestShape = array{
 *   associatedObjectTypeIDs?: list<string>|null,
 *   listIDs?: list<int>|null,
 *   objectIDs?: list<int>|null,
 *   properties?: list<string>|null,
 * }
 */
final class ActionOverrideRequest implements BaseModel
{
    /** @use SdkModel<ActionOverrideRequestShape> */
    use SdkModel;

    /** @var list<string>|null $associatedObjectTypeIDs */
    #[Optional('associatedObjectTypeIds', list: 'string')]
    public ?array $associatedObjectTypeIDs;

    /** @var list<int>|null $listIDs */
    #[Optional('listIds', list: 'int')]
    public ?array $listIDs;

    /** @var list<int>|null $objectIDs */
    #[Optional('objectIds', list: 'int')]
    public ?array $objectIDs;

    /** @var list<string>|null $properties */
    #[Optional(list: 'string')]
    public ?array $properties;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param list<string>|null $associatedObjectTypeIDs
     * @param list<int>|null $listIDs
     * @param list<int>|null $objectIDs
     * @param list<string>|null $properties
     */
    public static function with(
        ?array $associatedObjectTypeIDs = null,
        ?array $listIDs = null,
        ?array $objectIDs = null,
        ?array $properties = null,
    ): self {
        $self = new self;

        null !== $associatedObjectTypeIDs && $self['associatedObjectTypeIDs'] = $associatedObjectTypeIDs;
        null !== $listIDs && $self['listIDs'] = $listIDs;
        null !== $objectIDs && $self['objectIDs'] = $objectIDs;
        null !== $properties && $self['properties'] = $properties;

        return $self;
    }

    /**
     * @param list<string> $associatedObjectTypeIDs
     */
    public function withAssociatedObjectTypeIDs(
        array $associatedObjectTypeIDs
    ): self {
        $self = clone $this;
        $self['associatedObjectTypeIDs'] = $associatedObjectTypeIDs;

        return $self;
    }

    /**
     * @param list<int> $listIDs
     */
    public function withListIDs(array $listIDs): self
    {
        $self = clone $this;
        $self['listIDs'] = $listIDs;

        return $self;
    }

    /**
     * @param list<int> $objectIDs
     */
    public function withObjectIDs(array $objectIDs): self
    {
        $self = clone $this;
        $self['objectIDs'] = $objectIDs;

        return $self;
    }

    /**
     * @param list<string> $properties
     */
    public function withProperties(array $properties): self
    {
        $self = clone $this;
        $self['properties'] = $properties;

        return $self;
    }
}
