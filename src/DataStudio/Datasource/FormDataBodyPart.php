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
 * @phpstan-import-type FormDataContentDispositionShape from \HubspotSDK\DataStudio\Datasource\FormDataContentDisposition
 * @phpstan-import-type MediaTypeShape from \HubspotSDK\DataStudio\Datasource\MediaType
 * @phpstan-import-type ParameterizedHeaderShape from \HubspotSDK\DataStudio\Datasource\ParameterizedHeader
 * @phpstan-import-type MultiPartShape from \HubspotSDK\DataStudio\Datasource\MultiPart
 *
 * @phpstan-type FormDataBodyPartShape = array{
 *   contentDisposition: ContentDisposition|ContentDispositionShape,
 *   entity: mixed,
 *   formDataContentDisposition: FormDataContentDisposition|FormDataContentDispositionShape,
 *   headers: array<string,list<string>>,
 *   mediaType: MediaType|MediaTypeShape,
 *   messageBodyWorkers: mixed,
 *   name: string,
 *   parameterizedHeaders: array<string,list<ParameterizedHeader|ParameterizedHeaderShape>>,
 *   providers: mixed,
 *   simple: bool,
 *   value: string,
 *   parent?: null|MultiPart|MultiPartShape,
 * }
 */
final class FormDataBodyPart implements BaseModel
{
    /** @use SdkModel<FormDataBodyPartShape> */
    use SdkModel;

    #[Required]
    public ContentDisposition $contentDisposition;

    /**
     * An object representing the entity of the form data part, which contains the actual data being submitted.
     */
    #[Required]
    public mixed $entity;

    #[Required]
    public FormDataContentDisposition $formDataContentDisposition;

    /**
     * An object containing the headers associated with this form data part, where each header can have multiple string values.
     *
     * @var array<string,list<string>> $headers
     */
    #[Required(map: new ListOf('string'))]
    public array $headers;

    #[Required]
    public MediaType $mediaType;

    /**
     * An object representing the message body workers, which are responsible for processing the body of the message.
     */
    #[Required]
    public mixed $messageBodyWorkers;

    /**
     * The name of the form data part, typically used to identify the part within the multipart request.
     */
    #[Required]
    public string $name;

    /**
     * An object containing parameterized headers, where each header can have multiple values represented as ParameterizedHeader objects.
     *
     * @var array<string,list<ParameterizedHeader>> $parameterizedHeaders
     */
    #[Required(map: new ListOf(ParameterizedHeader::class))]
    public array $parameterizedHeaders;

    /**
     * An object representing the providers associated with this form data part.
     */
    #[Required]
    public mixed $providers;

    /**
     * A boolean indicating whether the form data part is simple, typically meaning it does not contain complex nested structures.
     */
    #[Required]
    public bool $simple;

    /**
     * The string value of the form data part, representing the actual data being submitted as a string.
     */
    #[Required]
    public string $value;

    #[Optional]
    public ?MultiPart $parent;

    /**
     * `new FormDataBodyPart()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * FormDataBodyPart::with(
     *   contentDisposition: ...,
     *   entity: ...,
     *   formDataContentDisposition: ...,
     *   headers: ...,
     *   mediaType: ...,
     *   messageBodyWorkers: ...,
     *   name: ...,
     *   parameterizedHeaders: ...,
     *   providers: ...,
     *   simple: ...,
     *   value: ...,
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new FormDataBodyPart)
     *   ->withContentDisposition(...)
     *   ->withEntity(...)
     *   ->withFormDataContentDisposition(...)
     *   ->withHeaders(...)
     *   ->withMediaType(...)
     *   ->withMessageBodyWorkers(...)
     *   ->withName(...)
     *   ->withParameterizedHeaders(...)
     *   ->withProviders(...)
     *   ->withSimple(...)
     *   ->withValue(...)
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
     * @param FormDataContentDisposition|FormDataContentDispositionShape $formDataContentDisposition
     * @param array<string,list<string>> $headers
     * @param MediaType|MediaTypeShape $mediaType
     * @param array<string,list<ParameterizedHeader|ParameterizedHeaderShape>> $parameterizedHeaders
     * @param MultiPart|MultiPartShape|null $parent
     */
    public static function with(
        ContentDisposition|array $contentDisposition,
        mixed $entity,
        FormDataContentDisposition|array $formDataContentDisposition,
        array $headers,
        MediaType|array $mediaType,
        mixed $messageBodyWorkers,
        string $name,
        array $parameterizedHeaders,
        mixed $providers,
        bool $simple,
        string $value,
        MultiPart|array|null $parent = null,
    ): self {
        $self = new self;

        $self['contentDisposition'] = $contentDisposition;
        $self['entity'] = $entity;
        $self['formDataContentDisposition'] = $formDataContentDisposition;
        $self['headers'] = $headers;
        $self['mediaType'] = $mediaType;
        $self['messageBodyWorkers'] = $messageBodyWorkers;
        $self['name'] = $name;
        $self['parameterizedHeaders'] = $parameterizedHeaders;
        $self['providers'] = $providers;
        $self['simple'] = $simple;
        $self['value'] = $value;

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
     * An object representing the entity of the form data part, which contains the actual data being submitted.
     */
    public function withEntity(mixed $entity): self
    {
        $self = clone $this;
        $self['entity'] = $entity;

        return $self;
    }

    /**
     * @param FormDataContentDisposition|FormDataContentDispositionShape $formDataContentDisposition
     */
    public function withFormDataContentDisposition(
        FormDataContentDisposition|array $formDataContentDisposition
    ): self {
        $self = clone $this;
        $self['formDataContentDisposition'] = $formDataContentDisposition;

        return $self;
    }

    /**
     * An object containing the headers associated with this form data part, where each header can have multiple string values.
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
     * An object representing the message body workers, which are responsible for processing the body of the message.
     */
    public function withMessageBodyWorkers(mixed $messageBodyWorkers): self
    {
        $self = clone $this;
        $self['messageBodyWorkers'] = $messageBodyWorkers;

        return $self;
    }

    /**
     * The name of the form data part, typically used to identify the part within the multipart request.
     */
    public function withName(string $name): self
    {
        $self = clone $this;
        $self['name'] = $name;

        return $self;
    }

    /**
     * An object containing parameterized headers, where each header can have multiple values represented as ParameterizedHeader objects.
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
     * An object representing the providers associated with this form data part.
     */
    public function withProviders(mixed $providers): self
    {
        $self = clone $this;
        $self['providers'] = $providers;

        return $self;
    }

    /**
     * A boolean indicating whether the form data part is simple, typically meaning it does not contain complex nested structures.
     */
    public function withSimple(bool $simple): self
    {
        $self = clone $this;
        $self['simple'] = $simple;

        return $self;
    }

    /**
     * The string value of the form data part, representing the actual data being submitted as a string.
     */
    public function withValue(string $value): self
    {
        $self = clone $this;
        $self['value'] = $value;

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
