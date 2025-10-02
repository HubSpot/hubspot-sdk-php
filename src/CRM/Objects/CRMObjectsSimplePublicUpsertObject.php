<?php

declare(strict_types=1);

namespace HubspotSDK\CRM\Objects;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\Core\Conversion\ListOf;

/**
 * @phpstan-type crm_objects_simple_public_upsert_object = array{
 *   id: string,
 *   createdAt: \DateTimeInterface,
 *   new: bool,
 *   properties: array<string, string>,
 *   updatedAt: \DateTimeInterface,
 *   archived?: bool,
 *   archivedAt?: \DateTimeInterface,
 *   objectWriteTraceID?: string,
 *   propertiesWithHistory?: array<string, list<CRMObjectsValueWithTimestamp>>,
 * }
 */
final class CRMObjectsSimplePublicUpsertObject implements BaseModel
{
    /** @use SdkModel<crm_objects_simple_public_upsert_object> */
    use SdkModel;

    #[Api]
    public string $id;

    #[Api]
    public \DateTimeInterface $createdAt;

    #[Api]
    public bool $new;

    /** @var array<string, string> $properties */
    #[Api(map: 'string')]
    public array $properties;

    #[Api]
    public \DateTimeInterface $updatedAt;

    #[Api(optional: true)]
    public ?bool $archived;

    #[Api(optional: true)]
    public ?\DateTimeInterface $archivedAt;

    #[Api('objectWriteTraceId', optional: true)]
    public ?string $objectWriteTraceID;

    /**
     * @var array<string,
     * list<CRMObjectsValueWithTimestamp>,>|null $propertiesWithHistory
     */
    #[Api(map: new ListOf(CRMObjectsValueWithTimestamp::class), optional: true)]
    public ?array $propertiesWithHistory;

    /**
     * `new CRMObjectsSimplePublicUpsertObject()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * CRMObjectsSimplePublicUpsertObject::with(
     *   id: ..., createdAt: ..., new: ..., properties: ..., updatedAt: ...
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new CRMObjectsSimplePublicUpsertObject)
     *   ->withID(...)
     *   ->withCreatedAt(...)
     *   ->withNew(...)
     *   ->withProperties(...)
     *   ->withUpdatedAt(...)
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
     * @param array<string, string> $properties
     * @param array<string, list<CRMObjectsValueWithTimestamp>> $propertiesWithHistory
     */
    public static function with(
        string $id,
        \DateTimeInterface $createdAt,
        bool $new,
        array $properties,
        \DateTimeInterface $updatedAt,
        ?bool $archived = null,
        ?\DateTimeInterface $archivedAt = null,
        ?string $objectWriteTraceID = null,
        ?array $propertiesWithHistory = null,
    ): self {
        $obj = new self;

        $obj->id = $id;
        $obj->createdAt = $createdAt;
        $obj->new = $new;
        $obj->properties = $properties;
        $obj->updatedAt = $updatedAt;

        null !== $archived && $obj->archived = $archived;
        null !== $archivedAt && $obj->archivedAt = $archivedAt;
        null !== $objectWriteTraceID && $obj->objectWriteTraceID = $objectWriteTraceID;
        null !== $propertiesWithHistory && $obj->propertiesWithHistory = $propertiesWithHistory;

        return $obj;
    }

    public function withID(string $id): self
    {
        $obj = clone $this;
        $obj->id = $id;

        return $obj;
    }

    public function withCreatedAt(\DateTimeInterface $createdAt): self
    {
        $obj = clone $this;
        $obj->createdAt = $createdAt;

        return $obj;
    }

    public function withNew(bool $new): self
    {
        $obj = clone $this;
        $obj->new = $new;

        return $obj;
    }

    /**
     * @param array<string, string> $properties
     */
    public function withProperties(array $properties): self
    {
        $obj = clone $this;
        $obj->properties = $properties;

        return $obj;
    }

    public function withUpdatedAt(\DateTimeInterface $updatedAt): self
    {
        $obj = clone $this;
        $obj->updatedAt = $updatedAt;

        return $obj;
    }

    public function withArchived(bool $archived): self
    {
        $obj = clone $this;
        $obj->archived = $archived;

        return $obj;
    }

    public function withArchivedAt(\DateTimeInterface $archivedAt): self
    {
        $obj = clone $this;
        $obj->archivedAt = $archivedAt;

        return $obj;
    }

    public function withObjectWriteTraceID(string $objectWriteTraceID): self
    {
        $obj = clone $this;
        $obj->objectWriteTraceID = $objectWriteTraceID;

        return $obj;
    }

    /**
     * @param array<string, list<CRMObjectsValueWithTimestamp>> $propertiesWithHistory
     */
    public function withPropertiesWithHistory(
        array $propertiesWithHistory
    ): self {
        $obj = clone $this;
        $obj->propertiesWithHistory = $propertiesWithHistory;

        return $obj;
    }
}
