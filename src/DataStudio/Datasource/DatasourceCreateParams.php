<?php

declare(strict_types=1);

namespace HubspotSDK\DataStudio\Datasource;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\Core\Conversion\ListOf;

/**
 * @see HubspotSDK\Services\DataStudio\DatasourceService::create()
 *
 * @phpstan-import-type ContentDispositionShape from \HubspotSDK\DataStudio\Datasource\ContentDisposition
 * @phpstan-import-type MediaTypeShape from \HubspotSDK\DataStudio\Datasource\MediaType
 * @phpstan-import-type ParameterizedHeaderShape from \HubspotSDK\DataStudio\Datasource\ParameterizedHeader
 * @phpstan-import-type MultiPartShape from \HubspotSDK\DataStudio\Datasource\MultiPart
 *
 * @phpstan-type DatasourceCreateParamsShape = array{
 *   bodyParts: list<mixed>,
 *   contentDisposition: ContentDisposition|ContentDispositionShape,
 *   entity: mixed,
 *   fields: array<string,mixed>,
 *   headers: array<string,list<string>>,
 *   mediaType: MediaType|MediaTypeShape,
 *   messageBodyWorkers: mixed,
 *   parameterizedHeaders: array<string,list<ParameterizedHeader|ParameterizedHeaderShape>>,
 *   providers: mixed,
 *   parent?: null|MultiPart|MultiPartShape,
 * }
 */
final class DatasourceCreateParams implements BaseModel
{
    /** @use SdkModel<DatasourceCreateParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * An array of BodyPart objects, each representing a part of the multipart form data.
     *
     * @var list<mixed> $bodyParts
     */
    #[Required(list: BodyPart::class)]
    public array $bodyParts;

    #[Required]
    public ContentDisposition $contentDisposition;

    /**
     * An object representing the entity of the multipart form data, containing the actual data to be processed.
     */
    #[Required]
    public mixed $entity;

    /**
     * An object containing fields of the multipart form data, where each field can have multiple FormDataBodyPart items.
     *
     * @var array<string,mixed> $fields
     */
    #[Required(map: new ListOf(FormDataBodyPart::class))]
    public array $fields;

    /**
     * An object containing headers associated with the multipart form data, where each header can have multiple string values.
     *
     * @var array<string,list<string>> $headers
     */
    #[Required(map: new ListOf('string'))]
    public array $headers;

    #[Required]
    public MediaType $mediaType;

    /**
     * An object representing workers that process the message body of the multipart form data.
     */
    #[Required]
    public mixed $messageBodyWorkers;

    /**
     * An object containing parameterized headers, where each header can have multiple ParameterizedHeader items.
     *
     * @var array<string,list<ParameterizedHeader>> $parameterizedHeaders
     */
    #[Required(map: new ListOf(ParameterizedHeader::class))]
    public array $parameterizedHeaders;

    /**
     * An object representing providers associated with the multipart form data.
     */
    #[Required]
    public mixed $providers;

    #[Optional]
    public ?MultiPart $parent;

    /**
     * `new DatasourceCreateParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * DatasourceCreateParams::with(
     *   bodyParts: ...,
     *   contentDisposition: ...,
     *   entity: ...,
     *   fields: ...,
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
     * (new DatasourceCreateParams)
     *   ->withBodyParts(...)
     *   ->withContentDisposition(...)
     *   ->withEntity(...)
     *   ->withFields(...)
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
     * @param array<string,mixed> $fields
     * @param array<string,list<string>> $headers
     * @param MediaType|MediaTypeShape $mediaType
     * @param array<string,list<ParameterizedHeader|ParameterizedHeaderShape>> $parameterizedHeaders
     * @param MultiPart|MultiPartShape|null $parent
     */
    public static function with(
        array $bodyParts,
        ContentDisposition|array $contentDisposition,
        mixed $entity,
        array $fields,
        array $headers,
        MediaType|array $mediaType,
        mixed $messageBodyWorkers,
        array $parameterizedHeaders,
        mixed $providers,
        MultiPart|array|null $parent = null,
    ): self {
        $self = new self;

        $self['bodyParts'] = $bodyParts;
        $self['contentDisposition'] = $contentDisposition;
        $self['entity'] = $entity;
        $self['fields'] = $fields;
        $self['headers'] = $headers;
        $self['mediaType'] = $mediaType;
        $self['messageBodyWorkers'] = $messageBodyWorkers;
        $self['parameterizedHeaders'] = $parameterizedHeaders;
        $self['providers'] = $providers;

        null !== $parent && $self['parent'] = $parent;

        return $self;
    }

    /**
     * An array of BodyPart objects, each representing a part of the multipart form data.
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
     * An object representing the entity of the multipart form data, containing the actual data to be processed.
     */
    public function withEntity(mixed $entity): self
    {
        $self = clone $this;
        $self['entity'] = $entity;

        return $self;
    }

    /**
     * An object containing fields of the multipart form data, where each field can have multiple FormDataBodyPart items.
     *
     * @param array<string,mixed> $fields
     */
    public function withFields(array $fields): self
    {
        $self = clone $this;
        $self['fields'] = $fields;

        return $self;
    }

    /**
     * An object containing headers associated with the multipart form data, where each header can have multiple string values.
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
     * An object representing workers that process the message body of the multipart form data.
     */
    public function withMessageBodyWorkers(mixed $messageBodyWorkers): self
    {
        $self = clone $this;
        $self['messageBodyWorkers'] = $messageBodyWorkers;

        return $self;
    }

    /**
     * An object containing parameterized headers, where each header can have multiple ParameterizedHeader items.
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
     * An object representing providers associated with the multipart form data.
     */
    public function withProviders(mixed $providers): self
    {
        $self = clone $this;
        $self['providers'] = $providers;

        return $self;
    }

    /**
     * @param MultiPart|MultiPartShape $parent
     */
    public function withParent(MultiPart|array $parent): self
    {
        $self = clone $this;
        $self['parent'] = $parent;

        return $self;
    }
}
