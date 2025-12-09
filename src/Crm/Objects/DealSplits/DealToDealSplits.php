<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\Objects\DealSplits;

use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\Crm\SimplePublicObject;
use HubspotSDK\Crm\ValueWithTimestamp;

/**
 * @phpstan-type DealToDealSplitsShape = array{
 *   id: string, splits: list<SimplePublicObject>
 * }
 */
final class DealToDealSplits implements BaseModel
{
    /** @use SdkModel<DealToDealSplitsShape> */
    use SdkModel;

    #[Required]
    public string $id;

    /** @var list<SimplePublicObject> $splits */
    #[Required(list: SimplePublicObject::class)]
    public array $splits;

    /**
     * `new DealToDealSplits()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * DealToDealSplits::with(id: ..., splits: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new DealToDealSplits)->withID(...)->withSplits(...)
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
     * @param list<SimplePublicObject|array{
     *   id: string,
     *   archived: bool,
     *   createdAt: \DateTimeInterface,
     *   properties: array<string,string|null>,
     *   updatedAt: \DateTimeInterface,
     *   archivedAt?: \DateTimeInterface|null,
     *   objectWriteTraceId?: string|null,
     *   propertiesWithHistory?: array<string,list<ValueWithTimestamp>>|null,
     *   url?: string|null,
     * }> $splits
     */
    public static function with(string $id, array $splits): self
    {
        $obj = new self;

        $obj['id'] = $id;
        $obj['splits'] = $splits;

        return $obj;
    }

    public function withID(string $id): self
    {
        $obj = clone $this;
        $obj['id'] = $id;

        return $obj;
    }

    /**
     * @param list<SimplePublicObject|array{
     *   id: string,
     *   archived: bool,
     *   createdAt: \DateTimeInterface,
     *   properties: array<string,string|null>,
     *   updatedAt: \DateTimeInterface,
     *   archivedAt?: \DateTimeInterface|null,
     *   objectWriteTraceId?: string|null,
     *   propertiesWithHistory?: array<string,list<ValueWithTimestamp>>|null,
     *   url?: string|null,
     * }> $splits
     */
    public function withSplits(array $splits): self
    {
        $obj = clone $this;
        $obj['splits'] = $splits;

        return $obj;
    }
}
