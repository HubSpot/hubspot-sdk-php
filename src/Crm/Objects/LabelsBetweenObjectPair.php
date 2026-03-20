<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\Objects;

use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

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
     * Source unique ID of the object.
     */
    #[Required('fromObjectId')]
    public string $fromObjectID;

    /**
     * Source object type.
     */
    #[Required('fromObjectTypeId')]
    public string $fromObjectTypeID;

    /** @var list<string> $labels */
    #[Required(list: 'string')]
    public array $labels;

    /**
     * Target unique ID of the object.
     */
    #[Required('toObjectId')]
    public string $toObjectID;

    /**
     * Target object type.
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
     * Source unique ID of the object.
     */
    public function withFromObjectID(string $fromObjectID): self
    {
        $self = clone $this;
        $self['fromObjectID'] = $fromObjectID;

        return $self;
    }

    /**
     * Source object type.
     */
    public function withFromObjectTypeID(string $fromObjectTypeID): self
    {
        $self = clone $this;
        $self['fromObjectTypeID'] = $fromObjectTypeID;

        return $self;
    }

    /**
     * @param list<string> $labels
     */
    public function withLabels(array $labels): self
    {
        $self = clone $this;
        $self['labels'] = $labels;

        return $self;
    }

    /**
     * Target unique ID of the object.
     */
    public function withToObjectID(string $toObjectID): self
    {
        $self = clone $this;
        $self['toObjectID'] = $toObjectID;

        return $self;
    }

    /**
     * Target object type.
     */
    public function withToObjectTypeID(string $toObjectTypeID): self
    {
        $self = clone $this;
        $self['toObjectTypeID'] = $toObjectTypeID;

        return $self;
    }
}
