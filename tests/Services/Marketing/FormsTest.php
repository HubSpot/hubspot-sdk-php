<?php

namespace Tests\Services\Marketing;

use HubspotSDK\Client;
use HubspotSDK\Marketing\Forms\MarketingFormsDependentField;
use HubspotSDK\Marketing\Forms\MarketingFormsDependentFieldFilter;
use HubspotSDK\Marketing\Forms\MarketingFormsEmailField;
use HubspotSDK\Marketing\Forms\MarketingFormsEmailFieldValidation;
use HubspotSDK\Marketing\Forms\MarketingFormsFieldGroup;
use HubspotSDK\Marketing\Forms\MarketingFormsFormDisplayOptions;
use HubspotSDK\Marketing\Forms\MarketingFormsFormPostSubmitAction;
use HubspotSDK\Marketing\Forms\MarketingFormsFormStyle;
use HubspotSDK\Marketing\Forms\MarketingFormsHubSpotFormConfiguration;
use HubspotSDK\Marketing\Forms\MarketingFormsLegalConsentOptionsNone;
use HubspotSDK\Marketing\Forms\MarketingFormsLifecycleStage;
use HubspotSDK\Marketing\Forms\MarketingFormsPhoneField;
use HubspotSDK\Marketing\Forms\MarketingFormsPhoneFieldValidation;
use PHPUnit\Framework\Attributes\CoversNothing;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Tests\UnsupportedMockTests;

/**
 * @internal
 */
#[CoversNothing]
final class FormsTest extends TestCase
{
    protected Client $client;

    protected function setUp(): void
    {
        parent::setUp();

        $testUrl = getenv('TEST_API_BASE_URL') ?: 'http://127.0.0.1:4010';
        $client = new Client(accessToken: 'pat-123123', baseUrl: $testUrl);

        $this->client = $client;
    }

