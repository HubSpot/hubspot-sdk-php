<?php

declare(strict_types=1);

namespace HubspotSDK\Crm;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type CreatedResponseLabelsBetweenObjectPairShape = array{
 *   createdResourceID: string,
 *   entity: LabelsBetweenObjectPair,
 *   location?: string|null,
 * }
 */
final class CreatedResponseLabelsBetweenObjectPair implements BaseModel
{
    /** @use SdkModel<CreatedResponseLabelsBetweenObjectPairShape> */
    use SdkModel;

    /**
     * The unique identifier of the newly created resource.
     */
    #[Required('createdResourceId')]
    public string $createdResourceID;

    #[Required]
    public LabelsBetweenObjectPair $entity;

    /**
     * The URL location of the newly created resource.
     */
    #[Optional]
    public ?string $location;

    /**
     * `new CreatedResponseLabelsBetweenObjectPair()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * CreatedResponseLabelsBetweenObjectPair::with(
     *   createdResourceID: ..., entity: ...
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new CreatedResponseLabelsBetweenObjectPair)
     *   ->withCreatedResourceID(...)
     *   ->withEntity(...)
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
     * @param LabelsBetweenObjectPair|array{
     *   fromObjectID: string,
     *   fromObjectTypeID: string,
     *   labels: list<string>,
     *   toObjectID: string,
     *   toObjectTypeID: string,
     * } $entity
     */
    public static function with(
        string $createdResourceID,
        LabelsBetweenObjectPair|array $entity,
        ?string $location = null,
    ): self {
        $obj = new self;

        $obj['createdResourceID'] = $createdResourceID;
        $obj['entity'] = $entity;

        null !== $location && $obj['location'] = $location;

        return $obj;
    }

    /**
     * The unique identifier of the newly created resource.
     */
    public function withCreatedResourceID(string $createdResourceID): self
    {
        $obj = clone $this;
        $obj['createdResourceID'] = $createdResourceID;

        return $obj;
    }

    /**
     * @param LabelsBetweenObjectPair|array{
     *   fromObjectID: string,
     *   fromObjectTypeID: string,
     *   labels: list<string>,
     *   toObjectID: string,
     *   toObjectTypeID: string,
     * } $entity
     */
    public function withEntity(LabelsBetweenObjectPair|array $entity): self
    {
        $obj = clone $this;
        $obj['entity'] = $entity;

        return $obj;
    }

    /**
     * The URL location of the newly created resource.
     */
    public function withLocation(string $location): self
    {
        $obj = clone $this;
        $obj['location'] = $location;

        return $obj;
    }
}
