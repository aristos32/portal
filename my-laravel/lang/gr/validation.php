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

    'accepted' => 'Το πεδίο :attribute πρέπει να γίνει αποδεκτό.',
    'accepted_if' => 'Το πεδίο :attribute πρέπει να γίνει αποδεκτό όταν το :other είναι :value.',
    'active_url' => 'Το πεδίο :attribute δεν είναι έγκυρη διεύθυνση URL.',
    'after' => 'Το πεδίο :attribute πρέπει να είναι ημερομηνία μετά από :date.',
    'after_or_equal' => 'Το πεδίο :attribute πρέπει να είναι ημερομηνία μετά ή ίση με :date.',
    'alpha' => 'Το πεδίο :attribute πρέπει να περιέχει μόνο γράμματα.',
    'alpha_dash' => 'Το πεδίο :attribute πρέπει να περιέχει μόνο γράμματα, αριθμούς, παύλες και underscores.',
    'alpha_num' => 'Το πεδίο :attribute πρέπει να περιέχει μόνο γράμματα και αριθμούς.',
    'array' => 'Το πεδίο :attribute πρέπει να είναι πίνακας.',
    'ascii' => 'Το πεδίο :attribute πρέπει να περιέχει μόνο μονοψήφιους αλφαριθμητικούς χαρακτήρες και σύμβολα.',
    'before' => 'Το πεδίο :attribute πρέπει να είναι ημερομηνία πριν από :date.',
    'before_or_equal' => 'Το πεδίο :attribute πρέπει να είναι ημερομηνία πριν ή ίση με :date.',
    'between' => [
        'array' => 'Το πεδίο :attribute πρέπει να έχει μεταξύ :min και :max στοιχεία.',
        'file' => 'Το πεδίο :attribute πρέπει να είναι μεταξύ :min και :max kilobytes.',
        'numeric' => 'Το πεδίο :attribute πρέπει να είναι μεταξύ :min και :max.',
        'string' => 'Το πεδίο :attribute πρέπει να είναι μεταξύ :min και :max χαρακτήρες.',
    ],
    'boolean' => 'Το πεδίο :attribute πρέπει να είναι true ή false.',
    'can' => 'Το πεδίο :attribute περιέχει μη εξουσιοδοτημένη τιμή.',
    'confirmed' => 'Η επιβεβαίωση του πεδίου :attribute δεν ταιριάζει.',
    'contains' => 'Το πεδίο :attribute δεν περιέχει απαιτούμενη τιμή.',
    'current_password' => 'Ο κωδικός είναι λανθασμένος.',
    'date' => 'Το πεδίο :attribute δεν είναι έγκυρη ημερομηνία.',
    'date_equals' => 'Το πεδίο :attribute πρέπει να είναι ημερομηνία ίση με :date.',
    'date_format' => 'Το πεδίο :attribute δεν ταιριάζει με τη μορφή :format.',
    'decimal' => 'Το πεδίο :attribute πρέπει να έχει :decimal δεκαδικά ψηφία.',
    'declined' => 'Το πεδίο :attribute πρέπει να απορριφθεί.',
    'declined_if' => 'Το πεδίο :attribute πρέπει να απορριφθεί όταν το :other είναι :value.',
    'different' => 'Τα πεδία :attribute και :other πρέπει να είναι διαφορετικά.',
    'digits' => 'Το πεδίο :attribute πρέπει να είναι :digits ψηφία.',
    'digits_between' => 'Το πεδίο :attribute πρέπει να είναι μεταξύ :min και :max ψηφία.',
    'dimensions' => 'Το πεδίο :attribute έχει μη έγκυρες διαστάσεις εικόνας.',
    'distinct' => 'Το πεδίο :attribute έχει διπλή τιμή.',
    'doesnt_end_with' => 'Το πεδίο :attribute δεν πρέπει να τελειώνει με ένα από τα εξής: :values.',
    'doesnt_start_with' => 'Το πεδίο :attribute δεν πρέπει να ξεκινά με ένα από τα εξής: :values.',
    'email' => 'Το πεδίο :attribute πρέπει να είναι έγκυρη διεύθυνση email.',
    'ends_with' => 'Το πεδίο :attribute πρέπει να τελειώνει με ένα από τα εξής: :values.',
    'enum' => 'Η επιλεγμένη τιμή του :attribute είναι μη έγκυρη.',
    'exists' => 'Η επιλεγμένη τιμή του :attribute είναι μη έγκυρη.',
    'extensions' => 'Το πεδίο :attribute πρέπει να έχει μία από τις εξής επεκτάσεις: :values.',
    'file' => 'Το πεδίο :attribute πρέπει να είναι αρχείο.',
    'filled' => 'Το πεδίο :attribute πρέπει να έχει τιμή.',
    'gt' => [
        'array' => 'Το πεδίο :attribute πρέπει να έχει περισσότερα από :value στοιχεία.',
        'file' => 'Το πεδίο :attribute πρέπει να είναι μεγαλύτερο από :value kilobytes.',
        'numeric' => 'Το πεδίο :attribute πρέπει να είναι μεγαλύτερο από :value.',
        'string' => 'Το πεδίο :attribute πρέπει να είναι μεγαλύτερο από :value χαρακτήρες.',
    ],
    'gte' => [
        'array' => 'Το πεδίο :attribute πρέπει να έχει :value ή περισσότερα στοιχεία.',
        'file' => 'Το πεδίο :attribute πρέπει να είναι μεγαλύτερο ή ίσο με :value kilobytes.',
        'numeric' => 'Το πεδίο :attribute πρέπει να είναι μεγαλύτερο ή ίσο με :value.',
        'string' => 'Το πεδίο :attribute πρέπει να είναι μεγαλύτερο ή ίσο με :value χαρακτήρες.',
    ],
    'hex_color' => 'Το πεδίο :attribute πρέπει να είναι έγκυρο δεκαεξαδικό χρώμα.',
    'image' => 'Το πεδίο :attribute πρέπει να είναι εικόνα.',
    'in' => 'Η επιλεγμένη τιμή του :attribute είναι μη έγκυρη.',
    'in_array' => 'Το πεδίο :attribute δεν υπάρχει στο :other.',
    'integer' => 'Το πεδίο :attribute πρέπει να είναι ακέραιος.',
    'ip' => 'Το πεδίο :attribute πρέπει να είναι έγκυρη διεύθυνση IP.',
    'ipv4' => 'Το πεδίο :attribute πρέπει να είναι έγκυρη διεύθυνση IPv4.',
    'ipv6' => 'Το πεδίο :attribute πρέπει να είναι έγκυρη διεύθυνση IPv6.',
    'json' => 'Το πεδίο :attribute πρέπει να είναι έγκυρη συμβολοσειρά JSON.',
    'list' => 'Το πεδίο :attribute πρέπει να είναι λίστα.',
    'lowercase' => 'Το πεδίο :attribute πρέπει να είναι πεζά γράμματα.',
    'lt' => [
        'array' => 'Το πεδίο :attribute πρέπει να έχει λιγότερα από :value στοιχεία.',
        'file' => 'Το πεδίο :attribute πρέπει να είναι μικρότερο από :value kilobytes.',
        'numeric' => 'Το πεδίο :attribute πρέπει να είναι μικρότερο από :value.',
        'string' => 'Το πεδίο :attribute πρέπει να είναι μικρότερο από :value χαρακτήρες.',
    ],
    'lte' => [
        'array' => 'Το πεδίο :attribute δεν πρέπει να έχει περισσότερα από :value στοιχεία.',
        'file' => 'Το πεδίο :attribute πρέπει να είναι μικρότερο ή ίσο με :value kilobytes.',
        'numeric' => 'Το πεδίο :attribute πρέπει να είναι μικρότερο ή ίσο με :value.',
        'string' => 'Το πεδίο :attribute πρέπει να είναι μικρότερο ή ίσο με :value χαρακτήρες.',
    ],
    'mac_address' => 'Το πεδίο :attribute πρέπει να είναι έγκυρη διεύθυνση MAC.',
    'max' => [
        'array' => 'Το πεδίο :attribute δεν πρέπει να έχει περισσότερα από :max στοιχεία.',
        'file' => 'Το πεδίο :attribute δεν πρέπει να είναι μεγαλύτερο από :max kilobytes.',
        'numeric' => 'Το πεδίο :attribute δεν πρέπει να είναι μεγαλύτερο από :max.',
        'string' => 'Το πεδίο :attribute δεν πρέπει να είναι μεγαλύτερο από :max χαρακτήρες.',
    ],
    'max_digits' => 'Το πεδίο :attribute δεν πρέπει να έχει περισσότερα από :max ψηφία.',
    'mimes' => 'Το πεδίο :attribute πρέπει να είναι αρχείο τύπου: :values.',
    'mimetypes' => 'Το πεδίο :attribute πρέπει να είναι αρχείο τύπου: :values.',
    'min' => [
        'array' => 'Το πεδίο :attribute πρέπει να έχει τουλάχιστον :min στοιχεία.',
        'file' => 'Το πεδίο :attribute πρέπει να είναι τουλάχιστον :min kilobytes.',
        'numeric' => 'Το πεδίο :attribute πρέπει να είναι τουλάχιστον :min.',
        'string' => 'Το πεδίο :attribute πρέπει να είναι τουλάχιστον :min χαρακτήρες.',
    ],
    'min_digits' => 'Το πεδίο :attribute πρέπει να έχει τουλάχιστον :min ψηφία.',
    'missing' => 'Το πεδίο :attribute πρέπει να λείπει.',
    'missing_if' => 'Το πεδίο :attribute πρέπει να λείπει όταν το :other είναι :value.',
    'missing_unless' => 'Το πεδίο :attribute πρέπει να λείπει εκτός αν το :other είναι :value.',
    'missing_with' => 'Το πεδίο :attribute πρέπει να λείπει όταν το :values είναι παρόν.',
    'missing_with_all' => 'Το πεδίο :attribute πρέπει να λείπει όταν τα :values είναι παρόντα.',
    'multiple_of' => 'Το πεδίο :attribute πρέπει να είναι πολλαπλάσιο του :value.',
    'not_in' => 'Η επιλεγμένη τιμή του :attribute είναι μη έγκυρη.',
    'not_regex' => 'Η μορφή του πεδίου :attribute είναι μη έγκυρη.',
    'numeric' => 'Το πεδίο :attribute πρέπει να είναι αριθμός.',
    'password' => [
        'letters' => 'Το πεδίο :attribute πρέπει να περιέχει τουλάχιστον ένα γράμμα.',
        'mixed' => 'Το πεδίο :attribute πρέπει να περιέχει τουλάχιστον ένα κεφαλαίο και ένα πεζό γράμμα.',
        'numbers' => 'Το πεδίο :attribute πρέπει να περιέχει τουλάχιστον έναν αριθμό.',
        'symbols' => 'Το πεδίο :attribute πρέπει να περιέχει τουλάχιστον ένα σύμβολο.',
        'uncompromised' => 'Το δοσμένο :attribute έχει εμφανιστεί σε διαρροή δεδομένων. Παρακαλώ επιλέξτε διαφορετικό :attribute.',
    ],
    'present' => 'Το πεδίο :attribute πρέπει να είναι παρόν.',
    'present_if' => 'Το πεδίο :attribute πρέπει να είναι παρόν όταν το :other είναι :value.',
    'present_unless' => 'Το πεδίο :attribute πρέπει να είναι παρόν εκτός αν το :other είναι :value.',
    'present_with' => 'Το πεδίο :attribute πρέπει να είναι παρόν όταν το :values είναι παρόν.',
    'present_with_all' => 'Το πεδίο :attribute πρέπει να είναι παρόν όταν τα :values είναι παρόντα.',
    'prohibited' => 'Το πεδίο :attribute απαγορεύεται.',
    'prohibited_if' => 'Το πεδίο :attribute απαγορεύεται όταν το :other είναι :value.',
    'prohibited_if_accepted' => 'Το πεδίο :attribute απαγορεύεται όταν το :other είναι αποδεκτό.',
    'prohibited_if_declined' => 'Το πεδίο :attribute απαγορεύεται όταν το :other απορρίπτεται.',
    'prohibited_unless' => 'Το πεδίο :attribute απαγορεύεται εκτός αν το :other είναι στο :values.',
    'prohibits' => 'Το πεδίο :attribute απαγορεύει την παρουσία του :other.',
    'regex' => 'Η μορφή του πεδίου :attribute είναι μη έγκυρη.',
    'required' => 'Το πεδίο :attribute είναι υποχρεωτικό.',
    'required_array_keys' => 'Το πεδίο :attribute πρέπει να περιέχει καταχωρήσεις για: :values.',
    'required_if' => 'Το πεδίο :attribute είναι υποχρεωτικό όταν το :other είναι :value.',
    'required_if_accepted' => 'Το πεδίο :attribute είναι υποχρεωτικό όταν το :other είναι αποδεκτό.',
    'required_if_declined' => 'Το πεδίο :attribute είναι υποχρεωτικό όταν το :other απορρίπτεται.',
    'required_unless' => 'Το πεδίο :attribute είναι υποχρεωτικό εκτός αν το :other είναι στο :values.',
    'required_with' => 'Το πεδίο :attribute είναι υποχρεωτικό όταν το :values είναι παρόν.',
    'required_with_all' => 'Το πεδίο :attribute είναι υποχρεωτικό όταν τα :values είναι παρόντα.',
    'required_without' => 'Το πεδίο :attribute είναι υποχρεωτικό όταν το :values δεν είναι παρόν.',
    'required_without_all' => 'Το πεδίο :attribute είναι υποχρεωτικό όταν κανένα από τα :values δεν είναι παρόν.',
    'same' => 'Τα πεδία :attribute και :other πρέπει να ταιριάζουν.',
    'size' => [
        'array' => 'Το πεδίο :attribute πρέπει να περιέχει :size στοιχεία.',
        'file' => 'Το πεδίο :attribute πρέπει να είναι :size kilobytes.',
        'numeric' => 'Το πεδίο :attribute πρέπει να είναι :size.',
        'string' => 'Το πεδίο :attribute πρέπει να είναι :size χαρακτήρες.',
    ],
    'starts_with' => 'Το πεδίο :attribute πρέπει να ξεκινά με ένα από τα εξής: :values.',
    'string' => 'Το πεδίο :attribute πρέπει να είναι συμβολοσειρά.',
    'timezone' => 'Το πεδίο :attribute πρέπει να είναι έγκυρη ζώνη ώρας.',
    'unique' => 'Το :attribute έχει ήδη χρησιμοποιηθεί.',
    'uploaded' => 'Η μεταφόρτωση του :attribute απέτυχε.',
    'uppercase' => 'Το πεδίο :attribute πρέπει να είναι κεφαλαία γράμματα.',
    'url' => 'Το πεδίο :attribute πρέπει να είναι έγκυρη διεύθυνση URL.',
    'ulid' => 'Το πεδίο :attribute πρέπει να είναι έγκυρο ULID.',
    'uuid' => 'Το πεδίο :attribute πρέπει να είναι έγκυρο UUID.',

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

    'attributes' => [
        'first_name' => 'όνομα',
        'last_name' => 'επώνυμο',
        'email' => 'διεύθυνση email',
        'phone' => 'τηλέφωνο',
        'cellphone' => 'κινητό τηλέφωνο',
        'identity_number' => 'αριθμός ταυτότητας',
        'type' => 'τύπος',
        'gender' => 'φύλο',
        'profession' => 'επάγγελμα',
        'birthdate' => 'ημερομηνία γέννησης',
    ],

];
