<?php

declare(strict_types=1);

namespace HubspotSDK\Automation\Actions;

use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type PublicActionDefinitionShape from \HubspotSDK\Automation\Actions\PublicActionDefinition
 *
 * @phpstan-type PublicActionRevisionShape = array{
 *   id: string,
 *   createdAt: \DateTimeInterface,
 *   definition: PublicActionDefinition|PublicActionDefinitionShape,
 *   revisionID: string,
 * }
 */
final class PublicActionRevision implements BaseModel
{
    /** @use SdkModel<PublicActionRevisionShape> */
    use SdkModel;

    #[Required]
    public string $id;

    #[Required]
    public \DateTimeInterface $createdAt;

    #[Required]
    public PublicActionDefinition $definition;

    #[Required('revisionId')]
    public string $revisionID;

    /**
     * `new PublicActionRevision()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * PublicActionRevision::with(
     *   id: ..., createdAt: ..., definition: ..., revisionID: ...
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new PublicActionRevision)
     *   ->withID(...)
     *   ->withCreatedAt(...)
     *   ->withDefinition(...)
     *   ->withRevisionID(...)
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
     * @param PublicActionDefinitionShape $definition
     */
    public static function with(
        string $id,
        \DateTimeInterface $createdAt,
        PublicActionDefinition|array $definition,
        string $revisionID,
    ): self {
        $self = new self;

        $self['id'] = $id;
        $self['createdAt'] = $createdAt;
        $self['definition'] = $definition;
        $self['revisionID'] = $revisionID;

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
     * @param PublicActionDefinitionShape $definition
     */
    public function withDefinition(
        PublicActionDefinition|array $definition
    ): self {
        $self = clone $this;
        $self['definition'] = $definition;

        return $self;
    }

    public function withRevisionID(string $revisionID): self
    {
        $self = clone $this;
        $self['revisionID'] = $revisionID;

        return $self;
    }
}
