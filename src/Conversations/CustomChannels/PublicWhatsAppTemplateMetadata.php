<?php

declare(strict_types=1);

namespace HubspotSDK\Conversations\CustomChannels;

use HubspotSDK\Conversations\CustomChannels\PublicWhatsAppTemplateMetadata\Type;
use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type PublicWhatsAppTemplateMetadataShape = array{
 *   crmObjectIds: array<string,int>,
 *   mappedTemplateId: string,
 *   parameters: array<string,string>,
 *   type: value-of<Type>,
 * }
 */
final class PublicWhatsAppTemplateMetadata implements BaseModel
{
    /** @use SdkModel<PublicWhatsAppTemplateMetadataShape> */
    use SdkModel;

    /** @var array<string,int> $crmObjectIds */
    #[Api(map: 'int')]
    public array $crmObjectIds;

    #[Api]
    public string $mappedTemplateId;

    /** @var array<string,string> $parameters */
    #[Api(map: 'string')]
    public array $parameters;

    /** @var value-of<Type> $type */
    #[Api(enum: Type::class)]
    public string $type;

    /**
     * `new PublicWhatsAppTemplateMetadata()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * PublicWhatsAppTemplateMetadata::with(
     *   crmObjectIds: ..., mappedTemplateId: ..., parameters: ..., type: ...
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
     * @param array<string,int> $crmObjectIds
     * @param array<string,string> $parameters
     * @param Type|value-of<Type> $type
     */
    public static function with(
        array $crmObjectIds,
        string $mappedTemplateId,
        array $parameters,
        Type|string $type = 'WHATSAPP_TEMPLATE_METADATA',
    ): self {
        $obj = new self;

        $obj->crmObjectIds = $crmObjectIds;
        $obj->mappedTemplateId = $mappedTemplateId;
        $obj->parameters = $parameters;
        $obj['type'] = $type;

        return $obj;
    }

    /**
     * @param array<string,int> $crmObjectIDs
     */
    public function withCrmObjectIDs(array $crmObjectIDs): self
    {
        $obj = clone $this;
        $obj->crmObjectIds = $crmObjectIDs;

        return $obj;
    }

    public function withMappedTemplateID(string $mappedTemplateID): self
    {
        $obj = clone $this;
        $obj->mappedTemplateId = $mappedTemplateID;

        return $obj;
    }

    /**
     * @param array<string,string> $parameters
     */
    public function withParameters(array $parameters): self
    {
        $obj = clone $this;
        $obj->parameters = $parameters;

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
