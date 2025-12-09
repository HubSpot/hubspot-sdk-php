<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\Limits;

use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type AssociationRecordLimitResponseShape = array{
 *   atLimitFromRecordSamples: list<AtLimitRecordSample>,
 *   limit: int,
 *   nearLimitFromRecordSamples: list<NearLimitRecordSample>,
 *   totalRecordsAtLimit: int,
 *   totalRecordsNearLimit: int,
 * }
 */
final class AssociationRecordLimitResponse implements BaseModel
{
    /** @use SdkModel<AssociationRecordLimitResponseShape> */
    use SdkModel;

    /** @var list<AtLimitRecordSample> $atLimitFromRecordSamples */
    #[Required(list: AtLimitRecordSample::class)]
    public array $atLimitFromRecordSamples;

    /**
     * The maximum number of associations allowed for records.
     */
    #[Required]
    public int $limit;

    /** @var list<NearLimitRecordSample> $nearLimitFromRecordSamples */
    #[Required(list: NearLimitRecordSample::class)]
    public array $nearLimitFromRecordSamples;

    /**
     * The total number of records that have reached their association limit.
     */
    #[Required]
    public int $totalRecordsAtLimit;

    /**
     * The total number of records that are approaching their association limit.
     */
    #[Required]
    public int $totalRecordsNearLimit;

    /**
     * `new AssociationRecordLimitResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * AssociationRecordLimitResponse::with(
     *   atLimitFromRecordSamples: ...,
     *   limit: ...,
     *   nearLimitFromRecordSamples: ...,
     *   totalRecordsAtLimit: ...,
     *   totalRecordsNearLimit: ...,
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new AssociationRecordLimitResponse)
     *   ->withAtLimitFromRecordSamples(...)
     *   ->withLimit(...)
     *   ->withNearLimitFromRecordSamples(...)
     *   ->withTotalRecordsAtLimit(...)
     *   ->withTotalRecordsNearLimit(...)
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
     * @param list<AtLimitRecordSample|array{
     *   label: string, objectID: int
     * }> $atLimitFromRecordSamples
     * @param list<NearLimitRecordSample|array{
     *   label: string, objectID: int, percentage: float, usage: int
     * }> $nearLimitFromRecordSamples
     */
    public static function with(
        array $atLimitFromRecordSamples,
        int $limit,
        array $nearLimitFromRecordSamples,
        int $totalRecordsAtLimit,
        int $totalRecordsNearLimit,
    ): self {
        $obj = new self;

        $obj['atLimitFromRecordSamples'] = $atLimitFromRecordSamples;
        $obj['limit'] = $limit;
        $obj['nearLimitFromRecordSamples'] = $nearLimitFromRecordSamples;
        $obj['totalRecordsAtLimit'] = $totalRecordsAtLimit;
        $obj['totalRecordsNearLimit'] = $totalRecordsNearLimit;

        return $obj;
    }

    /**
     * @param list<AtLimitRecordSample|array{
     *   label: string, objectID: int
     * }> $atLimitFromRecordSamples
     */
    public function withAtLimitFromRecordSamples(
        array $atLimitFromRecordSamples
    ): self {
        $obj = clone $this;
        $obj['atLimitFromRecordSamples'] = $atLimitFromRecordSamples;

        return $obj;
    }

    /**
     * The maximum number of associations allowed for records.
     */
    public function withLimit(int $limit): self
    {
        $obj = clone $this;
        $obj['limit'] = $limit;

        return $obj;
    }

    /**
     * @param list<NearLimitRecordSample|array{
     *   label: string, objectID: int, percentage: float, usage: int
     * }> $nearLimitFromRecordSamples
     */
    public function withNearLimitFromRecordSamples(
        array $nearLimitFromRecordSamples
    ): self {
        $obj = clone $this;
        $obj['nearLimitFromRecordSamples'] = $nearLimitFromRecordSamples;

        return $obj;
    }

    /**
     * The total number of records that have reached their association limit.
     */
    public function withTotalRecordsAtLimit(int $totalRecordsAtLimit): self
    {
        $obj = clone $this;
        $obj['totalRecordsAtLimit'] = $totalRecordsAtLimit;

        return $obj;
    }

    /**
     * The total number of records that are approaching their association limit.
     */
    public function withTotalRecordsNearLimit(int $totalRecordsNearLimit): self
    {
        $obj = clone $this;
        $obj['totalRecordsNearLimit'] = $totalRecordsNearLimit;

        return $obj;
    }
}
