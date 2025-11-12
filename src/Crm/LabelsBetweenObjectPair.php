<?php

declare(strict_types=1);

namespace HubspotSDK\Crm;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type LabelsBetweenObjectPairShape = array{
 *   fromObjectId: string,
 *   fromObjectTypeId: string,
 *   labels: list<string>,
 *   toObjectId: string,
 *   toObjectTypeId: string,
 * }
 */
final class LabelsBetweenObjectPair implements BaseModel
{
    /** @use SdkModel<LabelsBetweenObjectPairShape> */
    use SdkModel;

    /**
     * The ID of the source object in the association.
     */
    #[Api]
    public string $fromObjectId;

    /**
     * The type ID of the source object in the association.
     */
    #[Api]
    public string $fromObjectTypeId;

    /**
     * An array of labels associated with the relationship between the objects.
     *
     * @var list<string> $labels
     */
    #[Api(list: 'string')]
    public array $labels;

    /**
     * The ID of the target object in the association.
     */
    #[Api]
    public string $toObjectId;

    /**
     * The type ID of the target object in the association.
     */
    #[Api]
    public string $toObjectTypeId;

    /**
     * `new LabelsBetweenObjectPair()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * LabelsBetweenObjectPair::with(
     *   fromObjectId: ...,
     *   fromObjectTypeId: ...,
     *   labels: ...,
     *   toObjectId: ...,
     *   toObjectTypeId: ...,
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new LabelsBetweenObjectPair)
     *   ->withFromObjectID(...)
     *   ->withFromObjectTypeID(...)
     *   ->withLabels(...)
     *   ->withToObjectID(...)
     *   ->withToObjectTypeID(...)
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
     * @param list<string> $labels
     */
    public static function with(
        string $fromObjectId,
        string $fromObjectTypeId,
        array $labels,
        string $toObjectId,
        string $toObjectTypeId,
    ): self {
        $obj = new self;

        $obj->fromObjectId = $fromObjectId;
        $obj->fromObjectTypeId = $fromObjectTypeId;
        $obj->labels = $labels;
        $obj->toObjectId = $toObjectId;
        $obj->toObjectTypeId = $toObjectTypeId;

        return $obj;
    }

    /**
     * The ID of the source object in the association.
     */
    public function withFromObjectID(string $fromObjectID): self
    {
        $obj = clone $this;
        $obj->fromObjectId = $fromObjectID;

        return $obj;
    }

    /**
     * The type ID of the source object in the association.
     */
    public function withFromObjectTypeID(string $fromObjectTypeID): self
    {
        $obj = clone $this;
        $obj->fromObjectTypeId = $fromObjectTypeID;

        return $obj;
    }

    /**
     * An array of labels associated with the relationship between the objects.
     *
     * @param list<string> $labels
     */
    public function withLabels(array $labels): self
    {
        $obj = clone $this;
        $obj->labels = $labels;

        return $obj;
    }

    /**
     * The ID of the target object in the association.
     */
    public function withToObjectID(string $toObjectID): self
    {
        $obj = clone $this;
        $obj->toObjectId = $toObjectID;

        return $obj;
    }

    /**
     * The type ID of the target object in the association.
     */
    public function withToObjectTypeID(string $toObjectTypeID): self
    {
        $obj = clone $this;
        $obj->toObjectTypeId = $toObjectTypeID;

        return $obj;
    }
}
