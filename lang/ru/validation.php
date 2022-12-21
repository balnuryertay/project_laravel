<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines contain the default error messages used by
    | the validator class. Some of these rules have multiple versions such
    | as the size rules. Feel free to tweak each of these messages here.
    |
    */

    'accepted' => ':attribute должен быть принят.',
    'accepted_if' => ' :attribute должен быть принят, когда :other равно :value.',
    'active_url' => ' :attribute недопустимый URL.',
    'after' => ' :attribute должен быть датой после :date',
    'after_or_equal' => ' :attribute должен быть датой после или равной :date.',
    'alpha' => ' :attribute должен содержать только буквы.',
    'alpha_dash' => ':attribute должен содержать только буквы, цифры, тире и подчеркивания.',
    'alpha_num' => ' :attribute должен содержать только буквы и цифры',
    'array' => ':attribute должен быть массивом.',
    'before' => ' :attribute должен быть датой до :date.',
    'before_or_equal' => ' :attribute должен быть датой до или равной :date',
    'between' => [
        'array' => ':attribute должен содержать элементы от :min до :max.',
        'file' => ' :attribute должен находиться в диапазоне от :min до :max килобайт',
        'numeric' => ':attribute должен находиться в диапазоне от :min до :max.',
        'string' => ':attribute должен находиться в диапазоне от :min до :max символов.',
    ],
    'boolean' => ' :attribute должно быть true или false.',
    'confirmed' => 'Подтверждение :attribute не соответствует.',
    'current_password' => 'Пароль неверный.',
    'date' => ' :attribute недопустим дата.',
    'date_equals' => ' :attribute должен быть датой, равной :date',
    'date_format' => ' :attribute не соответствует формату :format.',
    'declined' => ':attribute должен быть отклонен.',
    'declined_if' => ' :attribute должен быть отклонен, когда :other равно :value',
    'different' => ':attribute и :other должны отличаться.',
    'digits' => ':attribute должен быть :digits цифры.',
    'digits_between' => ':attribute должен находиться между :минимальными и :максимальными цифрами.',
    'dimensions' => ' :attribute имеет недопустимые размеры изображения.',
    'distinct' => 'После :attribute имеет повторяющееся значение.',
    'doesnt_end_with' => ' :attribute  может не заканчиваться одним из следующих: :values.',
    'doesnt_start_with' => ':attribute может не начинаться с одного из следующих: :values.',
    'email' => ' :attribute должен быть действительным адресом электронной почты.',
    'ends_with' => ' :attribute должен заканчиваться одним из следующих: :values.',
    'enum' => 'Выбранный :attribute недействителен.',
    'exists' => 'Выбранный :attribute недействителен.',
    'file' => ' :attribute должен быть файлом.',
    'filled' => 'После :attribute должно иметь значение',
    'gt' => [
        'array' => ' :attribute должен содержать больше элементов :value, чем :value.',
        'file' => ':attribute должен быть больше value : килобайт',
        'numeric' => ' :attribute должен быть больше, чем :value.',
        'string' => ' :attribute должен быть больше символов :value',
    ],
    'gte' => [
        'array' => ' :attribute должен содержать :value элементы  или более.',
        'file' => ':attribute должен быть больше или равен :value элементы  или более. килобайт',
        'numeric' => ':attribute должен быть больше или равен :value.',
        'string' => ' :attribute должен быть больше или равен :value символам.',
    ],
    'image' => ':attribute должен быть изображением.',
    'in' => 'Выбранный :attribute недопустим.',
    'in_array' => 'Поле :attribute не существует в :other.',
    'integer' => ':attribute должен быть целым числом.',
    'ip' => ':attribute должен быть действительным IP-адресом.',
    'ipv4' => ':attribute должен быть действительным адресом IPv4.',
    'ipv6' => ' :attribute должен быть действительным IPv6-адресом.',
    'json' => ':attribute должен быть допустимой строкой JSON.',
    'lt' => [
        'array' => ':attribute должен содержать меньше элементов :value.',
        'file' => 'The :attribute must be less than :value kilobytes.',
        'numeric' => 'The :attribute must be less than :value.',
        'string' => 'The :attribute must be less than :value characters.',
    ],
    'lte' => [
        'array' => ' :attribute должен содержать меньше элементов :value.',
        'file' => 'The :attribute must be less than or equal to :value kilobytes.',
        'numeric' => 'The :attribute must be less than or equal to :value.',
        'string' => 'The :attribute must be less than or equal to :value characters.',
    ],
    'mac_address' => 'The :attribute must be a valid MAC address.',
    'max' => [
        'array' => ':attribute не должен содержать более :max элементов.',
        'file' => ':attribute не должен превышать :max килобайт.',
        'numeric' => ':attribute не должен превышать :max.',
        'string' => ' :attribute не должен превышать :max символов.',
    ],
    'max_digits' => 'The :attribute must not have more than :max digits.',
    'mimes' => ':attribute должень быть файлам типа :values.',
    'mimetypes' => ':attribute должень быть файлам типа :values. :values.',
    'min' => [
        'array' => ':attribute должен содержать не менее :min элементов.',
        'file' => ':attribute  должен быть не менее :min килобайт.',
        'numeric' => ':attribute должен быть не менее :min.',
        'string' => ':attribute должен содержать не менее :min символов',
    ],
    'min_digits' => 'The :attribute must have at least :min digits.',
    'multiple_of' => 'The :attribute must be a multiple of :value.',
    'not_in' => 'The selected :attribute is invalid.',
    'not_regex' => 'The :attribute format is invalid.',
    'numeric' => ':attribute должен быть число.',
    'password' => [
        'letters' => ':attribute должен содержать хотя бы одну букву.',
        'mixed' => 'The :attribute must contain at least one uppercase and one lowercase letter.',
        'numbers' => ':attribute должен содержать хотя бы одно число.',
        'symbols' => ':attribute должен содержать хотя бы один символ.',
        'uncompromised' => 'The given :attribute has appeared in a data leak. Please choose a different :attribute.',
    ],
    'present' => 'The :attribute field must be present.',
    'prohibited' => 'The :attribute field is prohibited.',
    'prohibited_if' => 'The :attribute field is prohibited when :other is :value.',
    'prohibited_unless' => 'The :attribute field is prohibited unless :other is in :values.',
    'prohibits' => 'The :attribute field prohibits :other from being present.',
    'regex' => 'The :attribute format is invalid.',
    'required' => 'Поля :attribute обязательно.',
    'required_array_keys' => 'The :attribute field must contain entries for: :values.',
    'required_if' => 'The :attribute field is required when :other is :value.',
    'required_if_accepted' => 'The :attribute field is required when :other is accepted.',
    'required_unless' => 'The :attribute field is required unless :other is in :values.',
    'required_with' => 'The :attribute field is required when :values is present.',
    'required_with_all' => 'The :attribute field is required when :values are present.',
    'required_without' => 'The :attribute field is required when :values is not present.',
    'required_without_all' => 'The :attribute field is required when none of :values are present.',
    'same' => 'The :attribute and :other must match.',
    'size' => [
        'array' => 'The :attribute must contain :size items.',
        'file' => 'The :attribute must be :size kilobytes.',
        'numeric' => 'The :attribute must be :size.',
        'string' => 'The :attribute must be :size characters.',
    ],
    'starts_with' => 'The :attribute must start with one of the following: :values.',
    'string' => ':attribute должен быть строкой.',
    'timezone' => 'The :attribute must be a valid timezone.',
    'unique' => ' :attribute уже был использован',
    'uploaded' => 'Не удалось загрузить :attribute',
    'url' => ':attribute должен быть допустимым URL.',
    'uuid' => 'The :attribute must be a valid UUID.',

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Here you may specify custom validation messages for attributes using the
    | convention "attribute.rule" to name the lines. This makes it quick to
    | specify a specific custom language line for a given attribute rule.
    |
    */

    'custom' => [
        'attribute-name' => [
            'rule-name' => 'custom-message',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | The following language lines are used to swap our attribute placeholder
    | with something more reader friendly such as "E-Mail Address" instead
    | of "email". This simply helps us make our message more expressive.
    |
    */

    'attributes' => [],

];
