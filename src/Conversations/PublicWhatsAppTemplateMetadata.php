<?php

declare(strict_types=1);

namespace HubspotSDK\Conversations;

use HubspotSDK\Conversations\PublicWhatsAppTemplateMetadata\Type;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type PublicWhatsAppTemplateMetadataShape = array{
 *   crmObjectIDs: array<string,int>,
 *   mappedTemplateID: string,
 *   parameters: array<string,string>,
 *   type: value-of<Type>,
 * }
 */
final class PublicWhatsAppTemplateMetadata implements BaseModel
{
    /** @use SdkModel<PublicWhatsAppTemplateMetadataShape> */
    use SdkModel;

    /** @var array<string,int> $crmObjectIDs */
    #[Required('crmObjectIds', map: 'int')]
    public array $crmObjectIDs;

    #[Required('mappedTemplateId')]
    public string $mappedTemplateID;

    /** @var array<string,string> $parameters */
    #[Required(map: 'string')]
    public array $parameters;

    /** @var value-of<Type> $type */
    #[Required(enum: Type::class)]
    public string $type;

    /**
     * `new PublicWhatsAppTemplateMetadata()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * PublicWhatsAppTemplateMetadata::with(
     *   crmObjectIDs: ..., mappedTemplateID: ..., parameters: ..., type: ...
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new PublicWhatsAppTemplateMetadata)
     *   ->withCrmObjectIDs(...)
     *   ->withMappedTemplateID(...)
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
        string $mappedTemplateID,
        array $parameters,
        Type|string $type = 'WHATSAPP_TEMPLATE_METADATA',
    ): self {
        $obj = new self;

        $obj['crmObjectIDs'] = $crmObjectIDs;
        $obj['mappedTemplateID'] = $mappedTemplateID;
        $obj['parameters'] = $parameters;
        $obj['type'] = $type;

        return $obj;
    }

    /**
     * @param array<string,int> $crmObjectIDs
     */
    public function withCrmObjectIDs(array $crmObjectIDs): self
    {
        $obj = clone $this;
        $obj['crmObjectIDs'] = $crmObjectIDs;

        return $obj;
    }

    public function withMappedTemplateID(string $mappedTemplateID): self
    {
        $obj = clone $this;
        $obj['mappedTemplateID'] = $mappedTemplateID;

        return $obj;
    }

    /**
     * @param array<string,string> $parameters
     */
    public function withParameters(array $parameters): self
    {
        $obj = clone $this;
        $obj['parameters'] = $parameters;

        return $obj;
    }

    /**
     * @param Type|value-of<Type> $type
     */
    public function withType(Type|string $type): self
    {
        $obj = clone $this;
        $obj['type'] = $type;

        return $obj;
    }
}
