<?php

declare(strict_types=1);

namespace HubspotSDK\CRM\Objects\DealSplits;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\CRM\SimplePublicObject;

/**
 * @phpstan-type deal_to_deal_splits = array{
 *   id: string, splits: list<SimplePublicObject>
 * }
 */
final class DealToDealSplits implements BaseModel
{
    /** @use SdkModel<deal_to_deal_splits> */
    use SdkModel;

    #[Api]
    public string $id;

    /** @var list<SimplePublicObject> $splits */
    #[Api(list: SimplePublicObject::class)]
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
     * @param list<SimplePublicObject> $splits
     */
    public static function with(string $id, array $splits): self
    {
        $obj = new self;

        $obj->id = $id;
        $obj->splits = $splits;

        return $obj;
    }

    public function withID(string $id): self
    {
        $obj = clone $this;
        $obj->id = $id;

        return $obj;
    }

    /**
     * @param list<SimplePublicObject> $splits
     */
    public function withSplits(array $splits): self
    {
        $obj = clone $this;
        $obj->splits = $splits;

        return $obj;
    }
}
