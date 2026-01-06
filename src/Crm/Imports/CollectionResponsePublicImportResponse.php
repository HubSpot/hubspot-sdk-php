<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\Imports;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\Crm\Imports\PublicImportResponse\ImportSource;
use HubspotSDK\Crm\Imports\PublicImportResponse\State;
use HubspotSDK\NextPage;
use HubspotSDK\Paging;
use HubspotSDK\PreviousPage;

/**
 * @phpstan-type CollectionResponsePublicImportResponseShape = array{
 *   results: list<PublicImportResponse>, paging?: Paging|null
 * }
 */
final class CollectionResponsePublicImportResponse implements BaseModel
{
    /** @use SdkModel<CollectionResponsePublicImportResponseShape> */
    use SdkModel;

    /** @var list<PublicImportResponse> $results */
    #[Required(list: PublicImportResponse::class)]
    public array $results;

    #[Optional]
    public ?Paging $paging;

    /**
     * `new CollectionResponsePublicImportResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * CollectionResponsePublicImportResponse::with(results: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new CollectionResponsePublicImportResponse)->withResults(...)
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
     * @param list<PublicImportResponse|array{
     *   id: string,
     *   createdAt: \DateTimeInterface,
     *   mappedObjectTypeIDs: list<string>,
     *   metadata: PublicImportMetadata,
     *   optOutImport: bool,
     *   state: value-of<State>,
     *   updatedAt: \DateTimeInterface,
     *   importName?: string|null,
     *   importRequestJson?: mixed,
     *   importSource?: value-of<ImportSource>|null,
     *   importTemplate?: ImportTemplate|null,
     * }> $results
     * @param Paging|array{next?: NextPage|null, prev?: PreviousPage|null} $paging
     */
    public static function with(
        array $results,
        Paging|array|null $paging = null
    ): self {
        $obj = new self;

        $obj['results'] = $results;

        null !== $paging && $obj['paging'] = $paging;

        return $obj;
    }

    /**
     * @param list<PublicImportResponse|array{
     *   id: string,
     *   createdAt: \DateTimeInterface,
     *   mappedObjectTypeIDs: list<string>,
     *   metadata: PublicImportMetadata,
     *   optOutImport: bool,
     *   state: value-of<State>,
     *   updatedAt: \DateTimeInterface,
     *   importName?: string|null,
     *   importRequestJson?: mixed,
     *   importSource?: value-of<ImportSource>|null,
     *   importTemplate?: ImportTemplate|null,
     * }> $results
     */
    public function withResults(array $results): self
    {
        $obj = clone $this;
        $obj['results'] = $results;

        return $obj;
    }

    /**
     * @param Paging|array{next?: NextPage|null, prev?: PreviousPage|null} $paging
     */
    public function withPaging(Paging|array $paging): self
    {
        $obj = clone $this;
        $obj['paging'] = $paging;

        return $obj;
    }
}
