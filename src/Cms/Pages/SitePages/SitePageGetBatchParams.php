<?php

declare(strict_types=1);

namespace HubspotSDK\Cms\Pages\SitePages;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * Retrieve the Site Page objects identified in the request body.
 *
 * @see HubspotSDK\Cms\Pages\SitePages->getBatch
 *
 * @phpstan-type SitePageGetBatchParamsShape = array{
 *   inputs: list<string>, archived?: bool
 * }
 */
final class SitePageGetBatchParams implements BaseModel
{
    /** @use SdkModel<SitePageGetBatchParamsShape> */
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
     * Specifies whether to return deleted Site Pages. Defaults to `false`.
     */
    #[Api(optional: true)]
    public ?bool $archived;

    /**
     * `new SitePageGetBatchParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * SitePageGetBatchParams::with(inputs: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new SitePageGetBatchParams)->withInputs(...)
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
     * Specifies whether to return deleted Site Pages. Defaults to `false`.
     */
    public function withArchived(bool $archived): self
    {
        $obj = clone $this;
        $obj->archived = $archived;

        return $obj;
    }
}
