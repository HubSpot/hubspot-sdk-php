<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\Limits;

use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type CustomObjectRecordLimitResponseShape = array{
 *   byObjectType: list<UsageForObjectType>,
 *   overallLimit: int,
 *   overallPercentage: float,
 *   overallUsage: int,
 * }
 */
final class CustomObjectRecordLimitResponse implements BaseModel
{
    /** @use SdkModel<CustomObjectRecordLimitResponseShape> */
    use SdkModel;

    /** @var list<UsageForObjectType> $byObjectType */
    #[Required(list: UsageForObjectType::class)]
    public array $byObjectType;

    /**
     * The maximum number of custom object records allowed.
     */
    #[Required]
    public int $overallLimit;

    /**
     * The percentage of the overall custom object record limit that has been used.
     */
    #[Required]
    public float $overallPercentage;

    /**
     * The total number of custom object records currently in use.
     */
    #[Required]
    public int $overallUsage;

    /**
     * `new CustomObjectRecordLimitResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * CustomObjectRecordLimitResponse::with(
     *   byObjectType: ...,
     *   overallLimit: ...,
     *   overallPercentage: ...,
     *   overallUsage: ...,
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new CustomObjectRecordLimitResponse)
     *   ->withByObjectType(...)
     *   ->withOverallLimit(...)
     *   ->withOverallPercentage(...)
     *   ->withOverallUsage(...)
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
     * @param list<UsageForObjectType|array{
     *   objectTypeId: string, pluralLabel: string, singularLabel: string, usage: int
     * }> $byObjectType
     */
    public static function with(
        array $byObjectType,
        int $overallLimit,
        float $overallPercentage,
        int $overallUsage,
    ): self {
        $obj = new self;

        $obj['byObjectType'] = $byObjectType;
        $obj['overallLimit'] = $overallLimit;
        $obj['overallPercentage'] = $overallPercentage;
        $obj['overallUsage'] = $overallUsage;

        return $obj;
    }

    /**
     * @param list<UsageForObjectType|array{
     *   objectTypeId: string, pluralLabel: string, singularLabel: string, usage: int
     * }> $byObjectType
     */
    public function withByObjectType(array $byObjectType): self
    {
        $obj = clone $this;
        $obj['byObjectType'] = $byObjectType;

        return $obj;
    }

    /**
     * The maximum number of custom object records allowed.
     */
    public function withOverallLimit(int $overallLimit): self
    {
        $obj = clone $this;
        $obj['overallLimit'] = $overallLimit;

        return $obj;
    }

    /**
     * The percentage of the overall custom object record limit that has been used.
     */
    public function withOverallPercentage(float $overallPercentage): self
    {
        $obj = clone $this;
        $obj['overallPercentage'] = $overallPercentage;

        return $obj;
    }

    /**
     * The total number of custom object records currently in use.
     */
    public function withOverallUsage(int $overallUsage): self
    {
        $obj = clone $this;
        $obj['overallUsage'] = $overallUsage;

        return $obj;
    }
}
