<?php

declare(strict_types=1);

namespace HubSpotSDK\Marketing\Emails;

use HubSpotSDK\Core\Attributes\Optional;
use HubSpotSDK\Core\Concerns\SdkModel;
use HubSpotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type PublicEmailStyleSettingsShape from \HubSpotSDK\Marketing\Emails\PublicEmailStyleSettings
 *
 * @phpstan-type PublicEmailContentShape = array{
 *   flexAreas?: array<string,mixed>|null,
 *   plainTextVersion?: string|null,
 *   smartFields?: array<string,mixed>|null,
 *   styleSettings?: null|PublicEmailStyleSettings|PublicEmailStyleSettingsShape,
 *   templatePath?: string|null,
 *   themeSettingsValues?: array<string,mixed>|null,
 *   widgetContainers?: array<string,mixed>|null,
 *   widgets?: array<string,mixed>|null,
 * }
 */
final class PublicEmailContent implements BaseModel
{
    /** @use SdkModel<PublicEmailContentShape> */
    use SdkModel;

    /** @var array<string,mixed>|null $flexAreas */
    #[Optional(map: 'mixed')]
    public ?array $flexAreas;

    #[Optional]
    public ?string $plainTextVersion;

    /** @var array<string,mixed>|null $smartFields */
    #[Optional(map: 'mixed')]
    public ?array $smartFields;

    #[Optional]
    public ?PublicEmailStyleSettings $styleSettings;

    #[Optional]
    public ?string $templatePath;

    /** @var array<string,mixed>|null $themeSettingsValues */
    #[Optional(map: 'mixed')]
    public ?array $themeSettingsValues;

    /** @var array<string,mixed>|null $widgetContainers */
    #[Optional(map: 'mixed')]
    public ?array $widgetContainers;

    /** @var array<string,mixed>|null $widgets */
    #[Optional(map: 'mixed')]
    public ?array $widgets;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param array<string,mixed>|null $flexAreas
     * @param array<string,mixed>|null $smartFields
     * @param PublicEmailStyleSettings|PublicEmailStyleSettingsShape|null $styleSettings
     * @param array<string,mixed>|null $themeSettingsValues
     * @param array<string,mixed>|null $widgetContainers
     * @param array<string,mixed>|null $widgets
     */
    public static function with(
        ?array $flexAreas = null,
        ?string $plainTextVersion = null,
        ?array $smartFields = null,
        PublicEmailStyleSettings|array|null $styleSettings = null,
        ?string $templatePath = null,
        ?array $themeSettingsValues = null,
        ?array $widgetContainers = null,
        ?array $widgets = null,
    ): self {
        $self = new self;

        null !== $flexAreas && $self['flexAreas'] = $flexAreas;
        null !== $plainTextVersion && $self['plainTextVersion'] = $plainTextVersion;
        null !== $smartFields && $self['smartFields'] = $smartFields;
        null !== $styleSettings && $self['styleSettings'] = $styleSettings;
        null !== $templatePath && $self['templatePath'] = $templatePath;
        null !== $themeSettingsValues && $self['themeSettingsValues'] = $themeSettingsValues;
        null !== $widgetContainers && $self['widgetContainers'] = $widgetContainers;
        null !== $widgets && $self['widgets'] = $widgets;

        return $self;
    }

    /**
     * @param array<string,mixed> $flexAreas
     */
    public function withFlexAreas(array $flexAreas): self
    {
        $self = clone $this;
        $self['flexAreas'] = $flexAreas;

        return $self;
    }

    public function withPlainTextVersion(string $plainTextVersion): self
    {
        $self = clone $this;
        $self['plainTextVersion'] = $plainTextVersion;

        return $self;
    }

    /**
     * @param array<string,mixed> $smartFields
     */
    public function withSmartFields(array $smartFields): self
    {
        $self = clone $this;
        $self['smartFields'] = $smartFields;

        return $self;
    }

    /**
     * @param PublicEmailStyleSettings|PublicEmailStyleSettingsShape $styleSettings
     */
    public function withStyleSettings(
        PublicEmailStyleSettings|array $styleSettings
    ): self {
        $self = clone $this;
        $self['styleSettings'] = $styleSettings;

        return $self;
    }

    public function withTemplatePath(string $templatePath): self
    {
        $self = clone $this;
        $self['templatePath'] = $templatePath;

        return $self;
    }

    /**
     * @param array<string,mixed> $themeSettingsValues
     */
    public function withThemeSettingsValues(array $themeSettingsValues): self
    {
        $self = clone $this;
        $self['themeSettingsValues'] = $themeSettingsValues;

        return $self;
    }

    /**
     * @param array<string,mixed> $widgetContainers
     */
    public function withWidgetContainers(array $widgetContainers): self
    {
        $self = clone $this;
        $self['widgetContainers'] = $widgetContainers;

        return $self;
    }

    /**
     * @param array<string,mixed> $widgets
     */
    public function withWidgets(array $widgets): self
    {
        $self = clone $this;
        $self['widgets'] = $widgets;

        return $self;
    }
}
