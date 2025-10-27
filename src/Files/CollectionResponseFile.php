<?php

declare(strict_types=1);

namespace HubspotSDK\Files;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\Paging;

/**
 * Collections of files.
 *
 * @phpstan-type collection_response_file = array{
 *   results: list<File>, paging?: Paging
 * }
 */
final class CollectionResponseFile implements BaseModel
{
    /** @use SdkModel<collection_response_file> */
    use SdkModel;

    /** @var list<File> $results */
    #[Api(list: File::class)]
    public array $results;

    #[Api(optional: true)]
    public ?Paging $paging;

    /**
     * `new CollectionResponseFile()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * CollectionResponseFile::with(results: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new CollectionResponseFile)->withResults(...)
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
     * @param list<File> $results
     */
    public static function with(array $results, ?Paging $paging = null): self
    {
        $obj = new self;

        $obj->results = $results;

        null !== $paging && $obj->paging = $paging;

        return $obj;
    }

    /**
     * @param list<File> $results
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
