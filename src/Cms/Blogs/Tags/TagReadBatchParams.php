<?php

declare(strict_types=1);

namespace HubspotSDK\Cms\Blogs\Tags;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * Retrieve the Blog Tag objects identified in the request body.
 *
 * @see HubspotSDK\Cms\Blogs\Tags->readBatch
 *
 * @phpstan-type TagReadBatchParamsShape = array{
 *   inputs: list<string>, archived?: bool
 * }
 */
final class TagReadBatchParams implements BaseModel
{
    /** @use SdkModel<TagReadBatchParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * Strings to input.
     *
     * @var list<string> $inputs
     */
    #[Api(list: 'string')]
    public array $inputs;

    /**
     * Specifies whether to return deleted Blog Tags. Defaults to `false`.
     */
    #[Api(optional: true)]
    public ?bool $archived;

    /**
     * `new TagReadBatchParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * TagReadBatchParams::with(inputs: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new TagReadBatchParams)->withInputs(...)
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
     * @param list<string> $inputs
     */
    public static function with(array $inputs, ?bool $archived = null): self
    {
        $obj = new self;

        $obj->inputs = $inputs;

        null !== $archived && $obj->archived = $archived;

        return $obj;
    }

    /**
     * Strings to input.
     *
     * @param list<string> $inputs
     */
    public function withInputs(array $inputs): self
    {
        $obj = clone $this;
        $obj->inputs = $inputs;

        return $obj;
    }

    /**
     * Specifies whether to return deleted Blog Tags. Defaults to `false`.
     */
    public function withArchived(bool $archived): self
    {
        $obj = clone $this;
        $obj->archived = $archived;

        return $obj;
    }
}
