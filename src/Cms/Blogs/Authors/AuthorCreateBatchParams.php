<?php

declare(strict_types=1);

namespace HubspotSDK\Cms\Blogs\Authors;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * Create the Blog Author objects detailed in the request body.
 *
 * @see HubspotSDK\Services\Cms\Blogs\AuthorsService::createBatch()
 *
 * @phpstan-type AuthorCreateBatchParamsShape = array{inputs: list<BlogAuthor>}
 */
final class AuthorCreateBatchParams implements BaseModel
{
    /** @use SdkModel<AuthorCreateBatchParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * Blog authors to input.
     *
     * @var list<BlogAuthor> $inputs
     */
    #[Api(list: BlogAuthor::class)]
    public array $inputs;

    /**
     * `new AuthorCreateBatchParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * AuthorCreateBatchParams::with(inputs: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new AuthorCreateBatchParams)->withInputs(...)
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
     * @param list<BlogAuthor> $inputs
     */
    public static function with(array $inputs): self
    {
        $obj = new self;

        $obj->inputs = $inputs;

        return $obj;
    }

    /**
     * Blog authors to input.
     *
     * @param list<BlogAuthor> $inputs
     */
    public function withInputs(array $inputs): self
    {
        $obj = clone $this;
        $obj->inputs = $inputs;

        return $obj;
    }
}
