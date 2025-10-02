<?php

declare(strict_types=1);

namespace HubspotSDK\Automation\Actions\AutomationActionsFieldTypeDefinition;

enum FieldType: string
{
    case BOOLEANCHECKBOX = 'booleancheckbox';

    case CHECKBOX = 'checkbox';

    case DATE = 'date';

    case FILE = 'file';

    case NUMBER = 'number';

    case PHONENUMBER = 'phonenumber';

    case RADIO = 'radio';

    case SELECT = 'select';

    case TEXT = 'text';

    case TEXTAREA = 'textarea';

    case CALCULATION_EQUATION = 'calculation_equation';

    case CALCULATION_ROLLUP = 'calculation_rollup';

    case CALCULATION_SCORE = 'calculation_score';

    case CALCULATION_READ_TIME = 'calculation_read_time';

    case UNKNOWN = 'unknown';

    case HTML = 'html';
}
