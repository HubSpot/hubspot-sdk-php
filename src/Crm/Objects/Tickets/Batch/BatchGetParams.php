<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\Objects\Tickets\Batch;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\Crm\SimplePublicObjectID;

/**
 * Retrieve a batch of tickets by ID (`ticketId`) or unique property value (`idProperty`).
 *
 * @see HubspotSDK\Crm\Objects\Tickets\Batch->get
 *
 * @phpstan-type BatchGetParamsShape = array{
 *   inputs: list<SimplePublicObjectID>,
 *   properties: list<string>,
 *   propertiesWithHistory: list<string>,
 *   archived?: bool,
 *   idProperty?: string,
 * }
 */
final class BatchGetParams implements BaseModel
{
    /** @use SdkModel<BatchGetParamsShape> */
    use SdkModel;
    use SdkParams;

    /** @var list<SimplePublicObjectID> $inputs */
    #[Api(list: SimplePublicObjectID::class)]
    public array $inputs;

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

    /**
     * Whether to return only results that have been archived.
     */
    #[Api(optional: true)]
    public ?bool $archived;

    #[Api(optional: true)]
    public ?string $idProperty;

    /**
     * `new BatchGetParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * BatchGetParams::with(inputs: ..., properties: ..., propertiesWithHistory: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new BatchGetParams)
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
     * @param list<SimplePublicObjectID> $inputs
     * @param list<string> $properties
     * @param list<string> $propertiesWithHistory
     */
    public static function with(
        array $inputs,
        array $properties,
        array $propertiesWithHistory,
        ?bool $archived = null,
        ?string $idProperty = null,
    ): self {
        $obj = new self;

        $obj->inputs = $inputs;
        $obj->properties = $properties;
        $obj->propertiesWithHistory = $propertiesWithHistory;

        null !== $archived && $obj->archived = $archived;
        null !== $idProperty && $obj->idProperty = $idProperty;

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

    /**
     * Whether to return only results that have been archived.
     */
    public function withArchived(bool $archived): self
    {
        $obj = clone $this;
        $obj->archived = $archived;

        return $obj;
    }

    public function withIDProperty(string $idProperty): self
    {
        $obj = clone $this;
        $obj->idProperty = $idProperty;

        return $obj;
    }
}
