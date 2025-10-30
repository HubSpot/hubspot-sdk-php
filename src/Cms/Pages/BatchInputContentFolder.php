<?php

declare(strict_types=1);

namespace HubspotSDK\Cms\Pages;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * Wrapper for providing an array of content folders as inputs.
 *
 * @phpstan-type BatchInputContentFolderShape = array{inputs: list<ContentFolder>}
 */
final class BatchInputContentFolder implements BaseModel
{
    /** @use SdkModel<BatchInputContentFolderShape> */
    use SdkModel;

    /**
     * Content folders to input.
     *
     * @var list<ContentFolder> $inputs
     */
    #[Api(list: ContentFolder::class)]
    public array $inputs;

    /**
     * `new BatchInputContentFolder()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * BatchInputContentFolder::with(inputs: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new BatchInputContentFolder)->withInputs(...)
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
     * @param list<ContentFolder> $inputs
     */
    public static function with(array $inputs): self
    {
        $obj = new self;

        $obj->inputs = $inputs;

        return $obj;
    }

    /**
     * Content folders to input.
     *
     * @param list<ContentFolder> $inputs
     */
    public function withInputs(array $inputs): self
    {
        $obj = clone $this;
        $obj->inputs = $inputs;

        return $obj;
    }
}
