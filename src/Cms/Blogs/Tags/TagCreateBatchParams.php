<?php

declare(strict_types=1);

namespace HubspotSDK\Cms\Blogs\Tags;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * An object containing the method's parameters.
 * Example usage:
 * ```
 * $params = (new TagCreateBatchParams); // set properties as needed
 * $client->cms.blogs.tags->createBatch(...$params->toArray());
 * ```
 * Create a batch of Blog Tags.
 *
 * @method toArray()
 *   Returns the parameters as an associative array suitable for passing to the client method.
 *
 *   `$client->cms.blogs.tags->createBatch(...$params->toArray());`
 *
 * @see HubspotSDK\Cms\Blogs\Tags->createBatch
 *
 * @phpstan-type tag_create_batch_params = array{inputs: list<Tag>}
 */
final class TagCreateBatchParams implements BaseModel
{
    /** @use SdkModel<tag_create_batch_params> */
    use SdkModel;
    use SdkParams;

    /** @var list<Tag> $inputs */
    #[Api(list: Tag::class)]
    public array $inputs;

    /**
     * `new TagCreateBatchParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * TagCreateBatchParams::with(inputs: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new TagCreateBatchParams)->withInputs(...)
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
     * @param list<Tag> $inputs
     */
    public static function with(array $inputs): self
    {
        $obj = new self;

        $obj->inputs = $inputs;

        return $obj;
    }

    /**
     * @param list<Tag> $inputs
     */
    public function withInputs(array $inputs): self
    {
        $obj = clone $this;
        $obj->inputs = $inputs;

        return $obj;
    }
}
