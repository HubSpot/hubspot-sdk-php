<?php

declare(strict_types=1);

namespace HubSpotSDK\Cms\Pages\Batch;

use HubSpotSDK\Cms\Pages\PageData;
use HubSpotSDK\Core\Attributes\Required;
use HubSpotSDK\Core\Concerns\SdkModel;
use HubSpotSDK\Core\Concerns\SdkParams;
use HubSpotSDK\Core\Contracts\BaseModel;

/**
 * Create a batch of website pages as specified in the request body.
 *
 * @see HubSpotSDK\Services\Cms\Pages\BatchService::createSitePages()
 *
 * @phpstan-type BatchCreateSitePagesParamsShape = array{inputs: list<mixed>}
 */
final class BatchCreateSitePagesParams implements BaseModel
{
    /** @use SdkModel<BatchCreateSitePagesParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * Pages to input.
     *
     * @var list<mixed> $inputs
     */
    #[Required(list: PageData::class)]
    public array $inputs;

    /**
     * `new BatchCreateSitePagesParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * BatchCreateSitePagesParams::with(inputs: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new BatchCreateSitePagesParams)->withInputs(...)
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
     * @param list<mixed> $inputs
     */
    public static function with(array $inputs): self
    {
        $self = new self;

        $self['inputs'] = $inputs;

        return $self;
    }

    /**
     * Pages to input.
     *
     * @param list<mixed> $inputs
     */
    public function withInputs(array $inputs): self
    {
        $self = clone $this;
        $self['inputs'] = $inputs;

        return $self;
    }
}
