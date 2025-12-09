<?php

declare(strict_types=1);

namespace HubspotSDK\Services\Marketing;

use HubspotSDK\Client;
use HubspotSDK\Core\Contracts\BaseResponse;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Marketing\Forms\FieldGroup;
use HubspotSDK\Marketing\Forms\FieldGroup\GroupType;
use HubspotSDK\Marketing\Forms\FieldGroup\RichTextType;
use HubspotSDK\Marketing\Forms\FormDefinitionBase;
use HubspotSDK\Marketing\Forms\FormDisplayOptions;
use HubspotSDK\Marketing\Forms\FormDisplayOptions\Theme;
use HubspotSDK\Marketing\Forms\FormGetParams;
use HubspotSDK\Marketing\Forms\FormListParams;
use HubspotSDK\Marketing\Forms\FormListParams\FormType;
use HubspotSDK\Marketing\Forms\FormPostSubmitAction;
use HubspotSDK\Marketing\Forms\FormStyle;
use HubspotSDK\Marketing\Forms\FormUpdateParams;
use HubspotSDK\Marketing\Forms\HubSpotFormConfiguration;
use HubspotSDK\Marketing\Forms\HubSpotFormConfiguration\Language;
use HubspotSDK\Marketing\Forms\HubSpotFormDefinition;
use HubspotSDK\Marketing\Forms\LifecycleStage;
use HubspotSDK\Page;
use HubspotSDK\RequestOptions;
use HubspotSDK\ServiceContracts\Marketing\FormsContract;

final class FormsService implements FormsContract
{
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Add a new `hubspot` form
     *
     * @throws APIException
     */
    public function create(
        ?RequestOptions $requestOptions = null
    ): FormDefinitionBase {
        /** @var BaseResponse<FormDefinitionBase> */
        $response = $this->client->request(
            method: 'post',
            path: 'marketing/v3/forms/',
            options: $requestOptions,
            convert: FormDefinitionBase::class,
        );

        return $response->parse();
    }

    /**
     * @api
     *
     * Update some of the form definition components
     *
     * @param array{
     *   archived?: bool,
     *   configuration?: array{
     *     allowLinkToResetKnownValues: bool,
     *     archivable: bool,
     *     cloneable: bool,
     *     createNewContactForNewEmail: bool,
     *     editable: bool,
     *     language: 'af'|'ar-eg'|'bg'|'bn'|'ca-es'|'cs'|'da'|'de'|'el'|'en'|'es'|'es-mx'|'fi'|'fr'|'fr-ca'|'he-il'|'hr'|'hu'|'id'|'it'|'ja'|'ko'|'lt'|'ms'|'nl'|'no-no'|'pl'|'pt'|'pt-br'|'ro'|'ru'|'sk'|'sl'|'sv'|'th'|'tl'|'tr'|'uk'|'vi'|'zh-cn'|'zh-hk'|'zh-tw'|Language,
     *     notifyContactOwner: bool,
     *     notifyRecipients: list<string>,
     *     postSubmitAction: array<mixed>|FormPostSubmitAction,
     *     prePopulateKnownValues: bool,
     *     recaptchaEnabled: bool,
     *     lifecycleStages?: list<array<mixed>|LifecycleStage>,
     *   }|HubSpotFormConfiguration,
     *   displayOptions?: array{
     *     renderRawHtml: bool,
     *     style: array<mixed>|FormStyle,
     *     submitButtonText: string,
     *     theme: 'canvas'|'default_style'|'legacy'|'linear'|'round'|'sharp'|Theme,
     *     cssClass?: string,
     *   }|FormDisplayOptions,
     *   fieldGroups?: list<array{
     *     fields: list<array<string,mixed>>,
     *     groupType: 'default_group'|'progressive'|'queued'|GroupType,
     *     richTextType: 'image'|'text'|RichTextType,
     *     richText?: string,
     *   }|FieldGroup>,
     *   legalConsentOptions?: array<string,mixed>,
     *   name?: string,
     * }|FormUpdateParams $params
     *
     * @throws APIException
     */
    public function update(
        string $formID,
        array|FormUpdateParams $params,
        ?RequestOptions $requestOptions = null,
    ): FormDefinitionBase {
        [$parsed, $options] = FormUpdateParams::parseRequest(
            $params,
            $requestOptions,
        );

        /** @var BaseResponse<FormDefinitionBase> */
        $response = $this->client->request(
            method: 'patch',
            path: ['marketing/v3/forms/%1$s', $formID],
            body: (object) $parsed,
            options: $options,
            convert: FormDefinitionBase::class,
        );

        return $response->parse();
    }

    /**
     * @api
     *
     * Returns a list of forms based on the search filters. By default, it returns the first 20 `hubspot` forms
     *
     * @param array{
     *   after?: string,
     *   archived?: bool,
     *   formTypes?: list<'hubspot'|'captured'|'flow'|'blog_comment'|'all'|FormType>,
     *   limit?: int,
     * }|FormListParams $params
     *
     * @return Page<HubSpotFormDefinition>
     *
     * @throws APIException
     */
    public function list(
        array|FormListParams $params,
        ?RequestOptions $requestOptions = null
    ): Page {
        [$parsed, $options] = FormListParams::parseRequest(
            $params,
            $requestOptions,
        );

        /** @var BaseResponse<Page<HubSpotFormDefinition>> */
        $response = $this->client->request(
            method: 'get',
            path: 'marketing/v3/forms/',
            query: $parsed,
            options: $options,
            convert: HubSpotFormDefinition::class,
            page: Page::class,
        );

        return $response->parse();
    }

    /**
     * @api
     *
     * Archive a form definition. New submissions will not be accepted and the form definition will be permanently deleted after 3 months.
     *
     * @throws APIException
     */
    public function delete(
        string $formID,
        ?RequestOptions $requestOptions = null
    ): mixed {
        /** @var BaseResponse<mixed> */
        $response = $this->client->request(
            method: 'delete',
            path: ['marketing/v3/forms/%1$s', $formID],
            options: $requestOptions,
            convert: null,
        );

        return $response->parse();
    }

    /**
     * @api
     *
     * Returns a form based on the form ID provided.
     *
     * @param array{archived?: bool}|FormGetParams $params
     *
     * @throws APIException
     */
    public function get(
        string $formID,
        array|FormGetParams $params,
        ?RequestOptions $requestOptions = null,
    ): FormDefinitionBase {
        [$parsed, $options] = FormGetParams::parseRequest(
            $params,
            $requestOptions,
        );

        /** @var BaseResponse<FormDefinitionBase> */
        $response = $this->client->request(
            method: 'get',
            path: ['marketing/v3/forms/%1$s', $formID],
            query: $parsed,
            options: $options,
            convert: FormDefinitionBase::class,
        );

        return $response->parse();
    }

    /**
     * @api
     *
     * Update all fields of a hubspot form definition.
     *
     * @throws APIException
     */
    public function replace(
        string $formID,
        ?RequestOptions $requestOptions = null
    ): FormDefinitionBase {
        /** @var BaseResponse<FormDefinitionBase> */
        $response = $this->client->request(
            method: 'put',
            path: ['marketing/v3/forms/%1$s', $formID],
            options: $requestOptions,
            convert: FormDefinitionBase::class,
        );

        return $response->parse();
    }
}
