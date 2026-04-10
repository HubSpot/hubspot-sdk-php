<?php

declare(strict_types=1);

namespace HubSpotSDK\Crm;

use HubSpotSDK\Core\Attributes\Required;
use HubSpotSDK\Core\Concerns\SdkModel;
use HubSpotSDK\Core\Contracts\BaseModel;

/**
 * The relationship descriptors applicable between two object types.
 *
 * @phpstan-type LabelsBetweenObjectPairShape = array{
 *   fromObjectID: string,
 *   fromObjectTypeID: string,
 *   labels: list<string>,
 *   toObjectID: string,
 *   toObjectTypeID: string,
 * }
 */
final class LabelsBetweenObjectPair implements BaseModel
{
    /** @use SdkModel<LabelsBetweenObjectPairShape> */
    use SdkModel;

    /**
     * The ID of the source object in the association.
     */
    #[Required('fromObjectId')]
    public string $fromObjectID;

    /**
     * The type ID of the source object in the association.
     */
    #[Required('fromObjectTypeId')]
    public string $fromObjectTypeID;

    /**
     * An array of labels associated with the relationship between the objects.
     *
     * @var list<string> $labels
     */
    #[Required(list: 'string')]
    public array $labels;

    /**
     * The ID of the target object in the association.
     */
    #[Required('toObjectId')]
    public string $toObjectID;

    /**
     * The type ID of the target object in the association.
     */
    #[Required('toObjectTypeId')]
    public string $toObjectTypeID;

    /**
     * `new LabelsBetweenObjectPair()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * LabelsBetweenObjectPair::with(
     *   fromObjectID: ...,
     *   fromObjectTypeID: ...,
     *   labels: ...,
     *   toObjectID: ...,
     *   toObjectTypeID: ...,
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
        string $fromObjectID,
        string $fromObjectTypeID,
        array $labels,
        string $toObjectID,
        string $toObjectTypeID,
    ): self {
        $self = new self;

        $self['fromObjectID'] = $fromObjectID;
        $self['fromObjectTypeID'] = $fromObjectTypeID;
        $self['labels'] = $labels;
        $self['toObjectID'] = $toObjectID;
        $self['toObjectTypeID'] = $toObjectTypeID;

        return $self;
    }

    /**
     * The ID of the source object in the association.
     */
    public function withFromObjectID(string $fromObjectID): self
    {
        $self = clone $this;
        $self['fromObjectID'] = $fromObjectID;

        return $self;
    }

    /**
     * The type ID of the source object in the association.
     */
    public function withFromObjectTypeID(string $fromObjectTypeID): self
    {
        $self = clone $this;
        $self['fromObjectTypeID'] = $fromObjectTypeID;

        return $self;
    }

    /**
     * An array of labels associated with the relationship between the objects.
     *
     * @param list<string> $labels
     */
    public function withLabels(array $labels): self
    {
        $self = clone $this;
        $self['labels'] = $labels;

        return $self;
    }

    /**
     * The ID of the target object in the association.
     */
    public function withToObjectID(string $toObjectID): self
    {
        $self = clone $this;
        $self['toObjectID'] = $toObjectID;

        return $self;
    }

    /**
     * The type ID of the target object in the association.
     */
    public function withToObjectTypeID(string $toObjectTypeID): self
    {
        $self = clone $this;
        $self['toObjectTypeID'] = $toObjectTypeID;

        return $self;
    }
}
