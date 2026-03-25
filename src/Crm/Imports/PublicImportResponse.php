<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\Imports;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\Crm\Imports\PublicImportResponse\ImportSource;
use HubspotSDK\Crm\Imports\PublicImportResponse\State;

/**
 * @phpstan-import-type PublicImportMetadataShape from \HubspotSDK\Crm\Imports\PublicImportMetadata
 * @phpstan-import-type ImportTemplateShape from \HubspotSDK\Crm\Imports\ImportTemplate
 *
 * @phpstan-type PublicImportResponseShape = array{
 *   id: string,
 *   createdAt: \DateTimeInterface,
 *   mappedObjectTypeIDs: list<string>,
 *   metadata: PublicImportMetadata|PublicImportMetadataShape,
 *   optOutImport: bool,
 *   state: State|value-of<State>,
 *   updatedAt: \DateTimeInterface,
 *   importName?: string|null,
 *   importRequestJson?: mixed,
 *   importSource?: null|ImportSource|value-of<ImportSource>,
 *   importTemplate?: null|ImportTemplate|ImportTemplateShape,
 * }
 */
final class PublicImportResponse implements BaseModel
{
    /** @use SdkModel<PublicImportResponseShape> */
    use SdkModel;

    /**
     * The unique identifier for this import.
     */
    #[Required]
    public string $id;

    /**
     * The timestamp when the object was created, in ISO 8601 format.
     */
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

    /**
     * The timestamp when the import record was last updated, formatted as an ISO 8601 instant.
     */
    #[Required]
    public \DateTimeInterface $updatedAt;

    /**
     * The user-provided name for this import.
     */
    #[Optional]
    public ?string $importName;

    /**
     * The complete import request configuration as a JSON object.
     */
    #[Optional]
    public mixed $importRequestJson;

    /**
     * Indicates where/how the import was initiated.
     *
     * @var value-of<ImportSource>|null $importSource
     */
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
     * @param PublicImportMetadata|PublicImportMetadataShape $metadata
     * @param State|value-of<State> $state
     * @param ImportSource|value-of<ImportSource>|null $importSource
     * @param ImportTemplate|ImportTemplateShape|null $importTemplate
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

    /**
     * The unique identifier for this import.
     */
    public function withID(string $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }

    /**
     * The timestamp when the object was created, in ISO 8601 format.
     */
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
     * @param PublicImportMetadata|PublicImportMetadataShape $metadata
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

    /**
     * The timestamp when the import record was last updated, formatted as an ISO 8601 instant.
     */
    public function withUpdatedAt(\DateTimeInterface $updatedAt): self
    {
        $self = clone $this;
        $self['updatedAt'] = $updatedAt;

        return $self;
    }

    /**
     * The user-provided name for this import.
     */
    public function withImportName(string $importName): self
    {
        $self = clone $this;
        $self['importName'] = $importName;

        return $self;
    }

    /**
     * The complete import request configuration as a JSON object.
     */
    public function withImportRequestJson(mixed $importRequestJson): self
    {
        $self = clone $this;
        $self['importRequestJson'] = $importRequestJson;

        return $self;
    }

    /**
     * Indicates where/how the import was initiated.
     *
     * @param ImportSource|value-of<ImportSource> $importSource
     */
    public function withImportSource(ImportSource|string $importSource): self
    {
        $self = clone $this;
        $self['importSource'] = $importSource;

        return $self;
    }

    /**
     * @param ImportTemplate|ImportTemplateShape $importTemplate
     */
    public function withImportTemplate(
        ImportTemplate|array $importTemplate
    ): self {
        $self = clone $this;
        $self['importTemplate'] = $importTemplate;

        return $self;
    }
}
