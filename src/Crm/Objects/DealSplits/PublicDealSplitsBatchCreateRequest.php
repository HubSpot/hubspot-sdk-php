<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\Objects\DealSplits;

use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type PublicDealSplitsCreateRequestShape from \HubspotSDK\Crm\Objects\DealSplits\PublicDealSplitsCreateRequest
 *
 * @phpstan-type PublicDealSplitsBatchCreateRequestShape = array{
 *   inputs: list<PublicDealSplitsCreateRequestShape>
 * }
 */
final class PublicDealSplitsBatchCreateRequest implements BaseModel
{
    /** @use SdkModel<PublicDealSplitsBatchCreateRequestShape> */
    use SdkModel;

    /** @var list<PublicDealSplitsCreateRequest> $inputs */
    #[Required(list: PublicDealSplitsCreateRequest::class)]
    public array $inputs;

    /**
     * `new PublicDealSplitsBatchCreateRequest()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * PublicDealSplitsBatchCreateRequest::with(inputs: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new PublicDealSplitsBatchCreateRequest)->withInputs(...)
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
     * @param list<PublicDealSplitsCreateRequestShape> $inputs
     */
    public static function with(array $inputs): self
    {
        $self = new self;

        $self['inputs'] = $inputs;

        return $self;
    }

    /**
     * @param list<PublicDealSplitsCreateRequestShape> $inputs
     */
    public function withInputs(array $inputs): self
    {
        $self = clone $this;
        $self['inputs'] = $inputs;

        return $self;
    }
}
