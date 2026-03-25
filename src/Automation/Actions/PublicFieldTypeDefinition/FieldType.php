<?php

declare(strict_types=1);

namespace HubspotSDK\Automation\Actions\PublicFieldTypeDefinition;

enum FieldType: string
{
    case BOOLEANCHECKBOX = 'booleancheckbox';

    case CALCULATION_EQUATION = 'calculation_equation';

    case CHECKBOX = 'checkbox';

    case DATE = 'date';

    case FILE = 'file';

    case HTML = 'html';

    case NUMBER = 'number';

    case PHONENUMBER = 'phonenumber';

    case RADIO = 'radio';

    case SELECT = 'select';

    case TEXT = 'text';

    case TEXTAREA = 'textarea';
}
