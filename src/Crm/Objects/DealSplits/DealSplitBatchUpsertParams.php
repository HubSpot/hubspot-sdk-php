<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\Objects\DealSplits;

use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * Create or replace deal splits for deals with the provided IDs. Deal split percentages for each deal must sum up to 1.0 (100%) and may have up to 8 decimal places.
 *
 * @see HubspotSDK\Services\Crm\Objects\DealSplitsService::batchUpsert()
 *
 * @phpstan-type DealSplitBatchUpsertParamsShape = array{
 *   inputs: list<PublicDealSplitsCreateRequest|array{
 *     id: int, splits: list<PublicDealSplitInput>
 *   }>,
 * }
 */
final class DealSplitBatchUpsertParams implements BaseModel
{
    /** @use SdkModel<DealSplitBatchUpsertParamsShape> */
    use SdkModel;
    use SdkParams;

    /** @var list<PublicDealSplitsCreateRequest> $inputs */
    #[Required(list: PublicDealSplitsCreateRequest::class)]
    public array $inputs;

    /**
     * `new DealSplitBatchUpsertParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * DealSplitBatchUpsertParams::with(inputs: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new DealSplitBatchUpsertParams)->withInputs(...)
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
     * @param list<PublicDealSplitsCreateRequest|array{
     *   id: int, splits: list<PublicDealSplitInput>
     * }> $inputs
     */
    public static function with(array $inputs): self
    {
        $self = new self;

        $self['inputs'] = $inputs;

        return $self;
    }

    /**
     * @param list<PublicDealSplitsCreateRequest|array{
     *   id: int, splits: list<PublicDealSplitInput>
     * }> $inputs
     */
    public function withInputs(array $inputs): self
    {
        $self = clone $this;
        $self['inputs'] = $inputs;

        return $self;
    }
}
