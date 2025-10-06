<?php

declare(strict_types=1);

namespace HubspotSDK\Files;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\Marketing\Emails\Paging;

/**
 * @phpstan-type collection_response_folder = array{
 *   results: list<Folder>, paging?: Paging
 * }
 */
final class CollectionResponseFolder implements BaseModel
{
    /** @use SdkModel<collection_response_folder> */
    use SdkModel;

    /** @var list<Folder> $results */
    #[Api(list: Folder::class)]
    public array $results;

    #[Api(optional: true)]
    public ?Paging $paging;

    /**
     * `new CollectionResponseFolder()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * CollectionResponseFolder::with(results: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new CollectionResponseFolder)->withResults(...)
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
     * @param list<Folder> $results
     */
    public static function with(array $results, ?Paging $paging = null): self
    {
        $obj = new self;

        $obj->results = $results;

        null !== $paging && $obj->paging = $paging;

        return $obj;
    }

    /**
     * @param list<Folder> $results
     */
    public function withResults(array $results): self
    {
        $obj = clone $this;
        $obj->results = $results;

        return $obj;
    }

    public function withPaging(Paging $paging): self
    {
        $obj = clone $this;
        $obj->paging = $paging;

        return $obj;
    }
}
