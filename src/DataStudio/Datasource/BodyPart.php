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
 * @phpstan-type BodyPartShape = array{
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
final class BodyPart implements BaseModel
{
    /** @use SdkModel<BodyPartShape> */
    use SdkModel;

    #[Required]
    public ContentDisposition $contentDisposition;

    /**
     * An object representing the actual content or payload of the body part.
     */
    #[Required]
    public mixed $entity;

    /**
     * An object containing the headers associated with this body part, where each header can have multiple string values.
     *
     * @var array<string,list<string>> $headers
     */
    #[Required(map: new ListOf('string'))]
    public array $headers;

    #[Required]
    public MediaType $mediaType;

    /**
     * An object representing workers that handle the processing of the message body.
     */
    #[Required]
    public mixed $messageBodyWorkers;

    /**
     * An object containing headers with parameters, where each header can have multiple ParameterizedHeader objects.
     *
     * @var array<string,list<ParameterizedHeader>> $parameterizedHeaders
     */
    #[Required(map: new ListOf(ParameterizedHeader::class))]
    public array $parameterizedHeaders;

    /**
     * An object representing providers that supply additional handling or processing for the body part.
     */
    #[Required]
    public mixed $providers;

    #[Optional]
    public ?MultiPart $parent;

    /**
     * `new BodyPart()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * BodyPart::with(
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
     * (new BodyPart)
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
     * @param ContentDisposition|ContentDispositionShape $contentDisposition
     * @param array<string,list<string>> $headers
     * @param MediaType|MediaTypeShape $mediaType
     * @param array<string,list<ParameterizedHeader|ParameterizedHeaderShape>> $parameterizedHeaders
     */
    public static function with(
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
     * An object representing the actual content or payload of the body part.
     */
    public function withEntity(mixed $entity): self
    {
        $self = clone $this;
        $self['entity'] = $entity;

        return $self;
    }

    /**
     * An object containing the headers associated with this body part, where each header can have multiple string values.
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
     * An object representing workers that handle the processing of the message body.
     */
    public function withMessageBodyWorkers(mixed $messageBodyWorkers): self
    {
        $self = clone $this;
        $self['messageBodyWorkers'] = $messageBodyWorkers;

        return $self;
    }

    /**
     * An object containing headers with parameters, where each header can have multiple ParameterizedHeader objects.
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
     * An object representing providers that supply additional handling or processing for the body part.
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
