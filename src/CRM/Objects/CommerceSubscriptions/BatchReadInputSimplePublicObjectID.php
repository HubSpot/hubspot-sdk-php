<?php

declare(strict_types=1);

namespace HubspotSDK\CRM\Objects\CommerceSubscriptions;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\CRM\SimplePublicObjectID;

/**
 * Specifies the input for reading a batch of CRM objects, including arrays of object IDs, requested property names (with optional history), and an optional unique identifying property.
 *
 * @phpstan-type batch_read_input_simple_public_object_id = array{
 *   properties: list<string>,
 *   propertiesWithHistory: list<string>,
 *   idProperty?: string,
 *   inputs?: list<SimplePublicObjectID>,
 * }
 */
final class BatchReadInputSimplePublicObjectID implements BaseModel
{
    /** @use SdkModel<batch_read_input_simple_public_object_id> */
    use SdkModel;

    /**
     * Key-value pairs for setting properties for the new object.
     *
     * @var list<string> $properties
     */
    #[Api(list: 'string')]
    public array $properties;

    /**
     * Key-value pairs for setting properties for the new object and their histories.
     *
     * @var list<string> $propertiesWithHistory
     */
    #[Api(list: 'string')]
    public array $propertiesWithHistory;

    #[Api(optional: true)]
    public ?string $idProperty;

    /** @var list<SimplePublicObjectID>|null $inputs */
    #[Api(list: SimplePublicObjectID::class, optional: true)]
    public ?array $inputs;

    /**
     * `new BatchReadInputSimplePublicObjectID()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * BatchReadInputSimplePublicObjectID::with(
     *   properties: ..., propertiesWithHistory: ...
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new BatchReadInputSimplePublicObjectID)
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
     * @param list<string> $properties
     * @param list<string> $propertiesWithHistory
     * @param list<SimplePublicObjectID> $inputs
     */
    public static function with(
        array $properties,
        array $propertiesWithHistory,
        ?string $idProperty = null,
        ?array $inputs = null,
    ): self {
        $obj = new self;

        $obj->properties = $properties;
        $obj->propertiesWithHistory = $propertiesWithHistory;

        null !== $idProperty && $obj->idProperty = $idProperty;
        null !== $inputs && $obj->inputs = $inputs;

        return $obj;
    }

    /**
     * Key-value pairs for setting properties for the new object.
     *
     * @param list<string> $properties
     */
    public function withProperties(array $properties): self
    {
        $obj = clone $this;
        $obj->properties = $properties;

        return $obj;
    }

    /**
     * Key-value pairs for setting properties for the new object and their histories.
     *
     * @param list<string> $propertiesWithHistory
     */
    public function withPropertiesWithHistory(
        array $propertiesWithHistory
    ): self {
        $obj = clone $this;
        $obj->propertiesWithHistory = $propertiesWithHistory;

        return $obj;
    }

    public function withIDProperty(string $idProperty): self
    {
        $obj = clone $this;
        $obj->idProperty = $idProperty;

        return $obj;
    }

    /**
     * @param list<SimplePublicObjectID> $inputs
     */
    public function withInputs(array $inputs): self
    {
        $obj = clone $this;
        $obj->inputs = $inputs;

        return $obj;
    }
}
