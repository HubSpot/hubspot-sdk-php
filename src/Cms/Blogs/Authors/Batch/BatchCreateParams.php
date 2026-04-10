<?php

declare(strict_types=1);

namespace HubSpotSDK\Cms\Blogs\Authors\Batch;

use HubSpotSDK\Cms\Blogs\Authors\BlogAuthor;
use HubSpotSDK\Core\Attributes\Required;
use HubSpotSDK\Core\Concerns\SdkModel;
use HubSpotSDK\Core\Concerns\SdkParams;
use HubSpotSDK\Core\Contracts\BaseModel;

/**
 * Create the Blog Author objects detailed in the request body.
 *
 * @see HubSpotSDK\Services\Cms\Blogs\Authors\BatchService::create()
 *
 * @phpstan-import-type BlogAuthorShape from \HubSpotSDK\Cms\Blogs\Authors\BlogAuthor
 *
 * @phpstan-type BatchCreateParamsShape = array{
 *   inputs: list<BlogAuthor|BlogAuthorShape>
 * }
 */
final class BatchCreateParams implements BaseModel
{
    /** @use SdkModel<BatchCreateParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * Blog authors to input.
     *
     * @var list<BlogAuthor> $inputs
     */
    #[Required(list: BlogAuthor::class)]
    public array $inputs;

    /**
     * `new BatchCreateParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * BatchCreateParams::with(inputs: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new BatchCreateParams)->withInputs(...)
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
     * @param list<BlogAuthor|BlogAuthorShape> $inputs
     */
    public static function with(array $inputs): self
    {
        $self = new self;

        $self['inputs'] = $inputs;

        return $self;
    }

    /**
     * Blog authors to input.
     *
     * @param list<BlogAuthor|BlogAuthorShape> $inputs
     */
    public function withInputs(array $inputs): self
    {
        $self = clone $this;
        $self['inputs'] = $inputs;

        return $self;
    }
}
