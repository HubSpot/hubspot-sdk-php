<?php

declare(strict_types=1);

namespace HubspotSDK\Cms\MediaBridge;

use HubspotSDK\Cms\MediaBridge\Property1\DataSensitivity;
use HubspotSDK\Cms\MediaBridge\Property1\DateDisplayHint;
use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\PropertyModificationMetadata;

/**
 * @phpstan-type CollectionResponsePropertyNoPagingShape = array{
 *   results: list<Property1>
 * }
 */
final class CollectionResponsePropertyNoPaging implements BaseModel
{
    /** @use SdkModel<CollectionResponsePropertyNoPagingShape> */
    use SdkModel;

    /** @var list<Property1> $results */
    #[Api(list: Property1::class)]
    public array $results;

    /**
     * `new CollectionResponsePropertyNoPaging()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * CollectionResponsePropertyNoPaging::with(results: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new CollectionResponsePropertyNoPaging)->withResults(...)
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
     * @param list<Property1|array{
     *   description: string,
     *   fieldType: string,
     *   groupName: string,
     *   label: string,
     *   name: string,
     *   options: list<Option1>,
     *   type: string,
     *   archived?: bool|null,
     *   archivedAt?: \DateTimeInterface|null,
     *   calculated?: bool|null,
     *   calculationFormula?: string|null,
     *   createdAt?: \DateTimeInterface|null,
     *   createdUserId?: string|null,
     *   dataSensitivity?: value-of<DataSensitivity>|null,
     *   dateDisplayHint?: value-of<DateDisplayHint>|null,
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
    public static function with(array $results): self
    {
        $obj = new self;

        $obj['results'] = $results;

        return $obj;
    }

    /**
     * @param list<Property1|array{
     *   description: string,
     *   fieldType: string,
     *   groupName: string,
     *   label: string,
     *   name: string,
     *   options: list<Option1>,
     *   type: string,
     *   archived?: bool|null,
     *   archivedAt?: \DateTimeInterface|null,
     *   calculated?: bool|null,
     *   calculationFormula?: string|null,
     *   createdAt?: \DateTimeInterface|null,
     *   createdUserId?: string|null,
     *   dataSensitivity?: value-of<DataSensitivity>|null,
     *   dateDisplayHint?: value-of<DateDisplayHint>|null,
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
}
