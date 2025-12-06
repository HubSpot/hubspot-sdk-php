<?php

declare(strict_types=1);

namespace HubspotSDK\Cms\Blogs\Authors;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * Update the Blog Author objects identified in the request body.
 *
 * @see HubspotSDK\Services\Cms\Blogs\AuthorsService::updateBatch()
 *
 * @phpstan-type AuthorUpdateBatchParamsShape = array{
 *   inputs: list<mixed>, archived?: bool
 * }
 */
final class AuthorUpdateBatchParams implements BaseModel
{
    /** @use SdkModel<AuthorUpdateBatchParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * JSON nodes to input.
     *
     * @var list<mixed> $inputs
     */
    #[Api(list: 'mixed')]
    public array $inputs;

    /**
     * Specifies whether to update deleted Blog Authors. Defaults to `false`.
     */
    #[Api(optional: true)]
    public ?bool $archived;

    /**
     * `new AuthorUpdateBatchParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * AuthorUpdateBatchParams::with(inputs: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new AuthorUpdateBatchParams)->withInputs(...)
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
        $obj = new self;

        $obj['inputs'] = $inputs;

        null !== $archived && $obj['archived'] = $archived;

        return $obj;
    }

    /**
     * JSON nodes to input.
     *
     * @param list<mixed> $inputs
     */
    public function withInputs(array $inputs): self
    {
        $obj = clone $this;
        $obj['inputs'] = $inputs;

        return $obj;
    }

    /**
     * Specifies whether to update deleted Blog Authors. Defaults to `false`.
     */
    public function withArchived(bool $archived): self
    {
        $obj = clone $this;
        $obj['archived'] = $archived;

        return $obj;
    }
}
