<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\Properties;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkResponse;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\Core\Conversion\Contracts\ResponseConverter;
use HubspotSDK\NextPage;
use HubspotSDK\Option;
use HubspotSDK\Paging;
use HubspotSDK\PreviousPage;
use HubspotSDK\Property;
use HubspotSDK\Property\DataSensitivity;
use HubspotSDK\PropertyModificationMetadata;

/**
 * @phpstan-type CollectionResponsePropertyShape = array{
 *   results: list<Property>, paging?: Paging|null
 * }
 */
final class CollectionResponseProperty implements BaseModel, ResponseConverter
{
    /** @use SdkModel<CollectionResponsePropertyShape> */
    use SdkModel;

    use SdkResponse;

    /** @var list<Property> $results */
    #[Api(list: Property::class)]
    public array $results;

    #[Api(optional: true)]
    public ?Paging $paging;

    /**
     * `new CollectionResponseProperty()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * CollectionResponseProperty::with(results: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new CollectionResponseProperty)->withResults(...)
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
     * @param list<Property|array{
     *   description: string,
     *   fieldType: string,
     *   groupName: string,
     *   label: string,
     *   name: string,
     *   options: list<Option>,
     *   type: string,
     *   archived?: bool|null,
     *   archivedAt?: \DateTimeInterface|null,
     *   calculated?: bool|null,
     *   calculationFormula?: string|null,
     *   createdAt?: \DateTimeInterface|null,
     *   createdUserId?: string|null,
     *   dataSensitivity?: value-of<DataSensitivity>|null,
     *   displayOrder?: int|null,
     *   externalOptions?: bool|null,
     *   formField?: bool|null,
     *   hasUniqueValue?: bool|null,
     *   hidden?: bool|null,
     *   hubspotDefined?: bool|null,
     *   modificationMetadata?: PropertyModificationMetadata|null,
     *   referencedObjectType?: string|null,
     *   sensitiveDataCategories?: list<string>|null,
     *   showCurrencySymbol?: bool|null,
     *   updatedAt?: \DateTimeInterface|null,
     *   updatedUserId?: string|null,
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
     * @param list<Property|array{
     *   description: string,
     *   fieldType: string,
     *   groupName: string,
     *   label: string,
     *   name: string,
     *   options: list<Option>,
     *   type: string,
     *   archived?: bool|null,
     *   archivedAt?: \DateTimeInterface|null,
     *   calculated?: bool|null,
     *   calculationFormula?: string|null,
     *   createdAt?: \DateTimeInterface|null,
     *   createdUserId?: string|null,
     *   dataSensitivity?: value-of<DataSensitivity>|null,
     *   displayOrder?: int|null,
     *   externalOptions?: bool|null,
     *   formField?: bool|null,
     *   hasUniqueValue?: bool|null,
     *   hidden?: bool|null,
     *   hubspotDefined?: bool|null,
     *   modificationMetadata?: PropertyModificationMetadata|null,
     *   referencedObjectType?: string|null,
     *   sensitiveDataCategories?: list<string>|null,
     *   showCurrencySymbol?: bool|null,
     *   updatedAt?: \DateTimeInterface|null,
     *   updatedUserId?: string|null,
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