    #[Test]
    public function testCreate(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->marketing->forms->create();

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testUpdate(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->marketing->forms->update('formId');

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testList(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->marketing->forms->list();

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testDelete(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->marketing->forms->delete('formId');

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testRead(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->marketing->forms->read('formId');

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testReplace(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->marketing->forms->replace(
            'formId',
            id: 'id',
            archived: true,
            configuration: MarketingFormsHubSpotFormConfiguration::with(
                allowLinkToResetKnownValues: true,
                archivable: true,
                cloneable: true,
                createNewContactForNewEmail: true,
                editable: true,
                language: 'af',
                notifyContactOwner: true,
                notifyRecipients: ['string'],
                postSubmitAction: MarketingFormsFormPostSubmitAction::with(
                    type: 'thank_you',
                    value: 'value'
                ),
                prePopulateKnownValues: true,
                recaptchaEnabled: true,
            ),
            createdAt: new \DateTimeImmutable('2019-12-27T18:11:19.117Z'),
            displayOptions: MarketingFormsFormDisplayOptions::with(
                renderRawHTML: true,
                style: MarketingFormsFormStyle::with(
                    backgroundWidth: 'backgroundWidth',
                    fontFamily: 'fontFamily',
                    helpTextColor: 'helpTextColor',
                    helpTextSize: 'helpTextSize',
                    labelTextColor: 'labelTextColor',
                    labelTextSize: 'labelTextSize',
                    legalConsentTextColor: 'legalConsentTextColor',
                    legalConsentTextSize: 'legalConsentTextSize',
                    submitAlignment: 'left',
                    submitColor: 'submitColor',
                    submitFontColor: 'submitFontColor',
                    submitSize: 'submitSize',
                ),
                submitButtonText: 'submitButtonText',
                theme: 'default_style',
            ),
            fieldGroups: [
                MarketingFormsFieldGroup::with(
                    fields: [
                        MarketingFormsEmailField::with(
                            dependentFields: [
                                MarketingFormsDependentField::with(
                                    dependentCondition: MarketingFormsDependentFieldFilter::with(
                                        operator: 'eq',
                                        rangeEnd: 'rangeEnd',
                                        rangeStart: 'rangeStart',
                                        value: 'value',
                                        values: ['string'],
                                    ),
                                    dependentField: MarketingFormsPhoneField::with(
                                        dependentFields: [],
                                        fieldType: 'phone',
                                        hidden: true,
                                        label: 'label',
                                        name: 'name',
                                        objectTypeID: 'objectTypeId',
                                        required: true,
                                        useCountryCodeSelect: true,
                                        validation: MarketingFormsPhoneFieldValidation::with(
                                            maxAllowedDigits: 0,
                                            minAllowedDigits: 0
                                        ),
                                    ),
                                ),
                            ],
                            fieldType: 'email',
                            hidden: true,
                            label: 'label',
                            name: 'name',
                            objectTypeID: 'objectTypeId',
                            required: true,
                            validation: MarketingFormsEmailFieldValidation::with(
                                blockedEmailDomains: ['string'],
                                useDefaultBlockList: true
                            ),
                        ),
                    ],
                    groupType: 'default_group',
                    richTextType: 'text',
                ),
            ],
            formType: 'hubspot',
            legalConsentOptions: MarketingFormsLegalConsentOptionsNone::with(
                type: 'none'
            ),
            name: 'name',
            updatedAt: new \DateTimeImmutable('2019-12-27T18:11:19.117Z'),
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testReplaceWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->marketing->forms->replace(
            'formId',
            id: 'id',
            archived: true,
            configuration: MarketingFormsHubSpotFormConfiguration::with(
                allowLinkToResetKnownValues: true,
                archivable: true,
                cloneable: true,
                createNewContactForNewEmail: true,
                editable: true,
                language: 'af',
                notifyContactOwner: true,
                notifyRecipients: ['string'],
                postSubmitAction: MarketingFormsFormPostSubmitAction::with(
                    type: 'thank_you',
                    value: 'value'
                ),
                prePopulateKnownValues: true,
                recaptchaEnabled: true,
            )
                ->withLifecycleStages(
                    [
                        MarketingFormsLifecycleStage::with(
                            objectTypeID: 'objectTypeId',
                            value: 'value'
                        ),
                    ],
                ),
            createdAt: new \DateTimeImmutable('2019-12-27T18:11:19.117Z'),
            displayOptions: MarketingFormsFormDisplayOptions::with(
                renderRawHTML: true,
                style: MarketingFormsFormStyle::with(
                    backgroundWidth: 'backgroundWidth',
                    fontFamily: 'fontFamily',
                    helpTextColor: 'helpTextColor',
                    helpTextSize: 'helpTextSize',
                    labelTextColor: 'labelTextColor',
                    labelTextSize: 'labelTextSize',
                    legalConsentTextColor: 'legalConsentTextColor',
                    legalConsentTextSize: 'legalConsentTextSize',
                    submitAlignment: 'left',
                    submitColor: 'submitColor',
                    submitFontColor: 'submitFontColor',
                    submitSize: 'submitSize',
                ),
                submitButtonText: 'submitButtonText',
                theme: 'default_style',
            )
                ->withCssClass('cssClass'),
            fieldGroups: [
                MarketingFormsFieldGroup::with(
                    fields: [
                        MarketingFormsEmailField::with(
                            dependentFields: [
                                MarketingFormsDependentField::with(
                                    dependentCondition: MarketingFormsDependentFieldFilter::with(
                                        operator: 'eq',
                                        rangeEnd: 'rangeEnd',
                                        rangeStart: 'rangeStart',
                                        value: 'value',
                                        values: ['string'],
                                    ),
                                    dependentField: MarketingFormsPhoneField::with(
                                        dependentFields: [],
                                        fieldType: 'phone',
                                        hidden: true,
                                        label: 'label',
                                        name: 'name',
                                        objectTypeID: 'objectTypeId',
                                        required: true,
                                        useCountryCodeSelect: true,
                                        validation: MarketingFormsPhoneFieldValidation::with(
                                            maxAllowedDigits: 0,
                                            minAllowedDigits: 0
                                        ),
                                    )
                                        ->withDefaultValue('defaultValue')
                                        ->withPlaceholder('placeholder'),
                                ),
                            ],
                            fieldType: 'email',
                            hidden: true,
                            label: 'label',
                            name: 'name',
                            objectTypeID: 'objectTypeId',
                            required: true,
                            validation: MarketingFormsEmailFieldValidation::with(
                                blockedEmailDomains: ['string'],
                                useDefaultBlockList: true
                            ),
                        )
                            ->withDefaultValue('defaultValue')
                            ->withPlaceholder('placeholder'),
                    ],
                    groupType: 'default_group',
                    richTextType: 'text',
                )
                    ->withRichText('richText'),
            ],
            formType: 'hubspot',
            legalConsentOptions: MarketingFormsLegalConsentOptionsNone::with(
                type: 'none'
            ),
            name: 'name',
            updatedAt: new \DateTimeImmutable('2019-12-27T18:11:19.117Z'),
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }
}
