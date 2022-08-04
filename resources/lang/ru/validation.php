<?php
return [

    'accepted' => 'Поле :attribute должно быть эквивалентно значениям "yes", "on", "1", или "true"',
    'active_url' => 'Поле :attribute не является действительным URL',
    'after' => 'Поле :attribute должно соответствовать дате идущей после даты :date.',
    'alpha' => 'Поле :attribute может содержать только буквы',
    'alpha_dash' => 'Поле :attribute может содержать только буквы, цифры и тире',
    'alpha_num' => 'Поле :attribute может содержать только буквы и цифры',
    'array' => 'Поле :attribute должно быть массивом',
    'before' => 'Поле :attribute должно соответствовать дате идущей до даты :date.',
    'between' => [
        'numeric' => 'Значение поля :attribute должно находится в диапазоне от :min до :max',
        'file' => 'размер загружаемого файла в поле :attribute должно находится в диапазоне от :min до :max килобайт',
        'string' => 'Длина значение поля :attribute должна находится в диапазоне от :min до :max символов',
        'array' => 'Поле :attribute должно содержать от :min до :max элементов',
    ],
    'boolean' => 'Поле :attribute должно иметь значение true или false',
    'confirmed' => 'Поле :attribute и подтверждающее его поле не совпадают',
    'date' => 'Значение поле :attribute не является датой в верном формате',
    'date_format' => 'Значение поля :attribute не соответствует формату :format.',
    'different' => 'Значения полей :attribute и :other должны отличатся',
    'digits' => 'Значение поля :attribute должно соответствовать цифрам :digits',
    'digits_between' => 'Значение поля :attribute должно находится в диапазоне от :min до :max цыфр',
    'dimensions' => 'Изображение загруженное в поле :attribute имеет недопустимые размеры',
    'distinct' => 'Массив в поле :attribute не должен содержать дублирующих значений',
    'email' => 'Значение поля :attribute должно быть действительным адресом электронной почты',
    'exists' => 'Значение поля :attribute недействительно',
    'file' => 'Поле :attribute может принимать только файлы',
    'filled' => 'Поле :attribute обязательно',
    'image' => 'Поле :attribute должно быть изображением',
    'in' => 'Значение поля :attribute недействительно',
    'in_array' => 'Значение поля :attribute должно также присутствовать в поле :other',
    'integer' => 'Значение поля :attribute должно быть целым числом',
    'ip' => 'Значение поля :attribute должно быть действительным IP адресом',
    'json' => 'Значение поля :attribute должно быть действительной JSON стокой',
    'max' => [
        'numeric' => 'Значение поля :attribute не должно превышать значение :max',
        'file' => 'Значение поля :attribute не должно превышать значение :max килобайт',
        'string' => 'Значение поля :attribute не должно быть длиннее :max символов',
        'array' => 'Поле :attribute не должно содержать более чем :max элементов в массиве',
    ],
    'mimes' => 'Файл загружаемый в поле :attribute должен соответствовать форматам: :values. ',
    'min' => [
        'numeric' => 'Значение поля :attribute должно быть не меньше :min',
        'file' => 'Файл загружаемый в поле :attribute должно быть размером не меньше :min килобайт',
        'string' => 'Значение поля :attribute не должно быть короче :min символов',
        'array' => 'Поле :attribute не должно содержать менее чем :min элементов в массиве',
    ],
    'not_in' => 'Значение поля :attribute недействительно',
    'numeric' => 'Значение поля :attribute должно быть числом',
    'present' => 'Поле :attribute должно обязательно присутствовать в запросе (но может быть пустым)',
    'regex' => 'В поле :attribute переданы данные неверного формата',
    'required' => 'Поле :attribute обязательно',
    'custom' => [
        'attribute-name' => [
            'rule-name' => 'свой вариант сообщения',
        ],
    ],
    'required_if' => 'Поле :attribute обязательно когда :other равно :value.',
    'required_unless' => 'Поле :attribute обязательно когда :other равно одному из значений :values.',
    'required_with' => 'Поле :attribute обязательно когда :values есть в запросе',
    'required_with_all' => 'Поле :attribute обязательно когда :values есть в запросе',
    'required_without' => 'Поле :attribute обязательно когда :values отсутствуют в запросе',
    'required_without_all' => 'Поле :attribute обязательно когда ни одного из значений :values нет в запросе',
    'same' => 'Поле :attribute и поле :other должны совпадать',
    'size' => [
        'numeric' => 'Поле :attribute должно быть размера :size.',
        'file' => 'Поле :attribute должно быть размера :size килобайт',
        'string' => 'Поле :attribute должно быть размера :size символов',
        'array' => 'Поле :attribute должно иметь :size элементов',
    ],
    'string' => 'Поле :attribute должно быть строкой',
    'timezone' => 'Поле :attribute должно быть действительной зоной',
    'unique' => 'Поле :attribute уже занято',
    'url' => 'Поле :attribute имеет неверный формат',

];