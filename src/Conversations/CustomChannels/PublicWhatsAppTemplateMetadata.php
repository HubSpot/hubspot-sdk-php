<?php

declare(strict_types=1);

namespace HubSpotSDK\Conversations\CustomChannels;

use HubSpotSDK\Conversations\CustomChannels\PublicWhatsAppTemplateMetadata\Type;
use HubSpotSDK\Core\Attributes\Optional;
use HubSpotSDK\Core\Attributes\Required;
use HubSpotSDK\Core\Concerns\SdkModel;
use HubSpotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type PublicWhatsAppTemplateMetadataShape = array{
 *   crmObjectIDs: array<string,int>,
 *   parameters: array<string,string>,
 *   type: Type|value-of<Type>,
 *   contentID?: int|null,
 *   mappedTemplateID?: int|null,
 *   rootMicID?: int|null,
 * }
 */
final class PublicWhatsAppTemplateMetadata implements BaseModel
{
    /** @use SdkModel<PublicWhatsAppTemplateMetadataShape> */
    use SdkModel;

    /** @var array<string,int> $crmObjectIDs */
    #[Required('crmObjectIds', map: 'int')]
    public array $crmObjectIDs;

    /** @var array<string,string> $parameters */
    #[Required(map: 'string')]
    public array $parameters;

    /** @var value-of<Type> $type */
    #[Required(enum: Type::class)]
    public string $type;

    #[Optional('contentId')]
    public ?int $contentID;

    #[Optional('mappedTemplateId')]
    public ?int $mappedTemplateID;

    #[Optional('rootMicId')]
    public ?int $rootMicID;

    /**
     * `new PublicWhatsAppTemplateMetadata()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * PublicWhatsAppTemplateMetadata::with(
     *   crmObjectIDs: ..., parameters: ..., type: ...
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new PublicWhatsAppTemplateMetadata)
     *   ->withCrmObjectIDs(...)
     *   ->withParameters(...)
     *   ->withType(...)
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
     * @param array<string,int> $crmObjectIDs
     * @param array<string,string> $parameters
     * @param Type|value-of<Type> $type
     */
    public static function with(
        array $crmObjectIDs,
        array $parameters,
        Type|string $type = 'WHATSAPP_TEMPLATE_METADATA',
        ?int $contentID = null,
        ?int $mappedTemplateID = null,
        ?int $rootMicID = null,
    ): self {
        $self = new self;

        $self['crmObjectIDs'] = $crmObjectIDs;
        $self['parameters'] = $parameters;
        $self['type'] = $type;

        null !== $contentID && $self['contentID'] = $contentID;
        null !== $mappedTemplateID && $self['mappedTemplateID'] = $mappedTemplateID;
        null !== $rootMicID && $self['rootMicID'] = $rootMicID;

        return $self;
    }

    /**
     * @param array<string,int> $crmObjectIDs
     */
    public function withCrmObjectIDs(array $crmObjectIDs): self
    {
        $self = clone $this;
        $self['crmObjectIDs'] = $crmObjectIDs;

        return $self;
    }

    /**
     * @param array<string,string> $parameters
     */
    public function withParameters(array $parameters): self
    {
        $self = clone $this;
        $self['parameters'] = $parameters;

        return $self;
    }

    /**
     * @param Type|value-of<Type> $type
     */
    public function withType(Type|string $type): self
    {
        $self = clone $this;
        $self['type'] = $type;

        return $self;
    }

    public function withContentID(int $contentID): self
    {
        $self = clone $this;
        $self['contentID'] = $contentID;

        return $self;
    }

    public function withMappedTemplateID(int $mappedTemplateID): self
    {
        $self = clone $this;
        $self['mappedTemplateID'] = $mappedTemplateID;

        return $self;
    }

    public function withRootMicID(int $rootMicID): self
    {
        $self = clone $this;
        $self['rootMicID'] = $rootMicID;

        return $self;
    }
}
