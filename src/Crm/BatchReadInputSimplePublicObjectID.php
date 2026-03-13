<?php

declare(strict_types=1);

namespace HubspotSDK\Crm;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * Specifies the input for reading a batch of CRM objects, including arrays of object IDs, requested property names (with optional history), and an optional unique identifying property.
 *
 * @phpstan-import-type SimplePublicObjectIDShape from \HubspotSDK\Crm\SimplePublicObjectID
 *
 * @phpstan-type BatchReadInputSimplePublicObjectIDShape = array{
 *   inputs: list<SimplePublicObjectID|SimplePublicObjectIDShape>,
 *   properties: list<string>,
 *   propertiesWithHistory: list<string>,
 *   idProperty?: string|null,
 * }
 */
final class BatchReadInputSimplePublicObjectID implements BaseModel
{
    /** @use SdkModel<BatchReadInputSimplePublicObjectIDShape> */
    use SdkModel;

    /** @var list<SimplePublicObjectID> $inputs */
    #[Required(list: SimplePublicObjectID::class)]
    public array $inputs;

    /**
     * Key-value pairs for setting properties for the new object.
     *
     * @var list<string> $properties
     */
    #[Required(list: 'string')]
    public array $properties;

    /**
     * Key-value pairs for setting properties for the new object and their histories.
     *
     * @var list<string> $propertiesWithHistory
     */
    #[Required(list: 'string')]
    public array $propertiesWithHistory;

    /**
     * A unique property used to identify objects instead of the default ID.
     */
    #[Optional]
    public ?string $idProperty;

    /**
     * `new BatchReadInputSimplePublicObjectID()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * BatchReadInputSimplePublicObjectID::with(
     *   inputs: ..., properties: ..., propertiesWithHistory: ...
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new BatchReadInputSimplePublicObjectID)
     *   ->withInputs(...)
     *   ->withProperties(...)
     *   ->withPropertiesWithHistory(...)
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
     * @param list<SimplePublicObjectID|SimplePublicObjectIDShape> $inputs
     * @param list<string> $properties
     * @param list<string> $propertiesWithHistory
     */
    public static function with(
        array $inputs,
        array $properties,
        array $propertiesWithHistory,
        ?string $idProperty = null,
    ): self {
        $self = new self;

        $self['inputs'] = $inputs;
        $self['properties'] = $properties;
        $self['propertiesWithHistory'] = $propertiesWithHistory;

        null !== $idProperty && $self['idProperty'] = $idProperty;

        return $self;
    }

    /**
     * @param list<SimplePublicObjectID|SimplePublicObjectIDShape> $inputs
     */
    public function withInputs(array $inputs): self
    {
        $self = clone $this;
        $self['inputs'] = $inputs;

        return $self;
    }

    /**
     * Key-value pairs for setting properties for the new object.
     *
     * @param list<string> $properties
     */
    public function withProperties(array $properties): self
    {
        $self = clone $this;
        $self['properties'] = $properties;

        return $self;
    }

    /**
     * Key-value pairs for setting properties for the new object and their histories.
     *
     * @param list<string> $propertiesWithHistory
     */
    public function withPropertiesWithHistory(
        array $propertiesWithHistory
    ): self {
        $self = clone $this;
        $self['propertiesWithHistory'] = $propertiesWithHistory;

        return $self;
    }

    /**
     * A unique property used to identify objects instead of the default ID.
     */
    public function withIDProperty(string $idProperty): self
    {
        $self = clone $this;
        $self['idProperty'] = $idProperty;

        return $self;
    }
}
