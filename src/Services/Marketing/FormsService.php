<?php

declare(strict_types=1);

namespace HubspotSDK\Services\Marketing;

use HubspotSDK\Client;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Marketing\Forms\FieldGroup;
use HubspotSDK\Marketing\Forms\FormDefinitionBase;
use HubspotSDK\Marketing\Forms\FormDisplayOptions;
use HubspotSDK\Marketing\Forms\FormGetParams;
use HubspotSDK\Marketing\Forms\FormListParams;
use HubspotSDK\Marketing\Forms\FormListParams\FormType;
use HubspotSDK\Marketing\Forms\FormUpdateParams;
use HubspotSDK\Marketing\Forms\HubSpotFormConfiguration;
use HubspotSDK\Marketing\Forms\HubSpotFormDefinition;
use HubspotSDK\Marketing\Forms\LegalConsentOptionsExplicitConsentToProcess;
use HubspotSDK\Marketing\Forms\LegalConsentOptionsImplicitConsentToProcess;
use HubspotSDK\Marketing\Forms\LegalConsentOptionsLegitimateInterest;
use HubspotSDK\Marketing\Forms\LegalConsentOptionsNone;
use HubspotSDK\Page;
use HubspotSDK\RequestOptions;
use HubspotSDK\ServiceContracts\Marketing\FormsContract;

use const HubspotSDK\Core\OMIT as omit;

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
        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'post',
            path: 'marketing/v3/forms/',
            options: $requestOptions,
            convert: FormDefinitionBase::class,
        );
    }

    /**
     * @api
     *
     * Update some of the form definition components
     *
     * @param bool $archived whether this form is archived
     * @param HubSpotFormConfiguration $configuration
     * @param FormDisplayOptions $displayOptions options for styling the form
     * @param list<FieldGroup> $fieldGroups the fields in the form, grouped in rows
     * @param LegalConsentOptionsNone|LegalConsentOptionsLegitimateInterest|LegalConsentOptionsExplicitConsentToProcess|LegalConsentOptionsImplicitConsentToProcess $legalConsentOptions
     * @param string $name The name of the form. Expected to be unique for a hub.
     *
     * @throws APIException
     */
    public function update(
        string $formID,
        $archived = omit,
        $configuration = omit,
        $displayOptions = omit,
        $fieldGroups = omit,
        $legalConsentOptions = omit,
        $name = omit,
        ?RequestOptions $requestOptions = null,
    ): FormDefinitionBase {
        $params = [
            'archived' => $archived,
            'configuration' => $configuration,
            'displayOptions' => $displayOptions,
            'fieldGroups' => $fieldGroups,
            'legalConsentOptions' => $legalConsentOptions,
            'name' => $name,
        ];

        return $this->updateRaw($formID, $params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function updateRaw(
        string $formID,
        array $params,
        ?RequestOptions $requestOptions = null
    ): FormDefinitionBase {
        [$parsed, $options] = FormUpdateParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'patch',
            path: ['marketing/v3/forms/%1$s', $formID],
            body: (object) $parsed,
            options: $options,
            convert: FormDefinitionBase::class,
        );
    }

    /**
     * @api
     *
     * Returns a list of forms based on the search filters. By default, it returns the first 20 `hubspot` forms
     *
     * @param string $after The paging cursor token of the last successfully read resource will be returned as the `paging.next.after` JSON property of a paged response containing more results.
     * @param bool $archived whether to return only results that have been archived
     * @param list<FormType|value-of<FormType>> $formTypes the form types to be included in the results
     * @param int $limit the maximum number of results to display per page
     *
     * @return Page<HubSpotFormDefinition>
     *
     * @throws APIException
     */
    public function list(
        $after = omit,
        $archived = omit,
        $formTypes = omit,
        $limit = omit,
        ?RequestOptions $requestOptions = null,
    ): Page {
        $params = [
            'after' => $after,
            'archived' => $archived,
            'formTypes' => $formTypes,
            'limit' => $limit,
        ];

        return $this->listRaw($params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @return Page<HubSpotFormDefinition>
     *
     * @throws APIException
     */
    public function listRaw(
        array $params,
        ?RequestOptions $requestOptions = null
    ): Page {
        [$parsed, $options] = FormListParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: 'marketing/v3/forms/',
            query: $parsed,
            options: $options,
            convert: HubSpotFormDefinition::class,
            page: Page::class,
        );
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
        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'delete',
            path: ['marketing/v3/forms/%1$s', $formID],
            options: $requestOptions,
            convert: null,
        );
    }

    /**
     * @api
     *
     * Returns a form based on the form ID provided.
     *
     * @param bool $archived whether to return only results that have been archived
     *
     * @throws APIException
     */
    public function get(
        string $formID,
        $archived = omit,
        ?RequestOptions $requestOptions = null
    ): FormDefinitionBase {
        $params = ['archived' => $archived];

        return $this->getRaw($formID, $params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function getRaw(
        string $formID,
        array $params,
        ?RequestOptions $requestOptions = null
    ): FormDefinitionBase {
        [$parsed, $options] = FormGetParams::parseRequest($params, $requestOptions);

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: ['marketing/v3/forms/%1$s', $formID],
            query: $parsed,
            options: $options,
            convert: FormDefinitionBase::class,
        );
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
        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'put',
            path: ['marketing/v3/forms/%1$s', $formID],
            options: $requestOptions,
            convert: FormDefinitionBase::class,
        );
    }
}
