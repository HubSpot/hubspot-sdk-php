<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\Imports;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkResponse;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\Core\Conversion\Contracts\ResponseConverter;
use HubspotSDK\Crm\Imports\ImportTemplate\TemplateType;
use HubspotSDK\Crm\Imports\PublicImportResponse\ImportSource;
use HubspotSDK\Crm\Imports\PublicImportResponse\State;

/**
 * @phpstan-type PublicImportResponseShape = array{
 *   id: string,
 *   createdAt: \DateTimeInterface,
 *   mappedObjectTypeIds: list<string>,
 *   metadata: PublicImportMetadata,
 *   optOutImport: bool,
 *   state: value-of<State>,
 *   updatedAt: \DateTimeInterface,
 *   importName?: string|null,
 *   importRequestJson?: mixed,
 *   importSource?: value-of<ImportSource>|null,
 *   importTemplate?: ImportTemplate|null,
 * }
 */
final class PublicImportResponse implements BaseModel, ResponseConverter
{
    /** @use SdkModel<PublicImportResponseShape> */
    use SdkModel;

    use SdkResponse;

    #[Api]
    public string $id;

    #[Api]
    public \DateTimeInterface $createdAt;

    /** @var list<string> $mappedObjectTypeIds */
    #[Api(list: 'string')]
    public array $mappedObjectTypeIds;

    #[Api]
    public PublicImportMetadata $metadata;

    /**
     * Whether or not the import is a list of people disqualified from receiving emails.
     */
    #[Api]
    public bool $optOutImport;

    /**
     * The status of the import.
     *
     * @var value-of<State> $state
     */
    #[Api(enum: State::class)]
    public string $state;

    #[Api]
    public \DateTimeInterface $updatedAt;

    #[Api(optional: true)]
    public ?string $importName;

    #[Api(optional: true)]
    public mixed $importRequestJson;

    /** @var value-of<ImportSource>|null $importSource */
    #[Api(enum: ImportSource::class, optional: true)]
    public ?string $importSource;

    #[Api(optional: true)]
    public ?ImportTemplate $importTemplate;

    /**
     * `new PublicImportResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * PublicImportResponse::with(
     *   id: ...,
     *   createdAt: ...,
     *   mappedObjectTypeIds: ...,
     *   metadata: ...,
     *   optOutImport: ...,
     *   state: ...,
     *   updatedAt: ...,
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new PublicImportResponse)
     *   ->withID(...)
     *   ->withCreatedAt(...)
     *   ->withMappedObjectTypeIDs(...)
     *   ->withMetadata(...)
     *   ->withOptOutImport(...)
     *   ->withState(...)
     *   ->withUpdatedAt(...)
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
     * @param list<string> $mappedObjectTypeIds
     * @param PublicImportMetadata|array{
     *   counters: array<string,int>,
     *   fileIds: list<string>,
     *   objectLists: list<PublicObjectListRecord>,
     * } $metadata
     * @param State|value-of<State> $state
     * @param ImportSource|value-of<ImportSource> $importSource
     * @param ImportTemplate|array{
     *   templateId: int, templateType: value-of<TemplateType>
     * } $importTemplate
     */
    public static function with(
        string $id,
        \DateTimeInterface $createdAt,
        array $mappedObjectTypeIds,
        PublicImportMetadata|array $metadata,
        bool $optOutImport,
        State|string $state,
        \DateTimeInterface $updatedAt,
        ?string $importName = null,
        mixed $importRequestJson = null,
        ImportSource|string|null $importSource = null,
        ImportTemplate|array|null $importTemplate = null,
    ): self {
        $obj = new self;

        $obj['id'] = $id;
        $obj['createdAt'] = $createdAt;
        $obj['mappedObjectTypeIds'] = $mappedObjectTypeIds;
        $obj['metadata'] = $metadata;
        $obj['optOutImport'] = $optOutImport;
        $obj['state'] = $state;
        $obj['updatedAt'] = $updatedAt;

        null !== $importName && $obj['importName'] = $importName;
        null !== $importRequestJson && $obj['importRequestJson'] = $importRequestJson;
        null !== $importSource && $obj['importSource'] = $importSource;
        null !== $importTemplate && $obj['importTemplate'] = $importTemplate;

        return $obj;
    }

    public function withID(string $id): self
    {
        $obj = clone $this;
        $obj['id'] = $id;

        return $obj;
    }

    public function withCreatedAt(\DateTimeInterface $createdAt): self
    {
        $obj = clone $this;
        $obj['createdAt'] = $createdAt;

        return $obj;
    }

    /**
     * @param list<string> $mappedObjectTypeIDs
     */
    public function withMappedObjectTypeIDs(array $mappedObjectTypeIDs): self
    {
        $obj = clone $this;
        $obj['mappedObjectTypeIds'] = $mappedObjectTypeIDs;

        return $obj;
    }

    /**
     * @param PublicImportMetadata|array{
     *   counters: array<string,int>,
     *   fileIds: list<string>,
     *   objectLists: list<PublicObjectListRecord>,
     * } $metadata
     */
    public function withMetadata(PublicImportMetadata|array $metadata): self
    {
        $obj = clone $this;
        $obj['metadata'] = $metadata;

        return $obj;
    }

    /**
     * Whether or not the import is a list of people disqualified from receiving emails.
     */
    public function withOptOutImport(bool $optOutImport): self
    {
        $obj = clone $this;
        $obj['optOutImport'] = $optOutImport;

        return $obj;
    }

    /**
     * The status of the import.
     *
     * @param State|value-of<State> $state
     */
    public function withState(State|string $state): self
    {
        $obj = clone $this;
        $obj['state'] = $state;

        return $obj;
    }

    public function withUpdatedAt(\DateTimeInterface $updatedAt): self
    {
        $obj = clone $this;
        $obj['updatedAt'] = $updatedAt;

        return $obj;
    }

    public function withImportName(string $importName): self
    {
        $obj = clone $this;
        $obj['importName'] = $importName;

        return $obj;
    }

    public function withImportRequestJson(mixed $importRequestJson): self
    {
        $obj = clone $this;
        $obj['importRequestJson'] = $importRequestJson;

        return $obj;
    }

    /**
     * @param ImportSource|value-of<ImportSource> $importSource
     */
    public function withImportSource(ImportSource|string $importSource): self
    {
        $obj = clone $this;
        $obj['importSource'] = $importSource;

        return $obj;
    }

    /**
     * @param ImportTemplate|array{
     *   templateId: int, templateType: value-of<TemplateType>
     * } $importTemplate
     */
    public function withImportTemplate(
        ImportTemplate|array $importTemplate
    ): self {
        $obj = clone $this;
        $obj['importTemplate'] = $importTemplate;

        return $obj;
    }
}
