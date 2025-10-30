<?php

declare(strict_types=1);

namespace HubspotSDK\CRM\Limits;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkResponse;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\Core\Conversion\Contracts\ResponseConverter;

/**
 * @phpstan-type AssociationRecordLimitResponseShape = array{
 *   atLimitFromRecordSamples: list<AtLimitRecordSample>,
 *   limit: int,
 *   nearLimitFromRecordSamples: list<NearLimitRecordSample>,
 *   totalRecordsAtLimit: int,
 *   totalRecordsNearLimit: int,
 * }
 */
final class AssociationRecordLimitResponse implements BaseModel, ResponseConverter
{
    /** @use SdkModel<AssociationRecordLimitResponseShape> */
    use SdkModel;

    use SdkResponse;

    /** @var list<AtLimitRecordSample> $atLimitFromRecordSamples */
    #[Api(list: AtLimitRecordSample::class)]
    public array $atLimitFromRecordSamples;

    #[Api]
    public int $limit;

    /** @var list<NearLimitRecordSample> $nearLimitFromRecordSamples */
    #[Api(list: NearLimitRecordSample::class)]
    public array $nearLimitFromRecordSamples;

    #[Api]
    public int $totalRecordsAtLimit;

    #[Api]
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
     * @param list<AtLimitRecordSample> $atLimitFromRecordSamples
     * @param list<NearLimitRecordSample> $nearLimitFromRecordSamples
     */
    public static function with(
        array $atLimitFromRecordSamples,
        int $limit,
        array $nearLimitFromRecordSamples,
        int $totalRecordsAtLimit,
        int $totalRecordsNearLimit,
    ): self {
        $obj = new self;

        $obj->atLimitFromRecordSamples = $atLimitFromRecordSamples;
        $obj->limit = $limit;
        $obj->nearLimitFromRecordSamples = $nearLimitFromRecordSamples;
        $obj->totalRecordsAtLimit = $totalRecordsAtLimit;
        $obj->totalRecordsNearLimit = $totalRecordsNearLimit;

        return $obj;
    }

    /**
     * @param list<AtLimitRecordSample> $atLimitFromRecordSamples
     */
    public function withAtLimitFromRecordSamples(
        array $atLimitFromRecordSamples
    ): self {
        $obj = clone $this;
        $obj->atLimitFromRecordSamples = $atLimitFromRecordSamples;

        return $obj;
    }

    public function withLimit(int $limit): self
    {
        $obj = clone $this;
        $obj->limit = $limit;

        return $obj;
    }

    /**
     * @param list<NearLimitRecordSample> $nearLimitFromRecordSamples
     */
    public function withNearLimitFromRecordSamples(
        array $nearLimitFromRecordSamples
    ): self {
        $obj = clone $this;
        $obj->nearLimitFromRecordSamples = $nearLimitFromRecordSamples;

        return $obj;
    }

    public function withTotalRecordsAtLimit(int $totalRecordsAtLimit): self
    {
        $obj = clone $this;
        $obj->totalRecordsAtLimit = $totalRecordsAtLimit;

        return $obj;
    }

    public function withTotalRecordsNearLimit(int $totalRecordsNearLimit): self
    {
        $obj = clone $this;
        $obj->totalRecordsNearLimit = $totalRecordsNearLimit;

        return $obj;
    }
}
