<?php

declare(strict_types=1);

namespace HubspotSDK\Crm;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type CreatedResponseLabelsBetweenObjectPairShape = array{
 *   createdResourceId: string,
 *   entity: LabelsBetweenObjectPair,
 *   location?: string|null,
 * }
 */
final class CreatedResponseLabelsBetweenObjectPair implements BaseModel
{
    /** @use SdkModel<CreatedResponseLabelsBetweenObjectPairShape> */
    use SdkModel;

    #[Api]
    public string $createdResourceId;

    #[Api]
    public LabelsBetweenObjectPair $entity;

    #[Api(optional: true)]
    public ?string $location;

    /**
     * `new CreatedResponseLabelsBetweenObjectPair()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * CreatedResponseLabelsBetweenObjectPair::with(
     *   createdResourceId: ..., entity: ...
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
     */
    public static function with(
        string $createdResourceId,
        LabelsBetweenObjectPair $entity,
        ?string $location = null,
    ): self {
        $obj = new self;

        $obj->createdResourceId = $createdResourceId;
        $obj->entity = $entity;

        null !== $location && $obj->location = $location;

        return $obj;
    }

    public function withCreatedResourceID(string $createdResourceID): self
    {
        $obj = clone $this;
        $obj->createdResourceId = $createdResourceID;

        return $obj;
    }

    public function withEntity(LabelsBetweenObjectPair $entity): self
    {
        $obj = clone $this;
        $obj->entity = $entity;

        return $obj;
    }

    public function withLocation(string $location): self
    {
        $obj = clone $this;
        $obj->location = $location;

        return $obj;
    }
}
