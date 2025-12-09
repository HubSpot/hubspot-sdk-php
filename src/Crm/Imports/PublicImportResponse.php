<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\Imports;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\Crm\Imports\ImportTemplate\TemplateType;
use HubspotSDK\Crm\Imports\PublicImportResponse\ImportSource;
use HubspotSDK\Crm\Imports\PublicImportResponse\State;

/**
 * @phpstan-type PublicImportResponseShape = array{
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
 * }
 */
final class PublicImportResponse implements BaseModel
{
    /** @use SdkModel<PublicImportResponseShape> */
    use SdkModel;

    #[Required]
    public string $id;

    #[Required]
    public \DateTimeInterface $createdAt;

    /** @var list<string> $mappedObjectTypeIDs */
    #[Required('mappedObjectTypeIds', list: 'string')]
    public array $mappedObjectTypeIDs;

    #[Required]
    public PublicImportMetadata $metadata;

    /**
     * Whether or not the import is a list of people disqualified from receiving emails.
     */
    #[Required]
    public bool $optOutImport;

    /**
     * The status of the import.
     *
     * @var value-of<State> $state
     */
    #[Required(enum: State::class)]
    public string $state;

    #[Required]
    public \DateTimeInterface $updatedAt;

    #[Optional]
    public ?string $importName;

    #[Optional]
    public mixed $importRequestJson;

    /** @var value-of<ImportSource>|null $importSource */
    #[Optional(enum: ImportSource::class)]
    public ?string $importSource;

    #[Optional]
    public ?ImportTemplate $importTemplate;

    /**
     * `new PublicImportResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * PublicImportResponse::with(
     *   id: ...,
     *   createdAt: ...,
     *   mappedObjectTypeIDs: ...,
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
     * @param list<string> $mappedObjectTypeIDs
     * @param PublicImportMetadata|array{
     *   counters: array<string,int>,
     *   fileIDs: list<string>,
     *   objectLists: list<PublicObjectListRecord>,
     * } $metadata
     * @param State|value-of<State> $state
     * @param ImportSource|value-of<ImportSource> $importSource
     * @param ImportTemplate|array{
     *   templateID: int, templateType: value-of<TemplateType>
     * } $importTemplate
     */
    public static function with(
        string $id,
        \DateTimeInterface $createdAt,
        array $mappedObjectTypeIDs,
        PublicImportMetadata|array $metadata,
        bool $optOutImport,
        State|string $state,
        \DateTimeInterface $updatedAt,
        ?string $importName = null,
        mixed $importRequestJson = null,
        ImportSource|string|null $importSource = null,
        ImportTemplate|array|null $importTemplate = null,
    ): self {
        $self = new self;

        $self['id'] = $id;
        $self['createdAt'] = $createdAt;
        $self['mappedObjectTypeIDs'] = $mappedObjectTypeIDs;
        $self['metadata'] = $metadata;
        $self['optOutImport'] = $optOutImport;
        $self['state'] = $state;
        $self['updatedAt'] = $updatedAt;

        null !== $importName && $self['importName'] = $importName;
        null !== $importRequestJson && $self['importRequestJson'] = $importRequestJson;
        null !== $importSource && $self['importSource'] = $importSource;
        null !== $importTemplate && $self['importTemplate'] = $importTemplate;

        return $self;
    }

    public function withID(string $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }

    public function withCreatedAt(\DateTimeInterface $createdAt): self
    {
        $self = clone $this;
        $self['createdAt'] = $createdAt;

        return $self;
    }

    /**
     * @param list<string> $mappedObjectTypeIDs
     */
    public function withMappedObjectTypeIDs(array $mappedObjectTypeIDs): self
    {
        $self = clone $this;
        $self['mappedObjectTypeIDs'] = $mappedObjectTypeIDs;

        return $self;
    }

    /**
     * @param PublicImportMetadata|array{
     *   counters: array<string,int>,
     *   fileIDs: list<string>,
     *   objectLists: list<PublicObjectListRecord>,
     * } $metadata
     */
    public function withMetadata(PublicImportMetadata|array $metadata): self
    {
        $self = clone $this;
        $self['metadata'] = $metadata;

        return $self;
    }

    /**
     * Whether or not the import is a list of people disqualified from receiving emails.
     */
    public function withOptOutImport(bool $optOutImport): self
    {
        $self = clone $this;
        $self['optOutImport'] = $optOutImport;

        return $self;
    }

    /**
     * The status of the import.
     *
     * @param State|value-of<State> $state
     */
    public function withState(State|string $state): self
    {
        $self = clone $this;
        $self['state'] = $state;

        return $self;
    }

    public function withUpdatedAt(\DateTimeInterface $updatedAt): self
    {
        $self = clone $this;
        $self['updatedAt'] = $updatedAt;

        return $self;
    }

    public function withImportName(string $importName): self
    {
        $self = clone $this;
        $self['importName'] = $importName;

        return $self;
    }

    public function withImportRequestJson(mixed $importRequestJson): self
    {
        $self = clone $this;
        $self['importRequestJson'] = $importRequestJson;

        return $self;
    }

    /**
     * @param ImportSource|value-of<ImportSource> $importSource
     */
    public function withImportSource(ImportSource|string $importSource): self
    {
        $self = clone $this;
        $self['importSource'] = $importSource;

        return $self;
    }

    /**
     * @param ImportTemplate|array{
     *   templateID: int, templateType: value-of<TemplateType>
     * } $importTemplate
     */
    public function withImportTemplate(
        ImportTemplate|array $importTemplate
    ): self {
        $self = clone $this;
        $self['importTemplate'] = $importTemplate;

        return $self;
    }
}
