<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\DealSplits;

use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\Crm\SimplePublicObject;

/**
 * @phpstan-import-type SimplePublicObjectShape from \HubspotSDK\Crm\SimplePublicObject
 *
 * @phpstan-type DealToDealSplitsShape = array{
 *   id: string, splits: list<SimplePublicObject|SimplePublicObjectShape>
 * }
 */
final class DealToDealSplits implements BaseModel
{
    /** @use SdkModel<DealToDealSplitsShape> */
    use SdkModel;

    /**
     * The unique identifier for the deal associated with the deal splits.
     */
    #[Required]
    public string $id;

    /**
     * An array of deal split objects, each representing a portion of the deal assigned to an owner.
     *
     * @var list<SimplePublicObject> $splits
     */
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
     * @param list<SimplePublicObject|SimplePublicObjectShape> $splits
     */
    public static function with(string $id, array $splits): self
    {
        $self = new self;

        $self['id'] = $id;
        $self['splits'] = $splits;

        return $self;
    }

    /**
     * The unique identifier for the deal associated with the deal splits.
     */
    public function withID(string $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }

    /**
     * An array of deal split objects, each representing a portion of the deal assigned to an owner.
     *
     * @param list<SimplePublicObject|SimplePublicObjectShape> $splits
     */
    public function withSplits(array $splits): self
    {
        $self = clone $this;
        $self['splits'] = $splits;

        return $self;
    }
}
