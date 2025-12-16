<?php

declare(strict_types=1);

namespace HubspotSDK\Cms\Pages\LandingPages;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * Update the Landing Page objects identified in the request body.
 *
 * @see HubspotSDK\Services\Cms\Pages\LandingPagesService::updateBatch()
 *
 * @phpstan-type LandingPageUpdateBatchParamsShape = array{
 *   inputs: list<mixed>, archived?: bool|null
 * }
 */
final class LandingPageUpdateBatchParams implements BaseModel
{
    /** @use SdkModel<LandingPageUpdateBatchParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * JSON nodes to input.
     *
     * @var list<mixed> $inputs
     */
    #[Required(list: 'mixed')]
    public array $inputs;

    /**
     * Specifies whether to update deleted Landing Pages. Defaults to `false`.
     */
    #[Optional]
    public ?bool $archived;

    /**
     * `new LandingPageUpdateBatchParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * LandingPageUpdateBatchParams::with(inputs: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new LandingPageUpdateBatchParams)->withInputs(...)
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
    public static function with(array $inputs, ?bool $archived = null): self
    {
        $self = new self;

        $self['inputs'] = $inputs;

        null !== $archived && $self['archived'] = $archived;

        return $self;
    }

    /**
     * JSON nodes to input.
     *
     * @param list<mixed> $inputs
     */
    public function withInputs(array $inputs): self
    {
        $self = clone $this;
        $self['inputs'] = $inputs;

        return $self;
    }

    /**
     * Specifies whether to update deleted Landing Pages. Defaults to `false`.
     */
    public function withArchived(bool $archived): self
    {
        $self = clone $this;
        $self['archived'] = $archived;

        return $self;
    }
}
