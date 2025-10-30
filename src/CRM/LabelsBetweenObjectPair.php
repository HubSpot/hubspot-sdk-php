<?php

declare(strict_types=1);

namespace HubspotSDK\CRM;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
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

    #[Api('fromObjectId')]
    public string $fromObjectID;

    #[Api('fromObjectTypeId')]
    public string $fromObjectTypeID;

    /** @var list<string> $labels */
    #[Api(list: 'string')]
    public array $labels;

    #[Api('toObjectId')]
    public string $toObjectID;

    #[Api('toObjectTypeId')]
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
        $obj = new self;

        $obj->fromObjectID = $fromObjectID;
        $obj->fromObjectTypeID = $fromObjectTypeID;
        $obj->labels = $labels;
        $obj->toObjectID = $toObjectID;
        $obj->toObjectTypeID = $toObjectTypeID;

        return $obj;
    }

    public function withFromObjectID(string $fromObjectID): self
    {
        $obj = clone $this;
        $obj->fromObjectID = $fromObjectID;

        return $obj;
    }

    public function withFromObjectTypeID(string $fromObjectTypeID): self
    {
        $obj = clone $this;
        $obj->fromObjectTypeID = $fromObjectTypeID;

        return $obj;
    }

    /**
     * @param list<string> $labels
     */
    public function withLabels(array $labels): self
    {
        $obj = clone $this;
        $obj->labels = $labels;

        return $obj;
    }

    public function withToObjectID(string $toObjectID): self
    {
        $obj = clone $this;
        $obj->toObjectID = $toObjectID;

        return $obj;
    }

    public function withToObjectTypeID(string $toObjectTypeID): self
    {
        $obj = clone $this;
        $obj->toObjectTypeID = $toObjectTypeID;

        return $obj;
    }
}
