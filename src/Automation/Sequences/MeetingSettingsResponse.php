<?php

declare(strict_types=1);

namespace HubspotSDK\Automation\Sequences;

use HubspotSDK\Automation\Sequences\MeetingSettingsResponse\Criteria;
use HubspotSDK\Automation\Sequences\MeetingSettingsResponse\SellingStrategy;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type MeetingSettingsResponseShape = array{
 *   criteria: value-of<Criteria>, sellingStrategy: value-of<SellingStrategy>
 * }
 */
final class MeetingSettingsResponse implements BaseModel
{
    /** @use SdkModel<MeetingSettingsResponseShape> */
    use SdkModel;

    /** @var value-of<Criteria> $criteria */
    #[Required(enum: Criteria::class)]
    public string $criteria;

    /** @var value-of<SellingStrategy> $sellingStrategy */
    #[Required(enum: SellingStrategy::class)]
    public string $sellingStrategy;

    /**
     * `new MeetingSettingsResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * MeetingSettingsResponse::with(criteria: ..., sellingStrategy: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new MeetingSettingsResponse)->withCriteria(...)->withSellingStrategy(...)
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
     * @param Criteria|value-of<Criteria> $criteria
     * @param SellingStrategy|value-of<SellingStrategy> $sellingStrategy
     */
    public static function with(
        Criteria|string $criteria,
        SellingStrategy|string $sellingStrategy
    ): self {
        $obj = new self;

        $obj['criteria'] = $criteria;
        $obj['sellingStrategy'] = $sellingStrategy;

        return $obj;
    }

    /**
     * @param Criteria|value-of<Criteria> $criteria
     */
    public function withCriteria(Criteria|string $criteria): self
    {
        $obj = clone $this;
        $obj['criteria'] = $criteria;

        return $obj;
    }

    /**
     * @param SellingStrategy|value-of<SellingStrategy> $sellingStrategy
     */
    public function withSellingStrategy(
        SellingStrategy|string $sellingStrategy
    ): self {
        $obj = clone $this;
        $obj['sellingStrategy'] = $sellingStrategy;

        return $obj;
    }
}
