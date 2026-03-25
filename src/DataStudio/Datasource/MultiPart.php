<?php

declare(strict_types=1);

namespace HubspotSDK\DataStudio\Datasource;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\Core\Conversion\ListOf;

/**
 * @phpstan-import-type ContentDispositionShape from \HubspotSDK\DataStudio\Datasource\ContentDisposition
 * @phpstan-import-type MediaTypeShape from \HubspotSDK\DataStudio\Datasource\MediaType
 * @phpstan-import-type ParameterizedHeaderShape from \HubspotSDK\DataStudio\Datasource\ParameterizedHeader
 *
 * @phpstan-type MultiPartShape = array{
 *   bodyParts: list<mixed>,
 *   contentDisposition: ContentDisposition|ContentDispositionShape,
 *   entity: mixed,
 *   headers: array<string,list<string>>,
 *   mediaType: MediaType|MediaTypeShape,
 *   messageBodyWorkers: mixed,
 *   parameterizedHeaders: array<string,list<ParameterizedHeader|ParameterizedHeaderShape>>,
 *   providers: mixed,
 *   parent?: MultiPart|null,
 * }
 */
final class MultiPart implements BaseModel
{
    /** @use SdkModel<MultiPartShape> */
    use SdkModel;

    /**
     * An array of BodyPart objects, each representing a distinct part of the multipart entity.
     *
     * @var list<mixed> $bodyParts
     */
    #[Required(list: BodyPart::class)]
    public array $bodyParts;

    #[Required]
    public ContentDisposition $contentDisposition;

    /**
     * An object that holds the main content or payload of the multipart entity.
     */
    #[Required]
    public mixed $entity;

    /**
     * An object containing a map of header names to their respective values, where each value is an array of strings.
     *
     * @var array<string,list<string>> $headers
     */
    #[Required(map: new ListOf('string'))]
    public array $headers;

    #[Required]
    public MediaType $mediaType;

    /**
     * An object that may contain workers for processing the message body, though its specific properties are not detailed.
     */
    #[Required]
    public mixed $messageBodyWorkers;

    /**
     * An object containing a map of header names to arrays of ParameterizedHeader objects, which include additional parameters for each header.
     *
     * @var array<string,list<ParameterizedHeader>> $parameterizedHeaders
     */
    #[Required(map: new ListOf(ParameterizedHeader::class))]
    public array $parameterizedHeaders;

    /**
     * An object that may contain providers related to the multipart entity, though its specific properties are not detailed.
     */
    #[Required]
    public mixed $providers;

    #[Optional]
    public ?MultiPart $parent;

    /**
     * `new MultiPart()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * MultiPart::with(
     *   bodyParts: ...,
     *   contentDisposition: ...,
     *   entity: ...,
     *   headers: ...,
     *   mediaType: ...,
     *   messageBodyWorkers: ...,
     *   parameterizedHeaders: ...,
     *   providers: ...,
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new MultiPart)
     *   ->withBodyParts(...)
     *   ->withContentDisposition(...)
     *   ->withEntity(...)
     *   ->withHeaders(...)
     *   ->withMediaType(...)
     *   ->withMessageBodyWorkers(...)
     *   ->withParameterizedHeaders(...)
     *   ->withProviders(...)
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
     * @param list<mixed> $bodyParts
     * @param ContentDisposition|ContentDispositionShape $contentDisposition
     * @param array<string,list<string>> $headers
     * @param MediaType|MediaTypeShape $mediaType
     * @param array<string,list<ParameterizedHeader|ParameterizedHeaderShape>> $parameterizedHeaders
     */
    public static function with(
        array $bodyParts,
        ContentDisposition|array $contentDisposition,
        mixed $entity,
        array $headers,
        MediaType|array $mediaType,
        mixed $messageBodyWorkers,
        array $parameterizedHeaders,
        mixed $providers,
        ?MultiPart $parent = null,
    ): self {
        $self = new self;

        $self['bodyParts'] = $bodyParts;
        $self['contentDisposition'] = $contentDisposition;
        $self['entity'] = $entity;
        $self['headers'] = $headers;
        $self['mediaType'] = $mediaType;
        $self['messageBodyWorkers'] = $messageBodyWorkers;
        $self['parameterizedHeaders'] = $parameterizedHeaders;
        $self['providers'] = $providers;

        null !== $parent && $self['parent'] = $parent;

        return $self;
    }

    /**
     * An array of BodyPart objects, each representing a distinct part of the multipart entity.
     *
     * @param list<mixed> $bodyParts
     */
    public function withBodyParts(array $bodyParts): self
    {
        $self = clone $this;
        $self['bodyParts'] = $bodyParts;

        return $self;
    }

    /**
     * @param ContentDisposition|ContentDispositionShape $contentDisposition
     */
    public function withContentDisposition(
        ContentDisposition|array $contentDisposition
    ): self {
        $self = clone $this;
        $self['contentDisposition'] = $contentDisposition;

        return $self;
    }

    /**
     * An object that holds the main content or payload of the multipart entity.
     */
    public function withEntity(mixed $entity): self
    {
        $self = clone $this;
        $self['entity'] = $entity;

        return $self;
    }

    /**
     * An object containing a map of header names to their respective values, where each value is an array of strings.
     *
     * @param array<string,list<string>> $headers
     */
    public function withHeaders(array $headers): self
    {
        $self = clone $this;
        $self['headers'] = $headers;

        return $self;
    }

    /**
     * @param MediaType|MediaTypeShape $mediaType
     */
    public function withMediaType(MediaType|array $mediaType): self
    {
        $self = clone $this;
        $self['mediaType'] = $mediaType;

        return $self;
    }

    /**
     * An object that may contain workers for processing the message body, though its specific properties are not detailed.
     */
    public function withMessageBodyWorkers(mixed $messageBodyWorkers): self
    {
        $self = clone $this;
        $self['messageBodyWorkers'] = $messageBodyWorkers;

        return $self;
    }

    /**
     * An object containing a map of header names to arrays of ParameterizedHeader objects, which include additional parameters for each header.
     *
     * @param array<string,list<ParameterizedHeader|ParameterizedHeaderShape>> $parameterizedHeaders
     */
    public function withParameterizedHeaders(array $parameterizedHeaders): self
    {
        $self = clone $this;
        $self['parameterizedHeaders'] = $parameterizedHeaders;

        return $self;
    }

    /**
     * An object that may contain providers related to the multipart entity, though its specific properties are not detailed.
     */
    public function withProviders(mixed $providers): self
    {
        $self = clone $this;
        $self['providers'] = $providers;

        return $self;
    }

    public function withParent(MultiPart $parent): self
    {
        $self = clone $this;
        $self['parent'] = $parent;

        return $self;
    }
}
