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
 * $params = (new TagReadBatchParams); // set properties as needed
 * $client->cms.blogs.tags->readBatch(...$params->toArray());
 * ```
 * Retrieve a batch of Blog Tags.
 *
 * @method toArray()
 *   Returns the parameters as an associative array suitable for passing to the client method.
 *
 *   `$client->cms.blogs.tags->readBatch(...$params->toArray());`
 *
 * @see HubspotSDK\Cms\Blogs\Tags->readBatch
 *
 * @phpstan-type tag_read_batch_params = array{
 *   inputs: list<string>, archived?: bool
 * }
 */
final class TagReadBatchParams implements BaseModel
{
    /** @use SdkModel<tag_read_batch_params> */
    use SdkModel;
    use SdkParams;

    /** @var list<string> $inputs */
    #[Api(list: 'string')]
    public array $inputs;

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
     * @param list<string> $inputs
     */
    public function withInputs(array $inputs): self
    {
        $obj = clone $this;
        $obj->inputs = $inputs;

        return $obj;
    }

    public function withArchived(bool $archived): self
    {
        $obj = clone $this;
        $obj->archived = $archived;

        return $obj;
    }
}
