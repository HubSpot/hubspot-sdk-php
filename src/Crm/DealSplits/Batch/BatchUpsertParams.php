<?php

declare(strict_types=1);

namespace HubSpotSDK\Crm\DealSplits\Batch;

use HubSpotSDK\Core\Attributes\Required;
use HubSpotSDK\Core\Concerns\SdkModel;
use HubSpotSDK\Core\Concerns\SdkParams;
use HubSpotSDK\Core\Contracts\BaseModel;
use HubSpotSDK\Crm\DealSplits\PublicDealSplitsCreateRequest;

/**
 * Create or replace deal splits for deals with the provided IDs. Deal split percentages for each deal must sum up to 1.0 (100%) and may have up to 8 decimal places.
 *
 * @see HubSpotSDK\Services\Crm\DealSplits\BatchService::upsert()
 *
 * @phpstan-import-type PublicDealSplitsCreateRequestShape from \HubSpotSDK\Crm\DealSplits\PublicDealSplitsCreateRequest
 *
 * @phpstan-type BatchUpsertParamsShape = array{
 *   inputs: list<PublicDealSplitsCreateRequest|PublicDealSplitsCreateRequestShape>
 * }
 */
final class BatchUpsertParams implements BaseModel
{
    /** @use SdkModel<BatchUpsertParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * An array of deal split inputs.
     *
     * @var list<PublicDealSplitsCreateRequest> $inputs
     */
    #[Required(list: PublicDealSplitsCreateRequest::class)]
    public array $inputs;

    /**
     * `new BatchUpsertParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * BatchUpsertParams::with(inputs: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new BatchUpsertParams)->withInputs(...)
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
     * @param list<PublicDealSplitsCreateRequest|PublicDealSplitsCreateRequestShape> $inputs
     */
    public static function with(array $inputs): self
    {
        $self = new self;

        $self['inputs'] = $inputs;

        return $self;
    }

    /**
     * An array of deal split inputs.
     *
     * @param list<PublicDealSplitsCreateRequest|PublicDealSplitsCreateRequestShape> $inputs
     */
    public function withInputs(array $inputs): self
    {
        $self = clone $this;
        $self['inputs'] = $inputs;

        return $self;
    }
}
