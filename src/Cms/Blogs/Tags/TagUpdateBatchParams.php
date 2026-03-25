<?php

declare(strict_types=1);

namespace HubspotSDK\Cms\Blogs\Tags;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @see HubspotSDK\Services\Cms\Blogs\TagsService::updateBatch()
 *
 * @phpstan-type TagUpdateBatchParamsShape = array{
 *   inputs: list<mixed>, archived?: bool|null
 * }
 */
final class TagUpdateBatchParams implements BaseModel
{
    /** @use SdkModel<TagUpdateBatchParamsShape> */
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
     * Whether to return only results that have been archived.
     */
    #[Optional]
    public ?bool $archived;

    /**
     * `new TagUpdateBatchParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * TagUpdateBatchParams::with(inputs: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new TagUpdateBatchParams)->withInputs(...)
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
     * Whether to return only results that have been archived.
     */
    public function withArchived(bool $archived): self
    {
        $self = clone $this;
        $self['archived'] = $archived;

        return $self;
    }
}
