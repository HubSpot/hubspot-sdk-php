<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\Associations\V4;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type PublicFetchAssociationsBatchRequestShape = array{
 *   id: string, after?: string|null
 * }
 */
final class PublicFetchAssociationsBatchRequest implements BaseModel
{
    /** @use SdkModel<PublicFetchAssociationsBatchRequestShape> */
    use SdkModel;

    /**
     * The unique identifier for the object whose associations are being fetched.
     */
    #[Required]
    public string $id;

    /**
     * A paging cursor token used to retrieve the next set of results in a paginated response.
     */
    #[Optional]
    public ?string $after;

    /**
     * `new PublicFetchAssociationsBatchRequest()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * PublicFetchAssociationsBatchRequest::with(id: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new PublicFetchAssociationsBatchRequest)->withID(...)
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
     */
    public static function with(string $id, ?string $after = null): self
    {
        $obj = new self;

        $obj['id'] = $id;

        null !== $after && $obj['after'] = $after;

        return $obj;
    }

    /**
     * The unique identifier for the object whose associations are being fetched.
     */
    public function withID(string $id): self
    {
        $obj = clone $this;
        $obj['id'] = $id;

        return $obj;
    }

    /**
     * A paging cursor token used to retrieve the next set of results in a paginated response.
     */
    public function withAfter(string $after): self
    {
        $obj = clone $this;
        $obj['after'] = $after;

        return $obj;
    }
}
